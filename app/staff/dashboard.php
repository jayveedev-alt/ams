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
            <div class="xs-pd-20-10 pd-ltr-20">
                <div class="title pb-20">
                    <h2 class="h3 mb-0">Apartment Overview</h2>
                </div>

                <?php $apm = new APM(); ?>

                <div class="row pb-10">
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?= $apm->get_TotalOccupiedRoom(); ?></div>
                                    <div class="font-14 text-secondary weight-500">
                                        Occupied Room
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#ff5b5b">
                                        <i class="icon-copy fa fa-home"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?= $apm->get_TotalAvailableRoom(); ?></div>
                                    <div class="font-14 text-secondary weight-500">
                                        Available Room</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf">
                                        <span class="icon-copy fa fa-home"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?= $apm->get_TotalTenant(); ?></div>
                                    <div class="">Total Tenant</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon">
                                        <i
                                            class="icon-copy fa fa-users"
                                            aria-hidden="true"
                                            ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?= $apm->get_TotalRoom(); ?></div>
                                    <div class="">Total Room</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#09cc06">
                                        <i class="icon-copy fa fa-home" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?= $apm->get_TotalComplaint(); ?></div>
                                    <div class="font-14 text-secondary weight-500">
                                        Total Complaint</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf">
                                        <span class="icon-copy fa fa-file-text"></span>
                                    </div>
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