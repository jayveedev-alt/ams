<?php $ams = new APM(); ?>
<div class="left-side-bar">
    <div class="brand-logo">
        <a>
            <img src="<?php echo $config['BASED_URL'] ?>/assets/img/AMS.png" width="100" height="100">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="<?php echo $config['BASED_URL'] . '/app/staff/dashboard.php' ?>" class="dropdown-toggle no-arrow <?php echo $config['ACTIVE_LINK'] == "dashboard" ? "active" : "" ?>">
                        <span class="micon fa fa-list"></span
                        ><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $config['BASED_URL'] . '/app/staff/tenants.php' ?>" class="dropdown-toggle no-arrow <?php echo $ams->getActiveMenu('tenants', 1) ?>">
                        <span class="micon fa fa-users"></span>
                        <span class="mtext">Tenant Management</span>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo $config['BASED_URL'] . '/app/staff/rooms.php' ?>" class="dropdown-toggle no-arrow <?php echo $ams->getActiveMenu('rooms', 1) ?>">
                        <span class="micon fa fa-home"></span>
                        <span class="mtext">Room Management</span>
                    </a>
                </li>
                
                <li class="dropdown" hidden="">
                    <a href="javascript:;" class="dropdown-toggle <?php echo $ams->getActiveMenu('tenants', 1) ?>">
                        <span class="micon fa fa-users"></span
                        ><span class="mtext">Tenant Section</span>
                    </a>
                    <ul class="submenu">
                        <!--<li><a class="<?php echo $ams->getActiveMenu('addTenant') ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/addTenant.php' ?>">Add Tenant</a></li>-->
                        <li><a class="<?php echo $ams->getActiveMenu('tenants', 1) ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/tenants.php' ?>">Tenant Management</a></li>
                    </ul>
                </li>
                <li class="dropdown" hidden="">
                    <a href="javascript:;" class="dropdown-toggle <?php echo $ams->getActiveMenu('rooms', 1) ?>">
                        <span class="micon fa fa-home"></span
                        ><span class="mtext">Room Section</span>
                    </a>
                    <ul class="submenu">
                        <!--<li><a class="<?php echo $ams->getActiveMenu('addRoom') ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/addRoom.php' ?>">Add Room</a></li>-->
                        <li><a class="<?php echo $ams->getActiveMenu('rooms', 1) ?>" href="<?php echo $config['BASED_URL'] . '/app/staff/rooms.php' ?>">Room Management</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo $config['BASED_URL'] . '/app/staff/balances.php' ?>" class="dropdown-toggle no-arrow <?php echo $config['ACTIVE_LINK'] == "balances" ? "active" : "" ?>">
                        <span class="micon fa fa-money"></span>
                        <span class="mtext">Balances</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $config['BASED_URL'] . '/app/staff/complaints.php' ?>" class="dropdown-toggle no-arrow <?php echo $config['ACTIVE_LINK'] == "complaints" ? "active" : "" ?>">
                        <span class="micon fa fa-file-text"></span>
                        <span class="mtext">Complaint List</span>
                    </a>
                </li>
                

            </ul>
        </div>
    </div>
</div>