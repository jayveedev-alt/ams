<!-- js -->
<script src="<?php echo $config['BASED_URL'] ?>/vendors/scripts/core.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/vendors/scripts/script.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/vendors/scripts/process.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/vendors/scripts/layout-settings.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $config['BASED_URL'] ?>/vendors/scripts/dashboard3.js"></script>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>-->

<script>
    $(function () {

        if (localStorage.getItem('staff') == null) {
            window.location.href = "<?php echo $config['BASED_URL'] . '/login.php' ?>";
        }

//        $('form.staff-add-form').validate({
//            rules: {
//                name: {
//                    required: true,
//                    minlength: 2
//                },
//                email: {
//                    required: true,
//                    email: true
//                }
//            },
//            messages: {
//                name: {
//                    required: "Please enter your name.",
//                    minlength: "Name must be at least 2 characters long."
//                },
//                email: {
//                    required: "Please enter your email address.",
//                    email: "Please enter a valid email address."
//                }
//            },
//            submitHandler: function (form) {
//                // Function na ito ang tatawagin kapag ang form ay wasto na na-validate
//                var $form = $(form);
//                $.ajax({
//                    type: $form.attr('method'),
//                    url: "<?php echo $config['SERVER_HOST'] . '/tenants' ?>",
//                    data: $form.serialize(),
//                    dataType: "json",
//                }).done(function (data) {
//                    $form[0].reset();
//                    $('#error-handler').html('<p class="error">Successfully added.</p>');
//                }).fail(function (err) {
//                    console.log(err);
//                    $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
//                });
//            }
//        });


        $('form.staff-add-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/tenants' ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                form[0].reset();
                $('#error-handler').html('<p class="error">Successfully added.</p>');
            }).fail(function (err) {
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('form.room-add-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/rooms' ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                form[0].reset();
                $('#error-handler').html('<p class="success">Successfully added.</p>');
            }).fail(function (err) {
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('#dt').DataTable({
            'pageLength': 10,
            'bLengthChange': false,
            'sorting': false,
            'filter': true,
            'sorting': true,
            autoWidth: true,
            dom: 'Bfrtip',
            retrieve: true,
        });
    });

    let rooms = localStorage.getItem('roomList') != null ? JSON.parse(localStorage.getItem('roomList')) : [];
    let roomInfo = localStorage.getItem('roomInfo') != null ? JSON.parse(localStorage.getItem('roomInfo')) : [];

    function roomList() {

        $('#dt').DataTable().destroy();

        $.ajax({
            type: "GET",
            url: "<?php echo $config['SERVER_HOST'] . '/rooms' ?>",
            dataType: "json",
        }).done(function (res) {

            localStorage.setItem('roomList', JSON.stringify(res));

//            for (var i = 1; i <= res.length; res++) {
//                
////                $('#room-list').append('<tr>' +
            '<td>' + i + '</td>' +
                    '<td>' + res[i]['roomCode'] + '</td>' +
                    '<td>' + res[i]['buildingCode'] + '</td>' +
//                        '<td>' + res[i]['isOccupied'] + '</td>' +
                    '<td>' + res[i]['ratePerMonth'] + '</td>' +
                    '<td>' +
//                        '<a href="<?php echo $config['BASED_URL'] . '/app/staff/viewRoom.php' ?>">View</a> ' +
                    '<a href="<?php echo $config['BASED_URL'] . '/app/staff/updateRoom.php' ?>">Update</a> ' +
                    '<a href="<?php echo $config['BASED_URL'] . '/app/staff/viewRoom.php' ?>">Delete</a> ' +
//                        '<a onclick="roomEdit(`' + res[i]['id'] + '`);">Update</a> ' +
                    '</td>' +
                    '</tr>');
            }
            ;
        }).fail(function (err) {
            console.log(err)
        });
    }
    roomList();

    function roomEdit(res) {
        console.log(res);
        for (var i = 1; i <= rooms.length; res++) {
            if (rooms[i]['id'] == res) {
                localStorage.setItem('roomInfo', JSON.stringify(rooms[i]));
            }
        }
    }

    function setSessionRedirect(variable, value, link) {
        sessionStorage.setItem(variable, value);
        window.location.href = link;
        console.log(variable);
    }

    function logout() {
        localStorage.clear();
        window.location.href = "<?php echo $config['BASED_URL'] . '/login.php' ?>";
    }

</script>

<!-- Google Tag Manager (noscript) -->
<noscript
    ><iframe
    src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
    height="0"
    width="0"
    style="display: none; visibility: hidden"
    ></iframe
></noscript>
<!-- End Google Tag Manager (noscript) -->