<?php


    class Inventory extends AppModel{

        public $status= array(
            
            'draft' => 'Roba je u procesu nalazenja',
            'in use' => 'Invertar u upotrebi',
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
                    'message' => 'Please add status',
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
                    'conditions' => ['Inventory.article_id = Article.id']
                ],
                [
                    'table' => 'types',
                    'alias' => 'Type',
                    'type' => 'INNER',
                    'conditions' => ['Article.type_id = Type.id']
                ]
            ],
                'fields'=>['Article.*','Inventory.*','Type.code'],
                // 'contain'=>['Article.Type']
        ); 
        

        
    }