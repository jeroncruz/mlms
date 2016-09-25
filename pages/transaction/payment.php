<?php

require ("../controller/connection.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MLMS-Payment</title>

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
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <H1><b>PAYMENT</b></H2>
                            </div><!-- /.panel-heading -->
                     
                            <div class="panel-body">
                    
								<div class="" role="tabpanel" data-example-id="togglable-tabs">
									<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
										<li role="presentation" class="active">
											<a href="#downpayment" role="tab" id="downpayment-tab" data-toggle="tab" aria-expanded="true">Customer Downpayment</a>
										</li>
                        
										<li role="presentation" class="">
											<a href="#collection" id="collection-tab" role="tab" data-toggle="tab" aria-expanded="false">Customer Collection</a>
										</li>
										
									</ul>
									
									<div id="myTabContent" class="tab-content">
                        
										<div role="tabpanel" class="tab-pane fade active in" id="downpayment" aria-labelledby="downpayment-tab">
											<div class="panel-body">          
												<div class="table-responsive col-md-12 col-lg-12 col-xs-12">
													<table id="datatableDownpayment" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
															<tr>
																<th class = "success" style = "text-align: center; font-size: 20px;">Customer Name</th>
																<th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
                                                            </tr>
                                                        </thead>
                                                
                                                        <tbody>
															<td>downpayment</td>
															<td align='center'>
																<button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#viewDownpayment'>
																	<i class='glyphicon glyphicon-eye-open'> VIEW</i>
																</button>
                                                            </td>
                                                        </tbody>
													</table>
												</div><!-- /.table-responsive -->
											</div><!--panel body -->
										</div><!--tabpanel-downpayment-->
						
										<div role="tabpanel" class="tab-pane fade " id="collection" aria-labelledby="collection-tab">
											<div class="panel-body">          
												<div class="table-responsive col-md-12 col-lg-12 col-xs-12">
													<table id="datatableCollection" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
															<tr>
																<th class = "success" style = "text-align: center; font-size: 20px;">Customer Name</th>
																<th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
                                                            </tr>
                                                        </thead>
                                                
                                                        <tbody>
															<td>collection</td>
															<td align='center'>
																<button type = 'button' class = 'btn btn-success' data-toggle = 'modal'  data-target = '#viewCollection'>
																	<i class='glyphicon glyphicon-eye-open'> VIEW</i>
																</button>
															</td>
                                                        </tbody>
													</table>
												</div><!-- /.table-responsive -->
											</div><!--panel body -->
										</div><!--tabpanel-collection-->
                        
									</div><!--tab-content -->
								</div><!--TAB-->
                
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
    
	<script type="text/javascript">
            $(document).ready(function(){
                $('#datatableDownpayment').DataTable();
                $('#datatableViewDownpayment').DataTable();
                $('#datatableCollectDownpayment').DataTable();
				
                $('#datatableCollection').DataTable();
                $('#datatableViewCollection').DataTable();
                
            });
	</script>
 

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
    <?php


require("../modals/viewDownpaymentModal.php");
require("../modals/viewCollectionModal.php");


?>


 </body>
</html>