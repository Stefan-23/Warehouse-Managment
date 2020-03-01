<?php


    class ConsumablesController extends AppController {

        public $components = array('Paginator');

        // index of consumables
        public function index(){ 
            $this->Consumable->recursive=-1;
            $this->Paginator->settings = $this->Consumable->joinTable;
            $this->set('consumables', $this->Paginator->paginate('Consumable'));
        }

        // view consumables
        public function view($id = null){
            if(!$this->Consumable->exists($id)){
                throw new NotFoundException (__('Invalid consumable'));
            }
            $options = array('conditions' => array('Consumable.' . $this->Consumable->primaryKey => $id));
            $this->set('consumable', $this->Consumable->find('first', $options));
        }

        // Add and edit function in one method 

        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->Consumable->create();
                if ($this->Consumable->saveAssociated($this->request->data)) {                //Magic saveAssociated function
                    $this->Flash->success(__('Consumable has been saved.'));
                    return $this->redirect(array('action' => 'index'));
            }   else {
                $this->Flash->error(__('Consumable could not be saved.'));
            }
        }else{
            $this->request->data['Article']['unit_id'] = 12;
            $this->request->data['Article']['type_id'] = 16;
        }
    }
        // Edit
            if(!empty($id)){
                if (!$this->Consumable->exists($id)) {
                    throw new NotFoundException(__('Invalid consumable'));
            }
            $this->Consumable->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
                if ($this->Consumable->Article->save($this->request->data) && $this->Consumable->save($this->request->data)) {
                $this->Flash->success(__('The consumable has been edited.'));
                return $this->redirect(array('action' => 'index'));
                } else {
                $this->Flash->error(__('This consumable could not be saved.'));
           }
            } else {
            $options = array('conditions' => array('Consumable.' . $this->Consumable->primaryKey => $id));
            $this->request->data = $this->Consumable->find('first', $options);
        }    
    }


        // Set Consumable status and rating
        $this->set('status', $this->Consumable->status);
        $this->set('rating', $this->Consumable->rating);
  
   
        //Set Consumable type and Unit
        $listTypes = $this->Consumable->Article->Type->find('list');
        $this->set('listTypes', $listTypes);
        $listUnits = $this->Consumable->Article->Unit->find('list');
        $this->set('listUnits',$listUnits);
}

        // delete consumable
        public function delete($id = null){
            if(!$this->Consumable->exists($id)){
                throw new NotFoundException(__('Invalid consumable'));
        }
            $this->request->is('post', 'delete');
            if ($this->Consumable->delete($id)){
                $this->Flash->success(__('Consumable has been deleted'));
            }else{
                $this->Flash->error(__('Consumable could not be deleted, try again.'));
        }
       return $this->redirect(array('action' => 'index'));
    }

}

