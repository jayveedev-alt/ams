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
                                <h4>Create Bill</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Create Bill
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form class="bill-add-form" method="post" action="#">
                                    <h1>Create Bill</h1><br>

                                    <div id="error-handler"></div>

                                    <fieldset>
                                        <label class="required"><span></span>Room No:</label>
                                        <select name="roomId" class="form-control" required="">
                                            <option>Choose One</option>
                                            <?php
                                                $apiUrlRoom = $config['SERVER_HOST'] . '/rooms';
                                                $responseRoom = file_get_contents($apiUrlRoom);
                                                $dataRoom = json_decode($responseRoom, true);
                                                for($i = 0; $i < count($dataRoom); $i++) {
                                                    $apm = new APM();
                                                    $withTenant = $apm->get_RoomWithTenant($dataRoom[$i]['id']);

                                                    if($withTenant) {
                                                        echo '<option value="' . $dataRoom[$i]['id'] . '">' . $dataRoom[$i]['roomCode'] . '</option>';
                                                    }
                                                }
                                            ?>
                                        </select>

                                        <label class="required"><span></span>Amount Due:</label>
                                        <input type="number" name="amountDue" required="">

                                        <label class="required"><span></span>Due Date:</label>
                                        <input type="date" name="dueDate" required="">

                                        <label class="required"><span></span>Bill Type:</label>
                                        <select name="billType" class="form-control" required="">
                                            <option value="ELECTRICITY">ELECTRICITY</option>
                                            <option value="WATER">WATER</option>
                                        </select>
                                    </fieldset>
                                    <button type="submit" id="sign" name="sign">Create</button>
                                    <a class="btn btn-dark btn-block" href="<?php echo $config['BASED_URL'] . '/app/staff/balances.php' ?>">BACK</a>
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