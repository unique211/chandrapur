$(document).ready(function() {
    function getServerTime() {
        return $.ajax({ async: false }).getResponseHeader('Date');
    }
    var table_name = "cash_counter";
    datashow();
    var d = new Date(getServerTime());
    console.log(d);
    var month = d.getMonth() + 1;
    var day = d.getDate();
    console.log(day);
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
    $(document).on("submit", "#filter_form", function(e) {
        e.preventDefault();
        var from1 = $("#fdate").val();
        var to1 = $("#tdate").val();
        var staff_filter = $("#staff_filter").val();
        var dateslt = from1.split('/');
        var from = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = to1.split('/');
        var to = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        // alert("From:" + from + "to:" + to);
        $('#myTable2 tbody').html('');
        $.ajax({
            type: "POST",
            url: baseurl + "CashCounter/showdata_filtered",
            data: {
                table_name: table_name,
                from: from,
                to: to,
                staff_filter: staff_filter,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if ($.fn.DataTable.isDataTable('#myTable2')) {
                    $('#myTable2').DataTable().destroy();
                }
                $('#myTable2 tbody').empty();
                console.log('data from show filter_data'); //+ data);
                console.log(data);
                var data = eval(data);
                var html = '';
                html += '<table id="myTable2" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                    '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                    '<th><font style="font-weight:bold">Date of Receipt</font></th>' +
                    '<th><font style="font-weight:bold">Document Details</font></th>' +
                    '<th><font style="font-weight:bold">Document Quantity</font></th>' +
                    '<th><font style="font-weight:bold">Received From</font></th>' +
                    '<th><font style="font-weight:bold">Amount</font></th>' +
                    '<th><font style="font-weight:bold">Function</font></th>' +
                    '<th><font style="font-weight:bold">Mode of Receipt</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                var index = 1;
                for (var i = 0; i < data.length; i++) {
                    var fdateval = data[i].receipt_date;
                    var fdateslt = fdateval.split('-');
                    var date_of_receipt = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var readonly = '';
                    html += '<tr>' +
                        '<td>' + index + '</td>' +
                        '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +
                        '<td id="name_' + data[i].id + '">' + date_of_receipt + '</td>' +
                        '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +
                        '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].counter_no + '</td>' +
                        '<td id="date1_' + data[i].id + '">' + data[i].receive_from + '</td>' +
                        '<td id="date1_' + data[i].id + '">' + data[i].amt + '</td>' +
                        '<td id="_' + data[i].id + '">' + data[i].function+'</td>' +
                        '<td id="_' + data[i].id + '">' + data[i].mode + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=edit_' + data[i].id + '><i class="fa fa-edit"></i></button></td>' +
                        '</tr>';
                    index++;
                }

                html += '</tbody></table>';
                var uname = $('.profile-data-name').text();
                $('#show_master').html(html);
                $('#myTable2').DataTable({
                    dom: 'Bfrtip',
                    buttons: [

                        {
                            extend: 'excelHtml5',
                            title: 'Cash Counter List from ' + from1 + ' to ' + to1 + ' User: ' + uname,
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Cash Counter List from ' + from1 + ' to ' + to1 + ' User: ' + uname,
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            },
                            customize: function(win) {
                                $(win.document.body)
                                    .css('font-size', '11px');
                                $(win.document.body).find('table')
                                    .css('font-size', '11px');
                                $(win.document.body).find('h1').css('font-size', '14pt')
                                    .css('text-align', 'center');
                                $(win.document.body).find('table')
                                    .removeClass('table-striped').removeClass('dataTable');
                            }
                        }
                    ]
                });
            }
        });
    });
    $(document).on('change', '#receipt_date', function() {
        // Does some stuff and logs the event to the console
        var receipt_date = $("#receipt_date").val();
        $("#bill_date").val(receipt_date);
    });
    $(".btnhideshow").click(function() {
        // alert("hide");
        $(".tablehideshow").hide();
        $(".formhideshow").show();
        $("#form4").show();
        var id = $('#formbtn4').val();
        console.log(id);
        // if (id == '')
        //     getbillno();
    });
    //getbillno();
    function getbillno() {
        var d = new Date(getServerTime());
        var year = d.getFullYear();
        var mid = 'CMCCR';
        var receiptno = 14160;
        $.ajax({
            type: 'POST',
            url: baseurl + "CashCounter/getMaxReceipt",
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
        // if(receiptno<=14159 && year ==2019)
        // receiptno = 14160;
        // else
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
    $(document).on('blur', "#receipt_no", function() {
        $('#bill_no').val($('#receipt_no').val());
    });
    $(document).on('blur', "#amt", function() {
        var amt = $('#amt').val();
        $('#amt_words').val(convertNumberToWords(amt));
        $('#payble').val(amt);
        $('#receive_amt').val(amt);
        $('#total').val(amt);
        $('#amt2').val(amt);
    });
    $(document).on('change', "#function", function() {
        var functions = $("#function option:selected").text();
        $('#details').val(functions);
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
    //-----------------------------submit receipt-----------------------------
    $(document).on("submit", "#master_form4", function(e) {
        e.preventDefault();
        var table_name = "cash_counter";
        var id = $('#formbtn4').val();
        var ref_id = $('#ref_id4').val();
        var receipt_no = $('#receipt_no').val();
        if (receipt_no != '') {
            var temp = receipt_no.split('CMCCR');
            var year = temp[0];
            var num = temp[1];
        } else {
            var d = new Date(getServerTime());
            var year = d.getFullYear();;
            var num = 0;
        }
        console.log('year ' + year + ' num ' + num);
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
        $.ajax({
            type: "POST",
            url: baseurl + "CashCounter/adddata",
            data: {
                id: id,
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
                year: year,
                num: num,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                data = eval(data);
                if (data['ret_id'] == '0') {
                    errorTost("Something Wrong", "error");
                } else {
                    if (id == "") {
                        successTost("Record Saved Successfully");
                        swal('New Receipt', 'new receipt no is ' + data['receipt_no']);
                        $('#receipt_no').val(data['receipt_no']);
                        $('#bill_no').val(data['receipt_no']);
                        $("#formbtn4").val(data['ret_id']);
                        $("#btnprint2").val(data['ret_id']);
                    } else {
                        successTost("Record Updated Successfully");
                    }
                    // $(':input', '#master_form4')
                    //     .not(':button, :submit, :reset, :hidden')
                    //     .val('')
                    //     .removeAttr('checked')
                    //     .removeAttr('selected');
                }
            },
            error: function() {
                console.log('from error');
            }
        });
        // $(".tablehideshow").show();
        // $(".formhideshow").hide();
        // $("#form4").hide();
        // $('#formbtn4').val('');
        // datashow();
    });
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        var from1 = $("#fdate").val();
        var to1 = $("#tdate").val();
        $.ajax({
            type: "POST",
            url: baseurl + "CashCounter/showdata",
            data: {
                table_name: table_name,
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
                html += '<table id="myTable2" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                    '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                    '<th><font style="font-weight:bold">Date of Receipt</font></th>' +
                    '<th><font style="font-weight:bold">Document Details</font></th>' +
                    '<th><font style="font-weight:bold">Document Quantity</font></th>' +
                    '<th><font style="font-weight:bold">Received From</font></th>' +
                    '<th><font style="font-weight:bold">Amount</font></th>' +
                    '<th><font style="font-weight:bold">Function</font></th>' +
                    '<th><font style="font-weight:bold">Mode of Receipt</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                var index = 1;
                for (var i = 0; i < data.length; i++) {
                    var fdateval = data[i].receipt_date;
                    var fdateslt = fdateval.split('-');
                    var date_of_receipt = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var readonly = '';
                    html += '<tr>' +
                        '<td>' + index + '</td>' +
                        '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +
                        '<td id="name_' + data[i].id + '">' + date_of_receipt + '</td>' +
                        '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +
                        '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].counter_no + '</td>' +
                        '<td id="date1_' + data[i].id + '">' + data[i].receive_from + '</td>' +
                        '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                        '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +
                        '<td id="mode_' + data[i].id + '">' + data[i].mode + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=edit_' + data[i].id + '><i class="fa fa-edit"></i></button></td>' +
                        '</tr>';
                    index++;
                }
                html += '</tbody></table>';
                var uname = $('.profile-data-name').text();
                $('#show_master').html(html);
                $('#myTable2').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            title: 'Cash Counter List from ' + from1 + ' to ' + to1 + ' User: ' + uname,
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Cash Counter List from ' + from1 + ' to ' + to1 + ' User: ' + uname,
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            },
                            customize: function(win) {
                                $(win.document.body)
                                    .css('font-size', '11px');
                                $(win.document.body).find('table')
                                    .css('font-size', '11px');
                                $(win.document.body).find('h1').css('font-size', '14pt')
                                    .css('text-align', 'center');
                                $(win.document.body).find('table')
                                    .removeClass('table-striped').removeClass('dataTable');
                            }
                        }
                    ]
                });
            }
        });
    }
    //------------------show data in the tabale code end-----------------------------------------------
    //-----------------------edit data code start-----------------------------------
    $(document).on("click", ".edit_data", function() {
        var id = $(this).attr('id');
        id = (id.split('_'))[1];
        console.log('from edit ' + id);
        $.ajax({
            type: "POST",
            url: baseurl + "CashCounter/showdatawhere",
            data: {
                table_name: table_name,
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {
                    var fdateval = data[i].receipt_date;
                    var fdateslt = fdateval.split('-');
                    var receipt_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].bill_date;
                    var fdateslt = fdateval.split('-');
                    var bill_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].chq_date;
                    var fdateslt = fdateval.split('-');
                    var chq_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    // if (date_of_marrige1 == "00/00/0000") {
                    // date_of_marrige1 = "";
                    // }
                    // if (c_birth_date1 == "00/00/0000") {
                    // c_birth_date1 = "";
                    // }
                    // if (g_birth_date1 == "00/00/0000") {
                    // g_birth_date1 = "";
                    // }
                    $('#receipt_no').val(data[i].receipt_no);
                    $('#receipt_date').val(receipt_date);
                    $('#collection_no').val(data[i].collection_no);
                    $('#counter_no').val(data[i].counter_no);
                    $('#receive_from').val(data[i].receive_from);
                    $('#amt').val(data[i].amt);
                    $('#amt_words').val(data[i].amt_words);
                    $('#function').val(data[i].function);
                    $('#mode').val(data[i].mode);
                    $('#amt2').val(data[i].amt2);
                    $('#chq_no').val(data[i].chq_no);
                    $('#chq_date').val(chq_date);
                    $('#bank_name').val(data[i].bank);
                    $('#bill_no').val(data[i].bill_no);
                    $('#bill_date').val(bill_date);
                    $('#details').val(data[i].details);
                    $('#payble').val(data[i].payble);
                    $('#receive_amt').val(data[i].receive_amt);
                    $('#total').val(data[i].total);
                    $('#formbtn4').val(id);
                    $('#btnprint2').val(id);
                }
                $('.formhideshow').show();
                $('.tablehideshow').hide();
                $(".btnhideshow").show();
                $('#form4').show();
            }
        });
    });
    //-----------------------delete data code start----------------------------------------------------
    $(document).on('click', '.delete_data', function() {
        var id = $(this).attr('id');
        id = (id.split('_'))[1];
        console.log('from edit ' + id);
        if (id != "") {
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
                        url: baseurl + "CashCounter/deletedata",
                        dataType: "JSON",
                        data: {
                            id: id,
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
    $(document).on('click', '#view_details', function() {
        datashow();
        //alert('hi');
        $('#master_form4')[0].reset();
        $('#formbtn4').val('');
        //getbillno();
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
    });
    $(document).on('click', '#resetform', function() {
        $('#master_form4')[0].reset();
        $('#formbtn4').val('');
        $('#btnprint2').val('');
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
        infoTost("Form reset successfully!!!");
    });
});