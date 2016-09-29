<div class='modal fade' id='<?php echo"viewCollectionLot$intAvailUnitId";?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='z-index: 1500;display:none;'>
    <div class='modal-dialog' role='document' style = 'width:80%; height: 90%;'>
        <div class='modal-content'>
             <div class='modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <center><h3>COLLECTION: <b><?php echo $strLastName,", $strFirstName $strMiddleName"; ?></b></h3></center>
            </div>

            <div class='modal-body'>
                <form class='form-horizontal' role='form' action='payment.php' method='POST'>
                    <div class='container-fluid'>
                        <div class='col-xs-6'>
                            <div class='panel panel-default'>
                                <div class='panel-body'>
                                    
                                    <input type='hidden'  name='tfAvailUnitId' value='<?php echo"$intAvailUnitId";?>'  readonly>
                                    
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Lot Name:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfLotName' value='<?php echo"$strLotName";?>'  readonly>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Mode of Payment:</label>
                                        <div class='col-md-5'>
                                            <input type='text' class='form-control input-md' name='tfModeOfPayment' value='<?php echo"$strModeOfPayment";?>'  readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Remaining Balance:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' name='tfBalance' value='<?php  echo"".number_format($deciBalance,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Years to pay:</label>
                                        <div class='col-md-5'>
                                            <input type='number' class='form-control input-md' name='tfNoOfYear' value='<?php echo"$intNoOfYear";?>'  readonly>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        if($strModeOfPayment=='Reserve'){ ?> 
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Interest Rate:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                               <input type='text' class='form-control input-md' name='tfInterestRate' value='<?php  echo"$deciRegularInterest";?>' readonly/>
                                               <span class = 'input-group-addon'>%</span>  
                                            </div>
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                        <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Interest Rate:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                               <input type='text' class='form-control input-md' name='tfInterestRate' value='<?php  echo"$deciAtNeedInterest";?>' readonly/>
                                               <span class = 'input-group-addon'>%</span>  
                                            </div>
                                        </div>
                                    </div>
                                    <?php }//else ?>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Monthly Amortization:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <?php
                                                    if($strModeOfPayment == 'Reserve') {
                                                        $interest = $deciRegularInterest/100;
                                                    
                                                        $amortization = (((($deciSellingPrice - $deciDownpayment)*$interest)*$intNoOfYear) + $deciSellingPrice - $deciDownpayment) / ($intNoOfYear * 12);
                                                    	
                                                    }else{
                                                        $interest = $deciAtNeedInterest/100;
                                                    
                                                        $amortization = (((($deciSellingPrice - $deciDownpayment)*$interest)*$intNoOfYear) + $deciSellingPrice - $deciDownpayment) / ($intNoOfYear * 12);
                                                    	
                                                    }//else
                                                     
                                                ?>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md' name='tfamortization' value='<?php  echo"".number_format($amortization,2)."";?>' readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--panel-body-->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->
                        
                        <div class='col-xs-6'>
                            <div class='panel panel-default'>
                                <div class='panel-body'>
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Date:</label>
                                        <div class='col-md-5'>
                                            <?php $date = date('Y-m-d');?>
                                            <input type='date' class='form-control input-md' name='tfDate' value='<?php echo "$date"; ?>' readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label class='col-md-7'style = 'font-size: 18px; margin-top:.50em;' align='right'>Amount Paid:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md tfAmountPaid' name='tfAmountPaid' required/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div><!--panel-body-->
                            </div><!--panel panel-default-->
                            
                            <div class='form-group'>
                                <div class="col-md-offset-8 col-md-8"> 
                                    <button type='submit' class='btn btn-success' name= 'btnCollectLot'>Collect</button>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                </div>
                            </div>
                        </div><!--col-md-6-->
                    </div><!--row-->
                </form>
            </div><!--modal-body-->
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-fade--> 
            