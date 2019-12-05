$(document).ready(function() {
    var table_name = "staff_master";
    $(document).on("keyup", "#cpsw", function(e) {
        e.preventDefault();
        var confirm = $('#cpsw').val();
        var password = $('#psw').val();
        if (confirm == password) {
            $(".validation").html(''); // remove it
            $(':input[type="submit"]').prop('disabled', false);
        } else {
            $(".validation").html("Please Enter Same Password");
            $(':input[type="submit"]').prop('disabled', true);
            $("#cpsw").focus();
        }
    });
    $(document).on("keyup", "#user_id", function(e) {
        e.preventDefault();
        var user_id = $('#user_id').val();
        $.ajax({
            type: "POST",
            url: baseurl + "Settings/chk_user_id",

            data: {
                user_id: user_id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data == 0) {
                    $(".validation2").html(''); // remove it
                    $(':input[type="submit"]').prop('disabled', false);
                } else {
                    $(".validation2").html("This UserId is Already Exists,Please Enter another UserId");
                    $(':input[type="submit"]').prop('disabled', true);
                    $("#user_id").focus();
                }
            }
        });
    });
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var user_id = $('#user_id').val();
        var password = $('#psw').val();
        var confirm = $('#cpsw').val();
        var role = "admin";
        var name = $("#name").val();
        var status = "1";
        var id = $('#save_update').val();
        var validation1 = $(".validation").html();
        var validation2 = $(".validation2").html();



        if (confirm == password) {
            $(".validation").html(''); // remove it
            //$(':input[type="submit"]').prop('disabled', false);
            if (validation2 == "") {
                $(':input[type="submit"]').prop('disabled', false);
                $.ajax({
                    type: "POST",
                    url: baseurl + "Settings/add_admin_master",

                    data: {
                        id: id,

                        role: role,
                        name: name,
                        user_id: user_id,
                        status: status,
                        table_name: table_name
                    },
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        $.ajax({
                            type: "POST",
                            url: baseurl + "Settings/add_admin",

                            data: {
                                id: id,
                                user_id: user_id,
                                password: confirm,
                                role: role,
                                status: status,
                                // table_name: table_name
                            },
                            dataType: "JSON",
                            async: false,
                            success: function(data) {
                                if (data == true) {
                                    if (id != "") {
                                        successTost("Admin Update Successfully");

                                    } else {
                                        successTost("Admin Added Successfully");
                                    }
                                    $('#master_form')[0].reset();
                                    $('#save_update').val('');
                                    $('.formhideshow').hide();
                                    $('.tablehideshow').show();
                                    $('.closehideshow').trigger('click');
                                    datashow();
                                } else {
                                    errorTost("Admin Cannot Save");
                                }
                            }
                        });
                    }
                });
            } else {
                $(':input[type="submit"]').prop('disabled', true);
                swal("Alert", validation2, "warning");

            }
        } else {
            $(".validation").html("Please Enter Same Password");
            $(':input[type="submit"]').prop('disabled', true);
            $("#cpsw").focus();
            swal("Alert", validation1, "warning");
        }



        /* */





    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        var role = "admin";
        $.ajax({
            type: "POST",
            url: baseurl + "Settings/showdata_where",
            data: {
                table_name: table_name,
                role: role,

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
                    '<th><font style="font-weight:bold">Name</font></th>' +
                    '<th><font style="font-weight:bold">User Id</font></th>' +
                    '<th style="display:none"><font style="font-weight:bold">Password</font></th>' +

                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;
                    var subzone = data[i].zone;
                    var subzone = subzone.split("_");

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                        '<td  id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                        '<td  id="user_id_' + data[i].id + '">' + data[i].user_id + '</td>' +
                        '<td  style="display:none" id="password_' + data[i].id + '">' + data[i].password + '</td>' +

                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>' +
                        '&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=' + data[i].user_id + '><i class="fa fa-trash"></i></button>' +
                        '</td></tr>';

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
    $(document).on("click", ".edit_data", function() {

        $('.formhideshow').show();
        $('.tablehideshow').hide();
        $(".btnhideshow").show();

        $('#user_id').prop('disabled', true);
        var id = $(this).attr('id');


        var user_id = $('#user_id_' + id).html();
        var password = $('#password_' + id).html();
        var name = $('#name_' + id).html();




        $('#user_id').val(user_id);
        $('#name').val(name);
        $('#cpsw').val(password);
        $('#psw').val(password);
        $('#save_update').val(id);


    });
    $(document).on('click', '.closehideshow', function() {
        $('#master_form')[0].reset();
        $('#user_id').prop('disabled', false);
        $(".validation").html('');
        $(".validation2").html('');
    });




});