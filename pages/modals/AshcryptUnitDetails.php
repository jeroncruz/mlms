
 <!--------------------------------------ASH DETAILS---->

<div class = "modal fade" id = "ashDetails" style="z-index:1501;display:none;">
    <div class = "modal-dialog" style = "width:60%; height: 60% ; z-index:1500;">
		<div class = "modal-content">
         
			<!--header-->
			<div class = "modal-header" style="background:#b3ffb3;">
				<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
				<center>
					<h1 class = "modal-title"><b>ASH-CRYPT DETAILS</b></h1>
				</center>
			</div>
            
			<!--body (form)-->
			<div class = "modal-body">
				<form class="form-horizontal" role="form" action = "reserver.php" method= "post">             
                    
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
                        
                                <div class="panel-body">
								
                                        <div class="col-md-6">
											<div class ="panel panel-default">
												
												
												<div class="panel-body">
													<form role="form">

														<div class="form-group">
															<label class="col-md-5" style = " font-size: 18px;" align="right" style="margin-top:.30em">Block: </label>
															<div class="col-md-7">
																<input id="inputAshBlock" type="text" class="form-control input-md" readonly>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-5" style = " font-size: 18px;" align="right" style="margin-top:.30em">Level: </label>
															<div class="col-md-7">
																<input id="inputAshLevel" type="text" class="form-control input-md" readonly>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-5" style = " font-size: 18px;" align="right" style="margin-top:.30em">Unit Name: </label>
															<div class="col-md-7">
																<input id="inputAshUnit" type="text" class="form-control input-md" readonly>
															</div>
														</div>
														
													</form>
												</div>
											</div>
										</div>
									
                                        <div class="col-md-6">
											<div class ="panel panel-default">
												
												
												<div class="panel-body">
													<form role="form">

														<div class="form-group">
															<label class="col-md-5" style = " font-size: 18px;" align="right" style="margin-top:.30em">Status: </label>
															<div class="col-md-7">
																<input id="inputAshStatus" type="text" class="form-control input-md" readonly>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-5" style = " font-size: 18px;" align="right" style="margin-top:.30em">Owner: </label>
															<div class="col-md-7">
																<input id="inputOwner" type="text" class="form-control input-md" readonly>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-5" style = " font-size: 18px;" align="right" style="margin-top:.30em">Price: </label>
															<div class="col-md-7">
																<div class=" input-group">
																	<span class = "input-group-addon">Php</span>
																	<input type="text" id="inputAshPrice" class="form-control input-md"  name= "tfSellingPrice" id="tfPriceCreate" onkeypress="return validateNumber(event)" readonly/>
																</div>
															</div>
														</div>
														
													</form>
												</div>
											</div>
										</div>

								</div><!--PANEL BODY-->
							
								<div class="modal-footer">
									<div class="col-md-12 col-md-offset-4">
										<button  id= "addAshUnit" type="button" class="btn btn-success btn-lg col-lg-4 btnAction" style="display:none;" key="" onclick="actionAddAsh(this);">
											<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> ADD TO CART
										</button>
										<button  id="removeAshUnit" type="button" class="btn btn-success btn-lg col-lg-4 btnAction" style="display:none;" key="" onclick="actionRemoveAsh(this);">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> REMOVE TO CART
										</button>
									</div>
								</div>
							</div><!--PANEL DEFAULT-->
						</div>
					</div>
				</form>                        
			</div><!--MODAL BODY-->
		</div><!--MODAL CONTENT-->
	</div> <!--MODAL DIALOG-->
</div><!--MODAL FADE-->

