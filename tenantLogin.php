<!DOCTYPE html>
<html>
    <head>
        <?php include '_header.php'; ?>
    </head>
    <body class="login-page hero-bg" style="background-image: url(./images/hero-bg.jpg);">
        <div class="login-header box-shadow">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="brand-logo">
                    <a href="index.php">
                        <img src="<?php echo $config['BASED_URL'] ?>/assets/img/AMS.png" alt="" />

                    </a>
                </div>
            </div>
        </div>
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="login-box bg-white box-shadow border-radius-10">
                            <div class="login-title">
                                <h2 class="text-center text-primary">Login</h2>
                            </div>
                            <form class="tenant-login-form" action="#" method="post">
                                <div class="admin_tenant">
                                    <a href="login.php" class="tenant">Admin</a>
                                    <a href="tenantLogin.php" class="admin">Tenant</a>
                                </div>

                                <div id="error-handler"></div>

                                <div class="input-group custom">
                                    <input type="text" class="form-control form-control-lg" placeholder="Enter email." name="email">
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                    </div>
                                </div>
                                <div class="input-group custom">
                                    <input type="password" class="form-control form-control-lg" placeholder="Enter password." name="password" id="password"> 
                                    <span onclick="showPassword('password');" class="input-group-text"><i class="dw dw-eye"></i></span>
                                </div>

                                <div class="row pb-30">
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                            <label class="custom-control-label" for="customCheck1">Remember</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="forgot-password">
                                            <a href="<?php echo $config['BASED_URL'] ?>/forgotPassword.php">Forgot Password</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-0">
                                            <button type="submit" class="login_btn">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <!--<img src="assets/img/login-page-img.png" alt="" />-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '_footer.php'; ?>
</body>
</html>
