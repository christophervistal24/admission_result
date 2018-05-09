<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/App/init.php'; ?>
<?php
use App\Model\User;
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
    `entrace_rating`.`over_all_total`,
    `course`.`course` as first_course,
    `course_2`.`course` as second_course
FROM
    admission_result
    INNER JOIN examiner_info ON admission_result.examiner_info_id = examiner_info.id
    LEFT JOIN entrace_rating ON admission_result.entrace_rating_id = entrace_rating.id
    INNER JOIN course ON admission_result.preferred_course_id_1 = course.id
    LEFT JOIN course AS course_2
ON
    admission_result.preferred_course_id_2 = course_2.id
WHERE
    admission_result.id = ' $_GET[id] '
")->fetch(PDO::FETCH_ASSOC);
 class PDF extends FPDF
{
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

    $this->SetFont('Arial','B',10);
    $this->Cell(-20,0,'Reference Code',0,0,'C');
    $this->Cell(19,7,'FM-GC-005E',0,0,'C');

    $this->MultiCell(0,0,false);
    $this->SetFont('Arial','',10);
    $this->Cell(359,14,'Revision Number',0,0,'C');

    $this->MultiCell(0,0,false);
    $this->SetFont('Arial','B',10);
    $this->Cell(359,21,'000',0,0,'C');

    $this->MultiCell(0,0,false);
    $this->SetFont('Arial','',10);
    $this->Cell(359,28,'Date Effective',0,0,'C');

    $this->MultiCell(0,0,false);
    $this->SetFont('Arial','B',10);
    $this->Cell(359,35,date('m/d/Y',time()),0,0,'C');


    $this->SetFont('Arial','',10);
    $this->MultiCell(0,0,false);
    $this->Cell(0,17,'Tel. No. (086)214-2735',0,0,'C');
    $this->MultiCell(0,0,false);
    $this->Cell(0,25,'Tandag City, Surigal del Sur',0,0,'C');
    $this->MultiCell(0,0,false);
    $this->SetTextColor(135,206,250);
    $this->Cell(0,33,'www.sdssu.edu.ph',0,0,'C');
    $this->Cell(0,33,'','','','',false, "www.sdssu.edu.ph");
    // Line break
    $this->Ln(20);
}

function BasicTable()
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'R');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$title = 'Admission Result';
$pdf->SetTitle($title);
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,8,'UNIVERSITY ADMISSION TEST RESULT',0,1,'C');

$pdf->SetFont('Arial','I',9);
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,0,'1st Semester AY ' . date('Y')  . ' - ' . date('Y',strtotime("+ 1 year")),0,1,'C');


$pdf->SetFont('Arial','',9);
$pdf->Line(20,55,190,55);
$pdf->Cell(40,30,ucfirst($result['lastname']),0,0,'C');
$pdf->Cell(110,30,ucfirst($result['firstname']),0,0,'C');
$pdf->Cell(45,30,ucfirst($result['middlename']),0,0,'C');
$pdf->MultiCell(0,0,false);
$pdf->Cell(40,40,'Last Name',0,0,'C');
$pdf->Cell(110,40,'Firstname ',0,0,'C');
$pdf->Cell(25,40,'M.I',0,1,'R');

$pdf->SetFont('Arial','',9);
$pdf->Ln(-22);
$pdf->Cell(40,23,ucfirst($result['sex']),0,0,'C');
$pdf->Cell(115,23,ucfirst($result['age']),0,0,'C');
$pdf->Cell(23,23,ucfirst($result['birthdate']),0,0,'C');
$pdf->MultiCell(0,0,false);
$pdf->Line(20,69,40,69);
$pdf->Line(95,69,119,69);
$pdf->Line(160,69,190,69);
$pdf->Cell(40,30,'Sex',0,0,'C');
$pdf->Cell(115,30,'Age',0,0,'C');
$pdf->Cell(19,30,'Birthdate',0,0,'R');

$pdf->MultiCell(0,0,false);
$pdf->setLeftMargin(20);
$pdf->Cell(0,57,'1st  : ' . $result['first_course'],0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,64,'2nd : ' . $result['second_course'],0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Cell(0,50,'Preferred Courses',0,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,-25,'ENTRACE EXAM RATING',0,0,'L');



$pdf->Output();
?>