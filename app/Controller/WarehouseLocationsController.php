<?php

    class WarehouseLocationsController extends AppController{
    
        public $components = array('Paginator');

        public function index(){
            $this->WarehouseLocation->recursive = 0;
            $this->set('warehouselocations' , $this->Paginator->paginate());
        }

        public function view($id = null){
            if(!$this->WarehouseLocation->exists($id)){
                $this->Flash->error(__('Invalid address'));
            }
            $options = array('conditions' => array('WarehouseLocation.' . $this->WarehouseLocation->primaryKey => $id));
            $this->set('warehouselocation', $this->WarehouseLocation->find('first', $options));
        }

        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->WarehouseLocation->create();
                    if ($this->WarehouseLocation->save($this->request->data)) {                //Magic saveAssociated function
                        $this->Flash->success(__('Address has been saved.'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Flash->error(__('The address could not be saved. Please, try again.'));
                    }
                }
            }
            if(!empty($id)){
                if (!$this->WarehouseLocation->exists($id)) {
                    throw new NotFoundException(__('Invalid address'));
                }
                    $this->WarehouseLocation->id = $id; //key for updating refers to id !
                if ($this->request->is(array('post', 'put'))) {
                    if ($this->WarehouseLocation->save($this->request->data)) {
                        $this->Flash->success(__('The address has been edited.'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Flash->error(__('The address could not be edited. Please, try again.'));
                        }
                } else {
                        $options = array('conditions' => array('WarehouseLocation.' . $this->WarehouseLocation->primaryKey => $id));
                        $this->request->data = $this->WarehouseLocation->find('first', $options);
                    }
                    $warehouselocations = $this->WarehouseLocation->find('list');
                }

                $places = $this->WarehouseLocation->WarehousePlace->find('list');
                $this->set('places',$places);
            }

            public function delete($id = null){
                if(!$this->WarehouseLocation->exists($id)){
                    throw new NotFoundException(__('Invalid article'));
                }
                $this->request->is('post', 'delete');
                if ($this->WarehouseLocation->delete($id)){
                    $this->Flash->success(__('Address has been deleted'));
                }else{
                    $this->Flash->error(__('Address could not be deleted, try again.'));
                }
    
                return $this->redirect(array('action' => 'index'));
            }

        

       

    }