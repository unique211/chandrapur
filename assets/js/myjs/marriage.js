$(document).ready(function() {
    //$('#form1').hide();
    $(".tablehideshow").show();

    function getServerTime() {
        return $.ajax({ async: false }).getResponseHeader('Date');
    }
    var d = new Date(getServerTime());
    var month = d.getMonth() + 1;
    var day = d.getDate();
    if (month < 10) {
        month = '0' + month;
    } else {
        month = month;
    }
    if (day < 10) {
        day = '0' + day;
    } else {
        day = day;
    }
    var date = d.getFullYear() + "-" + month + "-" + day;
    $("#getDatewiseReceiptbtn").val(date);
    $(document).on('change', '#receipt_date', function() {
        // Does some stuff and logs the event to the console
        var receipt_date = $("#receipt_date").val();
        $("#bill_date").val(receipt_date);
    });
    //   var date = new Date(getServerTime());
    //   date = date.toString('dd/MM/yyyy');
    //   $(".date").val(date);
    //   $("#bill_date").val(date);
    //    $("#receipt_date").val(date);
    //   $('.date').datepicker({
    //        'todayHighlight': true,
    //        format: 'dd/mm/yyyy',
    //        autoclose: true,
    //   });
    $(document).on('click', '.closehideshow', function() {
        $('#save_update').val('');
        // $('#btnprint').val('');
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        $('#master_form1')[0].reset();
        $('#master_form2')[0].reset();
        //  $('#master_form3')[0].reset();
        $('#master_form9')[0].reset();
        $("#form1").hide();
        $("#form2").hide();
        $("#form3").hide();
        $("#form4").hide();
        $("#form5").hide();
        $("#form6").hide();
        // $("#form7").hide();
        $("#form8").hide();
        $("#form9").hide();
        $("#form10").hide();
    });
    $(".btnhideshow").click(function() {
        $(".tablehideshow").hide();
        $(".formhideshow").show();
        $("#form1").show();
    });
    $(".btncash_counter").click(function() {
        $(".tablehideshow").hide();
        $(".formhideshow").show();
        $("#form10").show();
        getreceiptno();
        $('#print_vouchar').val('');
        $('#print_vouchar').hide();
        showExtraReceipts();
    });
    //edit option - start edit voucher
    $(document).on('click', '.edit_extra', function() {
        var id = $(this).attr('id');
        var tmp = id.split('_');
        $('#name').val($('#name_' + tmp[1]).text());
        $('#mobile_no').val($('#mobile_' + tmp[1]).text());
        $('#no_copies').val($('#no_of_copy_' + tmp[1]).text());
        $('#payable_amount').val($('#payble_amt_' + tmp[1]).text());
        $('#remark').val($('#remark_' + tmp[1]).text());
        $('#reason').val($('#reason_' + tmp[1]).text());
        console.log(id);
        console.log(tmp[1]);
        $("#ref_voucher").val(tmp[1]);
        $("#print_vouchar").val(tmp[1]);
        $('#rest_vouchar').show();
        $('#print_vouchar').show();
        console.log($('#name_' + tmp[1]).text());
    });
    //end edit voucher
    //start extra show
    function showExtraReceipts() {
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/showdatavoucher",
            data: {
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if ($.fn.DataTable.isDataTable('#myTableExtra')) {
                    $('#myTableExtra').DataTable().destroy();
                }
                $('#myTableExtra tbody').empty();
                console.log('data from show data'); //+ data);
                console.log(data);
                var data = eval(data);
                var html = '';
                var index = 1;
                for (var i = 0; i < data.length; i++) {
                    var fdateval = data[i].receipt_date;
                    var fdateslt = fdateval.split('-');
                    var dt_receipt = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    html += '<tr>' +
                        '<td>' + index + '</td>' +
                        '<td id="receipt_no_' + data[i].id + '">' + data[i].receipt_no + '</td>' +
                        '<td id="dt_receipt_' + data[i].id + '">' + dt_receipt + '</td>' +
                        '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                        '<td id="mobile_' + data[i].id + '">' + data[i].mobile + '</td>' +
                        '<td id="reason_' + data[i].id + '">' + data[i].reason + '</td>' +
                        '<td id="no_of_copy_' + data[i].id + '">' + data[i].no_of_copy + '</td>' +
                        '<td id="payble_amt_' + data[i].id + '">' + data[i].payble_amt + '</td>' +
                        '<td id="remark_' + data[i].id + '">' + data[i].remark + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_extra btn btn-success" id=editextra_' + data[i].id + '><i class="fa fa-edit"></i></button></td>' +
                        '</tr>';
                    index++;
                }
                $('#tbody_extra').html(html);
                $('#myTableExtra').DataTable({});
            }
        });
    }
    //end extra show
    $(document).on('blur', "#no_copies", function() {
        var copies = $('#no_copies').val();
        var payble = parseFloat(copies) * 25;
        $('#payable_amount').val(payble);
    });

    function getreceiptno() {
        var d = new Date(getServerTime());
        var year = d.getFullYear();
        var mid = 'CMC/';
        var receiptno = 0;
        $.ajax({
            type: 'POST',
            url: baseurl + "Marrige/showDatewiseReceipt2",
            data: {
                year: year
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log('data getbillno');
                console.log(data);
                var data = eval(data);
                if (data[0].sequence_no == null) {
                    receiptno = 0;
                } else {
                    receiptno = parseInt(data[0].sequence_no);
                }
            },
            error: function() {}
        });
        console.log('receipt_no' + receiptno);
        // if(receiptno<=14159 && year ==2019)
        // receiptno = 14160;
        // else
        receiptno += 1;
        $('#sequence_no2').val(receiptno);
        receiptno = '' + receiptno;
        while (receiptno.length < 5) {
            receiptno = '0' + receiptno;
        }
        console.log(receiptno);
        receiptno = receiptno + mid + year;
        console.log(receiptno);
        $('#receipt_no2').val(receiptno);
    }

    $(document).on('click', "#rest_vouchar", function() {
        $('#master_form10')[0].reset();
        $('#print_vouchar').hide();
        $('#rest_vouchar').hide();
        $('#print_vouchar').val('');
        $('#ref_voucher').val('');
    });
    var autono = 0;
    var bil = '';
    getbillno();

    function getbillno() {
        //var id=$('#save_update').val();
        if (autono == '0' && bil == '') {
            $.ajax({
                type: 'POST',
                url: baseurl + "Marrige/data",
                dataType: "JSON",
                async: false,
                data: {},
                success: function(data) {
                    console.log('data getbillno');
                    console.log(data);
                    var data = eval(data);
                    var d1 = data.autono;
                    //d1++
                    autono = d1;
                    if (d1 <= 9) {
                        bil = '000' + d1;
                    } else {
                        bil = '00' + d1;
                    }
                    //$('#billno').val(d1);
                    //$('#b1').val(d1);	
                },
                error: function() {}
            });
        }
    }
    var table_name = "marrige_registration";
    $(document).on("change", "#c_birth_date", function() {
        var date1 = $('#c_birth_date').val();
        var dateslt = date1.split('/');
        var date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        // var date2 = $('#c_birth_date').val();
        // var dateslt = date1.split('/');
        // var date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dob = new Date(date);
        var date2 = $('#date_of_marrige').val();
        var datesl = date2.split('/');
        var mdate = datesl[2] + '-' + datesl[1] + '-' + datesl[0];
        var dob = new Date(date);
        var today = new Date(mdate);
        var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#child_age').val(age);
        if (age < 21) {
            alert('Please Enter valid Date of Birth for groom. Minimum age should be 21');
        }
    });
    $(document).on("change", "#g_birth_date", function() {
        var date1 = $('#g_birth_date').val();
        var dateslt = date1.split('/');
        var date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dob = new Date(date);
        var date2 = $('#date_of_marrige').val();
        var datesl = date2.split('/');
        var mdate = datesl[2] + '-' + datesl[1] + '-' + datesl[0];
        var dob = new Date(date);
        // alert('dob=' + dob);
        var today = new Date(mdate);
        var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#girl_age').val(age);
        if (age < 18) {
            alert('Please Enter valid Date of Birth for bride. Minimum age should be 18');
        }
    });
    //display regno start
    function displayReg(reg, y) {
        var regno = '';
        var d = new Date(getServerTime());
        // var n = d.getFullYear();
        var d = y.split('-');
        var n = d[0];
        regno = '' + reg;
        while (regno.length < 6) {
            regno = '0' + regno;
        }
        console.log(regno);
        regno = '' + n + '/' + regno;
        console.log(regno);
        return regno;
    }
    //display regno end
    //display regno start
    function displayRegNo(reg) {
        var regno = '';
        regno = '' + reg;
        while (regno.length < 6) {
            regno = '0' + regno;
        }
        console.log(regno);
        // regno = ''+n+'/'+regno;
        // console.log(regno);
        return regno;
    }
    //display regno end
    //get the last regnumber start
    function getMarriageReg() {
        var regno = 0;
        var d = new Date(getServerTime());
        var n = d.getFullYear();
        console.log('from the getMarriageReg');
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/getMaxReg",
            data: { year: n },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                var data = eval(data);
                console.log(data);
                if (data['last_reg'] == null)
                    regno = 0;
                else
                    regno = parseInt(data['last_reg']);
            }
        });
        if (n == 2019 && regno < 865)
            regno = 866
        regno++;
        regno = '' + regno;
        while (regno.length < 6) {
            regno = '0' + regno;
        }
        console.log(regno);
        return regno;
    }
    //get the last regnumber end
    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form1", function(e) {
        e.preventDefault();
        var d = new Date(getServerTime());
        var year = d.getFullYear();
        var mid = 'CCMC';
        console.log('bill ' + bil);
        console.log('autono ' + autono);
        bil = bil++;
        var regid = year + mid + bil;
        console.log(regid);
        regid = getMarriageReg();
        console.log('' + regid);
        var child_aadhar_no = $('#child_aadharcard_no').val();
        var girl_aadhar_no = $('#girl_aadharcard_number').val();
        var zone = $('#zone').val();
        var ward = $('#ward_area').val();
        var g_contact = $('#groom_contact_no').val();
        var b_contact = $('#bride_contact_no').val();
        var g_name = $('#groom_name').val();
        var c_name = $('#child_name').val();
        var g_address = $('#g_address').val();
        var c_address = $('#c_address').val();
        var g_tahsil = $('#groom_tahsil').val();
        var c_tahsil = $('#child_tahsil').val();
        var g_dist = $('#groom_dist').val();
        var c_dist = $('#child_dist').val();
        var b_previous_name = $('#bride_previousname').val();
        var g_previous_name = $('#girl_previousname').val();
        var b_previous_address = $('#bride_previousnadd').val();
        var g_previous_address = $('#girl_previousadd').val();
        var b_previous_tahsil = $('#bride_previoustahsil').val();
        var g_earlier_tahsil = $('#girl_previoustahsil').val();
        var b_previous_dist = $('#bride_previousdist').val();
        var g_previous_dist = $('#girl_previousdist').val();
        var marrige_address = $('#marriage_add').val();
        var wedding_place = $('#wedding_add').val();
        var date_of_marrige1 = $('#date_of_marrige').val();
        var c_birth_date1 = $('#c_birth_date').val();
        var g_birth_date1 = $('#g_birth_date').val();
        var c_age = $('#child_age').val();
        var g_age = $('#girl_age').val();
        if (c_age < 21) {
            alert('Please Enter valid Date of Birth for bride. Minimum age should be 21');
            return;
        }
        if (g_age < 18) {
            alert('Please Enter valid Date of Birth for bride. Minimum age should be 18');
            return;
        }
        var id = $('#save_update').val();
        var dateslt = date_of_marrige1.split('/');
        var date_of_marrige = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = c_birth_date1.split('/');
        var c_birth_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = g_birth_date1.split('/');
        var g_birth_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/adddata",
            data: {
                id: id,
                autono: autono,
                regid: regid,
                child_aadhar_no: child_aadhar_no,
                girl_aadhar_no: girl_aadhar_no,
                zone: zone,
                ward: ward,
                g_contact: g_contact,
                b_contact: b_contact,
                g_name: g_name,
                c_name: c_name,
                g_address: g_address,
                c_address: c_address,
                g_tahsil: g_tahsil,
                c_tahsil: c_tahsil,
                g_dist: g_dist,
                c_dist: c_dist,
                b_previous_name: b_previous_name,
                g_previous_name: g_previous_name,
                b_previous_address: b_previous_address,
                g_previous_address: g_previous_address,
                b_previous_tahsil: b_previous_tahsil,
                g_earlier_tahsil: g_earlier_tahsil,
                b_previous_dist: b_previous_dist,
                g_previous_dist: g_previous_dist,
                marrige_address: marrige_address,
                wedding_place: wedding_place,
                date_of_marrige: date_of_marrige,
                c_birth_date: c_birth_date,
                g_birth_date: g_birth_date,
                c_age: c_age,
                g_age: g_age,
                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                autono = '0';
                regid = '0';
                console.log(data);
                // console.log(data);
                if (data == true) {
                    if (id == "") {
                        successTost("Record Saved Successfully");
                    } else {
                        successTost("Record Updated Successfully");
                    }
                } else {
                    errorTost("Something Wrong", "error");
                }
                $('#master_form1')[0].reset();
                $('#save_update').val('');
                $('#form1').hide();
                $(".tablehideshow").show();
                datashow();
            }
        });
    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        var frmdt = $("#fdate").val();
        var tdt = $("#tdate").val();
        var mode = $("#mode").val();
        var staff_filter = $("#staff_filter").val();
        console.log("mode " + mode);
        if (frmdt == '') {
            var dt = new Date(getServerTime());
            frmdt = dt;
            to = dt;
        }
        var dateslt = frmdt.split('/');
        var from = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = tdt.split('/');
        var to = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/showdata",
            data: {
                table_name: table_name,
                from: from,
                to: to,
                mode: mode,
                staff_filter: staff_filter,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if ($.fn.DataTable.isDataTable('#myTable2')) {
                    $('#myTable2').DataTable().destroy();
                }
                $('#myTable2 tbody').empty();
                console.log('data from show data'); //+ data);
                console.log(data);
                var data = eval(data);
                var html = '';
                var html2 = '';
                var index = 1;
                var tot_amt = 0;
                for (var i = 0; i < data.length; i++) {
                    var fdateval = data[i].date_of_marrige;
                    var fdateslt = fdateval.split('-');
                    var date_of_marrige1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var readonly = '';
                    if (data[i].amount != null) {
                        tot_amt = parseInt(data[i].amount) + parseInt(tot_amt);
                    }

                    if (data[i].mr_id == null)
                        readonly = 'disabled';
                    html += '<tr>' +
                        '<td>' + index + '</td>' +
                        '<td id="id_' + data[i].id + '">' + data[i].receiptno + '</td>' +
                        '<td id="name_' + data[i].id + '">' + data[i].c_name + '</td>' +
                        '<td id="ward_no_' + data[i].id + '">' + data[i].c_address + '</td>' +
                        '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].g_previous_name + '</td>' +
                        '<td id="date1_' + data[i].id + '">' + data[i].g_previous_address + '</td>' +
                        '<td id="date1_' + data[i].id + '">' + date_of_marrige1 + '</td>' +
                        '<td id="wedding_place_' + data[i].id + '">' + data[i].wedding_place + '</td>' +
                        '<td style="display:none;" id="amount_' + data[i].id + '">' + data[i].amount + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-primary" id=' + data[i].id + '>See</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="checklist btn btn-primary" id=' + data[i].id + '>Checklist</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="reciept btn btn-primary" id=' + data[i].id + '>Reciept</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="appointment btn btn-primary" id=' + data[i].id + '>Appointment</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="sform btn btn-primary" id=' + data[i].id + '>Second Form</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="oletter btn btn-primary" id=' + data[i].id + '>Order Letter</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="appeal btn btn-primary" id=' + data[i].id + '>Appeal</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="certificate btn btn-primary" id=' + data[i].id + ' ' + readonly + ' >Certificate</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="upload btn btn-primary" id=' + data[i].id + '>Upload</button></td>';
                    if (role == "admin") {
                        html += '<td class="not-export-column" ><button name="delete" value="Delete" class="delete_data btn btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>';
                    }
                    html += '</tr>';

                    index++;


                }
                html2 = '<tr>' +

                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;">' + tot_amt + '</th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '<th style="display:none;"></th>' +
                    '</tr>';
                //   var table = $(html).after($(html2));

                $('#tbody').html(html);
                $('#tfoot').html(html2);




                var mode1 = $("#mode option:selected").text();

                $('#myTable2').DataTable({
                    dom: 'Bfrtip',

                    buttons: [{
                            extend: 'excelHtml5',
                            title: 'Marriage Certificate Registration List from ' + frmdt + ' to ' + tdt + ' Mode: ' + mode1,
                            exportOptions: {
                                columns: [1, 2, 4, 6, 7, 8]
                            },
                            footer: true
                        },
                        {
                            extend: 'print',
                            title: 'Marriage Certificate Registration List from ' + frmdt + ' to ' + tdt + ' Mode: ' + mode1,
                            exportOptions: {
                                columns: [1, 2, 4, 6, 7, 8]
                            },
                            footer: true,
                            customize: function(win) {
                                $(win.document.body)
                                    .css('font-size', '11px');
                                $(win.document.body).find('table')
                                    .css('font-size', '11px');
                                $(win.document.body).find('h1').css('font-size', '14pt')
                                    .css('text-align', 'center');

                                $(win.document.body).find('table')
                                    .removeClass('table-striped').removeClass('dataTable');
                            },
                            // customize: function ( win ) {
                            //     $(win.document.body)
                            //         .css( 'font-size','10pt') 
                            //         .css( 'font-family','arial'); 
                            //     $(win.document.body).find( 'table' )
                            //         .addClass( 'compact' )
                            //         .css( 'font-size', 'inherit' );
                            //     $(win.document.body).find('tfoot')[0].innerHTML = myfooter ;
                            //     win.print();
                            //     setTimeout(win.close(),500);
                            // }
                        }
                    ]

                });
            }
        });
    }
    //------------------show data in the tabale code end-----------------------------------------------
    //-----------------------delete data code start----------------------------------------------------
    $(document).on('click', '.delete_data', function() {
        var id1 = $(this).attr('id');
        if (id1 != "") {
            swal({
                    title: "Are you sure to delete ?",
                    text: "You will not be able to recover this Data !!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it !!",
                    closeOnConfirm: false
                },
                function() {
                    $.ajax({
                        type: "POST",
                        url: baseurl + "Marrige/deletedata",
                        dataType: "JSON",
                        data: {
                            id: id1,
                            table_name: table_name,
                        },
                        success: function(data) {
                            if (data == true) {
                                swal("Deleted !!", "Hey, your Data has been deleted !!", "success");
                                $('.closehideshow').trigger('click');
                                $('#save_update').val("");
                                datashow();; //call function show all data	
                            } else {
                                errorTost("Data Delete Failed");
                            }
                        }
                    });
                    return false;
                });
        }
    });
    //-----------------------delete data code end-----------------------------------
    //------------------------submit appointment form ------------------------------
    $(document).on('click', '#appointment', function(e) {
        e.preventDefault();
        var id = $('#a_saveupdate').val();
        var regid = $('#registration_no').val();
        var ano = autono;
        console.log(ano);
        var g_mobile = $('#groom_mno').val();
        var b_mobile = $('#bride_mno').val();
        var date = $('#notification_date5').val();
        var time = $('#time').val();
        var msg = $('#message').val();
        var fedate = date.split("/");
        var a_date = fedate[2] + "-" + fedate[1] + "-" + fedate[0];
        $.ajax({
            type: 'POST',
            url: baseurl + "Marrige/adddata",
            dataType: "JSON",
            async: false,
            data: {
                id: id,
                ano: ano,
                regid: regid,
                g_mobile: g_mobile,
                b_mobile: b_mobile,
                a_date: a_date,
                time: time,
                msg: msg,
                table_name: 'appointment'
            },
            success: function(data) {
                autono = '0';
                bil = '0';
                console.log(data);
                //alert("success");
                successTost("Success..!", "Success");
                $('#a_saveupdate').val(id);
                //$('#btnprint').val(id);
                $('.formhideshow').show();
                $('.tablehideshow').hide();
                datashow();
            },
            error: function() {
                console.log("error");
                alert("error")
            }
        });
    });
    //------------------------end submit appointment form ------------------------------
    //------------------------submit appointment form --------------------------------------
    $(document).on('click', '#formd', function(e) {
        e.preventDefault();
        //alert("hii");
        var id = $('#f_saveupdate').val();
        var regid = $('#registration_no').val();
        var ano = autono;
        //   alert(autono);
        console.log(ano);
        var wdate = $('#notification_date51').val();
        var w_place = $('#wedding_place').val();
        var laws = $('#various_personal').val();
        var h_name = $('#husbund_name').val();
        var h_religion = $('#religion').val();
        var h_address = $('#address_full').val();
        var h_business = $('#address_business').val();
        var h_born = $('#born').val();
        var h_mstate = $('#h_state_marriage').val();
        var h_aname = $('#husbund_name_second').val();
        var h_areligion = $('#another_religion').val();
        var h_age = $('#g_age_executed').val();
        var w_name = $('#wife_name').val();
        var w_aname = $('#wife_name_second').val();
        var w_age = $('#b_age_executed').val();
        var w_religion = $('#w_religion').val();
        var w_address = $('#w_address_full').val();
        var w_business = $('#waddress_business').val();
        var w_areligion = $('#wanother_religion').val();
        var w_born = $('#w_born').val();
        var w_mstate = $('#w_state_marriage').val();
        var w1_name = $('#w1_name').val();
        var w2_name = $('#w2_name').val();
        var w3_name = $('#w3_name').val();
        var w1_address = $('#w1_address').val();
        var w2_address = $('#w2_address').val();
        var w3_address = $('#w3_address').val();
        var w1_business = $('#w1address_business').val();
        var w2_business = $('#w2address_business').val();
        var w3_business = $('#w3address_business').val();
        var w1_relation = $('#relationship_couple1').val();
        var w2_relation = $('#relationship_couple2').val();
        var w3_relation = $('#relationship_couple3').val();
        var p_name = $('#priest_name').val();
        var p_address = $('#address').val();
        var p_religion = $('#p_religion').val();
        var p_age = $('#age').val();
        var pdate = $('#notification_date52').val();
        var h_photo = $('#file_attachother51').val();
        var w_photo = $('#file_attachother53').val();
        var w1_photo = $('#file_attachother55').val();
        var w2_photo = $('#file_attachother57').val();
        var w3_photo = $('#file_attachother59').val();
        var h_thumb = $('#file_attachother52').val();
        var w_thumb = $('#file_attachother54').val();
        var w1_thumb = $('#file_attachother56').val();
        var w2_thumb = $('#file_attachother58').val();
        var w3_thumb = $('#file_attachother591').val();
        var fedate = wdate.split("/");
        var w_date = fedate[2] + "-" + fedate[1] + "-" + fedate[0];
        var fedate1 = pdate.split("/");
        var p_date = fedate1[2] + "-" + fedate1[1] + "-" + fedate1[0];
        $.ajax({
            type: 'POST',
            url: baseurl + "Marrige/adddata",
            dataType: "JSON",
            async: false,
            data: {
                id: id,
                ano: ano,
                w_date: w_date,
                w_place: w_place,
                laws: laws,
                h_name: h_name,
                h_religion: h_religion,
                h_address: h_address,
                h_business: h_business,
                h_born: h_born,
                h_mstate: h_mstate,
                h_aname: h_aname,
                h_areligion: h_areligion,
                h_age: h_age,
                w_name: w_name,
                w_aname: w_aname,
                w_age: w_age,
                w_religion: w_religion,
                w_address: w_address,
                w_business: w_business,
                w_areligion: w_areligion,
                w_born: w_born,
                w_mstate: w_mstate,
                w1_name: w1_name,
                w2_name: w2_name,
                w3_name: w3_name,
                w1_address: w1_address,
                w2_address: w2_address,
                w3_address: w3_address,
                w1_business: w1_business,
                w2_business: w2_business,
                w3_business: w3_business,
                w1_relation: w1_relation,
                w2_relation: w2_relation,
                w3_relation: w3_relation,
                p_name: p_name,
                p_address: p_address,
                p_religion: p_religion,
                p_age: p_age,
                p_date: p_date,
                h_photo: h_photo,
                w_photo: w_photo,
                w1_photo: w1_photo,
                w2_photo: w2_photo,
                w3_photo: w3_photo,
                h_thumb: h_thumb,
                w_thumb: w_thumb,
                w1_thumb: w1_thumb,
                w2_thumb: w2_thumb,
                w3_thumb: w3_thumb,
                table_name: 'formd'
            },
            success: function(data) {
                autono = '0';
                bil = '0';
                console.log(data);
                $('#save_update').val(id);
                successTost("Success..!", "Success");
                $('.tablehideshow').show();
                $('#form5').hide();
                $('#f_saveupdate').val('');
                $('.formhideshow').hide();
                datashow();
            },
            error: function() {
                console.log("error");
                alert("error")
            }
        });
    });
    //------------------------end submit appointment form ------------------------------
    //------------------------Check List---------------------------------------------
    $(document).on('click', ".checklist", function() {
        $('.tablehideshow').hide();
        $('.formhideshow').show();
        $(".btnhideshow").show();
        $('#master_form2')[0].reset();
        $("#form2").show();
        $("#file_attachother1").val('');
        $("#msg1").html('');
        $("#file_attachother2").val('');
        $("#msg2").html('');
        $("#file_attachother3_1").val('');
        $("#msg3_1").html('');
        $("#file_attachother3_2").val('');
        $("#msg3_2").html('');
        $("#file_attachother3_3").val('');
        $("#msg3_3").html('');
        $("#file_attachother4_1").val('');
        $("#msg4_1").html('');
        $("#file_attachother4_2").val('');
        $("#msg4_2").html('');
        $("#file_attachother5").val('');
        $("#msg5").html('');
        $("#file_attachother6_1").val('');
        $("#msg6_1").html('');
        $("#file_attachother6_2").val('');
        $("#msg6_2").html('');
        $("#file_attachother6_3").val('');
        $("#msg6_3").html('');
        $("#file_attachother6_4").val('');
        $("#msg6_4").html('');
        $("#file_attachother7_1").val('');
        $("#msg7_1").html('');
        $("#file_attachother7_2").val('');
        $("#msg7_2").html('');
        $("#file_attachother8_1").val('');
        $("#msg8_1").html('');
        $("#file_attachother8_2").val('');
        $("#msg8_2").html('');
        $("#file_attachother9").val('');
        $("#msg9").html('');
        $("#file_attachother10").val('');
        $("#msg10").html('');
        $("#file_attachother11").val('');
        $("#msg11").html('');
        $("#file_attachother12_1").val('');
        $("#msg12_1").html('');
        $("#file_attachother12_2").val('');
        $("#msg12_2").html('');
        $("#file_attachother12_3").val('');
        $("#msg12_3").html('');
        $("#file_attachother12_4").val('');
        $("#msg12_4").html('');
        $("#ch_1").val(0);
        $("#ch_2").val(0);
        $("#ch_3_1").val(0);
        $("#ch_3_2").val(0);
        $("#ch_3_3").val(0);
        $("#ch_4_1").val(0);
        $("#ch_4_2").val(0);
        $("#ch_5").val(0);
        $("#ch_6_1").val(0);
        $("#ch_6_2").val(0);
        $("#ch_6_3").val(0);
        $("#ch_6_4").val(0);
        $("#ch_7_1").val(0);
        $("#ch_7_2").val(0);
        $("#ch_8_1").val(0);
        $("#ch_8_2").val(0);
        $("#ch_9").val(0);
        $("#ch_10").val(0);
        $("#ch_11").val(0);
        $("#ch_12_1").val(0);
        $("#ch_12_2").val(0);
        $("#ch_12_3").val(0);
        $("#ch_12_4").val(0);
        $("#attachment1").hide();
        $("#attachment2").hide();
        $("#attachment3_1").hide();
        $("#attachment3_2").hide();
        $("#attachment3_3").hide();
        $("#attachment4_1").hide();
        $("#attachment4_2").hide();
        $("#attachment5").hide();
        $("#attachment6_1").hide();
        $("#attachment6_2").hide();
        $("#attachment6_3").hide();
        $("#attachment6_4").hide();
        $("#attachment7_1").hide();
        $("#attachment7_2").hide();
        $("#attachment8_1").hide();
        $("#attachment8_2").hide();
        $("#attachment9").hide();
        $("#attachment10").hide();
        $("#attachment11").hide();
        $("#attachment12_1").hide();
        $("#attachment12_2").hide();
        $("#attachment12_3").hide();
        $("#attachment12_4").hide();
        $("#down1").html('');
        $("#down2").html('');
        $("#down3_1").html('');
        $("#down3_2").html('');
        $("#down3_3").html('');
        $("#down4_1").html('');
        $("#down4_2").html('');
        $("#down5").html('');
        $("#down6_1").html('');
        $("#down6_2").html('');
        $("#down6_3").html('');
        $("#down6_4").html('');
        $("#down7_1").html('');
        $("#down7_2").html('');
        $("#down8_1").html('');
        $("#down8_2").html('');
        $("#down9").html('');
        $("#down10").html('');
        $("#down11").html('');
        $("#down12_1").html('');
        $("#down12_2").html('');
        $("#down12_3").html('');
        $("#down12_4").html('');
        // var isNew = true;
        table_name = "marrige_registration";
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/showdatawhere",
            data: {
                table_name: table_name,
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {
                    $('#boy_name').val(data[i].c_name);
                    $('#girl_name').val(data[i].g_name);
                    $('#ref_id_chk_list').val(data[i].id);
                }
                $.ajax({
                    type: "POST",
                    url: baseurl + "Marrige/showdatawhere_doc",
                    data: {
                        id: id,
                    },
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        var data = eval(data);
                        var download1 = "";
                        var download2 = "";
                        var download3_1 = "";
                        var download3_2 = "";
                        var download3_3 = "";
                        var download4_1 = "";
                        var download4_2 = "";
                        var download5 = "";
                        var download6_1 = "";
                        var download6_2 = "";
                        var download6_3 = "";
                        var download6_4 = "";
                        var download7_1 = "";
                        var download7_2 = "";
                        var download8_1 = "";
                        var download8_2 = "";
                        var download9 = "";
                        var download10 = "";
                        var download11 = "";
                        var download12_1 = "";
                        var download12_2 = "";
                        var download12_3 = "";
                        var download12_4 = "";
                        for (var i = 0; i < data.length; i++) {
                            var ch_id = data[i].id;
                            var ch_1 = data[i].ch_1;
                            var ch_2 = data[i].ch_2;
                            var ch_3_1 = data[i].ch_3_1;
                            var ch_3_2 = data[i].ch_3_2;
                            var ch_3_3 = data[i].ch_3_3;
                            var ch_4_1 = data[i].ch_4_1;
                            var ch_4_2 = data[i].ch_4_2;
                            var ch_5 = data[i].ch_5;
                            var ch_6_1 = data[i].ch_6_1;
                            var ch_6_2 = data[i].ch_6_2;
                            var ch_6_3 = data[i].ch_6_3;
                            var ch_6_4 = data[i].ch_6_4;
                            var ch_7_1 = data[i].ch_7_1;
                            var ch_7_2 = data[i].ch_7_2;
                            var ch_8_1 = data[i].ch_8_1;
                            var ch_8_2 = data[i].ch_8_2;
                            var ch_9 = data[i].ch_9;
                            var ch_10 = data[i].ch_10;
                            var ch_11 = data[i].ch_11;
                            var ch_12_1 = data[i].ch_12_1;
                            var ch_12_2 = data[i].ch_12_2;
                            var ch_12_3 = data[i].ch_12_3;
                            var ch_12_4 = data[i].ch_12_4;
                            var f_1 = data[i].f_1;
                            var f_2 = data[i].f_2;
                            var f_3_1 = data[i].f_3_1;
                            var f_3_2 = data[i].f_3_2;
                            var f_3_3 = data[i].f_3_3;
                            var f_4_1 = data[i].f_4_1;
                            var f_4_2 = data[i].f_4_2;
                            var f_5 = data[i].f_5;
                            var f_6_1 = data[i].f_6_1;
                            var f_6_2 = data[i].f_6_2;
                            var f_6_3 = data[i].f_6_3;
                            var f_6_4 = data[i].f_6_4;
                            var f_7_1 = data[i].f_7_1;
                            var f_7_2 = data[i].f_7_2;
                            var f_8_1 = data[i].f_8_1;
                            var f_8_2 = data[i].f_8_2;
                            var f_9 = data[i].f_9;
                            var f_10 = data[i].f_10;
                            var f_11 = data[i].f_11;
                            var f_12_1 = data[i].f_12_1;
                            var f_12_2 = data[i].f_12_2;
                            var f_12_3 = data[i].f_12_3;
                            var f_12_4 = data[i].f_12_4;
                            $('#chklist_id').val(ch_id);
                            //isNew = false;
                            // console.log('is new?' + isNew);
                            if (ch_1 == 1) {
                                $('#ch_1').prop('checked', true);
                                $('#ch_1').val(1).trigger("change");
                            } else {
                                $('#ch_1').prop('checked', false);
                                $('#ch_1').val(0).trigger("change");
                            }
                            if (ch_2 == 1) {
                                $('#ch_2').prop('checked', true);
                                $('#ch_2').val(1).trigger("change");
                            } else {
                                $('#ch_2').prop('checked', false);
                                $('#ch_2').val(0).trigger("change");
                            }
                            if (ch_3_1 == 1) {
                                $('#ch_3_1').prop('checked', true);
                                $('#ch_3_1').val(1).trigger("change");
                            } else {
                                $('#ch_3_1').prop('checked', false);
                                $('#ch_3_1').val(0).trigger("change");
                            }
                            if (ch_3_2 == 1) {
                                $('#ch_3_2').prop('checked', true);
                                $('#ch_3_2').val(1).trigger("change");
                            } else {
                                $('#ch_3_2').prop('checked', false);
                                $('#ch_3_2').val(0).trigger("change");
                            }
                            if (ch_3_3 == 1) {
                                $('#ch_3_3').prop('checked', true);
                                $('#ch_3_3').val(1).trigger("change");
                            } else {
                                $('#ch_3_3').prop('checked', false);
                                $('#ch_3_3').val(0).trigger("change");
                            }
                            if (ch_4_1 == 1) {
                                $('#ch_4_1').prop('checked', true);
                                $('#ch_4_1').val(1).trigger("change");
                            } else {
                                $('#ch_4_1').prop('checked', false);
                                $('#ch_4_1').val(0).trigger("change");
                            }
                            if (ch_4_2 == 1) {
                                $('#ch_4_2').prop('checked', true);
                                $('#ch_4_2').val(1).trigger("change");
                            } else {
                                $('#ch_4_2').prop('checked', false);
                                $('#ch_4_2').val(0).trigger("change");
                            }
                            if (ch_5 == 1) {
                                $('#ch_5').prop('checked', true);
                                $('#ch_5').val(1).trigger("change");
                            } else {
                                $('#ch_5').prop('checked', false);
                                $('#ch_5').val(0).trigger("change");
                            }
                            if (ch_6_1 == 1) {
                                $('#ch_6_1').prop('checked', true);
                                $('#ch_6_1').val(1).trigger("change");
                            } else {
                                $('#ch_6_1').prop('checked', false);
                                $('#ch_6_1').val(0).trigger("change");
                            }
                            if (ch_6_2 == 1) {
                                $('#ch_6_2').prop('checked', true);
                                $('#ch_6_2').val(1).trigger("change");
                            } else {
                                $('#ch_6_2').prop('checked', false);
                                $('#ch_6_2').val(0).trigger("change");
                            }
                            if (ch_6_3 == 1) {
                                $('#ch_6_3').prop('checked', true);
                                $('#ch_6_3').val(1).trigger("change");
                            } else {
                                $('#ch_6_3').prop('checked', false);
                                $('#ch_6_3').val(0).trigger("change");
                            }
                            if (ch_6_4 == 1) {
                                $('#ch_6_4').prop('checked', true);
                                $('#ch_6_4').val(1).trigger("change");
                            } else {
                                $('#ch_6_4').prop('checked', false);
                                $('#ch_6_4').val(0).trigger("change");
                            }
                            if (ch_7_1 == 1) {
                                $('#ch_7_1').prop('checked', true);
                                $('#ch_7_1').val(1).trigger("change");
                            } else {
                                $('#ch_7_1').prop('checked', false);
                                $('#ch_7_1').val(0).trigger("change");
                            }
                            if (ch_7_2 == 1) {
                                $('#ch_7_2').prop('checked', true);
                                $('#ch_7_2').val(1).trigger("change");
                            } else {
                                $('#ch_7_2').prop('checked', false);
                                $('#ch_7_2').val(0).trigger("change");
                            }
                            if (ch_8_1 == 1) {
                                $('#ch_8_1').prop('checked', true);
                                $('#ch_8_1').val(1).trigger("change");
                            } else {
                                $('#ch_8_1').prop('checked', false);
                                $('#ch_8_1').val(0).trigger("change");
                            }
                            if (ch_8_2 == 1) {
                                $('#ch_8_2').prop('checked', true);
                                $('#ch_8_2').val(1).trigger("change");
                            } else {
                                $('#ch_8_2').prop('checked', false);
                                $('#ch_8_2').val(0).trigger("change");
                            }
                            if (ch_9 == 1) {
                                $('#ch_9').prop('checked', true);
                                $('#ch_9').val(1).trigger("change");
                            } else {
                                $('#ch_9').prop('checked', false);
                                $('#ch_9').val(0).trigger("change");
                            }
                            if (ch_10 == 1) {
                                $('#ch_10').prop('checked', true);
                                $('#ch_10').val(1).trigger("change");
                            } else {
                                $('#ch_10').prop('checked', false);
                                $('#ch_10').val(0).trigger("change");
                            }
                            if (ch_11 == 1) {
                                $('#ch_11').prop('checked', true);
                                $('#ch_11').val(1).trigger("change");
                            } else {
                                $('#ch_11').prop('checked', false);
                                $('#ch_11').val(0).trigger("change");
                            }
                            if (ch_12_1 == 1) {
                                $('#ch_12_1').prop('checked', true);
                                $('#ch_12_1').val(1).trigger("change");
                            } else {
                                $('#ch_12_1').prop('checked', false);
                                $('#ch_12_1').val(0).trigger("change");
                            }
                            if (ch_12_2 == 1) {
                                $('#ch_12_2').prop('checked', true);
                                $('#ch_12_2').val(1).trigger("change");
                            } else {
                                $('#ch_12_2').prop('checked', false);
                                $('#ch_12_2').val(0).trigger("change");
                            }
                            if (ch_12_3 == 1) {
                                $('#ch_12_3').prop('checked', true);
                                $('#ch_12_3').val(1).trigger("change");
                            } else {
                                $('#ch_12_3').prop('checked', false);
                                $('#ch_12_3').val(0).trigger("change");
                            }
                            if (ch_12_4 == 1) {
                                $('#ch_12_4').prop('checked', true);
                                $('#ch_12_4').val(1).trigger("change");
                            } else {
                                $('#ch_12_4').prop('checked', false);
                                $('#ch_12_4').val(0).trigger("change");
                            }
                            if (f_1 == "") {
                                $('#file_attachother1').val('');
                                $("#msg1").html('');
                            } else {
                                alert(f_1);
                                $('#file_attachother1').val(f_1);
                                $("#msg1").html("<font id='doc_image_name1' color='green'>" + f_1 + "</font>");
                            }
                            $('#file_attachother2').val(f_2);
                            $("#msg2").html("<font id='doc_image_name1' color='green'>" + f_2 + "</font>");
                            $('#file_attachother3_1').val(f_3_1);
                            $("#msg3_1").html("<font id='doc_image_name1' color='green'>" + f_3_1 + "</font>");
                            $('#file_attachother3_2').val(f_3_2);
                            $("#msg3_2").html("<font id='doc_image_name1' color='green'>" + f_3_2 + "</font>");
                            $('#file_attachother3_3').val(f_3_3);
                            $("#msg3_3").html("<font id='doc_image_name1' color='green'>" + f_3_3 + "</font>");
                            $('#file_attachother4_1').val(f_4_1);
                            $("#msg4_1").html("<font id='doc_image_name1' color='green'>" + f_4_1 + "</font>");
                            $('#file_attachother4_2').val(f_4_2);
                            $("#msg4_2").html("<font id='doc_image_name1' color='green'>" + f_4_2 + "</font>");
                            $('#file_attachother5').val(f_5);
                            $("#msg5").html("<font id='doc_image_name1' color='green'>" + f_5 + "</font>");
                            $('#file_attachother6_1').val(f_6_1);
                            $("#msg6_1").html("<font id='doc_image_name1' color='green'>" + f_6_1 + "</font>");
                            $('#file_attachother6_2').val(f_6_2);
                            $("#msg6_2").html("<font id='doc_image_name1' color='green'>" + f_6_2 + "</font>");
                            $('#file_attachother6_3').val(f_6_3);
                            $("#msg6_3").html("<font id='doc_image_name1' color='green'>" + f_6_3 + "</font>");
                            $('#file_attachother6_4').val(f_6_4);
                            $("#msg6_4").html("<font id='doc_image_name1' color='green'>" + f_6_4 + "</font>");
                            $('#file_attachother7_1').val(f_7_1);
                            $("#msg7_1").html("<font id='doc_image_name1' color='green'>" + f_7_1 + "</font>");
                            $('#file_attachother7_2').val(f_7_2);
                            $("#msg7_2").html("<font id='doc_image_name1' color='green'>" + f_7_2 + "</font>");
                            $('#file_attachother8_1').val(f_8_1);
                            $("#msg8_1").html("<font id='doc_image_name1' color='green'>" + f_8_1 + "</font>");
                            $('#file_attachother8_2').val(f_8_2);
                            $("#msg8_2").html("<font id='doc_image_name1' color='green'>" + f_8_2 + "</font>");
                            $('#file_attachother9').val(f_9);
                            $("#msg9").html("<font id='doc_image_name1' color='green'>" + f_9 + "</font>");
                            $('#file_attachother10').val(f_10);
                            $("#msg10").html("<font id='doc_image_name1' color='green'>" + f_10 + "</font>");
                            $('#file_attachother11').val(f_11);
                            $("#msg11").html("<font id='doc_image_name1' color='green'>" + f_11 + "</font>");
                            $('#file_attachother12_1').val(f_12_1);
                            $("#msg12_1").html("<font id='doc_image_name1' color='green'>" + f_12_1 + "</font>");
                            $('#file_attachother12_2').val(f_12_2);
                            $("#msg12_2").html("<font id='doc_image_name1' color='green'>" + f_12_2 + "</font>");
                            $('#file_attachother12_3').val(f_12_3);
                            $("#msg12_3").html("<font id='doc_image_name1' color='green'>" + f_12_3 + "</font>");
                            $('#file_attachother12_4').val(f_12_4);
                            $("#msg12_4").html("<font id='doc_image_name1' color='green'>" + f_12_4 + "</font>");
                            if (f_1 != '') {
                                download1 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download1 = '';
                            }
                            if (f_2 != '') {
                                download2 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download2 = '';
                            }
                            if (f_3_1 != '') {
                                download3_1 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download3_1 = '';
                            }
                            if (f_3_2 != '') {
                                download3_2 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download3_2 = '';
                            }
                            if (f_3_3 != '') {
                                download3_3 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download3_3 = '';
                            }
                            if (f_4_1 != '') {
                                download4_1 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download4_1 = '';
                            }
                            if (f_4_2 != '') {
                                download4_2 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download4_2 = '';
                            }
                            if (f_5 != '') {
                                download5 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download5 = '';
                            }
                            if (f_6_1 != '') {
                                download6_1 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download6_1 = '';
                            }
                            if (f_6_2 != '') {
                                download6_2 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download6_2 = '';
                            }
                            if (f_6_3 != '') {
                                download6_3 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download6_3 = '';
                            }
                            if (f_6_4 != '') {
                                download6_4 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download6_4 = '';
                            }
                            if (f_7_1 != '') {
                                download7_1 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download7_1 = '';
                            }
                            if (f_7_2 != '') {
                                download7_2 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download7_2 = '';
                            }
                            if (f_8_1 != '') {
                                download8_1 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download8_1 = '';
                            }
                            if (f_8_2 != '') {
                                download8_2 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download8_2 = '';
                            }
                            if (f_9 != '') {
                                download9 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download9 = '';
                            }
                            if (f_10 != '') {
                                download10 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download10 = '';
                            }
                            if (f_11 != '') {
                                download11 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download11 = '';
                            }
                            if (f_12_1 != '') {
                                download12_1 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download12_1 = '';
                            }
                            if (f_12_2 != '') {
                                download12_2 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download12_2 = '';
                            }
                            if (f_12_3 != '') {
                                download12_3 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download12_3 = '';
                            }
                            if (f_12_4 != '') {
                                download12_4 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download12_4 = '';
                            }
                            $("#down1").html('<a href=' + baseurl + 'Marrige/download/' + f_1 + '>' + download1 + '</a>');
                            $("#down2").html('<a href=' + baseurl + 'Marrige/download/' + f_2 + '>' + download2 + '</a>');
                            $("#down3_1").html('<a href=' + baseurl + 'Marrige/download/' + f_3_1 + '>' + download3_1 + '</a>');
                            $("#down3_2").html('<a href=' + baseurl + 'Marrige/download/' + f_3_2 + '>' + download3_2 + '</a>');
                            $("#down3_3").html('<a href=' + baseurl + 'Marrige/download/' + f_3_3 + '>' + download3_3 + '</a>');
                            $("#down4_1").html('<a href=' + baseurl + 'Marrige/download/' + f_4_1 + '>' + download4_1 + '</a>');
                            $("#down4_2").html('<a href=' + baseurl + 'Marrige/download/' + f_4_2 + '>' + download4_2 + '</a>');
                            $("#down5").html('<a href=' + baseurl + 'Marrige/download/' + f_5 + '>' + download5 + '</a>');
                            $("#down6_1").html('<a href=' + baseurl + 'Marrige/download/' + f_6_1 + '>' + download6_1 + '</a>');
                            $("#down6_2").html('<a href=' + baseurl + 'Marrige/download/' + f_6_2 + '>' + download6_2 + '</a>');
                            $("#down6_3").html('<a href=' + baseurl + 'Marrige/download/' + f_6_3 + '>' + download6_3 + '</a>');
                            $("#down6_4").html('<a href=' + baseurl + 'Marrige/download/' + f_6_4 + '>' + download6_4 + '</a>');
                            $("#down7_1").html('<a href=' + baseurl + 'Marrige/download/' + f_7_1 + '>' + download7_1 + '</a>');
                            $("#down7_2").html('<a href=' + baseurl + 'Marrige/download/' + f_7_2 + '>' + download7_2 + '</a>');
                            $("#down8_1").html('<a href=' + baseurl + 'Marrige/download/' + f_8_1 + '>' + download8_1 + '</a>');
                            $("#down8_2").html('<a href=' + baseurl + 'Marrige/download/' + f_8_2 + '>' + download8_2 + '</a>');
                            $("#down9").html('<a href=' + baseurl + 'Marrige/download/' + f_9 + '>' + download9 + '</a>');
                            $("#down10").html('<a href=' + baseurl + 'Marrige/download/' + f_10 + '>' + download10 + '</a>');
                            $("#down11").html('<a href=' + baseurl + 'Marrige/download/' + f_11 + '>' + download11 + '</a>');
                            $("#down12_1").html('<a href=' + baseurl + 'Marrige/download/' + f_12_1 + '>' + download12_1 + '</a>');
                            $("#down12_2").html('<a href=' + baseurl + 'Marrige/download/' + f_12_2 + '>' + download12_2 + '</a>');
                            $("#down12_3").html('<a href=' + baseurl + 'Marrige/download/' + f_12_3 + '>' + download12_3 + '</a>');
                            $("#down12_4").html('<a href=' + baseurl + 'Marrige/download/' + f_12_4 + '>' + download12_4 + '</a>');
                        }
                    }
                });
            }
        });
    });
    //------------------------end of check list--------------------------------------
    //----------------------submit form2 code start------------------------------
    $(document).on("submit", "#master_form2", function(e) {
        e.preventDefault();
        var table_name = "marrige_documents";
        var ref_id = $('#ref_id_chk_list').val();
        var ch_1 = $('#ch_1').val();
        var ch_2 = $('#ch_2').val();
        var ch_3_1 = $('#ch_3_1').val();
        var ch_3_2 = $('#ch_3_2').val();
        var ch_3_3 = $('#ch_3_3').val();
        var ch_4_1 = $('#ch_4_1').val();
        var ch_4_2 = $('#ch_4_2').val();
        var ch_5 = $('#ch_5').val();
        var ch_6_1 = $('#ch_6_1').val();
        var ch_6_2 = $('#ch_6_2').val();
        var ch_6_3 = $('#ch_6_3').val();
        var ch_6_4 = $('#ch_6_4').val();
        var ch_7_1 = $('#ch_7_1').val();
        var ch_7_2 = $('#ch_7_2').val();
        var ch_8_1 = $('#ch_8_1').val();
        var ch_8_2 = $('#ch_8_2').val();
        var ch_9 = $('#ch_9').val();
        var ch_10 = $('#ch_10').val();
        var ch_11 = $('#ch_11').val();
        var ch_12_1 = $('#ch_12_1').val();
        var ch_12_2 = $('#ch_12_2').val();
        var ch_12_3 = $('#ch_12_3').val();
        var ch_12_4 = $('#ch_12_4').val();
        var f_1 = $('#file_attachother1').val();
        var f_2 = $('#file_attachother2').val();
        var f_3_1 = $('#file_attachother3_1').val();
        var f_3_2 = $('#file_attachother3_2').val();
        var f_3_3 = $('#file_attachother3_3').val();
        var f_4_1 = $('#file_attachother4_1').val();
        var f_4_2 = $('#file_attachother4_1').val();
        var f_5 = $('#file_attachother5').val();
        var f_6_1 = $('#file_attachother6_1').val();
        var f_6_2 = $('#file_attachother6_2').val();
        var f_6_3 = $('#file_attachother6_3').val();
        var f_6_4 = $('#file_attachother6_4').val();
        var f_7_1 = $('#file_attachother7_1').val();
        var f_7_2 = $('#file_attachother7_2').val();
        var f_8_1 = $('#file_attachother8_1').val();
        var f_8_2 = $('#file_attachother8_2').val();
        var f_9 = $('#file_attachother9').val();
        var f_10 = $('#file_attachother10').val();
        var f_11 = $('#file_attachother11').val();
        var f_12_1 = $('#file_attachother12_1').val();
        var f_12_2 = $('#file_attachother12_2').val();
        var f_12_3 = $('#file_attachother12_3').val();
        var f_12_4 = $('#file_attachother12_4').val();
        var id = $('#chklist_id').val();
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/add_chklist",
            data: {
                id: id,
                ref_id: ref_id,
                ch_1: ch_1,
                ch_2: ch_2,
                ch_3_1: ch_3_1,
                ch_3_2: ch_3_2,
                ch_3_3: ch_3_3,
                ch_4_1: ch_4_1,
                ch_4_2: ch_4_2,
                ch_5: ch_5,
                ch_6_1: ch_6_1,
                ch_6_2: ch_6_2,
                ch_6_3: ch_6_3,
                ch_6_4: ch_6_4,
                ch_7_1: ch_7_1,
                ch_7_2: ch_7_2,
                ch_8_1: ch_8_1,
                ch_8_2: ch_8_2,
                ch_9: ch_9,
                ch_10: ch_10,
                ch_11: ch_11,
                ch_12_1: ch_12_1,
                ch_12_2: ch_12_2,
                ch_12_3: ch_12_3,
                ch_12_4: ch_12_4,
                f_1: f_1,
                f_2: f_2,
                f_3_1: f_3_1,
                f_3_2: f_3_2,
                f_3_3: f_3_3,
                f_4_1: f_4_1,
                f_4_2: f_4_2,
                f_5: f_5,
                f_6_1: f_6_1,
                f_6_2: f_6_2,
                f_6_3: f_6_3,
                f_6_4: f_6_4,
                f_7_1: f_7_1,
                f_7_2: f_7_2,
                f_8_1: f_8_1,
                f_8_2: f_8_2,
                f_9: f_9,
                f_10: f_10,
                f_11: f_11,
                f_12_1: f_12_1,
                f_12_2: f_12_2,
                f_12_3: f_12_3,
                f_12_4: f_12_4,
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                //  alert(data);
                if (data == true) {
                    if (id == "") {
                        successTost("Check List Saved Successfully");
                    } else {
                        successTost("Check List Updated Successfully");
                    }
                } else {
                    errorTost("Something Wrong", "error");
                }
                $('#master_form2')[0].reset();
                $('#form2').hide();
                $(".closehideshow").trigger('click');
                $(".tablehideshow").show();
                datashow();
            }
        });
    });
    //-------------------------------------------------------------------------------------------------------
    //------------------------reciept------------------------------------------------------------------------
    $(document).on('click', ".reciept", function() {
        $('#master_form4')[0].reset();
        var date = new Date(getServerTime());
        date = date.toString('dd/MM/yyyy');
        $(".date").val(date);
        $("#bill_date").val(date);
        $("#receipt_date").val(date);
        $('.date').datepicker({
            'todayHighlight': true,
            format: 'dd/mm/yyyy',
            autoclose: true,
        });
        $('#receipt_id').val('');
        $('#ref_id4').val('');
        $('.formhideshow').show();
        $('.tablehideshow').hide();
        $(".btnhideshow").show();
        $('#form4').show();
        $('#form1').hide();
        $('#form2').hide();
        $('#form3').hide();
        $('#form6').hide();
        $('#form8').hide();
        $('#form5').hide();
        $('#form9').hide();
        var id = $(this).attr('id');
        $('#ref_id4').val(id);
        var isNew = true;
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/getreceipt",
            data: {
                table_name: 'marrige_receipt',
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {
                    var fdateval = data[i].receipt_date;
                    var fdateslt = fdateval.split('-');
                    var receipt_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].chq_date;
                    var fdateslt = fdateval.split('-');
                    var chq_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].bill_date;
                    var fdateslt = fdateval.split('-');
                    var bill_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    $('#receipt_id').val(data[i].id);
                    $('#btnprint2').val(data[i].id);
                    $('#receipt_no').val(data[i].receipt_no);
                    $('#receipt_date').val(receipt_date1);
                    $('#collection_no').val(data[i].collection_no);
                    $('#counter_no').val(data[i].counter_no);
                    $('#receive_from').val(data[i].receive_from);
                    $('#amt').val(data[i].amt);
                    $('#amt_words').val(data[i].amt_words);
                    $('#function').val(data[i].function);
                    $('#mode').val(data[i].mode);
                    $('#amt2').val(data[i].amt2);
                    $('#chq_no').val(data[i].chq_no);
                    $('#chq_date').val(chq_date1);
                    $('#bank_name').val(data[i].bank);
                    $('#bill_no').val(data[i].bill_no);
                    $('#bill_date').val(bill_date1);
                    $('#details').val(data[i].details);
                    $('#payble').val(data[i].payble);
                    $('#receive_amt').val(data[i].receive_amt);
                    $('#total').val(data[i].total);
                    isNew = false;
                }
            }
        });
        if (isNew) {
            console.log('from else of receipt');
            //retrive receive from 
            $.ajax({
                type: "POST",
                url: baseurl + "Marrige/showdetailswhere",
                data: {
                    table_name: 'marrige_registration',
                    id: id,
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    var data = eval(data);
                    for (var i = 0; i < data.length; i++) {
                        $('#receive_from').val(data[i].c_name);
                        $('#function').val('Marriage');
                        $('#details').val('Marriage');
                        // to set amount
                        var md = new Date(data[i].date_of_marrige);
                        var today = new Date(getServerTime());
                        var age = Math.floor((today - md) / (24 * 60 * 60 * 1000));
                        console.log("Days: " + age);
                        //  console.log("mar date: " + md);
                        // console.log("today: " + today);
                        var rs = 0;
                        if (age <= 90) {
                            rs = 250;
                        } else if (age >= 91 && age <= 365) {
                            rs = 350;
                        } else {
                            rs = 450;
                        }
                        $('#amt').val(rs);
                        $('#amt_words').val(convertNumberToWords(rs));
                        $('#amt2').val(rs);
                        $('#payble').val(rs);
                        $('#receive_amt').val(rs);
                        $('#total').val(rs);
                    }
                }
            });
            //retrive amount 
            /* $.ajax({
                 type: "POST",
                 url: baseurl + "Marrige/getdocument",
                 data: {
                     id: id,
                 },
                 dataType: "JSON",
                 async: false,
                 success: function(data) {
                     var data = eval(data);
                     console.log(data);
                     var amt = 0;
                     for (var i = 0; i < data.length; i++) {
                         if (data[i].ch_3_1 == '1') {
                             amt = 250;
                         } else if (data[i].ch_3_2 == '1') {
                             amt = 350;
                         } else if (data[i].ch_3_3 == '1') {
                             amt = 450;
                         }
                     }
                     $('#amt').val(amt);
                     $('#amt_words').val(convertNumberToWords(amt));
                     $('#amt2').val(amt);
                     $('#payble').val(amt);
                     $('#receive_amt').val(amt);
                     $('#total').val(amt);
                 }
             });*/
            //generate registration number
            var d = new Date(getServerTime());
            var year = d.getFullYear();
            var mid = 'CCMC';
            var receiptno = 14160;
            $.ajax({
                type: 'POST',
                url: baseurl + "Marrige/getMaxReceipt",
                data: {
                    year: year
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    console.log('data getbillno');
                    console.log(data);
                    var data = eval(data);
                    if (data.last_receipt == null) {
                        receiptno = 0;
                    } else
                        receiptno = parseInt(data.last_receipt);
                },
                error: function() {}
            });
            console.log('receipt_no' + receiptno);
            if (receiptno <= 14244 && year == 2019)
                receiptno = 14245;
            else
                receiptno += 1;
            receiptno = '' + receiptno;
            while (receiptno.length < 5) {
                receiptno = '0' + receiptno;
            }
            console.log(receiptno);
            receiptno = year + mid + receiptno;
            console.log(receiptno);
            $('#receipt_no').val(receiptno);
            $('#bill_no').val(receiptno);
        }
    });
    //------------------------end of reciept --------------------------------------
    $(document).on('blur', "#amt", function() {
        var amt = $('#amt').val();
        $('#amt_words').val(convertNumberToWords(amt));
    });

    function convertNumberToWords(amount) {
        var words = new Array();
        words[0] = '';
        words[1] = 'One';
        words[2] = 'Two';
        words[3] = 'Three';
        words[4] = 'Four';
        words[5] = 'Five';
        words[6] = 'Six';
        words[7] = 'Seven';
        words[8] = 'Eight';
        words[9] = 'Nine';
        words[10] = 'Ten';
        words[11] = 'Eleven';
        words[12] = 'Twelve';
        words[13] = 'Thirteen';
        words[14] = 'Fourteen';
        words[15] = 'Fifteen';
        words[16] = 'Sixteen';
        words[17] = 'Seventeen';
        words[18] = 'Eighteen';
        words[19] = 'Nineteen';
        words[20] = 'Twenty';
        words[30] = 'Thirty';
        words[40] = 'Forty';
        words[50] = 'Fifty';
        words[60] = 'Sixty';
        words[70] = 'Seventy';
        words[80] = 'Eighty';
        words[90] = 'Ninety';
        amount = amount.toString();
        var atemp = amount.split(".");
        var number = atemp[0].split(",").join("");
        var n_length = number.length;
        var words_string = "";
        if (n_length <= 9) {
            var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
            var received_n_array = new Array();
            for (var i = 0; i < n_length; i++) {
                received_n_array[i] = number.substr(i, 1);
            }
            for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
                n_array[i] = received_n_array[j];
            }
            for (var i = 0, j = 1; i < 9; i++, j++) {
                if (i == 0 || i == 2 || i == 4 || i == 7) {
                    if (n_array[i] == 1) {
                        n_array[j] = 10 + parseInt(n_array[j]);
                        n_array[i] = 0;
                    }
                }
            }
            value = "";
            for (var i = 0; i < 9; i++) {
                if (i == 0 || i == 2 || i == 4 || i == 7) {
                    value = n_array[i] * 10;
                } else {
                    value = n_array[i];
                }
                if (value != 0) {
                    words_string += words[value] + " ";
                }
                if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Crores ";
                }
                if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Lakhs ";
                }
                if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Thousand ";
                }
                if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                    words_string += "Hundred and ";
                } else if (i == 6 && value != 0) {
                    words_string += "Hundred ";
                }
            }
            words_string = words_string.split("  ").join(" ");
        }
        return words_string;
    }
    // start filter
    $(document).on("submit", "#filter_form", function(e) {
        e.preventDefault();
        datashow();
    });
    //end filter
    //-----------------------------submit receipt-----------------------------
    $(document).on("submit", "#master_form4", function(e) {
        e.preventDefault();
        var table_name = "marrige_receipt";
        var id = $('#receipt_id').val();
        var ref_id = $('#ref_id4').val();
        var receipt_no = $('#receipt_no').val();
        var receipt_date1 = $('#receipt_date').val();
        var collection_no = $('#collection_no').val();
        var counter_no = $('#counter_no').val();
        var receive_from = $('#receive_from').val();
        var amt = $('#amt').val();
        var amt_words = $('#amt_words').val();
        var functions = $('#function').val();
        var mode = $('#mode').val();
        var amt2 = $('#amt2').val();
        var chq_no = $('#chq_no').val();
        var chq_date1 = $('#chq_date').val();
        var bank = $('#bank_name').val();
        var bill_no = $('#bill_no').val();
        var bill_date1 = $('#bill_date').val();
        var details = $('#details').val();
        var payble = $('#payble').val();
        var receive_amt = $('#receive_amt').val();
        var total = $('#total').val();
        var dateslt = receipt_date1.split('/');
        var receipt_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = chq_date1.split('/');
        var chq_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = bill_date1.split('/');
        var bill_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var reg_parts = receipt_no.split("CCMC");
        var receipt_year = reg_parts[0];
        var receipt_num = reg_parts[1];
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/adddata",
            data: {
                id: id,
                receipt_year: receipt_year,
                receipt_num: receipt_num,
                ref_id: ref_id,
                receipt_no: receipt_no,
                receipt_date: receipt_date,
                collection_no: collection_no,
                counter_no: counter_no,
                receive_from: receive_from,
                amt: amt,
                amt_words: amt_words,
                functions: functions,
                mode: mode,
                amt2: amt2,
                chq_no: chq_no,
                chq_date: chq_date,
                bank: bank,
                bill_no: bill_no,
                bill_date: bill_date,
                details: details,
                payble: payble,
                receive_amt: receive_amt,
                total: total,
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                if (data != 0 && id == "") {
                    successTost("Record Saved Successfully");
                    $('#btnprint2').val(data);
                    $('#receipt_id').val(data);
                    console.log(data);
                } else if (data == true) {
                    successTost("Record Updated Successfully");
                } else {
                    errorTost("Something Wrong", "error");
                }
            }
        });
    });
    //-----------------------------submit receipt-----------------------------
    //------------------------Appointment ---------------------------------------------
    $(document).on('click', ".appointment", function() {
        $('.formhideshow').show();
        $('.tablehideshow').hide();
        $(".btnhideshow").show();
        $('#form1').hide();
        $('#form2').hide();
        $('#form3').show();
        $('#form4').hide();
        $('#form6').hide();
        $('#form8').hide();
        $('#form5').hide();
        $('#form9').hide();
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/getappointment",
            data: {
                table_name: 'appointment',
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                if (data != '') {
                    console.log("from if");
                    var vardate = data[0].a_date.split("-");
                    var date = vardate[2] + "/" + vardate[1] + "/" + vardate[0];
                    $('#registration_no').val(data[i].regno);
                    $('#groom_mno').val(data[0].g_mobile);
                    $('#bride_mno').val(data[0].b_mobile);
                    $('#notification_date5').val(date); //
                    $('#time').val(data[0].time);
                    $('#message').val(data[0].message);
                } else {
                    console.log("from else");
                    $.ajax({
                        type: "POST",
                        url: baseurl + "Marrige/showdatawhere",
                        data: {
                            table_name: table_name,
                            id: id,
                        },
                        dataType: "JSON",
                        async: false,
                        success: function(data) {
                            var data = eval(data);
                            for (var i = 0; i < data.length; i++) {
                                $('#registration_no').val(displayReg(data[0].regno, data[0].reg_date));
                                $('#groom_mno').val(data[i].g_contact);
                                $('#bride_mno').val(data[i].b_contact);
                            }
                        }
                    });
                }
            }
        });
    });
    //------------------------end of Appointment ----------------------------------------
    //------------------------sform ---------------------------------------------
    $(document).on('click', ".sform", function() {
        $('.formhideshow').show();
        $('.tablehideshow').hide();
        $(".btnhideshow").show();
        $('#form5').show();
        $('#form1').hide();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').hide();
        $('#form6').hide();
        $('#form8').hide();
        $('#form9').hide();
        $("#file_attachother51").val('');
        $("#msg51").html('');
        $("#file_attachother52").val('');
        $("#msg52").html('');
        $("#file_attachother53").val('');
        $("#msg53").html('');
        $("#file_attachother54").val('');
        $("#msg54").html('');
        $("#file_attachother55").val('');
        $("#msg55").html('');
        $("#file_attachother56").val('');
        $("#msg56").html('');
        $("#file_attachother57").val('');
        $("#msg57").html('');
        $("#file_attachother58").val('');
        $("#msg58").html('');
        $("#file_attachother59").val('');
        $("#msg59").html('');
        $("#file_attachother591").val('');
        $("#msg591").html('');
        var id = $(this).attr('id');
        $('#atc_photo').val(id);
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/getappointment",
            data: {
                table_name: 'formd',
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log(data);
                if (data != '') {
                    console.log("from if");
                    for (var i = 0; i < data.length; i++) {
                        autono = data[i].autono;
                        $('#f_saveupdate').val(data[i].id);
                        var vardate = data[0].w_date.split("-");
                        var w_date = vardate[2] + "/" + vardate[1] + "/" + vardate[0];
                        var vardate1 = data[0].p_date.split("-");
                        var p_date = vardate1[2] + "/" + vardate1[1] + "/" + vardate1[0];
                        $('#notification_date51').val(w_date);
                        $('#wedding_place').val(data[i].w_place);
                        $('#various_personal').val(data[i].laws);
                        $('#husbund_name').val(data[i].h_name);
                        $('#husbund_name_second').val(data[i].h_aname);
                        $('#address_business').val(data[i].h_business);
                        $('#religion').val(data[i].h_religion);
                        $('#another_religion').val(data[i].h_areligion);
                        $('#born').val(data[i].h_born);
                        $('#g_age_executed').val(data[i].h_age);
                        $('#address_full').val(data[i].h_address);
                        $('#h_state_marriage').val(data[i].h_mstate);
                        $('#wife_name').val(data[i].w_name);
                        $('#wife_name_second').val(data[i].w_aname);
                        $('#waddress_business').val(data[i].w_business);
                        $('#w_religion').val(data[i].w_religion);
                        $('#wanother_religion').val(data[i].w_areligion);
                        $('#w_born').val(data[i].w_born);
                        $('#b_age_executed').val(data[i].w_age);
                        $('#w_address_full').val(data[i].w_address);
                        $('#w_state_marriage').val(data[i].w_mstate);
                        $('#w1_name').val(data[i].w1_name);
                        $('#w1_address').val(data[i].w1_address);
                        $('#w1address_business').val(data[i].w1_business);
                        $('#relationship_couple1').val(data[i].w1_relation);
                        $('#w2_name').val(data[i].w2_name);
                        $('#w2_address').val(data[i].w2_address);
                        $('#w2address_business').val(data[i].w2_business);
                        $('#relationship_couple2').val(data[i].w2_relation);
                        $('#w3_name').val(data[i].w3_name);
                        $('#w3_address').val(data[i].w3_address);
                        $('#w3address_business').val(data[i].w3_business);
                        $('#relationship_couple3').val(data[i].w3_relation);
                        $('#priest_name').val(data[i].p_name);
                        $('#address').val(data[i].p_address);
                        $('#p_religion').val(data[i].p_religion);
                        $('#age').val(data[i].p_age);
                        $('#notification_date52').val(p_date);
                        if (data[i].h_photo == '') {
                            $('#file_attachother51').val('');
                            $("#msg51").html('');
                        } else {
                            $('#file_attachother51').val(data[i].h_photo);
                            $("#msg51").html("<font id='doc_image_name1' color='green'>" + data[i].h_photo + "</font>");
                            $('#containerother_kyc51').empty();
                            var img = $('<img />').addClass('img').attr({
                                'id': 'myImage',
                                'src': baseurl + 'assets/images/marrige_attach/husband_photo/' + data[i].autono + '/' + data[i].h_photo,
                                'width': 50,
                            }).appendTo('#containerother_kyc51');
                        }
                        if (data[i].w_photo == '') {
                            $('#file_attachother53').val('');
                            $("#msg53").html('');
                        } else {
                            $('#file_attachother53').val(data[i].w_photo);
                            $("#msg53").html("<font id='doc_image_name1' color='green'>" + data[i].w_photo + "</font>");
                            $('#containerother_kyc53').empty();
                            var img = $('<img />').addClass('img').attr({
                                'id': 'myImage',
                                'src': baseurl + 'assets/images/marrige_attach/wife_photo/' + data[i].autono + '/' + data[i].w_photo,
                                'width': 50,
                            }).appendTo('#containerother_kyc53');
                        }
                        if (data[i].w1_photo == '') {
                            $('#file_attachother55').val('');
                            $("#msg55").html('');
                        } else {
                            $('#file_attachother55').val(data[i].w1_photo);
                            $("#msg55").html("<font id='doc_image_name1' color='green'>" + data[i].w1_photo + "</font>");
                            $('#containerother_kyc55').empty();
                            var img = $('<img />').addClass('img').attr({
                                'id': 'myImage',
                                'src': baseurl + 'assets/images/marrige_attach/witness_photo1/' + data[i].autono + '/' + data[i].w1_photo,
                                'width': 50,
                            }).appendTo('#containerother_kyc55');
                        }
                        if (data[i].w2_photo == '') {
                            $('#file_attachother57').val('');
                            $("#msg57").html('');
                        } else {
                            $('#file_attachother57').val(data[i].w2_photo);
                            $("#msg57").html("<font id='doc_image_name1' color='green'>" + data[i].w2_photo + "</font>");
                            $('#containerother_kyc57').empty();
                            var img = $('<img />').addClass('img').attr({
                                'id': 'myImage',
                                'src': baseurl + 'assets/images/marrige_attach/witness_photo2/' + data[i].autono + '/' + data[i].w2_photo,
                                'width': 50,
                            }).appendTo('#containerother_kyc57');
                        }
                        if (data[i].w3_photo == '') {
                            $('#file_attachother59').val('');
                            $("#msg59").html('');
                        } else {
                            $('#file_attachother59').val(data[i].w3_photo);
                            $("#msg59").html("<font id='doc_image_name1' color='green'>" + data[i].w3_photo + "</font>");
                            $('#containerother_kyc59').empty();
                            var img = $('<img />').addClass('img').attr({
                                'id': 'myImage',
                                'src': baseurl + 'assets/images/marrige_attach/witness_photo3/' + data[i].autono + '/' + data[i].w3_photo,
                                'width': 50,
                            }).appendTo('#containerother_kyc59');
                        }
                        if (data[i].h_thumb == '') {
                            $('#file_attachother52').val('');
                            $("#msg52").html('');
                        } else {
                            $('#file_attachother52').val(data[i].h_thumb);
                            $("#msg52").html("<font id='doc_image_name1' color='green'>" + data[i].h_thumb + "</font>");
                            $('#containerother_kyc52').empty();
                            var img = $('<img />').addClass('img').attr({
                                'id': 'myImage',
                                'src': baseurl + 'assets/images/marrige_attach/husband_thumb/' + data[i].autono + '/' + data[i].h_thumb,
                                'width': 50,
                            }).appendTo('#containerother_kyc52');
                        }
                        if (data[i].w_thumb == '') {
                            $('#file_attachother54').val('');
                            $("#msg54").html('');
                        } else {
                            $('#file_attachother54').val(data[i].w_thumb);
                            $("#msg54").html("<font id='doc_image_name1' color='green'>" + data[i].w_thumb + "</font>");
                            $('#containerother_kyc54').empty();
                            var img = $('<img />').addClass('img').attr({
                                'id': 'myImage',
                                'src': baseurl + 'assets/images/marrige_attach/wife_thumb/' + data[i].autono + '/' + data[i].w_thumb,
                                'width': 50,
                            }).appendTo('#containerother_kyc54');
                        }
                        if (data[i].w1_thumb == '') {
                            $('#file_attachother56').val('');
                            $("#msg56").html('');
                        } else {
                            $('#file_attachother56').val(data[i].w1_thumb);
                            $("#msg56").html("<font id='doc_image_name1' color='green'>" + data[i].w1_thumb + "</font>");
                            $('#containerother_kyc56').empty();
                            var img = $('<img />').addClass('img').attr({
                                'id': 'myImage',
                                'src': baseurl + 'assets/images/marrige_attach/witness_thumb1/' + data[i].autono + '/' + data[i].w1_thumb,
                                'width': 50,
                            }).appendTo('#containerother_kyc56');
                        }
                        if (data[i].w2_thumb == '') {
                            $('#file_attachother58').val('');
                            $("#msg58").html('');
                        } else {
                            $('#file_attachother58').val(data[i].w2_thumb);
                            $("#msg58").html("<font id='doc_image_name1' color='green'>" + data[i].w2_thumb + "</font>");
                            $('#containerother_kyc58').empty();
                            var img = $('<img />').addClass('img').attr({
                                'id': 'myImage',
                                'src': baseurl + 'assets/images/marrige_attach/witness_thumb2/' + data[i].autono + '/' + data[i].w2_thumb,
                                'width': 50,
                            }).appendTo('#containerother_kyc58');
                        }
                        if (data[i].w3_thumb == '') {
                            $('#file_attachother591').val('');
                            $("#msg591").html('');
                        } else {
                            $('#file_attachother591').val(data[i].w3_thumb);
                            $("#msg591").html("<font id='doc_image_name1' color='green'>" + data[i].w3_thumb + "</font>");
                            $('#containerother_kyc591').empty();
                            var img = $('<img />').addClass('img').attr({
                                'id': 'myImage',
                                'src': baseurl + 'assets/images/marrige_attach/witness_thumb3/' + data[i].autono + '/' + data[i].w3_thumb,
                                'width': 50,
                            }).appendTo('#containerother_kyc591');
                        }
                    }
                } else {
                    console.log("from else of formd");
                    $.ajax({
                        type: "POST",
                        url: baseurl + "Marrige/showdatawhere",
                        data: {
                            table_name: table_name,
                            id: id,
                        },
                        dataType: "JSON",
                        async: false,
                        success: function(data) {
                            //var data = eval(data);
                            console.log(data);
                            for (var i = 0; i < data.length; i++) {
                                var condt = data[i].date_of_marrige.split("-");
                                var date = condt[2] + "/" + condt[1] + "/" + condt[0];
                                autono = data[i].id;
                                $('#notification_date51').val(date);
                                $('#wedding_place').val(data[i].wedding_place);
                                $('#husbund_name').val(data[i].c_name);
                                // autono = data[i].id;
                                $('#wife_name').val(data[i].g_previous_name);
                                $('#g_age_executed').val(data[i].c_age);
                                $('#b_age_executed').val(data[i].g_age);
                                $("#address_full").val(data[i].c_address);
                                $("#w_address_full").val(data[i].g_previous_address);
                            }
                        }
                    });
                }
            }
        });
    });
    //------------------------end of sform ----------------------------------------
    //------------------------Order letter ---------------------------------------------
    $(document).on('click', ".oletter", function() {
        $('.formhideshow').show();
        $('.tablehideshow').hide();
        $(".btnhideshow").show();
        $('#form1').hide();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').hide();
        $('#form6').show();
        $('#form8').hide();
        $('#form5').hide();
        $('#form9').hide();
        var id = $(this).attr('id');
        //get all info from marrige_registration
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/showdetailswhere",
            data: {
                table_name: 'marrige_registration',
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log('from data of marrige_registration');
                console.log(data);
                $('.c_name').text(data[0].c_name);
                $('.ce_name').text(data[0].g_name);
                $('.c_address').text(data[0].c_address);
                $('.ce_address').text(data[0].g_address);
                $('.c_tahsil').text(data[0].c_tahsil);
                $('.c_dist').text(data[0].c_dist);
                $('.g_name').text(data[0].g_previous_name);
                $('.ge_name').text(data[0].b_previous_name);
                $('.g_address').text(data[0].g_previous_address);
                $('.ge_address').text(data[0].b_previous_address);
                $('.g_tahsil').text(data[0].g_previous_tahsil);
                $('.g_dist').text(data[0].g_previous_dist);
                var vardate = data[0].date_of_marrige.split("-");
                var w_date = vardate[2] + "/" + vardate[1] + "/" + vardate[0];
                var vardate = data[0].reg_date.split("-");
                var reg_date1 = vardate[2] + "/" + vardate[1] + "/" + vardate[0];
                $('.m_date').text(w_date);
                $('.current_date_print').text(today);
                $('.reg_date').text(reg_date1);
                $('.m_address').text(data[0].wedding_place);
                $('.mr_reg').text(displayRegNo(data[0].regno));
                $('.mr_regfull').text(displayReg(data[0].regno, data[0].reg_date));
            }
        });
        //get all info from marriage_receipt
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/showreceiptnumwhere",
            data: {
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log(data);
                $('.mr_receipt').text(data[0].receipt_no);
            }
        });
        //get all info from formd
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/showphotoswhere",
            data: {
                table_name: 'formd',
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log('from data of formd');
                console.log(data);
                $('.s_name1').text(data[0].w1_name);
                $('.s_name2').text(data[0].w2_name);
                $('.s_name3').text(data[0].w3_name);
                $('.s_address1').text(data[0].w1_address);
                $('.s_address2').text(data[0].w2_address);
                $('.s_address3').text(data[0].w3_address);
                $('.hphoto').attr("src", base_url + "assets/images/marrige_attach/husband_photo/" + id + "/" + data[0].h_photo);
                $('.htphoto').attr("src", base_url + "assets/images/marrige_attach/husband_thumb/" + id + "/" + data[0].h_thumb);
                $('.gphoto').attr("src", base_url + "assets/images/marrige_attach/wife_photo/" + id + "/" + data[0].w_photo);
                $('.gtphoto').attr("src", base_url + "assets/images/marrige_attach/wife_thumb/" + id + "/" + data[0].w_thumb);
                $('.sphoto1').attr("src", base_url + "assets/images/marrige_attach/witness_photo1/" + id + "/" + data[0].w1_photo);
                $('.sphoto2').attr("src", base_url + "assets/images/marrige_attach/witness_photo2/" + id + "/" + data[0].w2_photo);
                $('.sphoto3').attr("src", base_url + "assets/images/marrige_attach/witness_photo3/" + id + "/" + data[0].w3_photo);
                $('.stphoto1').attr("src", base_url + "assets/images/marrige_attach/witness_thumb1/" + id + "/" + data[0].w1_thumb);
                $('.stphoto2').attr("src", base_url + "assets/images/marrige_attach/witness_thumb2/" + id + "/" + data[0].w2_thumb);
                $('.stphoto3').attr("src", base_url + "assets/images/marrige_attach/witness_thumb3/" + id + "/" + data[0].w3_thumb);
            }
        });
    });
    //------------------------end of Order letter ----------------------------------------
    //------------------------ Certificate ---------------------------------------------
    $(document).on('click', ".certificate", function() {
        $('.formhideshow').show();
        $('.tablehideshow').hide();
        $(".btnhideshow").show();
        $('#form1').hide();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').hide();
        $('#form6').hide();
        $('#form8').show();
        $('#form5').hide();
        $('#form9').hide();
        var id = $(this).attr('id');
        var today = new Date(getServerTime());
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today = dd + '/' + mm + '/' + yyyy;
        var base_url = $("#base_url").val();
        base_url = base_url.trim();
        //get all info from marrige_registration
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/showdetailswhere",
            data: {
                table_name: 'marrige_registration',
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log('from data of marrige_registration');
                console.log(data);
                $('.c_name').text(data[0].c_name);
                $('.ce_name').text(data[0].g_name);
                $('.c_address').text(data[0].c_address);
                $('.ce_address').text(data[0].g_address);
                $('.c_tahsil').text(data[0].c_tahsil);
                $('.c_dist').text(data[0].c_dist);
                $('.g_name').text(data[0].g_previous_name);
                $('.ge_name').text(data[0].b_previous_name);
                $('.g_address').text(data[0].g_previous_address);
                $('.ge_address').text(data[0].b_previous_address);
                $('.g_tahsil').text(data[0].g_previous_tahsil);
                $('.g_dist').text(data[0].g_previous_dist);
                var hdate = data[0].c_birth_date.split("-");
                var hdob = hdate[2] + "/" + hdate[1] + "/" + hdate[0];
                var wdate = data[0].g_birth_date.split("-");
                var wdob = wdate[2] + "/" + wdate[1] + "/" + wdate[0];
                var vardate = data[0].date_of_marrige.split("-");
                var w_date = vardate[2] + "/" + vardate[1] + "/" + vardate[0];
                var vardate = data[0].reg_date.split("-");
                var reg_date1 = vardate[2] + "/" + vardate[1] + "/" + vardate[0];
                $('.m_date').text(w_date);
                $('.current_date_print').text(today);
                $('.reg_date').text(reg_date1);
                var modifydate = data[0].modify_date.split(" ");
                var modifydate = modifydate[0].split("-");
                var modifydate = modifydate[2] + "/" + modifydate[1] + "/" + modifydate[0];
                if (reg_date1 == modifydate) {
                    $('.modify_date').text("");
                } else {
                    $('.modify_date').text("Updated on " + modifydate);
                }
                $('.w_dob').text(wdob);
                $('.h_dob').text(hdob);
                $('.m_address').text(data[0].wedding_place);
                $('.me_address').text(data[0].marrige_address);
                $('.mr_reg').text(displayRegNo(data[0].regno));
                $('.mr_regfull').text(displayReg(data[0].regno, data[0].reg_date));
                var svnk = parseInt(data[0].regno);
                svnk = vardate[0] + '/' + svnk;
                $('.svnk').text(svnk);
            }
        });
        //get all info from marriage_receipt
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/showreceiptnumwhere",
            data: {
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log('id ' + id);
                console.log(data);
                var vardate = data[0].receipt_date.split("-");
                var reg_date1 = vardate[2] + "/" + vardate[1] + "/" + vardate[0];
                $('.current_date_print').text(reg_date1);
                $('.mr_receipt').text(data[0].receipt_no);
            }
        });
        //get all info from formd
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/showphotoswhere",
            data: {
                table_name: 'formd',
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log('from data of formd');
                console.log(data);
                $('.s_name1').text(data[0].w1_name);
                $('.s_name2').text(data[0].w2_name);
                $('.s_name3').text(data[0].w3_name);
                $('.s_address1').text(data[0].w1_address);
                $('.s_address2').text(data[0].w2_address);
                $('.s_address3').text(data[0].w3_address);
                $('.hphoto').attr("src", base_url + "assets/images/marrige_attach/husband_photo/" + id + "/" + data[0].h_photo);
                $('.htphoto').attr("src", base_url + "assets/images/marrige_attach/husband_thumb/" + id + "/" + data[0].h_thumb);
                $('.gphoto').attr("src", base_url + "assets/images/marrige_attach/wife_photo/" + id + "/" + data[0].w_photo);
                $('.gtphoto').attr("src", base_url + "assets/images/marrige_attach/wife_thumb/" + id + "/" + data[0].w_thumb);
                $('.sphoto1').attr("src", base_url + "assets/images/marrige_attach/witness_photo1/" + id + "/" + data[0].w1_photo);
                $('.sphoto2').attr("src", base_url + "assets/images/marrige_attach/witness_photo2/" + id + "/" + data[0].w2_photo);
                $('.sphoto3').attr("src", base_url + "assets/images/marrige_attach/witness_photo3/" + id + "/" + data[0].w3_photo);
                $('.stphoto1').attr("src", base_url + "assets/images/marrige_attach/witness_thumb1/" + id + "/" + data[0].w1_thumb);
                $('.stphoto2').attr("src", base_url + "assets/images/marrige_attach/witness_thumb2/" + id + "/" + data[0].w2_thumb);
                $('.stphoto3').attr("src", base_url + "assets/images/marrige_attach/witness_thumb3/" + id + "/" + data[0].w3_thumb);
            }
        });
    });
    //------------------------end of Certificate ----------------------------------------
    //------------------------upload ---------------------------------------------
    $(document).on('click', ".upload", function() {
        $('.formhideshow').show();
        $('.tablehideshow').hide();
        $(".btnhideshow").show();
        $('#master_form9')[0].reset();
        $('#form9').show();
        $("#file_attachother9_1").val('');
        $("#msg9_1").html('');
        $("#file_attachother9_2").val('');
        $("#msg9_2").html('');
        $("#file_attachother9_3").val('');
        $("#msg9_3").html('');
        $("#file_attachother9_4").val('');
        $("#msg9_4").html('');
        $("#file_attachother9_5").val('');
        $("#msg9_5").html('');
        $("#download1").html('');
        $("#download2").html('');
        $("#download3").html('');
        $("#download4").html('');
        $("#download5").html('');
        table_name = "marrige_registration";
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/showdatawhere",
            data: {
                table_name: table_name,
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {
                    $('#ref_id_upload').val(data[i].id);
                }
                $.ajax({
                    type: "POST",
                    url: baseurl + "Marrige/showdatawhere_upload",
                    data: {
                        id: id,
                    },
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        var data = eval(data);
                        var download1 = "";
                        var download2 = "";
                        var download3 = "";
                        var download4 = "";
                        var download5 = "";
                        for (var i = 0; i < data.length; i++) {
                            var f_1 = data[i].f_1;
                            var f_2 = data[i].f_2;
                            var f_3 = data[i].f_3;
                            var f_4 = data[i].f_4;
                            var f_5 = data[i].f_5;
                            $('#id_upload').val(data[i].id);
                            $('#order_latter').val(data[i].t_1);
                            $('#sample_e_marathi').val(data[i].t_2);
                            $('#sample_e_english').val(data[i].t_3);
                            $('#abstract_1').val(data[i].t_4);
                            $('#abstract_2').val(data[i].t_5);
                            $('#file_attachother9_1').val(f_1);
                            $("#msg9_1").html("<font id='doc_image_name1' color='green'>" + f_1 + "</font>");
                            $('#file_attachother9_2').val(f_2);
                            $("#msg9_2").html("<font id='doc_image_name1' color='green'>" + f_2 + "</font>");
                            $('#file_attachother9_3').val(f_3);
                            $("#msg9_3").html("<font id='doc_image_name1' color='green'>" + f_3 + "</font>");
                            $('#file_attachother9_4').val(f_4);
                            $("#msg9_4").html("<font id='doc_image_name1' color='green'>" + f_4 + "</font>");
                            $('#file_attachother9_5').val(f_5);
                            $("#msg9_5").html("<font id='doc_image_name1' color='green'>" + f_5 + "</font>");
                            if (f_1 != '') {
                                download1 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download1 = '';
                            }
                            if (f_2 != '') {
                                download2 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download2 = '';
                            }
                            if (f_3 != '') {
                                download3 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download3 = '';
                            }
                            if (f_4 != '') {
                                download4 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download4 = '';
                            }
                            if (f_5 != '') {
                                download5 = '<i class="fa fa-download" aria-hidden="true"></i>';
                            } else {
                                download5 = '';
                            }
                            $("#download1").html('<a href=' + baseurl + 'Marrige/download2/' + f_1 + '>' + download1 + '</a>');
                            $("#download2").html('<a href=' + baseurl + 'Marrige/download2/' + f_2 + '>' + download2 + '</a>');
                            $("#download3").html('<a href=' + baseurl + 'Marrige/download2/' + f_3 + '>' + download3 + '</a>');
                            $("#download4").html('<a href=' + baseurl + 'Marrige/download2/' + f_4 + '>' + download4 + '</a>');
                            $("#download5").html('<a href=' + baseurl + 'Marrige/download2/' + f_5 + '>' + download5 + '</a>');
                        }
                    }
                });
            }
        });
    });
    //------------------------end of upload ----------------------------------------
    //------------------------------upload form submit start------------------------------------------------
    $(document).on("submit", "#master_form9", function(e) {
        e.preventDefault();
        var table_name = "marrige_upload";
        var ref_id = $('#ref_id_upload').val();
        var f_1 = $('#file_attachother9_1').val();
        var f_2 = $('#file_attachother9_2').val();
        var f_3 = $('#file_attachother9_3').val();
        var f_4 = $('#file_attachother9_4').val();
        var f_5 = $('#file_attachother9_5').val();
        var t_1 = $('#order_latter').val();
        var t_2 = $('#sample_e_marathi').val();
        var t_3 = $('#sample_e_english').val();
        var t_4 = $('#abstract_1').val();
        var t_5 = $('#abstract_2').val();
        var id = $('#id_upload').val();
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/add_upload",
            data: {
                id: id,
                ref_id: ref_id,
                f_1: f_1,
                f_2: f_2,
                f_3: f_3,
                f_4: f_4,
                f_5: f_5,
                t_1: t_1,
                t_2: t_2,
                t_3: t_3,
                t_4: t_4,
                t_5: t_5,
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                if (data == true) {
                    if (id == "") {
                        successTost("Upload Certificate Saved Successfully");
                    } else {
                        successTost("Upload Certificate Updated Successfully");
                    }
                } else {
                    errorTost("Something Wrong", "error");
                }
                $('#master_form9')[0].reset();
                $('#form9').hide();
                $(".closehideshow").trigger('click');
                $(".tablehideshow").show();
                datashow();
            }
        });
    });
    //------------------------------upload form submit end------------------------------------------------
    //-----------------------edit data code start-----------------------------------
    $(document).on("click", ".edit_data", function() {
        $('.formhideshow').show();
        $('.tablehideshow').hide();
        $(".btnhideshow").show();
        $('#form1').show();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').hide();
        $('#form5').hide();
        $('#form6').hide();
        $('#form8').hide();
        $('#form9').hide();
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: baseurl + "Marrige/showdatawhere",
            data: {
                table_name: table_name,
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {
                    var fdateval = data[i].date_of_marrige;
                    var fdateslt = fdateval.split('-');
                    var date_of_marrige1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].c_birth_date;
                    var fdateslt = fdateval.split('-');
                    var c_birth_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].g_birth_date;
                    var fdateslt = fdateval.split('-');
                    var g_birth_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    if (date_of_marrige1 == "00/00/0000") {
                        date_of_marrige1 = "";
                    }
                    if (c_birth_date1 == "00/00/0000") {
                        c_birth_date1 = "";
                    }
                    if (g_birth_date1 == "00/00/0000") {
                        g_birth_date1 = "";
                    }
                    $('#child_aadharcard_no').val(data[i].child_aadhar_no);
                    $('#girl_aadharcard_number').val(data[i].girl_aadhar_no);
                    $('#zone').val(data[i].zone);
                    $('#ward_area').val(data[i].ward);
                    $('#groom_contact_no').val(data[i].g_contact);
                    $('#bride_contact_no').val(data[i].b_contact);
                    $('#groom_name').val(data[i].g_name);
                    $('#child_name').val(data[i].c_name);
                    $('#g_address').val(data[i].g_address);
                    $('#c_address').val(data[i].c_address);
                    $('#groom_tahsil').val(data[i].g_tahsil);
                    $('#child_tahsil').val(data[i].c_tahsil);
                    $('#groom_dist').val(data[i].g_dist);
                    $('#child_dist').val(data[i].c_dist);
                    $('#bride_previousname').val(data[i].b_previous_name);
                    $('#girl_previousname').val(data[i].g_previous_name);
                    $('#bride_previousnadd').val(data[i].b_previous_address);
                    $('#girl_previousadd').val(data[i].g_previous_address);
                    $('#bride_previoustahsil').val(data[i].b_previous_tahsil);
                    $('#girl_previoustahsil').val(data[i].g_earlier_tahsil);
                    $('#bride_previousdist').val(data[i].b_previous_dist);
                    $('#girl_previousdist').val(data[i].g_previous_dist);
                    $('#marriage_add').val(data[i].marrige_address);
                    $('#wedding_add').val(data[i].wedding_place);
                    $('#date_of_marrige').val(date_of_marrige1);
                    $('#c_birth_date').val(c_birth_date1);
                    $('#g_birth_date').val(g_birth_date1);
                    $('#child_age').val(data[i].c_age);
                    $('#girl_age').val(data[i].g_age);
                    $('#save_update').val(id);
                    autono = data[i].autono;
                    bil = data[i].regno;
                }
            }
        });
    });
    //-------------------------------check box change events start------------------------------------------------
    $('#ch_1').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_1").val(1);
            $("#attachment1").show();
        } else {
            $("#attachment1").hide();
            $("#ch_1").val(0);
            $("#file_attachother1").val('');
        }
    });
    $('#ch_2').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_2").val(1);
            $("#attachment2").show();
        } else {
            $("#attachment2").hide();
            $("#ch_2").val(0);
            $("#file_attachother2").val('');
        }
    });
    $('#ch_3_1').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_3_1").val(1);
            $("#attachment3_1").show();
        } else {
            $("#attachment3_1").hide();
            $("#ch_3_1").val(0);
            $("#file_attachother3_1").val('');
        }
    });
    $('#ch_3_2').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_3_2").val(1);
            $("#attachment3_2").show();
        } else {
            $("#attachment3_2").hide();
            $("#ch_3_2").val(0);
            $("#file_attachother3_2").val('');
        }
    });
    $('#ch_3_3').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_3_3").val(1);
            $("#attachment3_3").show();
        } else {
            $("#attachment3_3").hide();
            $("#ch_3_3").val(0);
            $("#file_attachother3_3").val('');
        }
    });
    $('#ch_4_1').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_4_1").val(1);
            $("#attachment4_1").show();
        } else {
            $("#attachment4_1").hide();
            $("#ch_4_1").val(0);
            $("#file_attachother4_1").val('');
        }
    });
    $('#ch_4_2').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_4_2").val(1);
            $("#attachment4_2").show();
        } else {
            $("#attachment4_2").hide();
            $("#ch_4_2").val(0);
            $("#file_attachother4_2").val('');
        }
    });
    $('#ch_5').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_5").val(1);
            $("#attachment5").show();
        } else {
            $("#attachment5").hide();
            $("#ch_5").val(0);
            $("#file_attachother5").val('');
        }
    });
    $('#ch_6_1').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_6_1").val(1);
            $("#attachment6_1").show();
        } else {
            $("#attachment6_1").hide();
            $("#ch_6_1").val(0);
            $("#file_attachother6_1").val('');
        }
    });
    $('#ch_6_2').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_6_2").val(1);
            $("#attachment6_2").show();
        } else {
            $("#attachment6_2").hide();
            $("#ch_6_2").val(0);
            $("#file_attachother6_2").val('');
        }
    });
    $('#ch_6_3').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_6_3").val(1);
            $("#attachment6_3").show();
        } else {
            $("#attachment6_3").hide();
            $("#ch_6_3").val(0);
            $("#file_attachother6_3").val('');
        }
    });
    $('#ch_6_4').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_6_4").val(1);
            $("#attachment6_4").show();
        } else {
            $("#attachment6_4").hide();
            $("#ch_6_4").val(0);
            $("#file_attachother6_4").val('');
        }
    });
    $('#ch_7_1').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_7_1").val(1);
            $("#attachment7_1").show();
        } else {
            $("#attachment7_1").hide();
            $("#ch_7_1").val(0);
            $("#file_attachother7_1").val('');
        }
    });
    $('#ch_7_2').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_7_2").val(1);
            $("#attachment7_2").show();
        } else {
            $("#attachment7_2").hide();
            $("#ch_7_2").val(0);
            $("#file_attachother7_2").val('');
        }
    });
    $('#ch_8_1').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_8_1").val(1);
            $("#attachment8_1").show();
        } else {
            $("#attachment8_1").hide();
            $("#ch_8_1").val(0);
            $("#file_attachother8_1").val('');
        }
    });
    $('#ch_8_2').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_8_2").val(1);
            $("#attachment8_2").show();
        } else {
            $("#attachment8_2").hide();
            $("#ch_8_2").val(0);
            $("#file_attachother8_2").val('');
        }
    });
    $('#ch_9').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_9").val(1);
            $("#attachment9").show();
        } else {
            $("#attachment9").hide();
            $("#ch_9").val(0);
            $("#file_attachother9").val('');
        }
    });
    $('#ch_10').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_10").val(1);
            $("#attachment10").show();
        } else {
            $("#attachment10").hide();
            $("#ch_10").val(0);
            $("#file_attachother10").val('');
        }
    });
    $('#ch_11').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_11").val(1);
            $("#attachment11").show();
        } else {
            $("#attachment11").hide();
            $("#ch_11").val(0);
            $("#file_attachother11").val('');
        }
    });
    $('#ch_12_1').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_12_1").val(1);
            $("#attachment12_1").show();
        } else {
            $("#ch_12_1").val(0);
            $("#attachment12_1").hide();
            $("#file_attachother12_1").val('');
        }
    });
    $('#ch_12_2').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_12_2").val(1);
            $("#attachment12_2").show();
        } else {
            $("#ch_12_2").val(0);
            $("#attachment12_2").hide();
            $("#file_attachother12_2").val('');
        }
    });
    $('#ch_12_3').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_12_3").val(1);
            $("#attachment12_3").show();
        } else {
            $("#ch_12_3").val(0);
            $("#attachment12_3").hide();
            $("#file_attachother12_3").val('');
        }
    });
    $('#ch_12_4').change(function() {
        if ($(this).is(":checked")) {
            $("#ch_12_4").val(1);
            $("#attachment12_4").show();
        } else {
            $("#ch_12_4").val(0);
            $("#attachment12_4").hide();
            $("#file_attachother12_4").val('');
        }
    });
    //-------------------------------check box change events end----------------------------------------------------
    //------------------------------ajax file upload start----------------------------------------------------------
    $('#attachment1').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload1',
        'onStart': function() { $("#msg1").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg1").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother1").val(response);
                $("#msg1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother1").val(response);
                $("#msg1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment2').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload2',
        'onStart': function() { $("#msg2").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg2").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother2").val(response);
                $("#msg2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother2").val(response);
                $("#msg2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment3_1').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload3_1',
        'onStart': function() { $("#msg3_1").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg3_1").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother3_1").val(response);
                $("#msg3_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother3_1").val(response);
                $("#msg3_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment3_2').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload3_2',
        'onStart': function() { $("#msg3_2").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg3_2").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother3_2").val(response);
                $("#msg3_2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother3_2").val(response);
                $("#msg3_2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment3_3').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload3_3',
        'onStart': function() { $("#msg3_3").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg3_3").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother3_3").val(response);
                $("#msg3_3").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother3_3").val(response);
                $("#msg3_3").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment4_1').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload4_1',
        'onStart': function() { $("#msg4_1").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg4_1").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother4_1").val(response);
                $("#msg4_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother4_1").val(response);
                $("#msg4_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment4_2').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload4_2',
        'onStart': function() { $("#msg4_2").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg4_2").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother4_2").val(response);
                $("#msg4_2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother4_2").val(response);
                $("#msg4_2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment5').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload5',
        'onStart': function() { $("#msg5").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg5").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother5").val(response);
                $("#msg5").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother5").val(response);
                $("#msg5").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment6_1').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload6_1',
        'onStart': function() { $("#msg6_1").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg6_1").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother6_1").val(response);
                $("#msg6_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother6_1").val(response);
                $("#msg6_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment6_2').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload6_2',
        'onStart': function() { $("#msg6_2").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg6_2").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother6_2").val(response);
                $("#msg6_2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother6_2").val(response);
                $("#msg6_2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment6_3').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload6_3',
        'onStart': function() { $("#msg6_3").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg6_3").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother6_3").val(response);
                $("#msg6_3").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother6_3").val(response);
                $("#msg6_3").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment6_4').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload6_4',
        'onStart': function() { $("#msg6_4").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg6_4").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother6_4").val(response);
                $("#msg6_4").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother6_4").val(response);
                $("#msg6_4").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment7_1').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload7_1',
        'onStart': function() { $("#msg7_1").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg7_1").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother7_1").val(response);
                $("#msg7_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother7_1").val(response);
                $("#msg7_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment7_2').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload7_2',
        'onStart': function() { $("#msg7_2").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg7_2").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother7_2").val(response);
                $("#msg7_2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother7_2").val(response);
                $("#msg7_2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment8_1').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload8_1',
        'onStart': function() { $("#msg8_1").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg8_1").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother8_1").val(response);
                $("#msg8_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother8_1").val(response);
                $("#msg8_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment8_2').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload8_2',
        'onStart': function() { $("#msg8_2").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg8_2").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother8_2").val(response);
                $("#msg8_2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment9').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload9',
        'onStart': function() { $("#msg9").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg9").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother9").val(response);
                $("#msg9").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment10').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload10',
        'onStart': function() { $("#msg10").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg10").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother10").val(response);
                $("#msg10").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment11').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload11',
        'onStart': function() { $("#msg11").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg11").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother11").val(response);
                $("#msg11").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment12_1').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload12_1',
        'onStart': function() { $("#msg12_1").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg12_1").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother12_1").val(response);
                $("#msg12_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment12_2').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload12_2',
        'onStart': function() { $("#msg12_2").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg12_2").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother12_2").val(response);
                $("#msg12_2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment12_3').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload12_3',
        'onStart': function() { $("#msg12_3").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg12_3").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother12_3").val(response);
                $("#msg12_3").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment12_4').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload12_4',
        'onStart': function() { $("#msg12_4").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg12_4").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother12_4").val(response);
                $("#msg12_4").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment9_1').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload9_1',
        'onStart': function() { $("#msg9_1").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg9_1").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother9_1").val(response);
                $("#msg9_1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment9_2').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload9_2',
        'onStart': function() { $("#msg9_2").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg9_2").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother9_2").val(response);
                $("#msg9_2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment9_3').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload9_3',
        'onStart': function() { $("#msg9_3").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg9_3").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother9_3").val(response);
                $("#msg9_3").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment9_4').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload9_4',
        'onStart': function() { $("#msg9_4").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg9_4").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother9_4").val(response);
                $("#msg9_4").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    $('#attachment9_5').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload9_5',
        'onStart': function() { $("#msg9_5").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg9_5").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother9_5").val(response);
                $("#msg9_5").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                /*$('#containerother_kyc1').empty();
                 var url = getRootUrl();
                 var img = $('<img />').addClass('img').attr({
                     'id': 'myImage',
                     'src': baseurl + 'assets/images/add_call_doc/' + response,
                     'width': 50,
                 }).appendTo('#containerother_kyc1');*/
            }
        }
    });
    //------------------------------ajax file upload end------------------------------------------------------------
    //---------------------------------form d image start----------------------------------------------------------------------
    $('#uploadFile51').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload51',
        'onStart': function() { $("#msg51").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg51").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother51").val(response);
                $("#msg51").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                $('#containerother_kyc51').empty();
                //   var url = getRootUrl();
                var id2 = $("#atc_photo").val();
                var img = $('<img />').addClass('img').attr({
                    'id': 'myImage',
                    'src': baseurl + 'assets/images/marrige_attach/husband_photo/' + id2 + '/' + response,
                    'width': 50,
                }).appendTo('#containerother_kyc51');
            }
        }
    });
    $('#uploadFile52').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload52',
        'onStart': function() { $("#msg52").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg52").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother52").val(response);
                $("#msg52").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                $('#containerother_kyc52').empty();
                var id2 = $("#atc_photo").val();
                var img = $('<img />').addClass('img').attr({
                    'id': 'myImage',
                    'src': baseurl + 'assets/images/marrige_attach/husband_thumb/' + id2 + '/' + response,
                    'width': 50,
                }).appendTo('#containerother_kyc52');
            }
        }
    });
    $('#uploadFile53').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload53',
        'onStart': function() { $("#msg53").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg53").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother53").val(response);
                $("#msg53").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                $('#containerother_kyc53').empty();
                var id2 = $("#atc_photo").val();
                var img = $('<img />').addClass('img').attr({
                    'id': 'myImage',
                    'src': baseurl + 'assets/images/marrige_attach/wife_photo/' + id2 + '/' + response,
                    'width': 50,
                }).appendTo('#containerother_kyc53');
            }
        }
    });
    $('#uploadFile54').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload54',
        'onStart': function() { $("#msg54").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg54").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother54").val(response);
                $("#msg54").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                $('#containerother_kyc54').empty();
                var id2 = $("#atc_photo").val();
                var img = $('<img />').addClass('img').attr({
                    'id': 'myImage',
                    'src': baseurl + 'assets/images/marrige_attach/wife_thumb/' + id2 + '/' + response,
                    'width': 50,
                }).appendTo('#containerother_kyc54');
            }
        }
    });
    $('#uploadFile55').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload55',
        'onStart': function() { $("#msg55").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg55").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother55").val(response);
                $("#msg55").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                $('#containerother_kyc55').empty();
                var id2 = $("#atc_photo").val();
                var img = $('<img />').addClass('img').attr({
                    'id': 'myImage',
                    'src': baseurl + 'assets/images/marrige_attach/witness_photo1/' + id2 + '/' + response,
                    'width': 50,
                }).appendTo('#containerother_kyc55');
            }
        }
    });
    $('#uploadFile56').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload56',
        'onStart': function() { $("#msg56").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg56").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother56").val(response);
                $("#msg56").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                $('#containerother_kyc56').empty();
                var id2 = $("#atc_photo").val();
                var img = $('<img />').addClass('img').attr({
                    'id': 'myImage',
                    'src': baseurl + 'assets/images/marrige_attach/witness_thumb1/' + id2 + '/' + response,
                    'width': 50,
                }).appendTo('#containerother_kyc56');
            }
        }
    });
    $('#uploadFile57').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload57',
        'onStart': function() { $("#msg57").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg57").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother57").val(response);
                $("#msg57").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                $('#containerother_kyc57').empty();
                var id2 = $("#atc_photo").val();
                var img = $('<img />').addClass('img').attr({
                    'id': 'myImage',
                    'src': baseurl + 'assets/images/marrige_attach/witness_photo2/' + id2 + '/' + response,
                    'width': 50,
                }).appendTo('#containerother_kyc57');
            }
        }
    });
    $('#uploadFile58').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload58',
        'onStart': function() { $("#msg58").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg58").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother58").val(response);
                $("#msg58").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                $('#containerother_kyc58').empty();
                var id2 = $("#atc_photo").val();
                var img = $('<img />').addClass('img').attr({
                    'id': 'myImage',
                    'src': baseurl + 'assets/images/marrige_attach/witness_thumb2/' + id2 + '/' + response,
                    'width': 50,
                }).appendTo('#containerother_kyc58');
            }
        }
    });
    $('#uploadFile59').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload59',
        'onStart': function() { $("#msg59").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg59").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother59").val(response);
                $("#msg59").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                $('#containerother_kyc59').empty();
                var id2 = $("#atc_photo").val();
                var img = $('<img />').addClass('img').attr({
                    'id': 'myImage',
                    'src': baseurl + 'assets/images/marrige_attach/witness_photo3/' + id2 + '/' + response,
                    'width': 50,
                }).appendTo('#containerother_kyc59');
            }
        }
    });
    $('#uploadFile591').ajaxfileupload({
        'action': baseurl + 'Marrige/doc_image_upload591',
        'onStart': function() { $("#msg591").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg591").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother591").val(response);
                $("#msg591").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                // $("#image_name").val(response);
                $('#containerother_kyc591').empty();
                var id2 = $("#atc_photo").val();
                var img = $('<img />').addClass('img').attr({
                    'id': 'myImage',
                    'src': baseurl + 'assets/images/marrige_attach/witness_thumb3/' + id2 + '/' + response,
                    'width': 50,
                }).appendTo('#containerother_kyc591');
            }
        }
    });
    //------------------------------form d image end------------------------------------------------------------
    $(document).on('click', '.viewdetailsbtn', function() {
        console.log('Inside viewdetailsbtn');
        datashow();
    });
    //------------------------------get datewise receipt------------------------------------------------------------
    // $(document).on('click', '#getDatewiseReceiptbtn', function () {
    //     var d= new Date(getServerTime());
    //     var month=d.getMonth()+1;
    //     if(month<10){
    //         month='0'+month;
    //     }else{
    //         month=month;
    //     }
    //     var date = d.getFullYear() + "-" + month + "-" + d.getDate();
    //     $.ajax({
    //         type: "POST",
    //         url: baseurl + "Marrige/showDatewiseReceipt",
    //         data: {
    //             date: date,
    //         },
    //         dataType: "JSON",
    //         async: false,
    //         success: function (data) {
    //         }
    //     });
    // });
});