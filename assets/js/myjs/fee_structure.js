$(document).ready(function() {
    var table_name = "fee_structure";



    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();
        var service = $('#service').val();
        var amt = $('#amt').val();
        var no_of_copy = $('#copy').val();




        $.ajax({
            type: "POST",
            url: baseurl + "Fee_str/adddata",

            data: {
                id: id,
                service: service,
                amt: amt,
                no_of_copy: no_of_copy,
                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data == true) {
                    if (id != "") {
                        successTost("Fee Structure Update Successfully");

                    } else {
                        successTost("Fee Structure Added Successfully");
                    }
                    $('#master_form')[0].reset();
                    $('#save_update').val('');
                    $('.formhideshow').hide();
                    $('.tablehideshow').show();
                    $('.closehideshow').trigger('click');
                    datashow();
                } else {
                    errorTost("Fee Structure Cannot Save");
                }
            }
        });


    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {

        $.ajax({
            type: "POST",
            url: baseurl + "Fee_str/showdata",
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
                    '<th><font style="font-weight:bold">Service</font></th>' +
                    '<th><font style="font-weight:bold">Amount</font></th>' +
                    '<th><font style="font-weight:bold">Number of Copy</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +

                        '<td  id="service_' + data[i].id + '">' + data[i].service + '</td>' +
                        '<td  id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                        '<td  id="no_of_copy_' + data[i].id + '">' + data[i].no_of_copy + '</td>' +
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
                        url: baseurl + "Fee_str/deletedata",
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


        var service = $('#service_' + id).html();
        var amt = $('#amt_' + id).html();
        var no_of_copy = $('#no_of_copy_' + id).html();

        $('#save_update').val(id);

        $('#service').val(service);
        $('#amt').val(amt);
        $('#copy').val(no_of_copy);



    });
    $(document).on('click', '.closehideshow', function() {
        $('#master_form')[0].reset();
        $('#save_update').val('');

        $(".tablehideshow").show();
        $(".formhideshow").hide();

    });

});