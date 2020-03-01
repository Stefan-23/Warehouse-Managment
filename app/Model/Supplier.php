<?php


    class Supplier extends AppModel {

        
        public $status= array(
    
            'draft' => 'U pripremi',
            'in use' => 'U upotrebi',
            'phase out' => 'Uskoro zastareva',
            'obsolete' => 'Proizvod zastareo',

        );
        public $rating = array(

            'platinum' => 'Najbolji rejting',
            'gold' => 'Odlican rejting',
            'silver' => 'Dobar rejting',

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
    
            'status' => array(
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
                    'conditions' => ['Supplier.article_id = Article.id']
                ],
                [
                    'table' => 'types',
                    'alias' => 'Type',
                    'type' => 'INNER',
                    'conditions' => ['Article.type_id = Type.id']
                ]
            ],
                'fields'=>['Article.*','Supplier.*','Type.code'],
                // 'contain'=>['Article.Type']
        ); 
    }