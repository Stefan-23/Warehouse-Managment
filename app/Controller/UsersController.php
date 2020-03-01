<?php

    class UsersController extends AppController{
    
        public $components = array('Paginator');
        public $paginate = array(
            'limit' => 5
        );
        public function index(){
            $this->User->recursive = 0;
            $this->set('users' , $this->Paginator->paginate());
        }

        public function view($id = null){
            if(!$this->User->exists($id)){
                $this->Flash->error(__('Invalid user'));
            }
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->set('user', $this->User->find('first', $options));
        }

        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->User->create();
                    if ($this->User->save($this->request->data)) {                //Magic saveAssociated function
                        $this->Flash->success(__('User has been saved.'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Flash->error(__('The user could not be saved. Please, try again.'));
                    }
                }
            }
            if(!empty($id)){
                if (!$this->User->exists($id)) {
                    throw new NotFoundException(__('Invalid user'));
                }
                    $this->User->id = $id; //key for updating refers to id !
                if ($this->request->is(array('post', 'put'))) {
                    if ($this->User->save($this->request->data)) {
                        $this->Flash->success(__('The user has been edited.'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Flash->error(__('The user could not be edited. Please, try again.'));
                        }
                } else {
                        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
                        $this->request->data = $this->User->find('first', $options);
                    }
                    $users = $this->User->find('list');
                }

                $listGroups = $this->User->Group->find('list');
                $this->set('listGroups',$listGroups);
            }

            public function delete($id = null){
                if(!$this->User->exists($id)){
                    throw new NotFoundException(__('Invalid user'));
                }
            
                    $this->request->is('post', 'delete');
                        if ($this->User->delete($id)){
                            $this->Flash->success(__('User has been deleted'));
                        }else{
                            $this->Flash->error(__('User could not be deleted, try again.'));
                        }
                        return $this->redirect(array('action' => 'index'));
                    }

            public function login() {
                if ($this->request->is('post')) {
                    if ($this->Auth->login()) {
                        return $this->redirect($this->Auth->redirectUrl());
                    }
                        $this->Flash->error(__('Invalid username or password, try again'));
                    }
            }

        public function logout() {
            $this->Flash->success('You have successfully loged out');
            $this->redirect($this->Auth->logout());
        }


        

        public function initDB() {
            $group = $this->User->Group;
        
            // Allow admins to everything
            $group->id = 8;
            $this->Acl->allow($group, 'controllers');
        
            // allow workers
            $group->id = 9;
            $this->Acl->deny($group, 'controllers');
            $this->Acl->allow($group, 'controllers/Materials');
            $this->Acl->allow($group, 'controllers/SemiProducts');
            $this->Acl->allow($group, 'controllers/Products');
            $this->Acl->allow($group, 'controllers/Goods');
            $this->Acl->allow($group, 'controllers/Kits');
            $this->Acl->allow($group, 'controllers/Consumables');
            $this->Acl->allow($group, 'controllers/Inventorys');
            $this->Acl->allow($group, 'controllers/ServiceProducts');
            $this->Acl->allow($group, 'controllers/Suppliers');
        
            // allow basic users to log out
            $this->Acl->allow($group, 'controllers/users/logout');
        
            // Success message
            echo "That's it";
            exit;
        }
    }