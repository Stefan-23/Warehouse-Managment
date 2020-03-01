<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');


    class GoodsController extends AppController {

        public $components = array('Paginator');
       
        // index of goods
        public function index(){ 
            $this->Good->recursive=-1;
            $this->Paginator->settings = $this->Good->joinTable;
            $this->set('goods', $this->Paginator->paginate('Good'));
        }

        // view goods
        public function view($id = null){
            if(!$this->Good->exists($id)){
                throw new NotFoundException (__('Invalid good'));
            }
                $options = array('conditions' => array('Good.' . $this->Good->primaryKey => $id));
                $this->set('good', $this->Good->find('first', $options));
            }

        // Add and edit function in one method 
   
        public function save($id = null) {
            if(empty($id)){
                if ($this->request->is('post')) {
                    $this->Good->create();
                if ($this->Article->Good->saveAssociated($this->request->data)) {                //Magic saveAssociated function
                    $this->Flash->success(__('Good has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }   else {
                    $this->Flash->error(__('The good could not be saved. Please fill all fields for selected status(Pid,HS Number,Tax Group,ECCN,Release date).'));
               }
            }else{
                $this->request->data['Article']['unit_id'] = 12;
                $this->request->data['Article']['type_id'] = 15;
            }
       }
        // Edit
            if(!empty($id)){
                if (!$this->Good->exists($id)) {
                throw new NotFoundException(__('Invalid good'));
            }
               $this->Good->id = $id; //key for updating refers to id !
            if ($this->request->is(array('post', 'put'))) {
               if ($this->Good->Article->save($this->request->data) && $this->Good->save($this->request->data)) {
                    $this->Flash->success(__('The good has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('This good could not be saved. Please fill all fields for selected status(Pid,HS Number,Tax Group,ECCN,Release date).'));
                   }
           } else {
                    $options = array('conditions' => array('Good.' . $this->Good->primaryKey => $id));
                    $this->request->data = $this->Good->find('first', $options);
               }
           }
       

                // Set Good status and rating
                $this->set('status', $this->Good->status);
          
           
                //Set Good type and Unit
                $listTypes = $this->Good->Article->Type->find('list');
                $this->set('listTypes', $listTypes);
                $listUnits = $this->Good->Article->Unit->find('list');
                $this->set('listUnits',$listUnits);
       }
   
        // delete good
        public function delete($id = null){
            if(!$this->Good->exists($id)){
                throw new NotFoundException(__('Invalid goods'));
            }
                $this->request->is('post', 'delete');
               if ($this->Good->delete($id)){
                   $this->Flash->success(__('Good has been deleted'));
               }else{
                   $this->Flash->error(__('Good could not be deleted, try again.'));
               }
               return $this->redirect(array('action' => 'index'));
           }
   

        //import Excel files
        public function import(){
            
            $this->set('title_for_layout', 'Import data from Excel');
            set_time_limit(0);

            if ($this->request->is('post') || $this->request->is('put')) {
            
            //Init data
            $starting_row = 10;
            $active_sheet = 0;                           

            //Check for uploaded file
                if(empty($this->request->data['Good']['excel']['name'])){
                        throw new Exception('Error, try again.');
                }

            //Check if uploaded file is in excel format
            $upload_name = $this->request->data['Good']['excel']['name'];

                if(substr($upload_name, -4) != '.xls' && substr($upload_name, -5) != '.xlsx'){
                      throw new Exception('File is not in Excel format!');
                }               

            //Move uploaded file
            $file = $this->request->data['Good']['excel'];
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
                        $form_data['Article']['type_id'] = 15;
                        $form_data['Article']['unit_id'] = 12;
                        $form_data['Article']['weight'] = 0;
                        $form_data['Article']['description'] = '';
                        $form_data['Good']['pid'] = $rowData[0][1];
                        $form_data['Good']['hs_number'] = $rowData[0][2];
                        $form_data['Good']['tax_group'] = $rowData[0][3];
                        $form_data['Good']['product_eccn'] = $rowData[0][4];
                        $form_data['Good']['release_date'] = $rowData[0][5];
                        $form_data['Good']['for_distributors'] = $rowData[0][6];
                        $form_data['Good']['product_status'] = $rowData[0][7];
                        $form_data['Good']['service_production'] = $rowData[0][8];
                        
            
                       
                        //Save to DB
                        $this->Good->create();
                        if (!$this->Good->saveAssociated($form_data)) {
                            //$errors = $this->Article->Material->validationErrors;                          
                           // $message = print_r(array_merge($errors, $form_data), true);
                            //$this->Flash->error(__("The material could not be saved. Errors: \n\n".$message));
                           // break;
                        }   
                    }
                    $this->Flash->success(__('Success'));
                    return $this->redirect(array('action' => 'index'));
                        
                                                           
               }
        }
        
}
   
    