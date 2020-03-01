<?php 
App::uses('AppController','Controller');

//Unit class CRUD logic

class UnitsController extends AppController{
    
    public $components = array('Paginator');
    
    //Index method for Units

    public function index(){
        $this->Unit->recursive = 0;
        $this->set('units', $this->Paginator->paginate());
    }
    //View method for View

    public function view($id = null){
        if(!$this->Unit->exists($id)){
            throw new NotFoundException (__('Invalid unit'));
        }
        $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
        $this->set('unit', $this->Unit->find('first', $options));
    }
    //Add and edit method, both in one fucntion(save)

    public function save($id = null) {
		if(empty($id)){
            if ($this->request->is('post')) {
                $this->Unit->create();
                if ($this->Unit->save($this->request->data)) {
                    $this->Flash->success(__('The unit has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('The unit could not be saved. Please, try again.'));
                }
            }
            $users = $this->Unit->find('list');
        }
        if(!empty($id)){
            if (!$this->Unit->exists($id)) {
                throw new NotFoundException(__('Invalid post'));
            }
            $this->Unit->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
                if ($this->Unit->save($this->request->data)) {
                    $this->Flash->success(__('The unit has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('The post could not be edited. Please, try again.'));
                }
            } else {
                $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
                $this->request->data = $this->Unit->find('first', $options);
            }
            $users = $this->Unit->find('list');
           
        }
	}
    //delete function 
    public function delete($id = null){
        if(!$this->Unit->exists($id)){
            throw new NotFoundException(__('Invalid unit'));
        }

        $this->request->allowMethod('post', 'delete');
        if ($this->Unit->delete($id)){
            $this->Flash->success(__('Unit has been deleted'));
        }else{
            $this->Flash->error(__('Unit could not be deleted, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }




} 