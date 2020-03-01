<?php

    class Good extends AppModel{

    
        public $status= array(
            
            'draft' => 'U procesu nabavke',
            'for sale' => 'Za prodaju',
            'phase out' => 'Uskoro zastareva',
            'obsolete' => 'Proizvod zastareo',
            'nrnd' => 'Nije za upotrebu',

        );

        public $validate = array(
            'id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                ),
            ),
            'article_id' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                ),
                'unique' => array(
                    'rule' => array('isUnique'),
                    'message' => 'This type name already exists',
                ),
            ),
            
            'product_status' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                )
            ),

            'service_production' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                )
            ),
            

        );
        public $belongsTo = array('Article');


        public $joinTable = array(
            'joins'=>[
                [
                    'table' => 'articles',
                    'alias' => 'Article',
                    'type' => 'INNER',
                    'conditions' => ['Good.article_id = Article.id']
                ],
                [
                    'table' => 'types',
                    'alias' => 'Type',
                    'type' => 'INNER',
                    'conditions' => ['Article.type_id = Type.id']
                ]
            ],
                'fields'=>['Article.*','Good.*','Type.code'],
                // 'contain'=>['Article.Type']
        ); 
        
       
      
    
        public function beforeSave($options = array()){
            //generate date if product status is for sale
            if($this->data['Good']['product_status'] == 'for sale'){
                $post_date = date("Y-m-d");                                     // format date
               return $this->data['Good']['release_date'] = $post_date;
            }
            //refuse insert if products status is 'for sale','phase out','obsolete'
            if (in_array($this->data['Good']['product_status'], ['for sale','phase out', 'obsolete'], true ) ){
                return !empty($this->data['Good']['pid'] && $this->data['Good']['hs_number'] && $this->data['Good']['tax_group'] && $this->data['Good']['product_eccn'] && $this->data['Good']['release_date']);              
            }
            return true;
       
    }
    
}