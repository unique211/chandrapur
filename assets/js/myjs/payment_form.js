$(document).ready(function() {

    $(".tablehideshow").hide();
    $(".formhideshow").show();
    multiply();
    //  alert('');
    $(document).on('blur', '#copy', function() {
        var copy = $("#copy").val();
        if (copy == "0" || copy == 0) {
            $("#copy").val(1);
        }
        multiply();
    });


    function multiply() {
        var amt = $("#amt").val();
        var copy = $("#copy").val();
        var total = parseFloat(amt) * parseFloat(copy);
        $("#total").val(total);
        $("#amount").val(total);
    }


    // var table_name = "department_master";

    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();
        var name = $('#name').val();
        var service = $('#service').val();
        var amt = $('#amt').val();
        var copy = $('#copy').val();
        var total = $('#total').val();
        var ref_id = $('#ref_id').val();

        ref_id

        // $("#merch_form").trigger('submit');
        $.ajax({
            type: "POST",
            url: baseurl + "Payment/adddata",

            data: {


                service: service,
                amt: amt,
                copy: copy,
                ref_id: ref_id,
                table_name: 'online_payment_master'
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                $('#order_id').val(data);
                //  alert(data);

                $("#merch_form").trigger('submit');
                //  $('#master_form')[0].reset();

                // $('.formhideshow').hide();
                // $('.tablehideshow').show();
                // $('.closehideshow').trigger('click');


            }
        });


    });
    // //----------------------submit form code end------------------------------
    // datashow();
    // //----------------show data in the tabale code start-----------------------
    // function datashow() {

    //     $.ajax({
    //         type: "POST",
    //         url: baseurl + "Department/showdata",
    //         data: {
    //             table_name: table_name,

    //         },
    //         dataType: "JSON",
    //         async: false,
    //         success: function(data) {
    //             // console.log('data'+data);
    //             var data = eval(data);


    //             var html = '';
    //             html += '<table id="myTable" class="table table-striped">' +
    //                 '<thead>' +
    //                 '<tr>' +
    //                 '<th><font style="font-weight:bold">Sr. No.</font></th>' +
    //                 '<th><font style="font-weight:bold">Department</font></th>' +
    //                 '<th style="display:none"><font style="font-weight:bold">Status</font></th>' +
    //                 '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

    //                 '</tr>' +
    //                 '</thead>' +
    //                 '<tbody>';
    //             for (var i = 0; i < data.length; i++) {
    //                 var sr = i + 1;

    //                 html += '<tr>' +
    //                     '<td id="id_' + data[i].id + '">' + sr + '</td>' +

    //                     '<td  id="department_' + data[i].id + '">' + data[i].department + '</td>' +
    //                     '<td  style="display:none" id="status_' + data[i].id + '">' + data[i].status + '</td>' +
    //                     '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
    //                     '</tr>';

    //             }
    //             html += '</tbody></table>';

    //             $('#show_master').html(html);
    //             $('#myTable').DataTable({});

    //         }

    //     });

    // }
    // //-----------------------delete data code start----------------------------------------------------


    // $(document).on('click', '.delete_data', function() {

    //     var id1 = $(this).attr('id');



    //     if (id1 != "") {
    //         swal({
    //                 title: "Are you sure to delete ?",
    //                 text: "You will not be able to recover this Data !!",
    //                 type: "warning",
    //                 showCancelButton: true,
    //                 confirmButtonColor: "#DD6B55",
    //                 confirmButtonText: "Yes, delete it !!",
    //                 closeOnConfirm: false
    //             },
    //             function() {

    //                 $.ajax({
    //                     type: "POST",
    //                     url: baseurl + "Department/deletedata",
    //                     dataType: "JSON",
    //                     data: {
    //                         id: id1,
    //                         table_name: table_name,
    //                     },
    //                     success: function(data) {
    //                         if (data == true) {
    //                             swal("Deleted !!", "Hey, your Data has been deleted !!", "success");


    //                             datashow(); //call function show all data	


    //                         } else {
    //                             errorTost("Data Delete Failed");
    //                         }

    //                     }
    //                 });
    //                 return false;

    //             });

    //     }


    // });

    // //-----------------------delete data code end-----------------------------------
    // $(document).on("click", ".edit_data", function() {

    //     $('.formhideshow').show();
    //     $('.tablehideshow').hide();
    //     $(".btnhideshow").show();

    //     var id = $(this).attr('id');


    //     var department = $('#department_' + id).html();
    //     var status = $('#status_' + id).html();

    //     $('#save_update').val(id);
    //     $('#department').val(department);
    //     if (status == "1") {
    //         $("#active").prop("checked", true);
    //     } else {
    //         $("#deactive").prop("checked", true);
    //     }



    // });
    // $(document).on('click', '.closehideshow', function() {
    //     $('#master_form')[0].reset();
    //     $('#save_update').val('');

    //     $(".tablehideshow").show();
    //     $(".formhideshow").hide();

    // });

    //     $('#save_update').val('');

    //     $(".tablehideshow").show();
    //     $(".formhideshow").hide();

    // });

});