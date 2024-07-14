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

        $('form.staff-add-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);

            var pass = $('#password').val();
            var confPass = $('#confirmPassword').val();

            if (pass != confPass) {
                $('#error-handler').html('<p class="error">Password not match.</p>');
                return false;
            }

            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/tenants' ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                form[0].reset();
                $('#error-handler').html('<p class="success">Successfully added.</p>');
            }).fail(function (err) {
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

        $('form.room-edit-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser

            var id = "<?php echo isset($_GET['roomId']) ? $_GET['roomId'] : null; ?>";

            var form = $(this);
            $.ajax({
                type: 'PATCH',
                url: "<?php echo $config['SERVER_HOST'] . '/rooms/' ?>" + id,
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                localStorage.setItem('roomInfo', null);
                $('#error-handler').html('<p class="success">Successfully updated.</p>');
            }).fail(function (err) {
                console.log(err);
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('form.complain-edit-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['BASED_URL'] . '/api.php' ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                //form[0].reset();
                console.log(data);
                $('#error-handler').html('<p class="success">Successfully updated!</p>');
            }).fail(function (err) {
                console.log(err);
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('form.bill-add-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);
            var data = {
                roomId: form.serializeArray()[0]['value'],
                amountDue: parseInt(form.serializeArray()[1]['value']),
                dueDate: form.serializeArray()[2]['value'],
                billType: form.serializeArray()[3]['value']
            };
            console.log(data);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/balance' ?>",
                //data: form.serialize(),
                data: data,
                dataType: "json",
            }).done(function (data) {
                console.log(data);
                form[0].reset();
                $('#error-handler').html('<p class="success">Successfully added.</p>');
            }).fail(function (err) {
                console.log(err);
                $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
            });
        });

        $('#dt').DataTable({
            'pageLength': 10,
            'bLengthChange': false,
            'sorting': false,
            'filter': true,
            'sorting': true,
            'autoWidth': true,
            dom: 'Bfrtip',
            retrieve: true,
        });

        $('a#delete').click(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser;
            if (confirm("Are you sure you want to delete?")) {
                console.log(this.href);
                $.ajax({
                    type: 'GET',
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
    });

    let rooms = localStorage.getItem('roomList') != null ? JSON.parse(localStorage.getItem('roomList')) : [];
    let roomInfo = localStorage.getItem('roomInfo') != null ? JSON.parse(localStorage.getItem('roomInfo')) : [];

    function roomList() {
        $.ajax({
            type: "GET",
            url: "<?php echo $config['SERVER_HOST'] . '/rooms' ?>",
            dataType: "json",
        }).done(function (res) {
            localStorage.setItem('roomList', JSON.stringify(res));
        }).fail(function (err) {
            console.log(err)
        });
    }
    roomList();

    function roomEdit() {

        var id = "<?php echo isset($_GET['roomId']) ? $_GET['roomId'] : null; ?>";

        console.log(id);
        console.log(rooms);
        console.log(roomInfo);

        for (var i = 0; i <= rooms.length; i++) {

            if (rooms[i]['id'] == id) {

                localStorage.setItem('roomInfo', JSON.stringify(rooms[i]));

                $('input[name="roomCode"]').val(roomInfo['roomCode']);
                $('input[name="buildingCode"]').val(roomInfo['buildingCode']);
                $('input[name="hasKitchen"]').val(roomInfo['hasKitchen']);
                $('input[name="maxTenantCapacity"]').val(roomInfo['maxTenantCapacity']);
                $('input[name="numberOfBedrooms"]').val(roomInfo['numberOfBedrooms']);
                $('input[name="numberOfFloors"]').val(roomInfo['numberOfFloors']);
                $('input[name="ratePerMonth"]').val(roomInfo['ratePerMonth']);
                $('input[name="hasBathroomComfortRoom"]').val(roomInfo['hasBathroomComfortRoom']);
            }
        }
    }
    //roomEdit();

    function setSessionRedirect(variable, value, link) {
        sessionStorage.setItem(variable, value);
        window.location.href = link;
        console.log(variable);
    }

    function logout() {
        localStorage.clear();
        window.location.href = "<?php echo $config['BASED_URL'] . '/login.php' ?>";
    }

    function assignTo(tenantId) {
        var roomId = "<?php echo isset($_GET['roomId']) ? $_GET['roomId'] : null; ?>";

        $.ajax({
            type: 'PATCH',
            url: "<?php echo $config['SERVER_HOST'] . '/rooms/assign' ?>",
            data: {
                roomId: roomId,
                tenantId: tenantId
            },
            dataType: "json",
        }).done(function (data) {
            $('#message-alert').html('<p class="success">Tenant successfully assigned.</p>');
//            setTimeout(function () {
//                location.reload();
//            }, 2000);
        }).fail(function (err) {
            console.log(err);
            $('#error-handler').html('<p class="error">' + err['responseJSON']['message'] + '</p>');
        });
    }

    function unassignFrom(roomId) {
        $.ajax({
            type: 'PATCH',
            url: "<?php echo $config['SERVER_HOST'] . '/rooms/unassign' ?>",
            data: {
                roomId: roomId,
            },
            dataType: "json",
        }).done(function (data) {
            $('#message-alert').html('<p class="success">Tenant removed successfully.</p>');
            setTimeout(function () {
                location.reload();
            }, 2000);
        }).fail(function (err) {
            console.log(err);
            $('#message-alert').html('<p class="error">Please try again.</p>');
        });
    }

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

    function getUserInfo() {
        let data = JSON.parse(localStorage.getItem('staff'));
        let name = data['user']['firstName'] + ' ' + data['user']['lastName'];
        $('#userName').text(name);
        $('#userEmail').text(data['user']['email']);
        console.log(data);
    }
    //getUserInfo();

    function complaints() {

        // Destroy existing DataTable instance
        //$('#dt').DataTable().destroy();

        // Clear the table body
        $('#complaintsList').empty();

        $.ajax({
            type: 'POST',
            url: "<?php echo $config['BASED_URL'] . '/api.php' ?>",
            data: {
                complaints: 'complaints',
                tenantId: 0
            },
            dataType: 'json'
        }).done(function (data) {
            console.log(data);

            // Initialize an array to hold the rows
            var rows = [];

            for (let i = 0; i < data.length; i++) {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo $config['SERVER_HOST'] . '/tenants/' ?>" + data[i]['tenant_id'],
                    dataType: 'json',
                    async: false // Make this request synchronous
                }).done(function (data1) {
                    console.log(data1);

                    // Push the row data to the rows array
                    rows.push([
                        data1['firstName'] + ' ' + data1['lastName'],
                        data[i]['subject'],
                        data[i]['description'],
                        data[i]['action_taken'],
                        '<a class="btn btn-success btn-sm" href="<?php echo $config['BASED_URL'] . '/app/staff/updateComplaint.php?complaintId=' ?>' + data[i]['id'] + '"><i class="fa fa-edit"></i></a> ' +
                                '<a id="trash" class="btn btn-danger btn-sm" href="<?php echo $config['BASED_URL'] . '/api.php?get=delete&user=staff&complaintId=' ?>' + data[i]['id'] + '"><i class="fa fa-trash"></i></a> '

                    ]);
                }).fail(function (err) {
                    console.log(err);
                });
            }

            // Append the rows to the table body
            $('#complaintsList').append(
                    rows.map(function (row) {
                        return '<tr>' + row.map(function (cell) {
                            return '<td>' + cell + '</td>';
                        }).join('') + '</tr>';
                    }).join(''));

            // Reinitialize the DataTable
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