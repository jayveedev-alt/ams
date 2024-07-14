<script type="text/javascript" src="<?php echo $config['BASED_URL'] ?>/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo $config['BASED_URL'] ?>/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo $config['BASED_URL'] ?>/js/custom.js"></script>

<script>
    $(function () {
        $('form.feedback-form').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: "<?php echo $config['SERVER_HOST'] . '/messages' ?>",
                data: form.serialize(),
                dataType: "json",
            }).done(function (data) {
                form[0].reset();
                $('#message-alert').html('<p class="success">Thank you for reaching out! We truly value your feedback and will do our best to address your concerns or suggestions promptly. Your input helps us improve our services for you and others. Have a great day!</p>');
            }).fail(function (err) {
                console.log(err);
            });
        });
    });
</script>