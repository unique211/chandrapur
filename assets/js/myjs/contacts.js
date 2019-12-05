$(document).ready(function() {
    var table_name = "contacts";
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();
        var contact = $('#contact').val();
        var contact_m = $('#contact_m').val();
        var map = $('#map').val();


        $.ajax({
            type: "POST",
            url: baseurl + "Contacts/adddata",
            data: {
                id: id,
                contact: contact,
                contact_m: contact_m,
                map: map,
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
                    //    form_clear();
                    //$('#master_form')[0].reset();
                    //   $('#save_update').val('');
                    //   $('.closehideshow').trigger('click');
                    datashow();
                } else {
                    errorTost("Record Cannot Save");
                }
            }
        });
    });

    function form_clear() {

        $('#contact').val('');
        $('#contact_m').val('');
        $('#map').val('');

    }
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        $.ajax({
            type: "POST",
            url: baseurl + "Contacts/showdata",
            data: {
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);
                if (data == "") {
                    $('#save_update').val('');
                    $('#contact').val('');
                    $('#contact_m').val('');
                    $('#map').val('');
                } else {
                    $('#save_update').val(data[0].id);
                    $('#contact').val(data[0].contact);
                    $('#contact_m').val(data[0].contact_m);
                    $('#map').val(data[0].map);
                }




            }
        });
    }

    //-----------------------delete data code end-----------------------------------


    $(document).on('click', '#reset', function(e) {
        e.preventDefault();
        form_clear()
            //$('#master_form')[0].reset();


    });

});