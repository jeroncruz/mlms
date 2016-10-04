<?php

require ("../controller/connection.php");
require('../controller/trans-viewdata.php');
require('../controller/kenDeceasedController.php');
// require('../controller/kenUnscheduledController.php');
require('../controller/deactivate.php');

if (isset($_POST['btnAddDeceasedLot'])){
    $tfFirstName = $_POST['tfFirstName'];
    $tfMiddleName = $_POST['tfMiddleName'];
    $tfLastName= $_POST['tfLastName'];
    $intCustomerId= $_POST['intCustomerId'];
    $tfLotId= $_POST['tfLotId'];
    $tfRelationOwner=$_POST['tfRelationOwner'];
    $gender=$_POST['gender'];
    $dateOfBirth=$_POST['dateOfBirth'];
    $dateDied=$_POST['dateDied'];
    $tfDate=$_POST['tfDate'];
    $tfTotalAmount=$_POST['tfTotalAmount'];
    $tfAmountPaid=$_POST['tfAmountPaid'];
    $tfTransactionType=$_POST['tfTransactionType'];
    
    $dateOfBirthNew = date("Y-m-d", strtotime($dateOfBirth));
    $dateDiedNew = date("Y-m-d", strtotime($dateDied));
    
    $tfFirstNameNew = str_replace("'", "\'", $tfFirstName);
    $tfMiddleNameNew = str_replace("'", "\'", $tfMiddleName);
    $tfLastNameNew = str_replace("'", "\'", $tfLastName);

    $createDeceased =  new DeceasedController();
    $createDeceased->createDeceasedLot($tfDate,$tfTransactionType,$tfFirstNameNew,$tfMiddleNameNew,$tfLastNameNew,$tfRelationOwner,$gender,$dateOfBirthNew,$dateDiedNew,$intCustomerId,$tfLotId,$tfAmountPaid);
    
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MLMS-Unit Management</title>

<!-- Bootstrap -->
<link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-wysiwyg -->
<link href="../../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">


<!-- Select2 -->
<link href="../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- Switchery -->
<link href="../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- starrr -->
<link href="../../vendors/starrr/dist/starrr.css" rel="stylesheet">
<!-- jQuery -->
<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<!-- Custom Theme Style -->
<link href="../../build/css/custom.min.css" rel="stylesheet">

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<script type="text/javascript" src="../../build/js/jquery-3.1.0.js"></script>
<script type="text/javascript" src="../../build/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../../build/js/autoNumeric-min.js"></script>

<!-- Datatables -->
<script>
$(document).ready(function(){
$('#datatable-ash').DataTable();
$('#datatable-lot').DataTable();
$('#datatable-deaceased').DataTable();
$('#datatable-transfer').DataTable();
});
</script>
<!-- /Datatables -->

<script>
$( document ).ready(function() {
$('.tfAmountPaid').autoNumeric('init');

});

</script>


<script>
function validateNumber(evt) {
evt = (evt) ? evt : window.event;
var charCode = (evt.which) ? evt.which : evt.keyCode;
if (charCode == 8 || (charCode >= 48 && charCode <= 57)){
return true;
}else{
return false;
}
}
</script>   
</head>

<body class="nav-sm">
<div class="container body">
<div class="main_container">
<?php 
require('../menu/transac-sidemenu.php');
require('../menu/topnav.php');  
?>
<!-- page content -->
<div class="right_col" role="main">

<div class="col-md-12">
<div class="panel panel-success ">
<div class="panel-body">

<div class="" role="tabpanel" data-example-id="togglable-tabs">
<ul id="myTab" class="nav nav-tabs bar_tabs left" role="tablist">
<li role="presentation" id="tab_content11" class="active">
<a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">LOT-UNIT</a>
</li>
<li role="presentation" id="tab_content22" class="">
<a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">ASHCRYPT-UNIT</a>
</li>  
</ul>

<div id="myTabContent2" class="tab-content">
<div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">

<!-- LOT -->
<div class = "row">
<div class="col-md-12">
<div class="panel panel-success ">
<div class="panel-heading">

<H3><b>UNIT-MANAGEMENT</b></H3>

</div><!-- /.panel-heading -->

<div class="panel-body">

<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-vertical" role="form" action = "unitmanagement-transaction.php" method= "post">
<div class="row">
<div class="form-group">
<label class="col-md-2" style = "font-size: 18px;" align="right" style="margin-top:.30em">Filter by:</label>

<div class="col-md-3">
<select class="form-control" name = "filter1">
<option value="" selected disabled> --Choose Block (Section)--</option>
<?php
                            
$view = new unitManagement();
$view->selectBlock(); 

?>
</select>
</div>

<div class="col-md-3">
<select class="form-control" name = "filter2">
<option value="" selected disabled> --Choose Lot Status--</option>

<option value="2"> Owned</option>
<option value="3"> At-Need</option>

</select>
</div>

<div class="col-md-4">
<button type="submit" class="btn btn-success pull-left" name= "btnGo">Go</button>
<button type="submit" class="btn btn-default pull-left" name= "btnBack">ALL</button>

</div>
</div><!-- FORM GROUP -->

</div><!-- ROW -->
</form>
</div><!-- /.panel-heading -->

<div class="panel-body"> 
    <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
        <table id="datatable-lot" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th class = "success" style = "text-align: center; font-size: 18px;">Lot Name</th>
                    <th class = "success" style = "text-align: center; font-size: 18px;">Block</th>
                    <th class = "success" style = "text-align: center; font-size: 18px;">Lot Type</th>
                    <th class = "success" style = "text-align: center; font-size: 18px;">Section Name</th>
                    <th class = "success" style = "text-align: center; font-size: 18px;">Action</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                    
                    if (isset($_POST['btnGo'])){

                        $filter1 = $_POST['filter1'];
                        $filter2 = $_POST['filter2'];
                        
                        $sql = "Select l.intLotID, l.strLotName, b.strBlockName, t.strTypeName, t.intNoOfLot, t.deciSellingPrice, s.strSectionName, l.intLotStatus, l.intStatus 
                                FROM tbllot l  
                                    INNER JOIN tblBlock b ON l.intBlockID = b.intBlockID 
                                    INNER JOIN	tbltypeoflot t ON b.intTypeID = t.intTypeID
                                    INNER JOIN tblsection s	ON b.intSectionID = s.intSectionID WHERE l.intStatus = '0' AND l.intLotStatus='".$filter2."' AND b.intBlockID = '".$filter1."'  ORDER BY  strLotName ASC";

                        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                        mysql_select_db(constant('mydb'));
                        $result = mysql_query($sql,$conn);



                        while($row = mysql_fetch_array($result)){ 
                            
                            $intLotID =$row['intLotID'];
                            $strLotName =$row['strLotName'];
                            $strBlockName =$row['strBlockName'];
                            $strTypeName=$row['strTypeName'];
                            $deciSellingPrice=$row['deciSellingPrice'];
                            $intNoOfLot=$row['intNoOfLot'];
                            $strSectionName =$row['strSectionName'];
                            $intStatus =$row['intStatus'];
                            $intLotStatus =$row['intLotStatus'];
                            
                            if($intLotStatus==0){
                                
                                echo 
                                    "<tr>
                                        <td style ='font-size:18px;'>$strLotName</td>
                                        <td style ='font-size:18px;'>$strBlockName</td>
                                        <td style ='font-size:18px;'>$strTypeName</td>
                                        <td style ='font-size:18px;'>$strSectionName</td>
                                        
                                        <td align='center'>
                                            <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalSpot$intLotID'>Spotcash</button>
                                            <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalReserve$intLotID'>Reserve</button>
                                            <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalAtneed$intLotID'>Atneed</button>
                                        </td>";
                                        // require("../modals/transaction/spotcash-modal.php");
                                        // require("../modals/transaction/reserve-modal.php");
                                        // require('../modals/transaction/atneed-modal.php');

                                        
                                        
                                echo"</tr>";

                                
                            }else if($intLotStatus==1){
                                        
                                echo 
                                    "<tr>
                                        <td style ='font-size:18px;'>$strLotName</td>
                                        <td style ='font-size:18px;'>$strBlockName</td>
                                        <td style ='font-size:18px;'>$strTypeName</td>
                                        <td style ='font-size:18px;'>$strSectionName</td>
                                        
                                        <td align='center'>
                                            <button type='button' class='btn  btn-success btn-md' title='view' data-toggle='modal' data-target='#viewReserveLot$intLotID'>
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </button>
                                        </td>";
                                        // require("../modals/transaction/viewReserveLot-modal.php");

                                echo"</tr>";
                            }else if($intLotStatus==2){
                                
                                echo 
                                    "<tr>
                                        <td style ='font-size:18px;'>$strLotName</td>
                                        <td style ='font-size:18px;'>$strBlockName</td>
                                        <td style ='font-size:18px;'>$strTypeName</td>
                                        <td style ='font-size:18px;'>$strSectionName</td>
                                        
                                        <td align='center'>
                                            <button type='button' class='btn  btn-success btn-md' title='view' data-toggle='modal' data-target='#viewOwnedLot$intLotID'>
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </button>
                                        </td>";
                                        // require("../modals/transaction/viewOwnedLot-modal.php");

                                echo"</tr>";
                                
                            }else{
                                
                                echo 
                                    "<tr>
                                        <td style ='font-size:18px;'>$strLotName</td>
                                        <td style ='font-size:18px;'>$strBlockName</td>
                                        <td style ='font-size:18px;'>$strTypeName</td>
                                        <td style ='font-size:18px;'>$strSectionName</td>
                                        <td style ='font-size:18px; text-align:right;'>₱ ".number_format($deciSellingPrice,2)."</td>
                                        
                                        <td align='center'>
                                            <button type='button' class='btn  btn-success btn-md' title='view' data-toggle='modal' data-target='#viewAtNeedLot$intLotID'>
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </button>
                                        </td>";
                                        // require("../modals/transaction/viewAtNeedLot-modal.php");

                                echo"</tr>";
                                
                            }//else
                                
                        }//while($row = mysql_fetch_array($result))
                        mysql_close($conn);         
                        
                            
                    }else if(isset($_POST['btnBack'])){
                        $view = new unitManagement();
                        $view->viewLot();
                    }//else-if
                    else{
                        $view1 = new unitManagement();
                        $view1->viewLot();
                    }//else
                    ?>

                </tbody>
                </table>

    </div><!-- /.table-responsive -->
</div><!--panel body -->
</div><!--panel panel-success-->
</div><!--col-md-8-->   

</div><!--panel body -->
</div><!--panel panel-success-->
</div><!--col-md-12-->
</div><!--row-->

</div><!--tab-panel-->

<div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">

<!-- ASH - CRYPT -->
<div class = "row">
<div class="col-md-12">
<div class="panel panel-success ">
<div class="panel-heading">


<H3><b>UNIT-MANAGEMENT</b></H3>

</div><!-- /.panel-heading -->

<div class="panel-body">

<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-vertical" role="form" action = "unitmanagement-transaction.php" method= "post">
<div class="row">
<div class="form-group">
<label class="col-md-2" style = "font-size: 18px;" align="right" style="margin-top:.30em">Filter by:</label>

<div class="col-md-3">
<select class="form-control" name = "filterAsh1">
<option value="" selected disabled> --Choose Level (Ash-Crypt)--</option>
    <?php
																							
        $view = new unitManagement();
        $view->selectLevel(); 
        
    ?>

</select>
</div>

<div class="col-md-3">
<select class="form-control" name = "filterAsh2">
<option value="" selected disabled> --Choose Unit Status--</option>
<option value="0"> Available</option>
<option value="1"> Reserve</option>
<option value="2"> Owned</option>
<option value="3"> At-Need</option>

</select>
</div>

<div class="col-md-4">
<button type="submit" class="btn btn-success pull-left" name= "btnGo1">Go</button>
<button type="submit" class="btn btn-default pull-left" name= "btnBack1">ALL</button>

</div>
</div><!-- FORM GROUP -->

</div><!-- ROW -->
</form>
</div><!-- /.panel-heading -->

<div class="panel-body"> 
    <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
        <table id="datatable-ash" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th class = "success" style = "text-align: center; font-size: 18px;">Unit Name</th>
                    <th class = "success" style = "text-align: center; font-size: 18px;">Level</th>
                    <th class = "success" style = "text-align: center; font-size: 18px;">Ash-crypt</th>
                    <th class = "success" style = "text-align: center; font-size: 18px;">Action</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                    
                    if (isset($_POST['btnGo1'])){

                        $filterAsh1 = $_POST['filterAsh1'];
                        $filterAsh2 = $_POST['filterAsh2'];
                        
                        $sql = "SELECT ac.intUnitID, ac.strUnitName, ac.intUnitStatus, ac.intStatus, l.strLevelName, l.dblSellingPrice, a.strAshName FROM tblacunit ac 
                                    INNER JOIN tbllevelash l ON ac.intLevelAshID = l.intLevelAshID
                                    INNER JOIN tblashcrypt a ON l.intAshID = a.intAshID WHERE ac.intStatus = 0 AND ac.intUnitStatus = '".$filterAsh2."' AND ac.intLevelAshID = '".$filterAsh1."' ORDER BY ac.strUnitName ASC";

                        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                        mysql_select_db(constant('mydb'));
                        $result = mysql_query($sql,$conn);

                        while($row = mysql_fetch_array($result)){ 
                            
                            $intUnitID =$row['intUnitID'];
                            $strUnitName =$row['strUnitName'];
                            $strLevelName =$row['strLevelName'];
                            $strAshName=$row['strAshName'];
                            $dblSellingPrice=$row['dblSellingPrice'];
                            $intStatus =$row['intStatus'];
                            $intUnitStatus =$row['intUnitStatus'];
                            
                            if($intUnitStatus==0){
                                
                                echo 
                                    "<tr>
                                        <td style ='font-size:18px;'>$strUnitName</td>
                                        <td style ='font-size:18px;'>$strLevelName</td>
                                        <td style ='font-size:18px;'>$strAshName</td>
                                        
                                        <td align='center'>
                                            <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalSpot$intUnitID'>Spotcash</button>
                                            <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalReserve$intUnitID'>Reserve</button>
                                            <button type='button' class='btn  btn-success btn-sm' data-toggle='modal' data-target='#modalAtneed$intUnitID'>Atneed</button>
                                        </td>";
                                        
                                echo"</tr>";

                                
                            }else if($intUnitStatus==1){
                                        
                                echo 
                                    "<tr>
                                        <td style ='font-size:18px;'>$strUnitName</td>
                                        <td style ='font-size:18px;'>$strLevelName</td>
                                        <td style ='font-size:18px;'>$strAshName</td>
                                        <td style ='font-size:18px; text-align:right;'>₱ ".number_format($dblSellingPrice,2)."</td>
                                        
                                        <td align='center'>
                                            <button type='button' class='btn  btn-success btn-md' title='view' data-toggle='modal' data-target='#viewReserveAsh$intUnitID'>
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </button>
                                        </td>";
                                       
                                echo"</tr>";
                            }else if($intUnitStatus==2){
                                
                                echo 
                                    "<tr>
                                        <td style ='font-size:18px;'>$strUnitName</td>
                                        <td style ='font-size:18px;'>$strLevelName</td>
                                        <td style ='font-size:18px;'>$strAshName</td>
                                        
                                        <td align='center'>
                                            <button type='button' class='btn  btn-success btn-md' title='view' data-toggle='modal' data-target='#viewOwnedAsh$intUnitID'>
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </button>
                                        </td>";
                                       
                                    echo"</tr>";
                                
                            }else{
                                
                                echo 
                                    "<tr>
                                        <td style ='font-size:18px;'>$strUnitName</td>
                                        <td style ='font-size:18px;'>$strLevelName</td>
                                        <td style ='font-size:18px;'>$strAshName</td>
                                        
                                        <td align='center'>
                                            <button type='button' class='btn  btn-success btn-md' title='view' data-toggle='modal' data-target='#viewAtNeedAsh$intUnitID'>
                                                <i class='glyphicon glyphicon-eye-open'></i>
                                            </button>
                                        </td>";
                                       
                                echo"</tr>";
                                
                            }//else
                            
                        }//while($row = mysql_fetch_array($result))
                        mysql_close($conn);         
                        
                            
                    }else if(isset($_POST['btnBack1'])){
                        $view = new unitManagement();
                        $view->viewAshUnit();
                    }//elseif
                    else{
                        $view1 = new unitManagement();
                        $view1->viewAshUnit();
                    }//elseif

                ?>


            </tbody>
        </table>
    </div><!-- /.table-responsive -->
</div><!--panel body -->
</div><!--panel panel-success-->
</div><!--col-md-8-->   

</div><!--panel body -->
</div><!--panel panel-success-->
</div><!--col-md-12-->
</div><!--row-->

</div><!--/tabpanel-->
</div><!--myTabContent2-->
</div><!--tabpanel-->
</div><!--panel-body-->
</div><!--panel-success-->
</div><!--col-md-12-->
</div><!-- /page content -->

<!-- footer content -->
<footer>
<div class="pull-right">
MLMS-Design 
</div>
<div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>


</div>
</body>

<!-- Bootstrap -->
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../../vendors/nprogress/nprogress.js"></script>
<!-- jQuery custom content scroller -->
<script src="../../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- iCheck -->
<script src="../../vendors/iCheck/icheck.min.js"></script>



<!-- Datatables -->
<script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="../../vendors/jszip/dist/jszip.min.js"></script>
<script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>
<!-- Custom Theme Scripts -->
<script src="../../build/js/custom.min.js"></script>


<?php   
    // require("../modals/transaction/unitmanagementLot-modal.php");
 
?>

<script>
$(document).ready(function() {
$('#birthday').daterangepicker({
singleDatePicker: true,
calender_style: "picker_4"
}, function(start, end, label) {
console.log(start.toISOString(), end.toISOString(), label);
});
});
</script>
<!-- /bootstrap-daterangepicker -->

<!-- Select2 -->
<script>
$(document).ready(function() {
$(".select2_single").select2({
placeholder: "Select a Customer",
allowClear: true
});
$(".select2_group").select2({});
$(".select2_multiple").select2({
maximumSelectionLength: 4,
placeholder: "With Max Selection limit 4",
allowClear: true
});
});
</script>
<!-- /Select2 -->

<!-- jquery.inputmask -->
<script>
$(document).ready(function() {
$(":input").inputmask();
});
</script>
<!-- /jquery.inputmask -->
  





</body>
</html> 


