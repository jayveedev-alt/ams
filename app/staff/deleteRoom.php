<?php

    include '../../config.php';

    if(isset($_GET['roomId'])) {

        $api_url = $config['SERVER_HOST'] . '/rooms/' . $_GET['roomId'];

        $ch = curl_init($api_url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

        $response = curl_exec($ch);

        if($response === false) {
            $error = curl_error($ch);
            echo "Error: $error";
        } else {
            echo 'Record successfully deleted!';
            //header("Location: " . $config['BASED_URL'] . "/app/staff/rooms.php");
        }

        curl_close($ch);
    } 

    
    