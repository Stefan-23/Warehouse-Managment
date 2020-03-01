<?php


    class SuppliersController extends AppController{

        public $components = array('Paginator');
    
        // index of  suppplier
        public function index(){ 
            $this->Supplier->recursive=-1;
            $this->Paginator->settings = $this->Supplier->joinTable;          
            $this->set('suppliers', $this->Paginator->paginate('Supplier'));
        }

        // view   supplier
        public function view($id = null){
            if(!$this->Supplier->exists($id)){
                throw new NotFoundException (__('Invalid supplier'));
            }
                $options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
                $this->set('supplier', $this->Supplier->find('first', $options));
            }

        // Add and edit function in one method 
   
        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->Supplier->create();
                if ($this->Supplier->saveAssociated($this->request->data)) {                //Magic saveAssociated function
                    $this->Flash->success(__('Service Supplier has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }   else {
                    $this->Flash->error(__(' could not be saved.'));
               }
           }else{
            $this->request->data['Article']['unit_id'] = 12;
            $this->request->data['Article']['type_id'] = 11;
        }
            // Fetch Types from table
            $types = $this->Supplier->Article->Type->find('list');
            $this->set(compact('types'));
            
       }
        // Edit
            if(!empty($id)){
                if (!$this->Supplier->exists($id)) {
                throw new NotFoundException(__('Invalid  '));
            }
               $this->Supplier->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
               if ($this->Supplier->Article->save($this->request->data) && $this->Supplier->save($this->request->data)) {
                    $this->Flash->success(__(' Service Supplier has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('This  could not be saved.'));
                   }
           } else {
                    $options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
                    $this->request->data = $this->Supplier->find('first', $options);
               }
           }
       

                // Set  status and rating
                $this->set('status', $this->Supplier->status);
                $this->set('rating', $this->Supplier->rating);
                //Set  type and Unit
                $listTypes = $this->Supplier->Article->Type->find('list');
                $this->set('listTypes', $listTypes);
                $listUnits = $this->Supplier->Article->Unit->find('list');
                $this->set('listUnits',$listUnits);
       }
   
        // delete 
        public function delete($id = null){
            if(!$this->Supplier->exists($id)){
                throw new NotFoundException(__('Invalid '));
            }
                $this->request->is('post', 'delete');
               if ($this->Supplier->delete($id)){
                   $this->Flash->success(__(' has been deleted'));
               }else{
                   $this->Flash->error(__(' could not be deleted, try again.'));
               }
               return $this->redirect(array('action' => 'index'));
           }
   
       






    }