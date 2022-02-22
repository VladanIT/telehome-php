$(document).ready(function(){

    // Filter po mesecima --POCETAK--

    $('#sortConsumers').change(function(){
        var month = $(this).val();

        $.ajax({
            url:"models/users/filters.php",
            method:"POST",
            data:{month:month},
            success:function(data){
                $('#pagination_data').html(data);
            }
        })
    })

    // Filter po mesecima --KRAJ--

    // Paginacija --POCETAK--

    load_data();
    function load_data(page_number){
        $.ajax({
            url:"models/users/pagination.php",
            method:"POST",
            data:{page_number:page_number},
            success:function(data){
                $('#pagination_data').html(data);
            }
        })
    }

    $(document).on('click', '.pagination_link', function(){
        var page_number = $(this).attr("id");
        load_data(page_number);
    });

    // Paginacija --KRAJ--

    // Pretraga intervencija pomocu ID potrosaca --POCETAK--

    $("#btnSearch").click(function(){
        let consumerId = $("#idConsumer").val();

        $.ajax({
            url: "models/users/search.php",
            method: "POST",
            data: {
                consumerId: consumerId           
            },
            dataType: 'json',
            success: function(podaci){
                if(podaci){
                    displayConsumers(podaci);
                }
                else{
                    alert('Ne postoji korisnik sa tom sifrom');
                }
                // displayConsumers(podaci);
            },
            error: function(xhr, status, error){
                var errorMessage = xhr.status + ': ' + xhr.statusText
                // alert('Error - ' + errorMessage);
                if(consumerId == ""){
                    alert('Nije uneta sifra korisnika');
                };
            }
        })
    });

    // Pretraga intervencija pomocu ID potrosaca --KRAJ--

    // Unos novog potrosaca --POCETAK--

    $("#btnInsert").click(function(){
        let consumerId = $("#consumerId").val();
        let firstName = $("#firstName").val();
        let lastName = $("#lastName").val();
        let address = $("#address").val();
        let place = $("#place").val();
        let description = $("#description").val();
        let date = $("#date").val();
        let packet = $("#packet").val();

        $.ajax({
            url: "models/users/insert.php",
            method: "POST",
            data: {
                consumerId: consumerId,
                firstName: firstName,
                lastName: lastName,
                address: address,
                place: place,
                description: description,
                date: date,
                packet: packet           
            },
            dataType: 'json',
            success: function(podaci){
                if(podaci){
                    displayConsumers(podaci);
                }
                else{
                    alert('Korisnik nije uspesno dodat');
                }
                // displayConsumers(podaci);
            },
            error: function(xhr, status, error){
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert('Error - ' + errorMessage);
                if(consumerId == ""){
                    alert('Nije uneta sifra korisnika');
                };
            }
        })
    });

    // Unos novog potrosaca --KRAJ--

    // Unos nove intervencije --POCETAK--

    $("#btnInterventionInsert").click(function(){
        let consumerId = $("#consumerIdIntervention").val();
        let description = $("#descriptionIntervention").val();
        let date = $("#dateIntervention").val();

        $.ajax({
            url: "models/interventions/insert.php",
            method: "POST",
            data: {
                consumerId: consumerId,
                description: description,
                date: date         
            },
            dataType: 'json',
            success: function(podaci){
                if(podaci){
                    displayConsumers(podaci);
                }
                else{
                    alert('Intervencija nije uspesno dodata');
                }
                // displayConsumers(podaci);
            },
            error: function(xhr){
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert('Error - ' + errorMessage + ' Sifra korisnika je verovatno pogresna! Proveri sifru korisnika.');
                if(consumerId == ""){
                    alert('Nije uneta sifra korisnika');
                };
            }
        })
    });

    // Unos nove intervencije --KRAJ--

    $('#btnSearchById').click(function(){
        $('#filter_form').toggleClass("hidden");
        $('#insert_form').addClass("hidden");
        $('#insert_intervention_form').addClass("hidden");
    });

    $('#btnInsertCostumer').click(function(){
        $('#insert_form').toggleClass("hidden");
        $('#filter_form').addClass("hidden");
        $('#insert_intervention_form').addClass("hidden");
    });

    $('#btnInsertIntervention').click(function(){
        $('#insert_intervention_form').toggleClass("hidden");
        $('#filter_form').addClass("hidden");
        $('#insert_form').addClass("hidden");
    });

    $('#consumerUpdate').addClass("disabled");

    $('.update-consumer').change(function(){
        $('#consumerUpdate').removeClass("disabled");
    });


    $('#dialog').addClass('hidden');    
    $('#consumerDelete').click(function() {
        $('#dialog').removeClass('hidden');  
    });
    $('#consumerDeleteQuit').click(function(){
        $('#dialog').addClass('hidden');
    });


    // Brisanje potrosaca --POCETAK--

    $('#consumerDeleteFinaly').click(function(){
        let consumerID = $('#consumerID').val();
        
        $.ajax({
            url: "models/users/delete.php",
            method: "POST",
            data: {
                consumerID: consumerID          
            },
            dataType: 'json',
            success: function(podaci){
                // displayConsumers(podaci);
                alert(podaci);
            },
            error: function(xhr, status, error){
                var errorMessage = xhr.status + ': ' + xhr.statusText
                // alert('Error - ' + errorMessage);
                if(consumerID == ""){
                    alert('Nije uneta sifra korisnika');
                };
            }
        })
    });
});

function displayConsumers(podaci){
    let html = `<tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Sifra</th>
                    <th>Adresa</th>
                    <th>Mesto</th>
                    <th>Opis</th>
                    <th>Datum</th>
                    <th>Info</th>
                </tr>`;
    for(let consumer of podaci){
        html += `<tr>
                    <td>${consumer.first_name}</td>
                    <td>${consumer.last_name}</td>
                    <td>${consumer.consumerId}</td>
                    <td>${consumer.address}</td>
                    <td>${consumer.place}</td>
                    <td>${consumer.description}</td>
                    <td>${consumer.date}</td>
                    <td><a href="index.php?page=consumer&value=${consumer.id_consumer}">Info</a></td>
                </tr>
                `;
    }
    $("#content-of-users").html(html);
}