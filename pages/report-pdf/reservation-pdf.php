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
$pdf -> SetX(87);
$pdf-> Cell(0,10,"RECEIPT","C",1);

//RECEIPT NO
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(45);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Receipt No.:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(45);
$pdf-> SetX(150);
$pdf-> Cell(0,10,"001","",1);

//TRANSACTION DATE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(50);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Date:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(50);
$pdf-> SetX(150);
$pdf-> Cell(0,10,"08-01-2016","",1);

//CUSTOMER NAME
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(50);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Customer Name:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(50);
$pdf-> SetX(55);
$pdf-> Cell(0,10,"Soriano, Daniella C.","",1);



$_Fields_Name_Position = 65; //Position Header
$_Table_Position = 71;	

$pdf-> SetFillColor(232,232,232);

$pdf-> SetFont("Arial", "B", 12);
$pdf-> SetY($_Fields_Name_Position);
$pdf-> SetX(20);
$pdf-> Cell(30,6,"Unit Type",1,0,"C",1);
$pdf-> SetX(50);
$pdf-> Cell(40,6,"Unit Location",1,0,"C",1);
$pdf-> SetX(90);
$pdf-> Cell(40,6,"Unit Price",1,0,"C",1);
$pdf-> SetX(130);
$pdf-> Cell(40,6,"Reservation Fee",1,0,"C",1);

$pdf-> SetFont("Arial","",10);
$pdf-> SetY($_Table_Position);
$pdf-> SetX(20);
$pdf-> MultiCell(30,6,"Garden Niche",1,"L");
$pdf-> SetY($_Table_Position);
$pdf-> SetX(50);
$pdf-> MultiCell(40,6,"South-Block 1-Lot 21",1,"L");
$pdf-> SetY($_Table_Position);
$pdf-> SetX(90);
$pdf-> MultiCell(40,6,"PHP 25,000.00",1,"L");
$pdf-> SetY($_Table_Position);
$pdf-> SetX(130);
$pdf-> MultiCell(40,6,"PHP 10,000.00",1,"L");
$pdf-> SetY($_Table_Position);




//DUE DATE FOR DOWNPAYMENT
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(95);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Downpayment Due Date:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(95);
$pdf-> SetX(75);
$pdf-> Cell(0,10,"08-16-2016","",1);


//DOWNPAYMENT FEE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(100);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Downpayment Amount:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(100);
$pdf-> SetX(75);
$pdf-> Cell(0,10,"Php 5,000.00","",1);

//TOTAL AMOUNT TO PAY
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(100);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Mode of Payment:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(100);
$pdf-> SetX(160);
$pdf-> Cell(0,10,"CASH","",1);

//TOTAL AMOUNT TO PAY
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(115);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Total Amount:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(115);
$pdf-> SetX(160);
$pdf-> Cell(0,10,"Php 10,000.00","",1);

$pdf-> SetX(30);
$pdf-> Line(120, 125, 200, 125);

//AMOUNT PAID
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(125);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Amount Received:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(125);
$pdf-> SetX(160);
$pdf-> Cell(0,10,"Php 10,000.00","",1);

//CHANGE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(130);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Change:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(130);
$pdf-> SetX(160);
$pdf-> Cell(0,10,"Php 0.00","",1);

//Received By
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(140);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Received by:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(140);
$pdf-> SetX(50);
$pdf-> Cell(0,10,"Kevin Bernacer","",1);


$pdf->Output();


?>