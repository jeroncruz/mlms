<?php
require_once('mc_table.php');



$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
/*$sql = "SELECT * FROM tblavailunit au INNER JOIN tbllot l ON au.intLotId = l.intLotID INNER JOIN tblblock b ON b.intBlockID = l.intBlockID INNER JOIN tblsection s ON s.intSectionID = b.intSectionID INNER JOIN tbltypeoflot tl ON tl.intTypeID = b.intTypeID INNER JOIN tblcustomer c ON c.intCustomerId = au.intCustomerId INNER JOIN tblcollectionlot cl ON cl.intAvailUnitId = au.intAvailUnitId WHERE au.intAvailUnitId = '".$intAvailUnitId."'";
$result = mysql_query($sql,$conn);
while($row = mysql_fetch_array($result))
{
	$strFirstName = $row['strFirstName'];
	$strMiddleName = $row['strMiddleName'];
	$strLastName = $row['strLastName'];
	$strTypeName = $row['strTypeName'];
	$strSectionName = $row['strSectionName'];
	$strBlockName = $row['strBlockName'];
	$strLotName = $row['strLotName'];
	$strModeOfPayment = $row['strModeOfPayment'];
	$deciAmountPaid = $row['deciAmountPaid'];
	$deciBalance = $row['deciBalance'];
}
*/



$pdf = new PDF_MC_Table();
$pdf -> AddPage();
$pdf -> AliasNbPages();
$pdf -> SetLeftMargin(20);
$pdf -> Ln(5);
$pdf -> SetFont('Arial', 'B', 15);
$pdf -> Cell(0,0,'Add Deceased Receipt',0,0,'C');
$pdf -> Ln(15);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(0,0,'Deceased Information',0,0,'C');
$pdf -> Ln(1);
$pdf -> Cell(0,0,'_______________________________________________________________________',0,0,'L');
$pdf -> Ln(7);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Deceased Name: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(0,0,'Asdf Qwe',0,0,'L'); //palitan ng variable
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(130);
$pdf -> Cell(0,0,'Date of Birth: ',0,0,'L');

$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(160);
$pdf -> Cell(0,0,date('Y-m-d'),0,0,'L'); //palita	n ng variable
$pdf -> Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(130);
$pdf -> Cell(0,0,'Date of Death: ',0,0,'L');
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Gender: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(40);
$pdf -> Cell(0,0,'Male',0,0,'L');
$pdf -> Ln(7);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'Age: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(33);
$pdf -> Cell(0,0,'77',0,0,'L');
$pdf -> Ln(15);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(0,0,'Service Information',0,0,'C');
$pdf -> Ln(1);
$pdf -> SetX(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(0,0,'_______________________________________________________________________',0,0,'L');
$pdf -> Ln(7);
$pdf -> SetX(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(0,0,'Service: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(40);
$pdf -> Cell(0,0,'Internment',0,0,'L'); //palitan ng variable
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(80);
$pdf -> Cell(80,0,'Date Of Internment: ',0,0,'R');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(60);
$pdf -> Cell(125,0,'10-10-2016',0,0,'R'); //palitan ng variable
$pdf -> Ln(7);
$pdf -> SetX(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(0,0,'Amount Paid: ',0,0,'L');
$pdf -> SetFont('Arial', '', 12);
$pdf -> SetX(50);
$pdf -> Cell(0,0,'P '.'1,299.00',0,0,'L'); //palitan ng variable

$pdf -> Ln(20);
$pdf -> SetFont('Arial', 'B', 12);
$pdf -> SetX(20);
$pdf -> Cell(0,0,'_________________________',0,0,'L');
$pdf -> Ln(5);
$pdf -> SetX(20);
$pdf -> Cell(0,0,"     Employee's Signature",0,0,'L');
$pdf -> Output();
?>