<?php

require ("../controller/connection.php");
require('../controller/trans-viewdata.php');

if (isset($_POST['btnSubmitDeceasedLot'])){
    
    $tfLotId = $_POST['tfLotId'];
    $tfStatus = $_POST['tfStatus'];
    $selectCustomer = $_POST['selectCustomer'];
    $tfDate = $_POST['tfDate'];
    $tfModeOfPayment= $_POST['tfModeOfPayment'];
    $tfDiscountedPrice=$_POST['tfDiscountedPrice'];
    $tfAmountPaid=$_POST['tfAmountPaid'];
    
    $dateCreated = date("Y-m-d", strtotime($tfDate));
    $tfDiscountedFinal = preg_replace('/,/', '', $tfDiscountedPrice);
    $tfAmountFinal = preg_replace('/,/', '', $tfAmountPaid);
    
    if($tfAmountFinal >= $tfDiscountedFinal){
    
        $createAvailUnit =  new createAvailUnit();
        $createAvailUnit->Create($tfLotId,$tfStatus,$selectCustomer,$dateCreated,$tfModeOfPayment,$tfAmountFinal);

    }else{
        //echo "<script>alert('Insufficient Amount Paid!')</script>";
        $alertChange = new alerts();
        $alertChange -> alertChange();        
    }//else
   
    
}//if

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
                                    <li role="presentation"  class="active">
                                        <a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">LOT-UNIT</a>
                                    </li>
                                    <li role="presentation" class="">
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
                                                                
                                                                <div class="panel-body"> 
                                                                    <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                                        <table id="datatable-lot" class="table table-striped table-bordered ">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Customer Name</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Lot Name</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Block</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Lot Type</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Section Name</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            <tbody>
                                                                               
                                                                                <?php
                                                                                    
                                                                                    $sql = "SELECT a.intAvailUnitId, c.intCustomerId, c.strLastName, c.strFirstName, c.strMiddleName, c.strAddress, c.strContactNo, c.dateBirthday, l.strLotName, b.strBlockName, t.strTypeName, t.intNoOfLot, s.strSectionName FROM tblavailunit a 
                                                                                            INNER JOIN tblcustomer c ON a.intCustomerId = c.intCustomerId
                                                                                            INNER JOIN tbllot l ON l.intLotID = a.intLotId
                                                                                            INNER JOIN tblblock b ON b.intBlockID = l.intBlockID
                                                                                            INNER JOIN tbltypeoflot t ON t.intTypeID = b.intTypeID
                                                                                            INNER JOIN tblsection s ON s.intSectionID = b.intSectionID WHERE (a.strModeOfPayment = 'Spotcash' OR a.strModeOfPayment = 'At-Need') AND a.intStatus = 0 AND (a.boolForfeitedNotice != 1 OR a.boolForfeitedNotice IS NULL) AND (a.boolDownpaymentStatus = '1' OR a.boolDownpaymentStatus = '') ORDER BY c.strLastName ASC";
                                                                                   
                                                                                    $conn2 = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result = mysql_query($sql,$conn2);
                                                                               
                                                                                    while($row = mysql_fetch_array($result)){ 
			  
                                                                                        $intAvailUnitId =$row['intAvailUnitId'];
                                                                                        $intCustomerId =$row['intCustomerId'];
                                                                                        $strLastName    =$row['strLastName'];
                                                                                        $strFirstName   =$row['strFirstName'];
                                                                                        $strMiddleName  =$row['strMiddleName'];
                                                                                        $strAddress  =$row['strAddress'];
                                                                                        $strContactNo  =$row['strContactNo'];
                                                                                        $dateBirthday  =$row['dateBirthday'];
                                                                                        $strLotName     =$row['strLotName'];
                                                                                        $strBlockName   =$row['strBlockName'];
                                                                                        $strTypeName    =$row['strTypeName'];
                                                                                        $strSectionName =$row['strSectionName'];
                                                                                        $intNoOfLot     =$row['intNoOfLot'];
                                                                                        
                                                                                        echo '<tr>';
                                                                                        echo '<td style ="font-size:18px;">'.$strLastName.', '.$strFirstName.''.$strMiddleName .'</td>';
                                                                                        echo '<td style ="font-size:18px;">' . $strLotName . '</td>';
                                                                                        echo '<td style ="font-size:18px;">' . $strBlockName . '</td>';
                                                                                        echo '<td style ="font-size:18px;">' . $strTypeName . '</td>';
                                                                                        echo '<td style ="font-size:18px;">' . $strSectionName . '</td>';
                                                                                        echo '<td align="center">
                                                                                                <button type="button" class="btn  btn-success btn-md" title="LIST OF DECEASED" data-toggle="modal" data-target="#listDeceasedLot'.$intAvailUnitId.'">
                                                                                                    <i class="glyphicon glyphicon-eye-open"></i>
                                                                                                </button>
                                                                                                <button type="button" class="btn  btn-success btn-md" title="ADD DECEASED" data-toggle="modal" data-target="#addDeceasedLot'.$intAvailUnitId.'">
                                                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                                                </button>
                                                                                                <button type="button" class="btn  btn-success btn-md" title="TRANSFER OWNERSHIP" data-toggle="modal" data-target="#transferOwnershipLot'.$intAvailUnitId.'">
                                                                                                    <i class="glyphicon glyphicon-transfer"></i>
                                                                                                </button>
                                                                                              </td>';
                                                                                        echo '</tr>';
                                                                                        
                                                                                        require("../transaction/unitmanagement-modal/addDeceasedLot.php");
                                                                                        require("../transaction/unitmanagement-modal/transferOwnershipLot.php");
     
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    
                                                                                    
   
                                                                                
                                                                                    
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
                                                                
                                                                <div class="panel-body"> 
                                                                    <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                                        <table id="datatable-ash" class="table table-striped table-bordered ">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Customer Name</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Unit Name</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Level</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Ash-crypt</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            <tbody>
                                                                                <?php
                                                                                    
                                                                                    $sql3 = "SELECT a.intAvailUnitAshId, c.strLastName, c.strFirstName, c.strMiddleName, c.strAddress, c.strContactNo, c.dateBirthday, l.strUnitName, l.intCapacity, b.strLevelName, ac.strAshName FROM tblavailunitash a
                                                                                            INNER JOIN tblcustomer c ON a.intCustomerId = c.intCustomerId
                                                                                            INNER JOIN tblacunit l ON l.intUnitID = a.intUnitId
                                                                                            INNER JOIN tbllevelash b ON b.intLevelAshID = l.intLevelAshId
                                                                                            INNER JOIN tblashcrypt ac ON ac.intAshID = b.intAshId WHERE (a.strModeOfPayment = 'Spotcash' OR a.strModeOfPayment = 'At-Need') AND a.intStatus = 0 AND (a.boolForfeitedNotice != 1 OR a.boolForfeitedNotice IS NULL) AND (a.boolDownpaymentStatus = '1' OR a.boolDownpaymentStatus = '') ORDER BY c.strLastName ASC";

                                                                                    $conn3 = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                                    mysql_select_db(constant('mydb'));
                                                                                    $result3 = mysql_query($sql3,$conn3);
                                                                               
                                                                                    while($row3 = mysql_fetch_array($result3)){ 
			  
                                                                                        $intAvailUnitAshId  =$row3['intAvailUnitAshId'];
                                                                                        $strLastName        =$row3['strLastName'];
                                                                                        $strFirstName       =$row3['strFirstName'];
                                                                                        $strMiddleName      =$row3['strMiddleName'];
                                                                                        $strAddress         =$row3['strAddress'];
                                                                                        $strContactNo       =$row3['strContactNo'];
                                                                                        $dateBirthday       =$row3['dateBirthday'];
                                                                                        $strUnitName        =$row3['strUnitName'];
                                                                                        $strLevelName       =$row3['strLevelName'];
                                                                                        $strAshName         =$row3['strAshName'];
                                                                                        
                                                                                        echo '<tr>';
                                                                                        echo '<td style ="font-size:18px;">'.$strLastName.', '.$strFirstName.''.$strMiddleName .'</td>';
                                                                                        echo '<td style ="font-size:18px;">' . $strUnitName . '</td>';
                                                                                        echo '<td style ="font-size:18px;">' . $strLevelName . '</td>';
                                                                                        echo '<td style ="font-size:18px;">' . $strAshName . '</td>';
                                                                                        echo '<td align="center">
                                                                                                <button type="button" class="btn  btn-success btn-md" title="LIST OF DECEASED" data-toggle="modal" data-target="#listDeceasedAsh'.$intAvailUnitAshId.'">
                                                                                                    <i class="glyphicon glyphicon-eye-open"></i>
                                                                                                </button>
                                                                                                <button type="button" class="btn  btn-success btn-md" title="ADD DECEASED" data-toggle="modal" data-target="#addDeceasedAsh'.$intAvailUnitAshId.'">
                                                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                                                </button>
                                                                                                <button type="button" class="btn  btn-success btn-md" title="TRANSFER OWNERSHIP" data-toggle="modal" data-target="#transferOwnershipAsh'.$intAvailUnitAshId.'">
                                                                                                    <i class="glyphicon glyphicon-transfer"></i>
                                                                                                </button>
                                                                                              </td>';
                                                                                        echo '</tr>';
                                                                                        
                                                                                        require("../transaction/unitmanagement-modal/addDeceasedAsh.php");
                                                                                        require("../transaction/unitmanagement-modal/transferOwnershipAsh.php");
     
                                                                                    }//while($row = mysql_fetch_array($result))
                                                                                    
                                                                                    // mysql_close($conn3);

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
            </footer><!-- /footer content -->
        
        </div><!-- main_container -->
    </div><!-- container body -->

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

    
</body>
</html> 


