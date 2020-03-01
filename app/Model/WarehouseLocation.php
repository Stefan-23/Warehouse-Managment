<?php

    class WarehouseLocation extends AppModel{



        public $validate = array(
            'id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                ),
            ),
            'address_code' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                ),
                'unique' => array(
                    'rule' => array('isUnique'),
                    'message' => 'This type name already exists',
                ),
            ),
            
            'row' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                )
            ),

            'shelf' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                )
            ),
            'box' => array(
                'notBlank' => array(
                    'rule' => array('notBlank'),
                )
            ),
            'warehouse_place_id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                ),
            ),
            'barcode' => array(
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

        
        public $belongsTo = array('WarehousePlace');
        public function beforeSave($options = array()){

            return true;

        }
    
    
    
}