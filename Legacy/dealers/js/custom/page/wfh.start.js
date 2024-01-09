// JavaScript Document
$(document).ready(function() {





    var primary_state = $('input#dealer_primary_state').val();


    $('button#savemarkets').on('click', function() {


        var primary_state = $("input#dealer_primary_state").val();

        var slct_markets = document.getElementById("markets");
        var markets = slct_markets.options[slct_markets.selectedIndex].value;

        /*			var slct_markets_dm = document.getElementById("markets_dm");
        			var markets_dm = slct_markets_dm.options[slct_markets_dm.selectedIndex].text;
        */
        $.post('script_update_dealermarkets.wfh.php', {
            primary_state: primary_state,
            dealer_market_id: markets
        }, function(data) {
            console.log(data);
        });


    });


    $('select#markets').on('change', function() {


        var slct_markets = document.getElementById("markets");
        var markets_id = slct_markets.options[slct_markets.selectedIndex].value;
        var markets = slct_markets.options[slct_markets.selectedIndex].text;



        $.post('ajax/pullsubmarkets.php', { primary_state: primary_state, markets_id: markets_id, markets: markets }, function(data) {

            //console.log(data);
            if (!data) {
                //$('div#markets_dm_display').hide();
            } else if (data) {
                $('div#markets_dm_display').show();
                $('select#markets_dm').removeAttr('disabled');
            }
            $('select#markets_dm').html(data);

        });

    });



    $('.purchasepackage').on('click', function() {

        //var usrid = $(this).attr('id');
        //var ldfee = $(this).attr('name');
        //var fbid = $(this).attr('rel');


        swal({
                title: "Are you sure?",
                text: "This package will be added to your purchase history!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, complete purchase!",
                cancelButtonText: "No, cancel purchase!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal("Success!", "Your purchase has been complete.", "success");
                } else {
                    swal("Cancel", "Your purchase has been made canceled :( ", "error");
                }
            });
    });

    $('.purchaselead').on('click', function() {

        var usrid = $(this).attr('id');
        var ldfee = $(this).attr('name');
        var fbid = $(this).attr('rel');


        swal({
                title: "Are you sure?",
                text: "This will be added to your purchase history!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, purchase it!",
                cancelButtonText: "No, cancel purchase!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal("Success!", "Your purchase has been complete.", "success");
                    console.log('puchasing: ' + ldfee);
                    $.post('script_charge_dealerlead.php', { usrid: usrid, ldfee: ldfee, fbid: fbid }, function(e) { console.log(e) });
                } else {
                    swal("Cancel", "Your purchase has been made canceled :( ", "error");

                }
            });
    });







});