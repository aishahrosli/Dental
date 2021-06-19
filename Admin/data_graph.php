<?php
header('Content-Type: application/json');
require "../config.php";

if ($_GET['graph'] == 'patient_gender') {

    $data_points = array();
    $data_dist_gender = array();
    
    
    $sql = "SELECT COUNT(user_ID) as totalpatient FROM patient";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    $totalpatient = $row['totalpatient'];


    $sql = "SELECT DISTINCT(gender) as dist_gender FROM patient";
    $result = $db->query($sql);
    
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
    
            array_push($data_dist_gender , $row['dist_gender']);
    
        }
    } else {
        echo "0 results";
    }
    
    for ($i=0; $i<sizeof($data_dist_gender); $i++) {
    
        $sql = "SELECT COUNT(user_ID) as Total FROM patient WHERE gender = '$data_dist_gender[$i]'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();


        $percent = ( $row['Total'] / $totalpatient ) * 100;
        $percent = number_format($percent, 2, '.', '');
    
        if ($data_dist_gender[$i] == '') { 
            $data = "Unkown gender"; 
            $point = array("name" => $data , "y" => $percent, "exploded"=> true);
        } else { 
            $data = $data_dist_gender[$i]; 
            $point = array("name" => $data , "y" => $percent);
        }
        
        array_push($data_points, $point); 
    
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
    
    $db->close();
    


} else if ($_GET['graph'] == 'date_and_time') {

    $data_date = array();
    $data_points = array();

    $current_month = date('m');
    $current_year = date('Y');

    $sql = "SELECT * FROM appointment WHERE MONTH(DATE) = $current_month  and YEAR(DATE) = $current_year";
    $result = $db->query($sql);
    
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
    
            array_push($data_date , $row['date']);
    
        }
    } else {
        echo "0 results";
    }

    $new_data = array_unique($data_date);
    $new_data = array_values($new_data);

    // print_r($new_data);


    for ($i=0; $i<sizeof($new_data); $i++) {

        $sql = "SELECT COUNT(app_ID) as Total FROM appointment WHERE date = '$new_data[$i]'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();

        $total = $row['Total'];

        $point = array("label" => $new_data[$i] , "y" => $total);
        array_push($data_points, $point); 
    }

    echo json_encode($data_points, JSON_NUMERIC_CHECK);
    
    $db->close();

}




?>