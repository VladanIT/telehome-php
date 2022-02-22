<?php
    if(isset($_POST['consumerId'])){
        // $first_name = $_POST['firstName'];
        // $last_name = $_POST['lastName'];
        $consumerId = $_POST['consumerId'];

        include "../../config/connection.php";
        include "users.php";
        $upit = "SELECT * FROM th_consumers WHERE consumerId = $consumerId";
        $consumers = executeQuery($upit);

        echo json_encode($consumers);
    }
    else{
        http_response_code(400);
    }
?>