<?php
    
   $active_sheet = 0; //dynamically set active sheet
   $starting_row = 1; //starting row of data
   
    //Set values in table
   $objPHPExcel->setActiveSheetIndex($active_sheet)
               ->setCellValue('A1','Code')
               ->setCellvalue('B1','Name')->mergeCells('B1:D1')
               ->setCellvalue('E1','Description')->mergeCells('E1:H1')
               ->setCellvalue('I1','Weight')
               ->setCellvalue('J1','Unit')
               ->setCellvalue('K1','Type')->mergeCells('K1:L1');

    $objPHPExcel->getActiveSheet($active_sheet)->mergeCells('B1:D1');

    //fetch data from database 
   $row = 1;
    foreach ($articles as $article){
       $row = $row + 1;
       $objPHPExcel->setActiveSheetIndex(0)
       ->setCellValue('A'.$row,$article['Type']['code'] . '-' . $article['Article']['type_number'])
       ->setCellValue('B'.$row,$article['Article']['name'])->mergeCells('B' . $row . ":D" .$row)
       ->setCellValue('E'.$row,$article['Article']['description'])->mergeCells('E' . $row . ":H" .$row)
       ->setCellValue('I'.$row,$article['Article']['weight'])
       ->setCellValue('J'.$row,$article['Unit']['symbol'])
       ->setCellValue('K'.$row,$article['Type']['name'])->mergeCells('K' . $row . ":L" .$row);
   }

    //redirect
   header('Contetn-Type: application/vnd.openxmlformats-officedocument.spreadshhetml.sheet');
   header('Content-Disposition: attachemt; ');
   header('Cache-Control: max-age = 0');

    //download and set name of the file
    $file = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $file->save('php://output', $filename);   



    

           
            
