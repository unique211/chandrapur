$(document).ready(function() {
    var table_name = "first_page_text";
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();
        var tomb = $('#tomb').val();
        var tomb_m = $('#tomb_m').val();
        var desc = $('#desc').val();
        var desc_m = $('#desc_m').val();

        $.ajax({
            type: "POST",
            url: baseurl + "First_page_text/adddata",
            data: {
                id: id,
                tomb: tomb,
                tomb_m: tomb_m,
                desc: desc,
                desc_m: desc_m,
                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data == true) {
                    if (id != "") {
                        successTost("Record Update Successfully");
                    } else {
                        successTost("Record Added Successfully");
                    }
                    form_clear();
                    //$('#master_form')[0].reset();
                    $('#save_update').val('');
                    $('.closehideshow').trigger('click');
                    datashow();
                } else {
                    errorTost("Record Cannot Save");
                }
            }
        });
    });

    function form_clear() {
        $('#save_update').val('');
        $('#tomb').val('');
        $('#tomb_m').val('');
        $('#desc').val('');
        $('#desc_m').val('');
    }
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        $.ajax({
            type: "POST",
            url: baseurl + "First_page_text/showdata",
            data: {
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);
                var html = '';
                //    var date1 = "";
                html += '<table id="myTable" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th ><font style="font-weight:bold">Sr. No.</font></th>' +
                    '<th ><font style="font-weight:bold">Name of the Tomb (in English)</font></th>' +
                    '<th ><font style="font-weight:bold">टँबचे नाव (मराठी मध्ये)</font></th>' +
                    '<th ><font style="font-weight:bold">Description (in English)</font></th>' +
                    '<th ><font style="font-weight:bold">वर्णन (मराठी मध्ये)</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                        '<td  id="tomb_' + data[i].id + '">' + data[i].tomb + '</td>' +
                        '<td  id="tomb_m_' + data[i].id + '">' + data[i].tomb_m + '</td>' +
                        '<td  id="desc_' + data[i].id + '">' + data[i].desc + '</td>' +
                        '<td  id="desc_m_' + data[i].id + '">' + data[i].desc_m + '</td>' +
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
                        url: baseurl + "First_page_text/deletedata",
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
    $(document).on("click", ".edit_data", function() {
        $('.formhideshow').show();
        $('.tablehideshow').hide();
        $(".btnhideshow").show();
        var id = $(this).attr('id');
        var tomb = $('#tomb_' + id).html();
        var tomb_m = $('#tomb_m_' + id).html();
        var desc = $('#desc_' + id).html();
        var desc_m = $('#desc_m_' + id).html();
        $('#save_update').val(id);

        $('#tomb').val(tomb);
        $('#tomb_m').val(tomb_m);
        $('#desc').val(desc);
        $('#desc_m').val(desc_m);

    });
    $(document).on('click', '.closehideshow', function() {
        form_clear()
            // $('#master_form')[0].reset();

        $('#save_update').val('');

    });
    $(document).on('click', '#reset', function(e) {
        e.preventDefault();
        form_clear()
            //$('#master_form')[0].reset();

        $('#save_update').val('');

    });

});