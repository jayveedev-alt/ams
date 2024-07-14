<!DOCTYPE html>
<html>
    <head>
        <?php include 'includes/_head.php'; ?>
    </head>
    <body>
        <!--Pre loader-->
        <?php // include 'includes/_preLoader.php'; ?>

        <!--Header-->
        <?php include 'includes/_header.php'; ?>

        <!--Theme setting-->
        <?php include 'includes/_themeSetting.php'; ?>

        <!--Side bar-->
        <?php include 'includes/_sideBar.php'; ?>

        <div class="mobile-menu-overlay"></div>

        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="title">
                                    <h4>Profile</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Profile
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="pd-20 card-box height-100-p">
                        <?php
                            $apiUrl = $config['BASED_URL'] . '/api.php?staffId=' . $_SESSION['userId'];
                            $response = file_get_contents($apiUrl);
                            $data = json_decode($response, true);
                            print_r($data);
                        ?>
                        <div class="profile-photo">
                            <img
                                src="<?php echo $config['BASED_URL'] ?>/vendors/images/photo1.jpg"
                                alt=""
                                class="avatar-photo"
                                />
                        </div>
                        <h5 class="text-center h5 mb-0"><p id="userName"><?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] ?></p></h5>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <ul>
                                <li>
                                    <span>Email Address:</span>
                                    <p id="userEmail"><?php echo $_SESSION['userEmail']; ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer-->
        <?php include 'includes/_footer.php'; ?>
    </body>
</html>