<?php
namespace App\Core;

use FPDF;

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
