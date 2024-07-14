<?php include '../../config.php'; ?>

<!-- Basic Page Info -->
<title>Apartment Management System</title>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo $config['BASED_URL'] ?>/vendors/styles/core.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $config['BASED_URL'] ?>/vendors/styles/icon-font.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $config['BASED_URL'] ?>/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $config['BASED_URL'] ?>/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $config['BASED_URL'] ?>/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $config['BASED_URL'] ?>/assets/css/style1.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $config['BASED_URL'] ?>/vendors/styles/style.css" />

<link rel="stylesheet" type="text/css" href="<?php echo $config['BASED_URL'] ?>/assets/css/main.css" />

<script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258" crossorigin="anonymous"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "G-GBZ3SGGX85");

    (function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({"gtm.start": new Date().getTime(), event: "gtm.js"});
        var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
        j.async = true;
        j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
</script>
