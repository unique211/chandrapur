$(document).ready(function() {
    var table_name = "occuption_certificate";


    function getServerTime() {
        return $.ajax({ async: false }).getResponseHeader('Date');
    }


    getMasterSelect("business_type_master", "#business_type");




    //----------------------------------get max id start---------------------------------------------
    get_appmaxid();
    var sr_no = "";

    function get_appmaxid() {
        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/selectmaxid",
            dataType: "JSON",
            async: false,
            data: {
                table_name: 'occuption_certificate',
                id: 'sr_no',
            },
            success: function(data) {
                // alert(data);
                if (data > 0) {
                    var id = parseFloat(data) + parseFloat(1);
                    //  $('#srno').val(id);
                    sr_no = id;
                } else {
                    var id = parseFloat(0) + parseFloat(1);
                    // $('#srno').val(id);
                    sr_no = id;
                }
            }
        });
    }

    //----------------------------------get max id end---------------------------------------------


    function getDate(input) {
        from = input.split("/");
        return new Date(from[2], from[1] - 1, from[0]);
    }
    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var from = $("#from").val();
        var to = $("#to").val();

        var fdob = from.split('/');
        var fromdate = fdob[2] + "-" + fdob[1] + "-" + fdob[0];

        var fdob = to.split('/');
        var todate = fdob[2] + "-" + fdob[1] + "-" + fdob[0];

        var date1 = new Date();
        date1 = date1.toString('dd/MM/yyyy');
        var date_ini = getDate(from);
        var date_end = getDate(to);


        var today = new Date().toDateString();

        var date_ini2 = new Date(fromdate).toDateString();
        var date_end2 = new Date(todate).toDateString();

        if (date_ini < date_end) {
            add_record();
            //put code here to call server
        } else {
            if (date_ini2 == date_end2) {
                add_record();
            } else {
                swal("To Date is Invalid", "Hey, To Date is Always > OR = From Date !!", "error");
            }

        }


    });

    function add_record() {
        var name = $('#name').val();
        // var ward_no = $('#ward_no').val();
        // var municipalty_ward_no = $('#munici_ward_no').val();
        // var year = $('#year').val();
        var date1 = $('#date').val();
        //	var language = $('#language').val();

        var business_name = $("#business_name").val();
        var business_address = $("#business_address").val();
        var business_type = $("#business_type").val();
        var dimension = $("#dimension").val();
        var charge_type = $("#charge_type").val();
        var charge = $("#charge").val();
        var from1 = $("#from").val();
        var to1 = $("#to").val();
        var remark2 = $("#remarks2").val();
        var mobile = $("#mobile").val();
        var cus_photo = $("#file_attachother3").val();


        var id = $('#save_update').val();
        var d = new Date(getServerTime());
        var year2 = d.getFullYear();
        var mid = 'CMCC04';
        // var sr_no = $('#srno').val();
        var unique = '';

        if (sr_no >= 0 && sr_no < 10) {
            unique = year2 + mid + '0000' + sr_no;
        } else if (sr_no >= 10 && sr_no < 100) {
            unique = year2 + mid + '000' + sr_no;
        } else if (sr_no >= 100 && sr_no < 1000) {
            unique = year2 + mid + '00' + sr_no;
        } else if (sr_no >= 1000 && sr_no < 10000) {
            unique = year2 + mid + '0' + sr_no;
        } else {
            unique = year2 + mid + sr_no;
        }

        var dateslt = date1.split('/');
        var date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];

        var dateslt = from1.split('/');
        var from = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = to1.split('/');
        var to = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];

        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/adddata",

            data: {
                id: id,
                name: name,
                // ward_no: ward_no,
                // municipalty_ward_no: municipalty_ward_no,
                // language: language,
                // year: year,
                business_name: business_name,
                business_address: business_address,
                business_type: business_type,
                dimension: dimension,
                charge_type: charge_type,
                charge: charge,
                from: from,
                to: to,
                remark2: remark2,
                mobile: mobile,
                cus_photo: cus_photo,
                date: date,
                year2: year2,
                unique_no: unique,
                sr_no: sr_no,
                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                console.log(data);
                if (id == "") {

                    console.log('from false');
                    $('#save_update').val(data);

                    $('#ref_id').val(data);
                    // successTost("Record Saved Successfully");

                } else {
                    //  successTost("Record Saved Successfully");
                    console.log('from true');
                    $('#save_update').val(id);

                    $('#ref_id').val(id);
                }
                datashow();
                //  var id;
                $("#pay").show();
                var r1 = $('table#file_info').find('tbody').find('tr');
                var r = r1.length;
                console.log("row legth=" + r);
                // alert('r=' + r);

                if (r != 0 || r != "0") {
                    for (var i = 0; i < r; i++) {

                        var file = $(r1[i]).find('td:eq(0)').html();
                        var description = $(r1[i]).find('td:eq(1)').html();
                        var ref_id = $('#save_update').val();
                        var certificate_type = "Occupation";
                        //  table_name = "doc_upload";

                        //  alert(ref_id);
                        $.ajax({
                            type: "POST",
                            url: baseurl + "Occuption_c/add_doc",

                            data: {
                                // id: pro_id,
                                ref_id: ref_id,
                                file: file,
                                description: description,
                                certificate_type: certificate_type,
                                //   table_name: table_name,
                            },
                            dataType: "JSON",
                            async: false,
                            success: function(result) {
                                if (result == true) {
                                    successTost("Record Saved Successfully");
                                    $('.closehideshow').trigger('click');

                                } else {
                                    errorTost("Something Wrong", "error");
                                }

                            }

                        });
                    }
                } else {

                    swal("Empty Documents !!", "Hey, your Form is Saved but any documents not uploaded !!", "error");
                }




            }

        });
    }

    $(document).on("submit", "#filter_form", function(e) {
        e.preventDefault();
        datashow();
    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {

        if (role == "admin" || role == "staff") {
            var staff_filter = $("#staff_filter").val();
            $.ajax({
                type: "POST",
                url: baseurl + "Occuption_c/showdata_filtered",
                data: {
                    table_name: table_name,
                    staff_filter: staff_filter,
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
                        '<th><font style="font-weight:bold">Id</font></th>' +
                        '<th><font style="font-weight:bold">Name</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Sr No</font></th>' +
                        '<th><font style="font-weight:bold">Letter</font></th>' +
                        '<th><font style="font-weight:bold">Receipt</font></th>' +
                        '<th><font style="font-weight:bold">Certificate</font></th>' +

                        '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {

                        var fdateval = data[i].date;
                        var fdateslt = fdateval.split('-');
                        var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                        var doc = "";

                        var readonly = '';
                        var readonly1 = '';
                        var readonly2 = '';

                        if (data[i].is_letter == 0) {
                            readonly2 = '';
                            readonly = 'disabled';
                            readonly1 = 'disabled';



                        } else {
                            readonly2 = 'disabled';
                            if (data[i].is_rcpt == 0) {
                                readonly = 'disabled';
                                readonly1 = '';
                            } else {
                                readonly = '';
                                readonly1 = 'disabled';
                            }
                        }





                        html += '<tr>' +
                            '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>' +


                            '<td style="display:none" id="srno_' + data[i].id + '">' + data[i].sr_no + '</td>' +
                            '<td class="not-export-column" ><button name="edit" value="edit" class="letter btn btn-primary" id=' + data[i].id + ' ' + readonly2 + '>Letter</button></td>' +
                            '<td class="not-export-column" ><button name="edit" value="edit" class="reciept btn btn-primary" id=' + data[i].id + ' ' + readonly1 + '>Reciept</button></td>' +
                            '<td class="not-export-column" ><button name="edit" value="edit" class="certificate btn btn-primary" id=' + data[i].id + ' ' + readonly + ' >Certificate</button></td>' +
                            '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=edit_' + data[i].id + '><i class="fa fa-edit"></i></button>';
                        if (role == "admin") {
                            //      html += '&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=delete_' + data[i].id + '><i class="fa fa-trash"></i></button></td>';
                        }

                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#show_master').html(html);
                    $('#myTable').DataTable({});

                }

            });


            $.ajax({
                type: "POST",
                url: baseurl + "Occuption_c/showdata_renew",
                data: {
                    table_name: table_name,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    // console.log('data'+data);
                    var data = eval(data);


                    var html = '';

                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Id</font></th>' +
                        '<th><font style="font-weight:bold">Name</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Sr No</font></th>' +
                        '<th><font style="font-weight:bold">Re-New Receipt</font></th>' +




                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {

                        var fdateval = data[i].date;
                        var fdateslt = fdateval.split('-');
                        var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                        var doc = "";

                        var readonly = '';
                        var readonly1 = '';




                        html += '<tr>' +
                            '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>' +

                            '<td style="display:none" id="srno_' + data[i].id + '">' + data[i].sr_no + '</td>' +
                            '<td class="not-export-column" ><button name="edit" value="edit" class="reciept2 btn btn-primary" id=' + data[i].id + ' >Re-New Reciept</button></td>';


                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#show_master2').html(html);
                    $('#myTable2').DataTable({});
                }
            });



        } else {
            $.ajax({
                type: "POST",
                url: baseurl + "Occuption_c/showdata",
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
                        '<th><font style="font-weight:bold">Id</font></th>' +
                        '<th><font style="font-weight:bold">Name</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Sr No</font></th>' +
                        '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {

                        var fdateval = data[i].date;
                        var fdateslt = fdateval.split('-');
                        var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


                        var download = "";
                        if (data[i].upload_doc != '') {
                            download = '<i class="fa fa-download" aria-hidden="true"></i>';
                        } else {
                            download = '';
                        }

                        html += '<tr>' +
                            '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>' +
                            '<td style="display:none" id="srno_' + data[i].id + '">' + data[i].sr_no + '</td>' +
                            '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=edit_' + data[i].id + '><i class="fa fa-edit"></i></button></td>' +
                            '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#show_master').html(html);
                    $('#myTable').DataTable({});
                }


            });
        }


    }
    //------------------show data in the tabale code end-----------------------------------------------

    //-----------------------delete data code start----------------------------------------------------


    $(document).on('click', '.delete_data', function() {

        var id1 = $(this).attr('id');
        id1 = (id1.split("_"))[1];
        console.log(id1);



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
                        url: baseurl + "Occuption_c/deletedata",
                        dataType: "JSON",
                        data: {
                            id: id1,
                            table_name: table_name,
                        },
                        success: function(data) {
                            if (data == true) {
                                swal("Deleted !!", "Hey, your Data has been deleted !!", "success");
                                $('.closehideshow').trigger('click');
                                $('#save_update').val("");
                                datashow();; //call function show all data	


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
    //-----------------------edit data code start-----------------------------------
    $(document).on("click", ".edit_data", function() {

        $('.formhideshow').show();
        $('.tablehideshow').hide();
        $(".btnhideshow").show();

        var id = $(this).attr('id');
        id = (id.split("_"))[1];
        console.log(id);

        var sr_number = $('#srno_' + id).html();
        sr_no = sr_number;
        var status = $('#status_' + id).html();


        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/showdata_where",
            data: {
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);

                var fdateslt = data[0].date.split('-');
                var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                var fdateslt = data[0].from_date.split('-');
                var form_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


                var fdateslt = data[0].to_date.split('-');
                var to_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                $('#name').val(data[0].name);
                $('#date').val(date1);

                $("#business_name").val(data[0].business_name);
                $("#business_address").val(data[0].business_address);
                $("#business_type").val(data[0].business_type);
                $("#dimension").val(data[0].dimension);
                $("#charge_type").val(data[0].charge_type);
                $("#charge").val(data[0].charge);
                $("#from").val(form_date);
                $("#to").val(to_date);
                $("#remarks2").val(data[0].remark2);
                $("#mobile").val(data[0].mobile);
                $("#file_attachother3").val(data[0].cus_photo);

                $("#msg3").html("<font id='doc_image_name1' color='green'>" + data[0].cus_photo + "</font>");
                $("#image_photo").html('<img src="' + baseurl + '/assets/images/occuption/photo/' + data[0].cus_photo + '" width="50" height="50">');

            }
        });

        var certificate_type = "Occupation";
        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/show_doc_id",
            data: {
                id: id,
                certificate_type: certificate_type,
                //table_name: table_name,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                var r = data.length;
                //   alert(r);
                var row_id = $("#row").val();
                var table = "";
                for (var i = 0; i < r; i++) {

                    row_id = parseInt(row_id) + 1;

                    table += '<tr id="' + row_id + '">' +

                        '<td  id="file_' + row_id + '">' + data[i].file +
                        '</td><td id="description_' + row_id + '">' + data[i].description +

                        '</td><td><button type="button" name="delete" id="' + row_id + '" value="Delete" class="btn delete_data1 btn-danger"><i class="fa fa-trash"></i></button></td></tr>';


                    $('#row').val(row_id);
                    // alert(table);

                }

                $('#file_info_tbody').html(table);
            }
        });


        $('#save_update').val(id);
        $('#ref_id').val(id);
        //   $('#btnprint').val(id);

    });
    $(document).on('click', '.closehideshow', function() {
        $('#master_form')[0].reset();
        $('#save_update').val('');

        $(".tablehideshow").show();
        $(".formhideshow").hide();
        $('#file_info_tbody').html('');
        $('#row').val("0");
        $("#form4").hide();
        $("#form3").hide();
        $("#form2").hide();
        $("#form1").show();
        $("#msg3").html('');
        $("#image_photo").html('');
        datashow();
    });
    $(".btnhideshow").click(function() {
        $("#pay").hide();
        $('#ref_id').val('');
        $(".tablehideshow").hide();
        $(".formhideshow").show();
        var id = $('#save_update').val();
        if (id == "") {
            get_appmaxid();
        }
        getMasterSelect("business_type_master", "#business_type");

    });
    $('#attachment').ajaxfileupload({
        'action': baseurl + 'Occuption_c/doc_image_upload',
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
    $(document).on('click', '#plus', function() {

        var rowid = $('#row').val();

        var row_id = parseInt(rowid) + 1;
        var file = $("#file_attachother").val();
        var remarks = $("#remark").val();

        var id = $("#ids").val();

        if (id != "") {


            $("#file_" + id).html(file);
            $("#remarks_" + id).html(remarks);




        } else {
            //   alert(row_id);
            //$('#file_info_tbody').html('');
            var table = "";

            table = '<tr id="' + row_id + '">' +
                '<td id="file_' + row_id + '">' + file + '</td>' +
                '<td  id="remarks_' + row_id + '">' + remarks + '</td>' +
                '<td>' +
                //  '<button type="button" name="edit" class="edit_data1 btn btn-success" id="' + row_id + '"><i class="fa fa-edit"></i></button>' +
                ' <button type="button" name="delete" value="Delete" class="btn delete_data1 btn-danger"><i class="fa fa-trash"></i></button></td></tr>';

            $('#file_info_tbody').append(table);

            $('#row').val(row_id);
            $('#ids').val('');

        }
        // count_total();
        // formclear();
        $('#file_attachother').val('');
        $('#msg').html('');
        $('#remark').val('');

        $('#ids').val('');
        $("#row").val('');
    });
    $(document).on('click', '.delete_data1', function() {

        if (confirm("Are you sure you want to delete this?")) {

            $(this).parents("tr").remove();

        } else {
            return false;
        }
        // count_total();
    });
    $(document).on('click', '#btnapprove', function() {
        // alert('dfdf');
        var language = $('#language').val();
        var status = "Approved";
        var id = $(this).attr('value');

        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/update_status",

            data: {
                id: id,
                status: status,
                //table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data == true) {
                    successTost("Request Approved");
                    $('#btnapprove').hide();
                    $("#btnreject").hide();
                    datashow();

                } else {
                    errorTost("Something Wrong", "error");
                }
            }
        });

    });
    $(document).on('submit', '#reject_form', function(e) {
        e.preventDefault();
        var id = $("#save_update").val();
        var status = "Rejected";
        var remark = $("#reject_remark").val();
        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/update_status2",

            data: {
                id: id,
                status: status,
                remark: remark,
                //table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data == true) {
                    successTost("Request Rejected");
                    $('#btnapprove').hide();
                    $("#btnreject").hide();
                    datashow();
                    $("#close_model").trigger('click');

                } else {
                    errorTost("Something Wrong", "error");
                }
            }
        });
    });
    $(document).on('click', '#close_model', function(e) {
        e.preventDefault();
        $("#reject_remark").val('');

    });
    $('#attachment2').ajaxfileupload({
        'action': baseurl + 'Occuption_c/doc_image_upload2',
        'onStart': function() { $("#msg2").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg2").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother2").val(response);
                $("#msg2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");

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


    $('#attachment3').ajaxfileupload({
        'action': baseurl + 'Occuption_c/doc_image_upload3',
        'onStart': function() { $("#msg3").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg3").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother3").val(response);
                $("#msg3").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $("#image_photo").html('<img src="' + baseurl + '/assets/images/occuption/photo/' + response + '" width="50" height="50">');
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
    $(document).on('click', '.btnupload', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $("#this_id").val(id);
        var unique_id = $(this).attr('value');
        $("#unique_id").val(unique_id);
        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/get_unique",

            data: {
                id: id,

                //table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

            }
        });
    });
    $(document).on('submit', '#upload_form', function(e) {
        e.preventDefault();
        var id = $("#this_id").val();

        var upload_doc = $("#file_attachother2").val();

        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/update_doc",

            data: {
                id: id,
                upload_doc: upload_doc,

                //table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data == true) {
                    successTost("Document Uploaded");

                    datashow();
                    $("#close_model2").trigger('click');

                } else {
                    errorTost("Something Wrong", "error");
                }
            }
        });
    });
    $(document).on('click', '#close_model2', function(e) {
        e.preventDefault();
        $("#file_attachother2").val('');
        $("#msg2").html('');
    });



    //alert("gg");



    function getMasterSelect(table_name, selecter) {
        // alert("dff");
        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/get_master",
            data: { table_name: table_name },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                html = '';

                if (table_name == "business_type_master") {
                    var department = '';
                    html += '<option selected disabled value="" >Select Business Type</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        department = data[i].business_type;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + department + '</option>';
                    }
                }




                $(selecter).html(html);
            }
        });
    }

    $(document).on('change', '#business_type', function() {
        // alert('dfdf');
        var business_type = $('#business_type').val();


        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/get_amount",

            data: {
                business_type: business_type,
                //table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                $('#charge').val(data);
            }
        });

    });

    $(document).on('click', ".reciept", function() {
        $('#master_form2')[0].reset();
        var date = new Date(getServerTime());
        date = date.toString('dd/MM/yyyy');
        $(".date").val(date);
        $("#bill_date").val(date);
        $("#receipt_date").val(date);
        $('.date').datepicker({
            'todayHighlight': true,
            format: 'dd/mm/yyyy',
            autoclose: true,
        });
        $('#receipt_id').val('');
        $('#ref_id4').val('');
        $('.formhideshow').show();
        $('.tablehideshow').hide();
        //   $(".btnhideshow").show();
        $('#form1').hide();
        $('#form2').show();
        $('#form3').hide();
        $("#form4").hide();
        $("#r_from_dt").prop('readonly', true);
        $("#r_to_dt").prop('readonly', true);

        $('#btnprint2').hide();
        $('#formbtn4').show();

        var id = $(this).attr('id');
        $('#ref_id4').val(id);
        var isNew = true;
        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/getreceipt",
            data: {
                table_name: 'occuption_receipt',
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                var data = eval(data);
                for (var i = 0; i < data.length; i++) {


                    var fdateval = data[i].receipt_date;
                    var fdateslt = fdateval.split('-');
                    var receipt_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].chq_date;
                    var fdateslt = fdateval.split('-');
                    var chq_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].bill_date;
                    var fdateslt = fdateval.split('-');
                    var bill_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    var fdateval = data[i].from_date;
                    var fdateslt = fdateval.split('-');
                    var from_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].to_date;
                    var fdateslt = fdateval.split('-');
                    var to_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    if (receipt_date1 == "00/00/0000") {
                        receipt_date1 = "";
                    }
                    if (chq_date1 == "00/00/0000") {
                        chq_date1 = "";
                    }
                    if (bill_date1 == "00/00/0000") {
                        bill_date1 = "";
                    }

                    if (from_date1 == "00/00/0000") {
                        from_date1 = "";
                    }
                    if (to_date1 == "00/00/0000") {
                        to_date1 = "";
                    }
                    $('#receipt_id').val(data[i].id);
                    $('#btnprint2').val(data[i].id);
                    $('#receipt_no').val(data[i].receipt_no);
                    $('#receipt_date').val(receipt_date1);
                    $('#collection_no').val(data[i].collection_no);
                    $('#counter_no').val(data[i].counter_no);
                    $('#receive_from').val(data[i].receive_from);
                    $('#amt').val(data[i].amt);
                    $('#amt_words').val(data[i].amt_words);
                    $('#function').val(data[i].function);
                    $('#mode').val(data[i].mode);
                    $('#amt2').val(data[i].amt2);
                    $('#chq_no').val(data[i].chq_no);
                    $('#chq_date').val(chq_date1);
                    $('#bank_name').val(data[i].bank);
                    $('#bill_no').val(data[i].bill_no);
                    $('#bill_date').val(bill_date1);
                    $('#details').val(data[i].details);
                    $('#payble').val(data[i].payble);
                    $('#receive_amt').val(data[i].receive_amt);
                    $('#total').val(data[i].total);

                    $('#rec_business_type').val(data[i].business_type);
                    $('#penalty').val(data[i].penalty);
                    $('#r_from_dt').val(from_date1);
                    $('#r_to_dt').val(to_date1);
                    $('#is_renew').val(1);
                    isNew = false;
                }
            }
        });
        //  alert(isNew);
        if (isNew) {
            console.log('from else of receipt');
            //retrive receive from 
            $.ajax({
                type: "POST",
                url: baseurl + "Occuption_c/showdata_where",
                data: {

                    id: id,
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    var data = eval(data);
                    for (var i = 0; i < data.length; i++) {
                        $('#receive_from').val(data[i].name);
                        $('#function').val('Business Occuption Certificate');
                        $('#details').val('Business Occuption Certificate');
                        // to set amount
                        $('#collection_no').val(data[i].remark2);

                        var fdateslt = data[i].from_date.split('-');
                        var form_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


                        var fdateslt = data[i].to_date.split('-');
                        var to_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        $('#r_from_dt').val(form_date);
                        $('#r_to_dt').val(to_date);
                        $('#rec_business_type').val(data[i].business_type_name);
                        $('#is_renew').val(0);
                        var rs = data[i].charge;

                        $('#amt').val(rs);
                        $('#amt_words').val(convertNumberToWords(rs));
                        $('#amt2').val(rs);
                        $('#payble').val(rs);
                        $('#receive_amt').val(rs);
                        $('#total').val(rs);

                        count_receipt_total();
                    }
                }
            });

            var d = new Date(getServerTime());
            //var year = d.getFullYear();
            var year = getCurrentFinancialYear();
            //   alert(year);
            var mid = 'CCMC';
            var receiptno = 14160;
            $.ajax({
                type: 'POST',
                url: baseurl + "Occuption_c/getMaxReceipt",
                data: {
                    year: year
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    console.log('data getbillno');
                    console.log(data);
                    var data = eval(data);
                    if (data.last_receipt == null) {
                        receiptno = 0;
                    } else
                        receiptno = parseInt(data.last_receipt);
                },
                error: function() {}
            });
            console.log('receipt_no' + receiptno);

            receiptno += 1;
            receiptno = '' + receiptno;
            while (receiptno.length < 5) {
                receiptno = '0' + receiptno;
            }
            console.log(receiptno);
            receiptno = year + mid + receiptno;
            console.log(receiptno);
            $('#receipt_no').val(receiptno);
            $('#bill_no').val(receiptno);
        }
    });

    $(document).on('click', ".reciept2", function() {
        $('#master_form2')[0].reset();
        var date = new Date(getServerTime());
        date = date.toString('dd/MM/yyyy');
        $(".date").val(date);
        $("#bill_date").val(date);
        $("#receipt_date").val(date);
        $('.date').datepicker({
            'todayHighlight': true,
            format: 'dd/mm/yyyy',
            autoclose: true,
        });
        $('#receipt_id').val('');
        $('#ref_id4').val('');
        $('.formhideshow').show();
        $('.tablehideshow').hide();
        //   $(".btnhideshow").show();
        $('#form1').hide();
        $('#form2').show();
        $('#form3').hide();
        $("#form4").hide();
        $("#r_from_dt").prop('readonly', false);
        $("#r_to_dt").prop('readonly', false);
        $('#btnprint2').hide();
        $('#formbtn4').show();
        var id = $(this).attr('id');
        //   alert(id);
        $('#ref_id4').val(id);
        var isNew = true;
        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/getreceipt",
            data: {
                table_name: 'occuption_receipt',
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                var data = eval(data);
                for (var i = 0; i < data.length; i++) {


                    var fdateval = data[i].receipt_date;
                    var fdateslt = fdateval.split('-');
                    var receipt_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].chq_date;
                    var fdateslt = fdateval.split('-');
                    var chq_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].bill_date;
                    var fdateslt = fdateval.split('-');
                    var bill_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    var fdateval = data[i].from_date;
                    var fdateslt = fdateval.split('-');
                    var from_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].to_date;
                    var fdateslt = fdateval.split('-');
                    var to_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    if (receipt_date1 == "00/00/0000") {
                        receipt_date1 = "";
                    }
                    if (chq_date1 == "00/00/0000") {
                        chq_date1 = "";
                    }
                    if (bill_date1 == "00/00/0000") {
                        bill_date1 = "";
                    }

                    if (from_date1 == "00/00/0000") {
                        from_date1 = "";
                    }
                    if (to_date1 == "00/00/0000") {
                        to_date1 = "";
                    }
                    $('#receipt_id').val(data[i].id);
                    $('#btnprint2').val(data[i].id);
                    $('#receipt_no').val(data[i].receipt_no);
                    $('#receipt_date').val(receipt_date1);
                    $('#collection_no').val(data[i].collection_no);
                    $('#counter_no').val(data[i].counter_no);
                    $('#receive_from').val(data[i].receive_from);
                    $('#amt').val(data[i].amt);
                    $('#amt_words').val(data[i].amt_words);
                    $('#function').val(data[i].function);
                    $('#mode').val(data[i].mode);
                    $('#amt2').val(data[i].amt2);
                    $('#chq_no').val(data[i].chq_no);
                    $('#chq_date').val(chq_date1);
                    $('#bank_name').val(data[i].bank);
                    $('#bill_no').val(data[i].bill_no);
                    $('#bill_date').val(bill_date1);
                    $('#details').val(data[i].details);
                    $('#payble').val(data[i].payble);
                    $('#receive_amt').val(data[i].receive_amt);
                    $('#total').val(data[i].total);

                    $('#rcpt_no').val(data[i].rcpt_no);

                    $('#rec_business_type').val(data[i].business_type);
                    $('#penalty').val(data[i].penalty);
                    $('#r_from_dt').val(from_date1);
                    $('#r_to_dt').val(to_date1);
                    $('#is_renew').val(1);
                    isNew = false;

                    $('#r_to_dt #r_from_dt').datepicker({
                        'todayHighlight': true,
                        format: 'dd/mm/yyyy',
                        autoclose: true,
                    });

                }
            }
        });
        if (isNew) {
            console.log('from else of receipt');
            //retrive receive from 
            $.ajax({
                type: "POST",
                url: baseurl + "Occuption_c/showdata_where",
                data: {

                    id: id,
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    var data = eval(data);
                    for (var i = 0; i < data.length; i++) {
                        $('#receive_from').val(data[i].name);
                        $('#function').val('Business Occuption Certificate');
                        $('#details').val('Business Occuption Certificate');
                        // to set amount
                        $('#collection_no').val(data[i].remark2);

                        var fdateslt = data[i].from_date.split('-');
                        var form_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


                        var fdateslt = data[i].to_date.split('-');
                        var to_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        $('#r_from_dt').val(form_date);
                        $('#r_to_dt').val(to_date);
                        $('#rec_business_type').val(data[i].business_type_name);
                        $('#is_renew').val(0);
                        var rs = data[i].charge;

                        $('#amt').val(rs);
                        $('#amt_words').val(convertNumberToWords(rs));
                        $('#amt2').val(rs);
                        $('#payble').val(rs);
                        $('#receive_amt').val(rs);
                        $('#total').val(rs);

                        count_receipt_total();
                    }
                }
            });


        }


        var d = new Date(getServerTime());
        var year = d.getFullYear();

        var mid = 'CCMC';
        var receiptno = 14160;
        $.ajax({
            type: 'POST',
            url: baseurl + "Occuption_c/getMaxReceipt",
            data: {
                year: year
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log('data getbillno');
                console.log(data);
                var data = eval(data);
                if (data.last_receipt == null) {
                    receiptno = 0;
                } else
                    receiptno = parseInt(data.last_receipt);
            },
            error: function() {}
        });
        console.log('receipt_no' + receiptno);

        receiptno += 1;
        receiptno = '' + receiptno;
        while (receiptno.length < 5) {
            receiptno = '0' + receiptno;
        }
        console.log(receiptno);
        receiptno = year + mid + receiptno;
        console.log(receiptno);
        $('#receipt_no').val(receiptno);
        $('#bill_no').val(receiptno);



    });



    function count_receipt_total() {
        var rs = $('#amt').val();
        var penalty = $('#penalty').val();
        var qty = $('#counter_no').val();

        var t1 = parseFloat(rs) * parseFloat(qty);
        var t2 = parseFloat(t1) + parseFloat(penalty);


        $('#amt2').val(t2);
        $('#payble').val(t2);
        $('#receive_amt').val(t2);
        $('#total').val(t2);
    }

    $(document).on('blur', "#amt", function() {
        count_receipt_total();
    });
    $(document).on('blur', "#penalty", function() {
        count_receipt_total();
    });
    $(document).on('blur', "#counter_no", function() {
        count_receipt_total();
    });

    function getCurrentFinancialYear() {
        var fiscalyear = "";
        var today = new Date();
        if ((today.getMonth() + 1) <= 3) {
            fiscalyear = today.getFullYear() - 1;
        } else {
            fiscalyear = today.getFullYear();
        }
        return fiscalyear
    }


    function convertNumberToWords(amount) {
        var words = new Array();
        words[0] = '';
        words[1] = 'One';
        words[2] = 'Two';
        words[3] = 'Three';
        words[4] = 'Four';
        words[5] = 'Five';
        words[6] = 'Six';
        words[7] = 'Seven';
        words[8] = 'Eight';
        words[9] = 'Nine';
        words[10] = 'Ten';
        words[11] = 'Eleven';
        words[12] = 'Twelve';
        words[13] = 'Thirteen';
        words[14] = 'Fourteen';
        words[15] = 'Fifteen';
        words[16] = 'Sixteen';
        words[17] = 'Seventeen';
        words[18] = 'Eighteen';
        words[19] = 'Nineteen';
        words[20] = 'Twenty';
        words[30] = 'Thirty';
        words[40] = 'Forty';
        words[50] = 'Fifty';
        words[60] = 'Sixty';
        words[70] = 'Seventy';
        words[80] = 'Eighty';
        words[90] = 'Ninety';
        amount = amount.toString();
        var atemp = amount.split(".");
        var number = atemp[0].split(",").join("");
        var n_length = number.length;
        var words_string = "";
        if (n_length <= 9) {
            var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
            var received_n_array = new Array();
            for (var i = 0; i < n_length; i++) {
                received_n_array[i] = number.substr(i, 1);
            }
            for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
                n_array[i] = received_n_array[j];
            }
            for (var i = 0, j = 1; i < 9; i++, j++) {
                if (i == 0 || i == 2 || i == 4 || i == 7) {
                    if (n_array[i] == 1) {
                        n_array[j] = 10 + parseInt(n_array[j]);
                        n_array[i] = 0;
                    }
                }
            }
            value = "";
            for (var i = 0; i < 9; i++) {
                if (i == 0 || i == 2 || i == 4 || i == 7) {
                    value = n_array[i] * 10;
                } else {
                    value = n_array[i];
                }
                if (value != 0) {
                    words_string += words[value] + " ";
                }
                if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Crores ";
                }
                if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Lakhs ";
                }
                if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Thousand ";
                }
                if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                    words_string += "Hundred and ";
                } else if (i == 6 && value != 0) {
                    words_string += "Hundred ";
                }
            }
            words_string = words_string.split("  ").join(" ");
        }
        return words_string;
    }


    //-----------------------------submit receipt-----------------------------
    $(document).on("submit", "#master_form2", function(e) {
        e.preventDefault();
        var table_name = "occuption_receipt";
        var id = $('#receipt_id').val();
        var ref_id = $('#ref_id4').val();
        var receipt_no = $('#receipt_no').val();
        var receipt_date1 = $('#receipt_date').val();
        var collection_no = $('#collection_no').val();
        var counter_no = $('#counter_no').val();
        var receive_from = $('#receive_from').val();
        var amt = $('#amt').val();
        var amt_words = $('#amt_words').val();
        var functions = $('#function').val();
        var mode = $('#mode').val();
        var amt2 = $('#amt2').val();
        var chq_no = $('#chq_no').val();
        var chq_date1 = $('#chq_date').val();
        var bank = $('#bank_name').val();
        var bill_no = $('#bill_no').val();
        //  var bill_date1 = $('#bill_date').val();
        var details = $('#details').val();
        var payble = $('#payble').val();
        var receive_amt = $('#receive_amt').val();
        var total = $('#total').val();
        var dateslt = receipt_date1.split('/');
        var receipt_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = chq_date1.split('/');
        var chq_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        // var dateslt = bill_date1.split('/');
        // var bill_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var reg_parts = receipt_no.split("CCMC");
        var receipt_year = reg_parts[0];
        var receipt_num = reg_parts[1];

        var business_type = $('#rec_business_type').val();
        var penalty = $('#penalty').val();
        var from1 = $('#r_from_dt').val();
        var to1 = $('#r_to_dt').val();
        var rcpt_no = $('#rcpt_no').val();
        if (rcpt_no == 0) {
            rcpt_no = 1;
        } else {
            rcpt_no = parseInt(rcpt_no) + 1;
        }

        var is_renew = $('#is_renew').val();

        //	alert(is_renew);


        var dateslt = from1.split('/');
        var from = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];

        var dateslt = to1.split('/');
        var to = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];

        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/adddata",
            data: {
                id: id,
                receipt_year: receipt_year,
                receipt_num: receipt_num,
                ref_id: ref_id,
                receipt_no: receipt_no,
                receipt_date: receipt_date,
                collection_no: collection_no,
                counter_no: counter_no,
                receive_from: receive_from,
                amt: amt,
                amt_words: amt_words,
                functions: functions,
                mode: mode,
                amt2: amt2,
                chq_no: chq_no,
                chq_date: chq_date,
                bank: bank,
                bill_no: bill_no,
                //   bill_date: bill_date,
                details: details,
                payble: payble,
                receive_amt: receive_amt,
                total: total,

                business_type: business_type,
                penalty: penalty,
                from: from,
                to: to,
                rcpt_no: rcpt_no,
                is_renew: is_renew,

                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                if (data != "") {
                    successTost("Record Saved Successfully");
                    $('#formbtn4').hide();
                    $('#btnprint2').show();
                    $('#btnprint2').val(data);
                    $('#receipt_id').val(data);
                    console.log(data);
                } else {
                    errorTost("Something Wrong", "error");
                }
            }
        });
    });
    //-----------------------------submit receipt-----------------------------

    //------------------------ Certificate ---------------------------------------------
    $(document).on('click', ".certificate", function() {
        $('.tablehideshow').hide();
        $('.formhideshow').show();
        $("#form1").hide();
        $("#form2").hide();
        $("#form4").hide();
        $("#form3").show();

        $("#c_auto_id").html('');
        $("#c_auto_id2").html('');
        $("#c_today").html('');
        $("#c_today2").html('');
        $("#c_name").html('');
        $("#c_photo").html('');
        $("#c_business_name").html('');
        $("#c_business_address").html('');
        $("#c_mobile").html('');
        $("#c_business_type").html('');
        $("#c_charge_type").html('');
        $("#c_charge").html('');
        $("#c_tot_charge").html('');
        $("#c_tot_charge2").html('');
        $("#c_from").html('');
        $("#c_to").html('');
        $("#c_remark").html('');
        $("#c_dimension").html('');


        table_name = "occuption_certificate";
        var id = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/showdata_where",
            data: {
                table_name: table_name,
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                for (var i = 0; i < data.length; i++) {
                    var fdateslt = data[0].from_date.split('-');
                    var form_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


                    var fdateslt = data[0].to_date.split('-');
                    var to_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    var date = new Date();
                    date = date.toString('dd/MM/yyyy');

                    $("#c_auto_id").html(data[i].id);
                    $("#c_auto_id2").html(data[i].id);
                    $("#c_today").html(date);
                    $("#c_today2").html(date);
                    $("#c_name").html(data[i].name);
                    $("#c_photo").html('<img src="' + baseurl + '/assets/images/occuption/photo/' + data[i].cus_photo + '" width="95px" height="125px">');
                    $("#c_business_name").html(data[i].business_name);
                    $("#c_business_address").html(data[i].business_address);
                    $("#c_mobile").html(data[i].mobile);
                    $("#c_business_type").html(data[i].business_type_name);
                    $("#c_charge_type").html(data[i].charge_type);
                    $("#c_charge").html(data[i].charge);
                    $("#c_tot_charge").html(data[i].charge);
                    $("#c_tot_charge2").html(data[i].charge);
                    $("#c_from").html(form_date);
                    $("#c_to").html(to_date);
                    $("#c_remark").html(data[i].remark2);
                    $("#c_dimension").html(data[i].dimension);


                    if (data[i].is_rcpt == 1) {
                        $.ajax({
                            type: "POST",
                            url: baseurl + "Occuption_c/show_renew_data",
                            data: {

                                id: id,
                            },
                            dataType: "JSON",
                            async: false,
                            success: function(data) {
                                var data = eval(data);

                                // var fdateslt = data[0].date.split('-');
                                // var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                                //	alert(data.length);
                                var html = '';
                                for (var i = 0; i < data.length; i++) {

                                    var sr = i + 1;


                                    var fdateval = data[i].from_date;
                                    var fdateslt = fdateval.split('-');
                                    var from_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                                    var fdateval = data[i].to_date;
                                    var fdateslt = fdateval.split('-');
                                    var to_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                                    var fdateval = data[i].receipt_date;
                                    var fdateslt = fdateval.split('-');
                                    var receipt_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


                                    if (from_date1 == "00/00/0000") {
                                        from_date1 = "";
                                    }
                                    if (to_date1 == "00/00/0000") {
                                        to_date1 = "";
                                    }

                                    if (receipt_date1 == "00/00/0000") {
                                        receipt_date1 = "";
                                    }

                                    if (data[i].rcpt_no == 1) {

                                    } else {
                                        html += '<tr>' +
                                            '<td id="id_' + data[i].id + '" style="border:1px solid #000;">' + sr + '</td>' +
                                            '<td id="name_' + data[i].id + '" style="border:1px solid #000;">' + data[i].receipt_no + '</td>' +
                                            '<td id="date1_' + data[i].id + '" style="border:1px solid #000;">' + receipt_date1 + '</td>' +
                                            '<td id="unique_no_' + data[i].id + '" style="border:1px solid #000;">' + data[i].amt + '</td>' +
                                            '<td id="srno_' + data[i].id + '" style="border:1px solid #000;">' + data[i].penalty + '</td>' +
                                            '<td id="srno_' + data[i].id + '" style="border:1px solid #000;">' + data[i].total + '</td>' +
                                            '<td id="srno_' + data[i].id + '" style="border:1px solid #000;">' + from_date1 + '</td>' +
                                            '<td id="srno_' + data[i].id + '" style="border:1px solid #000;">' + to_date1 + '</td>' +
                                            '<td id="srno_' + data[i].id + '" style="border:1px solid #000;"></td>' +
                                            '</tr>';
                                    }

                                }
                                $("#c_table_renew").html(html);
                            }
                        });
                    } else {
                        $("#c_table_renew").html('');
                    }
                    //  $('.date_of_issue').html(date_of_issue1);
                }
            }
        });
    });
    //------------------------end of Certificate ----------------------------------------

    $(document).on('click', ".letter", function() {
        $('.tablehideshow').hide();
        $('.formhideshow').show();
        $("#form1").hide();
        $("#form2").hide();
        $("#form3").hide();
        $("#form4").show();

        $("#l_today1").html('');
        $("#l_name").html('');
        $("#l_address").html('');
        $("#l_bussiness").html('');
        $("#l_today2").html('');
        $("#letter_id").val('');


        table_name = "occuption_certificate";
        var id = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/showdata_where",
            data: {
                table_name: table_name,
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                for (var i = 0; i < data.length; i++) {


                    var date = new Date();
                    date = date.toString('dd/MM/yyyy');

                    $("#letter_id").val(data[i].id);
                    $("#l_today1").html(date);
                    $("#l_today2").html(date);
                    $("#l_name").html(data[i].name);
                    $("#l_bussiness").html(data[i].business_name);
                    $("#l_address").html(data[i].business_address);




                    //  $('.date_of_issue').html(date_of_issue1);
                }
            }
        });
    });

    $(document).on('click', "#letter_arrrove", function() {
        var id = $("#letter_id").val();

        $.ajax({
            type: "POST",
            url: baseurl + "Occuption_c/letter_approve",
            data: {

                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                if (data != "") {
                    successTost("Letter Approved");
                    datashow();
                    $('.closehideshow').trigger('click');

                } else {
                    errorTost("Something Wrong", "error");
                }
            }
        });

    });

});
