<?php

//    session_start();

    class APM
    {

        public function conn()
        {
            $serverName = "localhost";
            $username = "root";
            $password = "";
            $database = "apm";

            $conn = new mysqli($serverName, $username, $password, $database);
            if($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            return $conn;
        }

        private function get_DateTime()
        {
            return date('Y-m-d H:i:s');
        }

        public function get_TotalOccupiedRoom()
        {
            $conn = $this->conn();

            $sql = "SELECT COUNT(*) AS total FROM rooms WHERE assignedTo IS NOT NULL";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['total'];
            } else {
                echo 0;
            }

            $conn->close();
        }

        public function get_TotalComplaint()
        {
            $conn = $this->conn();

            $sql = "SELECT COUNT(*) AS total FROM complaints";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['total'];
            } else {
                echo 0;
            }

            $conn->close();
        }

        public function get_TotalAvailableRoom()
        {
            $conn = $this->conn();

            $sql = "SELECT COUNT(*) AS total FROM rooms WHERE assignedTo IS NULL";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['total'];
            } else {
                echo 0;
            }

            $conn->close();
        }

        public function get_TotalRoom()
        {
            $conn = $this->conn();

            $sql = "SELECT COUNT(*) AS total FROM rooms";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['total'];
            } else {
                echo 0;
            }

            $conn->close();
        }

        public function get_TotalTenant()
        {
            $conn = $this->conn();

            $sql = "SELECT COUNT(*) AS total FROM tenants";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['total'];
            } else {
                echo 0;
            }

            $conn->close();
        }

        public function get_TenantRentBill($tenantId)
        {
            $conn = $this->conn();

            $sql = "SELECT ratePerMonth AS rentBill FROM rooms WHERE assignedTo ='" . $tenantId . "'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $data = $row['rentBill'];
                $data = number_format(pow($data, 1), 2);
            } else {
                $data = 0;
                $data = number_format(pow($data, 1), 2);
            }

            $conn->close();
            return $data;
        }

        public function get_TenantBill($tenantId, $billType = 'RENT')
        {
            $amountDue = 0;
            $conn = $this->conn();

            $sql = "SELECT id FROM rooms WHERE assignedTo ='" . $tenantId . "'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $roomId = $result->fetch_assoc()['id'];

                $sql1 = "SELECT amountDue, isPaid FROM balances WHERE roomId ='" . $roomId . "' AND billType='" . $billType . "'";
                $result1 = $conn->query($sql1);
                if($result1->num_rows > 0) {
                    $row = $result1->fetch_assoc();
                    $amountDue = $row['amountDue'];
                    if($row['isPaid']) {
                        $amountDue = 0;
                    }
                }
            }

            $conn->close();
            return 'P' . number_format(pow($amountDue, 1), 2);
        }

        public function get_TenantNotif($tenantId, $isPaid = 0)
        {
            $status = true;
            $conn = $this->conn();

            $sql = "SELECT id FROM rooms WHERE assignedTo ='" . $tenantId . "'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $roomId = $result->fetch_assoc()['id'];

                $sql1 = "SELECT amountDue FROM balances WHERE roomId ='" . $roomId . "' AND isPaid='" . $isPaid . "'";
                $result1 = $conn->query($sql1);
                if($result1->num_rows > 0) {
                    $status = false;
                }
            }

            $conn->close();
            return $status;
        }

        public function get_TenantComplaint($tenantId)
        {
            $conn = $this->conn();

            $sql = "SELECT COUNT(*) AS total FROM complaints WHERE tenant_id ='" . $tenantId . "'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $data = $row['total'];
            } else {
                $data = 0;
            }

            $conn->close();
            return $data;
        }

        public function get_RoomWithTenant($roomId)
        {
            $status = false;
            $conn = $this->conn();

            $sql = "SELECT assignedTo AS total FROM rooms WHERE id ='" . $roomId . "'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc()['total'];
                if($row != null) {
                    $status = true;
                }
            }

            $conn->close();
            return $status;
        }

        public function addFeedback($data)
        {
//            $status = false;
//            $conn = $this->conn();
//
//            $sql = "INSERT INTO feedbacks (created_at, updated_at, name, email, message)
//                    VALUES ('" . $this->get_DateTime() . "', '" . $this->get_DateTime() . "', '" . $data['name'] . "', '" . $data['email'] . "', '" . $data['message'] . "')";
//
//            if($conn->query($sql) === TRUE) {
//                $status = true;
//            }
//
//            $conn->close();
//
//            return $status;
        }

        public function addComplain($data)
        {
            $status = false;
            $conn = $this->conn();

            $sql = "INSERT INTO complaints (created_at, updated_at, subject, description, tenant_id)
                    VALUES ('" . $this->get_DateTime() . "', '" . $this->get_DateTime() . "', '" . $data['subject'] . "', '" . $data['description'] . "', '" . $data['tenant_id'] . "')";

            if($conn->query($sql) === TRUE) {
                $status = true;
            }

            $conn->close();

            return $status;
        }

        public function getComplain($tenantId)
        {
            $conn = $this->conn();

            if($tenantId == '0') {
                $sql = "SELECT * FROM complaints";
                $result = $conn->query($sql);
                $conn->close();
            } else {
                $sql = "SELECT * FROM complaints WHERE tenant_id = '" . $tenantId . "'";
                $result = $conn->query($sql);
                $conn->close();
            }

            return $result;
        }

        public function getComplain_byID($id)
        {
            $row = [];
            $conn = $this->conn();

            $sql = "SELECT * FROM complaints WHERE id = '" . $id . "'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            }

            $conn->close();
            return $row;
        }

        public function editComplain($data)
        {
            $status = false;
            $conn = $this->conn();

            $sql = "UPDATE complaints SET action_taken='" . $data['action_taken'] . "' WHERE id=" . $data['id'];
            if($conn->query($sql) === TRUE) {
                $status = true;
            }

            return $status;
        }

        public function deleteComplain($id)
        {
            $status = false;
            $conn = $this->conn();

            $sql = "DELETE FROM complaints WHERE id=" . $id;

            if($conn->query($sql) === TRUE) {
                $status = true;
            }

            return $status;
        }

        public function getActiveMenu($menu, $withManagement = 0)
        {
            $rooms = array('rooms', 'addRoom');
            $tenants = array('tenants', 'addTenant');
            $complaints = array('complaints', 'addComplain');

            if(in_array($menu, $rooms)) {
                $getActiveFileMenu = basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ".php");
                if($menu == $getActiveFileMenu) {
                    echo "active";
                } elseif(strstr($getActiveFileMenu, "viewRoom") || strstr($getActiveFileMenu, "updateRoom") || strstr($getActiveFileMenu, "addRoom")) {
                    if($withManagement) {
                        echo 'active';
                    }
                }
            }

            if(in_array($menu, $tenants)) {
                $getActiveFileMenu = basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ".php");
                if($menu == $getActiveFileMenu) {
                    echo "active";
                } elseif(strstr($getActiveFileMenu, "viewTenant") || strstr($getActiveFileMenu, "updateTenant") || strstr($getActiveFileMenu, "addTenant")) {
                    if($withManagement) {
                        echo 'active';
                    }
                }
            }

            if(in_array($menu, $complaints)) {
                $getActiveFileMenu = basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ".php");
                if($menu == $getActiveFileMenu) {
                    echo "active";
                } elseif(strstr($getActiveFileMenu, "viewComplain") || strstr($getActiveFileMenu, "updateComplain") || strstr($getActiveFileMenu, "addComplain")) {
                    if($withManagement) {
                        echo 'active';
                    }
                }
            }
        }

    }

    //$config['BASED_URL'] = "http://localhost/ams";

    if($_POST) {
        if(isset($_POST['feedback'])) {
            $apm = new APM();
            $result = $apm->addFeedback($_POST);
            if($result) {
                $arr['message'] = "Thank you for reaching out! We truly value your feedback and will do our best to address your concerns or suggestions promptly. Your input helps us improve our services for you and others. Have a great day!";
            } else {
                $arr['message'] = "Please try again. Thank you!";
            }

            echo json_encode($arr);
        }

        if(isset($_POST['complain'])) {
            $apm = new APM();
            $result = $apm->addComplain($_POST);
            if($result) {
                $arr['message'] = "Successfully added.";
            } else {
                $arr['message'] = "Please try again. Thank you!";
            }

            echo json_encode($arr);
        }

        if(isset($_POST['complaints'])) {

            $complaints = array();

            $apm = new APM();
            $result = $apm->getComplain($_POST['tenantId']);
            if($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                    $complaint = array(
                        'id' => $row['id'],
                        'subject' => $row['subject'],
                        'description' => $row['description'],
                        'action_taken' => $row['action_taken'] == null ? '' : $row['action_taken'],
                        'tenant_id' => $row['tenant_id'],
                    );
                    array_push($complaints, $complaint);
                }
            }

            echo json_encode($complaints);
        }

        if(isset($_POST['session'])) {
            $_SESSION[$_POST['session_key']] = $_POST['session_value'];
            echo $_SESSION[$_POST['session_key']];
        }

        if(isset($_POST['updateComplain'])) {
            $apm = new APM();
            $result = $apm->editComplain($_POST);
            if($result) {
                $arr['message'] = "Successfully updated.";
            } else {
                $arr['message'] = "Please try again. Thank you!";
            }

            echo json_encode($arr);
        }
    }

    if($_GET) {
        if(isset($_GET['get'])) {
            if($_GET['get'] == 'delete') {
                $apm = new APM();
                $apm->deleteComplain($_GET['complaintId']);
                header('Location: ' . $config['BASED_URL'] . '/ams/app/' . $_GET['user'] . '/complaints.php');
            }
        }

//         if(isset($_GET['complaintId'])) {
//             
//         }
//        print_r($_GET);exit();
    }

    