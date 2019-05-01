<?php
use App\Core\PDF;
use App\Core\Functions;

$pdf = new PDF();
$pdf->AliasNbPages();
$title = 'Admission Result';
$pdf->AddPage('P');
$pdf->SetTitle($title);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,8,'UNIVERSITY ADMISSION TEST RESULT',0,1,'C');

$pdf->SetFont('Arial','I',9);
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,0,'1st Semester AY ' . date('Y')  . ' - ' . date('Y',strtotime("+ 1 year")),0,1,'C');


$pdf->SetFont('Arial','',9);
$pdf->Line(20,44,190,44);
$pdf->Cell(40,20,ucfirst($lastname),0,0,'C');
$pdf->Cell(110,20,ucfirst($firstname),0,0,'C');
$pdf->Cell(45,20,ucfirst($middlename),0,0,'C');
$pdf->MultiCell(0,0,false);
$pdf->Cell(40,28,'Last Name',0,0,'C');
$pdf->Cell(110,28,'Firstname ',0,0,'C');
$pdf->Cell(25,28,'M.I',0,1,'R');

$pdf->SetFont('Arial','',9);
$pdf->Cell(40,-18,ucfirst($sex),0,0,'C');
$pdf->Cell(115,-18,ucfirst($age),0,0,'C');
$pdf->Cell(23,-18,ucfirst($birthdate),0,0,'C');
$pdf->MultiCell(0,0,false);
$pdf->Line(20,53,40,53);
$pdf->Line(95,53,119,53);
$pdf->Line(160,53,190,53);
$pdf->Cell(40,-10,'Sex',0,0,'C');
$pdf->Cell(115,-10,'Age',0,0,'C');
$pdf->Cell(19,-10,'Birthdate',0,0,'R');

$pdf->MultiCell(0,0,false);
$pdf->setLeftMargin(20);
$pdf->Cell(0,6,'1st  : ' . $first_course,0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,13,'2nd : ' . $second_course,0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,0,'Preferred Courses',0,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,23,'ENTRANCE EXAM RATING',0,0,'L');
$pdf->MultiCell(0,0,false);

$pdf->Ln(15);

$pdf->Cell(68,10,'TOTAL',1,0,'C',0);
$pdf->Cell(50,5,'Raw score',1,0,'C',0);
$pdf->Cell(50,5,'Descriptive Equivalent',1,0,'C',0);


            $pdf->Ln(); //line break
$pdf->Cell(68,5,'',0,0,'C',0);
$pdf->Cell(50,5,$over_all_total,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($over_all_total,[64,25]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(25,5,'VERBAL','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'',1,0,'L',0);
$pdf->Cell(50,5,$verbal_total,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($verbal_total,[21,13]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(25,5,'','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'Verbal Comprehension',1,0,'L',0);
$pdf->Cell(50,5,$verbal_comprehension,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($verbal_comprehension,[8,5]),1,0,'C',0);

                $pdf->Ln();
                
$pdf->Cell(25,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
$pdf->Cell(43,5,'Verbal reasoning',1,0,'L',0);
$pdf->Cell(50,5,$verbal_reasoning,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($verbal_comprehension,[8,5]),1,0,'C',0);

                $pdf->Ln();


$pdf->Cell(25,10,'NON VERBAL','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'',1,0,'L',0);
$pdf->Cell(50,5,$non_verbal_total,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($non_verbal_total,[24,13]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(25,5,'','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'Figurative Reasoning',1,0,'L',0);
$pdf->Cell(50,5,$figurative_reasoning,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($figurative_reasoning,[11,6]),1,0,'C',0);

                $pdf->Ln();
                
$pdf->Cell(25,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
$pdf->Cell(43,5,'Quantitative Reasoning',1,0,'L',0);
$pdf->Cell(50,5,$quantitative_reasoning,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($quantitative_reasoning,[13,7]),1,0,'C',0);

                $pdf->Ln();




// END OF TABLE


$pdf->SetFont('Arial','B',7);
$pdf->setLeftMargin(20);
$pdf->setRightMargin(24);
$pdf->setRightMargin(24);
$pdf->Ln(20);
$pdf->Cell(0,3,'Date Printed: ' . date('d/m/Y h:i A',time()),0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Line(118,137,190,137);
$pdf->setRightMargin(87);
$pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/system/assets/img/uploads/'.$signature,145,118,25,'png');
$pdf->Cell(0,0,$guidance_counselor,0,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->setRightMargin(40);
$pdf->Cell(0,10,$position,0,0,'R');
$pdf->setLeftMargin(20);
$pdf->Ln(10.5);
$pdf->SetFont('Arial','I',7);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,0,'NOT VALID IF THERE IS ANY ALTERATION',0,0,'L');
$pdf->setRightMargin(20);
$pdf->Cell(0,0,'VALID FOR ' . date('Y')  . ' - ' . date('Y',strtotime("+ 1 year")) . ' ONLY',0,0,'R');
$pdf->SetTextColor(0,0,0);
$pdf->Ln(5);



//SECOND FORM

 // Logo
    $pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/system/assets/img/photos/sdssu.png',9,158,26);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Move to the right
    $pdf->Cell(80);
    // Title
    $pdf->MultiCell(0,0,false);
    $pdf->Cell(0,25,'SURIGAO DEL SUR STATE UNIVERSITY',0,1,'C');

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,-16,'Guidance Center',0,0,'C');

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(-30,-26,'Reference Code',0,0,'C');
    $pdf->Cell(30,-20,'FM-GC-005E',0,0,'C');

    $pdf->MultiCell(0,0,false);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(310,-15,'Revision Number',0,0,'C');

    $pdf->MultiCell(0,0,false);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(310,-10,'000',0,0,'C');

    $pdf->MultiCell(0,0,false);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(310,-4,'Date Effective',0,0,'C');

    $pdf->MultiCell(0,0,false);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(310,2,date('m/d/Y',time()),0,0,'C');


    $pdf->SetFont('Arial','',10);
    $pdf->MultiCell(0,0,false);
    $pdf->Cell(0,-8,'Tel. No. (086)214-2735',0,0,'C');
    $pdf->MultiCell(0,0,false);
    $pdf->Cell(0,0,'Tandag City, Surigal del Sur',0,0,'C');
    $pdf->MultiCell(0,0,false);
    // Line break
    $pdf->Ln(15);

    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,0,false);
    $pdf->Cell(0,-20,'UNIVERSITY ADMISSION TEST RESULT',0,1,'C');

    $pdf->SetFont('Arial','I',9);
    $pdf->MultiCell(0,0,false);
    $pdf->Cell(0,27,'1st Semester AY ' . date('Y')  . ' - ' . date('Y',strtotime("+ 1 year")),0,1,'C');
    $pdf->SetFont('Arial','',9);
    
    $pdf->Line(20,195,197,195);
$pdf->MultiCell(0,0,false);
$pdf->SetFont('Arial','',9);
$pdf->Cell(22,-10,ucfirst($lastname),0,0,'C');
$pdf->Cell(126,-10,ucfirst($firstname),0,0,'C');
$pdf->Cell(30,-10,ucfirst($middlename),0,0,'C');
$pdf->MultiCell(0,0,false);
$pdf->Cell(22,0,'Last Name',0,0,'C');
$pdf->Cell(126,0,'Firstname ',0,0,'C');
$pdf->Cell(30,0,'M.I',0,1,'C');

$pdf->SetFont('Arial','',9);
$pdf->Ln(-11);
$pdf->Cell(21,33,ucfirst($sex),0,0,'C');
$pdf->Cell(132,33,ucfirst($age),0,0,'C');
$pdf->Cell(25,33,ucfirst($birthdate),0,0,'C');
$pdf->MultiCell(0,0,false);
    // $pdf->Line(20,233,195,233);
$pdf->Line(21,204.5,40,204.5);
$pdf->Line(95,204.5,119,204.5);
$pdf->Line(175,204.5,195,204.5);
$pdf->Cell(21,40,'Sex',0,0,'C');
$pdf->Cell(132,40,'Age',0,0,'C');
$pdf->Cell(25,40,'Birthdate',0,0,'C');

$pdf->MultiCell(0,0,false);
$pdf->setLeftMargin(20);
$pdf->Cell(0,57,'1st  : ' . $first_course,0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,64,'2nd : ' . $second_course,0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,50,'Preferred Courses',0,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,-28,'ENTRANCE EXAM RATING',0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Ln(-12);

$pdf->Cell(68,10,'TOTAL',1,0,'C',0);
$pdf->Cell(50,5,'Raw score',1,0,'C',0);
$pdf->Cell(50,5,'Descriptive Equivalent',1,0,'C',0);


            $pdf->Ln(); //line break
$pdf->Cell(68,5,'',0,0,'C',0);
$pdf->Cell(50,5,$over_all_total,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($over_all_total,[64,25]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(25,5,'VERBAL','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'',1,0,'L',0);
$pdf->Cell(50,5,$verbal_total,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($verbal_total,[21,13]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(25,5,'','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'Verbal Comprehension',1,0,'L',0);
$pdf->Cell(50,5,$verbal_comprehension,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($verbal_comprehension,[8,5]),1,0,'C',0);

                $pdf->Ln();
                
$pdf->Cell(25,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
$pdf->Cell(43,5,'Verbal reasoning',1,0,'L',0);
$pdf->Cell(50,5,$verbal_reasoning,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($verbal_comprehension,[8,5]),1,0,'C',0);

                $pdf->Ln();


$pdf->Cell(25,10,'NON VERBAL','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'',1,0,'L',0);
$pdf->Cell(50,5,$non_verbal_total,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($non_verbal_total,[24,13]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(25,5,'','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'Figurative Reasoning',1,0,'L',0);
$pdf->Cell(50,5,$figurative_reasoning,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($figurative_reasoning,[11,6]),1,0,'C',0);

                $pdf->Ln();
                
$pdf->Cell(25,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
$pdf->Cell(43,5,'Quantitative Reasoning',1,0,'L',0);
$pdf->Cell(50,5,$quantitative_reasoning,1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($quantitative_reasoning,[13,7]),1,0,'C',0);
                $pdf->Ln();

// END OF TABLE


$pdf->SetFont('Arial','I',8);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,12,'GUIDANCE CENTER COPY',0,0,'L');




$pdf->Output();
?>
