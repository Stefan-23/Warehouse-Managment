<?php


    class SemiProduct extends AppModel{

        
        public $status= array(
            
            'development' => 'U razvoju',
            'in use' => 'U upotrebi',
            'phase out' => 'Uskoro zastareva',
            'obsolete' => 'Material zastareo',

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
            
            'semi_product_status' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                ),
            ),
            'service_production' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                ),
            ),

        );
        public $belongsTo = array('Article');

        public $joinTable = array(
            'joins'=>[
                [
                    'table' => 'articles',
                    'alias' => 'Article',
                    'type' => 'INNER',
                    'conditions' => ['SemiProduct.article_id = Article.id']
                ],
                [
                    'table' => 'types',
                    'alias' => 'Type',
                    'type' => 'INNER',
                    'conditions' => ['Article.type_id = Type.id']
                ]
            ],
                'fields'=>['Article.*','SemiProduct.*','Type.code'],
                // 'contain'=>['Article.Type']
        ); 


    
    }