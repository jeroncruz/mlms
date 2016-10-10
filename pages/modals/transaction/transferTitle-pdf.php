<?php
require_once('mc_table.php');



// $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
//         mysql_select_db(constant('mydb'));
// $intServiceServiceRequested = $_GET['intServiceServiceRequested'];
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
$pdf -> Ln(5);

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
$pdf-> Cell(0,10,"01","",1); //variable

//TRANSACTION DATE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(50);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Date:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(50);
$pdf-> SetX(150);
$pdf-> Cell(0,10,"09/27/16","",1); //variable

//CUSTOMER NAME
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(50);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Customer Name:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(50);
$pdf-> SetX(55);
$pdf-> Cell(0,10,"Austine Taba","",1); //variable



$_Fields_Name_Position = 65; //Position Header
$_Table_Position = 71;	

$pdf-> SetFillColor(232,232,232);

$pdf-> SetFont("Arial", "B", 10);
$pdf-> SetY($_Fields_Name_Position);
$pdf-> SetX(15);
$pdf-> Cell(25,6,"Lot Type",1,0,"C",1);

$pdf-> SetX(40);
$pdf-> Cell(20,6,"Section",1,0,"C",1);

$pdf-> SetX(60);
$pdf-> Cell(25,6,"Block",1,0,"C",1);

$pdf-> SetX(85);
$pdf-> Cell(20,6,"Lot",1,0,"C",1);

$pdf-> SetX(105);
$pdf-> Cell(30,6,"Transfer Fee",1,0,"C",1);

$pdf-> SetFont("Arial","",10);
$pdf-> SetY($_Table_Position);
$pdf-> SetX(15);
$pdf-> MultiCell(25,6,"Garden Niche",1,"L"); //variable

$pdf-> SetY($_Table_Position);
$pdf-> SetX(40);
$pdf-> MultiCell(20,6,"South",1,"L"); //variable

$pdf-> SetY($_Table_Position);
$pdf-> SetX(60);
$pdf-> MultiCell(25,6,"Maginhawa",1,"L"); //variable

$pdf-> SetY($_Table_Position);
$pdf-> SetX(85);
$pdf-> MultiCell(20,6,"Eternal001",1,"L"); //variable

$pdf-> SetY($_Table_Position);
$pdf-> SetX(105);
$pdf-> MultiCell(30,6,"P 10,000.00",1,"L"); //variable

//TOTAL AMOUNT TO PAY
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(115);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Total Amount:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(115);
$pdf-> SetX(160);
$pdf-> Cell(0,10,"Php 10,000.00","",1); //variable

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
$pdf-> Cell(0,10,"Php 10,000.00","",1); //variable
 
//CHANGE
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(130);
$pdf-> SetX(120);
$pdf-> Cell(0,10,"Change:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(130);
$pdf-> SetX(160);
$pdf-> Cell(0,10,"Php 0.00","",1); //variable

//Received By
$pdf-> SetFont("Arial","B",12);
$pdf-> SetY(140);
$pdf-> SetX(15);
$pdf-> Cell(0,10,"Received by:","",1);
$pdf-> SetFont("Arial","",12);
$pdf-> SetY(140);
$pdf-> SetX(50);
$pdf-> Cell(0,10,"Kevin Bernacer","",1);

$pdf->AddPage('','Letter','');
$pdf-> SetFont("Arial","B", 25);
$pdf-> SetTextColor(0,100,0);
$pdf-> SetY(40);
$pdf -> SetX(33);
$pdf-> Cell(0,10,"TRANSFER CERTIFICATE OF TITLE","C",1);
$pdf -> Ln(15);

$pdf-> SetTextColor(0,0,0);
$pdf-> SetFont("Arial","", 15);
$pdf-> SetY(50);
$pdf -> SetX(100);
$pdf-> Cell(0,10,"No: _____","C",1);

$pdf-> SetFont("Arial","", 14);
$pdf-> SetY(65);
$pdf -> SetX(30);
$pdf-> Cell(0,10,"It is hereby certified that certain land situated in the Province of Rizal","C",1);
$pdf-> SetY(72);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"City of Antipolo, more particularly bounded and described as follows:","C",1);

$pdf-> SetFont("Arial","B", 20);
$pdf-> SetY(85);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"SOUTH BLOCK MAGINHAWA LOT ETERNAL-001","C",1); //PALITAN NG VARIABLES

$pdf-> SetFont("Arial","", 12);
$pdf-> SetY(93);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"is registered in accordance with the registration of the Property Registration Decree","C",1);
$pdf-> SetY(99);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"in the name of","C",1);

$pdf-> SetFont("Arial","", 10);
$pdf-> SetY(110);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"OWNER NAME: ","C",1); //VARIABLES

$pdf-> SetY(110);
$pdf -> SetX(140);
$pdf-> Cell(0,10,"LEGAL AGE OF  ","C",1); //VARIABLES

$pdf-> SetY(115);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"ADDRESS: ","C",1); //VARIABLES

$pdf-> SetFont("Arial","", 12);
$pdf-> SetY(130);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"IT IS FURTHER CERTIFIED that said land was originally registered as follows:","C",1); //VARIABLES

$pdf-> SetFont("Arial","B", 12);
$pdf-> SetY(140);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"Orig. Reg. Date: ","C",1); // ORIGINAL REGISTERED DATE VARIABLES

$pdf-> SetY(145);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"Original Owner: ","C",1); // VARIABLES

$pdf-> SetFont("Arial","", 12);
$pdf-> SetY(155);
$pdf -> SetX(20);
$pdf-> Cell(0,10,"Entered at Antipolo City, Rizal, Philippines, on the 09/27/2016 at 2:45 pm ","C",1); // VARIABLES
 
$pdf-> SetFont("Arial","", 18);
$pdf-> SetY(190);
$pdf -> SetX(115);
$pdf-> Cell(0,10,"Jeron Cruz","C",1);

$pdf-> SetX(30);
$pdf-> Line(105, 190, 160, 190);

$pdf-> SetY(201);
$pdf -> SetX(105);
$pdf-> Cell(0,10,"Managing Director","C",1);
$pdf -> Output();
?>
