<?php

    function getUsers(){
        return executeQuery("SELECT * FROM th_consumers c INNER JOIN th_interventions i ON c.id_consumer = i.consumer_id");
    }

    function getConsumerById($userID){
        return executeQuery("SELECT * FROM th_consumers WHERE consumerId = $userID");
    }

    function getUsersWithLimit($start_from, $record_per_page){
        return executeQuery("SELECT * FROM th_consumers c INNER JOIN th_interventions i ON c.id_consumer = i.consumer_id LIMIT $start_from, $record_per_page");
    }

    function getFilteredUsers($month){
        return executeQuery("SELECT * FROM th_consumers c INNER JOIN th_interventions i ON c.id_consumer = i.consumer_id WHERE MONTH(i.date) = $month");
    }

?>