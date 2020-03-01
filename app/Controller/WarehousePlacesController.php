<?php

    class WarehousePlacesController extends AppController{
        
        public $components = array('Paginator');

        
        public function index(){ 
            
            $this->WarehousePlace->recursive=-1;
            //$this->Paginator->settings = $this->WarehousePlace->joinTable;          
            $this->set('warehousePlaces', $this->Paginator->paginate('WarehousePlace'));
        }

        // view WarehousePlaces
        public function view($id=null){
            
            if(!$this->WarehousePlace->exists($id)){
                $this->Flash->error(__('Invalid address'));
            }
            $options = array('conditions' => array('WarehousePlace.' . $this->WarehousePlace->primaryKey => $id));
            $this->set('warehouseplaces', $this->WarehousePlace->find('first', $options));
            
            $this->WarehousePlace->recursive=-0;
            $this->set('warehousePlaces', $this->Paginator->paginate('WarehousePlace'));
            }

        // Add and edit function in one method 
   
        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->WarehousePlace->create();
                if ($this->WarehousePlace->saveAssociated($this->request->data)) {                //Magic saveAssociated function
                    $this->Flash->success(__('WarehousePlace has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }   else {
                    $this->Flash->error(__('The place could not be saved.'));
               }
           }
       }
        // Edit
            if(!empty($id)){
                if (!$this->WarehousePlace->exists($id)) {
                    throw new NotFoundException(__('Invalid product'));
                }
                    $this->WarehousePlace->id = $id; //key for updating refers to id !
                if ($this->request->is(array('post', 'put'))) {
                    if ($this->WarehousePlace->save($this->request->data)) {
                        $this->Flash->success(__('The WarehousePlace has been edited.'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Flash->error(__('The WarehousePlace could not be edited. Please, try again.'));
                        }
                } else {
                        $options = array('conditions' => array('WarehousePlace.' . $this->WarehousePlace->primaryKey => $id));
                        $this->request->data = $this->WarehousePlace->find('first', $options);
                    }
                    $warehousePlaces = $this->WarehousePlace->find('list');
                }
    
           
                //Set Place type 
                $types = $this->WarehousePlace->types;
                $this->set('types', $types);
                //$this->set('listTypes', $listTypes);
                
       }
   
        // delete WarehousePlace
        public function delete($id = null){
            if(!$this->WarehousePlace->exists($id)){
                throw new NotFoundException(__('Invalid WarehousePlace'));
            }
                $this->request->is('post', 'delete');
               if ($this->WarehousePlace->delete($id)){
                   $this->Flash->success(__('Place has been deleted'));
               }else{
                   $this->Flash->error(__('Place could not be deleted, try again.'));
               }
               return $this->redirect(array('action' => 'index'));
           }
   
       
}
   