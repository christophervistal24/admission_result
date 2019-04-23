<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/App/init.php'; ?>
<?php
date_default_timezone_set('Asia/Manila');
use App\Model\User;
use App\Core\Functions;
$db = (new User)->connect();
$result = $db->query("
SELECT
    `examiner_info`.`firstname`,
    `examiner_info`.`middlename`,
    `examiner_info`.`lastname`,
    `examiner_info`.`sex`,
    `examiner_info`.`age`,
    `examiner_info`.`birthdate`,
    `entrace_rating`.`verbal_comprehension`,
    `entrace_rating`.`verbal_reasoning`,
    `entrace_rating`.`figurative_reasoning`,
    `entrace_rating`.`quantitative_reasoning`,
    `entrace_rating`.`verbal_total`,
    `entrace_rating`.`non_verbal_total`,
    `entrace_rating`.`over_all_total`, `course`.`course` as first_course,
    `course_2`.`course` as second_course ,`guidance_conselors`.`fullname` as guidance_counselor,
    `guidance_conselors`.`position` as position , `guidance_conselors`.`signature`
FROM
    admission_result
INNER JOIN examiner_info ON admission_result.examiner_info_id = examiner_info.id
LEFT JOIN entrace_rating ON admission_result.entrace_rating_id = entrace_rating.id
INNER JOIN course ON admission_result.preferred_course_id_1 = course.id
LEFT JOIN course AS course_2 ON admission_result.preferred_course_id_2 = course_2.id
LEFT JOIN guidance_conselors ON guidance_conselors.id = admission_result.guidance_counselor_id
WHERE
    admission_result.id = ' $_GET[id] '
")->fetch(PDO::FETCH_ASSOC);


class PDF extends FPDF
{
protected $B;
protected $I;
protected $U;
protected $HREF;
protected $fontList;
protected $issetfont;
protected $issetcolor;
function __construct($orientation='P', $unit='mm', $format='A4')
{
    //Call parent constructor
    parent::__construct($orientation,$unit,$format);

    //Initialization
    $this->B=0;
    $this->I=0;
    $this->U=0;
    $this->HREF='';

    $this->tableborder=0;
    $this->tdbegin=false;
    $this->tdwidth=0;
    $this->tdheight=0;
    $this->tdalign="L";
    $this->tdbgcolor=false;

    $this->oldx=0;
    $this->oldy=0;

    $this->fontlist=array("arial","times","courier","helvetica","symbol");
    $this->issetfont=false;
    $this->issetcolor=false;
}


// Page header
function Header()
{
    global $title;
    // Logo
    $this->Image($_SERVER['DOCUMENT_ROOT'] . '/system/assets/img/photos/sdssu.png',9,5,26);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->MultiCell(0,0,false);
    $this->Cell(0,0,'SURIGAO DEL SUR STATE UNIVERSITY',0,1,'C');

    $this->SetFont('Arial','',10);
    $this->Cell(0,9,'Guidance Center',0,0,'C');

    $this->SetFont('Arial','B',8);
    $this->Cell(-33,0,'Reference Code',0,0,'C');
    $this->Cell(33,7,'FM-GC-005E',0,0,'C');

    $this->MultiCell(0,0,false);
    $this->SetFont('Arial','',8);
    $this->Cell(346,14,'Revision Number',0,0,'C');

    $this->MultiCell(0,0,false);
    $this->SetFont('Arial','B',8);
    $this->Cell(346,21,'000',0,0,'C');

    $this->MultiCell(0,0,false);
    $this->SetFont('Arial','',8);
    $this->Cell(346,28,'Date Effective',0,0,'C');

    $this->MultiCell(0,0,false);
    $this->SetFont('Arial','B',8);
    $this->Cell(346,35,date('m/d/Y',time()),0,0,'C');


    $this->SetFont('Arial','',10);
    $this->MultiCell(0,0,false);
    $this->Cell(0,17,'Tel. No. (086)214-2735',0,0,'C');
    $this->MultiCell(0,0,false);
    $this->Cell(0,25,'Tandag City, Surigal del Sur',0,0,'C');
    $this->MultiCell(0,0,false);
    $this->SetTextColor(135,206,250);
    // Line break
    $this->Ln(14);
}



}


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
$pdf->Cell(40,20,ucfirst($result['lastname']),0,0,'C');
$pdf->Cell(110,20,ucfirst($result['firstname']),0,0,'C');
$pdf->Cell(45,20,ucfirst($result['middlename']),0,0,'C');
$pdf->MultiCell(0,0,false);
$pdf->Cell(40,28,'Last Name',0,0,'C');
$pdf->Cell(110,28,'Firstname ',0,0,'C');
$pdf->Cell(25,28,'M.I',0,1,'R');

$pdf->SetFont('Arial','',9);
$pdf->Cell(40,-18,ucfirst($result['sex']),0,0,'C');
$pdf->Cell(115,-18,ucfirst($result['age']),0,0,'C');
$pdf->Cell(23,-18,ucfirst($result['birthdate']),0,0,'C');
$pdf->MultiCell(0,0,false);
$pdf->Line(20,53,40,53);
$pdf->Line(95,53,119,53);
$pdf->Line(160,53,190,53);
$pdf->Cell(40,-10,'Sex',0,0,'C');
$pdf->Cell(115,-10,'Age',0,0,'C');
$pdf->Cell(19,-10,'Birthdate',0,0,'R');

$pdf->MultiCell(0,0,false);
$pdf->setLeftMargin(20);
$pdf->Cell(0,6,'1st  : ' . $result['first_course'],0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,13,'2nd : ' . $result['second_course'],0,0,'L');
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




$pdf->SetFont('Arial','B',7);
$pdf->setLeftMargin(20);
$pdf->setRightMargin(24);
$pdf->setRightMargin(24);
$pdf->Ln(20);
$pdf->Cell(0,3,'Date Printed: ' . date('d/m/Y h:i A',time()),0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Line(118,137,190,137);
$pdf->setRightMargin(87);
$pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/system/assets/img/uploads/'.$result['signature'],145,118,25,'png');
$pdf->Cell(0,0,$result['guidance_counselor'],0,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->setRightMargin(40);
$pdf->Cell(0,10,$result['position'],0,0,'R');
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
$pdf->Cell(22,-10,ucfirst($result['lastname']),0,0,'C');
$pdf->Cell(126,-10,ucfirst($result['firstname']),0,0,'C');
$pdf->Cell(30,-10,ucfirst($result['middlename']),0,0,'C');
$pdf->MultiCell(0,0,false);
$pdf->Cell(22,0,'Last Name',0,0,'C');
$pdf->Cell(126,0,'Firstname ',0,0,'C');
$pdf->Cell(30,0,'M.I',0,1,'C');

$pdf->SetFont('Arial','',9);
$pdf->Ln(-11);
$pdf->Cell(21,33,ucfirst($result['sex']),0,0,'C');
$pdf->Cell(132,33,ucfirst($result['age']),0,0,'C');
$pdf->Cell(25,33,ucfirst($result['birthdate']),0,0,'C');
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
$pdf->Cell(0,57,'1st  : ' . $result['first_course'],0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,64,'2nd : ' . $result['second_course'],0,0,'L');
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




$pdf->Output();
?>