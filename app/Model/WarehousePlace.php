<?php

    class WarehousePlace extends AppModel{

    
        public $types= array(
            
            'product' => 'Proizvod',
            'goods' => 'Roba',
            'service_product' => 'Servisni proizvod',
            'material' => 'Material',
            'semi_product' => 'Poluproizvod',
            'consumable' => 'Potrosna roba',
            'inventory' => 'Invertar',

        );

        public $validate = array(
            'id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                ),
            ),
            'code' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                ),
                'unique' => array(
                    'rule' => array('isUnique'),
                    'message' => 'This type name already exists',
                ),
            ),
            
            'name' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                )
            ),

            'type' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                )
            ),
            'default' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                )
            ),
            'active' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                )
            ),
            

        );
        public $hasMany = array(
            
            'ArticleLocation' => array(
                'className' => 'ArticleLocation',
                'foreignKey' => 'article_id'
            ),
        );





    
    
    
    
    
}