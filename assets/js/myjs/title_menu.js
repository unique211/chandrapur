$(document).ready(function() {
    var table_name = "title_menu";
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();
        var menu = $('#title').val();
        var menu_m = $('#title_m').val();
        var path = $('#path').val();
        var sort = $('#sort').val();
        var menu_parent = $('#parent_menu').val();
        var dept = $('#dept').val();

        $.ajax({
            type: "POST",
            url: baseurl + "Title_menu/adddata",
            data: {
                id: id,
                menu: menu,
                menu_m: menu_m,
                path: path,
                sort: sort,
                menu_parent: menu_parent,
                dept: dept,
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
        $('#path').val('');
        $('#sort').val('');
        $('#parent_menu').val('');
        $('#dept').val('');

    }
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        $.ajax({
            type: "POST",
            url: baseurl + "Title_menu/showdata",
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
                    '<th ><font style="font-weight:bold">Menu name (English)</font></th>' +
                    '<th ><font style="font-weight:bold">मेनू नाव ( मराठी )</font></th>' +
                    '<th ><font style="font-weight:bold">Parent</font></th>' +
                    '<th ><font style="font-weight:bold">Page Path</font></th>' +
                    '<th ><font style="font-weight:bold">Sort</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Department</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                        '<td  id="title_' + data[i].id + '">' + data[i].menu + '</td>' +
                        '<td  id="title_m_' + data[i].id + '">' + data[i].menu_m + '</td>' +
                        '<td  id="menu_parent_' + data[i].id + '">' + data[i].menu_parent + '</td>' +
                        '<td  id="path_' + data[i].id + '">' + data[i].path + '</td>' +
                        '<td  id="sort_' + data[i].id + '">' + data[i].sort + '</td>' +
                        '<td style="display:none;" id="dept_' + data[i].id + '">' + data[i].dept + '</td>' +
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
                        url: baseurl + "Title_menu/deletedata",
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
        var menu = $('#title_' + id).html();
        var menu_m = $('#title_m_' + id).html();
        var path = $('#path_' + id).html();
        var sort = $('#sort_' + id).html();
        var dept = $('#dept_' + id).html();
        var menu_parent = $('#menu_parent_' + id).html();
        $('#save_update').val(id);

        $('#title').val(menu);
        $('#title_m').val(menu_m);
        $('#path').val(path);
        $('#sort').val(sort);
        $('#parent_menu').val(menu_parent);
        $('#dept').val(dept);
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