<?php
	
require("modals/collectDownpaymentModal.php");
?>

<!--VIEW DOWNPAYMENT MODAL-->
<div class = "modal fade" id = "viewDownpayment">
	<div class = "modal-dialog" style = "width: 60%;">
		<div class = "modal-content" style = "height: 320px;">
			<!--header-->
			<div class = "modal-header">
				<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
				<h3 class = "modal-title">Downpayment: (Name of customer)</h3>
			</div>
			
			<!--body (form)-->
			<div class = "modal-body">
				<div class="table-responsive col-md-12 col-lg-12 col-xs-12">
					<table id="datatableViewDownpayment" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class = "success" style = "text-align: center; font-size: 20px;">Transaction code</th>
								<th class = "success" style = "text-align: center; font-size: 20px;">Unit</th>
								<th class = "success" style = "text-align: center; font-size: 20px;">Balance</th> 
								<th class = "success" style = "text-align: center; font-size: 20px;">Due Date</th>   
								<th class = "success" style = "text-align: center; font-size: 20px;">Action</th>                                                                 
							</tr>
						</thead>
						
						<tbody>
							<td>Downpayment 1</td>
							<td>Unit 1</td>
							<td>9.00</td>
							<td>September 30, 2016</td>
							<td align="center">
								<button type = "button" class = "btn btn-success" data-toggle = "modal"  data-target = "#collectDownpayment">
									<i class="glyphicon glyphicon-folder-open"> COLLECT</i>
								</button>
							</td>
						 
						</tbody>
					</table>
				</div><!-- /.table-responsive -->
			</div><!-- moda body-->
		</div><!-- modal content-->
	</div><!-- moda dialog-->
</div><!-- modal fade-->
