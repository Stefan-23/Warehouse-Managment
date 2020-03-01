<?php
App::uses('AppController', 'Controller');

class GroupsController extends AppController {

	public $components = array('Paginator');


	public function index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('groups', $this->Group->find('first', $options));
	}


	public function save($id = null) {
        if(empty($id)){
            if ($this->request->is('post')) {
                $this->Group->create();
                if ($this->Group->save($this->request->data)) {                //Magic saveAssociated function
                    $this->Flash->success(__('Group has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('The group could not be saved. Please, try again.'));
                }
            }
        }
        if(!empty($id)){
            if (!$this->Group->exists($id)) {
                throw new NotFoundException(__('Invalid group'));
            }
                $this->Group->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
                if ($this->Group->save($this->request->data) && $this->Group->save($this->request->data)) {
                    $this->Flash->success(__('The group has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                        $this->Flash->error(__('The group could not be edited. Please, try again.'));
                    }
            } else {
                    $options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
                    $this->request->data = $this->Group->find('first', $options);
                }
                $groups = $this->Group->find('list');
            }
        }

	public function delete($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Group->delete($id)) {
			$this->Flash->success(__('The group has been deleted.'));
		} else {
			$this->Flash->error(__('The group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
}


?>