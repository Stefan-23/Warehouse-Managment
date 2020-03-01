<?php
App::uses('AppModel', 'Model');

class Group extends AppModel {


	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
	);

	public $hasMany = array('User');

	public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        return null;
    }

}