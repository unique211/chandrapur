$(document).ready(function() {
    var table_name = "underway_pro";
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();


        var id = $('#save_update').val();
        var parent = $('#parent').val();
        var date1 = $('#date').val();
        var title = $('#title').val();
        var title_m = $('#title_m').val();
        var desc = $('#desc').val();
        var desc_m = $('#desc_m').val();
        var file = $('#file_attachother').val();

        var dateslt = date1.split('/');
        var date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];

        $.ajax({
            type: "POST",
            url: baseurl + "Underway_pro/adddata",
            data: {
                id: id,
                parent: parent,
                title: title,
                title_m: title_m,
                desc: desc,
                desc_m: desc_m,
                file: file,
                date: date,
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
        $('#parent').val('');
        $('#date').val('');
        $('#title').val('');
        $('#title_m').val('');
        $('#desc').val('');
        $('#desc_m').val('');

    }
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        $.ajax({
            type: "POST",
            url: baseurl + "Underway_pro/showdata",
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
                    '<th  style="display:none"><font style="font-weight:bold">Parent</font></th>' +
                    '<th><font style="font-weight:bold">दिनांक</font></th>' +
                    '<th><font style="font-weight:bold">Title</font></th>' +
                    '<th ><font style="font-weight:bold">शीर्षक</font></th>' +
                    '<th><font style="font-weight:bold">Description</font></th>' +
                    '<th ><font style="font-weight:bold">वर्णन</font></th>' +
                    '<th style="display:none"><font style="font-weight:bold">File</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;
                    var date1 = "";
                    if (data[i].date != "0000-00-00") {

                        var date = data[i].date;
                        var fdateslt = date.split('-');
                        date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    }
                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                        '<td style="display:none" id="parent_' + data[i].id + '">' + data[i].parent + '</td>' +
                        '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                        '<td id="title_' + data[i].id + '">' + data[i].title + '</td>' +
                        '<td id="title_m_' + data[i].id + '">' + data[i].title_m + '</td>' +
                        '<td id="desc_' + data[i].id + '">' + data[i].desc + '</td>' +
                        '<td id="desc_m_' + data[i].id + '">' + data[i].desc_m + '</td>' +
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
                        url: baseurl + "Underway_pro/deletedata",
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
        var date = $('#date1_' + id).html();
        var title = $('#title_' + id).html();
        var title_m = $('#title_m_' + id).html();
        var desc = $('#desc_' + id).html();
        var desc_m = $('#desc_m_' + id).html();
        var file = $('#file_' + id).html();

        $('#save_update').val(id);

        $('#parent').val(parent);
        $('#date').val(date);

        $('#file_attachother').val(file);
        $("#msg").html("<font id='doc_image_name1' color='green'>" + file + "</font>");
        $('#title').val(title);
        $('#title_m').val(title_m);
        $('#desc').val(desc);
        $('#desc_m').val(desc_m);

    });
    $(document).on('click', '.closehideshow', function() {
        form_clear()
            //$('#master_form')[0].reset();
        $('#file_attachother').val('');
        $('#save_update').val('');
        $('#msg').html('');

    });
    $(document).on('click', '#reset', function(e) {
        e.preventDefault();
        form_clear()
            //  $('#master_form')[0].reset();
        $('#file_attachother').val('');
        $('#save_update').val('');
        $('#msg').html('');

    });
    $('#attachment').ajaxfileupload({
        'action': baseurl + 'Underway_pro/doc_image_upload',
        'onStart': function() { $("#msg").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother").val(response);
                $("#msg").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother").val(response);
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