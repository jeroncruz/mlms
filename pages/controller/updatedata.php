<?php

class updateInterest{

    function update($tfInterestId,$tfNoOfYear,$tfAtNeedInterest,$tfRegularInterest){
        
		$sql = "UPDATE `dbholygarden`.`tblinterest` SET `intNoOfYear`='$tfNoOfYear', `deciAtNeedInterest`='$tfAtNeedInterest', `deciRegularInterest`='$tfRegularInterest' WHERE `intInterestId`='$tfInterestId'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
        if(mysql_query($sql,$conn)){
            
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}//if
    }//function        
}//updateInterest

class updateType{

    function update($tfTypeID,$tfTypeName,$tfNoOfLot,$tfSellingPriceFinal){
        echo "<script>alert('$tfSellingPriceFinal')</script>";
		
		$sql = "UPDATE `dbholygarden`.`tbltypeoflot` SET `strTypeName`='$tfTypeName', `intNoOfLot`='$tfNoOfLot', `deciSellingPrice`='$tfSellingPriceFinal' WHERE `intTypeID`= '$tfTypeID'";
        
		$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
		if(mysql_query($sql,$conn)){
			
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}//if
    }//function        
}//updateType

class updateSection{

    function update($tfSectionID,$tfSectionName,$tfNoOfBlock){
		
		$sql = "UPDATE `dbholygarden`.`tblsection` SET `strSectionName`='$tfSectionName', `intNoOfBlock`='$tfNoOfBlock' WHERE `intSectionID`= '$tfSectionID'";
        
		$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
		
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}//if
    }//function        
}//updateSection





class updateBlock{

    function update($tfBlockID,$typeBlock,$tfBlockName,$section,$tfNoOfLot){
        
		$sql = "UPDATE `dbholygarden`.`tblblock` SET `strBlockName`='$tfBlockName',`intTypeID`='$typeBlock',`intSectionID`='$section',`intNoOfLot`='$tfNoOfLot' WHERE `intBlockID`= '$tfBlockID'";
        
		$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}//if
    }//function      
}//updateBlock


class updateLot{

    function update($tfLotID,$tfLotName,$blockName,$status){
        
		$sql = "UPDATE `dbholygarden`.`tbllot` SET `strLotName`='$tfLotName',`intBlockID`='$blockName',`intLotStatus`='$status' WHERE `intLotID`= '$tfLotID'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
		if(mysql_query($sql,$conn)){
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}//if
    }//function      
}//updateLot


class updateAC{

    function update($tfAshID,$tfAshName,$tfNoOfLevel){
		$sql = "UPDATE `dbholygarden`.`tblashcrypt` SET `strAshName`='$tfAshName',`intNoOfLevel`='$tfNoOfLevel' WHERE `intAshID`= '$tfAshID'";
        
		$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
		if(mysql_query($sql,$conn)){
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}//if
    }//function      
}//updateAC

class updateLA{

    function update($tfLevelAshID,$tfLevelName,$ashName,$tfSellingPriceFinal,$tfNoOfUnit){
        
		$sql = "UPDATE `dbholygarden`.`tbllevelash` SET `strLevelName`='$tfLevelName',`intAshID`='$ashName',`dblSellingPrice`='$tfSellingPriceFinal',`intNoOfUnit`='$tfNoOfUnit' WHERE `intLevelAshID`= '$tfLevelAshID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}//if
    }//function        
}//updateLA


class updateAshUnit	{

    function update($tfUnitID,$tfUnitName,$levelName,$status,$tfCapacity){
		$sql = "UPDATE `dbholygarden`.`tblacunit` SET `strUnitName`='$tfUnitName',`intLevelAshID`='$levelName',`intUnitStatus`='$status',`intCapacity`='$tfCapacity' WHERE `intUnitID`= '$tfUnitID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
		if(mysql_query($sql,$conn)){
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}//if
    }//function
}//updateAshUnit

class updateRequirement	{

    function update($tfRequirementId,$tfRequirementName,$tfRequirementDesc){
		$sql = "UPDATE `dbholygarden`.`tblrequirement` SET `strRequirementName`='$tfRequirementName',`strRequirementDesc`='$tfRequirementDesc' WHERE `intRequirementId`= '$tfRequirementId'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}//if
    }//function 
}//updateRequirement


class updateService	{

    function update($tfServiceID,$serviceType,$tfServiceName,$tfServicePriceFinal){
		$sql = "UPDATE `dbholygarden`.`tblservice` SET `strServiceName`='$tfServiceName',`dblServicePrice`='$tfServicePriceFinal',`intServiceTypeId`='$serviceType' WHERE `intServiceID`= '$tfServiceID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}//if
    }//function 
}//updateService


class updateDiscount{

    function update($tfDiscountID,$tfDescription,$tfPercentValue){
        
		$sql = "UPDATE `dbholygarden`.`tbldiscount` SET `strDescription`='$tfDescription',`dblPercent`='$tfPercentValue' WHERE `intDiscountID`= '$tfDiscountID'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}//if
    }//function       
}//updateDiscount

?>