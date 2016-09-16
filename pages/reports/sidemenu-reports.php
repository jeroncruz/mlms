<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="../images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
            </div>
        </div><!-- /menu profile quick info -->
<br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li style="font-size: 20px"><a><i class="fa fa-cog"></i> Maintenance <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class = "divider"></li>
                            <li><a href="../maintenance/typeoflot.php" style="font-size: 12px">LOT TYPE</a></li>
                            <li><a href = "../maintenance/interest.php" style="font-size: 12px">INTEREST RATE</a></li>
                            <li><a href = "../maintenance/section.php" style="font-size: 12px">SECTION</a></li>
                            <li><a href = "../maintenance/block.php" style="font-size: 12px">BLOCK</a></li>
                            <li><a href = "../maintenance/lot.php" style="font-size: 12px">LOT-UNIT</a></li>
                            
                            <li class = "divider"></li>
                            <li><a href = "../maintenance/ashcrypt.php" style="font-size: 12px">ASH CRYPT</a></li>
                            <li><a href = "../maintenance/levelAsh.php" style="font-size: 12px">LEVEL</a></li>
                            <li><a href = "../maintenance/interestForLevel.php" style="font-size: 12px">INTEREST RATE</a></li>
                            <li><a href = "../maintenance/ashcryptUnit.php" style="font-size: 12px">ASH CRYPT-UNIT</a>
                            
                            <li class = "divider"></li>
                            <li><a href = "../maintenance/service.php" style="font-size: 12px">SERVICE</a></li>
                            <li><a href = "../maintenance/discount.php" style="font-size: 12px">DISCOUNT</a></li>
                        </ul>
                    </li>
                    
                    <li style="font-size: 20px"><a><i class="fa fa-briefcase"></i> Transactions <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                            <li class = "divider"></li>
                            <li><a href="../reservation.php" style="font-size: 12px">AVAIL UNIT</a></li>
                            <li><a href = "../payment.php" style="font-size: 12px">PAYMENT</a></li>
                            <li><a href = "../unitmanagement-transaction.php" style="font-size: 12px">UNIT MANAGEMENT</a></li>
                            <li><a href = "../service-request-transaction.php" style="font-size: 12px">SERVICES REQUEST</a></li>
                             <li><a href = "#" style="font-size: 12px">SCHEDULE ASSIGNMENT</a></li>

                        </ul>
                    </li>

                    <li style="font-size: 20px"><a><i class="fa fa-list"></i> Queries <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                             <li class = "divider"></li>
                             <li> LOT</li>
                            <li><a href = "../queries/interestLot-query.php" style="font-size: 12px">INTEREST RATE</a></li>
                            <li><a href = "../queries/block-query.php" style="font-size: 12px">BLOCK</a></li>
                            <li><a href = "../queries/lot-query.php" style="font-size: 12px">LOT-UNIT</a></li>
                            <li class = "divider"></li>
                            <li>ASH CRYPT</li>
                            <li><a href = "../queries/interestAsh-query.php" style="font-size: 12px">INTEREST RATE</a></li>
                            <li><a href = "../queries/level-query.php" style="font-size: 12px">LEVEL</a></li>
                            <li><a href = "../queries/ash-query.php" style="font-size: 12px">ASH CRYPT-UNIT</a></li>
                            <li class = "divider"></li>
                            <li><a href = "../queries/service-query.php" style="font-size: 12px">SERVICE</a></li>
                        </ul>
                    </li>
                    
                    <li style="font-size: 20px"><a><i class="fa fa-list-alt"></i> Reports <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                                 <li><a href = "unit-purchase-report.php" style="font-size: 12px">Unit Purchase</a></li>
                                 <li><a href = "cancelled-reservation-report.php" style="font-size: 12px">Cancelation of Reserve</a></li>
                                 <li><a href = "installment-report.php" style="font-size: 12px">Installment</a></li>
                                 <li><a href = "service-request-report.php" style="font-size: 12px">Services</a></li>
                        </ul>
                    </li>
                    
                    <li style="font-size: 20px"><a><i class="fa fa-wrench"></i> Utilities <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                             <li><a href = "../utilities/dependencies-utilities.php" style="font-size: 12px">DEPENDENCIES</a></li>
                            <li><a href = "../utilities/employee.php" style="font-size: 12px">EMPLOYEE</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div> <!-- /sidebar menu -->
    </div>
</div>