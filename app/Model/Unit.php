<?php
App::uses('AppModel', 'Model');


class Unit extends AppModel{

    public $validate = array(
        'id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            ),
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'This unit name already exists',
            ),
        ),
        'symbol' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            ),
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'This symbol already exists',
            ),
        ),
    );

}

