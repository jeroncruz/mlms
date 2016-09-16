<!----------------------------------------------BILL OUT FORM---------------------------------->
<div class="modal fade" id="modalBillService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1500;display:none;">
    <div class="modal-dialog" style="height:90%; width: 90%;">
		<div class="modal-content" style="height:100%; width: 100%;" >
			<div class="modal-header">
				<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
				<center>
					<h4 class="modal-title"><b>BILL OUT FORM</b></h4>
				</center>
			</div>

			<div class="modal-body wizard-content">
                
				<div class="wizard-step">
					<span class="section">STEP 1: LIST OF ORDERS</span>
					<div style="overflow-y:auto; overflow-x:hidden; max-height: 55%;">
                    
					<form class="form-horizontal form-label-left">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                        
                                                <th class="column-title">Unit ID</th>
                                                <th class="column-title">Unit Details</th>
                                                <th class="column-title ReserveAtNeed">Years to pay</th>
                                                <th class="column-title">Price</th>
                                                <th class="column-title Spotcash">Discounted Price </th>
                                                <th class="column-title ReserveAtNeed">Monthly</th>
												                        <th class="column-title ReserveAtNeed">Downnpayment</th>
                                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                                </th>
                                                <th class="bulk-actions" colspan="7">
                                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                            </tr>
                                        </thead>

										<tbody id="tableBody">
										</tbody>
									</table>
								</div><!-- TABLE RESPONSIVE-->
							</div><!--X-Panel-->
						</div><!--col-md-12-->
					</form>
					</div>
				</div><!--WIZARD STEP-->


				<div class="wizard-step">
					<span class="section">STEP 2: SELECT CUSTOMER</span>
					
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<form class="form-vertical" id="formCustomer" role="form" action="reserver.php" method="POST">
										<div class="form-group">
											<div class="col-md-7">
												<select class="form-control" id = "selectCustomer" onchange="changeCustomer(this.value)">
													<option value="default">-- Add Customer --</option>
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
				
				<div class="wizard-step">
					<span class="section">STEP 3: PAYMENT</span>
					<form class="form-horizontal" role="form" action = "reserver.php" method= "post">
						
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
                        
									<div class="panel-body">
										
										<div class="col-md-6">
											<div class ="panel panel-default">
												
												
												<div class="panel-body">
												
													<div class="form-group">
														<label class="col-md-7" style = "font-size: 18px;"  style="margin-top:.30em">Due Date for Downpayment:</label>
														<div class="col-md-5">
															<input type="text" class="form-control input-md" align="left" name= "tfDescription" readonly>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-md-7" style = "font-size: 18px;"  style="margin-top:.30em">Reservation Fee:</label>
														<div class="col-md-5">
															<input type="text" class="form-control input-md" align="left" name= "tfDescription" readonly>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-md-7" style = "font-size: 18px;"  style="margin-top:.30em">No. of Unit/s:</label>
														<div class="col-md-5">
															<input type="text" class="form-control input-md" align="left" name= "tfDescription" readonly>
														</div>
													</div>
													<div class="divider"></div>
													
													<div class="form-group">
														<label class="col-md-7" style = "font-size: 18px;"  style="margin-top:.30em">Total Amount:</label>
														<div class="col-md-5">
															<div class=" input-group">
																<span class = "input-group-addon">₱</span>
																<input type="text" class="form-control input-md" align="left" name= "tfSellingPrice" id="tfPriceCreate" onkeypress="return validateNumber(event)" readonly/>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class ="panel panel-default">
												
												
												<div class="panel-body">
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
									
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						
					</form>
				</div>
			
				<div class="wizard-step" >
					<span class="section">STEP 4: GENERATE RECEIPT</span>
					<div style="overflow-y:auto; overflow-x:hidden; max-height: 55%;">
					
					<div class="row">
						<center>
							<h1><b>Memorial Lot Management System</b></h1>
							<h4>Room 203 F N Crisostomo Building, Sumulong Highway, Barangay Mayamot, Antipolo City</h4>
						</center>
					</div>
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<form class="form-vertical" role="form">
									<div class="form-group">
										<label class="col-md-3" align="right">Customer Name:</label>
										<div class="col-md-3">
										<input type="text" class=" form-control input-md"  name= "tfDescription" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3" align="right">Transaction Code:</label>
										<div class="col-md-3">
										<input type="text" class="col-md-3 form-control input-md" name= "tfDescription" readonly>
										</div>
									</div>
									</form>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<form class="form-horizontal" role="form">
										<div class="form-group">
											<label class="col-md-7">Due Date for Downnpayment:</label>
											<div class="col-md-5">
											<input type="text" class=" form-control input-md"  name= "tfDescription" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-7">Reservation Fee:</label>
											<div class="col-md-5">
											<input type="text" class="col-md-3 form-control input-md" name= "tfDescription" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-7">No. of Unit:</label>
											<div class="col-md-5">
											<input type="text" class="col-md-3 form-control input-md" name= "tfDescription" readonly>
											</div>
										</div>
										</form>
									</div>
									
									<div class="col-md-6">
										<form class="form-horizontal" role="form">
										<div class="form-group">
											<label class="col-md-7" >Total Amount to Pay:</label>
											<div class="col-md-5">
											<input type="text" class=" form-control input-md"  name= "tfDescription" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-7" >Amount Paid:</label>
											<div class="col-md-5">
											<input type="text" class="col-md-3 form-control input-md" name= "tfDescription" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-7" >Change:</label>
											<div class="col-md-5">
											<input type="text" class="col-md-3 form-control input-md" name= "tfDescription" readonly>
											</div>
										</div>
										</form>
									</div>
								</div>
								<div class="divider"></div>
								<div class="row">
									<div class="table-responsive col-md-12 col-lg-12 col-xs-12">
										<table id="datatableReceipt" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th class = "success">Unit ID</th>
													<th class = "success">Unit Price</th>
													<th class = "success">Years to Pay</th> 
													<th class = "success">Downnpayment</th> 
													<th class = "success">Monthly Amortization</th> 
												</tr>
											</thead>
								
											<tbody>
												<tr>
													<td>collection</td>
													<td>collection</td>
													<td>collection</td>
													<td>collection</td>
													<td>collection</td>
												</tr>
												<tr>
													<td>collection</td>
													<td>collection</td>
													<td>collection</td>
													<td>collection</td>
													<td>collection</td>
												</tr>
												<tr>
													<td>collection</td>
													<td>collection</td>
													<td>collection</td>
													<td>collection</td>
													<td>collection</td>
												</tr>

											</tbody>
										</table>
									</div><!-- /.table-responsive -->
								</div>
								
								
							</div><!--Panel body-->
							
							
						</div>
					</div>
					</div>
				</div>

				<div class="modal-footer wizard-buttons">
					<!-- The wizard button will be inserted here. -->
					    
				</div>
            </div><!--/modal body-->
        </div><!--/modal content-->
    </div><!--/modal dialog-->
</div><!--/modal fade-->