<?php

    session_start();

    $config['BASED_URL'] = "http://localhost/ams";
    $config['SERVER_HOST'] = "http://localhost:8000";
    $config['API_KEY'] = "somesupersecretkeyhere";
    $config['ACTIVE_LINK'] = basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ".php");

    include 'api.php';

    if($_POST) {
        if(isset($_POST['session'])) {
            $_SESSION[$_POST['session_key']] = $_POST['session_value'];
            echo $_SESSION[$_POST['session_key']];

            if($_POST['session_key'] == 'userId') {
                $apm = new APM();
                $conn = $apm->conn();

                $sql = "SELECT * FROM staffs WHERE id ='" . $_POST['session_value'] . "'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    $_SESSION['firstName'] = $row['firstName'];
                    $_SESSION['lastName'] = $row['lastName'];
                }

                $conn->close();
            }
        }
    }