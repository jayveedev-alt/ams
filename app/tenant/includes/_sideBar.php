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
                    <a href="<?php echo $config['BASED_URL'] . '/app/tenant/dashboard.php' ?>" class="dropdown-toggle no-arrow <?php echo $config['ACTIVE_LINK'] == "dashboard" ? "active" : "" ?>">
                        <span class="micon bi bi-house"></span
                        ><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $config['BASED_URL'] . '/app/tenant/bills.php' ?>" class="dropdown-toggle no-arrow <?php echo $config['ACTIVE_LINK'] == "bills" ? "active" : "" ?>">
                        <span class="micon bi bi-receipt-cutoff"></span
                        ><span class="mtext">Bills</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $config['BASED_URL'] . '/app/tenant/complaints.php' ?>" class="dropdown-toggle no-arrow <?php echo $ams->getActiveMenu('complaints', 1) ?>">
                        <span class="micon bi bi-receipt-cutoff"></span
                        ><span class="mtext">Complaints</span>
                    </a>
                </li>
                <li class="dropdown" hidden="">
                    <a href="javascript:;" class="dropdown-toggle <?php echo $ams->getActiveMenu('complaints', 1) ?>">
                        <span class="micon bi bi-list"></span
                        ><span class="mtext">Complain Section</span>
                    </a>
                    <ul class="submenu">
                        <!--<li><a class="<?php echo $ams->getActiveMenu('addComplain') ?>" href="<?php echo $config['BASED_URL'] . '/app/tenant/addComplain.php' ?>">Compose</a></li>-->
                        <li><a class="<?php echo $ams->getActiveMenu('complaints', 1) ?>" href="<?php echo $config['BASED_URL'] . '/app/tenant/complaints.php' ?>">Complaints</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>