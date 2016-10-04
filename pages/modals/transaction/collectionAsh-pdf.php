<?php
require_once('mc_table.php');

$pdf = new PDF_MC_Table();
$pdf -> AddPage();
$pdf -> AliasNbPages();
$pdf -> Ln(5);
$pdf -> SetFont('Arial', 'B', 15);
$pdf -> Cell(120,0,'Collection Receipt',0,0,'C');
$pdf -> Ln(15);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Customer Name: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(0,0,'Kevin Bernacer',0,0,'L'); //palitan ng variable
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(145);
$pdf -> Cell(0,0,'Date: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(160);
$pdf -> Cell(0,0,date('Y-m-d'),0,0,'L'); //palitan ng variable
$pdf -> Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Lot Information: ',0,0,'L');
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(60);
$pdf -> SetWidths(array(40,40,40));
$pdf -> Row(array('Ashcrypt Name', 'Level', 'Unit Name'));
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Row(array('Asd', '2', 'Asd0001')); //palitan ng variables
$pdf -> Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Employee-In-Charge: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(70);
$pdf -> Cell(0,0,'Jeron Joshua Cruz',0,0,'L');
$pdf -> Ln(28);
$pdf -> SetX(70);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(80,0,'Amount Paid: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(130,0,'P '.'1,000,000.00',0,0,'R'); //palitan ng variable
$pdf -> Ln(7);
$pdf -> SetX(70);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(80,0,'Change: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(130,0,'P '.'500,000.00',0,0,'R'); //palitan ng variable
$pdf->Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(70);
$pdf -> Cell(80,0,'Balance: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(130,0,'P '.'10,000,000.00',0,0,'R'); //palitan ng variable

$pdf -> Ln(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'_________________________',0,0,'L');
$pdf -> Ln(5);
$pdf -> SetX(20);
$pdf -> Cell(0,0,"     Employee's Signature",0,0,'L');
$pdf -> Output();
?>