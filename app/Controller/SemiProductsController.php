<?php

class SemiProductsController extends AppController{
        
    public $components = array('Paginator');
    
    // index of semi products
    public function index(){ 
        $this->SemiProduct->recursive=-1;
        $this->Paginator->settings = $this->SemiProduct->joinTable;
        $this->set('semiproducts', $this->Paginator->paginate('SemiProduct'));
    }
    // view products
    public function view($id = null){
        if(!$this->SemiProduct->exists($id)){
            throw new NotFoundException (__('Invalid products'));
        }
            $options = array('conditions' => array('SemiProduct.' . $this->SemiProduct->primaryKey => $id));
            $this->set('semiproducts', $this->SemiProduct->find('first', $options));
        }

    // Add and edit function in one method 
    
    public function save($id = null) {
        if(empty($id)){
            if ($this->request->is('post')) {
                $this->SemiProduct->create();
                if ($this->SemiProduct->saveAssociated($this->request->data)) {                //Magic saveAssociated funtion
                    $this->Flash->success(__('Product has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('The product could not be saved. Please, try again.'));
                }
            }else{
                $this->request->data['Article']['unit_id'] = 12;
                $this->request->data['Article']['type_id'] = 7;
            }
        }
        if(!empty($id)){
            if (!$this->SemiProduct->exists($id)) {
                throw new NotFoundException(__('Invalid product'));
            }
                $this->SemiProduct->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
                if ($this->SemiProduct->Article->save($this->request->data) && $this->SemiProduct->save($this->request->data)) {
                    $this->Flash->success(__('The product has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                        $this->Flash->error(__('The product could not be edited. Please, try again.'));
                    }
            } else {
                    $options = array('conditions' => array('SemiProduct.' . $this->SemiProduct->primaryKey => $id));
                    $this->request->data = $this->SemiProduct->find('first', $options);
                }
                $users = $this->SemiProduct->find('list');
            }
        

            // Set product status and rating
            $this->set('status', $this->SemiProduct->status);
            $this->set('rating', $this->SemiProduct->rating);
            
            //Set Article type and Unit
            $listTypes = $this->SemiProduct->Article->Type->find('list');
            $this->set('listTypes',$listTypes);
            $listUnits = $this->SemiProduct->Article->Unit->find('list');
            $this->set('listUnits',$listUnits);
        }
    
    // delete products
    public function delete($id = null){
        if(!$this->SemiProduct->exists($id)){
            throw new NotFoundException(__('Invalid product'));
        }
    
            $this->request->is('post', 'delete');
                if ($this->SemiProduct->delete($id)){
                    $this->Flash->success(__('Product has been deleted'));
                }else{
                    $this->Flash->error(__('Product could not be deleted, try again.'));
                }
                return $this->redirect(array('action' => 'index'));
            }
    
    
        }
    