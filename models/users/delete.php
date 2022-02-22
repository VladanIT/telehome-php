<?php

    include "../../config/connection.php";

    if(isset($_POST['consumerID'])){
        $consumerID = $_POST['consumerID'];
    
        $query = "DELETE FROM th_consumers WHERE consumerId = $consumerID";
        executeQuery($query);
    }
?>