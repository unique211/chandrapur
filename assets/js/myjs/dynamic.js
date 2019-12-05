$(document).ready(function() {



    getMasterSelect("department_master", ".department");
    getMasterSelect("zone_master", "#zone_filter");




    function getMasterSelect(table_name, selecter) {

        $.ajax({
            type: "POST",
            url: baseurl + "Settings/get_master",
            data: { table_name: table_name },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                html = '';

                if (table_name == "department_master") {
                    var department = '';
                    html += '<option selected disabled value="" >Select Department</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        department = data[i].department;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + department + '</option>';
                    }
                }
                if (table_name == "zone_master") {
                    var name = '';
                    html += '<option selected  value="All" >All</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].zonename;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                }



                $(selecter).html(html);
            }
        });
    }


    $(document).on("change", "#zone_filter", function(e) {
        e.preventDefault();
        var zoneval = $(this).val();
        $.ajax({
            type: "POST",
            url: baseurl + "Settings/get_subzone",
            data: {
                zoneval: zoneval
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var html = '';
                var name = '';
                if (data.length > 0) {
                    html += '<option selected value="All" >All</option>';

                    for (i = 0; i < data.length; i++) {
                        var id = '';

                        name = data[i].subzonename;
                        id = data[i].id;

                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                    $('#subzone_filter').html(html);
                } else {
                    $('#subzone_filter').html('');
                }

            }
        });
    });

    $(document).on("change", "#subzone_filter", function(e) {
        e.preventDefault();
        var zone = $('#zone_filter').val();
        var subzone = $('#subzone_filter').val();
        var zone_subzone = zone + "_" + subzone;

        $.ajax({
            type: "POST",
            url: baseurl + "Settings/get_staff",
            data: {
                zone_subzone: zone_subzone
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var html = '';
                var name = '';
                if (data.length > 0) {
                    html += '<option selected value="All" >All</option>';

                    for (i = 0; i < data.length; i++) {
                        var id = '';

                        name = data[i].name;
                        id = data[i].user_id;

                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                    $('#staff_filter').html(html);
                } else {
                    $('#staff_filter').html('');
                }

            }
        });
    });

    if (role == "staff") {
        $.ajax({
            type: "POST",
            url: baseurl + "Settings/get_staff_zone",
            data: {
                user_id: user_id
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                //   alert(data);
                var zone_subzone = "";

                if (data.length > 0) {
                    for (i = 0; i < data.length; i++) {
                        zone_subzone = data[i].zone;
                    }
                }
                var split = zone_subzone.split("_");
                var zone = split[0]
                var subzone = split[1]

                $("#zone_filter").val(zone).trigger('change');
                $("#subzone_filter").val(subzone).trigger('change');
                $("#staff_filter").val(user_id).trigger('change');
            }
        });
    }


    function getServerTime() {
        return $.ajax({ async: false }).getResponseHeader('Date');
    }

    dashboard();

    function dashboard() {
        //  alert(department_code);
        if (department_code == 01) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "property_transfer_record";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                        '<th><font style="font-weight:bold">Name</font></th>' +
                        '<th><font style="font-weight:bold">Ward_Number</font></th>' +
                        '<th><font style="font-weight:bold">Municipality Number</font></th>' +
                        '<th><font style="font-weight:bold">Property Number</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>';

                    for (var i = 0; i < data.length; i++) {
                        var sr = i + 1;
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
                            '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                            '<td id="ward_no_' + data[i].id + '">' + data[i].ward_no + '</td>' +
                            '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].municipalty_ward_no + '</td>' +
                            '<td id="property_no_' + data[i].id + '">' + data[i].property_no + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>';


                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });



                }

            });

            var func = "Property Transfer Record";

            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 02) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "inheritance_certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                        '<th><font style="font-weight:bold">Ward_Number</font></th>' +
                        '<th><font style="font-weight:bold">Municipality Number</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>';

                    for (var i = 0; i < data.length; i++) {
                        var date1 = "";



                        if (data[i].date != '') {
                            var fdateval = data[i].date;
                            var fdateslt = fdateval.split('-');
                            date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        }




                        html += '<tr>' +
                            '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                            '<td id="ward_no_' + data[i].id + '">' + data[i].ward_no + '</td>' +
                            '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].municipality_ward_no + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>';


                        html += '</tr>';
                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });

                }


            });
            var func = "Inheritance Certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 03) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "fire_fighting_noc";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                        '<th><font style="font-weight:bold">Prof Name</font></th>' +
                        '<th><font style="font-weight:bold">Subject</font></th>' +
                        '<th><font style="font-weight:bold">Reference Date</font></th>' +
                        '<th><font style="font-weight:bold">Fee</font></th>' +
                        '<th><font style="font-weight:bold">Form Number</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Bill Date</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Fire Name</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Fire Subject</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Certificate Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {

                        var fdateval = data[i].ref_date;
                        var fdateslt = fdateval.split('-');
                        var ref_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        var fdateval = data[i].bill_date;
                        var fdateslt = fdateval.split('-');
                        var bill_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        var fdateval = data[i].certificate_date;
                        var fdateslt = fdateval.split('-');
                        var certificate_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

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
                            '<td id="prof_name_' + data[i].id + '">' + data[i].prof_name + '</td>' +
                            '<td id="subject_' + data[i].id + '">' + data[i].subject + '</td>' +
                            '<td id="ref_date1_' + data[i].id + '">' + ref_date1 + '</td>' +
                            '<td id="fee_' + data[i].id + '">' + data[i].fee + '</td>' +
                            '<td id="form_no_' + data[i].id + '">' + data[i].form_no + '</td>' +
                            '<td style="display:none" id="bill_date1_' + data[i].id + '">' + bill_date1 + '</td>' +
                            '<td style="display:none" id="fire_name_' + data[i].id + '">' + data[i].fire_name + '</td>' +
                            '<td style="display:none" id="fire_sub_' + data[i].id + '">' + data[i].fire_sub + '</td>' +
                            '<td style="display:none" id="certificate_date1_' + data[i].id + '">' + certificate_date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>';


                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });

                }

            });
            var func = "Fire_Fighting_No_Objection_Certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 04) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "occuption_certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                        '<th><font style="font-weight:bold">Ward_Number</font></th>' +
                        '<th><font style="font-weight:bold">Municipality Number</font></th>' +
                        '<th><font style="font-weight:bold">Year</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +

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
                            '<td id="ward_no_' + data[i].id + '">' + data[i].ward_no + '</td>' +
                            '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].municipalty_ward_no + '</td>' +
                            '<td id="year_' + data[i].id + '">' + data[i].year + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>';


                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });

                }

            });
            var func = "Occupation_Certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 05) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "part_certificate";

            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                        '<th><font style="font-weight:bold">Ward_Number</font></th>' +
                        '<th><font style="font-weight:bold">Municipality Number</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
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
                            '<td id="ward_no_' + data[i].id + '">' + data[i].ward_no + '</td>' +
                            '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].municipality_ward_no + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>';


                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });

                }

            });
            var func = "Part_Certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 06) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "zone_certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                        '<th><font style="font-weight:bold">Ward_Number</font></th>' +
                        '<th><font style="font-weight:bold">Municipality Number</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
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
                            '<td id="ward_no_' + data[i].id + '">' + data[i].ward_no + '</td>' +
                            '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].municipality_ward_no + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>';


                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });

                }

            });
            var func = "Zone_Certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 07) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "construction_certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                        '<th><font style="font-weight:bold">Ward_Number</font></th>' +
                        '<th><font style="font-weight:bold">Municipality Number</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
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
                            '<td id="ward_no_' + data[i].id + '">' + data[i].ward_no + '</td>' +
                            '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].municipality_ward_no + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>';


                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });

                }

            });
            var func = "Construction_Certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });


        }
        if (department_code == 08) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "plant_certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                        '<th><font style="font-weight:bold">Ward_Number</font></th>' +
                        '<th><font style="font-weight:bold">Municipality Number</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
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
                            '<td id="ward_no_' + data[i].id + '">' + data[i].ward_no + '</td>' +
                            '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].municipality_ward_no + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>';


                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });

                }

            });
            var func = "Plant_Certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 09) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "fire_fighting2";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                            '<td id="reg_no_' + data[i].id + '">' + data[i].reg_no + '</td>';


                        html += '</tr>';
                        sr = sr + 1;
                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });

                }

            });
            var func = "Fire_Fighting";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 10) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "outstanding_certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                        '<th><font style="font-weight:bold">Income Number</font></th>' +
                        '<th><font style="font-weight:bold">Application Date</font></th>' +
                        '<th style="display:none"><font style="font-weight:bold">Name 2</font></th>' +
                        '<th  style="display:none"><font style="font-weight:bold">Address</font></th>' +
                        '<th  style="display:none"><font style="font-weight:bold">Res_date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {

                        var fdateval = data[i].app_date;
                        var fdateslt = fdateval.split('-');
                        var app_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        var fdateval = data[i].res_date;
                        var fdateslt = fdateval.split('-');
                        var res_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

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
                            '<td id="income_no_' + data[i].id + '">' + data[i].income_no + '</td>' +
                            '<td id="app_date1_' + data[i].id + '">' + app_date1 + '</td>' +
                            '<td style="display:none" id="name2_' + data[i].id + '">' + data[i].name2 + '</td>' +
                            '<td style="display:none" id="address_' + data[i].id + '">' + data[i].address + '</td>' +
                            '<td style="display:none" id="res_date1_' + data[i].id + '">' + res_date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>';


                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });

                }

            });
            var func = "Outstanding_Certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 11) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "noc_certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                        '<th><font style="font-weight:bold">House Number</font></th>' +
                        '<th><font style="font-weight:bold">Word Number</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {

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
                            '<td id="house_no_' + data[i].id + '">' + data[i].house_no + '</td>' +
                            '<td id="ward_no_' + data[i].id + '">' + data[i].ward_no + '</td>' +

                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>';


                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });

                }

            });
            var func = "No Objection_Certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 12) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "resident_certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data",
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
                        '<th><font style="font-weight:bold">Ward Numberr</font></th>' +
                        '<th><font style="font-weight:bold">Municipality Ward Number</font></th>' +
                        '<th><font style="font-weight:bold">Year</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Unique Number</font></th>' +
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
                            '<td id="word_no_' + data[i].id + '">' + data[i].word_no + '</td>' +
                            '<td id="municipality_word_no_' + data[i].id + '">' + data[i].municipality_word_no + '</td>' +
                            '<td id="year_' + data[i].id + '">' + data[i].year + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date1 + '</td>' +
                            '<td id="unique_no_' + data[i].id + '">' + data[i].unique_no + '</td>';


                        html += '</tr>';

                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });

                }

            });
            var func = "Resident_Certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 13) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "";
            var func = "Asset_Detail_Certificate";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 14) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "birth_registration";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data2",
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
                        '<th><font style="font-weight:bold">A No.</font></th>' +
                        '<th><font style="font-weight:bold">Registraion Years</font></th>' +
                        '<th><font style="font-weight:bold">Registration No.</font></th>' +
                        '<th><font style="font-weight:bold">Date Of Birth</font></th>' +
                        '<th><font style="font-weight:bold">Child Name</font></th>' +
                        '<th><font style="font-weight:bold">Mother Name</font></th>' +
                        '<th><font style="font-weight:bold">Father Name</font></th>';

                    html += '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {
                        var sr = i + 1;
                        var fdateval = data[i].dob;
                        var fdateslt = fdateval.split('-');
                        var dob1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        html += '<tr>' +
                            '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].reg_year + '</td>' +
                            '<td id="ward_no_' + data[i].id + '">' + data[i].reg_no + '</td>' +
                            '<td id="municipalty_ward_no_' + data[i].id + '">' + dob1 + '</td>' +
                            '<td id="ward_no_' + data[i].id + '">' + data[i].child_name_m + '</td>' +
                            '<td id="ward_no_' + data[i].id + '">' + data[i].mother_name_m + '</td>' +
                            '<td id="ward_no_' + data[i].id + '">' + data[i].father_name_m + '</td>';

                        html += '</tr>';


                    }
                    html += '</tbody></table>';
                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
            var func = "Birth_Registration";
            //var func = "Death_Registration";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income",
                data: {
                    func: func,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
        if (department_code == 15) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "marrige_registration";
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data2",
                data: {
                    table_name: table_name,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    $('#myTable2 tbody').empty();
                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    var index = 1;
                    var tot_amt = 0;
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Groom Name</font></th>' +
                        '<th><font style="font-weight:bold">Groom Address</font></th>' +
                        '<th><font style="font-weight:bold">Bride Name</font></th>' +
                        '<th><font style="font-weight:bold">Bride Address</font></th>' +
                        '<th><font style="font-weight:bold">Wedding Date </font></th>' +
                        '<th><font style="font-weight:bold">Wedding Address </font></th>';

                    html += '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    for (var i = 0; i < data.length; i++) {
                        var fdateval = data[i].date_of_marrige;
                        var fdateslt = fdateval.split('-');
                        var date_of_marrige1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        var readonly = '';
                        if (data[i].amount != null) {
                            tot_amt = parseInt(data[i].amount) + parseInt(tot_amt);
                        }

                        if (data[i].mr_id == null)
                            readonly = 'disabled';
                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receiptno + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].c_name + '</td>' +
                            '<td id="ward_no_' + data[i].id + '">' + data[i].c_address + '</td>' +
                            '<td id="municipalty_ward_no_' + data[i].id + '">' + data[i].g_previous_name + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + data[i].g_previous_address + '</td>' +
                            '<td id="date1_' + data[i].id + '">' + date_of_marrige1 + '</td>' +
                            '<td id="wedding_place_' + data[i].id + '">' + data[i].wedding_place + '</td>';


                        html += '</tr>';

                        index++;


                    }
                    html += '</tbody></table>';
                    $('#department_wise').html(html);


                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });

            $.ajax({
                type: "POST",
                url: baseurl + "Settings/dept_wise_income2",
                data: {


                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Name</font></th>' +

                        '<th><font style="font-weight:bold">Mobile Number</font></th>' +
                        '<th><font style="font-weight:bold">Amount</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="receipt_no_' + data[i].id + '">' + data[i].receipt_no + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                            '<td id="mobile_' + data[i].id + '">' + data[i].mobile + '</td>' +
                            '<td id="payble_amt_' + data[i].id + '">' + data[i].payble_amt + '</td>' +


                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });


        }
        if (department_code == 16) {
            $('#department_wise').html('');
            $('#department_wise_right').html('');
            var table_name = "cash_counter";

            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data3",
                data: {
                    table_name: table_name,

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Document Details</font></th>' +

                        '<th><font style="font-weight:bold">Amount</font></th>' +
                        '<th><font style="font-weight:bold">Function</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {


                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="id_' + data[i].id + '">' + data[i].receipt_no + '</td>' +

                            '<td id="ward_no_' + data[i].id + '">' + data[i].collection_no + '</td>' +

                            '<td id="amt_' + data[i].id + '">' + data[i].amt + '</td>' +
                            '<td id="function_' + data[i].id + '">' + data[i].function+'</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise').html(html);
                    $('#myTable').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });

            $.ajax({
                type: "POST",
                url: baseurl + "Settings/deptwise_data3",
                data: {
                    table_name: 'miscellaneous_cash_counter',

                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    var data = eval(data);
                    var html = '';
                    html += '<table id="myTable2" class="table table-striped">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                        '<th><font style="font-weight:bold">Receipt No.</font></th>' +
                        '<th><font style="font-weight:bold">Date</font></th>' +
                        '<th><font style="font-weight:bold">Name</font></th>' +

                        '<th><font style="font-weight:bold">Mobile Number</font></th>' +
                        '<th><font style="font-weight:bold">No of Coppies</font></th>' +

                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {
                        var fdateval = data[i].receipt_date;
                        var fdateslt = fdateval.split('-');
                        var dt_receipt = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                        html += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td id="receipt_no_' + data[i].id + '">' + data[i].receipt_no + '</td>' +
                            '<td id="dt_receipt_' + data[i].id + '">' + dt_receipt + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                            '<td id="mobile_' + data[i].id + '">' + data[i].mobile + '</td>' +
                            '<td id="no_of_copy_' + data[i].id + '">' + data[i].no_of_copy + '</td>' +

                            '</tr>';
                        index++;
                    }
                    html += '</tbody></table>';

                    $('#department_wise_right').html(html);
                    $('#myTable2').DataTable({
                        searching: false,
                        "lengthChange": false
                    });
                }
            });
        }
    }


});