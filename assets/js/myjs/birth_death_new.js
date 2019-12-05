$(document).ready(function() {
    var table_name = "birth_registration";
    // $(".formhideshow").hide();
    $(".tablehideshow").show();
    $(document).on('click', '.closehideshow', function() {

        $('#save_update').val('');
        // $('#btnprint').val('');
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        $('#master_form')[0].reset();
        $('#master_form2')[0].reset();
        $('#master_form3')[0].reset();
        $('#master_form4')[0].reset();
        $("#form1").hide();
        $("#form2").hide();
        $("#form3").hide();
        $("#form4").hide();
        $("#form5").hide();
    });

    $(".btnhideshow").click(function() {
        // alert("hide");
        $(".tablehideshow").hide();
        $(".formhideshow").show();
        $("#form1").show();
    });


    $(document).on("change", "#attention_type", function() {

        var attention_type = $('#attention_type option:selected').text();

        if (attention_type == "Hospital") {
            $('#informant_name1').show();
            $('#informant_name').hide();
        } else {
            $('#informant_name').show();
            $('#informant_name1').hide();
        }

    });


    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form", function(e) {

        e.preventDefault();
        var applicant_name = $('#applicant_name').val();
        var applicant_mobile = $('#applicant_mno').val();
        var reg_year = $('#reg_year').val();
        var zone = $('#zone').val();
        var ward = $('#ward_area').val();
        var reg_no = $('#register_no').val();
        var page_no = $('#page_no').val();
        var reg_date1 = $('#reg_date').val();
        var reg_no2 = $('#registration_no').val();
        var dob1 = $('#date').val();
        var birth_place = $('#birth_place').val();
        var birth_address = $('#birth_address').val();
        var birth_type = $('#type_birth').val();
        var birth_place2 = $('#birth_place2').val();
        var birth_address2 = $('#birth_address2').val();
        var birth_place3 = $('#birth_place3').val();
        var orphaned_birth = $('input[name=orphaned_birth]:checked').val();
        var child_name = $('#child_name').val();
        var baby_name = $('#baby_name').val();
        var gender = $('input[name=gender]:checked').val();
        var father_name = $('#father_name').val();
        var mother_name = $('#mother_name').val();
        var mother_address = $('#mother_address').val();
        var father_full_name = $('#father_full_name').val();
        var mother_full_name = $('#mother_full_name').val();
        var mother_address2 = $('#mother_address2').val();
        var father_business = $('#father_business').val();
        var mother_business = $('#mother_business').val();
        var mother_dob1 = $('#mother_dob').val();
        var father_edu = $('#father_eduction').val();
        var mother_edu = $('#mother_eduction').val();
        var mother_age_at_birth = $('#mother_age_birth').val();
        var religion = $('#Religion').val();
        var nationality = $('#nationality').val();
        var parent_perminent_address = $('#parent_permanet_address').val();
        var parent_addresss_at_birth = $('#Parent_Address_Time_of_Birth').val();
        var perminent_address = $('#perminent_address').val();
        var no_of_child = $('#no_surviving_children').val();
        var attention_type = $('#attention_type').val();
        var informant_type = "";
        var address_of_informer = $('#address_of_informer').val();
        var delivery_method = $('#delivery_method').val();
        var name_info_provider = $('#information_provider').val();
        var informant_address = $('#information_address').val();
        var city = $('#city').val();
        var reg_unit = $('#registration_unit').val();
        var police_station = $('#police_station').val();
        var fir_no = $('#fir_no').val();
        var police_station_address = $('#police_station_address').val();
        var name_of_court = $('#name_court').val();
        var court_order_no = $('#court_orderno').val();
        var court_order_date1 = $('#court_order_date').val();
        var additional_remarks = $('#additional_remark').val();
        var id = $('#save_update').val();

        if (attention_type == "Hospital") {
            informant_type = $('#informant_name1').val();

        } else {
            informant_type = $('#informant_name').val();

        }

        var dateslt = reg_date1.split('/');
        var reg_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = dob1.split('/');
        var dob = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = mother_dob1.split('/');
        var mother_dob = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        var dateslt = court_order_date1.split('/');
        var court_order_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];

        $.ajax({
            type: "POST",
            url: baseurl + "Birth/adddata",

            data: {
                id: id,
                applicant_name: applicant_name,
                applicant_mobile: applicant_mobile,
                reg_year: reg_year,
                zone: zone,
                ward: ward,
                reg_no: reg_no,
                page_no: page_no,
                reg_date: reg_date,
                reg_no2: reg_no2,
                dob: dob,
                birth_place: birth_place,
                birth_address: birth_address,
                birth_type: birth_type,
                birth_place2: birth_place2,
                birth_address2: birth_address2,
                birth_place3: birth_place3,
                orphaned_birth: orphaned_birth,
                child_name: child_name,
                baby_name: baby_name,
                gender: gender,
                father_name: father_name,
                mother_name: mother_name,
                mother_address: mother_address,
                father_full_name: father_full_name,
                mother_full_name: mother_full_name,
                mother_address2: mother_address2,
                father_business: father_business,
                mother_business: mother_business,
                mother_dob: mother_dob,
                father_edu: father_edu,
                mother_edu: mother_edu,
                mother_age_at_birth: mother_age_at_birth,
                religion: religion,
                nationality: nationality,
                parent_perminent_address: parent_perminent_address,
                parent_addresss_at_birth: parent_addresss_at_birth,
                perminent_address: perminent_address,
                no_of_child: no_of_child,
                attention_type: attention_type,
                informant_type: informant_type,
                address_of_informer: address_of_informer,
                delivery_method: delivery_method,
                name_info_provider: name_info_provider,
                informant_address: informant_address,
                city: city,
                reg_unit: reg_unit,
                police_station: police_station,
                fir_no: fir_no,
                police_station_address: police_station_address,
                name_of_court: name_of_court,
                court_order_no: court_order_no,
                court_order_date: court_order_date,
                additional_remarks: additional_remarks,
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                console.log(data);

                if (data == true) {
                    if (id == "") {
                        successTost("Record Saved Successfully");
                    } else {
                        successTost("Record Updated Successfully");
                    }

                } else {
                    errorTost("Something Wrong", "error");
                }
                //   $('#master_form')[0].reset();
                $('#form1').hide();

                $(".tablehideshow").show();
                datashow();


            }

        });

    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {

        $.ajax({
            type: "POST",
            url: baseurl + "Birth/showdata",
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
                    '<th><font style="font-weight:bold">Baby Name</font></th>' +
                    '<th><font style="font-weight:bold">Mother Name</font></th>' +
                    '<th><font style="font-weight:bold">Father Name</font></th>' +
                    '<th><font style="font-weight:bold">See</font></th>' +
                    '<th><font style="font-weight:bold">Checklist</font></th>' +
                    '<th><font style="font-weight:bold">Appointment</font></th>' +
                    '<th><font style="font-weight:bold">Application form</font></th>' +
                    '<th><font style="font-weight:bold">Registration acknowledgment</font></th>' +
                    '<th><font style="font-weight:bold">Appeal</font></th>' +
                    '<th><font style="font-weight:bold">Certificate</font></th>' +
                    '<th><font style="font-weight:bold">Upload</font></th>' +
                    '</tr>' +
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
                        '<td id="ward_no_' + data[i].id + '">' + data[i].baby_name + '</td>' +
                        '<td id="ward_no_' + data[i].id + '">' + data[i].mother_full_name + '</td>' +
                        '<td id="ward_no_' + data[i].id + '">' + data[i].father_full_name + '</td>' +
                        //&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button>
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-primary" style="color: #fff;background-color: #337ab7;border-color: #2e6da4;" id=' + data[i].id + '>See</button></td>' +
                        '<td class="not-export-column" ><button name="chk" value="chk" class="chk_list btn btn-primary" style="color: #fff;background-color: #337ab7;border-color: #2e6da4;" id=' + data[i].id + '>Checklist</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="appoint_ment btn btn-primary" style="color: #fff;background-color: #337ab7;border-color: #2e6da4;" id=' + data[i].id + '>Apointment</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="app_form btn btn-primary" style="color: #fff;background-color: #337ab7;border-color: #2e6da4;" id=' + data[i].id + '>Application form</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="acknowledgment btn btn-primary" style="color: #fff;background-color: #337ab7;border-color: #2e6da4;" id=' + data[i].id + '>Registration acknowledgment</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data1 btn btn-primary" style="color: #fff;background-color: #337ab7;border-color: #2e6da4;" id=' + data[i].id + '>Appeal</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="certificate btn btn-primary" style="color: #fff;background-color: #337ab7;border-color: #2e6da4;" id=' + data[i].id + '>Certificate</button></td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data3 btn btn-primary" style="color: #fff;background-color: #337ab7;border-color: #2e6da4;" id=' + data[i].id + '>Upload</button></td>' +
                        '</tr>';

                }
                html += '</tbody></table>';

                $('#show_master').html(html);
                $('#myTable').DataTable({});

            }

        });

    }
    //------------------show data in the tabale code end-----------------------------------------------

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
                        url: baseurl + "Birth/deletedata",
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
        $('.tablehideshow').hide();
        $('.formhideshow').show();

        $("#form1").show();
        $(".btnhideshow").show();
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: baseurl + "Birth/showdatawhere",
            data: {
                table_name: table_name,
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {

                    var fdateval = data[i].reg_date;
                    var fdateslt = fdateval.split('-');
                    var reg_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].dob;
                    var fdateslt = fdateval.split('-');
                    var dob1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].mother_dob;
                    var fdateslt = fdateval.split('-');
                    var mother_dob1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].court_order_date;
                    var fdateslt = fdateval.split('-');
                    var court_order_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    if (reg_date1 == "00/00/0000") {
                        reg_date1 = "";
                    }
                    if (dob1 == "00/00/0000") {
                        dob1 = "";
                    }
                    if (mother_dob1 == "00/00/0000") {
                        mother_dob1 = "";
                    }
                    if (court_order_date1 == "00/00/0000") {
                        court_order_date1 = "";
                    }

                    var gender = data[i].gender;
                    var orphaned_birth = data[i].orphaned_birth;


                    $('#save_update').val(id);
                    $('#applicant_name').val(data[i].applicant_name);
                    $('#applicant_mno').val(data[i].applicant_mobile);
                    $('#register_no').val(data[i].reg_no);
                    $('#page_no').val(data[i].page_no);
                    $('#reg_date').val(reg_date1);
                    $('#registration_no').val(data[i].reg_no2);
                    $('#date').val(dob1);
                    $('#birth_place').val(data[i].birth_place);
                    $('#birth_address').val(data[i].birth_address);
                    $('#type_birth').val(data[i].birth_type);
                    $('#birth_place2').val(data[i].birth_place2);
                    $('#birth_address2').val(data[i].birth_address2);
                    $('#birth_place3').val(data[i].birth_place3);

                    if (orphaned_birth == "Yes") {
                        $("#Yes").prop("checked", true);
                    } else {
                        $("#No").prop("checked", true);
                    }
                    $('#child_name').val(data[i].child_name);
                    $('#baby_name').val(data[i].baby_name);
                    if (gender == "men") {
                        $("#men").prop("checked", true);
                    } else {
                        $("#woman").prop("checked", true);
                    }
                    var attention_type = data[i].attention_type;
                    var informant_type = data[i].informant_type;

                    $('#father_name').val(data[i].father_name);
                    $('#mother_name').val(data[i].mother_name);
                    $('#mother_address').val(data[i].mother_address);
                    $('#father_full_name').val(data[i].father_full_name);
                    $('#mother_full_name').val(data[i].mother_full_name);
                    $('#mother_address2').val(data[i].mother_address2);
                    $('#father_business').val(data[i].father_business);
                    $('#mother_business').val(data[i].mother_business);
                    $('#mother_dob').val(mother_dob1);
                    $('#father_eduction').val(data[i].father_edu);
                    $('#mother_eduction').val(data[i].mother_edu);
                    $('#mother_age_birth').val(data[i].mother_age_at_birth);
                    $('#Religion').val(data[i].religion);
                    $('#nationality').val(data[i].nationality);
                    $('#parent_permanet_address').val(data[i].parent_perminent_address);
                    $('#Parent_Address_Time_of_Birth').val(data[i].parent_addresss_at_birth);
                    $('#perminent_address').val(data[i].perminent_address);
                    $('#no_surviving_children').val(data[i].no_of_child);
                    $('#attention_type').val(attention_type).trigger("change");
                    if (attention_type == "Hospital") {
                        $('#informant_name1').val(informant_type);

                    } else {
                        $('#informant_name').val(informant_type);

                    }
                    $('#address_of_informer').val(data[i].address_of_informer);
                    $('#delivery_method').val(data[i].delivery_method);
                    $('#information_provider').val(data[i].name_info_provider);
                    $('#information_address').val(data[i].informant_address);
                    $('#city').val(data[i].city);
                    $('#registration_unit').val(data[i].reg_unit);
                    $('#police_station').val(data[i].police_station);
                    $('#fir_no').val(data[i].fir_no);
                    $('#police_station_address').val(data[i].police_station_address);
                    $('#name_court').val(data[i].name_of_court);
                    $('#court_orderno').val(data[i].court_order_no);
                    $('#court_order_date').val(court_order_date1);
                    $('#additional_remark').val(data[i].additional_remarks);

                }
            }
        });




    });
    //-----------------------appoint_ment code start-----------------------------------
    $(document).on("click", ".appoint_ment", function() {
        $('.tablehideshow').hide();
        $('.formhideshow').show();

        $("#form3").show();
        $(".btnhideshow").show();
        table_name = "birth_registration";
        var id = $(this).attr('id');
        $('#appointment_id').val('');
        $('#register_id').val('');
        $.ajax({
            type: "POST",
            url: baseurl + "Birth/showdatawhere_register",
            data: {
                table_name: table_name,
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {
                    $('#applicant_mno3').val(data[i].applicant_mobile);

                    $('#registration_no3').val(data[i].reg_no);
                }
                $('#register_id').val(id);
                $.ajax({
                    type: "POST",
                    url: baseurl + "Birth/showdatawhere_appointment",
                    data: {

                        id: id,
                    },
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        var data = eval(data);
                        for (var i = 0; i < data.length; i++) {
                            var fdateval = data[i].date;
                            var fdateslt = fdateval.split('-');
                            var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                            $('#appo_date').val(date1);
                            $('#time').val(data[i].time);
                            $('#message').val(data[i].message);
                            $('#appointment_id').val(data[i].id);
                        }
                    }
                });
            }
        });
    });
    //-----------------------appoint_ment code end-------------------------------------
    //-----------------------chk_list code start-----------------------------------
    $(document).on("click", ".chk_list", function() {
        $('.tablehideshow').hide();
        $('.formhideshow').show();
        $('#master_form2')[0].reset();
        $("#form2").show();
        $("#file_attachother1").val('');
        $("#msg1").html('');
        $("#file_attachother2").val('');
        $("#msg2").html('');
        $("#file_attachother3").val('');
        $("#msg3").html('');
        $("#file_attachother4").val('');
        $("#msg4").html('');
        $("#file_attachother5").val('');
        $("#msg5").html('');
        $("#file_attachother6").val('');
        $("#msg6").html('');
        $("#chk_court_reg").val(0);
        $("#chk_id_proof").val(0);
        $("#chk_cer_delivery").val(0);
        $("#chk_affidavit").val(0);
        $("#chk_noc").val(0);
        $("#chk_order").val(0);
        $(".btnhideshow").show();
        $("#attachment1").hide();
        $("#attachment2").hide();
        $("#attachment3").hide();
        $("#attachment4").hide();
        $("#attachment5").hide();
        $("#attachment6").hide();
        $("#down1").html('');
        $("#down2").html('');
        $("#down3").html('');
        $("#down4").html('');
        $("#down5").html('');
        $("#down6").html('');
        // table_name = "birth_registration";
        //  var id = $(this).attr('id');
        //$.session.set('chklist_id', id);
        table_name = "birth_documents";
        var id = $(this).attr('id');
        $('#chklist_id').val(id);
        // $('#appointment_id').val('');
        // $('#register_id').val('');
        $.ajax({
            type: "POST",
            url: baseurl + "Birth/showdatawhere_document",
            data: {

                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                var download1 = "";
                var download2 = "";
                var download3 = "";
                var download4 = "";
                var download5 = "";
                var download6 = "";
                for (var i = 0; i < data.length; i++) {
                    var ch_id = data[i].id;
                    var chk_id_proof = data[i].chk_id_proof;
                    var chk_cer_delivery = data[i].chk_cer_delivery;
                    var chk_affidavit = data[i].chk_affidavit;
                    var chk_noc = data[i].chk_noc;
                    var chk_court_reg = data[i].chk_court_reg;
                    var chk_order = data[i].chk_order;
                    var file_id_proof = data[i].file_id_proof;
                    var file_cer_delivery = data[i].file_cer_delivery;
                    var file_affidavit = data[i].file_affidavit;
                    var file_noc = data[i].file_noc;
                    var file_court_reg = data[i].file_court_reg;
                    var file_order = data[i].file_order;



                    $('#chk_list_form').val(ch_id);
                    if (chk_id_proof == 1) {
                        $('#chk_id_proof').prop('checked', true);
                        $('#chk_id_proof').val(1).trigger("change");
                    } else {
                        $('#chk_id_proof').prop('checked', false);
                        $('#chk_id_proof').val(0).trigger("change");
                    }
                    if (chk_cer_delivery == 1) {
                        $('#chk_cer_delivery').prop('checked', true);
                        $('#chk_cer_delivery').val(1).trigger("change");
                    } else {
                        $('#chk_cer_delivery').prop('checked', false);
                        $('#chk_cer_delivery').val(0).trigger("change");
                    }
                    if (chk_affidavit == 1) {
                        $('#chk_affidavit').prop('checked', true);
                        $('#chk_affidavit').val(1).trigger("change");
                    } else {
                        $('#chk_affidavit').prop('checked', false);
                        $('#chk_affidavit').val(0).trigger("change");
                    }
                    if (chk_noc == 1) {
                        $('#chk_noc').prop('checked', true);
                        $('#chk_noc').val(1).trigger("change");
                    } else {
                        $('#chk_noc').prop('checked', false);
                        $('#chk_noc').val(0).trigger("change");
                    }
                    if (chk_court_reg == 1) {
                        $('#chk_court_reg').prop('checked', true);
                        $('#chk_court_reg').val(1).trigger("change");
                    } else {
                        $('#chk_court_reg').prop('checked', false);
                        $('#chk_court_reg').val(0).trigger("change");
                    }
                    if (chk_order == 1) {
                        $('#chk_order').prop('checked', true);
                        $('#chk_order').val(1).trigger("change");
                    } else {
                        $('#chk_order').prop('checked', false);
                        $('#chk_order').val(0).trigger("change");
                    }
                    $('#file_attachother1').val(file_id_proof);
                    $("#msg1").html("<font id='doc_image_name1' color='green'>" + file_id_proof + "</font>");
                    $('#file_attachother2').val(file_cer_delivery);
                    $("#msg2").html("<font id='doc_image_name1' color='green'>" + file_cer_delivery + "</font>");
                    $('#file_attachother3').val(file_affidavit);
                    $("#msg3").html("<font id='doc_image_name1' color='green'>" + file_affidavit + "</font>");
                    $('#file_attachother4').val(file_noc);
                    $("#msg4").html("<font id='doc_image_name1' color='green'>" + file_noc + "</font>");
                    $('#file_attachother5').val(file_court_reg);
                    $("#msg5").html("<font id='doc_image_name1' color='green'>" + file_court_reg + "</font>");
                    $('#file_attachother6').val(file_order);
                    $("#msg6").html("<font id='doc_image_name1' color='green'>" + file_order + "</font>");

                    if (file_id_proof != '') {
                        download1 = '<i class="fa fa-download" aria-hidden="true"></i>';
                    } else {
                        download1 = '';
                    }
                    if (file_cer_delivery != '') {
                        download2 = '<i class="fa fa-download" aria-hidden="true"></i>';
                    } else {
                        download2 = '';
                    }
                    if (file_affidavit != '') {
                        download3 = '<i class="fa fa-download" aria-hidden="true"></i>';
                    } else {
                        download3 = '';
                    }
                    if (file_noc != '') {
                        download4 = '<i class="fa fa-download" aria-hidden="true"></i>';
                    } else {
                        download4 = '';
                    }
                    if (file_court_reg != '') {
                        download5 = '<i class="fa fa-download" aria-hidden="true"></i>';
                    } else {
                        download5 = '';
                    }
                    if (file_order != '') {
                        download6 = '<i class="fa fa-download" aria-hidden="true"></i>';
                    } else {
                        download6 = '';
                    }
                    $("#down1").html('<a href=' + baseurl + 'Birth/download/' + file_id_proof + '>' + download1 + '</a>');
                    $("#down2").html('<a href=' + baseurl + 'Birth/download/' + file_cer_delivery + '>' + download2 + '</a>');
                    $("#down3").html('<a href=' + baseurl + 'Birth/download/' + file_affidavit + '>' + download3 + '</a>');
                    $("#down4").html('<a href=' + baseurl + 'Birth/download/' + file_noc + '>' + download4 + '</a>');
                    $("#down5").html('<a href=' + baseurl + 'Birth/download/' + file_court_reg + '>' + download5 + '</a>');
                    $("#down6").html('<a href=' + baseurl + 'Birth/download/' + file_order + '>' + download6 + '</a>');

                }
            }
        });

    });
    //-----------------------chk_list code end-------------------------------------
    //----------------------upload file code start-----------------------------------------
    // var chklist_id = $('#chklist_id').val();
    $('#attachment1').ajaxfileupload({


        'action': baseurl + 'Birth/doc_image_upload1',
        'onStart': function() { $("#msg1").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg1").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother1").val(response);
                $("#msg1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother1").val(response);
                $("#msg1").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
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
    $('#attachment2').ajaxfileupload({


        'action': baseurl + 'Birth/doc_image_upload2',
        'onStart': function() { $("#msg2").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg2").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother2").val(response);
                $("#msg2").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother2").val(response);
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


        'action': baseurl + 'Birth/doc_image_upload3',
        'onStart': function() { $("#msg3").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg3").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother3").val(response);
                $("#msg3").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother3").val(response);
                $("#msg3").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
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
    $('#attachment4').ajaxfileupload({


        'action': baseurl + 'Birth/doc_image_upload4',
        'onStart': function() { $("#msg4").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg4").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother4").val(response);
                $("#msg4").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother4").val(response);
                $("#msg4").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
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
    $('#attachment5').ajaxfileupload({


        'action': baseurl + 'Birth/doc_image_upload5',
        'onStart': function() { $("#msg5").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg5").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother5").val(response);
                $("#msg5").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother5").val(response);
                $("#msg5").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
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
    $('#attachment6').ajaxfileupload({


        'action': baseurl + 'Birth/doc_image_upload6',
        'onStart': function() { $("#msg6").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg6").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother6").val(response);
                $("#msg6").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $(".file_attachother6").val(response);
                $("#msg6").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
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
    $('#chk_id_proof').change(function() {
        if ($(this).is(":checked")) {
            $("#chk_id_proof").val(1);
            $("#attachment1").show();

        } else {
            $("#attachment1").hide();
            $("#chk_id_proof").val(0);
            $("#file_attachother1").val('');
        }

    });
    $('#chk_cer_delivery').change(function() {
        if ($(this).is(":checked")) {
            $("#chk_cer_delivery").val(1);
            $("#attachment2").show();

        } else {
            $("#chk_cer_delivery").val(0);
            $("#attachment2").hide();
            $("#file_attachother2").val('');
        }

    });
    $('#chk_affidavit').change(function() {
        if ($(this).is(":checked")) {
            $("#chk_affidavit").val(1);
            $("#attachment3").show();

        } else {
            $("#chk_affidavit").val(0);
            $("#attachment3").hide();
            $("#file_attachother3").val('');
        }

    });
    $('#chk_noc').change(function() {
        if ($(this).is(":checked")) {
            $("#chk_noc").val(1);
            $("#attachment4").show();

        } else {
            $("#chk_noc").val(0);
            $("#attachment4").hide();
            $("#file_attachother4").val('');
        }

    });
    $('#chk_court_reg').change(function() {
        if ($(this).is(":checked")) {
            $("#chk_court_reg").val(1);
            $("#attachment5").show();

        } else {
            $("#chk_court_reg").val(0);
            $("#attachment5").hide();
            $("#file_attachother5").val('');
        }

    });
    $('#chk_order').change(function() {
        if ($(this).is(":checked")) {
            $("#chk_order").val(1);
            $("#attachment6").show();

        } else {
            $("#chk_order").val(0);
            $("#attachment6").hide();
            $("#file_attachother6").val('');
        }

    });
    //----------------------upload file code end-----------------------------------------
    //----------------------submit form2 code start------------------------------
    $(document).on("submit", "#master_form2", function(e) {
        e.preventDefault();
        var table_name = "birth_documents";
        var ref_id = $('#chklist_id').val();
        var chk_id_proof = $('#chk_id_proof').val();
        var chk_cer_delivery = $('#chk_cer_delivery').val();
        var chk_affidavit = $('#chk_affidavit').val();
        var chk_noc = $('#chk_noc').val();
        var chk_court_reg = $('#chk_court_reg').val();
        var chk_order = $('#chk_order').val();
        var file_id_proof = $('#file_attachother1').val();
        var file_cer_delivery = $('#file_attachother2').val();
        var file_affidavit = $('#file_attachother3').val();
        var file_noc = $('#file_attachother4').val();
        var file_court_reg = $('#file_attachother5').val();
        var file_order = $('#file_attachother6').val();
        var id = $('#chk_list_form').val();

        $.ajax({
            type: "POST",
            url: baseurl + "Birth/add_chklist",

            data: {
                id: id,
                ref_id: ref_id,
                chk_id_proof: chk_id_proof,
                chk_cer_delivery: chk_cer_delivery,
                chk_affidavit: chk_affidavit,
                chk_noc: chk_noc,
                chk_court_reg: chk_court_reg,
                chk_order: chk_order,
                file_id_proof: file_id_proof,
                file_cer_delivery: file_cer_delivery,
                file_affidavit: file_affidavit,
                file_noc: file_noc,
                file_court_reg: file_court_reg,
                file_order: file_order,
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                //  alert(data);
                if (data == true) {
                    if (id == "") {
                        successTost("Check List Saved Successfully");
                    } else {
                        successTost("Check List Updated Successfully");
                    }

                } else {
                    errorTost("Something Wrong", "error");
                }
                $('#master_form2')[0].reset();
                $('#form2').hide();

                $(".closehideshow").trigger('click');
                $(".tablehideshow").show();
                datashow();
            }
        });
    });
    //-------------------------------------------------------------------------------------------------------
    //------------------------------certificate code start--------------------------------------------------
    /*  $(document).on("click", ".certificate", function() {
          $('.tablehideshow').hide();
          $('.formhideshow').show();

          $("#form9").show();
          $(".btnhideshow").show();
      });*/
    //------------------------------certificate code end--------------------------------------------------
    //-----------------------app_form code start-----------------------------------
    $(document).on("click", ".app_form", function() {
        $('.tablehideshow').hide();
        $('.formhideshow').show();

        $("#form4").show();
        $(".btnhideshow").show();
        $('#application_id').val('');
        table_name = "birth_registration";
        var id = $(this).attr('id');
        $('#application_id').val(id);

        $.ajax({
            type: "POST",
            url: baseurl + "Birth/showdatawhere_register",
            data: {
                table_name: table_name,
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {
                    var fdateval = data[i].dob;
                    var fdateslt = fdateval.split('-');
                    var dob1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    $('#name_mother1').val(data[i].mother_name);
                    $('#name_mother2').val(data[i].mother_full_name);
                    $('#name_father1').val(data[i].father_name);
                    $('#name_father2').val(data[i].father_full_name);
                    $('#birth_place1').val(data[i].birth_place);
                    $('#birth_place11').val(data[i].birth_place2);
                    $('#app_dob').val(dob1);
                    $('#name_child1').val(data[i].child_name);
                    $('#name_child2').val(data[i].baby_name);
                    $('#address_app1').val(data[i].parent_perminent_address);
                    $('#address_app2').val(data[i].perminent_address);
                    var gender = data[i].gender;

                    if (gender == "men") {
                        $("#men_app").prop("checked", true);
                    } else {
                        $("#woman_app").prop("checked", true);
                    }
                }

            }
        });
    });
    //-----------------------app_form code end-------------------------------------
    //-----------------------acknowledgment code start-----------------------------------
    $(document).on("click", ".acknowledgment", function() {
        $('.tablehideshow').hide();
        $('.formhideshow').show();

        $("#form5").show();
        $(".btnhideshow").show();

    });
    //-----------------------acknowledgment code end-------------------------------------
    //----------------------submit form3 code start------------------------------
    $(document).on("submit", "#master_form3", function(e) {
        e.preventDefault();
        var table_name = "birth_appointment";
        var reg_no = $('#registration_no3').val();
        var app_mobile = $('#applicant_mno3').val();
        var date1 = $('#appo_date').val();
        var time = $('#time').val();
        var message = $('#message').val();
        var ref_id = $('#register_id').val();
        var id = $('#appointment_id').val();
        var fdateslt = date1.split('/');
        var date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        $.ajax({
            type: "POST",
            url: baseurl + "Birth/add_appointment",

            data: {
                id: id,
                reg_no: reg_no,
                app_mobile: app_mobile,
                date: date,
                time: time,
                message: message,
                ref_id: ref_id,
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                //  alert(data);
                if (data == true) {
                    if (id == "") {
                        successTost("Appointment Saved Successfully");
                    } else {
                        successTost("Appointment Updated Successfully");
                    }

                } else {
                    errorTost("Something Wrong", "error");
                }
                $('#appointment_id').val('');
                $('#register_id').val('');
                $('#master_form3')[0].reset();
                $('#form3').hide();

                $(".tablehideshow").show();
                datashow();
            }
        });
    });
    //-------------------------------------------------------------------------------------------------------

    //----------------------submit form4 code start------------------------------
    $(document).on("submit", "#master_form4", function(e) {
        e.preventDefault();
        var table_name = "birth_registration";
        var child_name = $('#name_child1').val();
        var baby_name = $('#name_child2').val();
        var parent_perminent_address = $('#address_app1').val();
        var perminent_address = $('#address_app2').val();
        var gender = $('input[name=redio_app]:checked').val();
        var id = $('#application_id').val();


        $.ajax({
            type: "POST",
            url: baseurl + "Birth/add_application",

            data: {
                id: id,
                child_name: child_name,
                baby_name: baby_name,
                parent_perminent_address: parent_perminent_address,
                perminent_address: perminent_address,
                gender: gender,
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                //  alert(data);

                if (data == true) {

                    successTost("Application Update Successfully");


                } else {
                    errorTost("Something Wrong", "error");
                }
                $('#appointment_id').val('');

                $('#master_form4')[0].reset();
                $('#form4').hide();
                $(".tablehideshow").show();
                $(".tablehideshow").show();
                datashow();
            }
        });
    });
    $(document).on("click", "#reset", function() {
        $('#master_form')[0].reset();
    });
});