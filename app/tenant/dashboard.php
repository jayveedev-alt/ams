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
                <div class="title pb-20">
                    <h2 class="h3 mb-0">Apartment Overview</h2>
                </div>

                <?php $apm = new APM(); ?>

                <div class="row pb-10">
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?php echo $apm->get_TenantBill($_SESSION['userId'], 'RENT') ?></div>
                                    <div class="font-14 text-secondary weight-500">
                                        Rent Bill
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
                                    <div class="weight-700 font-24 text-dark"><?php echo $apm->get_TenantBill($_SESSION['userId'], 'WATER') ?></div>
                                    <div class="font-14 text-secondary weight-500">
                                        Water Bill</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf">
                                        <span class="icon-copy fa fa-tint"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?php echo $apm->get_TenantBill($_SESSION['userId'], 'ELECTRICITY') ?></div>
                                    <div class="">Electricity Bill</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#FFFF00">
                                        <i class="icon-copy fa fa-bolt" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark"><?php echo $apm->get_TenantComplaint($_SESSION['userId']) ?></div>
                                    <div class="">Complaint</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#09cc06">
                                        <i class="icon-copy fa fa-comment-o" aria-hidden="true"></i>
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