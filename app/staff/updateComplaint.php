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
                                <h4>Complaint</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Complaint 
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <?php
                                    $apm = new APM();
                                    $complaint = $apm->getComplain_byID($_GET['complaintId']);
                                ?>

                                <form class="complain-edit-form" method="post" action="#">
                                    <h1>Do you want to Complaint?</h1><br>

                                    <div id="error-handler"></div>

                                    <fieldset>
                                        <input type="hidden" name="id" value="<?php echo $complaint['id'] ?>">
                                        <input type="hidden" name="updateComplain" value="updateComplain">

                                        <label class="required"><span></span>Subject:</label>
                                        <input type="text" name="subject" value="<?php echo $complaint['subject'] ?>" readonly="">

                                        <label class="required"><span></span>Description:</label>
                                        <textarea class="" name="description" readonly=""><?php echo $complaint['description'] ?></textarea>
                                        
                                        <label class="required"><span></span>Feedback:</label>
                                        <textarea class="" name="action_taken" required><?php echo $complaint['action_taken'] ?></textarea>
                                    </fieldset>
                                    <button type="submit" id="sign" name="complain">Update</button>
                                    <a class="btn btn-dark btn-block" href="<?php echo $config['BASED_URL'] . '/app/staff/complaints.php' ?>">BACK</a>
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