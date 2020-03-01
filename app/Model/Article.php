<?php

    class Article extends AppModel{

        public $validate = array(
            

            'type_id' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                ),
            ),

            'name' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                ),
                'isUnique' => array(
                    'rule' => array('isUnique'),
                    'message' => 'This name already exists, try another.'
                )
            ),

            'Description' => array(
                'message' => 'Optional'
            ),

            'Weight' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                ),
            ),
            
            'unit_id' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                ),
            ),

            'Weight' => array(
                'message' => 'Optional'
            ),
        );
        
        

        public $belongsTo = array('Type','Unit');
        
        public $hasMany = array(
            'Material' => array(
                'className' => 'Material',
                'foreignKey' => 'article_id'
            ),
            'Good' => array(
                'className' => 'Good',
                'foreignKey' => 'article_id'
            ),
            'ArticleLocation' => array(
                'className' => 'ArticleLocation',
                'foreignKey' => 'article_id'
            )
        );

        public function beforeSave($options = array()){
           
            
            //count how many types is in article and add one
            $result = $this->find('count', array(
                 'conditions' => array('type_id' => $this->data['Article']['type_id'])
            ));
            $result++;
            $this->data['Article']['type_number'] = $result;
            

    }


    }