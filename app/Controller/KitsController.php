<?php

    class KitsController extends AppController {
        public $components = array('Paginator');
       
        // index of kits
        public function index(){ 
            $this->Kit->recursive=-1;
            $this->Paginator->settings = $this->Kit->joinTable;
            $this->set('kits', $this->Paginator->paginate('Kit'));
        }

        // view kits
        public function view($id = null){
            if(!$this->Kit->exists($id)){
                throw new NotFoundException (__('Invalid kit'));
            }
                $options = array('conditions' => array('Kit.' . $this->Kit->primaryKey => $id));
                $this->set('kit', $this->Kit->find('first', $options));
            }

        // Add and edit function in one method 
   
        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->Kit->create();
                if ($this->Kit->saveAssociated($this->request->data)) {                //Magic saveAssociated function
                    $this->Flash->success(__('Kit has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }   else {
                    $this->Flash->error(__('Kit could not be saved. Please fill all fields for selected status(Pid,HS Number,Tax Group,ECCN,Release date).'));
               }
           }else{
            $this->request->data['Article']['unit_id'] = 12;
            $this->request->data['Article']['type_id'] = 6;
        }
       }
        // Edit
            if(!empty($id)){
                if (!$this->Kit->exists($id)) {
                throw new NotFoundException(__('Invalid kit'));
            }
               $this->Kit->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
               if ($this->Kit->Article->save($this->request->data) && $this->Kit->save($this->request->data)) {
                    $this->Flash->success(__('The kit has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('This kit could not be saved. Please fill all fields for selected status(Pid,HS Number,Tax Group,ECCN,Release date).'));
                   }
           } else {
                    $options = array('conditions' => array('Kit.' . $this->Kit->primaryKey => $id));
                    $this->request->data = $this->Kit->find('first', $options);
               }
           }
       

                // Set Kit status and rating
                $this->set('status', $this->Kit->status);
          
           
                //Set Kit type and Unit
                $listTypes = $this->Kit->Article->Type->find('list');
                $this->set('listTypes', $listTypes);
                $listUnits = $this->Kit->Article->Unit->find('list');
                $this->set('listUnits',$listUnits);
       }
   
        // delete kit
        public function delete($id = null){
            if(!$this->Kit->exists($id)){
                throw new NotFoundException(__('Invalid kit'));
            }
                $this->request->is('post', 'delete');
               if ($this->Kit->delete($id)){
                   $this->Flash->success(__('Kit has been deleted'));
               }else{
                   $this->Flash->error(__('Kit could not be deleted, try again.'));
               }
               return $this->redirect(array('action' => 'index'));
           }
   
       
    }