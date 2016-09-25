<?php
require('../fpdf/fpdf.php');


$pdf = new FPDF();


$pdf->AddPage();

$pdf-> SetX(35);
$pdf-> Image('c:\xampp\htdocs\MLMS\fpdf\tutorial\logo.png',10,2,30);

$pdf-> SetFont("Arial","B",20);
$pdf-> SetY(8);
$pdf-> SetX(45);
$pdf-> Cell(150,10,"Memorial Lot Management System");

$pdf-> SetFont("Arial","",9);
$pdf-> SetY(15);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"Room 203 F N Crisostomo Building, Sumulong Highway","",1);
$pdf-> SetY(20);
$pdf-> SetX(45);
$pdf-> SetFont("Arial","","10");
$pdf-> Cell(0,10,"Barangay Mayamot, Antipolo City","",1);

$pdf-> SetX(30);
$pdf-> Line(20, 35, 250-50, 35);

$pdf-> SetFont("Arial","B", 15);
$pdf-> SetY(35);
$pdf -> SetX(73);
$pdf-> Cell(0,10,"CANCELLED RESERVATION","C",1);
$pdf-> SetFont("Arial","", 12);
$pdf-> SetY(40);
$pdf -> SetX(95);
$pdf-> Cell(0,10,"09/22/2016","C",1);



$_Fields_Name_Position = 55; //Position Header
$_Table_Position = 71;	

$pdf-> SetFillColor(232,232,232);

$pdf-> SetFont("Arial", "B", 10);
$pdf-> SetY($_Fields_Name_Position);
$pdf-> SetX(7);
$pdf-> Cell(31,6,"Reservation Date",1,0,"C",1);
$pdf-> SetX(38);
$pdf-> Cell(35,6,"Date of Cancellation",1,0,"C",1);
$pdf-> SetX(73);
$pdf-> Cell(35,6,"Customer Name",1,0,"C",1);
$pdf-> SetX(108);
$pdf-> Cell(30,6,"Unit Type",1,0,"C",1);
$pdf-> SetX(138);
$pdf-> Cell(30,6,"Reservation Fee",1,0,"C",1);
$pdf-> SetX(168);
$pdf-> Cell(35,6,"Total Amount Paid",1,0,"C",1);



$pdf->Output();


?>