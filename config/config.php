<?php

    define("ABSOLUTE_PATH", $_SERVER["DOCUMENT_ROOT"]."/");
    define("ENV_FILE", ABSOLUTE_PATH."telehome/config/.env");

    define("SERVER", env("SERVER"));
    define("DBNAME", env("DBNAME"));
    define("USERNAME", env("USERNAME"));
    define("PASSWORD", env("PASSWORD"));

    function env($name){
        $data = file(ENV_FILE);
        $data_value = "";
        foreach($data as $key=>$value){
            $config = explode("=", $value);
            if($config[0] == $name){
                $data_value = trim($config[1]);
            }
        }
        return $data_value;
    }
    
?>