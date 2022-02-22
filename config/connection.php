<?php
    require_once "config.php";

    try{
        $conn = new PDO("mysql:host=".SERVER.";dbname=".DBNAME.";charset=utf8", USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "konekcija uspela";
    }
    catch(PDOException $ex){
        echo $ex->getMessage();
    }

    function executeQuery($query){
        global $conn;
        return $conn->query($query)->fetchAll();
    }