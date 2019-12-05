$(document).ready(function() {
    var table_name = "web_edu_master";
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();
        var edu = $('#title').val();
        var edu_m = $('#title_m').val();
        var parent = $('#parent').val();
        var students = $('#students').val();

        $.ajax({
            type: "POST",
            url: baseurl + "Web_edu_master/adddata",
            data: {
                id: id,
                edu: edu,
                edu_m: edu_m,
                parent: parent,
                students: students,
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
        $('#title').val('');
        $('#title_m').val('');
        $('#parent').val('');
        $('#students').val('');
    }
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        $.ajax({
            type: "POST",
            url: baseurl + "Web_edu_master/showdata",
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
                    '<th ><font style="font-weight:bold">Education (English)</font></th>' +
                    '<th ><font style="font-weight:bold">शिक्षण (मराठी)</font></th>' +
                    '<th ><font style="font-weight:bold">Number of Students</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                        '<td  id="parent_' + data[i].id + '">' + data[i].parent + '</td>' +
                        '<td  id="edu_' + data[i].id + '">' + data[i].edu + '</td>' +
                        '<td  id="edu_m_' + data[i].id + '">' + data[i].edu_m + '</td>' +
                        '<td  id="students_' + data[i].id + '">' + data[i].students + '</td>' +
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
                        url: baseurl + "Web_edu_master/deletedata",
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
        var edu = $('#edu_' + id).html();
        var edu_m = $('#edu_m_' + id).html();
        var parent = $('#parent_' + id).html();
        var students = $('#students_' + id).html();
        $('#save_update').val(id);

        $('#title').val(edu);
        $('#title_m').val(edu_m);
        $('#parent').val(parent);
        $('#students').val(students);
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