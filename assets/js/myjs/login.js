$(document).ready(function() {
    /*---------login-----------------*/

    $(document).on("submit", "#loginform", function(e) {
        e.preventDefault();
        var user_id = $('#user_id').val();
        var password = $('#password').val();


        $.ajax({
            type: "POST",
            url: baseurl + "Settings/logincheck",
            dataType: "JSON",
            data: {
                user_id: user_id,
                password: password
            },
            success: function(data) {
                console.log(data);
                if (data == 1) {
                    successTost("Login Successfully");
                    location.href = baseurl + "Welcome/dashboard";
                } else {
                    errorTost("Invalide Login Detail");

                }
            }
        });
    });

    /*---------login-----------------*/



});