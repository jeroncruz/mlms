<?php
require('../fpdf/fpdf.php');


$pdf = new FPDF();


$pdf->AddPage();

$pdf-> SetX(35);
$pdf-> Image('c:\xampp\htdocs\MLMS-Capstone\fpdf\tutorial\logo.png',10,2,30);

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
$pdf -> SetX(95);
$pdf-> Cell(0,10,"RECEIPT","",1);

//CUSTOMER NAME
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(50);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Customer Name:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(50);
$pdf-> SetX(55);
$pdf-> Cell(0,10,"Soriano, Daniella E.","",1);

//TRANSACTION CODE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(50);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Transaction Code:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(50);
$pdf-> SetX(165);
$pdf-> Cell(0,10,"1","",1);

//DUE DATE FOR DOWNPAYMENT
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(70);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Due Date for Downpayment:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(70);
$pdf-> SetX(75);
$pdf-> Cell(0,10,"2016-09-08","",1);

//TOTAL AMOUNT TO PAY
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(70);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Total Amount to Pay:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(70);
$pdf-> SetX(165);
$pdf-> Cell(0,10,"Php 100,000.00","",1);

//RESERVATION FEE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(80);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Reservation Fee:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(80);
$pdf-> SetX(53);
$pdf-> Cell(0,10,"Php 100,000,00","",1);

//AMOUNT PAID
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(80);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Amount Paid:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(80);
$pdf-> SetX(150);
$pdf-> Cell(0,10,"Php 100,000.00","",1);

//NO. OF UNIT
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(90);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"No. of Unit:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(90);
$pdf-> SetX(43);
$pdf-> Cell(0,10,"1","",1);

//CHANGE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(90);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Change:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(90);
$pdf-> SetX(140);
$pdf-> Cell(0,10,"Php 0.00","",1);

$pdf-> SetX(30);
$pdf-> Line(20, 110, 250-50, 110);

$_Fields_Name_Position = 120;
$_Table_Position = 126;
$_Table_Position2 = 96;
$_Table_Position3 = 116;
$_Table_Position4 = 166;

$pdf-> SetFillColor(232,232,232);

$pdf-> SetFont("Arial", "B", 12);
$pdf-> SetY($_Fields_Name_Position);
$pdf-> SetX(15);
$pdf-> Cell(30,6,"Unit ID",1,0,"L",1);
$pdf-> SetX(45);
$pdf-> Cell(35,6,"Unit Price",1,0,"L",1);
$pdf-> SetX(80);
$pdf-> Cell(35,6,"Years to Pay",1,0,"L",1);
$pdf-> SetX(115);
$pdf-> Cell(50,6,"Downpayment",1,0,"L",1);
$pdf-> SetX(155);
$pdf-> Cell(50,6,"Monthly Amortization",1,0,"L",1);

$pdf-> SetFont("Arial","",10);
$pdf-> SetY($_Table_Position);
$pdf-> SetX(15);
$pdf-> MultiCell(30,6,"Unit No. 1",1,"L");
$pdf-> SetY($_Table_Position);
$pdf-> SetX(45);
$pdf-> MultiCell(35,6,"Php 10,000.00",1,"L");
$pdf-> SetY($_Table_Position);
$pdf-> SetX(80);
$pdf-> MultiCell(35,6,"1",1,"L");
$pdf-> SetY($_Table_Position);
$pdf-> SetX(115);
$pdf-> MultiCell(40,6,"Php 5,000.00",1,"L");
$pdf-> SetY($_Table_Position);
$pdf-> SetX(155);
$pdf-> MultiCell(50,6,"Php 458.00",1,"L");



$pdf->Output();


?>