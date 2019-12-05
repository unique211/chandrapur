$(document).ready(function () {

    $(".formhideshow").hide();
    $(".tablehideshow").show();

    $(document).on('click', '.closehideshow', function () {
        // $('#master_form')[0].reset();
        $('#save_update').val('');
        $('#btnprint').val('');
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        $('#form1').hide();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').hide();
        $('#form5').hide();
        $('#form6').hide();
        $('#form8').hide();
        $('#form9').hide();
    });

    $(".btnhideshow").click(function () {
        // alert("hide");
        $(".tablehideshow").hide();
        $(".formhideshow").show();
        $('#form1').show();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').hide();
        $('#form5').hide();
        $('#form6').hide();
        $('#form8').hide();
        $('#form9').hide();
    });

});