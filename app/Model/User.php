<?php
    App::uses('AppModel','Model');
    App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

    class User extends AppModel{

        public $validate = array(

            'username' => array(
                'requried' => array(
                    'rule' => 'notBlank',
                    'message' => 'Username is required'
                ),
                'unique' => array(
                    'rule' => 'isUnique',
                    'message' => 'This username already exists, try another.'
                )
                ),

            'password' => array(
                'required' => array(
                    'rule' => 'notBlank',
                    'message' => 'Password is required'
                ),

            ),
            'group_id' => array(
                'numeric' => array(
                    'rule' => array('numeric'), 
                ),
            ),
            'email' => array(
                'requried' => array(
                    'rule' => 'notBlank',
                    'message' => 'Username is required'
                ),
                'unique' => array(
                    'rule' => 'isUnique',
                    'message' => 'This username already exists, try another.'
                )
                ),
                'first_name' => array(
                    'requried' => array(
                        'rule' => 'notBlank',
                        'message' => 'Username is required'
                    ),
                ),
                'last_name' => array(
                    'requried' => array(
                        'rule' => 'notBlank',
                        'message' => 'Username is required'
                    ),
                ),

        );
        public $belongsTo = array('Group');


        public function beforeSave($options = array()){
            if(isset($this->data[$this->alias]['password'])){
                $passwordHasher = new BlowfishPasswordHasher();
                $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
                );
            }
            return true;
        }

        public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));

        public function parentNode() {
            if (!$this->id && empty($this->data)) {
                return null;
            }
            if (isset($this->data['User']['group_id'])) {
                $groupId = $this->data['User']['group_id'];
            } else {
            $groupId = $this->field('group_id');
            }
            if (!$groupId) {
                return null;
            }
            return array('Group' => array('id' => $groupId));
    }

    public function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }
    }

    