<!--COLLECT DOWNPAYMENT MODAL-->
<div class = "modal fade" id = "collectDownpayment" style="z-index:1501;display:none;">
	<div class = "modal-dialog" style = "width: 80%;" style="z-index:1500;">
		<div class = "modal-content" style = "height: 520px;">
			
			<!--header-->
			<div class = "modal-header">
				<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
			</div>
							
			<!--body (form)-->
			<div class = "modal-body">
				
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive col-md-12 col-lg-12 col-xs-12">
							<table id="datatableCollectDownpayment" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th class = "success" style = "text-align: center; font-size: 20px;">Date</th>
										<th class = "success" style = "text-align: center; font-size: 20px;">Transaction Code</th>
										<th class = "success" style = "text-align: center; font-size: 20px;">Payment</th> 
									</tr>
								</thead>
					
								<tbody>
								  
								</tbody>
							</table>
						</div><!-- /.table-responsive -->
					</div><!--col-md-8-->
				</div><!--row-->
				
				<div class="row">
					<div class="col-md-12">
						<form class="form-vertical" role="form" action = "payment.php" method= "post">
							<div class="form-group">
								
								<div class="col-md-4">
									<b>Balance:</b>
								  <input type="text" class="form-control input-md" name="downpaymentBal" onkeypress="return validateNumber(event)" readonly />
								</div>
							</div>
							
							<div class="form-group">
								
								<div class="col-md-4">
								<b>Mode of Payment:</b>
									<select class="form-control" name = "modePayment"  required>
										<option value="">Cash</option>
										 <option value="">Cheque</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								
								<div class="col-md-4">
								<b>Amount Paid:</b>
								  <input type="number" class="form-control input-md" name="downpaymentAmtPaid" onkeypress="return validateNumber(event)" required/>
								</div>
							</div>
							
							
						</form>
					</div><!--col-md-4-->
				</div><!--row-->
			</div><!-- modal body-->
			<div class="modal-footer">
				<form class="form-horizontal" role="form" action = "payment.php" method= "post">
					<div class="form-group">
						<div class="col-md-12 col-md-offset-5">
							<button type = "submit" class="btn btn-success col-md-3" name="btnSubmit">SUBMIT</button>
							<button type="close" data-dismiss="modal"  class="btn btn-default col-md-3" name= "btnCancel">CANCEL</button>
						</div>
					</div>
					<h4 class="col-md-12" style = "color: red;" align="left" style="margin-top:.30em">REQUIRED ALL FIELDS</h4>
				</form>
			</div><!-- modal footer-->
		</div><!-- modal content-->
	</div><!-- moda dialog-->
</div><!-- modal fade-->

 