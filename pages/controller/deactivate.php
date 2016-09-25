<?php

class deactivateInterest{

    function deactivate($tfInterestId){
        $sql = "UPDATE `dbholygarden`.`tblinterest` SET `intStatus`='1' WHERE `intInterestId`= '$tfInterestId'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Deactivated!')</script>";
            $alertInterest = new alerts();
            $alertInterest -> alertDeac();
        }
    }        
}

class deactivateType{

    function deactivate($tfTypeID){
        
        $sql = "UPDATE `dbholygarden`.`tbltypeoflot` SET `intStatus`='1' WHERE `intTypeID`= '$tfTypeID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Deactivated!')</script>";
            $alertType = new alerts();
            $alertType -> alertDeac();
        }
    }        
}

class deactivateSection{

    function deactivate($tfSectionID){
        $sql = "call deactivateSection($tfSectionID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Deactivated!')</script>";
            $alertSection = new alerts();
            $alertSection -> alertDeac();
        }
    }        
}



class deactivateBlock{

    function deactivate($tfBlockID){
        $sql = "call deactivateBlock($tfBlockID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Deactivated!')</script>";
            $alertBlock = new alerts();
            $alertBlock -> alertDeac();
        }
    }        
}

class deactivateLot{

    function deactivate($tfLotID){
        $sql = "UPDATE `dbholygarden`.`tbllot` SET `intStatus`='1' WHERE `intLotID`= '$tfLotID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Deactivated!')</script>";
            $alertLot = new alerts();
            $alertLot ->alertDeac();
        }
    }        
}




class deactivateAC{

    function deactivate($tfAshID){
        $sql = "call deactivateAshCrypt($tfAshID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Deactivated!')</script>";
            $alertAC = new alerts();
            $alertAC -> alertDeac();
        }
    }        
}

class deactivateLA{

    function deactivate($tfLevelAshID){
        $sql = "call deactivateLevel($tfLevelAshID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Deactivated!')</script>";
            $alertLA = new alerts();
            $alertLA -> alertDeac();
        }
    }        
}

class deactivateAsh{

    function deactivate($tfUnitID){
        $sql = "UPDATE `dbholygarden`.`tblacunit` SET `intStatus`='1' WHERE `intUnitID`= '$tfUnitID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Deactivated!')</script>";
            $alertAsh = new alerts();
            $alertAsh -> alertDeac();
        }
    }        
}

class deactivateRequirement{

    function deactivate($tfRequirementId){
        $sql = "UPDATE `dbholygarden`.`tblrequirement` SET `intStatus`='1' WHERE `intRequirementId`= '$tfRequirementId'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Deactivated!')</script>";
            $alertRequire = new alerts();
            $alertRequire -> alertDeac();
        }
    }        
}


class deactivateService {

    function deactivate($tfServiceID){
        $sql = "call deactivateService($tfServiceID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Deactivated!')</script>";
            $alertService = new alerts();
            $alertService -> alertDeac();
        }
    }        
}

class deactivateDiscount{

    function deactivate($tfDiscountID){
        $sql = "UPDATE `dbholygarden`.`tbldiscount` SET `intStatus`='1' WHERE `intDiscountID`= '$tfDiscountID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn)){
            mysql_close($conn);
            //echo "<script>alert('Succesfully Deactivated!')</script>";
            $alertDiscount = new alerts();
            $alertDiscount -> alertDeac();
        }
    }        
}



?>