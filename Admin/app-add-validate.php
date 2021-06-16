<?php
    session_start();
    date_default_timezone_set("Asia/Kuala_Lumpur");
    require "../config.php";

    if ($_POST['function'] == "querydate") {

        $date_select = date_create($_POST['selecteddate']);
        $newdate = date_format($date_select, "Y-m-d");


        $result = $db->query("SELECT * FROM appointment WHERE date='$newdate'");

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                // echo "id: " . $row["app_ID"];
                
                $postdata[] = array("timeslot"=>$row['time']);

            }
            echo json_encode(array("datebook"=>$postdata));

        } else {
            echo json_encode("Time slot free");
        }
        $db->close();


    } else if ($_POST['function'] == "reminder") {

        $username = $_SESSION['username'];
        $result = $db->query("SELECT * FROM patient WHERE username='$username'");
        $row = $result->fetch_assoc();
        $userid = $row['user_ID'];


        $current_date = date("Y-m-d");
        $current_time = date("h:i A");

        $result = $db->query("SELECT * FROM appointment WHERE date='$current_date' and user_ID = '$userid' AND status = 1");
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();

            echo json_encode(array("date"=>$row['date'], "timeslot"=>strtoupper($row['time']), "Status"=>"Pending Approval" ));

        } else { echo json_encode("No appointment today"); }



        $db->close();

    }


?>