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

        if (localStorage.getItem('tenant') == null) {
            window.location.href = "<?php echo $config['BASED_URL'] . '/index.php' ?>";
        }

        $('form.complain-add-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['BASED_URL'] . '/api.php' ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                form[0].reset();
                console.log(data);
                $('#error-handler').html('<p class="success">Complaint sent!</p>');
            }).fail(function (err) {
                console.log(err);
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('form.staff-edit-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser

            var tenantId = "<?php echo isset($_GET['tenantId']) ? $_GET['tenantId'] : null; ?>";

            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/tenants/' ?>" + tenantId,
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                $('#error-handler').html('<p class="success">Successfully updated.</p>');
            }).fail(function (err) {
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('form.change-pass-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);

            var pass = $('#newPassword').val();
            var confPass = $('#confirmPassword').val();

            if (pass != confPass) {
                $('#error-handler').html('<p class="error">Password not match.</p>');
                return false;
            }

            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/tenants/updatePassword/' . $_SESSION['userId'] ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                console.log(data);
                form[0].reset();
                $('#passwordStatus').text('');
                $('#error-handler').html('<p class="success">Password successfully updated.</p>');
            }).fail(function (err) {
                console.log(err);
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('a#payment').click(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser;
            $.ajax({
                type: 'PATCH',
                url: this.href,
            }).done(function (data) {
                console.log(data);
                $('#message-alert').html('<p class="success">Thank you for your payment! Your transaction was successful.</p>');
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }).fail(function (err) {
                console.log(err);
                console.log('err');
            });
        });

        $('#dt').DataTable({
            'pageLength': 10,
            'bLengthChange': false,
            'sorting': false,
            'filter': true,
            'sorting': false,
            autoWidth: true,
            dom: 'Bfrtip',
            retrieve: true,
        });
    });

    function setSessionRedirect(variable, value, link) {
        sessionStorage.setItem(variable, value);
        window.location.href = link;
        console.log(variable);
    }

    function logout() {
        localStorage.clear();
        window.location.href = "<?php echo $config['BASED_URL'] . '/tenantLogin.php' ?>";
    }

    function getUserInfo() {
        let data = JSON.parse(localStorage.getItem('tenant'));
        let name = data['user']['firstName'] + ' ' + data['user']['lastName'];
        $('#userName').text(name);
        $('#userEmail').text(data['user']['email']);
        $('#userId').val(data['user']['id']);
        console.log(data);
    }
    getUserInfo();

    function complaints() {
        //$('#dt').DataTable().destroy();
        let data = JSON.parse(localStorage.getItem('tenant'));
        $.ajax({
            type: 'POST',
            url: "<?php echo $config['BASED_URL'] . '/api.php' ?>",
            data: {
                complaints: 'complaints',
                tenantId: data['user']['id']
            },
            dataType: 'json'
        }).done(function (data) {
            console.log(data);
            for (let i = 0; i < data.length; i++) {
                $('#complaintsList').append('<tr>' +
                        '<td>' + data[i]['subject'] + '</td>' +
                        '<td>' + data[i]['description'] + '</td>' +
                        '<td>' + data[i]['action_taken'] + '</td>' +
                        '<td>' +
                        '<a id="trash" class="btn btn-danger btn-sm" href="<?php echo $config['BASED_URL'] . '/api.php?get=delete&user=tenant&complaintId=' ?>' + data[i]['id'] + '"><i class="fa fa-trash"></i></a> ' +
                        '</td>' +
                        '</tr>');
            }

            $('#dt-2').DataTable({
                'pageLength': 10,
                'bLengthChange': false,
                'sorting': false,
                'filter': true,
                'sorting': true,
                'autoWidth': true,
                dom: 'Bfrtip',
                retrieve: true,
            });

            $('a#trash').click(function (e) {
                e.preventDefault(); // Prevent the form from submitting via the browser;
                if (confirm("Are you sure you want to delete?")) {
                    console.log(this.href);
                    $.ajax({
                        type: 'DELETE',
                        url: this.href,
                    }).done(function (data) {
                        console.log(data);
                        $('#message-alert').html('<p class="success">Record successfully deleted!</p>');
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    }).fail(function (err) {
                        console.log(err);
                        console.log('err');
                    });
                }
            });
        }).fail(function (err) {
            console.log(err);
        });
    }
    complaints();

    function setPHPSession() {

        let data = JSON.parse(localStorage.getItem('tenant'));

        $.ajax({
            type: 'POST',
            url: "<?php echo $config['BASED_URL'] . '/api.php' ?>",
            data: {
                userId: data['user']['id'],
                userEmail: data['user']['email']
            },
        }).done(function (data) {
            console.log(data);
        }).fail(function (err) {
            console.log(err);
        });
    }
    setPHPSession();

    function showPassword(elementId) {
        var currentType = $("#" + elementId).attr("type");
        if (currentType === "password") {
            $("#" + elementId).attr("type", "text");
        } else {
            $("#" + elementId).attr("type", "password");
        }
    }

    function checkPasswordStrength(password) {

        var passwordStatus = "(weak)";

        // Min and max length for password
        var minLength = 8;
        var maxLength = 20;

        // Check length
        if (password.length < minLength || password.length > maxLength) {
            passwordStatus = "(weak)";
            $('#passwordStatus').addClass("font-danger");
        }


        var uppercaseRegex = /[A-Z]/;
        var lowercaseRegex = /[a-z]/;
        var numberRegex = /[0-9]/;
        var specialCharRegex = /[^A-Za-z0-9]/;

        if (uppercaseRegex.test(password) && lowercaseRegex.test(password) && numberRegex.test(password) && specialCharRegex.test(password)) {
            passwordStatus = "(strong)";
            $('#passwordStatus').addClass("font-success");
        } else if ((uppercaseRegex.test(password) && lowercaseRegex.test(password)) || (uppercaseRegex.test(password) && numberRegex.test(password)) || (uppercaseRegex.test(password) && specialCharRegex.test(password)) || (lowercaseRegex.test(password) && numberRegex.test(password)) || (lowercaseRegex.test(password) && specialCharRegex.test(password)) || (numberRegex.test(password) && specialCharRegex.test(password))) {
            passwordStatus = "(medium)";
            $('#passwordStatus').addClass("font-info");
        } else {
            passwordStatus = "(weak)";
            $('#passwordStatus').addClass("font-danger");
        }

        $('#passwordStatus').text(passwordStatus);
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