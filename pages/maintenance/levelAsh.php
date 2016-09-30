<?php

require ("../controller/connection.php");
require('../controller/viewdata.php');
require('../controller/createdata.php');
require('../controller/updatedata.php');
require('../controller/deactivate.php');
require('../controller/archivedata.php');
require('../controller/retrieve.php');



if (isset($_POST['btnSubmit'])){ 

	$tfLevelName = $_POST['tfLevelName'];
	$acName = $_POST['acName'];
	$tfNoOfUnit = $_POST['tfNoOfUnit'];
	$tfSellingPrice = $_POST['tfSellingPrice'];
	$tfStatus= $_POST['tfStatus'];
    
    $tfSellingPriceFinal = preg_replace('/,/', '', $tfSellingPrice);
		
	$sql = "CALL checkLevel($acName)";
	$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
	mysql_select_db(constant('mydb'));
	
	if($result = mysql_query($sql,$conn)){
	
		while($row = mysql_fetch_array($result)){
		
			mysql_close($conn);
            
			if(($row['curr'] + 1) > $row['max']){
				//echo "<script>alert('This block reach max limit unit!')</script>";
                $alertLevel = new alerts();
                $alertLevel -> alertMax();
			}else{
				
				$num_of_ids = $row['max']; //limit sa block
                $i = 0; //Loop counter.
                $l = "$tfLevelName"; //string sa lot nam
				
                while ($i < $num_of_ids){
                    
					if($tfSellingPriceFinal > 0 && $tfNoOfLot > 0){
                        $createLevelAC =  new createLevelAC();
                        $createLevelAC->Create($l,$acName,$tfNoOfUnit,$tfStatus,$tfSellingPriceFinal);
                    }else{
                        echo "<script>alert('Invalid Input!')</script>";
                    }//else
					
					$l++;
					
					$i++; 
				}//while
				//echo "<script>alert('Succesfully created!')</script>";
                $alertLevel1 = new alerts();
                $alertLevel1 -> alertSuccess();
			}//else
        }//while
	}//if	
}//if

if (isset($_POST['btnSave'])){

	$tfLevelAshID = $_POST['tfLevelAshID'];
	$tfLevelName = $_POST['tfLevelName'];
	$ashName = $_POST['ashName'];
	$tfNoOfUnit = $_POST['tfNoOfUnit'];
	$tfSellingPrice = $_POST['tfSellingPrice'];
    
    $tfSellingPriceFinal = preg_replace('/,/', '', $tfSellingPrice);
	
	$updateLA =  new updateLA();
	$updateLA->update($tfLevelAshID,$tfLevelName,$ashName,$tfSellingPriceFinal,$tfNoOfUnit);
}//if

      
if (isset($_POST['btnDeactivate'])){

	$tfLevelAshID = $_POST['tfLevelAshID'];
	
	$deactivateLA =  new deactivateLA();
	$deactivateLA->deactivate($tfLevelAshID);
}//if

if (isset($_POST['btnArchive'])){

	$tfLevelAshID = $_POST['tfLevelAshID'];
	
	$archiveLA =  new archiveLA();
	$archiveLA->archive($tfLevelAshID);
}//if

session_start();

if(isset($_SESSION['use'])){

  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Level Maintenance</title>

     <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

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
        $('#datatable-level').DataTable();
      });
    </script>
    <!-- /Datatables -->
	
	<script>
       $( document ).ready(function() {
			$('#tfSellingPrice').autoNumeric('init');
			$('.tfSellingUpdate').autoNumeric('init');
			
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
                require('../menu/maintenance-sidemenu.php');
                require('../menu/topnav.php'); 
			?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class = "row">
                    <div class="col-md-12">
                        <div class="panel panel-success ">
                            <div class="panel-heading">
                                <H1><b>LEVEL</b></H1>
                            </div><!-- /.panel-heading -->
            
                            <div class="panel-body">
                                <div class="col-md-4">
                                    <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Create New</b></H3>
                                        </div><!-- /.panel-heading -->
                     
                                        <div class="panel-body">
                                            <form class="form-horizontal" role="form" action = "levelAsh.php" method= "POST">										  
                                                <div class="form-group" >
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" value="0" name="tfStatus"/>
                                                    </div>
                                                </div>
							 
                                                <div class='form-group'>
                                                    <label class="col-md-5" style = "font-size: 18px; margin-top:.30em" align="right">Level:</label>
                                                    <div class='col-md-7'>
                                                        <input type='text 'class='form-control input-md' name= 'tfLevelName' value="A" readonly/>
                                                    </div>
                                                </div>
                                                        
                                                <div class="form-group">
                                                    <label class="col-md-5" style = "font-size: 18px; margin-top:.30em" align="right">Block:</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control input-md" name = "acName" required>
                                                            <option value=""></option>
                                                                <?php
                                                                    $view = new levelAC();
                                                                    $view->selectAC();
                                                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                            
                                                <div class="form-group" >
                                                    <label class="col-md-5" style = "font-size: 18px; margin-top:.30em" align="right">No. of Unit:</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control input-md" min="1" name="tfNoOfUnit" onkeypress="return validateNumber(event)" required/>
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label class="col-md-5" style = "font-size: 18px; margin-top:.30em" align="right">Selling Price:</label>
                                                    <div class="col-md-7">
                                                        <div class=" input-group">
                                                            <span class = "input-group-addon">₱</span>
                                                            <input type="text" class="form-control input-md" name= "tfSellingPrice" id="tfSellingPrice" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <h6 class="col-md-12" style = "color: red;" align="left" style="margin-top:.30em">ALL FIELDS ARE REQUIRED </h6>
												<div class="form-group modal-footer"> 
													<div class="col-md-12 col-md-offset-3">
														<button type="submit" class="btn btn-success col-md-4" name= "btnSubmit">Create</button>
														<input class = "btn btn-default col-md-5" type="reset" name = "btnClear" value = "Clear Entries">
													</div>
												</div>
                                                
							                </form><!--Form-->
                                        </div><!-- panel body -->
                                    </div><!--panel panel-success-->
                                </div><!--col-md-4 column-->
                     				
                                <div class="col-md-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <form class="form-vertical" role="form" action = "levelAsh.php" method= "post">
												<div class="form-group col-md-offset-4">
													<label class="col-md-4" style = "font-size: 18px;" align="right">Filter by:</label>
													<div class="col-md-5">
														<select class="form-control input-md" name = "filter" required> 
                                                            <option value="" selected disabled>--Choose your filter--</option>
                                                            <option value="0">Active</option>
															<option value="1">Inactive</option>
														</select>
													</div>
                                                    <button type="submit" class="btn btn-success col-md-2" name= "btnGo">Go</button>
												</div>
											
											</form>
                     	                  </div><!-- /.panel-heading -->
                                           
                                        <div class="panel-body">
                                            <div class="alert alert-default">
                                                <h4><strong>NOTE:</strong> You can update the <b>selling price</b> according to the level.</h4>
                                            </div>
                                            
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-level" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th class = "success" style = "text-align: center; font-size: 20px;">Level</th>
                                                            <th class = "success" style = "text-align: center; font-size: 20px;">Block</th>
                                                            <th class = "success" style = "text-align: center; font-size: 20px;">No. of Unit</th>
                                                            <th class = "success" style = "text-align: center; font-size: 20px;">Selling Price</th>
                                                            <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
														
															if (isset($_POST['btnGo'])){
																$filter = $_POST['filter'];
															
																if($filter == 1){
																	$viewDeactivate = new deactivatedLevelAC();
                                                                    $viewDeactivate->viewDeactivatedLevelAC();
																
																}else if($filter == 0){
																	$view = new levelAC();
                                                                    $view->viewLevelAC();
																}//else-if
															
															}else{
																$view1 = new levelAC();
																$view1->viewLevelAC();
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
            </div><!-- /page content -->

			<!-- footer content -->
			<footer>
				<div class="pull-right">
					MLMS-Design 
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
        
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


<?php
    }else{
?>
    <div align="center" style="margin-top: 15em">
        <p>You need to Login first before you proceed</p>
        <a href="../login.php">Go to Login Form</a>
    </div>
<?php
    }
?>
