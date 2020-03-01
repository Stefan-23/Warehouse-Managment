<?php
App::uses('AppController','Controller');

//Type class CRUD logic

class TypesController extends AppController{
    
    public $components = array('Paginator');
    
    //Index method for Types

    public function index(){
        $this->Type->recursive = 0;
        $this->set('types', $this->Paginator->paginate());
    }
    public function search() {
        if ($this->request->is('post')) {
            $keyword = $this->request->data['Type']['keyword'];
            $this->paginate = array(
                'fields' => array('Type.id','Type.code', 'Type.name', 'Type.class','Type.tangible','Type.active','Type.created','Type.modified'),
                'order' => array('Type.created' => 'DESC'),
                'limit' => 5,
                'conditions' => array('Type.name LIKE' => '%' . $keyword . '%'),
            );
        }
        
        $this->set('types', $this->paginate('Type'));
    }
    //View method 

    public function view($id = null){
        if(!$this->Type->exists($id)){
            throw new NotFoundException (__('Invalid type'));
        }
        $options = array('conditions' => array('Type.' . $this->Type->primaryKey => $id));
        $this->set('type', $this->Type->find('first', $options));
    }
    //Add and edit method, both in one function(save)

    public function save($id = null) {
		if(empty($id)){
            if ($this->request->is('post')) {
                $this->Type->create();
                if ($this->Type->save($this->request->data)) {
                    $this->Flash->success(__('The type has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('The type could not be saved. Please, try again.'));
                }
            }
            $users = $this->Type->find('list');
        }
        if(!empty($id)){
            if (!$this->Type->exists($id)) {
                throw new NotFoundException(__('Invalid post'));
            }
            $this->Type->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
                if ($this->Type->save($this->request->data)) {
                    $this->Flash->success(__('The type has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('The post could not be edited. Please, try again.'));
                }
            } else {
                $options = array('conditions' => array('Type.' . $this->Type->primaryKey => $id));
                $this->request->data = $this->Type->find('first', $options);
            }
            $users = $this->Type->find('list');
           
        }
        $this->set('classes', $this->Type->classes);
	}
    //delete function 
    public function delete($id = null){
        if(!$this->Type->exists($id)){
            throw new NotFoundException(__('Invalid type'));
        }

        $this->request->allowMethod('post', 'delete');
        if ($this->Type->delete($id)){
            $this->Flash->success(__('Type has been deleted'));
        }else{
            $this->Flash->error(__('Type could not be deleted, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}