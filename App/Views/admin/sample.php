
//SECOND FORM

 // Logo
    $pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/system/assets/img/photos/sdssu.png',9,168,26);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Move to the right
    $pdf->Cell(80);
    // Title
    $pdf->MultiCell(0,0,false);
    $pdf->Cell(0,0,'SURIGAO DEL SUR STATE UNIVERSITY',0,1,'C');

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,9,'Guidance Center',0,0,'C');

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(-30,0,'Reference Code',0,0,'C');
    $pdf->Cell(31,7,'FM-GC-005E',0,0,'C');

    $pdf->MultiCell(0,0,false);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(320,14,'Revision Number',0,0,'C');

    $pdf->MultiCell(0,0,false);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(320,21,'000',0,0,'C');

    $pdf->MultiCell(0,0,false);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(320,28,'Date Effective',0,0,'C');

    $pdf->MultiCell(0,0,false);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(320,35,date('m/d/Y',time()),0,0,'C');


    $pdf->SetFont('Arial','',10);
    $pdf->MultiCell(0,0,false);
    $pdf->Cell(0,17,'Tel. No. (086)214-2735',0,0,'C');
    $pdf->MultiCell(0,0,false);
    $pdf->Cell(0,25,'Tandag City, Surigal del Sur',0,0,'C');
    $pdf->MultiCell(0,0,false);
    // Line break
    $pdf->Ln(15);

    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,0,false);
    $pdf->Cell(0,8,'UNIVERSITY ADMISSION TEST RESULT',0,1,'C');

    $pdf->SetFont('Arial','I',9);
    $pdf->MultiCell(0,0,false);
    $pdf->Cell(0,0,'1st Semester AY ' . date('Y')  . ' - ' . date('Y',strtotime("+ 1 year")),0,1,'C');
    $pdf->SetFont('Arial','',9);
    
    $pdf->Line(20,205,197,205);
$pdf->MultiCell(0,0,false);
$pdf->SetFont('Arial','',9);
$pdf->Cell(22,13,ucfirst($result['lastname']),0,0,'C');
$pdf->Cell(126,13,ucfirst($result['firstname']),0,0,'C');
$pdf->Cell(30,13,ucfirst($result['middlename']),0,0,'C');
$pdf->MultiCell(0,0,false);
$pdf->Cell(22,22,'Last Name',0,0,'C');
$pdf->Cell(126,22,'Firstname ',0,0,'C');
$pdf->Cell(30,22,'M.I',0,1,'C');


$pdf->SetFont('Arial','',9);
$pdf->Ln(-15);
$pdf->Cell(21,23,ucfirst($result['sex']),0,0,'C');
$pdf->Cell(132,23,ucfirst($result['age']),0,0,'C');
$pdf->Cell(25,23,ucfirst($result['birthdate']),0,0,'C');
$pdf->MultiCell(0,0,false);
    // $pdf->Line(20,233,195,233);
$pdf->Line(21,217,40,217);
$pdf->Line(95,217,119,217);
$pdf->Line(175,217,195,217);
$pdf->Cell(21,31,'Sex',0,0,'C');
$pdf->Cell(132,31,'Age',0,0,'C');
$pdf->Cell(25,31,'Birthdate',0,0,'C');

$pdf->MultiCell(0,0,false);
$pdf->setLeftMargin(20);
$pdf->Cell(0,57,'1st  : ' . $result['first_course'],0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,64,'2nd : ' . $result['second_course'],0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,50,'Preferred Courses',0,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,-25,'ENTRANCE EXAM RATING',0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Ln(-8);

$pdf->Cell(68,10,'TOTAL',1,0,'C',0);
$pdf->Cell(50,5,'Raw score',1,0,'C',0);
$pdf->Cell(50,5,'Descriptive Equivalent',1,0,'C',0);


            $pdf->Ln(); //line break
$pdf->Cell(68,5,'',0,0,'C',0);
$pdf->Cell(50,5,$result['over_all_total'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['over_all_total'],[64,25]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(25,5,'VERBAL','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'',1,0,'L',0);
$pdf->Cell(50,5,$result['verbal_total'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['verbal_total'],[21,13]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(25,5,'','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'Verbal Comprehension',1,0,'L',0);
$pdf->Cell(50,5,$result['verbal_comprehension'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['verbal_comprehension'],[8,5]),1,0,'C',0);

                $pdf->Ln();
                
$pdf->Cell(25,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
$pdf->Cell(43,5,'Verbal reasoning',1,0,'L',0);
$pdf->Cell(50,5,$result['verbal_reasoning'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['verbal_comprehension'],[8,5]),1,0,'C',0);

                $pdf->Ln();


$pdf->Cell(25,10,'NON VERBAL','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'',1,0,'L',0);
$pdf->Cell(50,5,$result['non_verbal_total'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['non_verbal_total'],[24,13]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(25,5,'','LR',0,'L',0);  // cell with left and right borders
$pdf->Cell(43,5,'Figurative Reasoning',1,0,'L',0);
$pdf->Cell(50,5,$result['figurative_reasoning'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['figurative_reasoning'],[11,6]),1,0,'C',0);

                $pdf->Ln();
                
$pdf->Cell(25,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
$pdf->Cell(43,5,'Quantitative Reasoning',1,0,'L',0);
$pdf->Cell(50,5,$result['quantitative_reasoning'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['quantitative_reasoning'],[13,7]),1,0,'C',0);
                $pdf->Ln();

// END OF TABLE


$pdf->SetFont('Arial','I',8);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,12,'GUIDANCE CENTER COPY',0,0,'L');
