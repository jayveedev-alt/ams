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
                                <h4>Add Room</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Add Room 
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form class="room-add-form" method="post" action="#">
                                    <h1> Add Room</h1><br>

                                    <div id="error-handler"></div>

                                    <fieldset>
                                        <label class="required"><span></span>Room No:</label>
                                        <input type="text" name="roomCode" placeholder="Room Code" required>

                                        <label class="required"><span></span>Room Type:</label>
                                        <select name="roomType" class="form-control" required>
                                            <option title="Typically consists of a separate bedroom, a living area, kitchen, and bathroom." value="One-Bedroom Apartment">One-Bedroom Apartment</option>
                                            <option title="Offers two separate bedrooms along with a living area, kitchen, and bathroom." value="Two-Bedroom Apartment">Two-Bedroom Apartment</option>
                                            <option title="Multi-level units with two or three floors, offering more space and separation." value="Duplex/Triplex Apartment">Duplex/Triplex Apartment</option>
                                        </select>

                                        <label class="required"><span></span>Rate Per Month:</label>
                                        <input type="text" name="ratePerMonth" placeholder="Rate Per Month" required>

                                    </fieldset>
                                    <button type="submit" id="sign" name="sign">Add</button>
                                    <a class="btn btn-dark btn-block" href="<?php echo $config['BASED_URL'] . '/app/staff/rooms.php' ?>">BACK</a>
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