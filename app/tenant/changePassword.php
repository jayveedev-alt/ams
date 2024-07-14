<!DOCTYPE html>
<html>
    <head>
        <?php include 'includes/_head.php'; ?>
    </head>
    <body>
        <!--Pre loader-->
        <?php include 'includes/_preLoader.php'; ?>

        <!--Header-->
        <?php include 'includes/_header.php'; ?>

        <!--Theme setting-->
        <?php include 'includes/_themeSetting.php'; ?>

        <!--Side bar-->
        <?php include 'includes/_sideBar.php'; ?>

        <div class="mobile-menu-overlay"></div>

        <div class="main-container">
            <div class="xs-pd-20-10 pd-ltr-20">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Change Password</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Change Password
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form class="change-pass-form" method="PATCH" action="#">
                                    <h1>Change Password</h1><br>

                                    <div id="error-handler"></div>

                                    <fieldset>
                                        <input type="hidden" name="userId" value="<?= $_SESSION['userId'] ?>">

                                        <label class="required">Current Password:</label>
                                        <div class="input-group custom">
                                            <input onkeyup="checkPasswordStrength(this.value)" type="password" class="form-control form-control-lg" name="currentPassword" id="currentPassword" required=""> 
                                            <span onclick="showPassword('currentPassword');" class="input-group-text"><i class="dw dw-eye"></i></span>
                                        </div>

                                        <label class="required">New Password: <span id="passwordStatus"></span></label>
                                        <div class="input-group custom">
                                            <input onkeyup="checkPasswordStrength(this.value)" type="password" class="form-control form-control-lg" name="newPassword" id="newPassword" required=""> 
                                            <span onclick="showPassword('newPassword');" class="input-group-text"><i class="dw dw-eye"></i></span>
                                        </div>


                                        <label class="required">Confirm Password:</label>
                                        <div class="input-group custom">
                                            <input onkeyup="checkPasswordStrength(this.value)" type="password" class="form-control form-control-lg" id="confirmPassword" required=""> 
                                            <span onclick="showPassword('confirmPassword');" class="input-group-text"><i class="dw dw-eye"></i></span>
                                        </div>
                                    </fieldset>
                                    <button type="submit" id="sign" name="sign">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer-->
        <?php include 'includes/_footer.php'; ?>
    </body>
</html>