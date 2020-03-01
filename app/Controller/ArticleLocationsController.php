<?php

    class ArticleLocationsController extends AppController{
    
        public $components = array('Paginator');

        public function index(){
            $this->ArticleLocation->recursive =0;
            $this->set('articlelocations' , $this->Paginator->paginate());
        }

        public function view($id = null){
            if(!$this->ArticleLocation->exists($id)){
                $this->Flash->error(__('Invalid address'));
            }
            $options = array('conditions' => array('ArticleLocation.' . $this->ArticleLocation->primaryKey => $id));
            $this->set('articlelocation', $this->ArticleLocation->find('first', $options));
        }


        public function getData(){
            $this->ArticleLocation->Article->recursive = 0;
            
            $articles = $this->Paginator->paginate();

            $row = [];

            foreach($articles as $location){
                $row[] = ['id'=> $location['Article']['id'],'text'=>$location['Article']['name']];
            }
           
            $json = json_encode(['results'=> $row,'pagination'=>['more'=>$this->request->params['paging']['Article']['nextPage']]]);

            $this->autoRender = false;

            // debug($this->request);

            return  $json;

        }

        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->ArticleLocation->create();
                    if ($this->ArticleLocation->saveAssociated($this->request->data)) {                
                        $this->Flash->success(__('Address has been saved.'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Flash->error(__('This address could not be saved. Please, try again.'));
                    }
                }
            }
            if(!empty($id)){
                if (!$this->ArticleLocation->exists($id)) {
                    throw new NotFoundException(__('Invalid address'));
                }
                    $this->ArticleLocation->id = $id; //key for updating refers to id !
                if ($this->request->is(array('post', 'put'))) {
                    if ($this->ArticleLocation->save($this->request->data)) {
                        $this->Flash->success(__('The address has been edited.'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Flash->error(__('The address could not be edited. Please, try again.'));
                        }
                } else {
                        $options = array('conditions' => array('ArticleLocation.' . $this->ArticleLocation->primaryKey => $id));
                        $this->request->data = $this->ArticleLocation->find('first', $options);
                    }
                    $articlelocations = $this->ArticleLocation->find('list');
                }

                $address = $this->ArticleLocation->WarehouseLocation->find('list', array('fields' => 'address_code' ));
                $this->set('address',$address);
                $article =$this->ArticleLocation->Article->find('list');
                $this->set('article',$article);
            }

        public function delete($id = null){
            if (!$this->ArticleLocation->exists($id)) {
                throw new NotFoundException(__('Invalid address'));
            }
            $this->request->allowMethod('post', 'delete');
            if ($this->ArticleLocation->delete($id)) {
                $this->Flash->success(__('The address has been deleted.'));
            } else {
                $this->Flash->error(__('The address could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }

        
    }