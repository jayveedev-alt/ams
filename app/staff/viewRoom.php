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
                                <h4>View Room</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Room Management</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        View Room
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row mt-15">
                            <div class="col-md-12">

                                <?php
                                    $apiUrl = $config['SERVER_HOST'] . '/rooms/' . $_GET['roomId'];
                                    $response = file_get_contents($apiUrl);
                                    $data = json_decode($response, true);
                                ?>
                                <?php if(!isset($data['assignedTo'])): ?>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Assign Tenant:</label>
                                                    <div id="error-handler"></div>
                                                    <select class="form-control" onchange="assignTo(this.value);">
                                                        <option>Choose One</option>
                                                        <?php
                                                        $apiUrlTenant = $config['SERVER_HOST'] . '/tenants';
                                                        $responseTenant = file_get_contents($apiUrlTenant);
                                                        $dataTenant = json_decode($responseTenant, true);
                                                        for($i = 0; $i < count($dataTenant); $i++) {
                                                            echo '<option value="' . $dataTenant[$i]['id'] . '">' . $dataTenant[$i]['firstName'] . ' ' . $dataTenant[$i]['lastName'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                <div id="message-alert"></div>

                                <table class="table table-bordered table-hover">

                                    <tbody>
                                        <tr>
                                            <td>Room No:</td>
                                            <td><?= $data['roomCode'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Room Type:</td>
                                            <td><?= $data['roomType'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Rate Per Month:</td>
                                            <td><?= $data['ratePerMonth'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Tenant Assigned:</td>
                                            <td>
                                                <?php
                                                    $originalDate = $data['lastDateAssigned'];
                                                    echo date("M d, Y", strtotime($originalDate));
                                                ?>
                                            </td>
                                        </tr>
                                        <?php if(isset($data['assignedTo'])): ?>
                                                <?php
                                                $apiUrlTenant1 = $config['SERVER_HOST'] . '/tenants/' . $data['assignedTo'];
                                                $responseTenant1 = file_get_contents($apiUrlTenant1);
                                                $tenantData1 = json_decode($responseTenant1, true);

                                                $tenantName = '';
                                                if(isset($tenantData1['firstName']) && isset($tenantData1['lastName'])) {
                                                    $tenantName = $tenantData1['firstName'] . ' ' . $tenantData1['lastName'];
                                                }
                                                ?>
                                                <tr>
                                                    <td>Tenant</td>
                                                    <td><?php echo $tenantName; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                    </tbody>
                                </table>

                                <a class="btn btn-dark" href="<?php echo $config['BASED_URL'] . '/app/staff/rooms.php' ?>">BACK</a>
                                <?php if(isset($data['assignedTo'])): ?>
                                        <a href="#" class="btn btn-danger" onclick="unassignFrom('<?php echo $data['id'] ?>');">
                                            <i class="fa fa-trash"></i>
                                            Unassign Tenant
                                        </a>
                                    <?php endif; ?>
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