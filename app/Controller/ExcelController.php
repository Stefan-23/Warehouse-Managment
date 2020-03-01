<?php

   
        //Init Excel

        App::import('Vendor', 'Excel', array('file' => 'phpexcel/excel.php'));

        $active_sheet = 0;
        $starting_row = 1;

        $excel = new Excel();
        $excel->setActiveSheetIndex($active_sheet)
                ->setCellValue('A1','Hello')
                ->setCellvalue('B1','Zdravo!');

        $file = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $file->save('text.xlsx');


?>