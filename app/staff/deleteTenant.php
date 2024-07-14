<?php

    include 'includes/_head.php';

    if(isset($_GET['tenantId'])) {
        
        $api_url = $config['SERVER_HOST'] . '/tenants/' . $_GET['tenantId'];

        $ch = curl_init($api_url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

        $response = curl_exec($ch);

        if($response === false) {
            $error = curl_error($ch);
            echo "Error: $error";
        } else {
            header("Location: " . $config['BASED_URL'] . "/app/staff/tenants.php");
        }

        curl_close($ch);
    } 

    
    