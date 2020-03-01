<?php

    class ProductsController extends AppController{
        
        public $components = array('Paginator');

        
        public function index(){ 
            
            $this->Product->recursive=-1;
            $this->Paginator->settings = $this->Product->joinTable;          
            $this->set('products', $this->Paginator->paginate('Product'));
        }

        // view products
        public function view($id = null){
            if(!$this->Product->exists($id)){
                throw new NotFoundException (__('Invalid product'));
            }
                $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
                $this->set('product', $this->Product->find('first', $options));
            }

        // Add and edit function in one method 
   
        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->Product->create();
                if ($this->Product->saveAssociated($this->request->data)) {                //Magic saveAssociated function
                    $this->Flash->success(__('Product has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }   else {
                    $this->Flash->error(__('The product could not be saved. Please fill all fields for selected status(Pid,HS Number,Tax Group,Product ECCN,Release date).'));
               }
           }else{
                
                $this->request->data['Article']['unit_id'] = 12;
           }
       }
        // Edit
            if(!empty($id)){
                if (!$this->Product->exists($id)) {
                throw new NotFoundException(__('Invalid product'));
            }
               $this->Product->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
               if ($this->Product->Article->save($this->request->data) && $this->Product->save($this->request->data)) {
                    $this->Flash->success(__('The product has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('This product could not be saved. Please fill all fields for selected status(Pid,HS Number,Tax Group,Good ECCN,Release date).'));
                   }
           } else {
                    $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
                    $this->request->data = $this->Product->find('first', $options); 
               }
           }
       

                // Set product status and rating
                $this->set('status', $this->Product->status);
          
           
                //Set Product type and Unit
                $listTypes = $this->Product->Article->Type->find('list');
                $this->set('listTypes', $listTypes);
                $listUnits = $this->Product->Article->Unit->find('list');
                $this->set('listUnits',$listUnits);
       }
   
        // delete product
        public function delete($id = null){
            if(!$this->Product->exists($id)){
                throw new NotFoundException(__('Invalid product'));
            }
                $this->request->is('post', 'delete');
               if ($this->Product->delete($id)){
                   $this->Flash->success(__('Product has been deleted'));
               }else{
                   $this->Flash->error(__('Product could not be deleted, try again.'));
               }
               return $this->redirect(array('action' => 'index'));
           }
   
        
}
   