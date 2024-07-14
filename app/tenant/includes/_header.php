<div class="header">
    <?php $apm = new APM(); ?>
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <?php if($apm->get_TenantNotif($_SESSION['userId'])): ?>
                <div class="menu-icon fa fa-bell-slash-o"></div>
            <?php else: ?>
                <div class="menu-icon fa fa-bell-o text-red">
                    <sub><i class="fa fa-exclamation"></i></sub>
                </div>
        <?php endif; ?>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a
                    class="dropdown-toggle"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    >
                    <span class="user-icon">
                        <img src="<?php echo $config['BASED_URL'] ?>/assets/img/photo1.jpg" alt="" />
                    </span>
                    <span class="user-name"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="<?php echo $config['BASED_URL'] . '/app/tenant/profile.php' ?>">
                        <i class="dw dw-user1"></i> Profile
                    </a>
                    <a class="dropdown-item" href="<?php echo $config['BASED_URL'] . '/app/tenant/changePassword.php' ?>">
                        <i class="fa fa-lock"></i> Change Password
                    </a>
                    <a class="dropdown-item" href="#" onclick="logout();">
                        <i class="dw dw-logout"></i> Log Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>