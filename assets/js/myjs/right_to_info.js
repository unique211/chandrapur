$(document).ready(function() {
    var table_name = "right_to_info";
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();
        var parent = $('#parent').val();
        var name = $('#desc').val();
        var name_m = $('#desc_m').val();
        var file = $('#file_attachother').val();

        $.ajax({
            type: "POST",
            url: baseurl + "Right_to_info/adddata",
            data: {
                id: id,
                parent: parent,
                file: file,
                name: name,
                name_m: name_m,
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
        $('#parent').val('');
        $('#desc').val('');
        $('#desc_m').val('');
        $('#file_attachother').val('');
        $('#attachment').val('');
        $('#msg').html('');

    }
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        $.ajax({
            type: "POST",
            url: baseurl + "Right_to_info/showdata",
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
                    '<th ><font style="font-weight:bold">Parent</font></th>' +
                    '<th ><font style="font-weight:bold">Name (in English)</font></th>' +
                    '<th ><font style="font-weight:bold">नाव (मराठी मध्ये)</font></th>' +
                    '<th style="display:none"><font style="font-weight:bold">File</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                        '<td  id="parent_' + data[i].id + '">' + data[i].parent + '</td>' +
                        '<td  id="desc_' + data[i].id + '">' + data[i].name + '</td>' +
                        '<td  id="desc_m_' + data[i].id + '">' + data[i].name_m + '</td>' +
                        '<td  style="display:none" id="file_' + data[i].id + '">' + data[i].file + '</td>' +
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
                        url: baseurl + "Right_to_info/deletedata",
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
        var parent = $('#parent_' + id).html();
        var file = $('#file_' + id).html();
        var name = $('#desc_' + id).html();
        var name_m = $('#desc_m_' + id).html();
        $('#save_update').val(id);


        $('#desc').val(name);
        $('#desc_m').val(name_m);
        $('#parent').val(parent);
        $('#file_attachother').val(file);
        $("#msg").html("<font id='doc_image_name1' color='green'>" + file + "</font>");

    });
    $(document).on('click', '.closehideshow', function() {
        form_clear()
        $('#file_attachother').val('');
        $('#save_update').val('');
        $('#msg').html('');


    });
    $(document).on('click', '#reset', function(e) {
        e.preventDefault();
        form_clear()
            //$('#master_form')[0].reset();
        $('#file_attachother').val('');
        $('#save_update').val('');
        $('#msg').html('');

    });
    $('#attachment').ajaxfileupload({
        'action': baseurl + 'Right_to_info/doc_image_upload',
        'onStart': function() { $("#msg").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother").val(response);
                $("#msg").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
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


});