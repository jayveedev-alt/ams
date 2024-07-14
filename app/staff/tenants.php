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
                                <h4>Tenant List</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Tenant List
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <br />
                                <div id="message-alert"></div>
                                <a href="<?php echo $config['BASED_URL'] . '/app/staff/addTenant.php' ?>" class="btn btn-primary btn-sm" style="float: right;">Add Tenant</a>
                                <div class="table-responsive-sm">
                                    <table id="dt" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $apiUrl = $config['SERVER_HOST'] . '/tenants';
                                                $response = file_get_contents($apiUrl);
                                                $data = json_decode($response, true);
                                                for($i = 0; $i < count($data); $i++) {
                                                    echo '<tr>'
                                                    . '<td>' . $data[$i]['firstName'] . '</td>'
                                                    . '<td>' . $data[$i]['lastName'] . '</td>'
                                                    . '<td>' . $data[$i]['gender'] . '</td>'
                                                    . '<td>' . $data[$i]['email'] . '</td>'
                                                    . '<td>' . $data[$i]['contact'] . '</td>'
                                                    . '<td>'
                                                    . '<a class="btn btn-info btn-sm" href="' . $config['BASED_URL'] . '/app/staff/updateTenant.php?tenantId=' . $data[$i]['id'] . '"><i class="fa fa-edit"></i></a> '
                                                    . '<a id="delete" class="btn btn-danger btn-sm" href="' . $config['BASED_URL'] . '/app/staff/deleteTenant.php?tenantId=' . $data[$i]['id'] . '"><i class="fa fa-trash"></i></a>'
                                                    . '</td>'
                                                    . '</tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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