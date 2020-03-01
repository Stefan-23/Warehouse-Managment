<?php

    class Product extends AppModel {
        public $actsAs = array('Containable');
    
        public $status= array(
            
            'development' => 'U razvoju',
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
        
       
       //join third table
        public $joinTable = array(
            'joins'=>[
                [
                    'table' => 'articles',
                    'alias' => 'Article',
                    'type' => 'INNER',
                    'conditions' => ['Product.article_id = Article.id']
                ],
                [
                    'table' => 'types',
                    'alias' => 'Type',
                    'type' => 'INNER',
                    'conditions' => ['Article.type_id = Type.id']
                ]
            ],
                'fields'=>['Article.*','Product.*','Type.code'],
                // 'contain'=>['Article.Type']
        ); 
        
    
        public function beforeSave($options = array()){
           
            //generate date if product status is for sale
            if($this->data['Product']['product_status'] == 'for sale'){
                $post_date = date("Y-m-d");                                     // format date
                return $this->data['Product']['release_date'] = $post_date;
            }

            //refuse insert if products status is 'for sale','phase out','obsolete'
            if (in_array($this->data['Product']['product_status'], ['for sale','phase out', 'obsolete'], true ) ){
                return !empty($this->data['Product']['pid'] && $this->data['Product']['hs_number'] && $this->data['Product']['tax_group'] && $this->data['Product']['product_eccn'] && $this->data['Product']['release_date']);       
            
            }
           
            return true;
       
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}