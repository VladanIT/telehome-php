<?php

    include "../../config/connection.php";

    $month = '';
    $record_per_page = 15;
    $output = "";

    if(isset($_POST["month"])){
        $month = $_POST["month"];
    }
    else{
        $month = 1;
    }

    include "users.php";
    $result = getFilteredUsers($month);
    $output .= '
            <table class="content-of-users" id="pagination_data">    
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Sifra</th>
                    <th>Adresa</th>
                    <th>Mesto</th>
                    <th>Opis</th>
                    <th>Datum</th>
                    <th>Info</th>
                </tr>';
    
    foreach($result as $row)
    {
        $output .= '<tr>
                        <td>'.$row->first_name.'</td>
                        <td>'.$row->last_name.'</td>
                        <td>'.$row->consumerId.'</td>
                        <td>'.$row->address.'</td>
                        <td>'.$row->place.'</td>
                        <td>'.$row->description.'</td>
                        <td>'.date("d-M-Y", strtotime($row->date)).'</td>
                        <td><a href="index.php?page=consumer&value='.$row->consumerId.'">Info</a></td>
                    </tr>';
    }
    $output .= '</table><br /><div align="center">';
    
    $page_result = getUsers();
    $total_records = count($page_result);
    $total_pages = ceil($total_records/$record_per_page);

    for ($i = 1; $i <= $total_pages; $i++){
        $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";
    }

    $output .= '</div>';

    echo $output;

?>