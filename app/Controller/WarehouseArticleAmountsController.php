<?php

    class WarehouseArticleAmountController extends AppController{
        
        public $components = array('Paginator');

        
        public function index(){ 
            
            $this->WarehouseArticleAmount->recursive=-1;
            //$this->Paginator->settings = $this->WarehouseArticleAmount->joinTable;          
            $this->set('warehouseAmount', $this->Paginator->paginate('WarehouseArticeAmount'));
        }

        // Add and edit function in one method 
   
        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->WarehouseArticleAmount->create();
                if ($this->WarehouseArticleAmount->saveAssociated($this->request->data)) {                //Magic saveAssociated function
                    $this->Flash->success(__('WarehouseAmount has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }   else {
                    $this->Flash->error(__('Could not be saved.'));
               }
           }
       }
        // Edit
            if(!empty($id)){
                if (!$this->WarehouseArticleAmount->exists($id)) {
                    throw new NotFoundException(__('Invalid product'));
                }
                    $this->WarehouseArticleAmount->id = $id; //key for updating refers to id !
                if ($this->request->is(array('post', 'put'))) {
                    if ($this->WarehouseArticleAmount->save($this->request->data)) {
                        $this->Flash->success(__('The Amount has been edited.'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Flash->error(__('The Amount could not be edited. Please, try again.'));
                        }
                } else {
                        $options = array('conditions' => array('WarehouseArticleAmount.' . $this->WarehouseArticleAmount->primaryKey => $id));
                        $this->request->data = $this->WarehouseArticleAmount->find('first', $options);
                    }
                    $warehouseAmount = $this->WarehouseArticleAmount->find('list');
                }   
                
       }
   
        // delete WarehouseAmount
        public function delete($id = null){
            if(!$this->WarehouseArticleAmount->exists($id)){
                throw new NotFoundException(__('Invalid Amount'));
            }
                $this->request->is('post', 'delete');
               if ($this->WarehouseArticleAmount->delete($id)){
                   $this->Flash->success(__('Article has been deleted'));
               }else{
                   $this->Flash->error(__('Article could not be deleted, try again.'));
               }
               return $this->redirect(array('action' => 'index'));
           }
   
        
}
   