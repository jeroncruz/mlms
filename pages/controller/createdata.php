<?php


class createInterest{

    function Create($tfNoOfYear,$tfAtNeedInterest,$tfRegularInterest,$tfStatus){

		$sql = "INSERT INTO `dbholygarden`.`tblinterest` (`intNoOfYear`, `deciAtNeedInterest`, `deciRegularInterest`, `intStatus`) 
                                        VALUES ('$tfNoOfYear','$tfAtNeedInterest','$tfRegularInterest','$tfStatus')";
                                        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
           // echo "<script>alert('Succesfully created!')</script>";
            $alertInterest = new alerts();
            $alertInterest -> alertSuccess();
          
        }
        
    }
        
}

class createTypes{

    function Create($tfTypeName,$tfNoOfLot,$tfSellingPriceFinal,$tfStatus){
		
		

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "SELECT * FROM tbltypeoflot WHERE strTypeName LIKE '$tfTypeName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){
            
			$sql = "INSERT INTO `dbholygarden`.`tbltypeoflot` (`strTypeName`, `intNoOfLot`, `deciSellingPrice`, `intStatus`) 
														VALUES ('$tfTypeName', '$tfNoOfLot', '$tfSellingPriceFinal', '$tfStatus')";
														
														
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
		
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
				//echo "<script>alert('Succesfully created!')</script>";
                $alertTypes = new alerts();
                $alertTypes -> alertSuccess();
			}//if

		}else{
			//echo "<script>alert('duplicate data')</script>";
                $alertTypes1 = new alerts();
                $alertTypes1 -> alertWarning();
        }//else
        
    }//function
        
}//createTypes



class createSection{

    function Create($tfSectionName,$tfNoOfBlock,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblsection WHERE strSectionName like '$tfSectionName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){ 
        
			$sql = "INSERT INTO `tblsection` (`strSectionName`,`intNoOfBlock`,`intStatus`) 
									VALUES ('$tfSectionName','$tfNoOfBlock','$tfStatus' )";
											
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
				//echo "<script>alert('Succesfully created!')</script>";
                $alertSection = new alerts();
                $alertSection -> alertSuccess();

			}//if
		}else{
            //echo "<script>alert('duplicate data')</script>";
                $alertSection1 = new alerts();
                $alertSection1 -> alertWarning();
        }//else
        
    }//function
}//createSection



class createBlock{

    function Create($tfBlockName,$typeBlock,$section,$tfNoOfLot,$tfStatus){


			$sql = "INSERT INTO `dbholygarden`.`tblblock` (`strBlockName`,`intTypeID` ,`intSectionID`, `intNoOfLot`, `intStatus`) 
												VALUES ('$tfBlockName','$typeBlock' ,'$section', '$tfNoOfLot','$tfStatus')";
                                            
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
			}//if

    }//function
}//createBlock


class createLot{

    function Create($id,$typeBlock,$lotStatus,$tfStatus){
		$sql = "INSERT INTO `dbholygarden`.`tbllot` (`strLotName`, `intBlockID`, `intLotStatus`, `intStatus`) 
												VALUES ('$id','$typeBlock','$lotStatus','$tfStatus')";
                                        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
		if(mysql_query($sql,$conn)){
            mysql_close($conn);
          
        }//if
    }//function
}//createLot




class createAC{

    function Create($tfacName,$tfNoOfLevel,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblashcrypt WHERE strAshName like '$tfacName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){

			$sql = "INSERT INTO `dbholygarden`.`tblashcrypt` (`strAshName`, `intNoOfLevel`,`intStatus`) 
														VALUES ('$tfacName','$tfNoOfLevel','$tfStatus')";
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
				//echo "<script>alert('Succesfully created!')</script>";
                $alertAC = new alerts();
                $alertAC -> alertSuccess();
			  
			}//if
		}else{
			//echo "<script>alert('Duplicate Data!')</script>";
            $alertAC1 = new alerts();
            $alertAC1 -> alertWarning();
          
        }//else
    }//function
}//createAC

class createLevelAC{

    function Create($l,$acName,$tfNoOfUnit,$tfStatus,$tfSellingPriceFinal){

		$getDetails = "SELECT strLevelName, intNoOfUnit FROM tbllevelash WHERE intAshID = '$acName' AND intStatus = 0;";
		$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
		mysql_select_db(constant('mydb'));
	   
		
		$result = mysql_query($getDetails,$conn);
		$flag = true;
		$error1 = "Level is already existing";
		$error2 = "Unit is incorrect ";
        
		while($row = mysql_fetch_array($result)){
			
            $strLevelName = $row['strLevelName'];
            $NoofUnit = $row['intNoOfUnit'];
            
            if(strcmp($l, $strLevelName) == 1 && $NoofUnit == $tfNoOfUnit){
                
            }else{
                $flag = false;
                //echo "<script>alert('An error occurred because: $error1, $error2')</script>";
                $alertLevel = new alerts();
                $alertLevel -> alertWarnAsh();
                break;
            }//else
        }//while
        
		$sql = "INSERT INTO `dbholygarden`.`tbllevelash` (`strLevelName`, `intAshID`,`intNoOfUnit`,`intStatus`,`dblSellingPrice`) 
													VALUES ('$l','$acName','$tfNoOfUnit','$tfStatus','$tfSellingPriceFinal')";
        
		if($flag == true)
            if(mysql_query($sql,$conn)){
                mysql_close($conn);
        
            }//if
        }//if
        
}//createLevelAC


class createAshUnit{

    function Create($id,$levelName,$status,$tfStatus,$tfCapacity){

		$sql = "INSERT INTO `dbholygarden`.`tblacunit` (`strUnitName`, `intLevelAshID`,`intUnitStatus`,`intStatus`,`intCapacity`) 
                                                VALUES ('$id','$levelName','$status','$tfStatus','$tfCapacity')";
                                                
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
		if(mysql_query($sql,$conn)){
            mysql_close($conn);
        }//if
    }//function
}//createAshUnit

class createRequirement{

    function Create($tfRequirementName,$tfRequirementDesc,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "SELECT * from tblrequirement WHERE strRequirementName LIKE '$tfRequirementName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){

			$sql = "INSERT INTO `dbholygarden`.`tblrequirement` (`strRequirementName`, `strRequirementDesc`,`intStatus`) 
                                                VALUES ('$tfRequirementName','$tfRequirementDesc','$tfStatus')";
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
			  //echo "<script>alert('Succesfully created!')</script>";
                $alertRequire = new alerts();
                $alertRequire -> alertSuccess();
			  
			}//if
		}else{
           // echo "<script>alert('Duplicate Data!')</script>";
                 $alertRequire1 = new alerts();
                $alertRequire1 -> alertWarning();

        }//else
        
    }//function
        
}//createRequirement


class createService{

    function Create($tfServiceName,$serviceType,$tfServicePriceFinal,$tfStatus,$checkRequirement){
        // echo "$tfServiceName--$serviceType--$tfServicePriceFinal--$tfStatus,";
        // echo json_encode($checkRequirement);

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblservice WHERE strServiceName like '$tfServiceName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);
        
        if($check_duplicate == 0){

			$sql = "call insertService('$tfServiceName','$tfServicePriceFinal','$tfStatus','$serviceType')";
            
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
            $result = mysql_query($sql);
           
            if(mysql_num_rows($result) > 0){
                $row = mysql_fetch_array($result);
                $serviceId = $row['id'];
                mysql_close($conn);
                for ($x = 0; $x < sizeof($checkRequirement); $x++){
                      
                    
                    $sql = "INSERT INTO `dbholygarden`.`tblservicerequirement` (`intServiceId`, `intRequirementId`) 
                                                                    VALUES ('$serviceId', '$checkRequirement[$x]');";
                    
                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                    mysql_select_db(constant('mydb'));
                    mysql_query($sql);
                    mysql_close($conn);
                    
                }//for
                
			  //echo "<script>alert('Success')</script>";
                $alertService = new alerts();
                $alertService -> alertSuccess();
			  
			}//if
		}else{
            //echo "<script>alert('Duplicate Data!')</script>";
                $alertService1 = new alerts();
                $alertService1 -> alertWarning();
        }//else
        
    }//function
        
}//createService

class createServiceType{

    function Create($tfServiceTypeName,$tfServiceTypeDesc){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblservicetype WHERE strServiceTypeName like '$tfServiceTypeName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){

			$sql = "INSERT INTO `dbholygarden`.`tblservicetype` (`strServiceTypeName`, `strServiceTypeDesc`) 
                                                        VALUES ('$tfServiceTypeName','$tfServiceTypeDesc')";
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
			  //echo "<script>alert('Succesfully created!')</script>";
                $alertSerType = new alerts();
                $alertSerType -> alertSuccess();
			  
			}//if
		}else{
            //echo "<script>alert('Duplicate Data!')</script>";

                $alertSerType1 = new alerts();
                $alertSerType1 -> alertWarning();

        }//else
        
    }//function
        
}//createService

class createDiscount{

	function Create($serviceName,$tfDescription,$tfPercentValue,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tbldiscount WHERE strDescription like '$tfDescription'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){

			$sql = "INSERT INTO `dbholygarden`.`tbldiscount` (`intServiceID`,`strDescription`, `dblPercent`, `intStatus`) 
												VALUES ('$serviceName','$tfDescription','$tfPercentValue','$tfStatus')";
			$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
			mysql_select_db(constant('mydb'));
			if(mysql_query($sql,$conn)){
				mysql_close($conn);
			   //echo "<script>alert('Succesfully created!')</script>";
                $alertDiscount = new alerts();
                $alertDiscount -> alertSuccess();
			 
			}//if

		}else{
				//echo "<script>alert('Duplicate Data!')</script>";
                $alertDiscount1 = new alerts();
                $alertDiscount1 -> alertWarning();
		}//else
    }//function
}//createDiscount



//TRANSACTION


//FIRST TRANSACTION

class createCustomer{


    function Create($tfFirstName,$tfMiddleName,$newLastName,$tfAddress,$tfContactNo,$dateCreated,$gender,$civilStatus){

        
		$sql = "call insertCustomer('$tfFirstName','$tfMiddleName','$newLastName','$tfAddress','$tfContactNo','$dateCreated','$gender','$civilStatus')";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
       
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
           // echo "<script>alert('Succesfully created!')</script>";
            $alertCust = new alerts();
            $alertCust -> alertSuccess();
     
        }//if


        
    }//function
        
}//class

class createAvailUnit{

    function Create($tfLotId,$selectCustomer,$dateCreated,$tfModeOfPayment,$tfAmountFinal){

		$sql = "INSERT INTO `dbholygarden`.`tblavailunit` (`intLotId`,`intCustomerId`,`dateAvailUnit`,`strModeOfPayment`,`deciAmountPaid`) 
                                                VALUES ('$tfLotId','$selectCustomer','$dateCreated','$tfModeOfPayment','$tfAmountFinal')";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tbllot` 
                            SET `intLotStatus`='2' WHERE `intLotID`= '$tfLotId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            
            if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    $alertAvail = new alerts();
                    $alertAvail -> alertSold();
                    //echo "<script>alert('Succesfully created!')</script>";
            }//if
            
           
        }//if
        
    }//function
    
    function createReserve($tfLotId,$tfStatus,$selectCustomer,$dateCreated,$tfModeOfPayment,$selectYear,$tfDownpaymentFinal,$dateDownpayment,$tfAmountFinal){

		$sql = "INSERT INTO `dbholygarden`.`tblavailunit` (`intLotId`, `intCustomerId`, `dateAvailUnit`, `strModeOfPayment`, `deciAmountPaid`, `intStatus`, `intInterestId`, `deciDownpayment`, `datDueDate`) 
                                                    VALUES ('$tfLotId', '$selectCustomer', '$dateCreated', '$tfModeOfPayment', '$tfAmountFinal', '$tfStatus', '$selectYear', '$tfDownpaymentFinal', '$dateDownpayment')";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tbllot` 
                            SET `intLotStatus`='1' WHERE `intLotID`= '$tfLotId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            
            if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    $alertAvail = new alerts();
                    $alertAvail -> alertSold();
                    //echo "<script>alert('Succesfully created!')</script>";
            }//if
            
           
        }//if
        
    }//function
        
}//class

//UTILITIES
class createColor{

    function Create($tfColor,$tfID){

        $sql = "UPDATE `dbholygarden`.`tblcompanysettings` SET `strColor`='$tfColor' WHERE `intCompanyID`= '$tfID' ";
                                            
             
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
            
          
        }

              
    }//function
        
}//class

class createDetails{

    function Create($tfID,$tfCompanyName,$tfCompanyAddress,$tfContactNo,$tfEmailAdd){

        $sql = "UPDATE `dbholygarden`.`tblcompanysettings` SET `strCompanyName`='$tfCompanyName' , `strAddress`='$tfCompanyAddress',`strContactNo`='$tfContactNo',`strEmailAddress`='$tfEmailAdd' WHERE `intCompanyID`= '$tfID' ";
                                            
             
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
            
          
        }

              
    }//function
        
}//class

class createImgPath{

    function Create($tfID,$tfLogo){

        $sql = "UPDATE `dbholygarden`.`tblcompanysettings` SET `strLogo`='$tfLogo' WHERE `intCompanyID`= '$tfID' ";
                                            
             
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
            
          
        }

              
    }//function
        
}//class
?>