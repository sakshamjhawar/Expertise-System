<?php
	session_start();
	$data = json_decode(stripslashes($_POST['data']));
	include("../../../db/db.php");
		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
	$matrix = array();
	//$id = 'I4iA41flS';
	$id = $_SESSION['faculty_id'];
	
	foreach($data as $i)
	{
		$result = mysql_query("Select * from professioanl_membership where membership_number = '$i' and id = '$id'");	
		$r = array();
		$row = mysql_fetch_array($result);
        $r[0] = $row['membership_number'];
        $r[1] = $row['name'];
        $r[2] = $row['membership_type'];
        $r[3] = $row['from_date'];
		$r[4] = $row['to_date'];
		
		$matrix[] = $r;
	}
	
	foreach ($matrix as $row)
		foreach ($row as $r)
			echo $r; 
	
	
require('../../pdf/fpdf.php');

class PDF extends FPDF
{
// Load data
// Simple table
function BasicTable($header, $data)
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

// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

if(!empty($matrix)){
$pdf = new PDF();
// Column headings
$header = array('Membership Number', 'Name', 'Type', 'Starting date', 'End date');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$matrix);
//$pdf->AddPage();
//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();}
?>