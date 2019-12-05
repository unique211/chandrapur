$(document).ready(function() {
    function getServerTime() {
        return $.ajax({ async: false }).getResponseHeader('Date');
    }
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
    getreceiptno();
    $('#print_vouchar').val('');
    $('#print_vouchar').hide();
    showExtraReceipts();

    function getreceiptno() {
        var d = new Date(getServerTime());
        var year = d.getFullYear();
        var mid = 'CMC/';
        var receiptno = 0;
        $.ajax({
            type: 'POST',
            url: baseurl + "Miscellaneous_cash_counter/showDatewiseReceipt2",
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

    $(document).on('submit', "#master_form10", function(e) {
        e.preventDefault();
        var d = new Date(getServerTime());
        var id = $('#ref_voucher').val();
        var name = $('#name').val();
        var mobile = $('#mobile_no').val();
        var reason = $('#reason').val();
        var no_of_copy = $('#no_copies').val();
        var remark = $('#remark').val();
        var payble_amt = $('#payable_amount').val();
        var year = d.getFullYear();
        var receipt_no = $('#receipt_no2').val();
        var sequence_no = $('#sequence_no2').val();
        $.ajax({
            type: 'POST',
            url: baseurl + "Miscellaneous_cash_counter/add_vouchar",
            data: {
                id: id,
                name: name,
                mobile: mobile,
                reason: reason,
                no_of_copy: no_of_copy,
                remark: remark,
                payble_amt: payble_amt,
                year: year,
                receipt_no: receipt_no,
                sequence_no: sequence_no,
                table_name: 'miscellaneous_cash_counter',
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (id == "") {
                    console.log('from false');
                    $('#ref_voucher').val(data);
                    $('#print_vouchar').show();
                    $('#print_vouchar').val(data);
                    $('#rest_vouchar').show();
                    successTost("Record Saved Successfully");
                } else {
                    successTost("Record Saved Successfully");
                    console.log('from true');
                    $('#ref_voucher').val(id);
                    $('#print_vouchar').show();
                    $('#rest_vouchar').show();
                    $('#print_vouchar').val(id);
                }
                showExtraReceipts();
                //$('#master_form10')[0].reset();
            }
        });
    });
    $(document).on("submit", "#filter_form", function(e) {
        e.preventDefault();
        var from1 = $("#fdate").val();
        var to1 = $("#tdate").val();
        var staff_filter = $("#staff_filter").val();
        var dateslt = from1.split('/');
        var from = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = to1.split('/');
        var to = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        $('#tbody_extra').html('');
        $.ajax({
            type: "POST",
            url: baseurl + "Miscellaneous_cash_counter/showdata_filtered",
            data: {
                table_name: 'miscellaneous_cash_counter',
                from: from,
                to: to,
                staff_filter: staff_filter,
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
                        '<td style="display:none;" id="sequence_no_' + data[i].id + '">' + data[i].sequence_no + '</td>' +
                        '<td style="display:none;" id="receipt_no_' + data[i].id + '">' + data[i].receipt_no + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_extra btn btn-success" id=editextra_' + data[i].id + '><i class="fa fa-edit"></i></button></td>' +
                        '</tr>';
                    index++;
                }
                $('#tbody_extra').html(html);
                var uname = $('.profile-data-name').text();
                $('#myTableExtra').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            title: 'Miscellaneous Cash Counter List from ' + from1 + ' to ' + to1 + ' User: ' + uname,
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Miscellaneous Cash Counter List from ' + from1 + ' to ' + to1 + ' User: ' + uname,
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

    function showExtraReceipts() {
        var from1 = $("#fdate").val();
        var to1 = $("#tdate").val();

        $.ajax({
            type: "POST",
            url: baseurl + "Miscellaneous_cash_counter/showdatavoucher",
            data: {
                //table_name: table_name,
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
                        '<td style="display:none;" id="sequence_no_' + data[i].id + '">' + data[i].sequence_no + '</td>' +
                        '<td style="display:none;" id="receipt_no_' + data[i].id + '">' + data[i].receipt_no + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_extra btn btn-success" id=editextra_' + data[i].id + '><i class="fa fa-edit"></i></button></td>' +
                        '</tr>';
                    index++;
                }
                $('#tbody_extra').html(html);
                var uname = $('.profile-data-name').text();
                $('#myTableExtra').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            title: 'Miscellaneous Cash Counter List from ' + from1 + ' to ' + to1 + ' User: ' + uname,
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Miscellaneous Cash Counter List from ' + from1 + ' to ' + to1 + ' User: ' + uname,
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
    $(document).on('click', '.edit_extra', function() {
        var id = $(this).attr('id');
        var tmp = id.split('_');
        $('#name').val($('#name_' + tmp[1]).text());
        $('#mobile_no').val($('#mobile_' + tmp[1]).text());
        $('#no_copies').val($('#no_of_copy_' + tmp[1]).text());
        $('#payable_amount').val($('#payble_amt_' + tmp[1]).text());
        $('#remark').val($('#remark_' + tmp[1]).text());
        $('#reason').val($('#reason_' + tmp[1]).text());
        $('#sequence_no2').val($('#sequence_no_' + tmp[1]).text());
        $('#receipt_no2').val($('#receipt_no_' + tmp[1]).text());
        console.log(id);
        console.log(tmp[1]);
        $("#ref_voucher").val(tmp[1]);
        $("#print_vouchar").val(tmp[1]);
        $('#rest_vouchar').show();
        $('#print_vouchar').show();
        console.log($('#name_' + tmp[1]).text());
    });
    $(document).on('click', "#rest_vouchar", function() {
        $('#master_form10')[0].reset();
        $('#print_vouchar').hide();
        $('#rest_vouchar').hide();
        $('#print_vouchar').val('');
        $('#ref_voucher').val('');
        $('#sequence_no2').val('');
        $('#receipt_no2').val('');
        getreceiptno();

    });
});