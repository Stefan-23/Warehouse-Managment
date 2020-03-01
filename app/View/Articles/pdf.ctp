<?php

    $pdf->SetTopMargin(30);
    $pdf->setFooterMargin(25);
    $pdf->SetAutoPageBreak(true, 25);  
    //header of table
    $header = array('Code','Name','Description','Weight','Unit','Type');

    //text font
    $textfont = 'freesans';
    $pdf->SetFont($textfont,'B', 20);

    // add a page (required with recent versions of tcpdf) 
    $pdf->AddPage(); 
    $pdf->SetXY(0, 40);
    $pdf->Cell(0,0, "Articles", 0,1,'C');
    $pdf->SetY(60);
    //$pdf->Image('images/mikroe-timesaving-white.png', '', '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
    //Headers 
    $pdf->SetFont($textfont,'R', 10);
    $pdf->Cell(20,10, $header[0], 1,0,'L');
    $pdf->Cell(120,10, $header[1], 1,0,'L');
    $pdf->Cell(140,10, $header[2], 1,0,'L');
    $pdf->Cell(20,10, $header[3], 1,0,'L');
    $pdf->Cell(20,10, $header[4], 1,0,'L');
    $pdf->Cell(50,10, $header[5], 1,0,'L');
    $pdf->Ln();

    //fetch from base 
    foreach ($articles as $article){
        //$row = $row + 1;
        $pdf->Cell(20,10, $article['Type']['code'] . '-' . $article['Article']['type_number'], 1,0,'C');
        $pdf->Cell(120,10, $article['Article']['name'], 1,0,'L');
        $pdf->Cell(140,10, $article['Article']['description'], 1,0,'L');
        $pdf->Cell(20,10, $article['Article']['weight'], 1,0,'L');
        $pdf->Cell(20,10, $article['Unit']['symbol'], 1,0,'L');
        $pdf->Cell(50,10, $article['Type']['name'], 1,0,'L');
        $pdf->Ln();
       
   }
 
    //Generate pdf file      
    $filename .= '.pdf';
    $pdf->Output('articles.pdf', 'D');

?>