<?php



    class ServiceProduct extends AppModel {

        
        public $status= array(
            
            'development' => 'U razvoju',
            'for sale' => 'Za prodaju',
            'phase out' => 'Uskoro zastareva',
            'obsolete' => 'Proizvod zastareo',

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
            
            'service_status' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                )
            ),

            

        );
        public $belongsTo = array('Article','Type' );
        
        //join third table
        public $joinTable = array(
            'joins'=>[
                [
                    'table' => 'articles',
                    'alias' => 'Article',
                    'type' => 'INNER',
                    'conditions' => ['ServiceProduct.article_id = Article.id']
                ],
                [
                    'table' => 'types',
                    'alias' => 'Type',
                    'type' => 'INNER',
                    'conditions' => ['Article.type_id = Type.id']
                ]
            ],
                'fields'=>['Article.*','ServiceProduct.*','Type.code'],
                // 'contain'=>['Article.Type']
        ); 
      
    
        public function beforeSave($options = array()){
           
             //generate date if product status is for sale
             if($this->data['ServiceProduct']['product_status'] == 'for sale'){
                $post_date = date("Y-m-d");                                     // format date
                return $this->data['ServiceProduct']['release_date'] = $post_date;
            }

            //refusing insert if products status is 'for sale','phase out','obsolete'
            if (in_array($this->data['ServiceProduct']['service_status'], ['for sale','phase out', 'obsolete'], true ) ){
                return !empty($this->data['ServiceProduct']['pid'] && $this->data['ServiceProduct']['hs_number'] && $this->data['ServiceProduct']['tax_group'] && $this->data['ServiceProduct']['service_eccn'] && $this->data['ServiceProduct']['release_date']);              
            }
            
            return true;
       
    }



    }










    