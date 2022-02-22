<div id="content">
    <div class="content-label">
        <h1>Informacije o potrosacu</h1>
    </div>

    <div class="consumer-content">
        <div class="col-lg-4 consumer-form">

            <?php
                include "models/users/users.php";
                $consumer = getConsumerById($_GET['value']);
                foreach($consumer as $c):
            ?>

                <div class="col-lg-12 form-update">
                    <label>Ime</label>
                    <input type="text" id="first-name" name="first-name" class="form-control update-consumer" value="<?= $c->first_name ?>"/>
                </div>
                <div class="col-lg-12 form-update">
                    <label>Prezime</label>
                    <input type="text" id="last-name" name="last-name" class="form-control update-consumer" value="<?= $c->last_name ?>"/>
                </div>
                <div class="col-lg-12 form-update">
                    <label>Mesto</label>
                    <input type="text" id="place" name="place" class="form-control update-consumer" value="<?= $c->place ?>"/>
                </div>
                <div class="col-lg-12 form-update">
                    <label>Adresa</label>
                    <input type="text" id="address" name="address" class="form-control update-consumer" value="<?= $c->address ?>"/>
                </div>

                <div class="col-lg-12 form-update hidden">
                    <label>ID</label>
                    <input type="text" id="consumerID" name="consumerID" class="form-control update-consumer" value="<?= $c->consumerId ?>"/>
                </div>

            <?php
                endforeach;
            ?>

            <div class="form-update">
                <input type="button" id="consumerUpdate" name="consumerUpdate" class="btn btn-success" value="Promeni"/>
            </div>
            <div class="form-update">
                <input type="button" id="consumerDelete" name="consumerDelete" class="btn btn-danger" value="Izbrisi"/>
            </div>
            <div id="dialog" class="alert-danger">
                <p>Da li ste sigurni da zelite da obrisete potrosaca?</p>
                <a href="index.php"><input type="button" id="consumerDeleteFinaly" name="consumerDeleteFinaly" class="btn btn-outline-danger" value="Da"/></a>
                <input type="button" id="consumerDeleteQuit" name="consumerDeleteQuit" class="btn btn-outline-primary" value="Ne"/>
            </div>
        </div>

        <div class="col-lg-8 consumer-history">
            <table class="col-lg-11 content-interventions">
                <tr>
                    <th>Datum</th>
                    <th>Opis</th>
                </tr>

                <?php

                    $userID = $_GET['value'];
                    $consumerID = executeQuery("SELECT * FROM th_consumers c INNER JOIN th_interventions i ON c.id_consumer = i.consumer_id WHERE consumerId = $userID");
                    // $consID = "";
                    // foreach($consumerID as $cID){
                    //     $consID = $cID->consumerId;
                    // }
                    // echo $consID;
                    // $interventions = executeQuery("SELECT * FROM th_consumers c INNER JOIN th_interventions i ON c.id_consumer = i.consumer_id WHERE consumerId = $consID");

                    foreach($consumerID as $i):
                ?>
                
                <tr>
                    <td><?= date("d-M-Y", strtotime($i->date)) ?></td>
                    <td><?= $i->description ?></td>
                </tr>
                
                <?php
                    endforeach;
                ?>

            </table>
        </div>
    </div>
</div>