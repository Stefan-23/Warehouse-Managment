<?php

    class ServiceProductsController extends AppController{
        
        public $components = array('Paginator');
    
        // index of service products
        public function index(){ 
            $this->ServiceProduct->recursive=-1;
            $this->Paginator->settings = $this->ServiceProduct->joinTable;          
            $this->set('service_products', $this->Paginator->paginate('ServiceProduct'));
        }

        // view service products
        public function view($id = null){
            if(!$this->ServiceProduct->exists($id)){
                throw new NotFoundException (__('Invalid service_product'));
            }
                $options = array('conditions' => array('ServiceProduct.' . $this->ServiceProduct->primaryKey => $id));
                $this->set('service_product', $this->ServiceProduct->find('first', $options));
            }

        // Add and edit function in one method 
   
        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->ServiceProduct->create();
                if ($this->ServiceProduct->saveAssociated($this->request->data)) {                //Magic saveAssociated function
                    $this->Flash->success(__('Service has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }   else {
                    $this->Flash->error(__('Service could not be saved. Please fill all fields for selected status(Pid,HS Number,Tax Group,Service ECCN,Release date).'));
               }
           }else{
               $this->request->data['Article']['unit_id'] = 12;     //set default fields for this type of article
               $this->request->data['Article']['type_id'] = 10;
           }
            // Fetch Types from table
            $types = $this->ServiceProduct->Article->Type->find('list');
            $this->set(compact('types'));
            
       }
        // Edit
            if(!empty($id)){
                if (!$this->ServiceProduct->exists($id)) {
                throw new NotFoundException(__('Invalid Service '));
            }
               $this->ServiceProduct->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
               if ($this->ServiceProduct->Article->save($this->request->data) && $this->ServiceProduct->save($this->request->data)) {
                    $this->Flash->success(__('Service  has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('This service could not be saved. Please fill all fields for selected status(Pid,HS Number,Tax Group,Good ECCN,Release date).'));
                   }
           } else {
                    $options = array('conditions' => array('ServiceProduct.' . $this->ServiceProduct->primaryKey => $id));
                    $this->request->data = $this->ServiceProduct->find('first', $options);
               }
           }
       

                // Set Service status and rating
                $this->set('status', $this->ServiceProduct->status);
          
           
                //Set Service type and Unit
                $listTypes = $this->ServiceProduct->Article->Type->find('list');
                $this->set('listTypes', $listTypes);
                $listUnits = $this->ServiceProduct->Article->Unit->find('list');
                $this->set('listUnits',$listUnits);
       }
   
        // delete service
        public function delete($id = null){
            if(!$this->ServiceProduct->exists($id)){
                throw new NotFoundException(__('Invalid product'));
            }
                $this->request->is('post', 'delete');
               if ($this->ServiceProduct->delete($id)){
                   $this->Flash->success(__('Service has been deleted'));
               }else{
                   $this->Flash->error(__('Service could not be deleted, try again.'));
               }
               return $this->redirect(array('action' => 'index'));
           }
   
       
}
   