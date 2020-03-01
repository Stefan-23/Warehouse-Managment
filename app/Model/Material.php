<?php

    class Material extends AppModel{

        public $status= array(
            
            'development' => 'U razvoju',
            'in use' => 'U upotrebi',
            'phase out' => 'Uskoro zastareva',
            'obsolete' => 'Material zastareo',

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
            
            
            'recommended_rating' => array(   
            ),

        );

        

        public $belongsTo = array('Article');
        
        public $joinTable = array(
            'joins'=>[
                [
                    'table' => 'articles',
                    'alias' => 'Article',
                    'type' => 'INNER',
                    'conditions' => ['Material.article_id = Article.id']
                ],
                [
                    'table' => 'types',
                    'alias' => 'Type',
                    'type' => 'INNER',
                    'conditions' => ['Article.type_id = Type.id']
                ]
            ],
                'fields'=>['Article.*','Material.*','Type.code'],
                // 'contain'=>['Article.Type']
        ); 
    
        

        
        



    }