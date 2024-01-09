// JavaScript Document
//*******************************************
//DO NOT REMOVE THIS COPYWRITE INFO!
//Created: 12/03/2019
//Last Modified: 12/15/2019
//This script may not be copied, edited, distributed or reproduced
//without express written permission from
//For commercial use rates, contact:
//Benjamin Carter: Webgoonie - The Neo Of Web Autmotive
//IDSCRM.COM LLC
//309 Winthrop Lane
//McDonough, GA  30253
//benjamin@idscrm.com.com
//https://www.idscrm.com
//Commercial User Licence #: PROVIDED BY REQUEST
//Commercial Licence Date:   PROVIDED BY REQUEST
//*******************************************


// Temporary You need to do tax total functions on loaded data
// Build this thing out as modules new idea update don't get mad you didn't know what you were doing at first



$(document).ready(function() {








    // Document Main Click To Unlock other tab featuresrecoccuring table
    $(document).on('click', '#Reoccuring_do table.table tr td span.recurinvcid', function(data) {

        console.log('trying to load invoice pane');




        //Selects the loaded tab uniquely by ID
        $('a[href="#tab-zc"]').tab('show'); // Select tab by name
        var link = $('a[href="#tab-zc"]');
        $('html, body').stop().animate({
            scrollTop: $(link.attr('href')).offset().top - 50
        }, 500);
        event.preventDefault();

        console.log('clicked table');

        var goview_recurinvcid = parseInt($(this).attr('id'));
        var goview_thisdid = parseInt($(this).closest('td').attr('id'));
        console.log('picked up goview_recurinvcid:' + goview_recurinvcid);
        console.log('picked up goview_thisdid:' + goview_thisdid);

        var goview_recur_dealer_token = $(this).parent().parent('tr').find('.recurinvcdidtoken').attr('id');
        var goview_recur_invoice_token = $(this).parent().parent('tr').find('.recurinvctoken').attr('id');
        console.log('picked up running goview_recur_dealer_token:' + goview_recur_dealer_token);
        console.log('picked up running goview_recur_invoice_token:' + goview_recur_invoice_token);


        $('input#goview_thisdid').val(goview_thisdid);
        $('input#goview_recurinvcid').val(goview_recurinvcid);

        $('input#goview_recur_dealer_token').val(goview_recur_dealer_token);
        $('input#goview_recur_invoice_token').val(goview_recur_invoice_token);


        $('div#dlrReocurring_invcvw_bodyvw').show();
        $('div#loaded_iframeviewer').hide();


        console.log('running  thsdid:' + goview_thisdid);
        //$('#example').tabs('disable', 0); // disable first tab


        var recurinvcdid_name_display = $(this).parent().parent('tr').find('.recurinvcdid_name').html();
        console.log('recurinvcdid_name_display: ' + recurinvcdid_name_display);

        $('#recurinvcdid_name_display').html(recurinvcdid_name_display);
        $('h2#recurinvcViewdid_name_display').html(recurinvcdid_name_display);



        //var thisdid = parseInt($('input#thisdid').val());

        load_all_reocurring_billing_tabs();







    });



    // Idea Maybe At the end of this loop it will reload the tabs for events for actions maybe.
    // Main Click On Looping Invoices Edit Recurring Invoice.
    $(document).on('click', 'a#edit_this_reocurring_invoice', function() {



        //console.log('Clicked Edit This Invoice');


        // All the ids and token needed for reocuring invoices
        var goview_thisdid = parseInt($(this).parent().parent('tr').find('.recurinvcdid').attr('id'));
        var goview_recurinvcid = parseInt($(this).attr('rel'));

        var goview_recur_dealer_token = $(this).parent().parent('tr').find('.recurinvcdidtoken').attr('id');
        var goview_recur_invoice_token = $(this).parent().parent('tr').find('.recurinvctoken').attr('id');

        $('input#goview_recur_dealer_token').val(goview_recur_dealer_token);
        $('input#goview_recur_invoice_token').val(goview_recur_invoice_token);

        $('input#goview_thisdid').val(goview_thisdid);
        $('input#goview_recurinvcid').val(goview_recurinvcid);
        // This is html capture for display use.
        var thisdidHTML = $(this).parent().parent('tr').find('.recurinvcdid_name').html();

        //console.log('thisdidHTML: ' + thisdidHTML)

        //console.log('clicked tr parent next find td attr id:' + goview_thisdid);

        $('div#dlrReocurring_invcvw_bodyvw').hide();
        $('div#loaded_iframeviewer').show();

        //Selects the loaded tab uniquely by ID
        $('a[href="#tab-zd"]').tab('show'); // Select tab by name
        var link = $('a[href="#tab-zd"]');
        $('html, body').stop().animate({
            scrollTop: $(link.attr('href')).offset().top - 50
        }, 500);
        event.preventDefault();


        $('h2#recurinvcdid_name_display').html(thisdidHTML);
        $('h2#recurinvcViewdid_name_display').html(thisdidHTML);






        load_all_reocurring_billing_tabs();


    });

    // Start Recurring Invoice Event Listeners


    // Document Edit A Ajax Loaded Recurring Invoice
    // Not Sure If I like how this is going I may have to load more tabs up wit this due to wanting to edit
    // We need to see how sure we are to go further on this event.
    $(document).on('click', 'a#go_edit_reocurring_invoice', function() {

        console.log('Clicked Edit over pdf view This Invoice');

        //Selects the loaded tab uniquely by ID
        $('a[href="#tab-zd"]').tab('show'); // Select tab by name
        var link = $('a[href="#tab-zd"]');
        $('html, body').stop().animate({
            scrollTop: $(link.attr('href')).offset().top - 50
        }, 500);
        event.preventDefault();

        //$('h2#recurinvcdid_name_display').html(thisdidHTML);


    });

    // Pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
    var oTable = $('table#reoccuring_dealer_billing_table').DataTable();

    var activelive_InvoiceTable = $('table#activelive_InvoiceTable').DataTable();

    // var mydataInvoiceTable = $('table#mydataInvoiceTable').DataTable();

    var myDealerVehicledataTable = $('table#myDealerVehicledataTable').DataTable();

    $('input#enter_dealerid').keyup(function() {
        oTable.search($(this).val()).draw();
    })
	
	
/*
    // input fields for Touch spin
    $("input#recurring_invoice_arrival_fee").TouchSpin({
        min: 0,
        max: 1000000,
        step: 10.00,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 0,
        prefix: '$',
        buttondown_class: 'btn btn-white',
        buttonup_class: 'btn btn-white'
    });

    $("input#recurring_invoice_shippinghanding").TouchSpin({
        min: 0,
        max: 1000000,
        step: 10.00,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 0,
        prefix: '$',
        buttondown_class: 'btn btn-white',
        buttonup_class: 'btn btn-white'
    });

    $("input#recurring_discount_value").TouchSpin({
        min: 0,
        max: 100,
        step: 1.0,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 0,
        prefix: '$',
        buttondown_class: 'btn btn-white',
        buttonup_class: 'btn btn-white'
    });

    $("input#recurring_applied_payment").TouchSpin({
        min: 0,
        max: 10000000,
        step: 10,
        decimals: 2,
        boostat: 1,
        maxboostedstep: 0,
        prefix: '$',
        buttondown_class: 'btn btn-white',
        buttonup_class: 'btn btn-white'
    });

    $("input#recurring_sales_taxrate").TouchSpin({
        min: 0,
        max: 8,
        step: 0.1,
        decimals: 1,
        boostat: 5,
        maxboostedstep: 5,
        postfix: '%',
        buttondown_class: 'btn btn-white',
        buttonup_class: 'btn btn-white'
    });


*/
    // Gonna be used on select fees
    function processCalculationReocurringFees() {

        var new_fees_amount = '0.00';
        var count_me = 1;
        var new_fees_amount_dollars = '';

        run_reoccuring_invoice_subtotal();

    }





    // After added item this is when changing the quanity
    $(document).on('change', 'input#fee_qty', function(event) {
        var orig_qty = $(this).val();

        var fee_amount = $(event.target).parent().parent().find('#fee_price').val();

        var new_amount = orig_qty * fee_amount;

        var new_amount_dollars = new_amount.toFixed(2);

        console.log('New Amount: ' + new_amount_dollars);

        $(event.target).parent().parent().find('#fee_amount').val(new_amount_dollars);
        console.log('Remember You turned off But Why??? You Turned Back on');
        run_reoccuring_invoice_subtotal();
    });


    // This A Bad Boy Right Here When Selecting a New Fee
    $(document).on('change', 'select#fee_type', function(event) {

        console.log('select#fee_type change');

        var fee_id = $(this).val();
        var dudes_secret_token = $('input#dudes_secret_token').val();
        var enter_dealerid = $('input#enter_dealerid').val();

        //var text = $(event.target).parent().parent().find('#fee_description').val('happy');
        //console.log('TOPOE'+text);


        //var parentDOM = document.getElementById('fee_description');
        //var whatisval = $(this).find('#fee_description').attr('name');



        console.log('json start');

        $.getJSON("jSon/json-invoice-fees.php?fee_id=" +
            fee_id + "&enter_dealerid=" + enter_dealerid,
            function(data) {
                console.log(data);
                console.log(data.return_status.length);
                if (data.return_status.length == 0) {
                    console.log('Data Empty');
                } else {
                    console.log('Data Full');

                    $.each(data.return_status, function(obj) {

                        console.log("fee_id: " + this['fee_id']);
                        console.log("fee_type: " + this['fee_type']);
                        console.log("fee_description: " + this['fee_description']);

                        $(event.target).parent().parent().find('#fee_description').val(this['fee_description']);

                        $(event.target).parent().parent().find('#fee_qty').val('1');

                        console.log("fee_taxed: " + this['fee_taxed']);
                        if (this['fee_taxed'] == 1) {
                            $(event.target).parent().parent().find('fee_taxed').prop('checked', false);
                        } else {
                            $(event.target).parent().parent().find('fee_taxed').prop('checked', true);
                        }

                        console.log("fee_price: " + this['fee_price']);
                        $(event.target).parent().parent().find('#fee_price').val(this['fee_price']);
                        console.log("fee_amount: " + this['fee_amount']);
                        $(event.target).parent().parent().find('#fee_amount').val(this['fee_amount']);
                        console.log("fee_source_id: " + this['fee_source_id']);
                        console.log("fee_source_name: " + this['fee_source_name']);
                    })


                }

                console.log('Turned off Reoccuring Fees...');
                //processCalculationReocurringFees();

            });

        // A Function I failed to operate not working feel free to clean up and delete
        function processCreationReocurringFees() {
            console.log('processCreationReocurringFees() ');

            $("div#charges_lineitem_create_reourrcing_invoice select").each(function(event) {

                var fee_type = $('select#fee_type').val();
                var fee_type_txt = $('select#fee_type').text();
                var fee_description = $('input#fee_description').val();
                var fee_qty = $('input#fee_qty').val();
                var fee_price = $('input#fee_price').val();
                var fee_amount = $('input#fee_amount').val();

                console.log('fee_typefee_type: ' + fee_type);
                console.log('fee_typefee_description: ' + fee_description);
                console.log('fee_typefee_qty: ' + fee_qty);
                console.log('fee_typefee_price: ' + fee_price);
                console.log('fee_typefee_amount: ' + fee_amount);

                $.post('models/script_process_created_fees_recurring.php', {
                    fee_type: fee_type,
                    fee_type_txt: fee_type_txt,
                    fee_description: fee_description,
                    fee_qty: fee_qty,
                    fee_price: fee_price,
                    fee_amount: fee_amount
                }, function(data) {
                    console.log('data data me' + data);
                    //$('div#debug_console').html(data);
                });
            });

        }



    });

    // When Removing A new Fee
    $(document).on('click', 'a.remove_fee_el', function() {

        $(this).parent().parent('div').remove();
        console.log('Clicked Removed Fee need to remove from mysql....');
    });



    // When Addding a new Line For Fee
    $(document).on('click', 'button#add_new_fee_btn', function() {
        console.log('inner-fees-clicked');
        var dudes_secret_token = $('input#dudes_secret_token').val();
        var thisdudesid = $('input#thisdudesid').val();

        $.post('ajax/invoice_line_item_add_elem.php', {
            dudes_secret_token: dudes_secret_token,
            thisdudesid: thisdudesid
        }, function(data) {
            //console.log('data: '+data);
            $(".inner-fees").append(data);
        }).then(function(data) {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });

    });


    // When User Wants To View A Dealer Invoice
    $(document).on('click', 'a#findDealerToInvoiceViewBtn', function() {
        console.log('Opening Window To Find System Dealer To View Unfinished logging action');
        var system_dealerid = $('input#enter_dealerid').val();
        //materialize_pdf();

    });

    //When Want to Get Dealer Company Info
    $(document).on('click', 'button#pull_dealercompanyinfo', function() {
        console.log('Using Dealer Number When Want to Get Dealer Company Info');

        var system_dealerid = $('input#enter_dealerid').val();
        var url = "?system_dealerid=" + system_dealerid;
        window.location.replace(url);

    });

    //  SAFETY ALERT CHECK!!! Tab View To Create New Roccuring Invoice Tablink!
    $(document).on('click', 'li#create_new_reoccuring_invoice_tablink', function() {

        console.log('Trying to attempt a new invoice');

        var goview_thisdid = $('input#goview_thisdid').val();
        var goview_recurinvcid = $('input#goview_recurinvcid').val();
        var goview_recur_dealer_token = $('input#goview_recur_dealer_token').val();
        var goview_recur_invoice_token = $('input#goview_recur_invoice_token').val();

        console.log('goview_thisdid:' + goview_thisdid);
        console.log('reocurring_invoice_id:' + goview_recur_invoice_token);

        if (!goview_recurinvcid || !goview_recurinvcid || !goview_recur_dealer_token || !goview_recur_invoice_token) {

            alert('Sorry No Reoccuring Invoice Has Been Loaded');
            //Selects the loaded tab uniquely by ID
            //$('a[href="#tab-za"]').tab('show'); // Select tab by name
            $('div#tab-zb.tab-pane').removeClass("active"); // Sometimes the create reoccuring will stay open
            $('a[href="#tab-zb').tab('hide'); // Sometimes the create reoccuring will stay open

            var link = $('a[href="#tab-za"]');
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();


        }

        if (!goview_thisdid) {
            alert('Sorry No Reoccuring Dealer Has Been Loaded');
            //Selects the loaded tab uniquely by ID
            $('a[href="#tab-za"]').tab('show'); // Select tab by name
            var link = $('a[href="#tab-za"]');
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();

            return false;

        }



    });

    // Wants to View Reoccuring Invoice Pdf Invoice
    $(document).on('click', 'a#go_view_pdf_invoice', function() {

        console.log(' Viewing Pdf of Reoccuring Invoice');

        var data_targetURL = $(this).attr('data-target');


        var goview_thisdid = $('input#goview_thisdid').val();

        var goview_recurinvcid = $('input#goview_recurinvcid').val();
        var goview_recur_dealer_token = $('input#goview_recur_dealer_token').val();
        var goview_recur_invoice_token = $('input#goview_recur_invoice_token').val();
        //	document-idsagreement.php?dealer=94&recordid=12

        data_targetURL = 'document-idsagreement.php?dealer=' + goview_thisdid + '&recordid=' + goview_recurinvcid;

        materialize_pdf(data_targetURL);


    });


    $(document).on('click', 'a#go_emailview_reocurring_invoice', function() {


        console.log('showing:div#dlrReocurring_invcvw_bodyvw  switching: hiding ');
        $('div#dlrReocurring_invcvw_bodyvw').show();

        console.log('hiding: loaded_iframeviewer switching: showing');
        $('div#loaded_iframeviewer').hide();

        var link = $('a[href="#tab-zc"]');
        $('html, body').stop().animate({
            scrollTop: $(link.attr('href')).offset().top - 50
        }, 500);
        event.preventDefault();

    });

    // Test Button To calucate Fees
    $('button#calculateFees').on('click', function() {

        console.log('Clicked calculateFees Unused');

        //total_amount();


    });

    // Toggles using increment and drement of interger
    $('li.fee_slect a').on('click', function() {
        console.log('Test Dont Know what this is let me know what you see this log on li.fee_slect_a');
        var fee_id = $(this).parent('li').attr('id');

        console.log('feeid: ' + fee_id);
        var fee_desc = $(this).html();
        console.log('fee_desc: ' + fee_desc);

        var btn_readtest = $(this).parent().parent().parent().find('button.btnFee_slct').html();
        console.log('btn_readtest: ' + btn_readtest);

        $(this).parent().parent().parent().find('button.btnFee_slct').html(fee_desc)




    });





    //  Notice!!!
    //*******************************************
    //  Major actions You Are Creating A New Recourring Dealer Based Off
    //  Saving The Created New Reoccuring Invoice
    //  button#recurring_createsave_invoice
    //  Should Be Using goview_thisRecurinvcid,	goview_thisRecurinvcdid, goview_thisRecurinvcdidtoken
    //*******************************************
    $(document).on('click', 'button#recurring_createsave_invoice', function() {



        var goview_thisdid = $('input#goview_thisdid').val();
        var recurring_invoice_id = $('input#goview_recurinvcid').val();

        var invoice_typeid = $('select#invoice_typeid').val();

        var recurring_invoice_number = $('input#recurring_invoice_number').val();
        var dudes_public_token = $('input#dudes_public_token').val();
        var recurring_invoice_date = $('input#recurring_invoice_date').val();
        var invc_cret_evry = $('select#invc_cret_evry').val();
        var invc_cret_evrywhn = $('select#invc_cret_evrywhn').val();
        var recurring_invoice_duedate = $('input#recurring_invoice_duedate').val();
        var invoice_recurring_stopdate = $('input#invoice_recurring_stopdate').val();
        var recurring_daysto_payinvoice = $('input#recurring_daysto_payinvoice').val();
        var recurring_dealer_email_recipients = $('input#recurring_dealer_email_recipients').val();
        var recurring_invoice_sendtoclient = $('select#recurring_invoice_sendtoclient').val();
        var recurring_invoice_currency = $('select#recurring_invoice_currency').val();
        var recurring_sales_taxrate = $('input#recurring_sales_taxrate').val();
        var recurring_discount_value = $('input#recurring_discount_value').val();
        var recurring_discount_dollarorpercn = $('select#recurring_discount_dollarorpercn').val();
        var recurring_invoice_shippinghanding = $('input#recurring_invoice_shippinghanding').val();
        var recurring_invoice_arrival_fee = $('input#recurring_invoice_arrival_fee').val();
        var recurring_invoice_subtotal = $('input#recurring_invoice_subtotal').val();
        var recurring_tax_shipping = $('input#recurring_tax_shipping').val();
        var recurring_tax_arrival_fee = $('input#recurring_tax_arrival_fee').val();

        var recurring_invoice_comments = $('input#recurring_invoice_comments').val();
        var recurring_terms_conditions = $('input#recurring_terms_conditions').val();
        var recurring_invoice_taxtotal = $('input#recurring_invoice_taxtotal').val();
        var recurring_invoice_total = $('input#recurring_invoice_total').val();
        var recurring_applied_payment = $('input#recurring_applied_payment').val();
        var recurring_invoice_amount_due = $('input#recurring_invoice_amount_due').val();


        var recurring_invoice_status = 'Inactive';
        if ($('input#recurring_invoice_status:checked')) {
            var recurring_invoice_status = 'Active';
        } else {
            var recurring_invoice_status = 'Inactive';
        }


        console.log('create_this_reorecurring_invoice: ');

        $.post('models/script_create_recourring_invoice.php', {
            invoice_dealerid: goview_thisdid,
            invoice_typeid: invoice_typeid,
            recurring_invoice_id: recurring_invoice_id,
            recurring_invoice_number: recurring_invoice_number,
            dudes_public_token: dudes_public_token,
            recurring_invoice_date: recurring_invoice_date,
            invc_cret_evry: invc_cret_evry,
            invc_cret_evrywhn: invc_cret_evrywhn,
            recurring_invoice_duedate: recurring_invoice_duedate,
            invoice_recurring_stopdate: invoice_recurring_stopdate,
            recurring_daysto_payinvoice: recurring_daysto_payinvoice,
            recurring_dealer_email_recipients: recurring_dealer_email_recipients,
            recurring_invoice_sendtoclient: recurring_invoice_sendtoclient,
            recurring_invoice_currency: recurring_invoice_currency,
            recurring_sales_taxrate: recurring_sales_taxrate,

            recurring_discount_value: recurring_discount_value,
            recurring_discount_dollarorpercn: recurring_discount_dollarorpercn,
            recurring_invoice_shippinghanding: recurring_invoice_shippinghanding,
            recurring_invoice_arrival_fee: recurring_invoice_arrival_fee,
            recurring_invoice_subtotal: recurring_invoice_subtotal,
            recurring_tax_shipping: recurring_tax_shipping,
            recurring_tax_arrival_fee: recurring_tax_arrival_fee,

            recurring_invoice_comments: recurring_invoice_comments,
            recurring_terms_conditions: recurring_terms_conditions,
            recurring_invoice_taxtotal: recurring_invoice_taxtotal,
            recurring_invoice_total: recurring_invoice_total,
            recurring_applied_payment: recurring_applied_payment,
            recurring_invoice_amount_due: recurring_invoice_amount_due,
            recurring_invoice_status: recurring_invoice_status

        }, function(data) {

            console.log('data update_reoccuring invoice' + data);

            $('div#debug_console').html(data);

        }).then(function() {

            console.log('Running Process Creation Reoccuring Sever will process fees');
            //processEditCreationReocurringFees();

        });


    });



    function processCreateReoccuringFees() {

        console.log('Tell me when used');

        $("div#charges_lineitem_update_reourrcing_invoice select").each(function(event) {

            var rec_fee_type = $('select#rec_fee_type').val();
            var rec_fee_type_txt = $('select#rec_fee_type').text();

            var rec_fee_description = $('input#rec_fee_description').val();
            var rec_fee_qty = $('input#rec_fee_qty').val();
            var rec_fee_price = $('input#rec_fee_price').val();
            var rec_fee_amount = $('input#rec_fee_amount').val();
            var rec_fee_taxed = 'N';

            console.log('rec_fee_type: ' + rec_fee_type);
            console.log('rec_fee_description: ' + rec_fee_description);


            $.post('models/script_process_created_fees_recurring.php', {
                rec_fee_type: rec_fee_type,
                rec_fee_type_txt: rec_fee_type_txt,
                rec_fee_description: rec_fee_description,
                rec_fee_qty: rec_fee_qty,
                rec_fee_price: rec_fee_price,
                rec_fee_amount: rec_fee_amount,
                rec_fee_taxed: rec_fee_taxed

            }, function(data) {
                console.log('Running Process Created Fees Recurring');
            });
        });

    }

    // Making A Payment On ReoCurring Invoice make_payment_reocurringInvoiceBtn
    $(document).on('click', 'button#make_payment_reocurringInvoiceBtn', function() {



        console.log('clicked make_payment_reocurringInvoiceBtn');


        //Selects the loaded tab uniquely by ID
        $('a[href="#tab-ze"]').tab('show'); // Select tab by create a payment tab



        var link = $('a[href="#tab-ze"]');
        $('html, body').stop().animate({
            scrollTop: $(link.attr('href')).offset().top - 50
        }, 500);
        event.preventDefault();

    });



    // End Reccurring Invoice Event Listeners
    // Start Live Invoice Event Listeners

    //make_payment_liveInvoiceBtn
    // Making A Payment On ReoCurring Invoice make_payment_reocurringInvoiceBtn
    $(document).on('click', 'button#make_payment_liveInvoiceBtn', function() {

        console.log('clicked make_payment_liveInvoiceBtn');

        //Selects the loaded tab uniquely by ID
        $('a[href="#tab-ae"]').tab('show'); // Select tab by name payment tab

        var link = $('a[href="#tab-ae"]');
        $('html, body').stop().animate({
            scrollTop: $(link.attr('href')).offset().top - 50
        }, 500);
        event.preventDefault();

    });




    //  Start Live Invoice Event Listeners !!!
    //  Notice !!! Things are different You are dealing with loaded data already.
    //*******************************************
    //  Major actions You Are Creating A New Recourring Dealer Based Off
    //  Saving The Created New Reoccuring Invoice
    //  button#recurring_createsave_invoice
    //  Should Be Using goview_thisRecurinvcid,	goview_thisRecurinvcdid, goview_thisRecurinvcdidtoken
    //*******************************************

    // Document Main Click To Unlock other tab featuresrecoccuring table
    $(document).on('click', 'div#activelive_InvoiceTable_wrapper span.liveinvcid', function(data) {

        console.log('trying to load A Live Invoice into window tab pane');




        //Selects the loaded tab uniquely by ID
        $('a[href="#tab-ag"]').tab('show'); // Select tab by name

        var link = $('a[href="#tab-ag"]');
        $('html, body').stop().animate({
            scrollTop: $(link.attr('href')).offset().top - 50
        }, 500);
        event.preventDefault();

        console.log('clicked table');

        var liveinvoice_id = parseInt($(this).attr('id'));

        console.log('clicked tr a:' + liveinvoice_id);

        var thisdid = parseInt($(this).closest('td').attr('id'));
        console.log('clicked td id:' + thisdid);

        var thisdidtoken = $(this).parent().parent('tr').find('td.liveinvc_token').attr('id');
        console.log('clicked td thisdidtoken:' + thisdidtoken);

        var goview_thisLivedidtoken = $(this).parent().parent('tr').find('.liveinvc_dealer_token').attr('id');
        console.log('clicked td goview_thisLivedidtoken:' + goview_thisLivedidtoken);

        $('input#goLiveview_thisdid').val(thisdid);
        $('input#goLiveview_invcid').val(liveinvoice_id);
        $('input#goview_thisLiveinvcdidtoken').val(thisdidtoken);
        $('input#goview_thisLivedidtoken').val(goview_thisLivedidtoken);




        var liveinvc_name_display = $(this).parent().parent('tr').find('td.liveinvc_name_display').html();
        console.log('liveinvc_name_display: ' + liveinvc_name_display);

        $('h2#liveinvcViewdid_name_display').html(liveinvc_name_display);

        $('h2#liveinvcdid_name_display').html(liveinvc_name_display);

        $('h2#liveinvcCreateInvc_name_display').html(liveinvc_name_display);



        //var thisdid = parseInt($('input#thisdid').val());
        load_all_live_billing_tabs()


        console.log(' Not Posting ran function instead.');
        return false;
        $.post('ajax/pullLiveInvcEdit.php', {
            goview_thisLiveinvcid: liveinvoice_id,
            thisdid: thisdid
        }, function(data) {

            //console.log('data: '+data);

            $('div#dlrLive_invcEditvw_bodyvw').html(data);


        });



        console.log('Posting to createnew invoice whack');
        $.post('ajax/pullReoccuringNewInvoice.php', {
            liveinvoice_id: liveinvoice_id,
            thisdid: thisdid
        }, function(data) {

            console.log('data: ' + data);

            //$('#load_create_new_invoice').html(data);


        });



    });







    $(document).on('click', '#edit_this_Live_looping_invoice', function() {



        console.log('Clicked Edit This Invoice');

        var goview_thisLiveinvcid = $(this).attr('rel');
        var goview_thisLiveinvcdid = parseInt($(this).parent().parent('tr').find('.liveinvc_dealerid').attr('id'));

        var goview_thisLiveinvcdidtoken = $(this).parent().parent('tr').find('.liveinvc_token').attr('id');
        var goview_thisLivedidtoken = $(this).parent().parent('tr').find('.liveinvc_dealer_token').attr('id');

        var goview_thisLiveinvcdidHTML = $(this).parent().parent('tr').find('.liveinvc_name_display').html();

        console.log('thisdidHTML: ' + goview_thisLiveinvcdidHTML)

        console.log('clicked tr parent next find td attr id:' + goview_thisLiveinvcdid);

        $('input#goLiveview_invcid').val(goview_thisLiveinvcid);
        $('input#goLiveview_thisdid').val(goview_thisLiveinvcdid);
        $('input#goview_thisLiveinvcdidtoken').val(goview_thisLiveinvcdidtoken);
        $('input#goview_thisLivedidtoken').val(goview_thisLivedidtoken);



        //Selects the loaded tab uniquely by ID
        $('a[href="#tab-af"]').tab('show'); // Select tab by name
        var link = $('a[href="#tab-af"]');
        $('html, body').stop().animate({
            scrollTop: $(link.attr('href')).offset().top - 50
        }, 500);
        event.preventDefault();


        var liveinvc_name_display = $(this).parent().parent('tr').find('td.liveinvc_name_display').html();
        console.log('liveinvc_name_display: ' + liveinvc_name_display);

        // The Create View Tab Display Name
        $('h2#liveinvcCreateInvc_name_display').html(liveinvc_name_display);
        // The Edit View Tab Display Name
        $('h2#liveinvcdid_name_display').html(liveinvc_name_display);

        // The Live View Tab Display Name
        $('h2#liveinvcViewdid_name_display').html(liveinvc_name_display);













        load_all_live_billing_tabs();

    });


    // Wants to View Pdf Invoice
    $(document).on('click', 'button#go_pdfview_live_invoice', function() {

        console.log(' Wants To View A Live PDF Invoice');

        var data_targetURL = $(this).attr('data-target');
        console.log('data_targetURL: ' + data_targetURL);

        $('a[href="#tab-ag"]').tab('show'); // Select tab by name


        var link = $('a[href="#tab-ag"]');
        $('html, body').stop().animate({
            scrollTop: $(link.attr('href')).offset().top - 50
        }, 500);
        event.preventDefault();


        console.log('hiding: div#dlrliveinvcvw_bodyvw  switching: hiding ');
        $('div#dlrliveinvcvw_bodyvw').hide();

        console.log('showingg: loaded_LiveInvoiceiframeviewer switching: showing');
        $('div#loaded_LiveInvoiceiframeviewer').show();


        //materializeLiveinvc_pdf(data_targetURL);


    });


    $(document).on('click', 'button#go_emailview_live_invoice', function() {

        console.log('showingg: loaded_LiveInvoiceiframeviewer  switching: hiding');
        $('div#loaded_LiveInvoiceiframeviewer').hide();

        console.log('hiding: div#dlrliveinvcvw_bodyvw  switching: showing');
        $('div#dlrliveinvcvw_bodyvw').show();

        var link = $('a[href="#tab-ag"]');
        $('html, body').stop().animate({
            scrollTop: $(link.attr('href')).offset().top - 50
        }, 500);
        event.preventDefault();



    });

    $(document).on('click', 'button#go_edit_live_invoice', function() {


        $('a[href="#tab-af"]').tab('show'); // Select tab by name


        var link = $('a[href="#tab-af"]');
        $('html, body').stop().animate({
            scrollTop: $(link.attr('href')).offset().top - 50
        }, 500);
        event.preventDefault();



    });











});
//End Document Ready.












// Start Reccurring Invoice Functions
function run_reoccuring_invoice_subtotal() {

    var arr = document.getElementsByName('fee_amount');
    var fee_amount_tal = 0;
    for (var i = 0; i < arr.length; i++) {
        if (parseInt(arr[i].value))
            fee_amount_tal += parseInt(arr[i].value);
    }
    //document.getElementById('recurring_invoice_total').value = fee_amount_tal.toFixed(2);
    //document.getElementById('recurring_invoice_amount_due').value = fee_amount_tal.toFixed(2);
    document.getElementById('recurring_invoice_subtotal').value = fee_amount_tal.toFixed(2);

}

// Processing Fees On Reocurring Update Before Saving


function materialize_pdf(pdfurlview) {


    //
    // If absolute URL from the remote server is provided, configure the CORS
    // header on that server.
    //

    // document-idsagreement.php?dealer=94&recordid=12  << The link to the agreement pdf.
    // document-idsagreement.php?dealer=94&recordid=12

    //var url = 'invoice-print.php?dealer_id=85&id=10&invoice_token=6e67deb9e2a239e78c3d';
    var url = pdfurlview;

    $('div#dlrReocurring_invcvw_bodyvw').hide();

    $('div#loaded_iframeviewer').show();

    var link = $('a[href="#tab-zc"]');
    $('html, body').stop().animate({
        scrollTop: $(link.attr('href')).offset().top - 50
    }, 500);
    event.preventDefault();


    var pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 1.5,
        zoomRange = 0.25,
        canvas = document.getElementById('recur_the-canvas'),
        ctx = canvas.getContext('2d');

    /**
     * Get page info from document, resize canvas accordingly, and render page.
     * @param num Page number.
     */
    function renderPage(num, scale) {
        pageRendering = true;
        // Using promise to fetch the page
        pdfDoc.getPage(num).then(function(page) {
            var viewport = page.getViewport(scale);
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page into canvas context
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            var renderTask = page.render(renderContext);

            // Wait for rendering to finish
            renderTask.promise.then(function() {
                pageRendering = false;
                if (pageNumPending !== null) {
                    // New page rendering is pending
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });

        // Update page counters
        document.getElementById('recur_page_num').value = num;
    }

    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num, scale);
        }
    }

    /**
     * Displays previous page.
     */
    function onPrevPage() {
        if (pageNum <= 1) {
            return;
        }
        pageNum--;
        var scale = pdfDoc.scale;
        queueRenderPage(pageNum, scale);
    }
    document.getElementById('recur_prev').addEventListener('click', onPrevPage);

    /**
     * Displays next page.
     */
    function onNextPage() {
        if (pageNum >= pdfDoc.numPages) {
            return;
        }
        pageNum++;
        var scale = pdfDoc.scale;
        queueRenderPage(pageNum, scale);
    }
    document.getElementById('recur_next').addEventListener('click', onNextPage);

    /**
     * Zoom in page.
     */
    function onZoomIn() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale += zoomRange;
        var num = pageNum;
        renderPage(num, scale)
    }
    document.getElementById('recur_zoomin').addEventListener('click', onZoomIn);

    /**
     * Zoom out page.
     */
    function onZoomOut() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale -= zoomRange;
        var num = pageNum;
        queueRenderPage(num, scale);
    }
    document.getElementById('recur_zoomout').addEventListener('click', onZoomOut);

    /**
     * Zoom fit page.
     */
    function onZoomFit() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale = 1;
        var num = pageNum;
        queueRenderPage(num, scale);
    }
    document.getElementById('recur_zoomfit').addEventListener('click', onZoomFit);


    /**
     * Asynchronously downloads PDF.
     */
    PDFJS.getDocument(url).then(function(pdfDoc_) {
        pdfDoc = pdfDoc_;
        var documentPagesNumber = pdfDoc.numPages;
        document.getElementById('recur_page_count').textContent = '/ ' + documentPagesNumber;

        $('#recur_page_num').on('change', function() {
            var pageNumber = Number($(this).val());

            if (pageNumber > 0 && pageNumber <= documentPagesNumber) {
                queueRenderPage(pageNumber, scale);
            }

        });

        // Initial/first page rendering
        renderPage(pageNum, scale);
    });


}


function materializeLiveinvc_pdf(pdfurlview) {


    //
    // If absolute URL from the remote server is provided, configure the CORS
    // header on that server.
    //

    //var url = 'invoice-print.php?dealer_id=85&id=10&invoice_token=6e67deb9e2a239e78c3d';


    $('div#dlrLive_invcvw_bodyvw').hide();

    $('div#loaded_LiveInvoiceiframeviewer').show();

    var link = $('a[href="#tab-ag"]');
    $('html, body').stop().animate({
        scrollTop: $(link.attr('href')).offset().top - 50
    }, 500);
    event.preventDefault();

    var url = pdfurlview;

    var pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 1.5,
        zoomRange = 0.25,
        canvas = document.getElementById('liveInvoice_canvas'),
        ctx = canvas.getContext('2d');

    /**
     * Get page info from document, resize canvas accordingly, and render page.
     * @param num Page number.
     */
    function renderPage(num, scale) {
        pageRendering = true;
        // Using promise to fetch the page
        pdfDoc.getPage(num).then(function(page) {
            var viewport = page.getViewport(scale);
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page into canvas context
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            var renderTask = page.render(renderContext);

            // Wait for rendering to finish
            renderTask.promise.then(function() {
                pageRendering = false;
                if (pageNumPending !== null) {
                    // New page rendering is pending
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });

        // Update page counters
        document.getElementById('page_num').value = num;
    }

    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num, scale);
        }
    }

    /**
     * Displays previous page.
     */
    function onPrevPage() {
        if (pageNum <= 1) {
            return;
        }
        pageNum--;
        var scale = pdfDoc.scale;
        queueRenderPage(pageNum, scale);
    }
    document.getElementById('prev').addEventListener('click', onPrevPage);

    /**
     * Displays next page.
     */
    function onNextPage() {
        if (pageNum >= pdfDoc.numPages) {
            return;
        }
        pageNum++;
        var scale = pdfDoc.scale;
        queueRenderPage(pageNum, scale);
    }
    document.getElementById('next').addEventListener('click', onNextPage);

    /**
     * Zoom in page.
     */
    function onZoomIn() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale += zoomRange;
        var num = pageNum;
        renderPage(num, scale)
    }
    document.getElementById('zoomin').addEventListener('click', onZoomIn);

    /**
     * Zoom out page.
     */
    function onZoomOut() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale -= zoomRange;
        var num = pageNum;
        queueRenderPage(num, scale);
    }
    document.getElementById('zoomout').addEventListener('click', onZoomOut);

    /**
     * Zoom fit page.
     */
    function onZoomFit() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale = 1;
        var num = pageNum;
        queueRenderPage(num, scale);
    }
    document.getElementById('zoomfit').addEventListener('click', onZoomFit);


    /**
     * Asynchronously downloads PDF.
     */
    PDFJS.getDocument(url).then(function(pdfDoc_) {
        pdfDoc = pdfDoc_;
        var documentPagesNumber = pdfDoc.numPages;
        document.getElementById('page_count').textContent = '/ ' + documentPagesNumber;

        $('#page_num').on('change', function() {
            var pageNumber = Number($(this).val());

            if (pageNumber > 0 && pageNumber <= documentPagesNumber) {
                queueRenderPage(pageNumber, scale);
            }

        });

        // Initial/first page rendering
        renderPage(pageNum, scale);
    });


}


// Turned off above 12-4-2019
var total_amount = function() {


    console.log("$('.col-md-2').size()" + $('.col-md-2').size());


    var charges_lineitem = 0;
    $('div#charges_lineitem_create_reourrcing_invoice .col-md-2').each(function(event) {




        var that = $(this).html();
        console.log('that' + that);

        charges_lineitem += charges_lineitem + 1;

        console.log('charges_lineitem# ' + charges_lineitem);

        var fee_description = $(event.target).parent().find('#fee_description').val();
        console.log('fee_description: ' + fee_description);

        var fee_type = $('select#fee_type').val();
        var fee_type = document.getElementById("fee_type").value;

        var fee_description = $('input#fee_description').val();
        var fee_qty = $('input#fee_qty').val();
        var fee_price = $('input#fee_price').val();
        var fee_amount = $('input#fee_amount').val();

        var charges_dealerid = $('input#this_recurring_invoice_dealerid').val();
        var charges_toinvoicenumber = $('input#recurring_invoice_number').val();
        var charges_invoiceToken = $('input#dudes_public_token').val();

        console.log('fee_type: ' + fee_type);
        console.log('fee_description: ' + fee_description);
        console.log('fee_qty: ' + fee_qty);
        console.log('fee_price: ' + fee_price);
        console.log('fee_amount: ' + fee_amount);


        $.post('models/script_process_created_fees_recurring.php', {

            charges_fee_type: fee_type,
            charges_fee_id: fee_type,
            charges_dealerid: charges_dealerid,
            charges_toinvoicenumber: charges_toinvoicenumber,
            charges_invoiceToken: charges_invoiceToken,
            charges_fee_description: fee_description,
            charges_fee_qty: fee_qty,
            charges_fee_price: fee_price,
            charges_amount: fee_amount

        }, function(data) {
            console.log('data data me' + data);
            $('div#debug_console').html(data);
        });
        console.log('Final charges_lineitem# ' + charges_lineitem);
    });




}


function log_fees_todatabase() {

    //debugger;


    var i = 0;
    var recur_charges_lineitem = 1;
    var recur_charges_lineitem_tal = 0;
    var recur_charges_fee_taxed = 'N';
    var recur_charges_dealerid = document.getElementById('goview_thisdid').value;
    var reocurring_invoice_id = document.getElementById('goview_recurinvcid').value;

    var fee_amount_tal = 0;
    var fee_price_tal = 0;
    var fee_price = 0;
    var fee_qty = 0;
    var fee_qty_tal = 0;
    var new_amount_dollars = 0;
    var fee_type_tal = 0;

    var fee_amount = document.getElementsByName('fee_amount');
    console.log('fee_amount: ' + fee_amount);

    var fee_price = document.getElementsByName('fee_price');
    console.log('fee_price: ' + fee_price);


    var fee_type_tal = document.getElementsByName('fee_type')[i].selectedIndex;
    console.log('fee_type_tal: ' + fee_type_tal);

    var fee_type_txt = document.getElementsByName('fee_type')[i].value;
    console.log('fee_type_txt: ' + fee_type_txt);

    var fee_price_tal = document.getElementsByName('fee_price');
    console.log('fee_price: ' + fee_price_tal);

    var fee_description = document.getElementsByName('fee_description')[i].selectedIndex;
    console.log('fee_description: ' + fee_description);

    var fee_qty = document.getElementsByName('fee_qty');
    console.log('fee_qty: ' + fee_qty);


    var fee_qty_tal = document.getElementsByName('fee_qty');
    console.log('fee_qty: ' + fee_qty_tal);

    var dudes_secret_token = document.getElementById('dudes_secret_token').value;
    var recurring_invoice_id = document.getElementById('recurring_invoice_id').value;

    console.log('dudes_secret_token: ' + dudes_secret_token);


    var recurring_invoice_number = document.getElementById('recurring_invoice_number').value;
    if (!recurring_invoice_number || recurring_invoice_number == NaN) {
        console.log('Nan or dont exist recurring_invoice_number: ' + recurring_invoice_number);
        recurring_invoice_number = 1;
    }

    console.log('recurring_invoice_number: ' + recurring_invoice_number);







    for (var i = 0; i < fee_amount.length; i++) {

        if (parseInt(fee_amount[i].value))



            fee_amount_tal = parseFloat(fee_amount[i].value);

        fee_price_tal = parseFloat(fee_price[i].value);

        if (!fee_amount_tal || fee_amount_tal == NaN || fee_price_tal == '' || !fee_price_tal || fee_price_tal == NaN) {

            console.log('Skipped Due To a NaN on recur_charges_amount');

        } else {

            fee_type_tal = parseInt(fee_type[i].selectedIndex);
            fee_type_txt = parseInt(fee_type[i].value);
            fee_qty_tal = parseInt(fee_qty[i].value);
            new_amount_dollars += parseFloat(fee_amount[i].value);


            recur_charges_lineitem_tal += recur_charges_lineitem;

            $.post('models/script_process_created_fees_recurring.php', {
                recur_charges_dealerid: recur_charges_dealerid,
                recurring_invoice_id: recurring_invoice_id,
                recur_charges_toinvoicenumber: recurring_invoice_number,
                recur_charges_invoiceToken: dudes_secret_token,
                recur_charges_lineitem: recur_charges_lineitem_tal,
                recur_charges_fee_id: fee_type_tal,
                recur_charges_fee_description: fee_type_txt,
                recur_charges_fee_qty: fee_qty_tal,
                recur_charges_fee_taxed: recur_charges_fee_taxed,
                recur_charges_fee_price: fee_price_tal,
                recur_charges_amount: fee_amount_tal,
                recur_charges_source_id: fee_amount_tal,
                recur_charges_source_name: fee_amount_tal

            }, function(data) {
                console.log('data data me' + data);
                $('div#debug_console').html(data);
            });

        }
    }


    return;

}



// Start Reccurring Invoice Functions

function load_all_reocurring_billing_tabs() {



    var goview_recurinvcid = $('input#goview_recurinvcid').val();
    var goview_thisdid = $('input#goview_thisdid').val();
    var goview_recur_dealer_token = $('input#goview_recur_dealer_token').val();
    var goview_recur_invoice_token = $('input#goview_recur_invoice_token').val();

    $.post('ajax/pullReoccuringInvoiceParts.php', {
        goview_recurinvcid: goview_recurinvcid,
        goview_thisdid: goview_thisdid,
        goview_recur_dealer_token: goview_recur_dealer_token,
        goview_recur_invoice_token: goview_recur_invoice_token
    }, function(data) {

        // console.log('data: ' + data);

        $('div#dlrReocurring_invcvw_bodyvw').html(data);


    });

    $.post('ajax/pullReoccuringEdit.php', {
        goview_recurinvcid: goview_recurinvcid,
        goview_thisdid: goview_thisdid,
        goview_recur_dealer_token: goview_recur_dealer_token,
        goview_recur_invoice_token: goview_recur_invoice_token
    }, function(data) {

        //console.log('data: '+data);

        $('div#dlrReocurring_invcEditvw_bodyvw').html(data);


    });


    $.post('ajax/pullReoccuringPaymentModule.php', {
        goview_recurinvcid: goview_recurinvcid,
        goview_thisdid: goview_thisdid,
        goview_recur_dealer_token: goview_recur_dealer_token,
        goview_recur_invoice_token: goview_recur_invoice_token
    }, function(data) {

        //console.log('data: ' + data);

        $('#dlrReocurring_invcPymtModl_bodyvw').html(data);


    });



}

// End Reccurring Invoice Functions

// Start Active Invoice Functions

function load_all_live_billing_tabs() {

    //console.log('Loading All Active Invoice Tabs');


    var goLiveview_invcid = $('input#goLiveview_invcid').val();
    var goLiveview_thisdid = $('input#goLiveview_thisdid').val();

    var goview_thisLiveinvcdidtoken = $('input#goview_thisLiveinvcdidtoken').val();
    var goview_thisLivedidtoken = $('input#goview_thisLivedidtoken').val();

    //console.log('goLiveview_invcid: ' + goLiveview_invcid);
    //console.log('goLiveview_thisdid: ' + goLiveview_thisdid);

    //console.log('goview_thisLiveinvcdidtoken: ' + goview_thisLiveinvcdidtoken);
    //console.log('goview_thisLivedidtoken: ' + goview_thisLivedidtoken);

    $.post('ajax/pullLiveInvoiceParts.php', {
        goLiveview_invcid: goLiveview_invcid,
        goLiveview_thisdid: goLiveview_thisdid,
        goview_thisLiveinvcdidtoken: goview_thisLiveinvcdidtoken,
        goview_thisLivedidtoken: goview_thisLivedidtoken
    }, function(data) {

        //console.log('data: ' + data);

        $('#dlrliveinvcvw_bodyvw').html(data);


    });

    $.post('ajax/pullLiveInvcEdit.php', {
        goLiveview_thisdid: goLiveview_thisdid,
        goview_thisLiveinvcid: goLiveview_invcid,
        goview_thisLiveinvcdidtoken: goview_thisLiveinvcdidtoken,
        goview_thisLivedidtoken: goview_thisLivedidtoken

    }, function(data) {

        //console.log('data: '+data);

        $('div#dlrLive_invcEditvw_bodyvw').html(data);


    });


    $.post('ajax/pullLiveDealerCCform.php', {
        goLiveview_thisdid: goLiveview_thisdid,
        goview_thisLiveinvcid: goLiveview_invcid,
        goview_thisLivedidtoken: goview_thisLivedidtoken,
        goview_thisLiveinvcdidtoken: goview_thisLiveinvcdidtoken,
        goview_thisLivedidtoken: goview_thisLivedidtoken
    }, function(data) {

        //console.log('data: '+data);

        $('div#load_dealers_payment_module').html(data);


    });

    // Now You have to take care of mydataInvoiceTable



}

// End Active Invoice Functions