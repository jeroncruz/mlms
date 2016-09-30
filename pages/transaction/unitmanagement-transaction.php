<?php

require ("../controller/connection.php");
require('../controller/viewdata.php');
require('../controller/createdata.php');
 require('../controller/updatedata.php');
 require('../controller/deactivate.php');


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
                                    <li role="presentation" class="active">
                                        <a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Lot-Unit</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">AshCrypt-Unit</a>
                                    </li>  
                                </ul>
                
                <div id="myTabContent2" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">

                                        <!-- LOT -->
                                        <div class = "row">
                                            <div class="col-md-12">
                                                <div class="panel panel-success ">
                                                    <div class="panel-heading">
                                                        
                                                        <H3><b>Manage-UNIT</b></H3>
                                                        
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
                                            
                                          </select>
                                        </div>
                                        
                                        <div class="col-md-3">
                                          <select class="form-control" name = "filter2">
                                            <option value="" selected disabled> --Choose Lot Status--</option>
                                            <option value="0"> Available</option>
                                            <option value="1"> Reserve</option>
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
                                                                            <tr>
                                                                              <td>A0001</td>
                                                                              <td>B</td>
                                                                              <td>Lawn</td>
                                                                              <td>West</td>
                                                                              <td><button data-toggle = "modal" data-target="#popUpWindow">A</button></td>
                                                                            </tr>
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
                                                       
                    
                                                        <H3><b>Manage-UNIT</b></H3>
                                                        
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
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Price</th>
                                                                                    <th class = "success" style = "text-align: center; font-size: 18px;">Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            <tbody>
                                                                 
                                                                                
                                      
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
        require("../modals/transaction/customer-modal.php");
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

     <script>
        $('#tfPriceCreate').mask('000000000000.00',{reverse:true});
        $('.tfPriceUpdate').mask('000000000000.00',{reverse:true});
 </script>  


     
<!--MANAGE UNIT-->  
<div class = "modal fade" id = "popUpWindow">
    <div class = "modal-dialog" style = "width:90%; height: 80%; ">
        <div class = "modal-content">

            <!--header-->
            <div class = "modal-header" style="background:#b3ffb3;">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <center><h3 class = "modal-title">UNIT: West-B-Lawn-A0001</h3></center>
            </div>
            
            <!--body (form)-->
            <div class = "modal-body">
            
                      <div class="row">
                            <div class=  "col-lg-12">
                                <div class="panel panel-default">
                            
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" action = "unitmanagement-transaction.php" method= "post">             
                                            <legend><h3>Owner Name: Protacio,Juan D.</h3></legend>
                                        </form>

                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#ListDead" id="addDead-tab" role="tab" data-toggle="tab" aria-expanded="true">LIST OF DECEASED</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#addDead" id="addDead-tab" role="tab" data-toggle="tab" aria-expanded="false">ADD DECEASED</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#transferDead" role="tab" id=transferDead-tab" data-toggle="tab" aria-expanded="false">TRANSFER DECEASED</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#transferOwn" role="tab" id="transferOwn-tab2" data-toggle="tab" aria-expanded="false">TRANFER OWNERSHIP</a>
                                                </li>
                                            </ul>

                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="ListDead" aria-labelledby="home-tab">

                            <table id="datatable-deaceased" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                          <thead>
                                              <tr>
                                                  <th class = "success" style = "text-align: center; font-size: 18px;">Deceased Name</th>
                                                  <th class = "success" style = "text-align: center; font-size: 18px;">Birthdate</th>
                                                  <th class = "success" style = "text-align: center; font-size: 18px;">Date Died</th>
                                                  
                                              </tr>
                                          </thead>
                                          
                                          <tbody>
                                          <tr>
                                            <td>Boom Panis</td>
                                            <td>03/2/1932</td>
                                            <td>03/2/2016</td>
                                          </tr>
                                          </tbody>
                                      </table>

                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="addDead" aria-labelledby="home-tab">
                             <div class="row">
                              <div class="col-md-6 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><strong>DECEASED DETAILS</strong></h2>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">
                                    <div class="panel-body">
                                      <form class="form-vertical" role="form" action="" method="POST">
                                        <div class="row">
                                          <div class="form-group">

                                          <div class="row">
                                          
                                             <div class="col-md-6">
                                              Relationship to Owner
                                              <input type="text" class="form-control input-md" name= "tfFirstName" required>
                                            </div>
                                            </div>
                                          </div>

                                            <div class="col-md-4" style="margin-top:.30em">
                                              First Name:
                                              <input type="text" class="form-control input-md" name= "tfFirstName" placeholder="First Name" required>
                                            </div>
                                            
                                            <div class="col-md-4" style="margin-top:.30em">
                                              Middle Name:
                                              <input type="text" class="form-control input-md" name= "tfMiddleName" placeholder="Middle Name" >
                                            </div>
                                            
                                            <div class="col-md-4" style="margin-top:.30em">
                                              Last Name:
                                              <input type="text" class="form-control input-md" name= "tfLastName" placeholder="Last Name" required>
                                            </div>
                                          </div>

                                            <div class="col-md-4" style="margin-top: 30px;">
                                              Gender:
                                              <input type="radio"  align="right" class="flat form-control input-md" name="iCheck"> M
                                              <input type="radio" align="right" class="flat form-control input-md" name="iCheck">F
                                            </div>
                                            
                                            <div class="col-md-4" style="margin-top:.30em">
                                              Date of Birth:
                                              <input type="date" class="form-control input-md" name= "tfDate" >
                                            </div>

                                            <div class="col-md-4" style="margin-top:.30em">
                                              Date Died:
                                              <input type="date" class="form-control input-md" name= "tfDate" >
                                            </div>
        
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                              <div class="col-md-6 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_content">
                                    <div class="panel-body">
                                      <form class="form-vertical" role="form" action="" method="POST">
                                          <div class="form-group">
                                            <label class="col-md-7" style = "font-size: 18px;"  style="margin-top:.30em">Mode of Payment:</label>
                                            <div class="col-md-5">
                                              <select class="form-control input-md" align="left" name = "serviceName" required>
                                                <option value="">--Mode of Payment--</option>
                                              </select>
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label class="col-md-7" style = "font-size: 18px;"  style="margin-top:.30em">Total Amount to Pay:</label>
                                            <div class="col-md-5">
                                              <div class=" input-group">
                                                <span class = "input-group-addon">₱</span>
                                                <input type="text" class="form-control input-md" align="left" name= "tfSellingPrice" id="tfPriceCreate" onkeypress="return validateNumber(event)" readonly/>
                                              </div>
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label class="col-md-7" style = "font-size: 18px;"  style="margin-top:.30em">Amount Paid:</label>
                                            <div class="col-md-5">
                                              <div class=" input-group">
                                                <span class = "input-group-addon">₱</span>
                                                <input type="text" class="form-control input-md" align="left" name= "tfSellingPrice" id="tfPriceCreate" onkeypress="return validateNumber(event)" required/>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                              <button type="close" class="btn btn-primary">Cancel</button>
                                              <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                          </div>
        
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div><!--end tab 2-->

                                            
                   <div role="tabpanel" class="tab-pane fade" id="transferDead" aria-labelledby="profile-tab">
                        
                                   <div class="form-group">
                                        <label class="col-md-2" style = "font-size: 18px;" align="right" style="margin-top:.30em">Filter by:</label>
                                        
                                        <div class="col-md-3">
                                          <select class="form-control" name = "filter1">
                                            <option value="" selected disabled> --Choose Block (Section)--</option>
                                            
                                          </select>
                                        </div>
                                        
                                        <div class="col-md-3">
                                          <select class="form-control" name = "filter2">
                                            <option value="" selected disabled> --Choose Lot Status--</option>
                                            <option value="0"> Available</option>
                                            <option value="1"> Reserve</option>
                                            <option value="2"> Owned</option>
                                            <option value="3"> At-Need</option>
                                            
                                          </select>
                                        </div>
                                        
                                        <div class="col-md-4">
                                          <button type="submit" class="btn btn-success pull-left" name= "btnGo">Go</button>
                                          <button type="submit" class="btn btn-default pull-left" name= "btnBack">ALL</button>
                                          
                                        </div>
                                      </div><!-- FORM GROUP -->

                         <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                          <table id="datatable-transfer" class="table table-striped table-bordered ">
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
                              <tr>
                                <td>A0002</td>
                                <td>B</td>
                                <td>Lawn</td>
                                <td>West</td>
                                <td><button data-toggle ="modal" data-target="#TranDeadModal">TRANSFER</button></td>
                              </tr>
                              </tbody>
                          </table>
                      </div><!-- /.table-responsive -->
                    </div><!--end tab 3-->
                                           
                    <div role="tabpanel" class="tab-pane fade" id="transferOwn" aria-labelledby="profile-tab">
                         <div class=col-md-12>
                                     <button type="button" data-target="#modalCust" data-toggle="modal" class="btn btn-success pull-left" name= "btnAdd">New Customer</button>

                                     <select class='form-control' name = 'selectCustomer' required>
                              <option value=''selected disabled> --Choose Customer--</option>
                              <?php
                                  $sql1 =  " select * from dbholygarden.tblcustomer ORDER BY strLastName ASC";
                                  $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                  mysql_select_db(constant('mydb'));
                                  $result1 = mysql_query($sql1,$conn);
                                  
                                  while($row1 = mysql_fetch_array($result1)){
                                      
                                      $intCustomerId =$row1['intCustomerId'];
                                      $strFirstName=$row1['strFirstName'];
                                      $strMiddleName=$row1['strMiddleName'];
                                      $strLastName=$row1['strLastName'];
                                      
                                      
                                  echo"<option value='$intCustomerId'>$strLastName, $strFirstName $strMiddleName</option>";
              
                                  }//while
                                  
            
                              ?>
                          </select>

                      <div class="panel-body">
                        <form class="form-vertical" role="form" action="" method="POST">
                            
                            <div class="form-group">
                              <label class="col-md-7" style = "font-size: 18px;"  style="margin-top:.30em">Total Amount to Pay:</label>
                              <div class="col-md-5">
                                <div class=" input-group">
                                  <span class = "input-group-addon">₱</span>
                                  <input type="text" class="form-control input-md" align="left" name= "tfSellingPrice" id="tfPriceCreate" onkeypress="return validateNumber(event)" readonly/>
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-md-7" style = "font-size: 18px;"  style="margin-top:.30em">Amount Paid:</label>
                              <div class="col-md-5">
                                <div class=" input-group">
                                  <span class = "input-group-addon">₱</span>
                                  <input type="text" class="form-control input-md" align="left" name= "tfSellingPrice" id="tfPriceCreate" onkeypress="return validateNumber(event)" required/>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button type="close" class="btn btn-primary">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                              </div>
                            </div>

                            </form>
                          </div>
                  </div>

                    </div><!--end tab 4-->
                                    </div> <!--/tab content-->
                                </div>
                            </div><!--PANEL BODY-->
                        </div>
                    </div><!--/modal-body -->
            </div><!--/modal-content -->
          </div>
      </div>
    </div><!--/modal-dialog -->
</div><!--/modal -->


<div class = "modal fade" id = "TranDeadModal">
    <div class = "modal-dialog" style = "width:50%; height: 50%; ">
        <div class = "modal-content">

            <!--header-->
            <div class = "modal-header" style="background:#b3ffb3;">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <center><h3 class = "modal-title">List Of Deceased</h3></center>
            </div>
            
            <!--body (form)-->
            <div class = "modal-body">

              <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="check-all" class="flat"></th>
                           <th class = "success" style = "text-align: center; font-size: 18px;">Deceased Name</th>
                           <th class = "success" style = "text-align: center; font-size: 18px;">Birthdate</th>
                           <th class = "success" style = "text-align: center; font-size: 18px;">Date Died</th>
                                                  
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td><input type="checkbox" class="flat" name="table_records"></td>
                          <td>Boom Panis</td>
                          <td>03/12/1952</td>
                          <td>09/28/2016</td>
                      </tr>
                     </tbody>
              </table>

                <div class="modal-footer">
                    <div class="pull-right">
                      <button type="close" class="btn btn-primary">Cancel</button>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                 </div>
               
            </div>
        </div>
    </div>
</div>


</body>
</html> 