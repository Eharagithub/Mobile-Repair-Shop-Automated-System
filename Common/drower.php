<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="src/images/admin.png" width="50">
                    </span>
                    <span class="user-name"><?php echo $_SESSION["systemUserType"]; ?></span>
                </a>
                <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="dw dw-settings2"></i> Setting</a>
                        <hr>
                        <a class="dropdown-item" href="login.php"><i class="dw dw-logout"></i> Log Out</a>
                    </div> -->
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <?php

                    echo '<div style="margin-bottom: 15px;">
              <span style="font-weight: bold; margin-right: 8px;">User Email:</span>
              <span>' . $_SESSION["systemUserEmail"] . '</span>
          </div>';

                    echo '<div style="margin-bottom: 15px;">
              <span style="font-weight: bold; margin-right: 8px;">User Location:</span>
              <span>' . $_SESSION["systemUserLocName"] . '</span>
          </div>';

                    echo '<hr>';

                    ?>

                    <form action="../dashboard/index.php" method="post">
                        <input type="submit" value ="Log out"name="logout" style="color: #333; text-decoration: none; display: block; padding: 5px 0;"><i class="fa fa-search "></i></a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.php">
            <img src="src/images/logo.png" width="50px">
            <h4 style="color: #f3f3f4;font-size: 20px;padding: 15px"> Repair Shop</h4>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                
                <?php if (($_SESSION["systemUserType"] == "ADMIN") || $_SESSION["systemUserType"] == "BR"|| $_SESSION["systemUserType"] == "TECH") { ?>
                    <li>
                    <a href="index.php" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <?php } ?>

                <?php if (($_SESSION["systemUserType"] == "ADMIN") || $_SESSION["systemUserType"] == "BR"|| $_SESSION["systemUserType"] == "TECH") { ?>
                <li><a href="clients.php" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user"></span><span class="mtext">Customers</span>
                    </a>
                </li>
                <?php } ?>

                <?php if (($_SESSION["systemUserType"] == "ADMIN") ) { ?>
                    <li>
                    <a href="technician.php" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-wrench"></span><span class="mtext">Technicians</span>
                    </a>
                </li>
                <?php } ?>

                <?php if (($_SESSION["systemUserType"] == "ADMIN") ) { ?>
                    <li>
                        <a href="delivary.php" class="dropdown-toggle no-arrow">
        <span class="micon fa fa-truck"></span><span class="mtext">Courier Service</span>

                        </a>
                    </li>
                <?php } ?>

                <?php if (($_SESSION["systemUserType"] == "ADMIN") ) { ?>
                    <li>
                    <a href="location.php" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-map-marker"></span><span class="mtext">Sub Offices</span>
                    </a>
                </li>
                <?php } ?>

                <?php if (($_SESSION["systemUserType"] == "ADMIN") || $_SESSION["systemUserType"] == "BR"|| $_SESSION["systemUserType"] == "TECH") { ?>
                    <li><a href="workorder.php" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-cogs"></span><span class="mtext">Repair List</span>
                    </a>
                </li>
                <?php } ?>

                <?php if (($_SESSION["systemUserType"] == "ADMIN") || $_SESSION["systemUserType"] == "BR"|| $_SESSION["systemUserType"] == "TECH") { ?>
                    <li>
                    <a href="device.php" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-mobile"></span><span class="mtext">Devices</span>
                    </a>
                </li>
                <?php } ?>


                <?php if (($_SESSION["systemUserType"] == "ADMIN") || $_SESSION["systemUserType"] == "BR"|| $_SESSION["systemUserType"] == "TECH") { ?>
                    <li><a href="services.php" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-calendar-check-o"></span><span class="mtext">Services</span>
                    </a></li>
                <?php } ?>

                <?php if (($_SESSION["systemUserType"] == "ADMIN") || $_SESSION["systemUserType"] == "TECH") { ?>
                    <li>
                    <a href="stockitem.php" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-history"></span><span class="mtext">Stock Item</span>
                    </a>
                </li>
                <?php } ?>

                <?php if (($_SESSION["systemUserType"] == "ADMIN") ) { ?>
                    <li>
                    <a href="history.php" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-history"></span><span class="mtext">History</span>
                    </a>
                </li> 
                <?php } ?>

                

                <?php if (($_SESSION["systemUserType"] == "ADMIN") ) { ?>
                    <li>
                    <a href="user.php" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user1"></span><span class="mtext">Users</span>
                    </a>
                </li>
                <?php } ?>

                <?php if (($_SESSION["systemUserType"] == "TECH")) { ?>
                    <li>
                    <a href="status.php" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house"></span><span class="mtext">Customer Status</span>
                    </a>
                </li>
                <?php } ?>

                <?php if (($_SESSION["systemUserType"] == "ADMIN") ) { ?>
                    <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-bar-chart"></span><span class="mtext">reports</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="bar.php">Bar Chart</a></li>
                        <li><a href="pie.php">Pie Chart</a></li>
                    </ul>
                </li>
                 <?php } ?>

                 <?php if (($_SESSION["systemUserType"] == "ADMIN") ) { ?>
                    <li>
                    <a href="inquiries.php" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-commenting"></span><span class="mtext">Inquiries</span>
                    </a>
                </li>
                <?php } ?>

                 <?php if (($_SESSION["systemUserType"] == "ADMIN") ) { ?>
                    <li>
                    <a href="settings.php" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-settings2"></span><span class="mtext">Settings</span>
                    </a>
                </li>
                <?php } ?>


              
               


            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>