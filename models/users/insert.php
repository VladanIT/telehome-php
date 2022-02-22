<?php

    if(isset($_POST['consumerId'])){
        $consumerId = $_POST['consumerId'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $place = $_POST['place'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $packet = $_POST['packet'];

        if($packet == ""){
            $packet = null;
        }

        include "../../config/connection.php";
        $query = "INSERT INTO th_consumers VALUES('', :firstName, :lastName, :consumerId, :addres, :place, :packet)";

        $dataPrepare = $conn->prepare($query);
        $dataPrepare->bindParam(":firstName", $firstName);
        $dataPrepare->bindParam(":lastName", $lastName);
        $dataPrepare->bindParam(":consumerId", $consumerId);
        $dataPrepare->bindParam(":addres", $address);
        $dataPrepare->bindParam(":place", $place);
        $dataPrepare->bindParam(":packet", $packet);
        $dataPrepare->execute();

        $query = "SELECT * FROM th_consumers WHERE consumerId = $consumerId";
        $result = executeQuery($query);
        $consID;
        foreach ($result as $r){
            $consID = $r->id_consumer;
        }

        $query = "INSERT INTO th_interventions VALUES('', :descript, :dt, :consumer_id)";
        
        $dataPrepare = $conn->prepare($query);
        $dataPrepare->bindParam(":descript", $description);
        $dataPrepare->bindParam(":dt", $date);
        $dataPrepare->bindParam(":consumer_id", $consID);
        $dataPrepare->execute();

        include "users.php";
        $consumers = getUsers();

        echo json_encode($consumers);
    }