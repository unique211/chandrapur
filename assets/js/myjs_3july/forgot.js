$(document).ready(function() {
    var table_name = "user_registration";
    /* $('#second').hide();
     $('#third').hide();
     $('#first').show();*/
    var random;
    $(document).on("keyup", "#mobile", function(e) {
        e.preventDefault();
        var mobile = $('#mobile').val();
        $.ajax({
            type: "POST",
            url: baseurl + "Settings/chk_user_id",

            data: {
                user_id: mobile,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data == 0) {

                    $(".validation2").html("This Mobile Number is Not Exists,Please SignUp");
                    $(':input[type="submit"]').prop('disabled', true);

                } else {
                    $(".validation2").html(''); // remove it
                    $(':input[type="submit"]').prop('disabled', false);
                }
            }
        });
    });
    $(document).on("submit", "#send_form", function(e) {
        e.preventDefault();

        $('#first').hide();
        $('#second').show();
        $('#third').hide();
        $('#fourth').hide();
        $('.wrong_otp').hide();
        $('#add').attr('disabled', false);
        $('#resend').attr('disabled', true);
        Timer();
        var mobile = $("#mobile").val();
        random = Math.floor(100000 + Math.random() * 900000);
        var api = "https://2factor.in/API/V1/a448440b-9c36-11e9-ade6-0200cd936042/SMS/" + mobile + "/" + random + "/otp1";
        $.ajax({
            async: true,
            crossDomain: true,
            url: api,
            method: "GET",
            headers: {
                "content-type": "application/x-www-form-urlencoded"
            },
            data: {},
            success: function(data) {
                console.log(data);

            }
        });


    });
    $(document).on("click", "#resend", function(e) {
        e.preventDefault();
        $('.wrong_otp').hide();
        $('#add').attr('disabled', false);
        $('#resend').attr('disabled', true);
        Timer();
        var mobile = $("#mobile").val();
        random = Math.floor(100000 + Math.random() * 900000);
        var api = "https://2factor.in/API/V1/a448440b-9c36-11e9-ade6-0200cd936042/SMS/" + mobile + "/" + random + "/otp1";
        $.ajax({
            async: true,
            crossDomain: true,
            url: api,
            method: "GET",
            headers: {
                "content-type": "application/x-www-form-urlencoded"
            },
            data: {},
            success: function(data) {
                console.log(data);

            }
        });

    });
    $(document).on("submit", "#verify_form", function(e) {
        e.preventDefault();
        var v_otp = $('#otp').val();
        if (v_otp == random) {
            $('#second').hide();
            $('#third').show();
            $('#first').hide();
            $('#fourth').hide();
            $('.wrong_otp').hide();
        } else {
            $('.wrong_otp').show();
        }
    });
    $(document).on("submit", "#signupform", function(e) {
        e.preventDefault();
        var mobile = $('#mobile').val();
        var status = "1";
        var password = $('#password').val();
        var c_password = $('#c_password').val();

        if (c_password == password) {
            $(".validation").html('');
            $.ajax({
                type: "POST",
                url: baseurl + "Settings/adddata_forgot",
                data: {
                    mobile: mobile,
                    password: c_password,
                    status: status,
                    table_name: table_name
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    $('#third').hide();
                    $('#fourth').show();
                }
            });
        } else {
            $(".validation").html("Please Enter Same Password");
            $("#c_password").focus();
        }
        // alert('fi');
    });

    function Timer() {
        //  $("span.minute").val(01);
        //  $("span.second").val(00);
        var fragmentTime;
        $('.timeout_message_show').hide();
        var minutes = 01;
        var seconds = 00;
        //var minutes = $("span.minute").html();
        // var seconds = $("span.second").html();
        minutes = parseInt(minutes);
        seconds = parseInt(seconds);
        if (isNaN(minutes)) {
            minutes = 00;
        }
        if (isNaN(seconds)) {
            seconds = 00;
        }
        if (minutes == 60) {
            minutes = 59;
        }
        if (seconds == 60) {
            seconds = 59;
        }
        fragmentTime = (60 * minutes) + (seconds);
        displayMinute = document.querySelector('span.minute');
        displaySecond = document.querySelector('span.second');
        startTimer(fragmentTime, displayMinute, displaySecond);
    }

    function startTimer(duration, displayMinute, displaySecond) {
        var timer = duration,
            displayMinute, displaySecond;
        var timeIntervalID = setInterval(function() {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            displayMinute.textContent = minutes;
            displaySecond.textContent = seconds;
            if (--timer < 0) {
                timer = 0;
                if (timer == 0) {
                    clearInterval(timeIntervalID);
                    $('.timeout_message_show').show();
                    $('#add').attr('disabled', true);
                    $('#resend').attr('disabled', false);
                }
            }
        }, 1000);
    }
});