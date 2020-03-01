<?php

    class Kit extends AppModel{

    
        public $status= array(
            
            'draft' => 'Roba je u procesu nabavke',
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
                    'conditions' => ['Kit.article_id = Article.id']
                ],
                [
                    'table' => 'types',
                    'alias' => 'Type',
                    'type' => 'INNER',
                    'conditions' => ['Article.type_id = Type.id']
                ]
            ],
                'fields'=>['Article.*','Kit.*','Type.code'],
                // 'contain'=>['Article.Type']
        ); 
       
      
    
        public function beforeSave($options = array()){

             //generate date if product status is for sale
             if($this->data['Kit']['product_status'] == 'for sale'){
                $post_date = date("Y-m-d");                                     // format date
                return $this->data['Kit']['release_date'] = $post_date;
            }

            //refusing insert if products status is 'for sale','phase out','obsolete'
            if (in_array($this->data['Kit']['product_status'], ['for sale','phase out', 'obsolete'], true ) ){
                return !empty($this->data['Kit']['pid'] && $this->data['Kit']['hs_number'] && $this->data['Kit']['tax_group'] && $this->data['Kit']['product_eccn'] && $this->data['Kit']['release_date']);              
            }
            
            return true;
       
    }

}