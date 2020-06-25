$(document).ready(function() {
    var table_name = "marrige_registration";
    getreceiptno();
    $('#print_vouchar').val('');
    $('#print_vouchar').hide();
    showExtraReceipts();

    function getServerTime() {
        return $.ajax({ async: false }).getResponseHeader('Date');
    }

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
                if (data.length > 0) {
                    if (data[0].sequence_no == null || data[0].sequence_no == "") {
                        receiptno = 0;
                    } else {
                        receiptno = parseInt(data[0].sequence_no);
                    }
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
        //  console.log(receiptno);
        receiptno = receiptno + mid + year;
        console.log(receiptno);
        $('#receipt_no2').val(receiptno);
    }

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
            url: baseurl + "Marrige/add_vouchar",
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
                table_name: 'marrige_voucher',
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

            }
        });
    });


    $(document).on('click', "#rest_vouchar", function() {
        $('#master_form10')[0].reset();
        $('#print_vouchar').hide();
        $('#rest_vouchar').hide();
        $('#print_vouchar').val('');
        $('#ref_voucher').val('');
        getreceiptno();
    });

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
                        url: baseurl + "Settings/deletedata_staff",
                        dataType: "JSON",
                        data: {
                            id: id1,
                            table_name: table_name,
                        },
                        success: function(data) {
                            if (data == true) {
                                swal("Deleted !!", "Hey, your Data has been deleted !!", "success");


                                datashow(); //call function show all data	


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

    $(document).on('click', '.closehideshow', function() {
        $('#master_form')[0].reset();
        $('#user_id').prop('disabled', false);
        $(".validation").html('');
        $(".validation2").html('');
    });




});