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
                                <h4>Update Tenant</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Tenant Management</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Update tenant
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form class="staff-edit-form" method="PATCH" action="#">
                                    <h1> Update Tenant</h1><br>

                                    <div id="error-handler"></div>

                                    <?php
                                        $apiUrl = $config['SERVER_HOST'] . '/tenants/' . $_GET['tenantId'];
                                        $response = file_get_contents($apiUrl);
                                        $data = json_decode($response, true);
                                    ?>

                                    <fieldset>
                                        <label for="last" class="required"><span></span>Last name:</label>
                                        <input type="text" id="last_name" name="firstName" placeholder="Last name:" value="<?= $data['firstName'] ?>" required>

                                        <label for="first" class="required">First name:</label>
                                        <input type="text" id="first_name" name="lastName" placeholder="First name:" value="<?= $data['lastName'] ?>" required>

                                        <label for="middle">Middle name:</label>
                                        <input type="text" id="mid_name" name="middleName" placeholder="Middle name (Optional)" value="<?= $data['middleName'] ?>">

                                        <label for="Contact" class="required">Contact Number:</label>
                                        <input type="tel" name="contact" id="cnum" placeholder="+63" pattern="[0-9]{10}" value="<?= $data['contact'] ?>" required>

                                        <label for="email" class="required">Email:</label>
                                        <input type="text" id="email" name="email" value="<?= $data['email'] ?>" required>
                                    </fieldset>
                                    <button type="submit" id="sign" name="sign">Update</button>
                                    <a class="btn btn-dark btn-block" href="<?php echo $config['BASED_URL'] . '/app/staff/tenants.php' ?>">BACK</a>
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