$(document).ready(function() {

    var table_name = "subzone_master";



    $(document).on("submit", "#master_form", function(e) {

        e.preventDefault();

        var zone = $('#zone').val();
        var subzone = $('#subzone').val();
        //var status = $('input[name=status]:checked').val();

        var id = $('#save_update').val();


            console.log("zone"+zone+"status"+subzone);


        $.ajax({

            type: "POST",

            url: baseurl + "Subzone/adddata",



            data: {

                id: id,

                zone: zone,

                subzone: subzone,

                table_name: table_name

            },

            dataType: "JSON",

            async: false,

            success: function(data) {

                if (data == true) {

                    if (id != "") {

                        successTost("Subzone Update Successfully");



                    } else {

                        successTost("Subzone Added Successfully");

                    }

                   
                } else {

                    errorTost("Department Cannot Save");

                }

            }

        });


        $('#master_form')[0].reset();

        $('#save_update').val('');

       

        datashow();



    });


    /*------Bulr event  Of Sub zone---------------*/
 $(document).on("blur", "#subzone", function(e) {
 e.preventDefault();
 
 var subzone = $('#subzone').val();
 var zone = $('#zone').val();
 if(subzone !="" && zone !=""){
        $.ajax({

            type: "POST",

            url: baseurl + "Subzone/checksubzoneexist",



            data: {

              
                zone:zone,
                subzone: subzone,

                table_name: table_name

            },

            dataType: "JSON",

            async: false,

            success: function(data) {
                    if(data>0){
                        swal("Sub Zone Already Exist Please Enter An other Sub Zone ");
                    }else{

                    }
            }
        });
    }
 });


    //----------------------submit form code end------------------------------

    datashow();

    //----------------show data in the tabale code start-----------------------

    function datashow() {



        $.ajax({

            type: "POST",

            url: baseurl + "Subzone/showdata",

            data: {

                table_name: table_name,



            },

            dataType: "JSON",

            async: false,

            success: function(data) {

                // console.log('data'+data);
                    if(data.length>0){
                var data = eval(data);





                var html = '';

                html += '<table id="myTable" class="table table-striped">' +

                    '<thead>' +
                    '<tr>'+
                    '<th  >Zone Name:</th>'+
                    '<th size="30%"><select class="form-control input-sm select2 placeholdesize zonenm" width="30%"id="zonename" name="zonename"><option selected disabled>Select </option> </select></th>'+
                    
                    '</tr>'+
                    '<tr>' +

                    '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                    '<th style="display:none" >Zone id</th>' +
                    '<th><font style="font-weight:bold">Zone Name</font></th>' +
                    '<th><font style="font-weight:bold">Sub Zone</font></th>' +

                    '<th style="display:none"><font style="font-weight:bold">Status</font></th>' +

                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +



                    '</tr>' +

                    '</thead>' +

                    '<tbody>';

                for (var i = 0; i < data.length; i++) {

                    var sr = i + 1;



                    html += '<tr>' +

                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +

                        '<td style="display:none;" id="zoneid_' + data[i].id + '">' + data[i].zoneid + '</td>' +

                        '<td  id="zonename_' + data[i].id + '">' + data[i].zonename + '</td>' +
                        '<td  id="subzonename_' + data[i].id + '">' + data[i].subzonename + '</td>' +
                        '<td  style="display:none;" id="status_' + data[i].id + '">' + data[i].status + '</td>' +

                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +

                        '</tr>';



                }

                html += '</tbody></table>';



                $('#show_master').html(html);

                $('#myTable').DataTable({});



            }

        }

        });
        getMasterSelect("zone_master",".zonenm"," status = '1' ");
       
        dropdown();


    }


    /*change event of search drop down of Zone --------------*/
function dropdown(){	
    $('.zonenm').on( 'change', function () {
    var	table = $('#myTable').DataTable();
        var regExSearch = this.value;
        //alert('reg'+regExSearch);
        if(regExSearch=="All"){
            show_master();
        }else{
        table.column(1).search(regExSearch, true, false).draw();
        }
        });
    }
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

                        url: baseurl + "Subzone/deletedata",

                        dataType: "JSON",

                        data: {

                            id: id1,

                            table_name: table_name,

                        },

                        success: function(data) {

                            if (data == true) {

                                swal("Deleted !!", "Hey, your Data has been deleted !!", "success");





                                datashow(); //call function show all data	

                                $('#master_form')[0].reset();



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

    $(document).on("click", ".edit_data", function() {



        



        var id = $(this).attr('id');





        var zoneid = $('#zoneid_'+ id).html();

        var subzonename = $('#subzonename_' + id).html();

           // alert(zoneid);

        $('#save_update').val(id);

        $('#zone').val(zoneid).trigger('change');
        $('#subzone').val(subzonename);

     

    });

    $(document).on('click', '.closehideshow', function() {

        $('#master_form')[0].reset();

        $('#save_update').val('');



        $(".tablehideshow").show();

        $(".formhideshow").hide();



    });


//----------------------- get Dropdown Zone code Start-----------------------------------
getMasterSelect("zone_master",".zone"," status = '1' ");

function getMasterSelect(table_name,selecter,where){
	
    $.ajax({
       type : "POST",
       url  : baseurl+"Subzone/get_dropdowndata",
       data:{table_name:table_name,
               where:where,},
       dataType : "JSON",
       async : false,
       success: function(data){

           html = '';
           var name = '';
//					if(table_name=="victim_age"){
//					html += '<option selected  value="" >Select Victim Age</option>';
//						}else{
           html += '<option selected disabled value="" >Select</option>';
//						}
           for(i=0; i<data.length; i++){
                   var id = '';
                   if(table_name == 'zone_master'){
                       name = data[i].zonename;								
                       id = data[i].id;
                   }
           html += '<option value="'+id+'">'+name+'</option>';
           }
           $(selecter).html(html);
       }
   });
}


//----------------------- get Dropdown Zone code End-----------------------------------

});