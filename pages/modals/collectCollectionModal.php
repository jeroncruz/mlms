  <!--COLLECT COLLECTION MODAL-->
<div class = "modal fade" id = "collectCollection" style="z-index:1501;display:none;">
	<div class = "modal-dialog" style = "width: 60%;" style="z-index:1500;">
		<div class = "modal-content" style = "height: 520px;">
			
			<!--header-->
			<div class = "modal-header">
				<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
			</div>
			
			<!--body (form)-->
			<div class = "modal-body">
				<div class="table-responsive col-md-12 col-lg-12 col-xs-12">
					<table id="datatable-responsive3col" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class = "success" style = "text-align: center; font-size: 20px;"><input type="checkbox" name="" value="null"></th>
								<th class = "success" style = "text-align: center; font-size: 20px;">Due Date</th>
								<th class = "success" style = "text-align: center; font-size: 20px;">Transaction Date</th>
								<th class = "success" style = "text-align: center; font-size: 20px;">Penalty</th> 
								<th class = "success" style = "text-align: center; font-size: 20px;">Payment</th> 
								<th class = "success" style = "text-align: center; font-size: 20px;">Status</th> 
																							   
							</tr>
						</thead>
									
						<tbody>
											  
						</tbody>
					</table>
				</div><!-- /.table-responsive -->
																	   
			</div><!-- modal-body-->
			
			<div class="modal-footer">
				<div class="col-md-8 col-md-6">
					<button type = "button" class="btn btn-success col-md-3" data-toggle = "modal" title="Edit" data-target = "#payCollection">PAY</button>
					<button type="close" data-dismiss="modal"  class="btn btn-success col-md-3" name= "btnCancel">CANCEL</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!--PAY COLLECTION MODAL-->
<div class = "modal fade" id = "payCollection">
	<div class = "modal-dialog" style = "width: 60%;">
		<div class = 'modal-content' style = 'height: 520px;'>
                                                
			<!--header-->
			<div class = 'modal-header'>
				<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
				
			</div>

			<!--body (form)-->
			<div class = 'modal-body'>

				<div class="form-group">
				  <form class="form-horizontal" role="form" action = "payment.php" method= "post">
						<div class="form-group">
							<label class="col-md-5" style = " font-size: 14px;" align="right" style="margin-top:.30em">Total Amount to Pay:</label>
							<div class="col-md-5">
							  <input type="text" class="form-control input-md" name="totalCollection" onkeypress='return validateNumber(event)' disabled />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-5" style = " font-size: 14px;" align="right" style="margin-top:.30em">Mode of Payment:</label>
							<div class="col-md-5">
								<select class="form-control" name = "modePayment"  required>
									<option value="">Cash</option>
									 <option value="">Cheque</option>
								</select>
							</div>
						</div>
						 <div class="form-group">
							<label class="col-md-5" style = " font-size: 14px;" align="right" style="margin-top:.30em">Amount Paid:</label>
							<div class="col-md-5">
							  <input type="number" class="form-control input-md" name="downpaymentAmtPaid" onkeypress='return validateNumber(event)' required/>
							</div>
						</div>

						</form>
					</div><!--form control-->

					<div class="table-responsive col-md-12 col-lg-12 col-xs-12">
						<table id="datatable-responsive3col" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
								<thead>
										<tr>
											<th class = "success" style = "text-align: center; font-size: 20px;">Due Date</th>
											<th class = "success" style = "text-align: center; font-size: 20px;">Penalty</th>
											<th class = "success" style = "text-align: center; font-size: 20px;">Payment</th> 
																										   
										</tr>
								</thead>
						
								<tbody>
								  
								</tbody>
						</table>
					</div><!-- /.table-responsive -->
														   
			</div><!-- content-->
			<div class="form-group modal-footer">
						   
							
							<div class="col-md-8 col-md-6">
								<button type = 'submit' class="btn btn-success col-md-3" data-dismiss="modal">SUBMIT</button>
								<button type="close" data-dismiss="modal"  class="btn btn-success col-md-3" name= "btnCancel">CANCEL</button>
								
							</div>
						   
			</div>
		</div>
	</div>
</div>

    
   