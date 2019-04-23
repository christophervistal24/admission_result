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

//function hex2dec
//returns an associative array (keys: R,G,B) from a hex html code (e.g. #3FE5AA)
function hex2dec($couleur = "#000000"){
    $R                = substr($couleur, 1, 2);
    $rouge            = hexdec($R);
    $V                = substr($couleur, 3, 2);
    $vert             = hexdec($V);
    $B                = substr($couleur, 5, 2);
    $bleu             = hexdec($B);
    $tbl_couleur      = array();
    $tbl_couleur['R'] = $rouge;
    $tbl_couleur['G'] = $vert;
    $tbl_couleur['B'] = $bleu;
    return $tbl_couleur;
}

//conversion pixel -> millimeter in 72 dpi
function px2mm($px){
    return $px*25.4/72;
}

function txtentities($html){
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}

class PDF extends FPDF
{
//variables of html parser
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

//////////////////////////////////////
//html parser

function WriteHTML($html)
{
    $html=strip_tags($html,"<b><u><i><a><img><p><br><strong><em><font><tr><blockquote><hr><td><tr><table><sup>"); //remove all unsupported tags
    $html=str_replace("\n",'',$html); //replace carriage returns with spaces
    $html=str_replace("\t",'',$html); //replace carriage returns with spaces
    $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE); //explode the string
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            //Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            elseif($this->tdbegin) {
                if(trim($e)!='' && $e!="&nbsp;") {
                    $this->Cell($this->tdwidth,$this->tdheight,$e,$this->tableborder,'',$this->tdalign,$this->tdbgcolor);
                }
                elseif($e=="&nbsp;") {
                    $this->Cell($this->tdwidth,$this->tdheight,'',$this->tableborder,'',$this->tdalign,$this->tdbgcolor);
                }
            }
            else
                $this->Write(5,stripslashes(txtentities($e)));
        }
        else
        {
            //Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                //Extract attributes
                $a2=explode(' ',$e);
                $tag=strtoupper(array_shift($a2));
                $attr=array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])]=$a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    //Opening tag
    switch($tag){

        case 'SUP':
            if( !empty($attr['SUP']) ) {
                //Set current font to 6pt
                $this->SetFont('','',6);
                //Start 125cm plus width of cell to the right of left margin
                //Superscript "1"
                $this->Cell(2,2,$attr['SUP'],0,0,'L');
            }
            break;

        case 'TABLE': // TABLE-BEGIN
            if( !empty($attr['BORDER']) ) $this->tableborder=$attr['BORDER'];
            else $this->tableborder=0;
            break;
        case 'TR': //TR-BEGIN
            break;
        case 'TD': // TD-BEGIN
            if( !empty($attr['WIDTH']) ) $this->tdwidth=($attr['WIDTH']/4);
            else $this->tdwidth=40; // Set to your own width if you need bigger fixed cells
            if( !empty($attr['HEIGHT']) ) $this->tdheight=($attr['HEIGHT']/6);
            else $this->tdheight=6; // Set to your own height if you need bigger fixed cells
            if( !empty($attr['ALIGN']) ) {
                $align=$attr['ALIGN'];
                if($align=='LEFT') $this->tdalign='L';
                if($align=='CENTER') $this->tdalign='C';
                if($align=='RIGHT') $this->tdalign='R';
            }
            else $this->tdalign='L'; // Set to your own
            if( !empty($attr['BGCOLOR']) ) {
                $coul=hex2dec($attr['BGCOLOR']);
                    $this->SetFillColor($coul['R'],$coul['G'],$coul['B']);
                    $this->tdbgcolor=true;
                }
            $this->tdbegin=true;
            break;

        case 'HR':
            if( !empty($attr['WIDTH']) )
                $Width = $attr['WIDTH'];
            else
                $Width = $this->w - $this->lMargin-$this->rMargin;
            $x = $this->GetX();
            $y = $this->GetY();
            $this->SetLineWidth(0.2);
            $this->Line($x,$y,$x+$Width,$y);
            $this->SetLineWidth(0.2);
            $this->Ln(1);
            break;
        case 'STRONG':
            $this->SetStyle('B',true);
            break;
        case 'EM':
            $this->SetStyle('I',true);
            break;
        case 'B':
        case 'I':
        case 'U':
            $this->SetStyle($tag,true);
            break;
        case 'A':
            $this->HREF=$attr['HREF'];
            break;
        case 'IMG':
            if(isset($attr['SRC']) && (isset($attr['WIDTH']) || isset($attr['HEIGHT']))) {
                if(!isset($attr['WIDTH']))
                    $attr['WIDTH'] = 0;
                if(!isset($attr['HEIGHT']))
                    $attr['HEIGHT'] = 0;
                $this->Image($attr['SRC'], $this->GetX(), $this->GetY(), px2mm($attr['WIDTH']), px2mm($attr['HEIGHT']));
            }
            break;
        case 'BLOCKQUOTE':
        case 'BR':
            $this->Ln(5);
            break;
        case 'P':
            $this->Ln(10);
            break;
        case 'FONT':
            if (isset($attr['COLOR']) && $attr['COLOR']!='') {
                $coul=hex2dec($attr['COLOR']);
                $this->SetTextColor($coul['R'],$coul['G'],$coul['B']);
                $this->issetcolor=true;
            }
            if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist)) {
                $this->SetFont(strtolower($attr['FACE']));
                $this->issetfont=true;
            }
            if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist) && isset($attr['SIZE']) && $attr['SIZE']!='') {
                $this->SetFont(strtolower($attr['FACE']),'',$attr['SIZE']);
                $this->issetfont=true;
            }
            break;
    }
}

function CloseTag($tag)
{
    //Closing tag
    if($tag=='SUP') {
    }

    if($tag=='TD') { // TD-END
        $this->tdbegin=false;
        $this->tdwidth=0;
        $this->tdheight=0;
        $this->tdalign="L";
        $this->tdbgcolor=false;
    }
    if($tag=='TR') { // TR-END
        $this->Ln();
    }
    if($tag=='TABLE') { // TABLE-END
        $this->tableborder=0;
    }

    if($tag=='STRONG')
        $tag='B';
    if($tag=='EM')
        $tag='I';
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF='';
    if($tag=='FONT'){
        if ($this->issetcolor==true) {
            $this->SetTextColor(0);
        }
        if ($this->issetfont) {
            $this->SetFont('arial');
            $this->issetfont=false;
        }
    }
}

function SetStyle($tag, $enable)
{
    //Modify style and select corresponding font
    $this->$tag+=($enable ? 1 : -1);
    $style='';
    foreach(array('B','I','U') as $s) {
        if($this->$s>0)
            $style.=$s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    //Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}

function LoadData($file)
{
    // Read file lines
    foreach($file as $line)
        $data[] = explode(';',trim($line));
    return $data;
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

function BasicTable($header, $data)
{
    // Header
    $this->MultiCell(0,0,false);
    $this->setLeftMargin(50);
    foreach($header as $col)
        $this->Cell(40,7,$col,1,0,'C');
    $this->Ln();
    $i = 0;
    // Data
    foreach($data as $row)
    {
        foreach($row as $col){
            $i++;
            $this->Cell(40,6,$col,1,0,'C');

        }
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
$pdf->Cell(0,-25,'ENTRANCE EXAM RATING',0,0,'L');
$pdf->MultiCell(0,0,false);
$pdf->Ln(-8);
$pdf->setLeftMargin(35);

//START OF TABLE
$pdf->Cell(40,5,'TOTAL',1,0,'C',0);
$pdf->Cell(50,5,$result['over_all_total'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['over_all_total'],[64,25]),1,0,'C',0);


            $pdf->Ln(); //line break
$pdf->Cell(40,5,' ','LTR',0,'L',0);   // empty cell with left,top, and right borders
$pdf->Cell(50,5,$result['verbal_total'],0,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['verbal_total'],[21,13]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(40,5,' VERBAL','LR',0,'C',0);  // cell with left and right borders
$pdf->Cell(50,5,$result['verbal_comprehension'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['verbal_comprehension'],[8,5]),1,0,'C',0);
                $pdf->Ln();

$pdf->Cell(40,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders

$pdf->Cell(50,5,$result['verbal_reasoning'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['verbal_reasoning'],[13,8]),1,0,'C',0);

            $pdf->Ln(); //line break
$pdf->Cell(40,5,' ','LTR',0,'L',0);   // empty cell with left,top, and right borders
$pdf->Cell(50,5,$result['non_verbal_total'],0,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['non_verbal_total'],[24,13]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(40,5,' NON VERBAL','LR',0,'C',0);  // cell with left and right borders
$pdf->Cell(50,5,$result['figurative_reasoning'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['figurative_reasoning'],[11,6]),1,0,'C',0);

                $pdf->Ln();

$pdf->Cell(40,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders

$pdf->Cell(50,5,$result['quantitative_reasoning'],1,0,'C',0);
$pdf->Cell(50,5,Functions::calculateEquivalent($result['quantitative_reasoning'],[13,7]),1,0,'C',0);
// END OF TABLE

$pdf->SetFont('Arial','',7);
$pdf->setLeftMargin(20);
$pdf->setRightMargin(24);
$pdf->setRightMargin(24);
$pdf->Ln(20);
$pdf->Cell(0,0,'Date Printed: ' . date('d/m/Y h:i A',time()),0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Line(113,150,190,150);
$pdf->setRightMargin(87);
$pdf->Image($_SERVER['DOCUMENT_ROOT'] . '/system/assets/img/uploads/'.$result['signature'],145,137,15);
$pdf->Cell(0,0,$result['guidance_counselor'],0,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->setRightMargin(40);
$pdf->Cell(0,11,$result['position'],0,0,'R');
$pdf->setLeftMargin(20);
$pdf->Ln(10.5);
$pdf->SetFont('Arial','I',7);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,0,'NOT VALID IF THERE IS ANY ALTERATION',0,0,'L');
$pdf->setRightMargin(20);
$pdf->Cell(0,0,'VALID FOR ' . date('Y')  . ' - ' . date('Y',strtotime("+ 1 year")) . ' ONLY',0,0,'R');
$pdf->SetTextColor(0,0,0);
$pdf->Output();
?>