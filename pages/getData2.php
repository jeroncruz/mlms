<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    require("controller/connection.php");

    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
    mysql_select_db(constant('mydb'));
    
    $fnName = $_GET['fnName'];
    switch ($fnName) {
        case 'getSection':
            getSection();
            break;

        case 'getBlock':
            getBlock();
            break;

        case 'getLot':
            getLot();
            break;

        case 'getAshLevel':
            getAshLevel();
            break;

        case 'getAsh':
            getAsh();
            break;

        case 'getAshUnit':
            getAshUnit();
            break;

        case 'getCustomer':
            getCustomer();
            break;

        case 'getDependency':
            getDependency();
            break;

        case 'getInterest':
            getInterest();
            break;
        
        default:
            # code...
            break;
    }

    function getSection() {
        $sql = "SELECT * from tblsection WHERE intStatus = 0 ORDER BY strSectionName ASC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intSectionID":"'  . $row["intSectionID"] . '",';
            $output .= '"strSectionName":"'   . $row["strSectionName"]        . '",';
            $output .= '"intNoOfBlock":"'. $row["intNoOfBlock"]     . '"}'; 
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getBlock() {
        $intSectionID = $_GET['intSectionID'];
        $sql = "SELECT * from tblBlock WHERE intStatus = 0 AND intSectionID = $intSectionID ORDER BY strBlockName ASC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intBlockID":"'  . $row["intBlockID"] . '",';
            $output .= '"strBlockName":"'   . $row["strBlockName"]        . '",';
            $output .= '"intNoOfLot":"'   . $row["intNoOfLot"]        . '",';
            $output .= '"intTypeID":"'. $row["intTypeID"]     . '"}'; 
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getLot() {
        $intBlockID = $_GET['intBlockID'];
        $sql = "SELECT l.intLotID, l.strLotName, b.strBlockName,t.strTypeName, t.dblSellingPrice, s.strSectionName, l.intLotStatus, l.intStatus from tbllot l 
                INNER JOIN tblBlock b ON l.intBlockID = b.intBlockID 
                INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID
                INNER JOIN tblsection s ON b.intSectionID = s.intSectionID 
                WHERE l.intStatus = 0 AND l.intBlockID = $intBlockID 
                ORDER BY strLotName ASC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intLotID":"' . $row["intLotID"] . '",';
            $output .= '"strLotName":"' . $row["strLotName"] . '",';
            $output .= '"intLotStatus":"' . $row["intLotStatus"] . '",';
            $output .= '"strSectionName":"' . $row["strSectionName"] . '",';
            $output .= '"strBlockName":"' . $row["strBlockName"] . '",';
            $output .= '"strTypeName":"' . $row["strTypeName"] . '",';
            $output .= '"intPurchase":"0",';
            $output .= '"dblSellingPrice":"'. $row["dblSellingPrice"] . '"}'; 
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getAsh() {
        $sql = "Select * from tblashcrypt WHERE intStatus = 0 ORDER BY strAshName ASC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intAshID":"' . $row["intAshID"] . '",';
            $output .= '"strAshName":"' . $row["strAshName"] . '",';
            $output .= '"intNoOfLevel":"'. $row["intNoOfLevel"] . '"}'; 
        }
        mysql_close($GLOBALS['conn']);
        $output ='['.$output.']';
        echo($output);
    }

    function getAshLevel() {
        $intAshID = $_GET['intAshID'];
        $sql = "Select * from tbllevelash WHERE intStatus = 0 AND intAshID = $intAshID ORDER BY strLevelName DESC";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ",";}
            $output .= '{"intLevelAshID":"' . $row["intLevelAshID"] . '",';
            $output .= '"strLevelName":"' . $row["strLevelName"] . '",';
            $output .= '"intAshID":"' . $row["intAshID"] . '",';
            $output .= '"intNoOfUnit":"' . $row["intNoOfUnit"] . '",';
            $output .= '"dblSellingPrice":"'. $row["dblSellingPrice"] . '"}';
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
            $output .= '{"intUnitID":"' . $row["intUnitID"] . '",';
            $output .= '"strUnitName":"' . $row["strUnitName"] . '",';
            $output .= '"intUnitStatus":"' . $row["intUnitStatus"] . '",';
            $output .= '"strLevelName":"' . $row["strLevelName"] . '",';
            $output .= '"intLevelAshID":"' . $row["intLevelAshID"] . '",';
            $output .= '"intAshID":"' . $row["intAshID"] . '",';
            $output .= '"strAshName":"' . $row["strAshName"] . '",';
            $output .= '"dblSellingPrice":"' . $row["dblSellingPrice"] . '",';
            $output .= '"intPurchase":"0",';
            $output .= '"intCapacity":"'. $row["intCapacity"] . '"}';
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
            $output .= '{"intCustomerId":"' . $row["intCustomerId"] . '",';
            $output .= '"strFirstName":"' . $row["strFirstName"] . '",';
            $output .= '"strMiddleName":"' . $row["strMiddleName"] . '",';
            $output .= '"strLastName":"' . $row["strLastName"] . '",';
            $output .= '"strAddress":"' . $row["strAddress"] . '",';
            $output .= '"strContactNo":"' . $row["strContactNo"] . '",';
            $output .= '"datBirthday":"' . $row["datBirthday"] . '",';
            $output .= '"intGender":"' . $row["intGender"] . '",';
            $output .= '"intCivilStatus":"'. $row["intCivilStatus"] . '"}';
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
            $output .= '"' . $row["strBusinessDependencyName"] . '":"'. $row["deciBusinessDependencyValue"] . '"';
        }
        mysql_close($GLOBALS['conn']);
        $output ='[{'.$output.'}]';
        echo($output);
    }

    function getInterest() {
        $intAtNeed = $_GET['intAtNeed'];
        //$intLevelAshID = $_GET['intLevelAshID'];
        //$intTypeID = $_GET['intTypeID'];
        if(isset($_GET['intLevelAshID'])) {
            $intLevelAshID = $_GET['intLevelAshID'];
            $tbl = "tblinterestforlevel";
            $ext = "intLevelAshID = $intLevelAshID";
        }
        if(isset($_GET['intTypeID'])) {
            $intTypeID = $_GET['intTypeID'];
            $tbl = "tblinterest";            
            $ext = "intTypeID = $intTypeID";
        }
        $sql = "SELECT intYear, dblPercent FROM `$tbl` WHERE intStatus = 0 AND intAtNeed = $intAtNeed AND $ext";
        $result = mysql_query($sql,$GLOBALS['conn']);
        $output = "";
        while($row = mysql_fetch_array($result)){
            if ($output != "") {$output .= ',';}
            $output .= '{"intYear":"' . $row["intYear"] . '",';
            $output .= '"dblPercent":"'. $row["dblPercent"] . '"}';
        }
        mysql_close($GLOBALS['conn']);
        $output ='[{'.$output.'}]';
        echo($output);
    }
?>