<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    require("controller/connection.php");

    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
    mysql_select_db(constant('mydb'));

// Check which function needs to call
    if(isset($_GET['getLot'])) {
    	getLot();
    }
    else if(isset($_GET['getAshUnit'])) {
    	getAshUnit();
    }
    else if(isset($_GET['getSection'])) {
    	getSection();
    }
    else if(isset($_GET['getBlock'])) {
    	getBlock();
    }
    else if(isset($_GET['getAsh'])) {
    	getAsh();
    }
    else if(isset($_GET['getAshLevel'])) {
    	getAshLevel();
    }
    else if(isset($_GET['getLotInterest'])) {
    	getLotInterest();
    }
    else if(isset($_GET['getAshInterest'])) {
    	getAshInterest();
    }
    else if(isset($_GET['getCustomer'])) {
    	getCustomer();
    }
    else if(isset($_GET['getDependency'])) {
    	getDependency();
    }

// All Functions Here . . .
    function getLot() {
    	$sql = "SELECT l.intLotID, l.strLotName, b.strBlockName, t.strTypeName, t.dblSellingPrice, s.strSectionName, l.intLotStatus, l.intStatus, b.intBlockID, s.intSectionID, t.intTypeID from tbllot l 
                INNER JOIN tblBlock b ON l.intBlockID = b.intBlockID 
                INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID
                INNER JOIN tblsection s ON b.intSectionID = s.intSectionID 
                WHERE l.intStatus = 0
                ORDER BY strLotName ASC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intLotID":' . $row["intLotID"] . ',';
            $output .= '"strLotName":"' . $row["strLotName"] . '",';
            $output .= '"intLotStatus":' . $row["intLotStatus"] . ',';
            $output .= '"strSectionName":"' . $row["strSectionName"] . '",';
            $output .= '"strBlockName":"' . $row["strBlockName"] . '",';
            $output .= '"strTypeName":"' . $row["strTypeName"] . '",';
            $output .= '"intBlockID":' . $row["intBlockID"] . ',';
            $output .= '"intSectionID":' . $row["intSectionID"] . ',';
            $output .= '"intTypeID":' . $row["intTypeID"] . ',';
            $output .= '"intPurchase":0,';
            $output .= '"dblSellingPrice":'. $row["dblSellingPrice"] . '}'; 
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getAshUnit() {
        $sql = "SELECT acUnit.intUnitID, acUnit.strUnitName, acUnit.intUnitStatus, acUnit.intStatus, la.strLevelName, la.dblSellingPrice, ac.strAshName, acUnit.intLevelAshID, ac.intAshID, acUnit.intCapacity   FROM tblacunit acUnit
                INNER JOIN tbllevelash la ON acUnit.intLevelAshID = la.intLevelAshID 
                INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID 
                WHERE acUnit.intStatus = 0
                ORDER BY acUnit.strUnitName ASC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intUnitID":' . $row["intUnitID"] . ',';
            $output .= '"strUnitName":"' . $row["strUnitName"] . '",';
            $output .= '"intUnitStatus":' . $row["intUnitStatus"] . ',';
            $output .= '"strLevelName":"' . $row["strLevelName"] . '",';
            $output .= '"intLevelAshID":' . $row["intLevelAshID"] . ',';
            $output .= '"intAshID":' . $row["intAshID"] . ',';
            $output .= '"strAshName":"' . $row["strAshName"] . '",';
            $output .= '"dblSellingPrice":' . $row["dblSellingPrice"] . ',';
            $output .= '"intPurchase":0,';
            $output .= '"intCapacity":'. $row["intCapacity"] . '}';
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getSection() {
        $sql = "SELECT * from tblsection WHERE intStatus = 0 ORDER BY strSectionName ASC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intSectionID":'  . $row["intSectionID"] . ',';
            $output .= '"strSectionName":"'   . $row["strSectionName"]        . '",';
            $output .= '"intNoOfBlock":'. $row["intNoOfBlock"]     . '}'; 
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getBlock() {
        $sql = "SELECT * from tblBlock WHERE intStatus = 0 ORDER BY strBlockName ASC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intBlockID":'  . $row["intBlockID"] . ',';
            $output .= '"strBlockName":"'   . $row["strBlockName"]        . '",';
            $output .= '"intNoOfLot":'   . $row["intNoOfLot"]        . ',';
            $output .= '"intSectionID":'   . $row["intSectionID"]        . ',';
            $output .= '"intTypeID":'. $row["intTypeID"]     . '}'; 
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getAsh() {
        $sql = "SELECT * FROM tblashcrypt WHERE intStatus = 0 ORDER BY strAshName ASC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intAshID":' . $row["intAshID"] . ',';
            $output .= '"strAshName":"' . $row["strAshName"] . '",';
            $output .= '"intNoOfLevel":'. $row["intNoOfLevel"] . '}'; 
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getAshLevel() {
        $sql = "SELECT * FROM tbllevelash WHERE intStatus = 0 ORDER BY strLevelName DESC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intLevelAshID":' . $row["intLevelAshID"] . ',';
            $output .= '"strLevelName":"' . $row["strLevelName"] . '",';
            $output .= '"intAshID":' . $row["intAshID"] . ',';
            $output .= '"intNoOfUnit":' . $row["intNoOfUnit"] . ',';
            $output .= '"dblSellingPrice":'. $row["dblSellingPrice"] . '}';
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getLotInterest() {
    	$sql = "SELECT * FROM tblinterest WHERE intStatus = 0 ORDER BY intYear ASC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intInterestID":' . $row["intInterestID"] . ',';
            $output .= '"intYear":' . $row["intYear"] . ',';
            $output .= '"dblPercent":' . $row["dblPercent"] . ',';
            $output .= '"intTypeID":' . $row["intTypeID"] . ',';
            $output .= '"intAtNeed":'. $row["intAtNeed"] . '}';
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getAshInterest() {
    	$sql = "SELECT * FROM tblinterestforlevel WHERE intStatus = 0 ORDER BY intYear ASC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intInterestID":' . $row["intInterestID"] . ',';
            $output .= '"intYear":' . $row["intYear"] . ',';
            $output .= '"dblPercent":' . $row["dblPercent"] . ',';
            $output .= '"intLevelAshID":' . $row["intLevelAshID"] . ',';
            $output .= '"intAtNeed":'. $row["intAtNeed"] . '}';
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getCustomer() {
        $sql = "SELECT * FROM tblcustomer";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intCustomerId":' . $row["intCustomerId"] . ',';
            $output .= '"strFirstName":"' . $row["strFirstName"] . '",';
            $output .= '"strMiddleName":"' . $row["strMiddleName"] . '",';
            $output .= '"strLastName":"' . $row["strLastName"] . '",';
            $output .= '"strAddress":"' . $row["strAddress"] . '",';
            $output .= '"strContactNo":"' . $row["strContactNo"] . '",';
            $output .= '"datBirthday":"' . $row["datBirthday"] . '",';
            $output .= '"intGender":' . $row["intGender"] . ',';
            $output .= '"intCivilStatus":'. $row["intCivilStatus"] . '}';
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getDependency() {
        $sql = "SELECT * FROM tblbusinessdependency";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ',';}
            $output .= '"' . $row["strBusinessDependencyName"] . '":'. $row["deciBusinessDependencyValue"] . '';
        }
        mysql_close($GLOBALS['conn']);
        $output ='[{'.$output.'}]';
        echo($output);
    }
?>
