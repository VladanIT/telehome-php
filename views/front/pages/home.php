<div id="filter">
    
    <div class="btnContainer">
        <div class="form-group btnButtons col-lg-3 col-xs-12 col-xl-3">
            <input type="button" id="btnSearchById" name="btnSearchById" class="btn btn-primary" value="Pretraga po sifri korisnika"/>
        </div>
        <div class="form-group btnButtons col-lg-3 col-xs-12 col-xl-3">
            <input type="button" id="btnInsertCostumer" name="btnInsertCostumer" class="btn btn-primary" value="Unesi novog potrosaca"/>
        </div>
        <div class="form-group btnButtons col-lg-3 col-xs-12 col-xl-3">
            <input type="button" id="btnInsertIntervention" name="btnInsertIntervention" class="btn btn-primary" value="Unesi intervenciju"/>
        </div>
    </div>

    <?php
        include "views/front/components/filter_form.php";
        include "views/front/components/insert_form.php";
        include "views/front/components/insert_intervention_form.php";
    ?>

</div>
<div id="content">
    <?php
        include "models/users/users.php";
    ?>
    <div class="content-label">
        <h1>Tabela intervencija</h1>
    </div>
    <div class="sort">
        <select class="form-control" name="sortConsumers" id="sortConsumers">
            <option value="" disabled selected>Odaberi mesec</option>
            <option value="1">Januar</option>
            <option value="2">Februar</option>
            <option value="3">Mart</option>
            <option value="4">April</option>
            <option value="5">Maj</option>
            <option value="6">Jun</option>
            <option value="7">Jul</option>
            <option value="8">Avgust</option>
            <option value="9">Septembar</option>
            <option value="10">Oktobar</option>
            <option value="11">Novembar</option>
            <option value="12">Decembar</option>
        </select>
    </div>

    <div id="pagination_data">

    </div>
    
    <?php
        include "models/interventions/calculations.php";
    ?>
    <div id="calculations">
        <label>Ukupan broj intervencija: <?= $num_interventions ?></label>
        <label>Ukupna zarada: <?= $num_interventions * 200 ?> dinara</label>
        <label>Ukupan broj intervencija za tekuci mesec: <?= $num_interventions_date ?></label>
        <label>Ukupna zarada za tekuci mesec: <?= $num_interventions_date * 200 ?> dinara</label>
    </div>
</div>
