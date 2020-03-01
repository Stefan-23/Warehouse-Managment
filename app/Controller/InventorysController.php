<?php


    class InventorysController extends AppController {

        public $components = array('Paginator');

        // index of inventory
        public function index(){ 
            $this->Inventory->recursive=-1;
            $this->Paginator->settings = $this->Inventory->joinTable;
            $this->set('inventorys', $this->Paginator->paginate('Inventory'));
        }

        // view inventory
        public function view($id = null){
            if(!$this->Inventory->exists($id)){
                throw new NotFoundException (__('Invalid inventory'));
            }
            $options = array('conditions' => array('Inventory.' . $this->Inventory->primaryKey => $id));
            $this->set('inventory', $this->Inventory->find('first', $options));
        }

        // Add and edit function in one method 

        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->Inventory->create();
                if ($this->Inventory->saveAssociated($this->request->data)) {                //Magic saveAssociated function
                    $this->Flash->success(__('Inventory has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }   else {
                    $this->Flash->error(__('Inventory could not be saved.'));
               }
           }else{
            $this->request->data['Article']['unit_id'] = 12;
            $this->request->data['Article']['type_id'] = 17;
        }
       }
        // Edit
            if(!empty($id)){
                if (!$this->Inventory->exists($id)) {
                throw new NotFoundException(__('Invalid inventory'));
            }
               $this->Inventory->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
               if ($this->Inventory->Article->save($this->request->data) && $this->Inventory->save($this->request->data)) {
                    $this->Flash->success(__('The inventory has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('This inventory could not be saved.'));
                   }
           } else {
                    $options = array('conditions' => array('Inventory.' . $this->Inventory->primaryKey => $id));
                    $this->request->data = $this->Inventory->find('first', $options);
               }
           }
       

                // Set Inventory status and rating
                $this->set('status', $this->Inventory->status);
                $this->set('rating', $this->Inventory->rating);

                //Set Inventory type and Unit
                $listTypes = $this->Inventory->Article->Type->find('list');
                $this->set('listTypes', $listTypes);
                $listUnits = $this->Inventory->Article->Unit->find('list');
                $this->set('listUnits',$listUnits);
       }

        // delete inventory
        public function delete($id = null){
            if(!$this->Inventory->exists($id)){
                throw new NotFoundException(__('Invalid inventory'));
        }
            $this->request->is('post', 'delete');
            if ($this->Inventory->delete($id)){
                $this->Flash->success(__('Inventory has been deleted'));
            }else{
                $this->Flash->error(__('Inventory could not be deleted, try again.'));
        }
       return $this->redirect(array('action' => 'index'));
    }

        
}


    