<?php
    include "config/connection.php";

    $page = "";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }

    include "views/front/fixed/head.php";

    switch($page){
        case "home":
            include "views/front/pages/home.php";
            break;
        case "consumer":
            include "views/front/pages/consumer.php";
            break;
        default:
            include "views/front/pages/home.php";
            break;
    }

    include "views/front/fixed/footer.php";
?>