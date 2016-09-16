<!--MANAGE UNIT-->  
<div class = "modal fade" id = "popUpWindow">
    <div class = "modal-dialog" style = "width:90%; height: 80%; ">
        <div class = "modal-content">

            <!--header-->
            <div class = "modal-header" style="background:#b3ffb3;">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <center><h3 class = "modal-title">Manage Unit</h3></center>
            </div>
            
            <!--body (form)-->
            <div class = "modal-body">
            
                      <div class="row">
                            <div class=  "col-lg-12">
                                <div class="panel panel-default">
                            
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" action = "unitmanagement-transaction.php" method= "post">             
                                            <legend><h3>Owner Name: Protacio,Juan D.</h3></legend>
                                        </form>

                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#addDead" id="addDead-tab" role="tab" data-toggle="tab" aria-expanded="true">ADD DECEASED</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#transferDead" role="tab" id=transferDead-tab" data-toggle="tab" aria-expanded="false">TRANSFER DECEASED</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#transferOwn" role="tab" id="transferOwn-tab2" data-toggle="tab" aria-expanded="false">TRANFER OWNERSHIP</a>
                                                </li>
                                            </ul>

            
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="addDead" aria-labelledby="home-tab">
                                                    <legend>Add Deceased</legend>
                                                    
                                                    <form class="form-horizontal" role="form" action = "unitmanagement-transaction.php" method= "post">             
                                                   
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-4" style = "font-size: 18px; margin-top:.30em" align="right">Date of Interment:</label>
                                                                <div class="col-md-2 ">
                                                                    <input  type="date" class="form-control input-md" required>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <select class="form-control">
                                                                        <option>--SELECT STORAGE TYPE--</option>
                                                                        <option> Casket</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="col-md-2">
                                                                    <button type="submit" class="btn btn-success pull-left" name= "btnGo">VIEW</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-md-2" style = "font-size: 18px; margin-top:.30em" align="right">Deceased Name:</label>
                                                                <div class="col-md-2 ">
                                                                    <input  type="text" class="form-control input-md" required>
                                                                </div>
                                                             
                                                                <div class="col-md-4">
                                                                    <button type="submit" class="btn btn-success pull-left" name= "btnGo">ADD</button>
                                                                </div>
                                                                <label class="col-md-2" style = "font-size: 18px; margin-top:.30em" align="right">Total:</label>
                                                                <div class="col-md-2 ">
                                                                    <input  type="text" class="form-control input-md" required>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    
                                                    </form>
                                                </div>
                                            </div>
                                            
                                            <div role="tabpanel" class="tab-pane fade" id="transferDead" aria-labelledby="profile-tab">
                                                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                                booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="transferOwn" aria-labelledby="profile-tab">
                                                <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level
                                                wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                                booth letterpress, commodo enim craft beer mlkshk </p>
                                            </div>
                                    </div> <!--PANEL BODY-->
                                </div>
                            </div>
                        </div>
                    </div><!--/modal-body -->
            </div><!--/modal-content -->
    </div><!--/modal-dialog -->
</div><!--/modal -->

