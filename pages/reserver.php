<?php

require ("controller/connection.php");
require('controller/viewdata.php');
require('controller/createdata.php');
require('controller/updatedata.php');
require('controller/deactivate.php');
require('modals/AshcryptUnitDetails.php');
require('modals/BillOutForm.php');
require('modals/LotUnitDetails.php');
/*require('modals/ChequeModal.php');*/


if (isset($_POST['btnSave'])){

    $tfServiceName = $_POST['tfServiceName'];
    $serviceType = $_POST['serviceType'];
    $tfServicePrice= $_POST['tfServicePrice'];
    $tfStatus=$_POST['tfStatus'];
    
    $createService =  new createService();
    $createService->Create($tfServiceName,$serviceType,$tfServicePrice,$tfStatus);
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

    <title>MLMS-Unit Availment</title>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" href="easyWizard.css">
    <script src="easyWizard.js"></script>
	
    <style type="text/css">
      
	  #lotMap {
		position: relative;
	  }

	  .lot {
		float: left;
		//background: #2db34a;
		//border: 2px solid black;
		border-radius: 4px;
		height: 90px;
		line-height: 120px;
		position: relative;
		text-align: center;
		width: 80px;
		color: #fff;
		margin: 10px;
	  }
	  .ashcrypt {
		//float: left;
		//background: #2db34a;
		border-left: none;
		border-radius: 4px;
		height: 80px;
		line-height: 120px;
		text-align: center;
		width: 80px;
		color: #fff;
		margin: 5px;
		margin-left: 6px; 
		display: inline-block;
	  }
	  .circle {
		height: 50px;
		width: 50px;
		white-space: nowrap;
		display: inline-block;
		text-align: center;
		vertical-align: middle;
		border-radius: 50%;
		color: #fff;
		position: relative;
	  }

	  .available {
		background: #66BB6A;
	  }
	  .reserved {
		background: #64B5F6;
	  }
	  .owned {
		background: #C62828;
	  }
	  .disabled {
		background: grey;
	  }

	  .ash {
		//background: #F5F7FA;
		//height: 92px;
		border-bottom: 2px solid #E6E9ED;
		white-space: nowrap;
		display:inline-block;
		position: relative;
	  }

	   .ash:first-child {
		border-top: 2px solid #E6E9ED;
		//margin-left: 10px;
		//margin-top: 10px;
	  }

	  .levelDetails {
		border-left: none;
		border-radius: 4px;
		height: 80px;
		line-height: 120px;
		text-align: center;
		width: 80px;
		margin: 5px;
		margin-left: 6px; 
		display: inline-block;
		color: #333;
	  }

	  #mapAsh {
		overflow-x: auto;
		overflow-y: auto;
		max-width: 100%;
		display: inline-block;
	  }

	  .ash .lot {
		display: inline-block;
		color: #fff;
	  }

	  .ReserveAtNeed, .Spotcash {
		display: none;
	  }
	  
	  .atNeed{
		  background: #FFEB3B;
	  }

	  .map {
		//display: none;
	  }

	  .legend {
		text-align: center;
	  }

    #btnBill {
      position: relative;
      //bottom: 4.5vh;
      //right: 4vh;      z-index:900;
      width: 10em;
      display: none;
    }

    .hidden {
      display: none;
    }

    tr, td, th, {
      display:  block;
    }

    </style>
        
    <script>/*
        $( document ).ready(function() {
            $('.containerLevelMap').width($('.ash').width());
            window.intNoUnit = 1;
            
        });
            function validateNumber(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if (charCode == 8 || (charCode >= 48 && charCode <= 57)){
                    return true;
                    }else{
                    return false;
                    }
                }

                $(function(){
  });*/
            
          //   $(function(){

          //     $('body').on('change', '#selectSection', function(){
          //       $('#selectBlock').html('');
          //       $('#lotMap').html('');
          //       window.intLotAvailable = 0;
          //       window.intLotReserved = 0;
          //       window.intLotOwned = 0;
          //       $('#legendLotAvailable').html(intLotAvailable);
          //       $('#legendLotReserved').html(intLotReserved);
          //       $('#legendLotOwned').html(intLotOwned);
          //       thisSectionID = $(this).val();
          //       $.get("getData.php?fnName=getBlock&intSectionID="+thisSectionID, function(data){
          //         if(data != 0) {
          //           arrayData = data.split(",");
          //           $('#selectBlock').append("<option selected disabled>Choose Block</option>");
          //           for(var i=0; i<arrayData.length-1; i+=5){
          //             $('#selectBlock').append("<option value="+arrayData[i]+" lot="+arrayData[i+2]+" price="+arrayData[i+3]+" type='"+arrayData[i+4]+"'>"+arrayData[i+1]+"</option>");
          //           }
          //         }
          //       });
          //     });

          //     $('body').on('change', '#selectBlock', function(){
          //       thisBlockID = $(this).val();   
          //       $('#lotMap').html('');
          //       window.intLotAvailable = 0;
          //       window.intLotReserved = 0;
          //       window.intLotOwned = 0;
          //       $('#legendLotAvailable').html(intLotAvailable);
          //       $('#legendLotReserved').html(intLotReserved);
          //       $('#legendLotOwned').html(intLotOwned);
          //       $.get("getData.php?fnName=getLot&intBlockID="+thisBlockID, function(data){
          //         if(data != 0) {
          //           arrayData = data.split(",");
          //           for(var i=0; i<arrayData.length-1; i+=3){
          //             intLotStatus = arrayData[i+2];
          //             switch (intLotStatus) {
          //               case '0': lotStatus = "available"; intLotAvailable++; break;
          //               case '1': lotStatus = "reserved"; intLotReserved++; break;
          //               case '2': lotStatus = "owned"; intLotOwned++; break;
          //               default: break;
          //             }
          //             strSectionName = $('#selectSection option:selected').html();
          //             strBlockName = $('#selectBlock option:selected').html();
          //             intPrice = $('#selectBlock option:selected').attr('price');
          //             strTypeName = $('#selectBlock option:selected').attr('type');
          //             $('#lotMap').append("<div class='lot "+lotStatus+"' id="+arrayData[i]+" lotStatus='"+lotStatus+"' Section='"+strSectionName+"' Block='"+strBlockName+"' Price='"+intPrice+"' Type='"+strTypeName+"'>"+arrayData[i+1]+"</div>");
          //             $('#legendLotAvailable').html(intLotAvailable);
          //             $('#legendLotReserved').html(intLotReserved);
          //             $('#legendLotOwned').html(intLotOwned);
          //           }
          //         }
          //       });
          //     });

          //     $('body').on('change', '#selectAshBlock', function(){
          //       $('#selectLevel').html('');
          //       $('#levelMap').html('');
          //       window.intAshAvailable = 0;
          //       window.intAshReserved = 0;
          //       window.intAshOwned = 0;
          //       $('#legendAshAvailable').html(intAshAvailable);
          //       $('#legendAshReserved').html(intAshReserved);
          //       $('#legendAshOwned').html(intAshOwned);
          //       thisAshID = $(this).val();
          //       $.get("getData.php?fnName=getLevel&intAshID="+thisAshID, function(data){
          //         if(data != 0) {
          //           arrayData = data.split(",");
          //           $('#selectLevel').append("<option selected disabled>Choose Level</option>");
          //           for(var i=0; i<arrayData.length-1; i+=4){
          //             var tempLevel = "#lvl"+arrayData[i];
          //             $('#levelMap').append("<div class='ash' id='lvl"+arrayData[i]+"'></div>");
          //             $('#levelMap').hide();
          //             strLevelID = "#lvl"+arrayData[i];
          //             $(strLevelID).append("<div class='ashcrypt'>Level "+arrayData[i+1]+"</div>");
          //             addAshcrypt(arrayData[i],arrayData[i+1],arrayData[i+2],arrayData[i+3]);
          //           }
          //         }
          //       });
          //     });

          //     $('body').on('click', '.lot', function(){
          //       lotID = $(this).attr('id');
          //       lotID = '#' + lotID;
          //       displayLot(lotID);
          //     });

          //     $('#addunit').on('click', function(){
          //       $('#btnBill').show();
          //       $('#popUpWindow').modal('hide');
          //       $(lotID).addClass('disabled');
          //       $('#tableBody  ').append("<tr><td>"+intNoUnit+++"</td><td><a class='btn btn-round btn-info' lotID='"+lotID+"' onclick='view(this);'><i class='fa fa-eye'></i> View</a></td><td class='reservation'>1</td><td>1</td><td>1</td><td class='reservation'>1</td><td>1</td></tr>");
          //     });

          //     $('#removeunit').on('click', function(){
          //       $('#btnBill').show();
          //       $('#popUpWindow').modal('hide');
          //       $(lotID).removeClass('disabled');
          //     });

          //     $('body').on('click', '.ashcrypt', function(){
          //        ashcryptID = $(this).attr('id');
          //        ashcryptID = '#' + ashcryptID;
          //        displayAsh(ashcryptID);
          //     });

          //     $('body').on('change', '#typeAvail', function(){
          //       if($('#typeAvail option:selected').attr('id') == "spotcash") {
          //         $('.reservation').hide();
          //       }
          //       else {
          //         $('.reservation').show();
          //       }
          //     });
          //   });


          // function view(thisLotID){
          //   thisLotID = $(thisLotID).attr('lotID');
          //   displayLot(thisLotID);
          // }

          // function displayLot(lotID){
          //   //lotID = '#' + lotID;
          //   strSectionName = $(lotID).attr('Section');
          //   strBlockName = $(lotID).attr('Block');
          //   strLotName = $(lotID).html();
          //   dblPrice = $(lotID).attr('Price');
          //   lotStatus = $(lotID).attr('lotStatus');
          //   strTypeName = $(lotID).attr('Type');
          //   $('#inputSectionName').val(strSectionName);
          //   $('#inputBlockName').val(strBlockName);
          //   $('#inputLotType').val(strTypeName);
          //   $('#inputPrice').val(dblPrice);
          //   $('#inputUnitName').val(strLotName);
          //   $('#inputStatus').val(lotStatus);
          //   if($(lotID).hasClass("disabled")) {
          //     $('#addunit').hide();
          //     $('#removeunit').show();
          //   }
          //   else {
          //     $('#addunit').show();
          //     $('#removeunit').hide();
          //   }
          //   $('#popUpWindow').modal('show');
          // }

          // function addAshcrypt(intLevelID,strLevelName,intNoOfUnit,dblSellingPrice){
          //   $.get("getData.php?fnName=getAsh&intLevelAshID="+intLevelID, function(data){
          //     strLevelID = "#lvl"+intLevelID;
              // if(data != '') {
              //   arrayData = data.split(",");
              //   for(var i=0; i<arrayData.length-1;  +=4){
              //     switch (arrayData[i+2]) {
              //       case '0': unitStatus = "available"; intAshAvailable++; break;
              //       case '1': unitStatus = "reserved"; intAshReserved++; break;
              //       case '2': unitStatus = "owned"; intAshOwned++; break;
              //       default: break;
              //     }
          //         $(strLevelID).append("<div class='ashcrypt "+unitStatus+"' unitStatus="+unitStatus+" id='"+arrayData[i]+"' capacity="+arrayData[i+3]+" level='"+strLevelName+"' noUnit="+intNoOfUnit+" price="+dblSellingPrice+">"+arrayData[i+1]+"</div>");
          //       }
          //     }
          //     else {
          //       $(strLevelID).remove();
          //     }
          //     $('#levelMap').show();
          //     $('.ash').width($('#levelMap')[0].scrollWidth-20);
          //     $('#legendAshAvailable').html(intAshAvailable);
          //     $('#legendAshReserved').html(intAshReserved);
          //     $('#legendAshOwned').html(intAshOwned);
          //   });
          // }



          // function displayAsh(ashcryptID){
          //   strLevelName = $(ashcryptID).attr('level');
          //   intCapacity = $(ashcryptID).attr('capacity');
          //   strAshName = $(ashcryptID).html();
          //   dblPrice = $(ashcryptID).attr('price');
          //   unitStatus = $(ashcryptID).attr('unitStatus');
          //   $('#inputSectionName').val(strLevelName);
          //   $('#inputBlockName').val(intCapacity);
          //   $('#inputPrice').val(dblPrice);
          //   $('#inputUnitName').val(strAshName);
          //   $('#inputStatus').val(unitStatus);
          //   if($(ashcryptID).hasClass("disabled")) {
          //     $('#addunit').hide();
          //     $('#removeunit').show();
          //   }
          //   else {
          //     $('#addunit').show();
          //     $('#removeunit').hide();
          //   }
          //   $('#popUpWindow').modal('show');
          // }

        </script>
</head>

<body class="nav-sm" ng-app="myApp">

    <div class="container body">
        <div class="main_container">
			<?php 
				require("sidemenu.php");
				require("topnav.php");  
			?>
        
			<!-- page content -->
			<div class="right_col" role="main">

				<div class="col-md-12">
					<div class="panel panel-success ">
						<div class="panel-body">
							<button id="btnBill" type="button" class="btn btn-success btn-lg col-md-6 pull-right" data-toggle="modal" data-target="#modalBill">
							  <span class="glyphicon glyphicon-credit-card" aria-hidden="true" ></span> BILL OUT
							</button>
							
						    <div class="" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
									<li role="presentation" class="active">
										<a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Lot-Unit</a>
									</li>
									<li role="presentation" class="">
										<a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">AshCrypt-Unit</a>
									</li>  
								</ul>
								
								<div id="myTabContent2" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">

										<div class="col-md-4">
											<div class="panel panel-success ">
												<div class="panel-heading">
													<H3><b>Select Lot</b></H3>
												</div><!-- /.panel-heading -->
                     
												<div class="panel-body">
													<div class="form-group">
														<label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.50em">Section:</label>
														<div class="col-md-7">
															<select class="form-control input-md" id="selectSection" onchange="changeSection(this.value)">
																<option selected disabled>Choose Section</option>
															</select>
														</div>
													</div>

													<div class="form-group">
														<label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.50em">Block:</label>
														<div class="col-md-7">
															<select class="form-control input-md" id="selectBlock" onchange="changeBlock(this.value)" style="margin-top:.50em">
																<option selected disabled>Choose Block</option>
															</select>
														</div>
													</div>
												</div>
											</div>

											<div class="panel panel-success">
												<div class="panel-heading">
													<H3><b>Legends :</b></H3>
												</div><!-- /.panel-heading -->
												
												<div class="panel-body">
													<center>
														<div>
															<div class="col-md-3">
															  <div class="circle available" id="legendLotAvailable"></div>
															  Available
															</div>
														</div>

														<div>
															<div class="col-md-3">
																<div class="circle reserved" id="legendLotReserved"></div>
																Reserved
															</div>
														</div>

														<div>
															<div class="col-md-3">
																<div class="circle owned" id="legendLotOwned"></div>
																Owned
															</div>
														</div>
														
														<div>
															<div class="col-md-3">
																<div class="circle atNeed" id="legendLotAtNeed"></div>
																AtNeed
															</div>
														</div>
													</center>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>

										<div class="col-md-8">
											
											<div class="panel panel-success">
												<div class="panel-body" id="mapLot">
												</div>
											</div>
										</div>
									</div>
									
									<div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
										<div class="col-md-4">
											<div class="panel panel-success ">
												<div class="panel-heading">
													<H3><b>Select Ashcrypt</b></H3>
												</div><!-- /.panel-heading -->
                     
												<div class="panel-body">
													<div class="form-group">
														<label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.50em">Ashcrypt: </label>
														<div class="col-md-7">
															<select class="form-control input-md" id="selectAsh" onchange="changeAsh(this.value)">
															  <option selected disabled>Choose Ashcrypt</option>
															</select>
													    </div>
													</div>
												</div>
											</div>

											<div class="panel panel-success ">
												<div class="panel-heading">
													<H3><b>Legends :</b></H3>
												</div><!-- /.panel-heading -->
												
												<div class="panel-body">
													<center>
														<div class="col-md-3">
															<div class="circle available" id="legendAshAvailable"></div>
															Available
														</div>
														
														<div class="col-md-3">
															<div class="circle reserved" id="legendAshReserved"></div>
															Reserved
														</div>
														
														<div class="col-md-3">
															<div class="circle owned" id="legendAshOwned"></div>
															Owned
														</div>
														
														<div class="col-md-3">
															<div class="circle atNeed" id="legendAshAtNeed"></div>
															AtNeed
														</div>
													</center>
												</div>
											</div>
										</div>
										
										<div class="col-md-8" id="containerLevel">
											<div class="panel panel-success map" id="containerLevelMap">
												<div class="panel-body" id="mapAsh">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div><!--/page content-->
        
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

 
	<!-- Bootstrap -->
	<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="../vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="js/moment/moment.min.js"></script>
	<script src="js/datepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="../vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="../vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="../vendors/autosize/dist/autosize.min.js"></script>
	 <!-- jquery.inputmask -->
	<script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="../vendors/starrr/dist/starrr.js"></script>

	<!-- Custom Theme Scripts -->
	<script src="../build/js/custom.min.js"></script>


          

    <!--Sencya kana pre Formula for monthly amortization 

	MA = ((((BasePrice - Downpayment)*Interest Rate)*No of years) + BasePrice - Downpayment)) / (No.of years * 12)                  ---->


 <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->

    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->


    <!-- Parsley -->
    <script>
      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form .btn').on('click', function() {
          $('#demo-form').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });

      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form2 .btn').on('click', function() {
          $('#demo-form2').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form2').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
      try {
        hljs.initHighlightingOnLoad();
      } catch (err) {}
    </script>
    <!-- /Parsley -->


	<script type="text/javascript">
	  $(document).on("ready", function(){
				$("#modalBill").wizard({
			exitText: 'exit',
					onfinish:function(){
            window.open('reservation-pdf.php', '_blank');
					}
				});
			});

	</script>
	
 

  <script type="text/javascript" src="./js/getDataBase.js"></script>
  <script type="text/javascript" src="./js/reservation.js"></script>

</body>
</html>