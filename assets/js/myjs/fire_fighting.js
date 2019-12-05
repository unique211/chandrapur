$(document).ready(function() {
    var table_name = "fire_fighting2";
    $('#btnprint2').hide();
    $('#btnprint').hide();

    function getServerTime() {
        return $.ajax({ async: false }).getResponseHeader('Date');
    }
    $(document).on('change', '#language', function() {
        var language = $('#language').val();
        if ($('#save_update').val() != '') {
            // if (language == 'english') {
            //     $('#btnprint2').hide();
            //     $('#btnprint').show();

            //     //   $('#btnprint').val(data);
            // } else {
            //     $('#btnprint').hide();
            //     $('#btnprint2').show();
            // }
        }
    });
    //----------------------------------get max id start---------------------------------------------
    get_appmaxid();
    var sr_no = "";
    var sr_no2 = "";

    function get_appmaxid() {
        $.ajax({
            type: "POST",
            url: baseurl + "Fire_fight/selectmaxid",
            dataType: "JSON",
            async: false,
            data: {
                table_name: 'fire_fighting2',
                id: 'sr_no',
            },
            success: function(data) {


                if (data.sr_no > 0) {
                    var id = parseFloat(data.sr_no) + parseFloat(1);
                    //  $('#srno').val(id);
                    sr_no = id;
                } else {
                    var id = parseFloat(0) + parseFloat(1);
                    // $('#srno').val(id);
                    sr_no = id;
                }
                if (data.sr_no2 > 0) {
                    var id = parseFloat(data.sr_no2) + parseFloat(1);
                    //  $('#srno').val(id);
                    sr_no2 = id;
                } else {
                    var id = parseFloat(0) + parseFloat(1);
                    // $('#srno').val(id);
                    sr_no2 = id;
                }

            }
        });
    }

    //----------------------------------get max id end---------------------------------------------
    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();


        var id = $('#save_update').val();
        var bussiness_name = $('#business_name').val();
        var address = $('#address').val();
        var details_solution = $('#details_solution').val();
        var testing_agency = $('#testing_agency').val();
        var agency_license_no = $('#agency_license_no').val();


        //generate unique number
        var d = new Date(getServerTime());
        var year = d.getFullYear();
        var mid = 'CMCC09';
        var unique = '';

        if (sr_no >= 0 && sr_no < 10) {
            unique = year + mid + '0000' + sr_no;
        } else if (sr_no >= 10 && sr_no < 100) {
            unique = year + mid + '000' + sr_no;
        } else if (sr_no >= 100 && sr_no < 1000) {
            unique = year + mid + '00' + sr_no;
        } else if (sr_no >= 1000 && sr_no < 10000) {
            unique = year + mid + '0' + sr_no;
        } else {
            unique = year + mid + sr_no;
        }


        //generate registration number
        var mid = '1FRCMC';
        var reg_no = '';

        if (sr_no2 >= 0 && sr_no2 < 10) {
            reg_no = year + mid + '000' + sr_no2;
        } else if (sr_no2 >= 10 && sr_no2 < 100) {
            reg_no = year + mid + '00' + sr_no2;
        } else if (sr_no2 >= 100 && sr_no2 < 1000) {
            reg_no = year + mid + '0' + sr_no2;
        } else {
            reg_no = year + mid + sr_no2;
        }



        $.ajax({
            type: "POST",
            url: baseurl + "Fire_fight/adddata",

            data: {
                id: id,
                bussiness_name: bussiness_name,
                address: address,
                details_solution: details_solution,
                testing_agency: testing_agency,
                agency_license_no: agency_license_no,
                language: 'marathi',
                year: year,
                unique_no: unique,
                sr_no: sr_no,
                reg_no: reg_no,
                sr_no2: sr_no2,
                table_name: 'fire_fighting2',
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                console.log(data);
                if (id == "") {

                    console.log('from false');

                    $('.formhideshow').hide();
                    $('.tablehideshow').show();
                    $(".btnhideshow").show();
                    // $('#save_update').val(data);
                    $('#btnprint').val(data);
                    $('#btnprint2').val(data);
                    $('#ref_id').val(data);
                    successTost("Record Saved Successfully");

                } else {
                    successTost("Record Update Successfully");
                    console.log('from true');
                    $('.formhideshow').hide();
                    $('.tablehideshow').show();
                    $(".btnhideshow").show();
                    $('#save_update').val(id);
                    $('#btnprint').val(id);
                    $('#btnprint2').val(id);
                    $('#ref_id').val(id);
                }
                datashow();
                $("#pay").show();

            }

        });

    });
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
                url: baseurl + "Fire_fight/showdata_filtered",
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
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Business Name</font></th>' +
                        '<th><font style="font-weight:bold">Business Address</font></th>' +
                        '<th><font style="font-weight:bold">Details Solutions</font></th>' +
                        '<th><font style="font-weight:bold">Testing Agency</font></th>' +
                        '<th><font style="font-weight:bold">Agency Licence Number</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Certificate Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
                        '<th><font style="font-weight:bold">Registration Number</font></th>' +
                        '<th><font style="font-weight:bold">Status</font></th>' +
                        '<th><font style="font-weight:bold">Remarks</font></th>' +
                        '<th><font style="font-weight:bold">Document</font></th>' +
                        '<th><font style="font-weight:bold">Download</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">language</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Sr_no</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Sr_no2</font></th>' +
                        '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {

                        // var fdateval = data[i].ref_date;
                        // var fdateslt = fdateval.split('-');
                        // var ref_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        // var fdateval = data[i].bill_date;
                        // var fdateslt = fdateval.split('-');
                        // var bill_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        var fdateval = data[i].certificate_date;
                        var fdateslt = fdateval.split('-');
                        var fdt = (fdateslt[2].split(' '))[0];
                        var certificate_date1 = fdt + '/' + fdateslt[1] + '/' + fdateslt[0];

                        var doc = "";
                        if (data[i].status == 'Approved') {
                            doc = '<button class="btn btn-primary btnupload" type="button" id="' + data[i].id + '" name="btnupload" value="' + data[i].unique_no + '" data-toggle="modal" data-target="#myModal2">Upload</button>';
                        } else {
                            doc = '';
                        }
                        var download = "";
                        if (data[i].doc_upload != '') {
                            download = '<i class="fa fa-download" aria-hidden="true"></i>';
                        } else {
                            download = '';
                        }
                        var sr = i + 1;
                        html += '<tr>' +
                            '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].bussiness_name + '</td>' +
                            '<td id="prof_name_' + data[i].id + '">' + data[i].address + '</td>' +
                            '<td id="subject_' + data[i].id + '">' + data[i].details_solution + '</td>' +
                            '<td id="fee_' + data[i].id + '">' + data[i].testing_agency + '</td>' +
                            '<td id="form_no_' + data[i].id + '">' + data[i].agency_license_no + '</td>' +

                            '<td style="display:none" id="certificate_date1_' + data[i].id + '">' + certificate_date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>' +
                            '<td id="reg_no_' + data[i].id + '">' + data[i].reg_no + '</td>' +
                            '<td id="status_' + data[i].id + '">' + data[i].status + '</td>' +
                            '<td id="remark_' + data[i].id + '">' + data[i].remark + '</td>' +
                            '<td id="doc_' + data[i].id + '">' + doc + '</td>' +
                            '<td id="download_' + data[i].id + '"><a href=' + baseurl + 'Fire_fight/download/' + data[i].id + '>' + download + '</a></td>' +
                            '<td style="display:none" id="language_' + data[i].id + '">' + data[i].language + '</td>' +
                            '<td style="display:none" id="sr_no_' + data[i].id + '">' + data[i].sr_no + '</td>' +
                            '<td style="display:none" id="sr_no2_' + data[i].id + '">' + data[i].sr_no2 + '</td>' +
                            '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=edit_' + data[i].id + '><i class="fa fa-edit"></i></button>';
                        if (role == "admin") {
                            html += '&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=delete_' + data[i].id + '><i class="fa fa-trash"></i></button></td>';
                        }

                        html += '</tr>';
                        sr = sr + 1;
                    }
                    html += '</tbody></table>';

                    $('#show_master').html(html);
                    $('#myTable').DataTable({});

                }

            });
        } else {
            $.ajax({
                type: "POST",
                url: baseurl + "Fire_fight/showdata",
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
                        '<th><font style="font-weight:bold">Business Name</font></th>' +
                        '<th><font style="font-weight:bold">Business Address</font></th>' +
                        '<th><font style="font-weight:bold">Details Solutions</font></th>' +
                        '<th><font style="font-weight:bold">Testing Agency</font></th>' +
                        '<th><font style="font-weight:bold">Agency Licence Number</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Certificate Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
                        '<th><font style="font-weight:bold">Registration Number</font></th>' +
                        '<th><font style="font-weight:bold">Status</font></th>' +
                        '<th><font style="font-weight:bold">Remarks</font></th>' +
                        '<th><font style="font-weight:bold">Download</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">language</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Sr_no</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Sr_no2</font></th>' +
                        '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {
                        var sr = i + 1;
                        var fdateval = data[i].certificate_date;
                        var fdateslt = fdateval.split('-');
                        var fdt = (fdateslt[2].split(' '))[0];
                        var certificate_date1 = fdt + '/' + fdateslt[1] + '/' + fdateslt[0];
                        // var fdateval = data[i].ref_date;
                        // var fdateslt = fdateval.split('-');
                        // var ref_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        // var fdateval = data[i].bill_date;
                        // var fdateslt = fdateval.split('-');
                        // var bill_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        // var fdateval = data[i].certificate_date;
                        // var fdateslt = fdateval.split('-');
                        // var certificate_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


                        var download = "";
                        if (data[i].doc_upload != '') {
                            download = '<i class="fa fa-download" aria-hidden="true"></i>';
                        } else {
                            download = '';
                        }

                        html += '<tr>' +
                            '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].bussiness_name + '</td>' +
                            '<td id="prof_name_' + data[i].id + '">' + data[i].address + '</td>' +
                            '<td id="subject_' + data[i].id + '">' + data[i].details_solution + '</td>' +
                            '<td id="fee_' + data[i].id + '">' + data[i].testing_agency + '</td>' +
                            '<td id="form_no_' + data[i].id + '">' + data[i].agency_license_no + '</td>' +
                            '<td style="display:none" id="certificate_date1_' + data[i].id + '">' + certificate_date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>' +
                            '<td id="reg_no_' + data[i].id + '">' + data[i].reg_no + '</td>' +
                            '<td id="status_' + data[i].id + '">' + data[i].status + '</td>' +
                            '<td id="remark_' + data[i].id + '">' + data[i].remark + '</td>' +
                            '<td id="download_' + data[i].id + '"><a href=' + baseurl + 'Fire_fight/download/' + data[i].id + '>' + download + '</a></td>' +
                            '<td style="display:none" id="language_' + data[i].id + '">' + data[i].language + '</td>' +
                            '<td style="display:none" id="sr_no_' + data[i].id + '">' + data[i].sr_no + '</td>' +
                            '<td style="display:none" id="sr_no2_' + data[i].id + '">' + data[i].sr_no2 + '</td>' +
                            '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=edit_' + data[i].id + '><i class="fa fa-edit"></i></button>';
                        if (role == "admin") {
                            html += '&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=delete_' + data[i].id + '><i class="fa fa-trash"></i></button></td>';
                        }

                        html += '</tr>';

                        sr = sr + 1;
                    }
                    html += '</tbody></table>';

                    $('#show_master').html(html);
                    $('#myTable').DataTable({});
                }


            });
        }

        var d = new Date(getServerTime());
        var dt = d.getDate();
        var m = d.getMonth();
        var y = d.getFullYear();
        if (dt < 10) {
            dt = "0" + dt;
        }
        if (m < 10) {
            m = "0" + m;
        }
        date = dt + "/" + m + "/" + y;
        $(".certi_dt").text(date);
        $(".kramank_no").text("");

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
                        url: baseurl + "Fire_fight/deletedata",
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
        $("#pay").show();
        var id = $(this).attr('id');
        id = (id.split("_"))[1];
        console.log(id);



        var sr_number = $('#sr_no_' + id).html();
        sr_no = sr_number;
        var sr_number2 = $('#sr_no2_' + id).html();
        sr_no2 = sr_number2;


        var status = $('#status_' + id).html();
        $('#btnprint').val(id);
        $('#btnprint2').val(id);
        $('#btnapprove').val(id);
        $('#btnreject').val(id);
        if (role == "admin" || role == "staff") {
            if (status == "Pending") {
                $('#btnapprove').show();
                $('#btnreject').show();
                // $('#btnprint').hide();
                $('#btnprint2').hide();
            }
            if (status == "Approved") {
                $('#btnapprove').hide();
                $("#btnreject").hide();
                // if (language == 'marathi') {
                $('#btnprint2').show();
                // $('#btnprint').hide();
                // } else {
                //     //  $('#btnprint').show();
                //     $('#btnprint2').hide();
                // }
            }
            if (status == "Rejected") {
                $('#btnapprove').hide();
                $("#btnreject").hide();
                //  $('#btnprint').hide();
                $('#btnprint2').hide();
            }

        }
        // var certificate_type = "fire_fighting";
        // $.ajax({
        //     type: "POST",
        //     url: baseurl + "Fire_fight/show_doc_id",
        //     data: {
        //         id: id,
        //         certificate_type: certificate_type,
        //         //table_name: table_name,

        //     },
        //     dataType: "JSON",
        //     async: false,
        //     success: function(data) {
        //         var data = eval(data);
        //         var r = data.length;
        //         //   alert(r);
        //         var row_id = $("#row").val();
        //         var table = "";
        //         for (var i = 0; i < r; i++) {

        //             row_id = parseInt(row_id) + 1;

        //             table += '<tr id="' + row_id + '">' +

        //                 '<td  id="file_' + row_id + '">' + data[i].file +
        //                 '</td><td id="description_' + row_id + '">' + data[i].description +

        //                 '</td><td><button type="button" name="delete" id="' + row_id + '" value="Delete" class="btn delete_data1 btn-danger"><i class="fa fa-trash"></i></button></td></tr>';


        //             $('#row').val(row_id);
        //             // alert(table);

        //         }

        //         $('#file_info_tbody').html(table);
        //     }
        // });

        $('#save_update').val(id);
        $('#ref_id').val(id);
        $('#business_name').val($('#name_' + id).html());
        $('.certi_dt').text($('#certificate_date1_' + id).html());
        $('.kramank_no').text($('#reg_no_' + id).html());
        $('#address').val($('#prof_name_' + id).html());
        $('#details_solution').val($('#subject_' + id).html());
        $('#testing_agency').val($('#fee_' + id).html());
        $('#agency_license_no').val($('#form_no_' + id).html());
        $('#btnprint2').val(id);


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
        var d = new Date(getServerTime());
        var dt = d.getDate();
        var m = d.getMonth();
        var y = d.getFullYear();
        if (dt < 10) {
            dt = "0" + dt;
        }
        if (m < 10) {
            m = "0" + m;
        }
        date = dt + "/" + m + "/" + y;
        $(".certi_dt").text(date);
        $(".kramank_no").text("");
    });
    $('#attachment').ajaxfileupload({
        'action': baseurl + 'Fire_fight/doc_image_upload',
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
        // var language = $('#language').val();
        var status = "Approved";
        var id = $(this).attr('value');

        $.ajax({
            type: "POST",
            url: baseurl + "Fire_fight/update_status",

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

                    $('#btnprint2').show();


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
            url: baseurl + "Fire_fight/update_status2",

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
        'action': baseurl + 'Fire_fight/doc_image_upload2',
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
    $(document).on('click', '.btnupload', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $("#this_id").val(id);
        var unique_id = $(this).attr('value');
        $("#unique_id").val(unique_id);
        $.ajax({
            type: "POST",
            url: baseurl + "Fire_fight/get_unique",

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
        // alert(upload_doc);
        $.ajax({
            type: "POST",
            url: baseurl + "Fire_fight/update_doc",

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
});