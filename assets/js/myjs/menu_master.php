$(document).ready(function() {
    var table_name = "menu_master";
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();


        var id = $('#save_update').val();
        var menu_name = $('#menu_name').val();
        var menu_order = $('#menu_order').val();
        var is_child = $('#is_child').val();
        var parent_id = $('#parent_id').val();

        
        $.ajax({
            type: "POST",
            url: baseurl + "Menu_Master/adddata",
            data: {
                id: id,
                menu_name: menu_name,
                menu_order: menu_order,
                is_child: is_child,
                parent_id: parent_id,
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

        $('#menu_name').val('');
        $('#menu_order').val('');
        $('#is_child').val('');
        $('#parent_id').val('');

    }
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        $.ajax({
            type: "POST",
            url: baseurl + "Menu_Master/showdata",
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
                    '<th><font style="font-weight:bold">Menu Name</font></th>' +
					'<th><font style="font-weight:bold">Order No</font></th>' +
                    '<th><font style="font-weight:bold">Is Parent/Child</font></th>' +    
					'<th  style="display:none"><font style="font-weight:bold">Parent id</font></th>' +					
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;
                    var date1 = "";
                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                        '<td id="menu_name_' + data[i].id + '">' + data[i].menu_name + '</td>' +
                        '<td id="menu_order_' + data[i].id + '">' + data[i].menu_order + '</td>' +
						'<td id="is_child_' + data[i].id + '">' + data[i].is_child + '</td>' +
						'<td style="display:none" id="parent_id_' + data[i].id + '">' + data[i].parent_id + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';
                }
                html += '</tbody></table>';
                $('#show_master').html(html);
                $('#myTable').DataTable({});
				$('.hidepar').css('display','');
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
                        url: baseurl + "Menu_Master/deletedata",
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
        var menu_name = $('#menu_name_' + id).html();
        var menu_order = $('#menu_order_' + id).html();
        var is_child = $('#is_child_' + id).html();
        var parent_id = $('#parent_id_' + id).html();
        

        $('#save_update').val(id);
        $('#menu_name').val(menu_name);
        $('#menu_order').val(menu_order);
        $('#is_child').val(is_child);
        $('#parent_id').val(parent_id);
       

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
   
});