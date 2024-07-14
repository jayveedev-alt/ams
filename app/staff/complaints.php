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
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Complaints</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Complaints
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <br />
                                <div id="message-alert"></div>
                                <div class="table-responsive-sm">
                                    <table id="dt-2" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                 <th>Complainant</th>
                                                <th>Subject</th>
                                                <th>Description</th>
                                                <th>Feedback</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="complaintsList">

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