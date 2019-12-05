<?php include('include/header.php');  ?>



<body>

     <script src="<?php echo base_url() ?>assets/js/plugins/d3pie/d3.min.js"></script>

     <script src="<?php echo base_url() ?>assets/js/plugins/d3pie/d3pie.js"></script>

     <!-- START PAGE CONTAINER -->

     <div class="page-container page-navigation-toggled page-container-wide">



          <!-- START PAGE SIDEBAR -->

          <?php include('include/sidebar.php');  ?>

          <!-- END PAGE SIDEBAR -->



          <!-- PAGE CONTENT -->

          <div class="page-content">



               <!-- START X-NAVIGATION VERTICAL -->

               <?php include('include/topbar.php');  ?>

               <!-- END X-NAVIGATION VERTICAL -->



               <!-- START BREADCRUMB -->

               <ul class="breadcrumb">

                    <li class="active">Birth Registration</li>



               </ul>

               <!-- END BREADCRUMB -->



               <!-- PAGE CONTENT WRAPPER -->

               <div class="page-content-wrap">

                    <!--NEWS SECTION-->



                    <div class="row tablehideshow">

                         <div class="col-md-12 col-sm-12 col-xs-12 right_side">

                              <!-- START SIMPLE DATATABLE -->



                              <div class="panel panel-default">

                                   <div class="panel-heading">

                                        <h3 class="panel-title">Code Id : 14 Birth Registration</h3>



                                        <ul class="panel-controls">



                                             <li> <button class="btn btn-success btnhideshow"

                                                       style="background-color:#00B050;"> Add Detail</button></li>

                                        </ul>

                                   </div>

                                   <div class="panel-body">

                                        <div class="col-lg-12 ">

                                             <div class="table-responsive" id="show_master">



                                             </div>

                                        </div>

                                   </div>

                              </div>

                              <!-- END SIMPLE DATATABLE -->

                         </div>

                    </div>

                    <!--NEWS SECTION END-->



                    <!-- strat notification -->

                    <div class="row formhideshow">

                         <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form1" style="display:none;">



                              <!-- START SIMPLE DATATABLE -->

                              <div class="panel panel-default">

                                   <div class="panel-heading">

                                        <h3 class="panel-title">Information</h3>

                                        <div class="pull-right">

                                             <button class="btn btn-success closehideshow"

                                                  style="background-color:#00B050;">View Detail</button>

                                        </div>

                                   </div>



                                   <div class="panel-body">

                                        <div class="col-lg-12">

                                             <form class="form-horizontal" id="master_form" name="master_form">

                                                  <div class="row">



                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Applicant's Name*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="applicant_name"

                                                                      name="applicant_name" class="form-control"

                                                                      placeholder="Applicant's Name" required>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <label>Applicant's Mobile Number*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="number" style="text-align:right;"

                                                                      id="applicant_mno" name="applicant_mno"

                                                                      class="form-control"

                                                                      placeholder="Applicant's Mobile number" required>

                                                            </div>

                                                       </div>

                                                  </div>

                                                  <div class="row">



                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Year Of Registration*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="number" value="2016"

                                                                      style="text-align:right;" id="reg_year"

                                                                      name="reg_year" class="form-control"

                                                                      placeholder="Applicant's Mobile number" required>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <label>Register No.*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="register_no" name="register_no"

                                                                      class="form-control" placeholder="Register No"

                                                                      required>

                                                            </div>



                                                       </div>

                                                  </div>

                                                  <div class="row">



                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Zone</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <select id="zone" name="zone" class="form-control">

                                                                      <option selected disabled>Select</option>

                                                                      <option value="1">Zone1</option>

                                                                      <option value="2">Zone2</option>

                                                                      <option value="3">Zone3</option>

                                                                 </select>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <label>Ward / Area</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <select id="ward_area" name="ward_area"

                                                                      class="form-control">

                                                                      <option selected disabled>Select</option>

                                                                      <option value="11">D.G.Tukum-1 </option>

                                                                      <option value="9">Tukum Talav-2</option>

                                                                      <option value="8">Vivek Nagar-3</option>

                                                                      <option value="7">Vadgaon -10</option>

                                                                      <option value="12">Naginabag-11</option>

                                                                      <option value="13">Civil Lines-12</option>

                                                                      <option value="14">Jatpura Ward-13</option>

                                                                      <option value="15">Ghutkala Ward-14</option>

                                                                      <option value="16">Hospital Ward-15</option>

                                                                      <option value="17">Rahmat Nagar-22</option>

                                                                      <option value="30">Hanuman Nagar-9</option>

                                                                      <option value="18">Anchaleshwar Ward-19</option>

                                                                      <option value="19">Bhanapeth Ward-20</option>

                                                                      <option value="20">Ekori Ward-21</option>

                                                                      <option value="21">Binaba Ward-23</option>

                                                                      <option value="22">Vithal Mandir Ward-24</option>

                                                                      <option value="23">Bazar Ward-25</option>

                                                                      <option value="24">Pathanpura Ward-26</option>

                                                                      <option value="25">Maa.Tuljabhavani Ward-27

                                                                      </option>

                                                                      <option value="26">Mahakali Mandir Ward-28

                                                                      </option>

                                                                      <option value="27">Babupeth Ward-31</option>

                                                                      <option value="28">Matanagar Ward-32</option>

                                                                      <option value="29">Hindustan Ward-33</option>

                                                                      <option value="31">Shastrinagar Ward-4</option>

                                                                      <option value="32">M.E.L.Ward-5</option>

                                                                      <option value="33">Indira Nagar Ward-6</option>

                                                                      <option value="34">Camp Ward-7</option>

                                                                      <option value="35">Industrial Estate Ward-8

                                                                      </option>

                                                                      <option value="36">Rayyatwari Colony Ward-16

                                                                      </option>

                                                                      <option value="37">Kamgar Nagar Ward-17</option>

                                                                      <option value="38">Ashthabhuja Ward-18</option>

                                                                      <option value="39">Gauri Talav Ward-29</option>

                                                                      <option value="40">Dr.Babasaheb Ambedkar Ward-30

                                                                      </option>

                                                                 </select>

                                                            </div>



                                                       </div>

                                                  </div>

                                                  <div class="row">

                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Page No</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="page_no" name="page_no"

                                                                      class="form-control" placeholder="Page No">

                                                            </div>

                                                       </div>

                                                  </div>



                                        </div>

                                   </div>



                                   <div class="panel-heading">

                                        <h3 class="panel-title">Birth Information</h3>

                                   </div>

                                   <div class="panel-body">

                                        <div class="col-lg-12">



                                             <div class="row">



                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Registration Date</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <div class="input-group date " data-provide="datepicker">

                                                                 <input type="text"

                                                                      class="form-control input-sm placeholdesize date1"

                                                                      id="reg_date" name="reg_date" autocomplete="off">

                                                                 <div class="input-group-addon">

                                                                      <span class="fa fa-calendar"></span>

                                                                 </div>

                                                            </div>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Registration No</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="registration_no"

                                                                 name="registration_no" class="form-control"

                                                                 placeholder="Registration No">

                                                       </div>

                                                  </div>

                                             </div>

                                             <br>

                                             <div class="row">



                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Date Of Birth*</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <div class="input-group date " data-provide="datepicker">

                                                                 <input type="text"

                                                                      class="form-control input-sm placeholdesize date1"

                                                                      id="date" name="date" autocomplete="off" required>

                                                                 <div class="input-group-addon">

                                                                      <span class="fa fa-calendar"></span>

                                                                 </div>

                                                            </div>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Birth Place*</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="birth_place" name="birth_place"

                                                                 class="form-control" placeholder="Birth Place"

                                                                 required>

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">



                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Birth Address</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <textarea rows="1" id="birth_address" name="birth_address"

                                                                 class="form-control" style="height:34px;"

                                                                 placeholder="Birth Address"></textarea>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Type of Birth</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <select id="type_birth" name="type_birth"

                                                                 class="form-control">

                                                                 <option selected disabled>select</option>

                                                                 <option value="1">Single</option>

                                                                 <option value="2">Twins</option>

                                                                 <option value="3">Till</option>

                                                                 <option value="4">Four Children</option>

                                                                 <option value="5">Not Mentioned</option>

                                                            </select>

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">



                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Birth Place*</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="birth_place2" name="birth_place2"

                                                                 class="form-control" placeholder="Birth Place"

                                                                 required>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Birth Address</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <textarea rows="1" id="birth_address2" name="birth_address2"

                                                                 class="form-control" style="height:34px;"

                                                                 placeholder="Birth Address"></textarea>

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">



                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Birth Place</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="birth_place3" name="birth_place3"

                                                                 class="form-control" placeholder="Birth Place">

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Orphaned Birth</label>

                                                       </div>

                                                       <div class="col-sm-3">



                                                            <div class="form-check form-check-inline ">

                                                                 <div class="col-sm-1">

                                                                      <input class="form-check-input" type="radio"

                                                                           name="orphaned_birth" id="Yes" value="Yes">

                                                                 </div>

                                                                 <div class="col-sm-2" style="margin-left:-2%;">

                                                                      <label class="form-check-label"

                                                                           for="orphaned_birth_yes">Yes</label>

                                                                 </div>

                                                            </div>

                                                            <div class="form-check form-check-inline">

                                                                 <div class="col-sm-1">

                                                                      <input class="form-check-input" type="radio"

                                                                           name="orphaned_birth" id="No" value="No">

                                                                 </div>

                                                                 <div class="col-sm-1" style="margin-left:-2%;">

                                                                      <label class="form-check-label"

                                                                           for="orphaned_birth_no">No</label>

                                                                 </div>

                                                            </div>

                                                       </div>

                                                  </div>

                                             </div>



                                        </div>

                                   </div>

                                   <div class="panel-heading">

                                        <h3 class="panel-title">The child's information</h3>

                                   </div>

                                   <div class="panel-body">

                                        <div class="col-lg-12">



                                             <div class="row">



                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Child Name</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="child_name" name="child_name"

                                                                 class="form-control" placeholder="Child Name">

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Baby's Name</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="baby_name" name="baby_name"

                                                                 class="form-control" placeholder="Baby's Name">

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Gender</label>

                                                       </div>

                                                       <div class="col-sm-4">



                                                            <div class="form-check form-check-inline ">

                                                                 <div class="col-sm-1">

                                                                      <input class="form-check-input" type="radio"

                                                                           name="gender" id="men" value="men">

                                                                 </div>

                                                                 <div class="col-sm-1" style="margin-left:-4%;">

                                                                      <label class="form-check-label"

                                                                           for="gender_male">Men</label>

                                                                 </div>

                                                            </div>

                                                            <div class="form-check form-check-inline">

                                                                 <div class="col-sm-1">

                                                                      <input class="form-check-input" type="radio"

                                                                           name="gender" id="woman" value="woman">

                                                                 </div>

                                                                 <div class="col-sm-1" style="margin-left:-4%;">

                                                                      <label class="form-check-label"

                                                                           for="gender_female">Woman</label>

                                                                 </div>

                                                            </div>



                                                       </div>

                                                  </div>

                                             </div>



                                        </div>

                                   </div>



                                   <div class="panel-heading">

                                        <h3 class="panel-title">Parental Information</h3>

                                   </div>

                                   <div class="panel-body">

                                        <div class="col-lg-12">



                                             <div class="row">



                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Father's Name*</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="father_name" name="father_name"

                                                                 class="form-control" placeholder="Father Name"

                                                                 required>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Mother's Name*</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="mother_name" name="mother_name"

                                                                 class="form-control" placeholder="Mother's Name"

                                                                 required>

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Mother's Address</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <textarea rows="1" id="mother_address" name="mother_address"

                                                                 class="form-control" style="height:34px;"

                                                                 placeholder="Mother's Address"></textarea>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Father's Full Name*</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="father_full_name"

                                                                 name="father_full_name" class="form-control"

                                                                 placeholder="Father Name" required>

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Mother's Full Name</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="mother_full_name"

                                                                 name="mother_full_name" class="form-control"

                                                                 placeholder="Father Name" required>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Mother's Address</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <textarea rows="1" id="mother_address2"

                                                                 name="mother_address2" class="form-control"

                                                                 style="height:34px;"

                                                                 placeholder="Mother's Address"></textarea>

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Father's Business</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <select id="father_business" name="father_business"

                                                                 class="form-control">

                                                                 <option selected disabled>Select</option>

                                                                 <option value="1">Accountant</option>

                                                                 <option value="2">Architect</option>

                                                                 <option value="3">Carpenter</option>

                                                                 <option value="4">Dentist</option>

                                                                 <option value="5">Doctor</option>

                                                                 <option value="6">Farmer</option>

                                                                 <option value="7">Engineer</option>

                                                                 <option value="8">Housewife</option>

                                                                 <option value="9">Teacher</option>

                                                                 <option value="10">Other</option>

                                                                 <option value="11">Painter</option>

                                                            </select>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Mother's Business</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <select id="mother_business" name="mother_business"

                                                                 class="form-control">

                                                                 <option selected disabled>Select</option>

                                                                 <option value="1">Accountant</option>

                                                                 <option value="2">Architect</option>

                                                                 <option value="3">Carpenter</option>

                                                                 <option value="4">Dentist</option>

                                                                 <option value="5">Doctor</option>

                                                                 <option value="6">Farmer</option>

                                                                 <option value="7">Engineer</option>

                                                                 <option value="8">Housewife</option>

                                                                 <option value="9">Teacher</option>

                                                                 <option value="10">Other</option>

                                                                 <option value="11">Painter</option>

                                                            </select>

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Mother's Date of Birth </label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <div class="input-group date " data-provide="datepicker">

                                                                 <input type="text"

                                                                      class="form-control input-sm placeholdesize date1"

                                                                      id="mother_dob" name="mother_dob"

                                                                      autocomplete="off">

                                                                 <div class="input-group-addon">

                                                                      <span class="fa fa-calendar"></span>

                                                                 </div>

                                                            </div>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Father's Education</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <select id="father_eduction" name="father_eduction"

                                                                 class="form-control">

                                                                 <option selected disabled>Select</option>

                                                                 <option value="1">Primary</option>

                                                                 <option value="2">Secondary</option>

                                                                 <option value="3">SSC</option>

                                                                 <option value="4">HSC</option>

                                                                 <option value="5">BA</option>

                                                                 <option value="6">Bcom</option>

                                                                 <option value="7">Bsc</option>

                                                                 <option value="8">Bcs</option>

                                                                 <option value="9">BE</option>

                                                                 <option value="10">BBA</option>

                                                                 <option value="11">BCA</option>

                                                                 <option value="12">MA</option>

                                                                 <option value="13">MCom</option>

                                                                 <option value="14">MSC</option>

                                                                 <option value="15">ME</option>

                                                                 <option value="16">BAMS</option>

                                                                 <option value="17">MBBS</option>

                                                            </select>

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Mother's Education</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <select id="mother_eduction" name="mother_eduction"

                                                                 class="form-control">

                                                                 <option selected disabled>Select</option>

                                                                 <option value="1">Primary</option>

                                                                 <option value="2">Secondary</option>

                                                                 <option value="3">SSC</option>

                                                                 <option value="4">HSC</option>

                                                                 <option value="5">BA</option>

                                                                 <option value="6">Bcom</option>

                                                                 <option value="7">Bsc</option>

                                                                 <option value="8">Bcs</option>

                                                                 <option value="9">BE</option>

                                                                 <option value="10">BBA</option>

                                                                 <option value="11">BCA</option>

                                                                 <option value="12">MA</option>

                                                                 <option value="13">MCom</option>

                                                                 <option value="14">MSC</option>

                                                                 <option value="15">ME</option>

                                                                 <option value="16">BAMS</option>

                                                                 <option value="17">MBBS</option>

                                                            </select>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Mother's Age at Birth </label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="mother_age_birth"

                                                                 name="mother_age_birth" class="form-control"

                                                                 placeholder="Mother's age at Birth">

                                                       </div>

                                                  </div>

                                             </div>

                                             <br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Religion</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <select id="Religion" name="Religion" class="form-control">

                                                                 <option selected disabled>Select</option>

                                                                 <option value="1">Hindu</option>

                                                                 <option value="2">Islam</option>

                                                                 <option value="3">Sikh</option>

                                                                 <option value="4">Buddhist</option>

                                                                 <option value="5">Jain</option>

                                                                 <option value="6">Parsi</option>

                                                                 <option value="7">Christian</option>

                                                                 <option value="8">Other</option>

                                                            </select>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Nationality </label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="nationality" name="nationality"

                                                                 class="form-control" placeholder="Indian"

                                                                 value="Indian">

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Parent permanent Address</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <textarea rows="1" id="parent_permanet_address"

                                                                 name="parent_permanet_address" class="form-control"

                                                                 style="height:34px;"

                                                                 placeholder="Parent permanent Address"></textarea>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Parent Address At Time of Birth</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <textarea rows="1" id="Parent_Address_Time_of_Birth"

                                                                 name="Parent_Address_Time_of_Birth"

                                                                 class="form-control" style="height:34px;"

                                                                 placeholder="Parent Address At Time of Birth"></textarea>

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Permanent permanent address</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <textarea rows="1" id="perminent_address"

                                                                 name="parent_permanet_address" class="form-control"

                                                                 style="height:34px;"

                                                                 placeholder="Parent permanent Address"></textarea>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Number of surviving children</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="number" id="no_surviving_children"

                                                                 name="no_surviving_children" class="form-control"

                                                                 placeholder="Number of surviving children">

                                                       </div>

                                                  </div>

                                             </div><br>



                                        </div>

                                   </div>



                                   <div class="panel-heading">

                                        <h3 class="panel-title">Other Information</h3>

                                   </div>

                                   <div class="panel-body">

                                        <div class="col-lg-12">



                                             <div class="row">



                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Attention Type</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <select id="attention_type" name="attention_type"

                                                                 class="form-control">

                                                                 <option selected disabled>Select</option>

                                                                 <option value="1">Hospital</option>

                                                                 <option value="2">Home</option>

                                                                 <option value="3">Relatives</option>

                                                                 <option value="4">Other</option>

                                                            </select>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Informant Name</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <select id="informant_name1" name="informant_name1"

                                                                 class="form-control" style="display:none">

                                                                 <option selected disabled>Select</option>



                                                            </select>

                                                            <input type="text" id="informant_name" name="informant_name"

                                                                 class="form-control" style="display:none"

                                                                 placeholder="Informant Name">

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>The address of the informer</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <textarea rows="1" id="address_of_informer"

                                                                 name="address_of_informer" class="form-control"

                                                                 style="height:34px;"

                                                                 placeholder="Parent permanent Address"></textarea>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Delivery method</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <select id="delivery_method" name="delivery_method"

                                                                 class="form-control">

                                                                 <option selected disabled>Select</option>

                                                                 <option value="1">Natural</option>

                                                                 <option value="2">Medicated</option>

                                                                 <option value="3">Forceps</option>

                                                                 <option value="4">Vacuum</option>

                                                                 <option value="5">Cesarean</option>

                                                                 <option value="6">Episiotomy</option>

                                                            </select>

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>The name of the information provider</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="information_provider"

                                                                 name="information_provider" class="form-control"

                                                                 placeholder="The name of the information provider">

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Informant Address</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <textarea rows="1" id="information_address"

                                                                 name="information_address" class="form-control"

                                                                 style="height:34px;"

                                                                 placeholder="Information Address"></textarea>

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>City</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="city" name="city"

                                                                 class="form-control" placeholder="City">

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Registration unit</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="registration_unit"

                                                                 name="registration_unit" class="form-control"

                                                                 placeholder="Registration Unit">

                                                       </div>

                                                  </div>

                                             </div>



                                        </div>

                                   </div>



                                   <div class="panel-heading">

                                        <h3 class="panel-title">Police Records</h3>

                                   </div>

                                   <div class="panel-body">

                                        <div class="col-lg-12">



                                             <div class="row">



                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Police Station</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="police_station" name="police_station"

                                                                 class="form-control" placeholder="Police Station">

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>FIR No</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="fir_no" name="Fir_no"

                                                                 class="form-control" placeholder="FIR No">

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Police Station Address</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <textarea rows="1" id="police_station_address"

                                                                 name="police_station_address" class="form-control"

                                                                 style="height:34px;"

                                                                 placeholder="Police Station Address"></textarea>

                                                       </div>

                                                  </div>

                                             </div>



                                        </div>

                                   </div>

                                   <div class="panel-heading">

                                        <h3 class="panel-title">Court Records</h3>

                                   </div>

                                   <div class="panel-body">

                                        <div class="col-lg-12">



                                             <div class="row">



                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>The name of the court</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="name_court" name="name_court"

                                                                 class="form-control"

                                                                 placeholder="The name of the court">

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Court order no</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <input type="text" id="court_orderno" name="court_orderno"

                                                                 class="form-control" placeholder="Court order no">

                                                       </div>

                                                  </div>

                                             </div><br>

                                             <div class="row">

                                                  <div class="form-group">

                                                       <div class="col-sm-3">

                                                            <label>Court order date</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <div class="input-group date " data-provide="datepicker">

                                                                 <input type="text"

                                                                      class="form-control input-sm placeholdesize date1"

                                                                      id="court_order_date" name="court_order_date"

                                                                      autocomplete="off">

                                                                 <div class="input-group-addon">

                                                                      <span class="fa fa-calendar"></span>

                                                                 </div>

                                                            </div>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <label>Additional Remarks</label>

                                                       </div>

                                                       <div class="col-sm-3">

                                                            <textarea rows="1" id="additional_remark"

                                                                 name="additional_remark" class="form-control"

                                                                 style="height:34px;"

                                                                 placeholder="Additional Remarks"></textarea>

                                                       </div>

                                                  </div>

                                             </div>



                                        </div>

                                   </div>





                                   <div class="btn-group pull-left">

                                        <input type="hidden" id="save_update" value="">

                                        <button class="btn btn-primary" type="submit">Save</button>

                                        </form>

                                        <button class="btn btn-info " id="reset">Reset</button>

                                   </div>







                              </div>

                              <!--panel panel default-->

                              <!-- END SIMPLE DATATABLE -->

                         </div>

                         <!------------------------form1-end------------------------------->

                         <!------------------------form2-start------------------------------->

                         <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form2" style="display:none;">

                              <!-- START SIMPLE DATATABLE -->

                              <div class="panel panel-default">

                                   <div class="panel-heading">

                                        <h3 class="panel-title">Checklist</h3>

                                        <div class="pull-right">

                                             <button class="btn btn-success closehideshow"

                                                  style="background-color:#00B050;">View Detail</button>

                                        </div>

                                   </div>

                                   <div class="panel-body">

                                        <div class="col-lg-12">

                                             <form class="form-horizontal" id="master_form2" name="master_form2">

                                                  <input type="hidden" id="chk_list_form" value="">



                                                  <div class="table-responsive" id="show_master">

                                                       <table id="dataTable" class="table table-striped table-bordered">

                                                            <thead>

                                                                 <tr>

                                                                      <th>अ. क्र.</th>

                                                                      <th>कागदपत्राचे नाव</th>

                                                                      <th>सिलेक्ट करा </th>

                                                                      <th>अपलोड करा</th>

                                                                      <th>जमा केलेले कागदपत्र</th>

                                                                 </tr>

                                                            </thead>

                                                            <tbody id="issuetbody">

                                                                 <tr>

                                                                      <td>1</td>

                                                                      <td>ID Proof*</td>

                                                                      <td align="center"><input type="checkbox"

                                                                                name="chk_id_proof" id="chk_id_proof" >

                                                                      </td>

                                                                      <td align="center"> <input type="file"

                                                                                id="attachment1" name="attachment1"

                                                                                accept="*"

                                                                                style="padding:0px;border:0; display:none;">

                                                                           <input type="hidden" id="file_attachother1"

                                                                                class="file_attachother1" value="" />

                                                                           <div id="msg1" class="msg1"></div>

                                                                      </td>

                                                                      <td align="center"><div id="down1" ></div>

                                                                      </td>

                                                                 </tr>

                                                                 <tr>

                                                                      <td>2</td>

                                                                      <td>In One Year<br>1)Certificate of Delivery

                                                                           Handle by<br>2)Affidavit</td>

                                                                      <td align="center"><input type="checkbox"

                                                                                name="chk_cer_delivery"

                                                                                id="chk_cer_delivery"><br><br><input

                                                                                type="checkbox" name="chk_affidavit"

                                                                                id="chk_affidavit"></td>

                                                                      <td align="center"><input type="file"

                                                                                id="attachment2" name="attachment2"

                                                                                accept="*"

                                                                                style="padding:0px;border:0; display:none;">

                                                                           <input type="hidden" id="file_attachother2"

                                                                                class="file_attachother2" value="" />

                                                                           <div id="msg2" class="msg2"></div><br><input

                                                                                type="file" id="attachment3"

                                                                                name="attachment3" accept="*"

                                                                                style="padding:0px;border:0;display:none;">

                                                                           <input type="hidden" id="file_attachother3"

                                                                                class="file_attachother3" value="" />

                                                                           <div id="msg3" class="msg3"></div>

                                                                      </td>

                                                                      <td align="center"><div id="down2" ></div><br><br><div id="down3" ></div>

                                                                      </td>

                                                                 </tr>

                                                                 <tr>

                                                                      <td>3</td>

                                                                      <td>After One Year<br>1)NOC Certificate<br>2)Court

                                                                           Registration<br>3)Aadesh Patr</td>

                                                                      <td align="center"><input type="checkbox"

                                                                                name="chk_noc"

                                                                                id="chk_noc"><br><br><input

                                                                                type="checkbox" name="chk_court_reg"

                                                                                id="chk_court_reg"><br><br><input

                                                                                type="checkbox" name="chk_order"

                                                                                id="chk_order"></td>

                                                                      <td align="center"><input type="file"

                                                                                id="attachment4" name="attachment4"

                                                                                accept="*"

                                                                                style="padding:0px;border:0;display:none;">

                                                                           <input type="hidden" id="file_attachother4"

                                                                                class="file_attachother4" value="" />

                                                                           <div id="msg4" class="msg4"></div><br><input

                                                                                type="file" id="attachment5"

                                                                                name="attachment5" accept="*"

                                                                                style="padding:0px;border:0;display:none;">

                                                                           <input type="hidden" id="file_attachother5"

                                                                                class="file_attachother1" value="" />

                                                                           <div id="msg5" class="msg5"></div><br><input

                                                                                type="file" id="attachment6"

                                                                                name="attachment6" accept="*"

                                                                                style="padding:0px;border:0;display:none;">

                                                                           <input type="hidden" id="file_attachother6"

                                                                                class="file_attachother6" value="" />

                                                                           <div id="msg6" class="msg6"></div>

                                                                      </td>

                                                                      <td align="center"><div id="down4" ></div><br/><br/><div id="down5" ></div><br/><br/><div id="down6" ></div>

                                                                      </td>

                                                                 </tr>



                                                            </tbody>

                                                       </table>

                                                  </div>



                                        </div>

                                   </div>

                                   <div class="btn-group pull-left">

                                        <input type="hidden" id="chklist_id" value="">

                                        <button class="btn btn-primary" type="submit">Submit</button>

                                        </form>

                                   </div>







                              </div>

                              <!--panel panel default-->

                              <!-- END SIMPLE DATATABLE -->

                         </div>

                         <!---form2 end---->



                         <!------------------------form2-end------------------------------->

                         <!------------------------form3-start------------------------------->

                         <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form3" style="display:none;">

                              <!-- START SIMPLE DATATABLE -->

                              <div class="panel panel-default">

                                   <div class="panel-heading">

                                        <h3 class="panel-title">Appointment</h3>

                                        <div class="pull-right">

                                             <button class="btn btn-success closehideshow"

                                                  style="background-color:#00B050;">View Detail</button>

                                        </div>

                                   </div>

                                   <div class="panel-body">

                                        <div class="col-lg-12">

                                             <form class="form-horizontal" id="master_form3" name="master_form3">

                                                  <div class="row">

                                                       <input type="hidden" id="register_id" value="">

                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Registration No*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="registration_no3"

                                                                      name="registration_no3" class="form-control"

                                                                      placeholder="Registration No" required disabled>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <label>Applicant's Mobile Number*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="number" style="text-align:right;"

                                                                      id="applicant_mno3" name="applicant_mno3"

                                                                      class="form-control"

                                                                      placeholder="Applicant's Mobile number" required

                                                                      disabled>

                                                            </div>

                                                       </div>

                                                  </div>

                                                  <div class="row">



                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Date*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <div class="input-group date "

                                                                      data-provide="datepicker" required>

                                                                      <input type="text"

                                                                           class="form-control input-sm placeholdesize date1"

                                                                           id="appo_date" autocomplete="off"

                                                                           name="appo_date" required>

                                                                      <div class="input-group-addon">

                                                                           <span class="fa fa-calendar"></span>

                                                                      </div>

                                                                 </div>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <label>Time*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <div class="input-group clockpicker"

                                                                      data-placement="top" data-align="left"

                                                                      data-donetext="Done">

                                                                      <input type="text" class="form-control" id="time"

                                                                           name="time" required>

                                                                      <span class="input-group-addon">

                                                                           <span

                                                                                class="glyphicon glyphicon-time"></span>

                                                                      </span>

                                                                 </div>

                                                            </div>



                                                       </div>

                                                  </div>

                                                  <div class="row">



                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Message</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <textarea id="message" name="message"

                                                                      class="form-control"

                                                                      placeholder="Message"></textarea>

                                                            </div>

                                                       </div>

                                                  </div>



                                        </div>

                                   </div>

                                   <div class="btn-group pull-left">

                                        <input type="hidden" id="appointment_id" value="">

                                        <button class="btn btn-primary" type="submit">Submit</button>

                                        </form>

                                   </div>







                              </div>

                              <!--panel panel default-->

                              <!-- END SIMPLE DATATABLE -->

                         </div>

                         <!---form3 end---->

                         <!------------------------form4-start------------------------------->

                         <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form4" style="display:none;">

                              <!-- START SIMPLE DATATABLE -->

                              <div class="panel panel-default">

                                   <div class="panel-heading">

                                        <h3 class="panel-title">Application Form</h3>

                                        <div class="pull-right">

                                             <button class="btn btn-success closehideshow"

                                                  style="background-color:#00B050;">View Detail</button>

                                        </div>

                                   </div>

                                   <div class="panel-body">

                                        <div class="col-lg-12">

                                             <form class="form-horizontal" id="master_form4" name="master_form4">

                                                  <div class="row">



                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Name of Child</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="name_child1" name="name_child1"

                                                                      class="form-control" placeholder="Name of Child">

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <label>बाळाचे नाव</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="name_child2" name="name_child2"

                                                                      class="form-control" placeholder="बाळाचे नाव"

                                                                      required>

                                                            </div>

                                                       </div>

                                                  </div>

                                                  <div class="row">



                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Name of Mother*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="name_mother1"

                                                                      name="name_mother1" class="form-control"

                                                                      placeholder="Name of Mother" required disabled>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <label>आईचे पूर्ण नाव*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="name_mother2"

                                                                      name="name_mother2" class="form-control"

                                                                      placeholder="आईचे पूर्ण नाव" required disabled>

                                                            </div>

                                                       </div>

                                                  </div>

                                                  <div class="row">



                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Name of Father*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="name_father1"

                                                                      name="name_father1" class="form-control"

                                                                      placeholder="Name of Father" required disabled>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <label>वडिलांचे पूर्ण नाव*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="name_father2"

                                                                      name="name_father2" class="form-control"

                                                                      placeholder="वडिलांचे पूर्ण नाव" required

                                                                      disabled>

                                                            </div>

                                                       </div>

                                                  </div>

                                                  <div class="row">



                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Address of Parent*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <textarea id="address_app1" name="address_app1"

                                                                      class="form-control"

                                                                      placeholder="Address of Parent"

                                                                      required></textarea>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <label>पालकांचा कायमचा पत्ता*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <textarea id="address_app2" name="address_app2"

                                                                      class="form-control"

                                                                      placeholder="पालकांचा कायमचा पत्ता"

                                                                      required></textarea>

                                                            </div>

                                                       </div>

                                                  </div>

                                                  <div class="row">



                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>Birth place*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="birth_place1"

                                                                      name="birth_place1" class="form-control"

                                                                      placeholder="Birth place" required disabled>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <label>जन्म स्थान*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <input type="text" id="birth_place11"

                                                                      name="birth_place11" class="form-control"

                                                                      placeholder="जन्म स्थान" required disabled>

                                                            </div>

                                                       </div>

                                                  </div>

                                                  <div class="row">



                                                       <div class="form-group">

                                                            <div class="col-sm-3">

                                                                 <label>जन्म दिनांक*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <div class="input-group date "

                                                                      data-provide="datepicker" required>

                                                                      <input type="text"

                                                                           class="form-control input-sm placeholdesize date1"

                                                                           id="app_dob" autocomplete="off"

                                                                           name="app_dob" disabled>

                                                                      <div class="input-group-addon">

                                                                           <span class="fa fa-calendar"></span>

                                                                      </div>

                                                                 </div>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <label>लिंग*</label>

                                                            </div>

                                                            <div class="col-sm-3">

                                                                 <div class="form-check form-check-inline ">

                                                                      <div class="col-sm-1">

                                                                           <input class="form-check-input" type="radio"

                                                                                name="redio_app" id="men_app"

                                                                                value="men"></div>

                                                                      <div class="col-sm-2" style="margin-left:-2%;">

                                                                           <label class="form-check-label"

                                                                                for="gender_men">पुरुष</label>

                                                                      </div>

                                                                 </div>

                                                                 <div class="form-check form-check-inline">

                                                                      <div class="col-sm-1">

                                                                           <input class="form-check-input" type="radio"

                                                                                name="redio_app" id="woman_app"

                                                                                value="woman"></div>

                                                                      <div class="col-sm-1" style="margin-left:-2%;">

                                                                           <label class="form-check-label"

                                                                                for="gender_woman"> स्त्री</label>

                                                                      </div>

                                                                 </div>

                                                            </div>



                                                       </div>

                                                  </div>



                                        </div>

                                   </div>

                                   <div class="btn-group pull-left">

                                        <input type="hidden" id="application_id" value="">

                                        <button class="btn btn-primary" type="submit">Save</button>

                                        </form>

                                   </div>







                              </div>

                              <!--panel panel default-->

                              <!-- END SIMPLE DATATABLE -->

                         </div>

                         <!---form4 end---->

                         <!------------------------form5-start------------------------------->

                         <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form5" style="display:none;">

                              <!-- START SIMPLE DATATABLE -->

                              <div class="panel panel-default">

                                   <div class="panel-heading">

                                        <h3 class="panel-title">Birth Registration slip</h3>

                                        <div class="pull-right">

                                             <button class="btn btn-success closehideshow"

                                                  style="background-color:#00B050;">View Detail</button>

                                        </div>

                                   </div>

                                   <div class="panel-body">

                                        <div class="col-lg-12">

                                             <form class="form-horizontal" id="master_form5" name="master_form5">

                                                  <div id="divToPrint">

                                                       <center>

                                                            <table frame="box" id="tbl_1"

                                                                 style="margin-top: 1%;width:100%;height:111px">

                                                                 <tbody>

                                                                      <tr>

                                                                           <td rowspan="2" style="width:46%;"><img

                                                                                     src="<?php echo base_url(); ?>images/cmc.jpg"

                                                                                     style="margin-left: 5%;height: 88px;">

                                                                           </td>

                                                                           <th style="padding-top: 1%;">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Chandrapur city municipality

                                                                                     </font>

                                                                                </font>

                                                                           </th>

                                                                      </tr>

                                                                      <tr>

                                                                           <td

                                                                                style="padding-bottom: 1%;padding-left: 17px;">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Health department </font>

                                                                                </font>

                                                                           </td>

                                                                      </tr>

                                                                 </tbody>

                                                            </table>





                                                       </center>



                                                       <center>

                                                            <table frame="box" id="tbl_2" style="width:100%">

                                                                 <tbody>

                                                                      <tr>

                                                                           <th colspan="4" style="padding-top: 1%;">

                                                                                <center>

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          <font

                                                                                               style="vertical-align: inherit;">

                                                                                               Birth registration</font>

                                                                                     </font>

                                                                                </center>

                                                                           </th>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">

                                                                                <center>

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          <font

                                                                                               style="vertical-align: inherit;">

                                                                                               BIRTH REGISTRATION SLIP

                                                                                          </font>

                                                                                     </font>

                                                                                     <center> </center>

                                                                                </center>

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          बाळाची नोंदणी माहिती खालीलप्रमाणे </font>

                                                                                </font>

                                                                           </td>

                                                                           <td colspan="2">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          The registration details of

                                                                                          child is as follows</font>

                                                                                </font>

                                                                           </td>

                                                                           <td colspan="2">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          नोंदणी क्रमांक :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_regno1">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          2016BCMC1410398</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          नोंदणी दिनांक : :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_regdate1">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          0000-00-00</font>

                                                                                </font>

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Registration No. </font>

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_regno2"></td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Date of Registration:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_regdate2">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          0000-00-00</font>

                                                                                </font>

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          बाळाचे नाव :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_childnm1"></td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          लिंग :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_gender1">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Woman </font>

                                                                                </font>

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Name of Child:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_childnm2"></td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Gender:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_gender2">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Female </font>

                                                                                </font>

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          जन्मदिनांक :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_dob1">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          0000-00-00 00:00:00</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          जन्मठिकाण :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_bplace1"></td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Date of birth:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_dob2">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          0000-00-00 00:00:00</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Place of birth:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_bplace2"></td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          आईचे पूर्ण नाव :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_mname1"></td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          वडिलांचे पूर्ण नाव :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_fname1"></td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Name of Mother:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_mname2"></td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Name of Father:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_fname2"></td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          बाळाचे जन्माचेवेळी आई-वडिलांचा पत्ता :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          आई-वडिलांचा कायमचा पत्ता :

                                                                                     </font>

                                                                                </font>

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="2" class="tbl_data" id="b_ad1">

                                                                           </td>

                                                                           <td colspan="2" class="tbl_data" id="b_ad1">

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Address of Parents at the time

                                                                                          of child birth:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Permanent Address of Parents:

                                                                                     </font>

                                                                                </font>

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="2" class="tbl_data" id="b_ad2">

                                                                           </td>

                                                                           <td colspan="2" class="tbl_data" id="b_ad1">

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          शेरा / Remark (if any):

                                                                                     </font>

                                                                                </font>

                                                                           </td>

                                                                           <td colspan="2" class="tbl_data">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          नोंदणीपत्र दिल्याचा दिनांक :</font>

                                                                                </font>

                                                                           </td>

                                                                           <!--<td class="tbl_data">0000-00-00</td>-->

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          2019-05-31 11:30:12</font>

                                                                                </font>

                                                                           </td>

                                                                           <td>&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Date of Issue of Registration

                                                                                          Slip:</font>

                                                                                </font>

                                                                           </td>

                                                                           <!--<td class="tbl_data">0000-00-00</td>-->

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          2019-05-31 11:30:12</font>

                                                                                </font>

                                                                           </td>

                                                                           <td>&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">

                                                                                <table frame="box"

                                                                                     style="width:98%;margin-left:1%;margin-right:1%;margin-bottom:1%;background-color: rgba(128, 128, 128, 0.41);">

                                                                                     <tbody>

                                                                                          <tr>

                                                                                               <td

                                                                                                    style="padding-left: 1%;">

                                                                                                    <font

                                                                                                         style="vertical-align: inherit;">

                                                                                                         <font

                                                                                                              style="vertical-align: inherit;">

                                                                                                              "प्रत्येक जन्म व मृत्यूची घटना नोंदवल्याची खात्री करा"

                                                                                                         </font>

                                                                                                    </font>

                                                                                               </td>

                                                                                               <td

                                                                                                    style="padding-left: 3%;">

                                                                                                    <font

                                                                                                         style="vertical-align: inherit;">

                                                                                                         <font

                                                                                                              style="vertical-align: inherit;">

                                                                                                              "Ensure

                                                                                                              Registration

                                                                                                              of every

                                                                                                              birth

                                                                                                              &amp;

                                                                                                              death"

                                                                                                         </font>

                                                                                                    </font>

                                                                                               </td>

                                                                                          </tr>

                                                                                     </tbody>

                                                                                </table>

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">

                                                                                <center><img alt=""

                                                                                          src="<?php echo base_url(); ?>images/barcode.png"><br>

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          <font

                                                                                               style="vertical-align: inherit;">

                                                                                               2016BCMC1410398</font>

                                                                                     </font>

                                                                                </center>

                                                                           </td>

                                                                      </tr>

                                                                 </tbody>

                                                            </table>

                                                       </center>

                                                  </div>





                                        </div>

                                   </div>

                                   <div class="btn-group pull-left">

                                        <input type="hidden" id="appointment_id" value="">

                                        <a  class="printPage btn btn-primary" href="#">Print</a>

                                        </form>

                                   </div>







                              </div>

                              <!--panel panel default-->

                              <!-- END SIMPLE DATATABLE -->

                         </div>

                         <!---form5 end---->
						 
						 <!-----------------------form7--------------------------start------------------------------->
						   <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form7" style="display:none;">

                              <!-- START SIMPLE DATATABLE -->

                              <div class="panel panel-default">

                                   <div class="panel-heading">

                                        <h3 class="panel-title">Certificate</h3>

                                        <div class="pull-right">

                                             <button class="btn btn-success closehideshow"

                                                  style="background-color:#00B050;">View Detail</button>

                                        </div>

                                   </div>

                                   <div class="panel-body" id="form7_certificate">

                                        <div class="col-lg-12">

                                             <form class="form-horizontal" id="master_form5" name="master_form5">

                                                  <div id="divToPrint">

                                                       <center>

                                                            <table frame="box" id="tbl_1"

                                                                 style="margin-top: 1%;width:100%;height:111px">

                                                                 <tbody>

                                                                      <tr>
							    
								<td style="width:20%;margin-top: -1%;padding-left: 2%;">
									<table style="width:100%;">
										<tbody>
                                                       <tr style="margin-bottom: 5%;">
											<td>
											<center>
                                                       <img src="<?php echo base_url(); ?>images/satya.jpg" style="float: left;padding-left: 20%;width: 35%;height:85px;"> 
                                                  </center>
											</td>
										</tr>
										
										 
									</tbody></table>
								</td>
								
								<td style="width:40%;">
									<center>
									<table>
										<tbody>
                                                       <tr>
											<td><center><b style="font-size: 15px;">महाराष्ट्र शासन</b></center></td>
										</tr>
                                                       <tr>
											<td><center><b style="font-size: 15px;">Government of Maharashtra</b></center></td>
										</tr>
										<tr>
											<td><center><b style="font-size: 15px;">आरोग्य विभाग</b></center></td>
										</tr>
                                                       <tr>
											<td><center><b style="font-size: 15px;">Health Department</b></center></td>
										</tr>
                                                       <tr>
											<td><center><b style="font-size: 15px;">  चंद्रपूर शहर महानगरपालिका   </b></center></td>
										</tr>
                                                       <tr>
											<td><center><b style="font-size: 15px;">  Chandrapur City Municipal Corporation   </b></center></td>
										</tr>
										
									</tbody></table>
									</center>
								</td>
								
								<td style="width:20%;margin-top: -1%;padding-right: 1%;">
									<table style="width:100%;">
										<tbody>
                                                       <tr style="margin-bottom: 5%;">
											<td>
											<center>
                                                       <img  src="<?php echo base_url(); ?>images/cmc.jpg" style="float: left;padding-left: 1%;width: 70%;height:105px;"> 
                                                  </center>
											</td>
										</tr>
										
									</tbody></table>
								</td>
							</tr>

                                                           

                                                                 </tbody>

                                                            </table>





                                                       </center>



                                                       <center>

                                                            <table frame="box" id="tbl_2" style="width:100%">

                                                                 <tbody>

                                                            
                                                                      <tr>

                                                                           <td colspan="4" style="font-size:13px;">

                                                                                <center>

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          <font

                                                                                               style="vertical-align: inherit;">

																								जन्म प्रमाणपत्र

                                                                                          </font>

                                                                                     </font>

                                                                                     <center> </center>

                                                                                </center>

                                                                           </td>

                                                                      </tr>
																	  <tr>

                                                                           <td colspan="4" style="font-size:13px;">

                                                                                <center>

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          <font

                                                                                               style="vertical-align: inherit;">

                                                                                               BIRTH REGISTRATION SLIP

                                                                                          </font>

                                                                                     </font>

                                                                                     <center> </center>

                                                                                </center>

                                                                           </td>

                                                                      </tr>
																	  <tr><td colspan="4">&nbsp;</td></tr>
																	  <tr>

                                                                           <td colspan="4" style="text-align:justify;font-size:12px;">

                                                                                

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          <font

                                                                                               style="vertical-align: inherit;">

                                                                                              ( जन्म व मृत्यू नोंदणी अधिनियम, १९६९ च्या कलम १२/१७ आणि महाराष्ट्र जन्म आणि मृत्यू नोंदणी नियम, २००० चे नियम ८/१३ अन्वये देण्यात आले आहे. )  
																							  
                                                                                          </font>

                                                                                     </font>

                                                                                     

                                                                           </td>

                                                                      </tr>
																	  <tr>

                                                                           <td colspan="4" style="text-align:justify;font-size:12px;">

                                                                               
                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          <font

                                                                                               style="vertical-align: inherit;">

                                                                                            
																				( Issued undersection 12/17 of the Registration of Birth & Death Act, 1969 and Rule 8/13 of the Maharashtra Registraion of Births and Deaths Rules, 2000. )
																							  
                                                                                          </font>

                                                                                     </font>

                                                                                   

                                                                           </td>

                                                                      </tr>
																	  <tr>

                                                                           <td colspan="4" style="text-align:justify;font-size:12px;">

                                                                               

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          <font

                                                                                               style="vertical-align: inherit;">

                                                                                            
																				प्रमाणित करण्यात येते की, खालील माहिती जन्माच्या मूळ अभिलेखाच्या नोंदवहीतून घेण्यात आली आहे, जी की चंद्रपूर शहर महानगरपालिका, तालुका चंद्रपूर, जिल्हा चंद्रपूर, महाराष्ट्र राज्याच्या नोंदवहीत उल्लेख आहे. 
																							  
                                                                                          </font>

                                                                                     </font>

                                                                                   

                                                                           </td>

                                                                      </tr>
																	  <tr >

                                                                           <td colspan="4" style="text-align:justify;font-size:12px;">

                                                                                

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          <font

                                                                                               style="vertical-align: inherit;">

                                                                                            
																				this is to certify that the following information has been taken from the original record of birth which is the register for Chandrapur City Municipal Corporation, Chandrapur of Tahsil / Chadrapur of District Chandrapur of Maharashtra State.
																							  
                                                                                          </font>

                                                                                     </font>

                                                                                    

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr style="font-size:13px;">

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          बाळाचे नाव : </font>

                                                                                </font>

                                                                           </td>

                                                                          <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          लिंग :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_regdate1">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Male</font>

                                                                                </font>

                                                                           </td>

                                                                      </tr>

                                                                      <tr style="font-size:13px;">

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Name of Child :</font>

                                                                                </font>

                                                                           </td>

                                                                              <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Gender :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_regdate1">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Male</font>

                                                                                </font>

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr style="font-size:13px;">

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          जन्मदिनांक :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_regno1">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          25/07/2015</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          जन्मठिकाण :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_regdate1">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Rajkot</font>

                                                                                </font>

                                                                           </td>

                                                                      </tr>

                                                                      <tr style="font-size:13px;">

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Date Of Birth: </font>


                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_regno2">15/05/2016</td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Place of Birth:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_regdate2">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Rajkot</font>

                                                                                </font>

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr style="font-size:13px;">

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          आईचे पूर्ण नाव :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_dob1">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          sdfsgjfjdg</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          वडिलांचे पूर्ण नाव :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_bplace1">hfghfgh</td>

                                                                      </tr>

																	  <tr style="font-size:13px;">

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Name of Mother :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_dob1">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          ghklfhiuifh</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Name of Father :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_bplace1">fdsgfd</td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                      <tr style="font-size:13px;">

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          बाळाचे जन्मावेळी आई - वडिलांचा पत्ता :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_mname1">sdgdfdhfg</td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          आई - वडिलांचा कायमचा पत्ता :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_fname1">fhdh</td>

                                                                      </tr>

                                                                      <tr style="font-size:13px;">

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Address of Parents at the time of child birth:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_mname2">ghfh</td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Permanent address of Parents:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_fname2">gfhg</td>

                                                                      </tr>

                                                                      


                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>


																		<tr style="font-size:13px;">

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          नोंदणी क्रमांक :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_mname1">sdgdfdhfg</td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          नोंदणी दिनांक :</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_fname1">20/01/0215</td>

                                                                      </tr>

                                                                      <tr style="font-size:13px;">

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Registration No.:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_mname2">ghfh</td>

                                                                           <td class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Registration Date:</font>

                                                                                </font>

                                                                           </td>

                                                                           <td class="tbl_data" id="b_fname2">02/05/2015</td>

                                                                      </tr>

                                                                      


                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

                                                                 

                                                                      <tr style="font-size:13px;">

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          शेरा / Remarks :</font>

                                                                                </font>

                                                                           </td>


                                                               <td class="tbl_data" colspan="2" id="b_fname2">fghdju</td>

                                                                           

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>

																	  <tr style="font-size:13px;">

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          प्रमाणपत्र दिल्याचा दिनांक :</font>

                                                                                </font>

                                                                           </td>


                                                               <td class="tbl_data" colspan="2" id="b_fname2">05/02/2016</td>

                                                                           

                                                                      </tr>

																	  <tr style="font-size:13px;">

                                                                           <td colspan="2" class="tbl_data">

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Date of Issue of Certificate :</font>

                                                                                </font>

                                                                           </td>


                                                               <td class="tbl_data" colspan="2" id="b_fname2">05/02/2051</td>

                                                                           

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4">&nbsp;</td>

                                                                      </tr>
																	  
																	  <tr style="font-size:14px;">

                                                                           <td class="tbl_data" rowspan="3"><center>

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          तयार करणार / तपासणार</font>

                                                                                </font></center>

                                                                           </td>

                                                                          <td colspan="1">&nbsp;</td>

                                                                           <td class="tbl_data" colspan="2"><center>

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          निर्गमित करणाऱ्या प्राधिकाऱ्याची सही</font>

                                                                                </font></center>

                                                                           </td>

                                                                           

                                                                      </tr>

																	  
																	  <tr style="font-size:14px;">
																		
																	  <td colspan="1">&nbsp;</td>

                                                                           <td class="tbl_data" colspan="2"><center>

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Signature of the issuing Authority</font>

                                                                                </font></center>

                                                                           </td>

                                                                           

                                                                      </tr>
																	  <tr style="font-size:14px;">
																		
																	  <td colspan="1">&nbsp;</td>

                                                                           <td class="tbl_data" colspan="2"><center>

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          निबंधक जन्म व मृत्यू नोंद अधिकारी</font>

                                                                                </font></center>

                                                                           </td>

                                                                           

                                                                      </tr>
																	  
																	  

                                                                      <tr style="font-size:14px;">

                                                                           <td class="tbl_data" colspan="1" rowspan="3"><center>

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          जन्म व मृत्यू विभाग, चंशमनपा, चंद्रपूर</font>

                                                                                </font></center>

                                                                           </td>

                                                                          <td colspan="1">&nbsp;</td>

                                                                           <td class="tbl_data" colspan="2"><center>

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          प्राधिकाऱ्याचा पत्ता</font>

                                                                                </font></center>

                                                                           </td>

                                                                         

                                                                      </tr>

                                                                     
																	   <tr style="font-size:14px;">
																		
																	  <td colspan="1">&nbsp;</td>

                                                                           <td class="tbl_data" colspan="2"><center>

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          Address of the issuing Authority</font>

                                                                                </font></center>

                                                                           </td>

                                                                           

                                                                      </tr>
																	   <tr style="font-size:14px;">
																		
																	  <td colspan="1">&nbsp;</td>

                                                                           <td class="tbl_data" colspan="2" ><center>

                                                                                <font style="vertical-align: inherit;">

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          चंद्रपूर शहर महानगरपालिका, चंद्रपूर</font>

                                                                                </font></center>

                                                                           </td>

                                                                           

                                                                      </tr>
																	  <tr>
																	  


                                                           
																

                                                                      <tr>

                                                                           <td colspan="4">

                                                                                <table frame="box"

                                                                                     style="width:98%;margin-left:1%;margin-right:1%;margin-bottom:1%;background-color: rgba(128, 128, 128, 0.41);">

                                                                                     <tbody>

                                                                                          <tr>

                                                                                               <td

                                                                                                    style="padding-left: 1%;font-size:14px;">

                                                                                                    <font

                                                                                                         style="vertical-align: inherit;">

                                                                                                         <font

                                                                                                              style="vertical-align: inherit;">

                                                                                                              "प्रत्येक जन्म व मृत्यूची घटना नोंदवल्याची खात्री करा"

                                                                                                         </font>

                                                                                                    </font>

                                                                                               </td>

                                                                                               <td

                                                                                                    style="padding-left: 3%;">

                                                                                                    <font

                                                                                                         style="vertical-align: inherit;">

                                                                                                         <font

                                                                                                              style="vertical-align: inherit;">

                                                                                                              "Ensure

                                                                                                              Registration

                                                                                                              of every

                                                                                                              birth

                                                                                                              &amp;

                                                                                                              death"

                                                                                                         </font>

                                                                                                    </font>

                                                                                               </td>

                                                                                          </tr>

                                                                                     </tbody>

                                                                                </table>

                                                                           </td>

                                                                      </tr>

                                                                      <tr>

                                                                           <td colspan="4" style="font-size:12px;">

                                                                                <center><img alt=""

                                                                                          src="<?php echo base_url(); ?>images/barcode.png"><br>

                                                                                     <font

                                                                                          style="vertical-align: inherit;">

                                                                                          <font

                                                                                               style="vertical-align: inherit;">

                                                                                               2016BCMC1410398</font>

                                                                                     </font>

                                                                                </center>

                                                                           </td>

                                                                      </tr>

                                                                 </tbody>

                                                            </table>

                                                       </center>

                                                  </div>





                                        </div>

                                   </div>

                                   <div class="btn-group pull-left">

                                        <input type="hidden" id="appointment_id" value="">

                                        <a  class="printPage btn btn-primary" href="#">Print</a>

                                        </form>

                                   </div>







                              </div>

                              <!--panel panel default-->

                              <!-- END SIMPLE DATATABLE -->

                         </div>
						 
						 <!----------------------------------------form 7 end------------------------------->

                         <!-------------------------------------------------------------------------------------------------------------------------->

                    </div>

                    <!-- end notification -->





               </div>



               <!-- END PAGE CONTENT WRAPPER -->

          </div>

          <!-- END PAGE CONTENT -->

     </div>

     <!-- END PAGE CONTAINER -->

     <!-- MESSAGE BOX-->

     <?php include('include/message_box.php');  ?>

     <!-- END MESSAGE BOX-->



     <!-- START SCRIPTS -->

     <?php include('include/footer_scripts.php');  ?>

     <!-- END SCRIPTS -->

     <script type="text/javascript">

     var baseurl = "<?php print base_url(); ?>";

     </script>

     <script src="<?php echo base_url(); ?>assets/js/myjs/birth_death.js"></script>

     <!--fileupload Files -->

     <script src="<?php echo base_url().'assets/js/AjaxFileUpload.js'?>"></script>

     <script type="text/javascript">

     $('.clockpicker').clockpicker();

     </script>

     <script>

            $('a.printPage').click(function() {

          var divToPrint = document.getElementById("form7_certificate");



          newWin = window.open("");

          newWin.document.write(divToPrint.outerHTML);

          newWin.print();

          newWin.close();

     });

     $('.date').datepicker({

          'todayHighlight': true,

          format: 'dd/mm/yyyy',

          autoclose: true,

     });



     var date = new Date();

     date = date.toString('DD/MM/YYYY');

     $(".date").val(date);

     //  $("#fdate").val(date);

     </script>

</body>



</html>