<?php 
    App::uses('AppController', 'Controller');
    App::uses('Folder', 'Utility');

    class MaterialsController extends AppController{
        
         public $components = array('Paginator');
         
        
    // index of materials
    public function index(){ 

            $this->Material->recursive=-1;
            $this->Paginator->settings = $this->Material->joinTable;          
            $this->set('materials', $this->Paginator->paginate('Material'));
          
        
    }

    // view materials
    public function view($id = null){
        if(!$this->Material->exists($id)){
            throw new NotFoundException (__('Invalid material'));
        }
            $options = array('conditions' => array('Material.' . $this->Material->primaryKey => $id));
            $this->set('material', $this->Material->find('first', $options));
        }

    // Add and edit function in one method 
    
    public function save($id = null) {
        if(empty($id)){
            if ($this->request->is('post')) {
                $this->Material->create();
                if ($this->Material->saveAssociated($this->request->data)) {                //Magic saveAssociated function
                    $this->Flash->success(__('Material has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('The material could not be saved. Please, try again.'));
                }
            }else{
                $this->request->data['Article']['unit_id'] = 12;
                $this->request->data['Article']['type_id'] = 2;
            }
        }
        if(!empty($id)){
            if (!$this->Material->exists($id)) {
                throw new NotFoundException(__('Invalid material'));
            }
                $this->Material->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
                if ($this->Material->Article->save($this->request->data) && $this->Material->save($this->request->data)) {
                    $this->Flash->success(__('The material has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                        $this->Flash->error(__('The material could not be edited. Please, try again.'));
                    }
            } else {
                    $options = array('conditions' => array('Material.' . $this->Material->primaryKey => $id));
                    $this->request->data = $this->Material->find('first', $options);
                }
                $users = $this->Material->find('list');
            }
        

            // Set material status and rating
            $this->set('status', $this->Material->status);
            $this->set('rating', $this->Material->rating);
            
            //Set Material type and Unit
            $listTypes = $this->Material->Article->Type->find('list');
            $this->set('listTypes', $listTypes);
            $listUnits = $this->Material->Article->Unit->find('list');
            $this->set('listUnits',$listUnits);
        }
    
    // delete materials
    public function delete($id = null){
        if(!$this->Material->exists($id)){
            throw new NotFoundException(__('Invalid material'));
        }
    
            $this->request->is('post', 'delete');
                if ($this->Material->delete($id)){
                    $this->Flash->success(__('Material has been deleted'));
                }else{
                    $this->Flash->error(__('Material could not be deleted, try again.'));
                }
                return $this->redirect(array('action' => 'index'));
            }


    //import Excel files
    public function import(){
            
        $this->set('title_for_layout', 'Import data from Excel');
        set_time_limit(0);

        if ($this->request->is('post') || $this->request->is('put')) {
        
        //Init data
        $starting_row = 2;
        $active_sheet = 0;                           

        //Check for uploaded file
            if(empty($this->request->data['Material']['excel']['name'])){
                    throw new Exception('Error, try again.');
            }

        //Check if uploaded file is in excel format
        $upload_name = $this->request->data['Material']['excel']['name'];

            if(substr($upload_name, -4) != '.xls' && substr($upload_name, -5) != '.xlsx'){
                  throw new Exception('File is not in Excel format!');
            }               

        //Move uploaded file
        $file = $this->request->data['Material']['excel'];
        $file['name'] = date('Ymdhis-') . $file['name'];
        $dir = new Folder(TMP, true, 0755); //0755 Linux permission command
            $dest = TMP . $file['name'];
            if(!move_uploaded_file($file['tmp_name'], $dest)){
                throw new Exception('File is not moved!');
            }

        //Init Excel
        App::import('Vendor', 'Excel', array('file' => 'phpexcel/excel.php'));
        $inputFileName = TMP.$file['name'];


        //Read your Excel workbook
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);

        //Set active sheet
        $objWorksheet = $objPHPExcel->setActiveSheetIndex($active_sheet);

        // Get worksheet dimensions
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();               
            $order_record_count = 0;
                for ($row = $starting_row; $row <= $highestRow + 1; $row++){
                    //Get row
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                    //Init form data
                    $form_data = array();                        
                    $form_data['Article']['id'] = '';
                    $form_data['Article']['name'] = $rowData[0][0];
                    $form_data['Article']['type_id'] = 2;
                    $form_data['Article']['unit_id'] = 12;
                    $form_data['Article']['weight'] = 0;
                    $form_data['Article']['description'] = '';
                    $form_data['Material']['material_status'] = $rowData[0][1];
                    $form_data['Material']['recommended_rating'] = $rowData[0][3];
                    $form_data['Material']['service_production'] = $rowData[0][2];
                    //Save to DB
                    $this->Material->create();
                    if (!$this->Material->saveAssociated($form_data)) {
                        $errors = $this->Material->validationErrors;                          
                        $message = print_r(array_merge($errors, $form_data), true);
                        $this->Flash->error(__("The material could not be saved. Errors: \n\n".$message));
                        break;
                    }   
                }
                $this->Flash->success(__('Successful import!'));
                return $this->redirect(array('action' => 'index'));
                    
                                                       
           }
    }
    
    
        }
    