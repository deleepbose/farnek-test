<?php
require_once('class/pdf/config/lang/eng.php');
require_once('class/pdf/tcpdf.php');

include_once 'config/Database.php';
include_once 'class/Records.php';

$database = new Database();
$db = $database->getConnection();

$record = new Records($db);

$record->id = $_REQUEST["elemID"];
$elemDetails = json_decode($record->getRecord());

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Deleep Bose');
$pdf->SetTitle('Farnek Dynamic List - Record ' .$elemDetails->id. ' Details');
$pdf->SetSubject('PDF Details');
$pdf->SetKeywords('Farnek, Record Details, PDF');

// set default header data
$pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, 'Farnek Dynamic List - Record ' .$elemDetails->id. ' Details', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.

$pdf->SetFont('helvetica', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// Set some content to print
$html = '<p><span style="font-weight:bold;">ID: </span> '.$elemDetails->id.'</p>';

if($elemDetails->name != '')
	$html .= '<p><span style="font-weight:bold;">Name: </span> '.$elemDetails->name.'</p>';

if($elemDetails->age != '')
	$html .= '<p><span style="font-weight:bold;">Age: </span> '.$elemDetails->age.'</p>';

if($elemDetails->email != '')
	$html .= '<p><span style="font-weight:bold;">Email: </span> '.$elemDetails->email.'</p>';

if($elemDetails->phone != '')
	$html .= '<p><span style="font-weight:bold;">Phone: </span> '.$elemDetails->phone.'</p>';

if($elemDetails->job_title != '')
	$html .= '<p><span style="font-weight:bold;">Designation: </span> '.$elemDetails->job_title.'</p>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('export_pdf_record_'.$elemDetails->id.'_'.date('Y-m-d-H-i-s').'.pdf', 'I');
?>