<?php

require('../controller/connection.php');
require('../modals/BillOutFormSevice.php');

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MLMS-Services Request</title>

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
                <div class = "row">
                    <div class="col-md-12">
                        <div class="panel panel-success ">
                            <div class="panel-heading">
                                <H1><b>SERVICES PURCHASE</b></H1>
                            </div><!-- /.panel-heading -->
                                    
                            <div class="panel-body">
                                <div class="col-md-4">
                                    <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Services</b></H3>
                                        </div><!-- /.panel-heading -->
                                    
                                        <div class="panel-body">
                                              <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Name</th>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Price</th>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Action</th>
                                                            </tr>
                                                    </thead>                  
                                                    
                                                    <tbody>
                                                      <td>Perpetual Care</td>
                                                      <td>2,500.00</td>
                                                      <td align="center"> <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#addService'>
                                                            <i class='glyphicon glyphicon-shopping-cart'></i></button></td>                                                           
                                                    </tbody>
                                            </table>
                                        </div><!-- /.table-responsive -->
                                        </div><!-- panel body -->
                                        </div><!--panel panel-success-->
                                    </div><!--col-md-4 column-->

                                <div class="col-md-8">
                                    <div class="panel panel-default">
                                          <div class="panel-heading">
                                             <div class='btn-toolbar pull-right'>
                                                <div class='btn-group'>
                                                  <button type='button' class='btn btn-success' data-toggle='modal' data-target='#modalBillService'>CHECKOUT</button>
                                                </div>
                                              </div>
                                              <h3><b>My Cart<b></h3>
                                        </div><!-- /.panel-heading -->

                                           
                                        <div class="panel-body">    		
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                    <table id="datatable-responsivemycart" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Name</th>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Price</th>
                                                                <th class="success" style = "text-align:center; font-size: 20px;">Action</th>
                                                            </tr>
                                                    </thead>                  
                                                    
                                                    <tbody>
                                                      <td>Perpetual Care</td>
                                                      <td>2,500.00</td>
                                                      <td align="center"> <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#removeService'>
                                                            <i class='glyphicon glyphicon-trash'></i></button></td>
                                                           
                                                    </tbody>
                                            </table>
                                        </div><!-- /.table-responsive -->
                                        <h3>Grand total:</h3>
                                        </div><!-- panel body -->
                                    </div><!--panel body -->
                                </div><!--panel panel-success-->
                            </div><!--col-md-8-->   

                        </div><!--panel body -->
                    </div><!--panel panel-success-->
                </div><!--col-md-12-->
            </div><!--row-->
        </div><!-- /page content -->

        <!--ADD TO CART SERVICES MODAL-->
                            <div class = 'modal fade' id = 'addService'>
                            <div class = 'modal-dialog' style = 'width: 60%;'>
                                <div class = 'modal-content' style = 'height: 520px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                             
                                            <label>SERVICE DETAIL, ASSIGN SCHED IF EVER SERVICE SCHEDULING TYPE </label>
                                            
                                                                                   
                                    </div><!-- content-->
                                     <div class="form-group modal-footer">
                                                   
                                                    
                                                    <div class="col-md-8 col-md-6">
                                                        <button type = 'button' class="btn btn-success col-md-3" data-toggle = 'modal' title='Edit' data-target = '#'>ADD</button>
                                                        <button type="close" data-dismiss="modal"  class="btn btn-success col-md-3" name= "btnCancel">CANCEL</button>
                                                        
                                                    </div>
                                                   
                                    </div>
                                </div>
                            </div>
                        </div>
<!--REMOVE SERVICES MODAL-->
                            <div class = 'modal fade' id = 'removeService'>
                            <div class = 'modal-dialog' style = 'width: 60%;'>
                                <div class = 'modal-content' style = 'height: 520px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                             
                                            <label>SERVICE DETAIL ARE YOU SURE YOU WANT TO REMOVE? BLAH BLAH</label>
                                            
                                                                                   
                                    </div><!-- content-->
                                     <div class="form-group modal-footer">
                                                   
                                                    
                                                    <div class="col-md-8 col-md-6">
                                                        <button type = 'button' class="btn btn-success col-md-3" data-toggle = 'modal' title='Edit' data-target = '#'>CONFIRM</button>
                                                        <button type="close" data-dismiss="modal"  class="btn btn-success col-md-3" name= "btnCancel">CANCEL</button>
                                                        
                                                    </div>
                                                   
                                    </div>
                                </div>
                            </div>
                        </div>
        <!--CHECKOUT SERVICES MODAL-->
                            <div class = 'modal fade' id = 'checkout'>
                            <div class = 'modal-dialog' style = 'width: 60%;'>
                                <div class = 'modal-content' style = 'height: 70%;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                             
                                            <label>FILL UP FORM</label>

                     <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <form class="form-vertical" role="form" action="reserver.php" method="POST">
                                        <div class="form-group">
                                            <div class="col-md-7">
                                                <select class="form-control" id = "selectCustomer" onchange="changeCustomer(this.value)">
                                                    <option value="">--Choose Customer--</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success col-md-3" id="btnAdd">ADD CUSTOMER</button>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="panel-body">
                                    <form class="form-vertical" role="form" action="reserver.php" method="POST">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-4" style="margin-top:.30em">
                                                    First Name:
                                                    <input type="text" class="form-control input-md" id= "tfFirstName" placeholder="First Name" required>
                                                </div>
                                                
                                                <div class="col-md-4" style="margin-top:.30em">
                                                    Middle Name:
                                                    <input type="text" class="form-control input-md" id= "tfMiddleName" placeholder="Middle Name" >
                                                </div>
                                                
                                                <div class="col-md-4" style="margin-top:.30em">
                                                    Last Name:
                                                    <input type="text" class="form-control input-md" id= "tfLastName" placeholder="Last Name" required>
                                                </div>
                                            </div>
                                            
                                        </div><!--ROW-->
                                        
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-4" style="margin-top:.30em">
                                                    Address:
                                                    <input type="text" class="form-control input-md" id= "tfAddress" placeholder="Address" required>
                                                </div>

                                                <div class="col-md-4" style="margin-top:.30em">
                                                    Contact No:
                                                    <input type="text" class="form-control" required id= "tfContactNo" data-inputmask="'mask' : '(9999) 999-9999'">
                                                </div>
                                                
                                                <div class="col-md-4" style="margin-top:.30em">
                                                    Date of Birth:
                                                    <input type="date" class="form-control input-md" id= "tfDate" >
                                                </div>
                                            </div>
                                            
                                        </div><!--ROW-->
                                        
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-4" style="margin-top:.30em">
                                                    Email Address:
                                                    <input type="email" class="form-control input-md" id= "tfEmail" placeholder="Email Address" required>
                                                </div>
                                                
                                                <div class="col-md-4" style="margin-top: 30px;">
                                                    Gender:
                                                    <input type="radio"  align="right" class="flat form-control input-md" id="radioMale" name="gender" value=0> MALE
                                                    <input type="radio" align="right" class="flat form-control input-md" name="gender" id="radioFemale" value=1>FEMALE
                                                </div>
                                                
                                                <div class="col-md-4" style="margin-top:30px;">
                                                    Civil Status:
                                                    <input type="radio"  align="right" class="flat form-control input-md" for="single" id="SingleID" name="civilStatus"> SINGLE
                                                    <input type="radio" align="right" class="flat form-control input-md" for="married" id="MarriedID" name="civilStatus"> MARRIED
                                                    <input type="radio" align="right" class="flat form-control input-md" for="widow" id="WidowID"  name="civilStatus"> WIDOW
                                                </div>
                                            </div>
                                        </div><!--ROW-->
                                        
                                    </form>
                                </div><!--PANEL BODY-->
                            </div>
                        </div>
                    </div><!--ROW-->
                </div>  
                
                                            
                                                                                   
                                    </div><!-- content-->
                                     <div class="form-group modal-footer">
                                                   
                                                    
                                                    <div class="col-md-8 col-md-6">
                                                        <button type = 'submit' class="btn btn-success col-md-3" data-toggle = 'modal' title='Edit' data-target = '#'>SUBMIT</button>
                                                        <button type="close" data-dismiss="modal"  class="btn btn-success col-md-3" name= "btnCancel">CANCEL</button>
                                                        
                                                    </div>
                                                   
                                    </div>
                                </div>
                            </div>
                        </div>


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
    
     <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable(bPagination:false, bInfo: false,bFilter:false);

        $('#datatable-scroller').DataTable({
          ajax: "controller/viewdata/php",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->


     <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsivemycart').DataTable(bPagination:false, bInfo: false,bFilter:false);

        $('#datatable-scroller').DataTable({
          ajax: "controller/viewdata/php",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

 <script type="text/javascript">
      $(document).on("ready", function(){
                $("#modalBillService").wizard({
            exitText: 'exit',
                    onfinish:function(){
            window.open('reservation-pdf.php', '_blank');
                    }
                });
            });

    </script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>