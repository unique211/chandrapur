$(document).ready(function() {
    var table_name = "frequiently_ask_questions";
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();
        var question = $('#question').val();
        var question_m = $('#question_m').val();
        var ans = $('#ans').val();
        var ans_m = $('#ans_m').val();

        $.ajax({
            type: "POST",
            url: baseurl + "Frequintly_ask_questions/adddata",
            data: {
                id: id,
                question: question,
                question_m: question_m,
                ans: ans,
                ans_m: ans_m,
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
        $('#question').val('');
        $('#question_m').val('');
        $('#ans').val('');
        $('#ans_m').val('');
    }
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        $.ajax({
            type: "POST",
            url: baseurl + "Frequintly_ask_questions/showdata",
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
                    '<th ><font style="font-weight:bold">Question (English)</font></th>' +
                    '<th ><font style="font-weight:bold">Answer (English)</font></th>' +
                    '<th ><font style="font-weight:bold">प्रश्न (मराठी)</font></th>' +
                    '<th ><font style="font-weight:bold">उत्तर (मराठी)</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                        '<td  id="question_' + data[i].id + '">' + data[i].question + '</td>' +
                        '<td  id="question_m_' + data[i].id + '">' + data[i].question_m + '</td>' +
                        '<td  id="ans_' + data[i].id + '">' + data[i].ans + '</td>' +
                        '<td  id="ans_m_' + data[i].id + '">' + data[i].ans_m + '</td>' +
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
                        url: baseurl + "Frequintly_ask_questions/deletedata",
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
        var question = $('#question_' + id).html();
        var question_m = $('#question_m_' + id).html();
        var ans = $('#ans_' + id).html();
        var ans_m = $('#ans_m_' + id).html();
        $('#save_update').val(id);

        $('#question').val(question);
        $('#question_m').val(question_m);
        $('#ans').val(ans);
        $('#ans_m').val(ans_m);

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