$(document).ready(function() {



    getMasterSelect("department_master", ".department");
   


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
                if (table_name == "company_master") {
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                }
                if (table_name == "business_master") {
                    var business = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        business = data[i].business;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + business + '</option>';
                    }
                }
                if (table_name == "customer_master") {
                    var company_name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        company_name = data[i].company_name;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + company_name + '</option>';
                    }
                }
                if (table_name == "salesman_master") {
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                }
                if (table_name == "calltype_master") {
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].calltype;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                }
                if (table_name == "status_master") {
                    var status = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        status = data[i].status;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + status + '</option>';
                    }
                }

                $(selecter).html(html);
            }
        });
    }







});