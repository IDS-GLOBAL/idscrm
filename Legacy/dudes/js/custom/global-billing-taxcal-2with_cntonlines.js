// Javascript document
// Main Documented from http://git.io/arlzeA - https://github.com/fronteed/iCheck/ For i check
$(document).ready(function() {


    $(document).on('click', 'div#update_reocurring_invoice_fees_box  input#recurEdit_fee_taxed', function() {

        console.log(" Clicked tax input  ");

        run_editrecur_invoice_taxtotal();

    });









    // This A Bad Boy Right Here When Selecting a New Fee
    // Took from 452
    $(document).on('change', 'select#recurEdit_fee_type', function(event) {

        console.log('select#recurEdit_fee_type change');

        var fee_taxedornot = 0;
        var fee_id = $(this).val();
        var dudes_secret_token = $('input#dudes_secret_token').val();
        var enter_dealerid = $('input#enter_dealerid').val();



        console.log('json start');

        $.getJSON("jSon/json-invoice-fees.php?fee_id=" +
            fee_id + "&dudes_secret_token=" + dudes_secret_token,
            function(data) {
                console.log(data);
                console.log(data.return_status.length);
                if (data.return_status.length == 0) {
                    console.log('Data Empty');
                } else {
                    console.log('Data Full');

                    $.each(data.return_status, function(obj) {







                        console.log("recur_fee_id: " + this['fee_id']);
                        console.log("recur_fee_type: " + this['fee_type']);
                        console.log("recur_fee_description: " + this['fee_description']);
                        console.log("recur_fee_description: " + this['fee_description']);

                        $(event.target).parent().parent().find('#recurEdit_fee_description').val(this['fee_description']);
                        console.log("#recurEdit_fee_description: " + this['fee_description']);

                        $(event.target).parent().parent().find('#recurEdit_fee_qty').val('1');

                        console.log("#recurEdit_fee_qty: " + this['fee_qty']);

                        console.log("recurEdit_fee_taxed: " + this['fee_taxed']);
                        if (this['fee_taxed'] == 1) {
                            fee_taxedornot = 1;
                            $(event.target).parent().parent().find('#recurEdit_fee_taxed').prop('checked', false);
                        } else {
                            fee_taxedornot = 0;
                            $(event.target).parent().parent().find('#recurEdit_fee_taxed').prop('checked', true);
                        }

                        console.log("recurEdit_fee_price: " + this['fee_price']);
                        $(event.target).parent().parent().find('#recurEdit_fee_price').val(this['fee_price']);
                        console.log("recurEdit_fee_amount: " + this['fee_amount']);
                        $(event.target).parent().parent().find('#recurEdit_fee_amount').val(this['fee_amount']);
                        console.log("recurEdit_fee_source_id: " + this['fee_source_id']);
                        console.log("recurEdit_fee_source_name: " + this['fee_source_name']);
                    })


                }


            }).then(function() {

            console.log('Just Running calculations');
            run_editrecur_invoice_taxtotal();

            console.log('Turned off Reoccuring Fees...');
            //processCalculationReocurringFees();


        });









    });



    // When Addding a new Line For Fee
    $(document).on('click', 'button#add_new_recur_edit_fee_btn', function() {

        console.log('add_new_recur_edit_fee_btn inner-fees');

        var dudes_secret_token = $('input#dudes_secret_token').val();
        var thisdudesid = $('input#thisdudesid').val();
        var goview_recurinvcid = $('input#goview_recurinvcid').val();
        var goview_thisdid = $('input#goview_thisdid').val();
        var goview_recur_dealer_token = $('input#goview_recur_dealer_token').val();
        var goview_recur_invoice_token = $('input#goview_recur_invoice_token').val();


        var dudes_secret_token = $('input#dudes_secret_token').val();
        var thisdudesid = $('input#thisdudesid').val();

        $.post('ajax/invoiceRecurEdit_line_item_add_elem.php', {
            dudes_secret_token: dudes_secret_token,
            thisdudesid: thisdudesid,
            goview_recurinvcid: goview_recurinvcid,
            goview_thisdid: goview_thisdid,
            goview_recur_dealer_token: goview_recur_dealer_token,
            goview_recur_invoice_token: goview_recur_invoice_token



        }, function(data) {
            console.log('data: ' + data);
            $("div#update_reocurring_invoice_fees_box .inner-fees").append(data);

        }).then(function(data) {

            run_editrecur_invoice_taxtotal();


        });



    });


    $(document).on('change', 'input#recurEdit_fee_price', function() {

        var recurEdit_fee_price = parseInt($(this).val());
        console.log('recurEdit_fee_price');
        var recurEdit_fee_qty = parseInt($(this).parent().parent().find('input#recurEdit_fee_qty').val());
        console.log('recurEdit_fee_qty');
        var this_total = recurEdit_fee_qty * recurEdit_fee_price;


        console.log('this_total: ' + this_total);

        $(this).parent().parent().find('input#recurEdit_fee_amount').val(this_total.toFixed(2));

        run_editrecur_invoice_taxtotal();

    });



    $(document).on('change', 'input#recurEdit_fee_qty', function() {

        console.log('changed qty fee');

        var recurEdit_fee_qty = parseInt($(this).val());
        console.log('input#recurEdit_fee_qty: = ' + recurEdit_fee_qty);

        var recurEdit_fee_price = parseInt($(this).parent().parent().find('input#recurEdit_fee_price').val());
        console.log('input#recurEdit_fee_price: = ' + recurEdit_fee_price);

        var this_total = recurEdit_fee_qty * recurEdit_fee_price;
        console.log('this_total: ' + this_total);

        $(this).parent().parent().find('input#recurEdit_fee_amount').val(this_total.toFixed(2));


        run_editrecur_invoice_taxtotal();


    });



    $(document).on('change', 'input#edit_recurring_invoice_shippinghanding', function() {

        run_editrecur_invoice_taxtotal();

    });

    $(document).on('change', 'input#edit_recurring_invoice_arrival_fee', function() {

        run_editrecur_invoice_taxtotal();

    });


    $(document).on('change', 'input#edit_recurring_applied_payment', function() {

        run_editrecur_invoice_taxtotal();

    });


    // LIVE INVOICING
    $(document).on('click', 'a.remove_liveEdit_fee_el.ajaxloaded', function() {

        console.log('low');

        $(this).parent().parent('div').remove();

        process_livetotal();

    });


    $(document).on('click', 'a.remove_liveEdit_fee_el.preloaded', function() {


        console.log('Copy Catting a.remove_liveEdit_fee_el.preloaded <<');


        var dudes_secret_token = $('input#dudes_secret_token').val();
        var thisdudesid = $('input#thisdudesid').val();
        var goLiveview_invcid = $('input#goLiveview_invcid').val();
        var goLiveview_thisdid = $('input#goLiveview_thisdid').val();
        var goview_thisLivedidtoken = $('input#goview_thisLivedidtoken').val();
        var goview_thisLiveinvcdidtoken = $('input#goview_thisLiveinvcdidtoken').val();
        var charges_id = $(this).parent().parent().find('input.editLive_livecharges_id').val();
        var editLive_charges_amount = $(this).parent().parent().find('input#editLive_charges_amount').val();
        console.log('charges_id: ' + charges_id);
        var line_no = $(this).parent().parent().find('input.live-linenumber').val();
        console.log('line_no: ' + line_no);
        $(this).parent().parent('div').remove();



        $.post('models/delete_live_item_linecharge.php', {
            thisdudesid: thisdudesid,
            dudes_secret_token: dudes_secret_token,
            goLiveview_invcid: goLiveview_invcid,
            goLiveview_thisdid: goLiveview_thisdid,
            goview_thisLivedidtoken: goview_thisLivedidtoken,
            goview_thisLiveinvcdidtoken: goview_thisLiveinvcdidtoken,
            charges_id: charges_id,
            line_no: line_no,
            editLive_charges_amount: editLive_charges_amount
        }, function(data) {
            console.log('data: ' + data);

        }).then(function() {

            console.log('running process_livetotal just Removed Fee from mysql....');

            process_livetotal();


        });

    });


    $(document).on('click', 'a.remove_recurEdit_fee_el.preloaded', function() {


        console.log('Clicked To Delete ');

        var dudes_secret_token = $('input#dudes_secret_token').val();
        var thisdudesid = $('input#thisdudesid').val();
        var goview_recurinvcid = $('input#goview_recurinvcid').val();
        var goview_thisdid = $('input#goview_thisdid').val();
        var goview_recur_dealer_token = $('input#goview_recur_dealer_token').val();
        var goview_recur_invoice_token = $('input#goview_recur_invoice_token').val();
        var charges_id = $(this).parent().parent().find('input.charges_id').val();
        var line_no = $(this).parent().parent().find('input.linenumber').val();
        $(this).parent().parent('div').remove();

        $.post('models/delete_reoccuring_item_linecharge.php', {
            thisdudesid: thisdudesid,
            dudes_secret_token: dudes_secret_token,
            goview_recurinvcid: goview_recurinvcid,
            goview_thisdid: goview_thisdid,
            goview_recur_dealer_token: goview_recur_dealer_token,
            goview_recur_invoice_token: goview_recur_invoice_token,
            charges_id: charges_id,
            line_no: line_no
        }, function(data) {
            console.log('data: ' + data);

        }).then(function() {

            console.log('Clicked Removed Fee need to remove from mysql....');

            $(this).parent().parent('div').remove();
            run_editrecur_invoice_taxtotal();
        });
    });

    $(document).on('click', 'a.remove_recurEdit_fee_el.ajaxloaded', function() {

        run_editrecur_invoice_taxtotal();

    });


    $(document).on('click', 'button#update_this_reorecurring_invoice', function() {
        save_edited_recurring_invoice()
    });



    /////  Live Active calculations

    $(document).on('change', 'select#editLive_charges_fee_type', function(event) {
        console.log('Change Charges Fee Type');

        var charges_fee_type = $(this).val();
        console.log('charges_fee_type: ' + charges_fee_type);


        var fee_taxedornot = 0;
        var fee_id = $(this).val();
        var dudes_secret_token = $('input#dudes_secret_token').val();
        var enter_dealerid = $('input#enter_dealerid').val();



        console.log('json start');

        $.getJSON("jSon/json-invoice-fees.php?fee_id=" +
            fee_id + "&dudes_secret_token=" + dudes_secret_token,
            function(data) {
                console.log(data);
                console.log(data.return_status.length);
                if (data.return_status.length == 0) {
                    console.log('Data Empty');
                } else {
                    console.log('Data Full');

                    $.each(data.return_status, function(obj) {







                        console.log("editLive_charges_fee_type: " + this['fee_id']);

                        console.log("editLive_charges_fee_type: " + this['fee_type']);

                        console.log("#editLive_charges_fee_description: " + this['fee_description']);
                        $(event.target).parent().parent().find('#editLive_charges_fee_description').val(this['fee_description']);


                        console.log("#charges_fee_qty: " + this['fee_qty']);
                        $(event.target).parent().parent().find('#editLive_charges_fee_qty').val(this['fee_qty']);



                        console.log("charges_fee_taxed: " + this['fee_taxed']);
                        if (this['fee_taxed'] == 1) {
                            fee_taxedornot = 1;
                            $(event.target).parent().parent().find('#editLive_charges_fee_taxed').prop('checked', false);
                        } else {
                            fee_taxedornot = 0;
                            $(event.target).parent().parent().find('#editLive_charges_fee_taxed').prop('checked', true);
                        }

                        console.log("charges_fee_price: " + this['fee_price']);
                        $(event.target).parent().parent().find('#editLive_charges_fee_price').val(this['fee_price']);

                        console.log("charges_amount: " + this['fee_amount']);
                        $(event.target).parent().parent().find('#editLive_charges_amount').val(this['fee_amount']);

                        console.log("charges_amount: " + this['fee_source_name']);
                    })


                }


            }).then(function() {

            console.log('Just Running calculations');
            process_livetotal();

            console.log('Turned off Reoccuring Fees...');
            //processCalculationReocurringFees();


        });









    });



    // add_new_invoice_linefee_btn copied concept from button#add_new_fee_btn
    $(document).on('click', 'button#add_new_invoice_lineEdintLiveNewfee_btn', function(event) {


        console.log('Clicked Add New Button Fee');

        console.log('inner-fees-clicked');

        var dudes_secret_token = $('input#dudes_secret_token').val();
        var thisdudesid = $('input#thisdudesid').val();
        var goLiveview_invcid = $('input#goLiveview_invcid').val();
        var goview_thisdid = $('input#goview_thisdid').val();
        var goview_thisLivedidtoken = $('input#goview_thisLivedidtoken').val();
        var goview_thisLiveinvcdidtoken = $('input#goview_thisLiveinvcdidtoken').val();



        $.post('ajax/invoiceLiveEdit_line_item_add_elem.php', {
            goLiveview_invcid: goLiveview_invcid,
            goview_thisdid: goview_thisdid,
            goview_thisLivedidtoken: goview_thisLivedidtoken,
            goview_thisLiveinvcdidtoken: goview_thisLiveinvcdidtoken,
            dudes_secret_token: dudes_secret_token,
            thisdudesid: thisdudesid

        }, function(data) {
            //console.log('data: '+data);
            $("div#update_live_invoice_fees_box .inner-fees").append(data);

        }).then(function(data) {


            console.log('then data: ' + data);

        });

    });


    $(document).on('change', 'input#editLive_charges_fee_price', function() {

        var editLive_charges_fee_price = parseInt($(this).val());
        console.log('editLive_charges_fee_price');
        var editLive_charges_fee_qty = parseInt($(this).parent().parent().find('input#editLive_charges_fee_qty').val());
        console.log('editLive_charges_fee_qty');
        var this_total = (editLive_charges_fee_qty - 0) * (editLive_charges_fee_price - 0);


        console.log('this_total: ' + this_total);

        $(this).parent().parent().find('input#editLive_charges_amount').val(this_total.toFixed(2));

        process_livetotal();

    });



    $(document).on('change', 'input#editLive_charges_fee_qty', function() {

        console.log('changed qty fee');

        var editLive_charges_fee_qty = parseInt($(this).val());
        console.log('input#editLive_charges_fee_qty: = ' + editLive_charges_fee_qty);

        var editLive_charges_fee_price = parseInt($(this).parent().parent().find('input#editLive_charges_fee_price').val());
        console.log('input#editLive_charges_fee_price: = ' + editLive_charges_fee_price);

        var this_total = editLive_charges_fee_qty * editLive_charges_fee_price;
        console.log('this_total: ' + this_total);

        $(this).parent().parent().find('input#editLive_charges_amount').val(this_total.toFixed(2));



        process_livetotal();

    });


    $(document).on('change', 'input#editLive_applied_payment', function(event) {
        console.log('Changed Write Off Amount');
        process_livetotal();

    });

    $(document).on('click', 'input#editLive_charges_fee_taxed', function(event) {
        console.log('Clicked To Tax A Line Item');
        process_livetotal();

    });



    $(document).on('click', 'button#save_edited_live_invoice_loaded', function(event) {
        console.log('Saving Live Invoice')
        save_EditedLive_invoice();
    });



});









function run_editrecur_invoice_taxtotal() {

    var fee_taxtotal = 0.00;
    var recurring_sales_taxrate = $('input#edit_recurring_sales_taxrate').val();


    // Hacking the line count before running total
    var fee_lncnt = 0;
    console.log(' Running Line Item Loop On Items');

    $("div#update_reocurring_invoice_fees_box  input.linenumber").each(function() {
        fee_lncnt++;
        console.log('fee_lncnt: ' + fee_lncnt);
        $(this).val(fee_lncnt);

    });

    var recur_charges_lineitem = 0;

    console.log(' Running Loop On Items');
    $("div#update_reocurring_invoice_fees_box  input#recurEdit_fee_taxed:checked").each(function() {
        recur_charges_lineitem++;

        var charges_lineitem_update_reourrcing_invoice_html = $(this).parent().parent().parent().parent().parent().html();

        //console.log('charges_lineitem_update_reourrcing_invoice_html: ' + charges_lineitem_update_reourrcing_invoice_html);
        var recurEdit_fee_qty = parseInt($(this).parent().parent().parent().parent().parent().find('input#recurEdit_fee_qty_' + recur_charges_lineitem).val());
        if (!recurEdit_fee_qty) {
            recurEdit_fee_qty = 1;

        }

        var recurEdit_fee_amount = parseFloat($(this).parent().parent().parent().parent().parent().find('input#recurEdit_fee_amount_' + recur_charges_lineitem).val());
        if (!recurEdit_fee_amount) {
            recurEdit_fee_amount += '0.00';
        } else {
            console.log('recurEdit_fee_amount: ' + recurEdit_fee_amount);


            fee_taxtotal += recurEdit_fee_amount;
        }
        //var recurEdit_fee_type = $(this).find('#recurEdit_fee_type').value();
        console.log('fee_taxtotal: ' + fee_taxtotal);





    });

    var tax_rate_total = recurring_sales_taxrate * fee_taxtotal / 100;
    console.log('tax_rate_total: ' + parseFloat(tax_rate_total));

    // This one is repetitive and needs to be removed.
    $('input#edit_recurring_tax_total').val(tax_rate_total.toFixed(2));

    $('input#edit_recurring_invoice_taxtotal').val(tax_rate_total.toFixed(2));



    process_totalRecurWithTaxes();


}


// runs across each line combining a total next function should create invoice subtal for amount due.
function process_totalRecurWithTaxes() {

    var recurEdit_fee_type_count = 0;
    var combine_two_totals = 0;
    var recurEdit_fee_total = 0;



    console.log('recurEdit_fee_type_count: ' + recurEdit_fee_type_count);

    $("div#update_reocurring_invoice_fees_box  input#recurEdit_fee_price").each(function() {


        recurEdit_fee_type_count++;
        console.log('recurEdit_fee_type_count: ' + recurEdit_fee_type_count);
        var charges_lineitem_update_reourrcing_invoice_html = $(this).parent().next().html();
        var recurEdit_fee_price = parseFloat($(this).val());

        //console.log('charges_lineitem_update_reourrcing_invoice_html: ' + charges_lineitem_update_reourrcing_invoice_html);
        var recurEdit_fee_qty = parseInt($(this).parent().parent().find('input#recurEdit_fee_qty').val());
        console.log('recurEdit_fee_qty: ' + recurEdit_fee_qty);

        console.log('recurEdit_fee_price: ' + recurEdit_fee_price);

        var combined_recure_total = (recurEdit_fee_price * recurEdit_fee_qty);

        console.log('combined_recure_total: ' + combined_recure_total);

        $(this).parent().next().find('input#recurEdit_fee_amount').val(combined_recure_total.toFixed(2));

        if (!recurEdit_fee_price || recurEdit_fee_price == NaN) {
            console.log('not a valid amount returning false because of nan: ' + recurEdit_fee_price);

            recurEdit_fee_total += 0.00;

        } else {

            var recurEdit_fee_amount = parseFloat($(this).parent().parent().find('input#recurEdit_fee_amount').val());
            console.log('recurEdit_fee_amount: ' + recurEdit_fee_amount);


            recurEdit_fee_total += recurEdit_fee_amount;

        }
        //var recurEdit_fee_type = $(this).find('#recurEdit_fee_type').value();
        console.log('recurEdit_fee_total: ' + recurEdit_fee_total);



    });

    var edit_recurring_invoice_shippinghanding = $('input#edit_recurring_invoice_shippinghanding').val();
    var edit_recurring_invoice_arrival_fee = $('input#edit_recurring_invoice_arrival_fee').val();

    console.log('edit_recurring_invoice_arrival_fee: ' + edit_recurring_invoice_arrival_fee);
    console.log('edit_recurring_invoice_shippinghanding: ' + edit_recurring_invoice_shippinghanding);


    var combine_two_totals = (recurEdit_fee_total - 0) + (edit_recurring_invoice_shippinghanding - 0) + (edit_recurring_invoice_arrival_fee - 0);
    var combine_three_totals = (recurEdit_fee_total - 0) + (edit_recurring_invoice_shippinghanding - 0) + (edit_recurring_invoice_arrival_fee - 0);
    console.log('combine_two_totals: ' + combine_two_totals);

    console.log('recurEdit_fee_total: ' + recurEdit_fee_total);

    console.log('fee last shippinghanding: ' + edit_recurring_invoice_shippinghanding);

    console.log('last subtotal: ' + recurEdit_fee_total);

    $('input#edit_recurring_invoice_subtotal').val(combine_three_totals.toFixed(2));

    run_editrecur_invoice_amountduetotal();

}




function run_editrecur_invoice_amountduetotal() {

    var edit_recurring_invoice_subtotal = parseFloat($('input#edit_recurring_invoice_subtotal').val());
    var edit_recurring_invoice_taxtotal = parseFloat($('input#edit_recurring_invoice_taxtotal').val());
    var edit_recurring_invoice_total = parseFloat($('input#edit_recurring_invoice_total').val());



    var edit_recurring_applied_payment = parseFloat($('input#edit_recurring_applied_payment').val());


    var combine_For_recurring_invoice_total = (edit_recurring_invoice_taxtotal - 0) + (edit_recurring_invoice_subtotal - 0);
    $('input#edit_recurring_invoice_total').val(combine_For_recurring_invoice_total.toFixed(2));



    var combine_For_amount_due = (edit_recurring_invoice_taxtotal - 0) + (edit_recurring_invoice_subtotal - 0) - (edit_recurring_applied_payment - 0);

    $('input#edit_recurring_invoice_amount_due').val(combine_For_amount_due.toFixed(2));


}
















// I was running this not respecting charges_amount jumps onto fee_taxtotal
// then continues gathering a total and then calculates with taxrate
// you can't parse editLive_sales_taxrate because it will kill the 7.0
function process_livetotal() {
    console.log('Running Live Total');

    var fee_taxtotal = 0.00;
    var tax_rate_total = 0.00;
    var editLive_sales_taxrate = $('input#editLive_sales_taxrate').val();


    var editLive_fee_lncnt = 0;
    console.log(' Running Line Item Loop On Items');

    $("div#update_live_invoice_fees_box  input.live-linenumber").each(function() {
        editLive_fee_lncnt++;

        //console.log('editLive_fee_lncnt: ' + editLive_fee_lncnt);
        $(this).val(editLive_fee_lncnt);

    });


    console.log(' Running Loop On Items');
    $("div#update_live_invoice_fees_box  input#editLive_charges_fee_taxed:checked").each(function() {

        //var editLive_charges_fee_qty = parseInt($(this).parent().parent().parent().parent().parent().find('input#editLive_charges_fee_qty').val());
        // console.log('editLive_charges_fee_qty: ' + editLive_charges_fee_qty);
        //var charges_fee_taxtotal = parseFloat($(this).parent().parent().parent().parent().parent().find('input#editLive_charges_fee_price').val());
        //console.log('editLive_charges_fee_price: ' + charges_fee_taxtotal);
        var editLive_charges_amount = parseFloat($(this).parent().parent().find('input#editLive_charges_amount').val());
        if (!editLive_charges_amount) {
            editLive_charges_amount = 0.00;
        }

        //console.log('editLive_charges_amount: ' + editLive_charges_amount);

        fee_taxtotal += editLive_charges_amount;

        console.log('charges_fee_taxtotal: ' + fee_taxtotal);

    });



    console.log('Last charges_fee_taxtotal: ' + fee_taxtotal);
    var tax_rate_total = editLive_sales_taxrate * fee_taxtotal / 100;




    var editLive_invoice_shippinghanding = $('input#editLive_invoice_shippinghanding').val();
    var editLive_invoice_arrival_fee = $('input#editLive_invoice_arrival_fee').val();



    var combine_Live_invoice_three_totals = (fee_taxtotal - 0) + (editLive_invoice_shippinghanding - 0) + (editLive_invoice_arrival_fee - 0);


    console.log('fee_taxtotal: ' + fee_taxtotal);

    console.log('fee last shippinghanding: ' + editLive_invoice_shippinghanding);

    console.log('last subtotal: ' + fee_taxtotal);

    $('input#editLive_invoice_subtotal').val(combine_Live_invoice_three_totals.toFixed(2));




    // This one is repetitive and needs to be removed.
    $('input#editLive_tax_total').val(tax_rate_total.toFixed(2));

    $('input#editLive_invoice_taxtotal').val(tax_rate_total.toFixed(2));



    process_LiveTotalWithTaxes();


}



function process_LiveTotalWithTaxes() {

    console.log('process_LiveTotalWithTaxes Here.....');
    var editLive_charges_amount = 0.00;
    var editLive_sales_taxrate = $('input#editLive_sales_taxrate').val();
    var editLive_tax_total = $('input#editLive_tax_total').val();

    var editLive_discount_value = $('input#editLive_discount_value').val();
    var editLive_discount_dollarorpercn = $('select#editLive_discount_dollarorpercn').val();

    var editLive_invoice_shippinghanding = $('input#editLive_invoice_shippinghanding').val();
    var editLive_invoice_arrival_fee = $('input#editLive_invoice_arrival_fee').val();
    var editLive_invoice_subtotal = $('input#editLive_invoice_subtotal').val();


    var fee_total = 0.00;


    console.log(' Running Loop On Items');
    $("div#update_live_invoice_fees_box  input#editLive_charges_amount").each(function() {

        //var editLive_charges_fee_qty = parseInt($(this).parent().parent().parent().parent().parent().find('input#editLive_charges_fee_qty').val());
        // console.log('editLive_charges_fee_qty: ' + editLive_charges_fee_qty);
        //var charges_fee_taxtotal = parseFloat($(this).parent().parent().parent().parent().parent().find('input#editLive_charges_fee_price').val());
        //console.log('editLive_charges_fee_price: ' + charges_fee_taxtotal);
        var editLive_charges_amount = parseFloat($(this).val());
        if (!editLive_charges_amount) {
            editLive_charges_amount = 0.00;

        }

        console.log('editLive_charges_amount: ' + editLive_charges_amount);

        fee_total += editLive_charges_amount;

        console.log('fee_total: ' + fee_total);

    });

    console.log('Last fee_total: ' + fee_total);

    var editLive_invoice_taxtotal = parseFloat($('input#editLive_invoice_taxtotal').val());

    var livetotal_total = (editLive_invoice_taxtotal - 0) + (fee_total - 0);


    console.log('livetotal_total: ' + livetotal_total);

    $('input#editLive_invoice_subtotal').val(livetotal_total.toFixed(2));

    run_editlive_invoice_amountduetotal();





}






function run_editlive_invoice_amountduetotal() {
    var editLive_invoice_subtotal = parseFloat($('input#editLive_invoice_subtotal').val());
    var editLive_invoice_taxtotal = parseFloat($('input#editLive_invoice_taxtotal').val());
    var editLive_invoice_total = parseFloat($('input#editLive_invoice_total').val());



    var editLive_applied_payment = parseFloat($('input#editLive_applied_payment').val());


    var combine_For_live_invoice_total = (editLive_invoice_taxtotal - 0) + (editLive_invoice_subtotal - 0);
    console.log('combine_For_live_invoice_total: ' + combine_For_live_invoice_total);

    $('input#editLive_invoice_total').val(combine_For_live_invoice_total.toFixed(2));



    var combine_For_amount_due = (editLive_invoice_taxtotal - 0) + (editLive_invoice_subtotal - 0) - (editLive_applied_payment - 0);

    $('input#editLive_edit_invoice_amount_due').val(combine_For_amount_due.toFixed(2));

}













// Processing Fees On Reocurring Update Before Saving
function processUpdatedReoccuringFees() {
    var i = 0;
    var recur_charges_lineitem = 0;
    var recur_charges_lineitem_tal = 0;
    var recur_charges_fee_taxed = 'N';
    var recur_charges_toinvoicenumber = $('input#recurring_invoice_number').val();
    var recur_charges_dealerid = document.getElementById('goview_thisdid').value;
    var recurring_invoice_id = document.getElementById('goview_recurinvcid').value;

    var goview_recur_dealer_token = $('input#goview_recur_dealer_token').val();
    var goview_recur_invoice_token = $('input#goview_recur_invoice_token').val();


    $("div#update_reocurring_invoice_fees_box  input#recurEdit_fee_price").each(function() {


        var _invoice_html = $(this).parent().next().html();
        //  console.log('_invoice_html: '+_invoice_html);
        recur_charges_lineitem++;

        var rec_fee_type = $(this).parent().parent().find('select#recurEdit_fee_type_' + recur_charges_lineitem).val();
        console.log('rec_fee_type: ' + rec_fee_type);
        var rec_fee_type_txt = $(this).parent().parent().find('input#recurEdit_fee_description_' + recur_charges_lineitem).val();
        console.log('rec_fee_type_txt: ' + rec_fee_type_txt);

        var recur_charges_fee_description = $(this).parent().parent().find('input#recurEdit_fee_description_' + recur_charges_lineitem).val();
        var recur_charges_fee_qty = parseInt($(this).parent().parent().find('input#recurEdit_fee_qty_' + recur_charges_lineitem).val());
        var recur_charges_fee_price = $(this).val();
        var recurEdit_fee_amount = $(this).parent().parent().find('input#recurEdit_fee_amount_' + recur_charges_lineitem).val();

        if ($('input#recurEdit_fee_taxed').is(':checked')) {
            var recurEdit_fee_taxed = 'Y';
        } else {
            var recurEdit_fee_taxed = 'N';
        }


        console.log('recurEdit_fee_type: ' + recurEdit_fee_type);
        console.log('recur_charges_fee_description: ' + recur_charges_fee_description);

        var recur_charges_source_id = '';
        var recur_charges_source_name = '';


        $.post('models/script_process_updated_fees_recurring.php', {
            recur_charges_dealerid: recur_charges_dealerid,
            recurring_invoice_id: recurring_invoice_id,
            recur_charges_toinvoicenumber: recur_charges_toinvoicenumber,
            recur_charges_invoiceToken: goview_recur_invoice_token,
            goview_recur_dealer_token: goview_recur_dealer_token,
            recur_charges_lineitem: recur_charges_lineitem,
            recur_charges_fee_id: rec_fee_type,
            recur_charges_fee_type: rec_fee_type,
            recur_fee_type_txt: recur_charges_fee_description,
            recur_charges_fee_description: recur_charges_fee_description,
            recur_charges_fee_qty: recur_charges_fee_qty,
            recur_charges_fee_taxed: recurEdit_fee_taxed,
            recur_charges_fee_price: recur_charges_fee_price,
            recur_charges_amount: recurEdit_fee_amount,
            recur_charges_source_id: recurEdit_fee_amount,
            recur_charges_source_name: recurEdit_fee_amount



        }, function(data) {
            console.log('Running Process Created Fees Recurring:' + data);
        });
    });

}











//  Notice!!!
//*******************************************
//  Major actions You Are Updating A New Recourring Dealer Based Off
//  Saving The Created New Reoccuring Invoice
//  button#recurring_createsave_invoice
//  Should Be Using goview_thisRecurinvcid,	goview_thisRecurinvcdid, goview_thisRecurinvcdidtoken
//*******************************************
// Editing an ajax loaded reoccuring invoice.







function save_edited_recurring_invoice() {

    console.log('Clicked To Save Reocurring Invoice');

    var edit_this_recurring_invoice_dealerid = $('input#edit_this_recurring_invoice_dealerid').val();
    var edit_this_recurring_invoice_id = $('input#edit_this_recurring_invoice_id').val();
    var edit_invoice_typeid = $('select#edit_invoice_typeid').val();

    var edit_recurring_invoice_number = $('input#edit_recurring_invoice_number').val();
    var edit_recurring_invoice_date = $('input#edit_recurring_invoice_date').val();
    var edit_invc_cret_evry = $('select#edit_invc_cret_evry').val();
    var edit_invc_cret_evrywhn = $('select#edit_invc_cret_evrywhn').val();
    var edit_recurring_invoice_duedate = $('input#edit_recurring_invoice_duedate').val();
    var edit_invoice_recurring_stopdate = $('input#edit_invoice_recurring_stopdate').val();
    var edit_recurring_daysto_payinvoice = $('input#edit_recurring_daysto_payinvoice').val();
    var edit_recurring_dealer_email_recipients = $('input#edit_recurring_dealer_email_recipients').val();
    var edit_recurring_invoice_sendtoclient = $('select#edit_recurring_invoice_sendtoclient').val();
    var edit_recurring_invoice_currency = $('select#edit_recurring_invoice_currency').val();
    var edit_recurring_sales_taxrate = $('input#edit_recurring_sales_taxrate').val();
    var edit_recurring_tax_total = $('input#edit_recurring_tax_total').val();
    var edit_recurring_discount_value = $('input#edit_recurring_discount_value').val();
    var edit_recurring_discount_dollarorpercn = $('select#edit_recurring_discount_dollarorpercn').val();
    var edit_recurring_invoice_shippinghanding = $('input#edit_recurring_invoice_shippinghanding').val();
    var edit_recurring_invoice_subtotal = $('input#edit_recurring_invoice_subtotal').val();
    var edit_recurring_invoice_arrival_fee = $('input#edit_recurring_invoice_arrival_fee').val();
    var edit_recurring_invoice_comments = $('input#edit_recurring_invoice_comments').val();
    var edit_recurring_terms_conditions = $('input#edit_recurring_terms_conditions').val();
    var edit_recurring_invoice_taxtotal = $('input#edit_recurring_invoice_taxtotal').val();
    var edit_recurring_invoice_total = $('input#edit_recurring_invoice_total').val();
    var edit_recurring_applied_payment = $('input#edit_recurring_applied_payment').val();
    var edit_recurring_invoice_amount_due = $('input#edit_recurring_invoice_amount_due').val();

    var edit_recurring_invoice_status = 'Inactive';
    if ($('input#edit_recurring_invoice_status').is(':checked')) {
        var edit_recurring_invoice_status = 'Active';

    } else {
        var edit_recurring_invoice_status = 'Inactive';
    }

    console.log('edit_recurring_invoice_status: ' + edit_recurring_invoice_status);

    console.log('edit_this_reorecurring_invoice: ');

    $.post('models/script_update_recourring_invoice.php', {
        edit_this_recurring_invoice_dealerid: edit_this_recurring_invoice_dealerid,
        edit_invoice_typeid: edit_invoice_typeid,
        edit_this_recurring_invoice_id: edit_this_recurring_invoice_id,
        edit_recurring_invoice_number: edit_recurring_invoice_number,
        edit_recurring_invoice_date: edit_recurring_invoice_date,
        edit_invc_cret_evry: edit_invc_cret_evry,
        edit_invc_cret_evrywhn: edit_invc_cret_evrywhn,
        edit_recurring_invoice_duedate: edit_recurring_invoice_duedate,
        edit_invoice_recurring_stopdate: edit_invoice_recurring_stopdate,
        edit_recurring_daysto_payinvoice: edit_recurring_daysto_payinvoice,
        edit_recurring_dealer_email_recipients: edit_recurring_dealer_email_recipients,
        edit_recurring_invoice_sendtoclient: edit_recurring_invoice_sendtoclient,
        edit_recurring_invoice_currency: edit_recurring_invoice_currency,
        edit_recurring_sales_taxrate: edit_recurring_sales_taxrate,
        edit_recurring_tax_total: edit_recurring_tax_total,
        edit_recurring_discount_value: edit_recurring_discount_value,
        edit_recurring_discount_dollarorpercn: edit_recurring_discount_dollarorpercn,
        edit_recurring_invoice_shippinghanding: edit_recurring_invoice_shippinghanding,
        edit_recurring_invoice_subtotal: edit_recurring_invoice_subtotal,
        edit_recurring_invoice_arrival_fee: edit_recurring_invoice_arrival_fee,
        edit_recurring_invoice_comments: edit_recurring_invoice_comments,
        edit_recurring_terms_conditions: edit_recurring_terms_conditions,
        edit_recurring_invoice_taxtotal: edit_recurring_invoice_taxtotal,
        edit_recurring_invoice_total: edit_recurring_invoice_total,
        edit_recurring_applied_payment: edit_recurring_applied_payment,
        edit_recurring_invoice_amount_due: edit_recurring_invoice_amount_due,
        edit_recurring_invoice_status: edit_recurring_invoice_status

    }, function(data) {

        console.log('data update_reoccuring invoice' + data);

        $('div#debug_console').html(data);

    }).then(function() {

        // Wouldn't work on ajax loaded items
        processUpdatedReoccuringFees();
        //log_recurrfees_todatabase()
    });




}











//  Notice!!!
//*******************************************
//  Major actions You Are Updating A New Recourring Dealer Based Off
//  Saving The Created New Live Invoice
//  button#live_invoice
//  Should Be Using goLiveview_invcid,	goLiveview_thisdid, editLive_charges_invoiceToken
//*******************************************
// Editing an ajax loaded reoccuring invoice.

function save_EditedLive_invoice() {
    console.log('Running Save Live Invoice');

    var goLiveview_thisdid = $('input#goLiveview_thisdid').val();
    var goLiveview_invcid = $('input#goLiveview_invcid').val();
    var goview_thisLiveinvcdidtoken = $('input#goview_thisLiveinvcdidtoken').val();
    var goview_thisLivedidtoken = $('input#goview_thisLivedidtoken').val();


    var edit_invoice_number = $('input#edit_invoice_number').val();
    var edit_invoice_date = $('input#edit_invoice_date').val();
    console.log('edit_invoice_date: ' + edit_invoice_date);

    var edit_invoice_duedate = $('input#edit_invoice_duedate').val();
    console.log('edit_invoice_duedate: ' + edit_invoice_duedate);


    var dealer_email_recipients = $('input#dealer_email_recipients').val();
    var edit_live_invoice_terms = $('input#edit_live_invoice_terms').val();
    var edit_invoice_sendtoclient = $('select#edit_invoice_sendtoclient').val();
    var edit_invoice_currency = $('select#edit_invoice_currency').val();
    var editLive_sales_taxrate = $('input#editLive_sales_taxrate').val();
    var editLive_tax_total = $('input#editLive_tax_total').val();
    var editLive_discount_value = $('input#editLive_discount_value').val();
    var editLive_discount_dollarorpercn = $('select#editLive_discount_dollarorpercn').val();
    var editLive_invoice_shippinghanding = $('input#editLive_invoice_shippinghanding').val();
    var editLive_invoice_arrival_fee = $('input#editLive_invoice_arrival_fee').val();

    var editLive_invoice_subtotal = $('input#editLive_invoice_subtotal').val();
    var editLive_invoice_taxtotal = $('input#editLive_invoice_taxtotal').val();

    var editLive_invoice_comments = $('input#editLive_invoice_comments').val();
    var editLive_terms_conditions = $('input#editLive_terms_conditions').val();

    var editLive_invoice_total = $('input#editLive_invoice_total').val();
    var editLive_applied_payment = $('input#editLive_applied_payment').val();
    var editLive_edit_invoice_amount_due = $('input#editLive_edit_invoice_amount_due').val();

    var edit_live_invoice_status = $('select#edit_live_invoice_status').val()




    $.post('models/script_update_live_invoice.php', {
        goLiveview_thisdid: goLiveview_thisdid,
        goLiveview_invcid: goLiveview_invcid,
        goview_thisLiveinvcdidtoken: goview_thisLiveinvcdidtoken,
        goview_thisLivedidtoken: goview_thisLivedidtoken,
        edit_invoice_number: edit_invoice_number,
        edit_live_invoice_terms: edit_live_invoice_terms,
        edit_invoice_date: edit_invoice_date,
        edit_invoice_duedate: edit_invoice_duedate,
        edit_live_invoice_terms: edit_live_invoice_terms,


        dealer_email_recipients: dealer_email_recipients,
        edit_invoice_sendtoclient: edit_invoice_sendtoclient,
        edit_invoice_currency: edit_invoice_currency,
        editLive_sales_taxrate: editLive_sales_taxrate,
        editLive_tax_total: editLive_tax_total,
        editLive_discount_value: editLive_discount_value,
        editLive_discount_dollarorpercn: editLive_discount_dollarorpercn,
        editLive_invoice_shippinghanding: editLive_invoice_shippinghanding,
        editLive_invoice_subtotal: editLive_invoice_subtotal,
        editLive_invoice_arrival_fee: editLive_invoice_arrival_fee,
        editLive_invoice_comments: editLive_invoice_comments,
        editLive_terms_conditions: editLive_terms_conditions,
        editLive_invoice_taxtotal: editLive_invoice_taxtotal,
        editLive_invoice_total: editLive_invoice_total,
        editLive_applied_payment: editLive_applied_payment,
        editLive_edit_invoice_amount_due: editLive_edit_invoice_amount_due,
        edit_live_invoice_status: edit_live_invoice_status

    }, function(data) {

        console.log('data update_reoccuring invoice' + data);

        $('div#debug_console').html(data);

    }).then(function() {

        // Wouldn't work on ajax loaded items
        processUpdatedLiveInvoiceFees();
        //log_recurrfees_todatabase()
    });
}


function processUpdatedLiveInvoiceFees() {
    var i = 0;
    var editLive_charges_lineitem = 0;
    var editLive_charges_lineitem_tal = 0;
    var editLive_charges_fee_taxed = 'N';
    var editLive_charges_toinvoicenumber = $('input#edit_invoice_number').val();
    var goLiveview_thisdid = document.getElementById('goLiveview_thisdid').value;
    var goLiveview_invcid = document.getElementById('goLiveview_invcid').value;

    var goview_thisLiveinvcdidtoken = $('input#goview_thisLiveinvcdidtoken').val();
    var goview_thisLivedidtoken = $('input#goview_thisLivedidtoken').val();


    $("div#update_live_invoice_fees_box  input#editLive_charges_fee_price").each(function() {
        //$("div#update_reocurring_invoice_fees_box  input#recurEdit_fee_price").each(function() {

        var _invoice_html = $(this).parent().next().html();
        //  console.log('_invoice_html: '+_invoice_html);
        editLive_charges_lineitem++;

        var editLive_charges_fee_id = $(this).parent().parent().find('select#editLive_charges_fee_type').val();
        var editLive_charges_fee_type = $(this).parent().parent().find('select#editLive_charges_fee_type:selected').text();
        console.log('editLive_charges_fee_id: ' + editLive_charges_fee_id);
        var editLive_charges_fee_description = $(this).parent().parent().find('input#editLive_charges_fee_description').val();
        console.log('editLive_charges_fee_description: ' + editLive_charges_fee_description);


        var editLive_charges_fee_qty = parseInt($(this).parent().prev().find('input#editLive_charges_fee_qty').val());
        var editLive_charges_fee_price = $(this).val();
        var editLive_charges_amount = $(this).parent().parent().find('input#editLive_charges_amount').val();

        if ($('input#editLive_charges_fee_taxed').is(':checked')) {
            var editLive_charges_fee_taxed = 'Y';
        } else {
            var editLive_charges_fee_taxed = 'N';
        }
        console.log('editLive_charges_fee_taxed: ' + editLive_charges_fee_taxed);

        console.log('editLive_charges_fee_type: ' + editLive_charges_fee_type);
        console.log('editLive_charges_fee_description: ' + editLive_charges_fee_description);

        var editLive_charges_source_id = '';
        var editLive_charges_source_name = '';


        $.post('models/script_process_updated_fees_liveinvoice.php', {
            goLiveview_thisdid: goLiveview_thisdid,
            goLiveview_invcid: goLiveview_invcid,
            editLive_charges_toinvoicenumber: editLive_charges_toinvoicenumber,
            editLive_charges_invoiceToken: goview_thisLiveinvcdidtoken,
            goview_thisLivedidtoken: goview_thisLivedidtoken,
            editLive_charges_lineitem: editLive_charges_lineitem,
            editLive_charges_fee_id: editLive_charges_fee_id,
            editLive_charges_fee_type: editLive_charges_fee_type,
            editLive_charges_fee_description: editLive_charges_fee_description,
            editLive_charges_fee_qty: editLive_charges_fee_qty,
            editLive_charges_fee_taxed: editLive_charges_fee_taxed,
            editLive_charges_fee_price: editLive_charges_fee_price,
            editLive_charges_amount: editLive_charges_amount,
            editLive_charges_source_id: editLive_charges_source_id,
            editLive_charges_source_name: editLive_charges_source_name



        }, function(data) {
            console.log('Running Process Created Fees Recurring:' + data);
        });
    });

}