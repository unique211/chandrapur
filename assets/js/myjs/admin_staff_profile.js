$(document).ready(function() {
    var table_name = "admin_staff_profile";
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();
        var file = $('#file_attachother').val();
        var name = $('#name').val();
        var name_m = $('#name_m').val();
        var mobile1 = $('#mobile_1').val();
        var mobile2 = $('#mobile_2').val();
        var designation = $('#designation').val();
        var description = $('#description').val();
        var section = $('#section').val();

        $.ajax({
            type: "POST",
            url: baseurl + "Admin_sp/adddata",
            data: {
                id: id,
                file: file,
                name: name,
                name_m: name_m,
                designation: designation,
                mobile1: mobile1,
                mobile2: mobile2,
                description: description,
                section: section,
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
        $('#file_attachother').val('');
        $('#attachment').val('');
        $('#msg').html('');

        $('#name').val('');
        $('#name_m').val('');
        $('#mobile_1').val('');
        $('#mobile_2').val('');
        $('#designation').val('');
        $('#description').val('');
        $('#section').val('');
    }
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        $.ajax({
            type: "POST",
            url: baseurl + "Admin_sp/showdata",
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
                    '<th ><font style="font-weight:bold">नाव*</font></th>' +
                    '<th ><font style="font-weight:bold">Mobile No. 1</font></th>' +
                    '<th ><font style="font-weight:bold">Mobile No. 2</font></th>' +
                    '<th ><font style="font-weight:bold">Designation</font></th>' +
                    '<th ><font style="font-weight:bold">वर्णन</font></th>' +
                    '<th style="display:none"><font style="font-weight:bold">Name</font></th>' +
                    '<th style="display:none"><font style="font-weight:bold">Section</font></th>' +
                    '<th style="display:none"><font style="font-weight:bold">File</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                        '<td  id="name_m_' + data[i].id + '">' + data[i].name_m + '</td>' +
                        '<td  id="mobile1_' + data[i].id + '">' + data[i].mobile1 + '</td>' +
                        '<td  id="mobile2_' + data[i].id + '">' + data[i].mobile2 + '</td>' +
                        '<td  id="designation_' + data[i].id + '">' + data[i].designation + '</td>' +
                        '<td  id="description_' + data[i].id + '">' + data[i].description + '</td>' +
                        '<td  style="display:none" id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                        '<td  style="display:none" id="section_' + data[i].id + '">' + data[i].section + '</td>' +
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
                        url: baseurl + "Admin_sp/deletedata",
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
        var file = $('#file_' + id).html();
        var name = $('#name_' + id).html();
        var name_m = $('#name_m_' + id).html();
        var mobile1 = $('#mobile1_' + id).html();
        var mobile2 = $('#mobile2_' + id).html();
        var designation = $('#designation_' + id).html();
        var description = $('#description_' + id).html();
        var section = $('#section_' + id).html();


        $('#save_update').val(id);

        $('#name').val(name);
        $('#name_m').val(name_m);
        $('#mobile_1').val(mobile1);
        $('#mobile_2').val(mobile2);
        $('#designation').val(designation);
        $('#description').val(description);
        $('#section').val(section);
        $('#file_attachother').val(file);
        $("#msg").html("<font id='doc_image_name1' color='green'>" + file + "</font>");
    });
    $(document).on('click', '.closehideshow', function() {
        form_clear()
            // $('#master_form')[0].reset();
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
        'action': baseurl + 'Admin_sp/doc_image_upload',
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