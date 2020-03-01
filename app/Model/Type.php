<?php

class Type extends AppModel{

    public $classes = array(
        'product' => 'Proizvod',
        'kit' => 'Kit',
        'material' => 'Materijal',
        'semi_product' => 'Poluproizvod',
        'service_product' => 'Pruzanje usluge',
        'service_supplier' => 'Usluga dobavljaca',
        'consumable' => 'Potrosna roba',
        'inventory' => 'Invertar',
        'goods' => 'Proizvod za preprodaju',
        'other' => 'Ostalo'       
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
            ),
        ),
        'class' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            ),
        ),
        'tangible' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            ),
        ),
        'active' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            ),
        ),
    );

    // public $hasAndBelongsToMany = array('Article','ServiceProduct');
    


    
}