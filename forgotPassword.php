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
        <div
            class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
            >
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-md-6">
                        <div class="login-box bg-white box-shadow border-radius-10">
                            <div class="login-title">
                                <h2 class="text-center text-primary">Forgot Password</h2>
                            </div>
                            <h6 class="mb-20">
                                Enter your email address to reset your password
                            </h6>
                            <form class="forgot-password-form" action="#" method="post">

                                <div id="error-handler"></div>

                                <div class="input-group custom">
                                    <input
                                        type="text"
                                        name="email"
                                        class="form-control form-control-lg"
                                        placeholder="Email"
                                        required
                                        />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"
                                              ><i class="fa fa-envelope-o" aria-hidden="true"></i
                                            ></span>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <div class="input-group mb-0">
                                            <!--
                                            use code for form submit
                                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                                            -->
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                                            <!--                                            <a
                                                                                            class="btn btn-primary btn-lg btn-block"
                                                                                            href="index.html"
                                                                                            >Submit</a
                                                                                        >-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div
                                            class="font-16 weight-600 text-center"
                                            data-color="#707373"
                                            >
                                            OR
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group mb-0">
                                            <a
                                                class="btn btn-outline-primary btn-lg btn-block"
                                                href="<?php echo $config['BASED_URL'] ?>/tenantLogin.php"
                                                >Login</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!--<img src="<?php echo $config['BASED_URL'] ?>/assets/img/forgot-password.png" alt="" />-->
                    </div>
                </div>
            </div>
        </div>


        <?php include '_footer.php'; ?>
    </body>
</html>
