<?php

    $num_rows_all = $conn->prepare("SELECT COUNT(*) as vrednost FROM th_interventions");
    $num_rows_all->execute();
    $value = $num_rows_all->fetch(PDO::FETCH_OBJ);
    $num_interventions = $value->vrednost;

    $datum = date("m");

    $num_rows_date = $conn->prepare("SELECT COUNT(*) as vred FROM th_interventions WHERE MONTH(date) = $datum");
    $num_rows_date->execute();
    $value = $num_rows_date->fetch(PDO::FETCH_OBJ);
    $num_interventions_date = $value->vred;
?>