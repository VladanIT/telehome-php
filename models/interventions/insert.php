<?php

    if(isset($_POST['consumerId'])){
        $consumerId = $_POST['consumerId'];
        $description = $_POST['description'];
        $date = $_POST['date'];

        

        include "../../config/connection.php";

        $query = "SELECT * FROM th_consumers WHERE consumerId = $consumerId";
        $result = executeQuery($query);
        $consID;
        if($result != ""){
            foreach ($result as $r){
                $consID = $r->id_consumer;
            }

            $query = "INSERT INTO th_interventions VALUES('', :descript, :dt, :consumer_id)";
        
            $dataPrepare = $conn->prepare($query);
            $dataPrepare->bindParam(":descript", $description);
            $dataPrepare->bindParam(":dt", $date);
            $dataPrepare->bindParam(":consumer_id", $consID);
            $dataPrepare->execute();

            include "../users/users.php";
            $consumers = getUsers();

            echo json_encode($consumers);
        }
        else{
            $poruka = "Uneta je pogresna sifra korisnika!";
            echo json_encode($poruka);
        }
        

        
    }