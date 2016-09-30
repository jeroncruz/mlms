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
                                                <input type='text' class='form-control input-md' id="monthly<?php echo $intAvailUnitId ?>" name='tfamortization' value='<?php  echo"".number_format($amortization,2)."";?>' readonly/>
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
                                                <input type='text' class='form-control input-md tfAmountPaid' id="amount<?php echo $intAvailUnitId; ?>" onkeyup="showChange('<?php echo $intAvailUnitId; ?>')" name='tfAmountPaid' required/>
                                            </div>
                                        </div>
                                    </div>

                                     <div class='form-group' id="change<?php echo $intAvailUnitId;?>" style="display:none">
                                        <label class='col-md-7' style = 'font-size: 18px; margin-top:.50em;' align='right'>Change:</label>
                                        <div class='col-md-5'>
                                            <div class=' input-group'>
                                                <span class = 'input-group-addon'>₱</span>
                                                <input type='text' class='form-control input-md tfAmountPaid' id="changeValue<?php echo $intAvailUnitId; ?>" name='' readonly/>
                                            </div>
                                        </div>
                                      </div>


                                      <script>
                                            function showChange(num){
                                                var amountPaid = $('#amount'+num).val();
                                                amountPaid = parseFloat(amountPaid.replace(/,/g, ''));

                                                var balance = $('#monthly'+num).val();
                                                balance = parseFloat(balance.replace(/,/g, ''));


                                                if(amountPaid>balance){
                                                    document.getElementById('change'+num).style.display='block';
                                                    var change = parseFloat(amountPaid-balance);
                                                    change = Math.round(change * 100) / 100;
                                                    $('#changeValue'+num).val(change);

                                                }else{
                                                    document.getElementById('change'+num).style.display='none';
                                                    $('#changeValue'+num).val(0);
                                                }   

                                            }
                                      </script>
                                    
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
            

<div class='modal fade' id='<?php echo"viewCollectionHistoryLot$intAvailUnitId";?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='z-index: 1500;display:none;'>
    <div class='modal-dialog' role='document' style="width:40%;">
        <div class='modal-content' align="center">
             <div class='modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <center><h3>HISTORY: <b><?php echo $strLastName,", $strFirstName $strMiddleName"; ?></b></h3></center>
            </div>

            <div class='modal-body' style="overflow-y:auto;overflow-x: none;">
                            <div class="container-fluid" >
                                <div class="col-xs-6">
                                    <div class='form-group'>
                                     <label class='control-label col-xs-12'>DATE PAID</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class='form-group'>
                                     <label class='control-label col-xs-12'>AMOUNT PAID</label>
                                    </div>
                                </div>
                            </div>
                            <?php 

                                $result2 =mysql_query("SELECT * FROM tblcollectionlot where intAvailUnitId='$intAvailUnitId'");
                                $num2= mysql_num_rows($result2);
                                if($num2>0){
                                    while($row2=mysql_fetch_array($result2)){
                                        $date=$row2['dateDate'];
                                        $deciAmountPaid=$row2['deciAmountPaid'];
                                        ?>
                                        <div class="container-fluid">
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <input type="text" style="text-align: center" value="<?php echo $date ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <input type="text" style="text-align: center" value="<?php echo $deciAmountPaid ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <div class="container-fluid">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" value="NO PAYMENT HISTORY" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }


                            ?>
            </div><!--modal-body-->

          <div class='modal-footer'>
               <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
          </div>
        </div><!--modal-content-->
    </div><!--modal-dialog-->
</div><!--modal-fade--> 
            