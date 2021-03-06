<div class="modal fade" id="addDeceasedAsh<?php echo $intAvailUnitAshId ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1500;display:none;">
    <div class="modal-dialog" role="document" style = "width:80%; height: 90%;">
        <div class="modal-content">
             <div class="modal-header" style="background:#b3ffb3;">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <center><h3><b>ADD DECEASED</b></h3></center>
            </div>
            
            <div class='modal-body'>
                <form class='form-vertical' role='form' action='unitmanagement-transaction.php' method='POST'>
                    <div class = "row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-4" style="margin-top:.30em">
                                                <span style="color:red;">*</span>
                                                Deceased First Name:
                                                <input type="text" class="form-control input-md" name= "tfDeceasedFirstName" placeholder="First Name" required>
                                            </div>
                            
                                            <div class="col-md-4" style="margin-top:.30em">
                                                Deceased Middle Name:
                                                <input type="text" class="form-control input-md" name= "tfDeceasedMiddleName" placeholder="Middle Name" >
                                            </div>
                            
                                            <div class="col-md-4" style="margin-top:.30em">
                                                <span style="color:red;">*</span>
                                                Deceased Last Name:
                                                <input type="text" class="form-control input-md" name= "tfDeceasedLastName" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                    </div><!--ROW-->
                                    
                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <div class="col-md-6" style="margin-top:.30em">
                                                <span style="color:red;">*</span>
                                                Date of Birth:
                                                <input type="date" class="form-control input-md" id="birth2<?php echo $intAvailUnitAshId ?>" name= "tfDateOfBirth"  max= "<?php echo date("Y-m-d"); ?>" onchange = "computeAge2('<?php echo $intAvailUnitAshId ?>')" name= "tfDateOfBirth" required>
                                            </div>
                                            
                                            <div class="col-md-6" style="margin-top:.30em">
                                                <span style="color:red;">*</span>
                                                Date of Death:
                                                <input type="date" class="form-control input-md" id="death2<?php echo $intAvailUnitAshId ?>" name= "tfDateOfBirth"  max= "<?php echo date("Y-m-d"); ?>"  onchange = "computeAge2('<?php echo $intAvailUnitAshId ?>')" name= "tfDateOfDeath" required >
                                            </div>
                                        </div>
                                    </div><!--ROW-->
                                    
                                    <div class="row">
                                        <div class="form-group">
                                       
                                            <div class="col-md-4" style="margin-top: 30px;">
                                                <span style="color:red;">*</span>
                                                Gender:<br>
                                                <input type="radio"  align="right" class="input-md" name="deceasedGender" value="0" > MALE
                                                <input type="radio" align="right" class="input-md" name="deceasedGender"  value="1" >FEMALE
                                            </div>
                                            
                                            <div class="col-md-4" style="margin-top:.30em;">
                                                <span style="color:red;">*</span>
                                                Relationship to Owner:
                                                <input type="text" class="form-control input-md" name= "tfRelationship" placeholder="Relationship to Owner" required>
                                            </div>
                                            <div class="col-md-4" style="margin-top:.30em">
                                                <span style="color:red;">*</span>
                                                Age:
                                                <input type="text" class="form-control input-md" id= "age2<?php echo $intAvailUnitAshId ?>" placeholder="Age" readonly>
                                            </div>
                                        </div>
                                    </div><!--ROW-->
                                    
                                </div><!--panel body -->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->
                        
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="form-group">
                                             <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Service:</label>
                                            <div class="col-md-7">
                                                    <?php
                                                        $sql = "SELECT s.intServiceID, s.strServiceName, s.dblServicePrice, d.dblPercent, d.strDescription FROM tblservice s
                                                                INNER JOIN tbldiscount d ON d.intServiceID = s.intServiceID
                                                                INNER JOIN tblservicetype st ON st.intServiceTypeId = s.intServiceTypeId WHERE s.intStatus = 0 AND st.strServiceTypeName = 'Service Scheduling' AND s.strServiceName = 'Inurnment' ORDER BY s.strServiceName ASC";

                                                        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                        mysql_select_db(constant('mydb'));
                                                        $result = mysql_query($sql,$conn);

                                                        while($row = mysql_fetch_array($result)){ 

                                                        $intServiceID   =$row['intServiceID'];
                                                        $strServiceName =$row['strServiceName'];
                                                        $dblServicePrice=$row['dblServicePrice'];
                                                        $dblPercent     =$row['dblPercent'];
                                                        $strDescription =$row['strDescription'];


                                                        }//while($row1 = mysql_fetch_array($result1))
                                                        
                                                     
                                                    ?>
                                                    <input type='text' class='form-control input-md'  name = "tfServiceName" value="<?php echo $strServiceName ?>" readonly/>

                                                    <input type='hidden' class='form-control input-md' id="service2<?php echo $intAvailUnitAshId ?>" name = "" value='<?php echo $intServiceID ?>' readonly/>

                                            </div>
                                        </div>
                                        
                                        <div class='form-group'>
                                            <div class="col-md-6" style="margin-top: 30px;">Date:
                                                <?php $date = date('Y-m-d');?>
                                                <input type='date' class='form-control input-md' name='tfDate' value='<?php echo "$date"; ?>' readonly>
                                            </div>
                                            <div class="col-md-6" style="margin-top: 30px;"><span style="color:red;">*</span>Date of Inurnment:
                                                <input type='date' class='form-control input-md' name='tfDate' value='' required>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group'>
                                            <div class="col-md-6" style="margin-top: 30px;">
                                                Total Amount to Pay:
                                                <div class=' input-group'>
                                                    <span class = 'input-group-addon'>₱</span>
                                                    <input type='text' id="price2<?php echo $intAvailUnitAshId ?>" class='form-control input-md tfAmountPaid' name='tfTotalAmount' value="<?php echo $dblServicePrice ?>" readonly/>
                                                </div>
                                            </div>
                                       
                                            <div class="col-md-6" style="margin-top: 30px;">
                                                <span style="color:red;">*</span>
                                                Amount Paid:
                                                <div class=' input-group'>
                                                    <span class = 'input-group-addon'>₱</span>
                                                    <input type='text' class='form-control input-md tfAmountPaid' name='tfAmountPaid' required/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group col-md-offset-7'> 
                                            <button type='submit' class='btn btn-success' name= 'btnSubmitDeceasedLot'>Submit</button>
                                            <input class = 'btn btn-default' type='reset' name = 'btnClear' value = 'Clear Entries'>
                                        </div>
                                          <script>
                                    function computeAge2(num){
                                        var birth=new Date($('#birth2'+num).val()).getTime();
                                        var death=new Date($('#death2'+num).val()).getTime();
                                         if(birth==''||death==''||birth>death){
                                            $('#submit'+num).prop('disabled',true);
                                        }else{
                                            $('#submit'+num).prop('disabled',false);
                                        }
                                       if(birth!=''&&death!=''){

                                        var timeDiff = Math.abs(death - birth);
                                        var ageDate = new Date(timeDiff);
                                        var age = Math.abs(ageDate.getUTCFullYear()-1970);
                                        if(isNaN(age)){

                                        $('#age2'+num).val('0');
                                        }else{

                                        $('#age2'+num).val(age);

                                        }
                                        
                                        var serviceId=$('#service2'+num).val();
                                        var age=$('#age2'+num).val();
                                        $.ajax({
                                            url:'computePrice.php',
                                            dataType:'JSON',
                                            data:{
                                                'serviceId':serviceId,
                                                'age':age
                                            },
                                            success:function(data){
                                                $('#price2'+num).val(data);
                                            }

                                        });
                                        }

                                    }
                                    function computePrice(num){
                                        var serviceId=$('#service2'+num).val();
                                        var age=$('#age2'+num).val();
                                        $.ajax({
                                            url:'computePrice.php',
                                            dataType:'JSON',
                                            data:{
                                                'serviceId':serviceId,
                                                'age':age
                                            },
                                            success:function(data){
                                                $('#price2'+num).val(data);
                                            }

                                        });
                                    }
                                    </script>
                                        
                                    </div><!--ROW-->
                                </div><!--panel body -->
                            </div><!--panel panel-default-->
                        </div><!--col-md-6-->  
                    </div><!--row-->

                </form>
            </div><!--modal-body-->
		</div><!--modal-content-->
	</div><!--modal-dialog-->
</div><!--modal-fade-->     