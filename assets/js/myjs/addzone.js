$(document).ready(function() {
    var table_name = "zone_master";
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var zone = $('#zone').val();
        var status = "";
        if ($('#status').prop("checked") == true) {
            status = "1";
        } else if ($(this).prop("checked") == false) {
            status = 0;
        }
        // var status = $('input[name=status]:checked').val();
        var id = $('#save_update').val();
        console.log("zone" + zone + "status" + status);
        $.ajax({
            type: "POST",
            url: baseurl + "Zone/adddata",
            data: {
                id: id,
                zone: zone,
                status: status,
                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data == true) {
                    if (id != "") {
                        successTost("Zone Update Successfully");
                    } else {
                        successTost("Zone Added Successfully");
                    }
                } else {
                    errorTost("Department Cannot Save");
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
            url: baseurl + "Zone/showdata",
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
                    '<th><font style="font-weight:bold">Zone Name</font></th>' +
                    '<th style="display:none" ><font style="font-weight:bold">Status</font></th>' +
                    '<th><font style="font-weight:bold">Status</font></th>' +
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
                        '<td  id="zone_' + data[i].id + '">' + data[i].zonename + '</td>' +
                        '<td  style="display:none" id="status_' + data[i].id + '">' + data[i].status + '</td>' +
                        '<td  id="statusinfo_' + data[i].id + '">' + statusinfo + '</td>' +
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
                        url: baseurl + "Zone/deletedata",
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
        var zone = $('#zone_' + id).html();
        var status = $('#status_' + id).html();
        if (status == 1) {
            $('#status').prop("checked", true);
        } else {
            $('#status').prop("checked", false);
        }
        $('#save_update').val(id);
        $('#zone').val(zone);
        /* if (status == "1") {
             $("#active").prop("checked", true);
         } else {
             $("#deactive").prop("checked", true);
         }*/
    });
    $(document).on('click', '.closehideshow', function() {
        $('#master_form')[0].reset();
        $('#save_update').val('');
        $(".tablehideshow").show();
        $(".formhideshow").hide();
    });
    /*------Bulr event  Of zone---------------*/
    $(document).on("blur", "#zone", function(e) {
        e.preventDefault();
        var zone = $('#zone').val();
        $.ajax({
            type: "POST",
            url: baseurl + "Zone/checksubzoneexist",
            data: {
                zone: zone,
                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data > 0) {
                    swal(" Zone Already Exist Please Enter Another Zone ");
                } else {}
            }
        });
    });
});