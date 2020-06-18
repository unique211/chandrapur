$(document).ready(function() {
    var table_name = "business_type_master";
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var business_type = $('#business_type').val();
        var amount = $('#amount').val();

        var id = $('#save_update').val();

        $.ajax({
            type: "POST",
            url: baseurl + "Business_Type/adddata",
            data: {
                id: id,
                business_type: business_type,
                amount: amount,
                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data == true) {
                    if (id != "") {
                        successTost("Business Type Update Successfully");
                    } else {
                        successTost("Business Type Added Successfully");
                    }
                } else {
                    errorTost("Business Type Cannot Save");
                }
            }
        });
        $('#master_form')[0].reset();
        $('#save_update').val('');
        datashow();
    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        $.ajax({
            type: "POST",
            url: baseurl + "Business_Type/showdata",
            data: {
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);
                var html = '';
                html += '<table id="myTable" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                    '<th><font style="font-weight:bold">Business Type</font></th>' +
                    '<th><font style="font-weight:bold">Amount</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;
                    var statusinfo = "";
                    var statusdata = data[i].status;
                    if (statusdata == 1) {
                        statusinfo = "Active";
                    } else {
                        statusinfo = "Deactive";
                    }
                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                        '<td  id="business_type_' + data[i].id + '">' + data[i].business_type + '</td>' +
                        '<td  id="amount_' + data[i].id + '">' + data[i].amount + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';
                }
                html += '</tbody></table>';
                $('#show_master').html(html);
                $('#myTable').DataTable({});
            }
        });
    }
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
                        url: baseurl + "Business_Type/deletedata",
                        dataType: "JSON",
                        data: {
                            id: id1,
                            table_name: table_name,
                        },
                        success: function(data) {
                            if (data == true) {
                                swal("Deleted !!", "Hey, your Data has been deleted !!", "success");
                                datashow(); //call function show all data	
                                $('#master_form')[0].reset();
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
    $(document).on("click", ".edit_data", function() {
        var id = $(this).attr('id');
        var business_type = $('#business_type_' + id).html();
        var amount = $('#amount_' + id).html();

        $('#save_update').val(id);
        $('#business_type').val(business_type);
        $('#amount').val(amount);

    });
    $(document).on("click", "#reset_btn", function() {
        $('#master_form')[0].reset();
        $('#save_update').val('');
    });
    $(document).on('click', '.closehideshow', function() {
        $('#master_form')[0].reset();
        $('#save_update').val('');
        $(".tablehideshow").show();
        $(".formhideshow").hide();
    });
    /*------Bulr event  Of zone---------------*/
    $(document).on("blur", "#business_type", function(e) {
        e.preventDefault();
        var business_type = $('#business_type').val();
        $.ajax({
            type: "POST",
            url: baseurl + "Business_Type/check_business_type",
            data: {
                business_type: business_type,
                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data > 0) {

                    swal("Business Type Already Exist, Please Enter Another Business Type !!!");
                    $('#business_type').val('');
                } else {}
            }
        });
    });
});