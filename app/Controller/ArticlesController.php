<?php 
    App::uses('AppController', 'Controller');
    //App::import('Vendor', 'Folder', array('file' => 'folder/folder.php'));
    App::uses('Folder', 'Utility');


    //Article class

    class ArticlesController extends AppController{

        public $components = array('Paginator');
        
        // index of articles

        public function index(){ 
            $this->Article->recursive=0;
            $this->set('articles', $this->Paginator->paginate());
        }
    
        //search function
        public function search() {
            if ($this->request->is('post')) {
                $keyword = $this->request->data['Article']['keyword']; //checking input field 
                $this->paginate = array(
                    'fields' => array('Article.id','Type.code','Article.type_number','Article.name', 'Article.description','Article.weight','Unit.symbol','Type.name'), //selecting wich fields we want to use for search 
                    'order' => array('Article.created' => 'DESC'),
                    'conditions' => array('Article.name LIKE' => '%' . $keyword . '%'),
                );
            }
            
            $this->set('articles', $this->paginate('Article'));
        }
        // view articles
        
        public function getData(){
            $this->Article->recursive = 0;
            
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

        public function view($id = null){
            if(!$this->Article->exists($id)){
                throw new NotFoundException (__('Invalid article'));
            }
        $options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
        $this->set('article', $this->Article->find('first', $options));
        }


        // delete articles
        public function delete($id = null){
            if(!$this->Article->exists($id)){
                throw new NotFoundException(__('Invalid article'));
            }
            $this->request->is('post', 'delete');
            if ($this->Article->delete($id)){
                $this->Flash->success(__('Article has been deleted'));
            }else{
                $this->Flash->error(__('Article could not be deleted, try again.'));
            }

            return $this->redirect(array('action' => 'index'));
        }

        //Export Excel data
        public function export(){

            //init PHPExcel library
            App::import('Vendor', 'Excel', array('file' => 'phpexcel/excel.php'));

            //get all data from database
            $articles = $this->Article->find('all');
            $this->set('articles', $articles);

            //generate file for Excel
            $this->layout = 'xls';
            $this->autoRender = false;
            $this->response->type('application/vnd.ms-excel');

            //set PHPExcel object
            $objPHPExcel = new Excel();
            $this->set('objPHPExcel', $objPHPExcel);

            //set your filename
            $filename = 'articles.xls';
            $this->set('filename', $filename);

            //render file   (app/view/Articles/export.ctp)-- view for this function
            $this->render('export');

        }
        
        //export pdf
        public function pdfExport(){

            $pdf = null;
            while (!class_exists('PDF')) {
            //Init PDF
            App::import('Vendor', 'PDF', array('file' => 'tcpdf' . DS . 'pdf.php'));
            }
            $pdf = new PDF('L', 'mm','A3', true, 'UTF-8', false);
            $articles = $this->Article->find('all');
            $this->set('articles', $articles);
            $filename ='articles';
            $this->set('filename', $filename);
            $this->set('pdf', $pdf);
            
            $this->autoRender = false;
            $this->response->type('application/pdf');                   
            $this->render('pdf');
        }


        
    }