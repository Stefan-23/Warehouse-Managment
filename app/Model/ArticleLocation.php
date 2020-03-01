<?php

    class ArticleLocation extends AppModel{



        public $validate = array(
            'id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                ),
            ),
            'article_id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                ),
            ),
            'warehouse_location_id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                ),
            ),
            
            

        );

        public $belongsTo = array(
            'WarehouseLocation' => array(
            'className' => 'WarehouseLocation',
            'foreignKey' => 'warehouse_location_id'
        ),
            'Article' => array(
            'className' => 'Article',
            'foreignKey' => 'article_id'
        ),
    );
   

        public function beforeSave($options = array()){
           

        }


    }