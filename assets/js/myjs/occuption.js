$(document).ready(function() {
    var table_name = "occuption_certificate";
    $('#btnprint2').hide();
    $('#btnprint').hide();

    function getServerTime() {
        return $.ajax({ async: false }).getResponseHeader('Date');
    }







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
                    // $('#btnprint').val(data);
                    // $('#btnprint2').val(data);
                    $('#ref_id').val(data);
                    // successTost("Record Saved Successfully");

                } else {
                    //  successTost("Record Saved Successfully");
                    console.log('from true');
                    $('#save_update').val(id);
                    // $('#btnprint').val(id);
                    // $('#btnprint2').val(id);
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

                // if (language == 'marathi') {
                //     $('#btnprint2').show();
                //     $('#btnprint').hide();
                // } else {
                //     $('#btnprint2').show();
                //     $('#btnprint').hide();
                // }


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
                        // '<th><font style="font-weight:bold">Name</font></th>' +
                        // '<th><font style="font-weight:bold">Ward_Number</font></th>' +
                        // '<th><font style="font-weight:bold">Municipality Number</font></th>' +
                        '<th><font style="font-weight:bold">Year</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
                        // '<th><font style="font-weight:bold">Status</font></th>' +
                        // '<th><font style="font-weight:bold">Remarks</font></th>' +
                        // '<th><font style="font-weight:bold">Document</font></th>' +
                        // '<th><font style="font-weight:bold">Download</font></th>' +
                        // '<th style="display:none"><font style="font-weight:bold">language</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Sr No</font></th>' +
                        '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {

                        var fdateval = data[i].date;
                        var fdateslt = fdateval.split('-');
                        var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                        var doc = "";
                        if (data[i].status == 'Approved') {
                            doc = '<button class="btn btn-primary btnupload" type="button" id="' + data[i].id + '" name="btnupload" value="' + data[i].unique_no + '" data-toggle="modal" data-target="#myModal2">Upload</button>';
                        } else {
                            doc = '';
                        }
                        var download = "";
                        if (data[i].upload_doc != '') {
                            download = '<i class="fa fa-download" aria-hidden="true"></i>';
                        } else {
                            download = '';
                        }

                        html += '<tr>' +
                            '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                            // '<td id="ward_no_' + data[i].id + '">' + data[i].ward_no + '</td>' +
                            // '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].municipalty_ward_no + '</td>' +
                            // '<td id="year_' + data[i].id + '">' + data[i].year + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>' +
                            //      '<td id="status_' + data[i].id + '">' + data[i].status + '</td>' +
                            // '<td id="remark_' + data[i].id + '">' + data[i].remark + '</td>' +
                            // '<td id="doc_' + data[i].id + '">' + doc + '</td>' +
                            // '<td id="download_' + data[i].id + '"><a href=' + baseurl + 'Occuption_c/download/' + data[i].id + '>' + download + '</a></td>' +
                            //  '<td style="display:none" id="language_' + data[i].id + '">' + data[i].language + '</td>' +
                            '<td style="display:none" id="srno_' + data[i].id + '">' + data[i].sr_no + '</td>' +
                            '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=edit_' + data[i].id + '><i class="fa fa-edit"></i></button>';
                        if (role == "admin") {
                            html += '&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=delete_' + data[i].id + '><i class="fa fa-trash"></i></button></td>';
                        }

                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#show_master').html(html);
                    $('#myTable').DataTable({});

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
                        // '<th><font style="font-weight:bold">Ward_Number</font></th>' +
                        // '<th><font style="font-weight:bold">Municipality Number</font></th>' +
                        // '<th><font style="font-weight:bold">Year</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
                        //   '<th><font style="font-weight:bold">Status</font></th>' +
                        // '<th><font style="font-weight:bold">Remarks</font></th>' +
                        // '<th><font style="font-weight:bold">Download</font></th>' +
                        // '<th style="display:none"><font style="font-weight:bold">language</font></th>' +
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
                            // '<td id="ward_no_' + data[i].id + '">' + data[i].ward_no + '</td>' +
                            // '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].municipalty_ward_no + '</td>' +
                            // '<td id="year_' + data[i].id + '">' + data[i].year + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>' +
                            //  '<td id="status_' + data[i].id + '">' + data[i].status + '</td>' +
                            // '<td id="remark_' + data[i].id + '">' + data[i].remark + '</td>' +
                            // '<td id="download_' + data[i].id + '"><a href=' + baseurl + 'Occuption_c/download/' + data[i].id + '>' + download + '</a></td>' +
                            // '<td style="display:none" id="language_' + data[i].id + '">' + data[i].language + '</td>' +
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
        // $("#pay").show();
        var id = $(this).attr('id');
        id = (id.split("_"))[1];
        console.log(id);
        // var municipalty_ward_no = $('#municipalty_ward_no_' + id).html();
        //  var year = $('#year_' + id).html();
        // var name = $('#name_' + id).html();
        //   var ward_no = $('#ward_no_' + id).html();
        //  var date1 = $('#date1_' + id).html();
        // var language = $('#language_' + id).html();
        var sr_number = $('#srno_' + id).html();
        sr_no = sr_number;
        var status = $('#status_' + id).html();
        // $('#btnprint').val(id);
        // $('#btnprint2').val(id);
        // $('#btnapprove').val(id);
        // $('#btnreject').val(id);
        // if (role == "admin" || role == "staff") {
        //     // if (status == "Pending") {
        //     //     $('#btnapprove').show();
        //     //     $('#btnreject').show();
        //     //     $('#btnprint').hide();
        //     //     $('#btnprint2').hide();
        //     // }
        //     // if (status == "Approved") {
        //     //     $('#btnapprove').hide();
        //     //     $("#btnreject").hide();
        //     //     if (language == "english") {
        //     //         $('#btnprint').show();
        //     //         $('#btnprint2').hide();
        //     //     } else {
        //     //         $('#btnprint2').show();
        //     //         $('#btnprint').hide();
        //     //     }
        //     // }
        //     // if (status == "Rejected") {
        //     //     $('#btnapprove').hide();
        //     //     $("#btnreject").hide();
        //     //     $('#btnprint').hide();
        //     //     $('#btnprint2').hide();
        //     // }

        // }

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
                $("#file_attachother3").val(data[0].cus_photo);

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
        // $('#name').val(name);
        // $('#ward_no').val(ward_no);
        // $('#munici_ward_no').val(municipalty_ward_no);
        // $('#year').val(year);
        // $('#date').val(date1);
        // $('#language').val(language);

        $('#save_update').val(id);
        $('#ref_id').val(id);
        //   $('#btnprint').val(id);

    });
    $(document).on('click', '.closehideshow', function() {
        $('#master_form')[0].reset();
        $('#save_update').val('');
        $('#btnprint').val('');
        $('#btnprint2').val('');
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        $('#file_info_tbody').html('');
        $('#row').val("0");
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
        $('#btnprint2').hide();
        $('#btnprint').hide();
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
                    if (language == 'marathi') {
                        $('#btnprint2').show();
                        $('#btnprint').hide();
                    } else {
                        $('#btnprint').show();
                        $('#btnprint2').hide();
                    }
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


    getMasterSelect("business_type_master", "#business_type");




    function getMasterSelect(table_name, selecter) {

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

});
