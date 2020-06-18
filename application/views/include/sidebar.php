<?php
//echo '<pre>'.print_R($this->data,1).'</pre>';
?>
<div class="page-sidebar">
	<!-- START X-NAVIGATION -->
	<ul class="x-navigation">
		<li class="xn-logo">
			<a href="javascript:void(0);">&nbsp;</a>
			<a href="#" class="x-navigation-control"></a>
		</li>
		<!-- <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="<?php echo base_url() ?>assets/assets/images/users/no-image.jpg" alt="User"/>
            </a>
        </li> -->
		<li class="xn-title text-right">
			<ul>
				<!-- TOGGLE NAVIGATION -->
				<li class="xn-icon-button">
					<a href="#" class="x-navigation-minimize"><span class="fa fa-bars"></span></a>
				</li>
				<!-- END TOGGLE NAVIGATION -->
			</ul>
		</li>
		<!-- <li> -->
		<!-- <a href="<?php echo base_url() ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Other</span></a> -->
		<!-- </li> -->
		<!-- <li> -->
		<!-- <a href="<?php echo base_url() ?>Welcome/cust_master"><span class="fa fa-user"></span> <span class="xn-text">Customer Master</span></a> -->
		<!-- </li> -->
		<!-- <li> -->
		<!-- <a href="<?php echo base_url() ?>Welcome/pendingtoassign"><span class="fa fa-phone"></span> <span class="xn-text">Panding Calls to Assign</span></a> -->
		<!-- </li> -->
		<!-- <li> -->
		<!-- <a href="<?php echo base_url() ?>Welcome/pendingcalls"><span class="fa fa-clock-o"></span> <span class="xn-text">Pending Calls</span></a> -->
		<!-- </li> -->
		<!-- <li> -->
		<!-- <a href="<?php echo base_url() ?>Welcome/closedcalls"><span class="fa fa-phone-square"></span> <span class="xn-text">Closed Calls</span></a> -->
		<!-- </li> -->
		<li class="<?php if ($active_menu == 'ind') {
									echo 'x-active-nav';
								} ?>"><a href="<?php echo base_url() ?>Welcome/dashboard"><span class="fa fa-tachometer"></span> <span class="xn-text">Dashboard</span></a>
		</li>



		<?php
		if ($this->session->role == 'admin') {
		?>

			<li class="<?php if ($active_menu == 'import') {
										echo 'x-active-nav';
									} ?>"><a href="<?php echo base_url() ?>Welcome/import"><span class="fa fa-file-excel-o"></span> <span class="xn-text">Import Data</span></a></li>

			<li class="<?php if ($active_menu == 'addadm') {
										echo 'x-active-nav';
									} ?>"><a href="<?php echo base_url() ?>Welcome/addadmin"><span class="fa fa-user"></span><span class="xn-text">Add Admin</span></a>
			</li>
			<li class="<?php if ($active_menu == 'addstf') {
										echo 'x-active-nav';
									} ?>"><a href="<?php echo base_url() ?>Welcome/addstaff"><span class="fa fa-group"></span><span class="xn-text">Add Staff Member</span></a>
			</li>
			<!-- <li class="<?php if ($active_menu == 'adddep') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url() ?>Welcome/adddepartment"><span class="fa fa-building"></span><span
                    class="xn-text">Add Department</span></a>
        </li> -->
			<li class="<?php if ($active_menu == 'feestr') {
										echo 'x-active-nav';
									} ?>"><a href="<?php echo base_url() ?>Welcome/fee_structure"><span class="fa fa-money"></span><span class="xn-text">Fee Structure</span></a>
			</li>



		<?php }
		if ($this->session->role == 'user' || $this->session->role == 'admin') { ?>






			<li class="<?php if ($active_menu == 'pro') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/property_record"><span class="fa fa-exchange"></span><span class="xn-text">Property Transfer Record</span></a></li>
			<li class="<?php if ($active_menu == 'inh') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/inheritance"><span class="fa fa-user"></span><span class="xn-text">Inheritance Certificate</span></a></li>
			<li class="<?php if ($active_menu == 'fir_o') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/firefinal_object"><span class="fa fa-fire"></span><span class="xn-text">Fire Fighting Final No Objection
						Certificate</span></a></li>
			<!-- <li class="<?php if ($active_menu == 'occ') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/occupation"><span class="fa fa-briefcase"></span><span class="xn-text">Occupation Certificate</span></a></li> -->
			<li class="openable open ">
					<a href="#">
						<span class="fa fa-briefcase"></span><span class="xn-text">Occupation Certificate</span>
						<span class="menu-hover"></span>
					</a>
					<ul class="submenu">

					<li class="<?php if ($active_menu == 'oc_bus') {
													echo 'x-active-nav';
												} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/business_type"><span class="submenu-label">Business Type</span></a>
						</li>
						<li class="<?php if ($active_menu == 'occ') {
													echo 'x-active-nav';
												} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/occupation"><span class="submenu-label ">Occupation Certificate</span></a>
						</li>
						
						
					</ul>
				</li>
		<li class="<?php if ($active_menu == 'part') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/part"><span class="fa fa-plus"></span><span class="xn-text">Part Certificate</span></a></li>
			<li class="<?php if ($active_menu == 'zone') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/zone"><span class="fa fa-map-marker"></span><span class="xn-text">Zone Certificate</span></a></li>
			<li class="<?php if ($active_menu == 'con') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/construction"><span class="fa fa-wrench"></span><span class="xn-text">Construction Certificate</span></a></li>
			<li class="<?php if ($active_menu == 'plant') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/plant"><span class="fa fa-plus"></span><span class="xn-text">Plant Certificate</span></a></li>
			<li class="<?php if ($active_menu == 'fir_f') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/fire_fighting"><span class="glyphicon glyphicon-fire"></span><span class="xn-text">Fire fighting</span></a></li>
			<li class="<?php if ($active_menu == 'out') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/outstanding"><span class="fa fa-tachometer"></span><span class="xn-text">Outstanding Certificate</span></a></li>
			<li class="<?php if ($active_menu == 'no_ob') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/no_objection"><span class="fa fa-bullseye"></span><span class="xn-text">No Objection Certificate</span></a></li>
			<li class="<?php if ($active_menu == 'res') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/resident"><span class="fa fa-home"></span><span class="xn-text">Resident Certificate</span></a></li>
			<li class="<?php if ($active_menu == 'ass') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/asset_detail"><span class="fa fa-tachometer"></span><span class="xn-text">Asset Detail Certificate</span></a></li>









		<?php }
		if ($this->session->role == "admin") {

		?>



			<li class="<?php if ($active_menu == 'bir') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/birth_death"><span class="fa fa-calendar"></span><span class="xn-text">Birth</span></a>
			</li>
			<li class="<?php if ($active_menu == 'death') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/death"><span class="fa fa-calendar"></span><span class="xn-text">Death</span></a>
			</li>
			<li class="openable open ">
				<a href="#">
					<span class="fa fa-plus"></span><span class="xn-text">Marriage Registration Department</span>
					<span class="menu-hover"></span>
				</a>
				<ul class="submenu">
					<li class="<?php if ($active_menu == 'mar') {
												echo 'x-active-nav';
											} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/marriage_registration"><span class="submenu-label">Marriage Registration</span></a>
					</li>
					<li class="<?php if ($active_menu == 'cash_rv') {
												echo 'x-active-nav';
											} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/cash_counter_receipt_voucher"><span class="submenu-label">Cash Counter Receipt Voucher</span></a>
					</li>
					<li class="<?php if ($active_menu == 'cash_rv') {
												echo 'x-active-nav';
											} ?>"><a class="" target="_blank" href="<?php echo base_url(); ?>Marrige/showDatewiseReceipt"><span class="submenu-label">Generate Challan</span></a>
					</li>
				</ul>
			</li>

			<li class="openable open ">
				<a href="#">
					<span class="fa fa-plus"></span><span class="xn-text">Cash Counter</span>
					<span class="menu-hover"></span>
				</a>
				<ul class="submenu">
					<li class="<?php if ($active_menu == 'mar') {
												echo 'x-active-nav';
											} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/cash_counter"><span class="submenu-label">Cash
								Counter</span></a>
					</li>

					<li class="<?php if ($active_menu == 'cash_rv') {
												echo 'x-active-nav';
											} ?>"><a class="" target="_blank" href="<?php echo base_url(); ?>CashCounter/showDatewiseReceipt"><span class="submenu-label">Generate Challan</span></a>
					</li>
				</ul>
			</li>


			<li class="<?php if ($active_menu == 'miscellaneous') {
										echo 'x-active-nav';
									} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/miscellaneous_cash_counter"><span class="fa fa-money"></span><span class="xn-text">Miscellaneous Cash Counter</span></a></li>


			<li class="openable open ">
				<a href="#">
					<span class="fa fa-plus"></span><span class="xn-text">Municipal website</span>
					<span class="menu-hover"></span>
				</a>
				<ul class="submenu">
					<li class="<?php if ($active_menu == 'menu_mas') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/manu_master"><span class="submenu-label">Menu
								Master</span></a>
					</li>
					<li class="<?php if ($active_menu == 'muni_ele') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/munipal_election"><span class="submenu-label">Municipal
								Election 5 Events</span></a>
					</li>
					<li class="<?php if ($active_menu == 'heat_action') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/heat_action"><span class="submenu-label">Heat Action
								Plan</span></a>
					</li>
					<li class="<?php if ($active_menu == 'annu_ac') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/annual_account"><span class="submenu-label">Annual
								Account</span></a>
					</li>
					<li class="<?php if ($active_menu == 'gallery') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/gallery"><span class="submenu-label">Gallery</span></a>
					</li>
					<li class="<?php if ($active_menu == 'quick_link') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/quick_link"><span class="submenu-label">Quick link
								Master</span></a>
					</li>
					<li class="<?php if ($active_menu == 'info_city') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/info_city"><span class="submenu-label">Information about
								the
								city</span></a>
					</li>
					<li class="<?php if ($active_menu == 'budget') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/budget"><span class="submenu-label">Budget</span></a>
					</li>
					<li class="<?php if ($active_menu == 'suggestions') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/suggestions"><span class="submenu-label">Suggestions</span></a>
					</li>
					<li class="<?php if ($active_menu == 'municipal_r_d') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/municipal_r_d"><span class="submenu-label">Municipal
								resolutions and decisions </span></a>
					</li>
					<!-- <li class="<?php if ($active_menu == 'gov_res_report') {
														echo 'x-active-nav';
													} ?>"><a href="<?php echo base_url(); ?>Welcome/gov_res_report"><span class="submenu-label">Government Resolution Report</span></a>
                </li> -->
					<li class="<?php if ($active_menu == 'admin_staff_profile') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/admin_staff_profile"><span class="submenu-label">Administrative Wing</span></a>
					</li>
					<li class="<?php if ($active_menu == 'master_edu_service') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/master_edu_service"><span class="submenu-label">Master of
								Educational Services </span></a>
					</li>
					<li class="<?php if ($active_menu == 'e_link') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/e_link"><span class="submenu-label">E-Link</span></a>
					</li>
					<li class="<?php if ($active_menu == 'web_edu_master') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/web_edu_master"><span class="submenu-label">Web Education
								Master</span></a>
					</li>
					<li class="<?php if ($active_menu == 'emergency_phone') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/emergency_phone"><span class="submenu-label">Emergency
								Phone
								Number </span></a>
					</li>
					<li class="<?php if ($active_menu == 'e_tenders') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/e_tenders"><span class="submenu-label">E-tenders</span></a>
					</li>
					<li class="<?php if ($active_menu == 'first_page_text') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/first_page_text"><span class="submenu-label">First Page
								Text
							</span></a>
					</li>
					<li class="<?php if ($active_menu == 'contacts') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/contacts"><span class="submenu-label">Contacts </span></a>
					</li>
					<li class="<?php if ($active_menu == 'about_muni_corp') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/about_muni_corp"><span class="submenu-label">About
								Municipal
								Corporation </span></a>
					</li>
					<li class="<?php if ($active_menu == 'disaster_management') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/disaster_management"><span class="submenu-label">Disaster
								Management </span></a>
					</li>
					<li class="<?php if ($active_menu == 'left_menu') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/left_menu"><span class="submenu-label">Left Menu
							</span></a>
					</li>
					<li class="<?php if ($active_menu == 'right_menu') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/right_menu"><span class="submenu-label">Menu on The Right
							</span></a>
					</li>
					<li class="<?php if ($active_menu == 'title_menu') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/title_menu"><span class="submenu-label">Title
								Menu</span></a>
					</li>
					<li class="<?php if ($active_menu == 'slider_info') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/slider_info"><span class="submenu-label">Slider
								Info</span></a>
					</li>
					<li class="<?php if ($active_menu == 'underway_pro') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/underway_pro"><span class="submenu-label">Currently
								Underway
								Project</span></a>
					</li>
					<li class="<?php if ($active_menu == 'councilor_profile') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/councilor_profile"><span class="submenu-label">Councilor
								Profile</span></a>
					</li>
					<li class="<?php if ($active_menu == 'new_developments') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/new_developments"><span class="submenu-label">New
								Developments</span></a>
					</li>
					<li class="<?php if ($active_menu == 'right_to_info') {
												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/right_to_info"><span class="submenu-label">Right to
								Information</span></a>





					</li>
					<li class="<?php if ($active_menu == 'frequiently_ask_questions') {



												echo 'x-active-nav';
											} ?>"><a href="<?php echo base_url(); ?>Welcome/frequiently_ask_questions"><span class="submenu-label">Frequently Asked Questions</span></a>
					</li>
				</ul>
			</li>










		<?php
		}
		if ($this->session->role == "staff") {
		?>
			<?php if ($this->session->department_code == "01") { ?>

				<li class="<?php if ($active_menu == 'pro') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/property_record"><span class="fa fa-exchange"></span><span class="xn-text">Property Transfer Record</span></a></li>


			<?php } else if ($this->session->department_code == "02") { ?>
				<li class="<?php if ($active_menu == 'inh') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/inheritance"><span class="fa fa-user"></span><span class="xn-text">Inheritance Certificate</span></a></li>

			<?php } else if ($this->session->department_code == "03") { ?>
				<li class="<?php if ($active_menu == 'fir_o') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/firefinal_object"><span class="fa fa-fire"></span><span class="xn-text">Fire Fighting Final No Objection
							Certificate</span></a></li>
			<?php } else if ($this->session->department_code == "04") { ?>
				<!-- <li class="<?php if ($active_menu == 'occ') {

													echo 'x-active-nav';
												} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/occupation"><span class="fa fa-briefcase"></span><span class="xn-text">Occupation Certificate</span></a></li> -->

				<li class="openable open ">
					<a href="#">
						<span class="fa fa-briefcase"></span><span class="xn-text">Occupation Certificate</span>
						<span class="menu-hover"></span>
					</a>
					<ul class="submenu">

					<li class="<?php if ($active_menu == 'oc_bus') {
													echo 'x-active-nav';
												} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/business_type"><span class="submenu-label">Business Type</span></a>
						</li>
						<li class="<?php if ($active_menu == 'occ') {
													echo 'x-active-nav';
												} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/occupation"><span class="submenu-label ">Occupation Certificate</span></a>
						</li>
						
						
					</ul>
				</li>
			<?php } else if ($this->session->department_code == "05") { ?>
				<li class="<?php if ($active_menu == 'part') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/part"><span class="fa fa-plus"></span><span class="xn-text">Part Certificate</span></a></li>

			<?php } else if ($this->session->department_code == "06") { ?>
				<li class="<?php if ($active_menu == 'zone') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/zone"><span class="fa fa-map-marker"></span><span class="xn-text">Zone Certificate</span></a></li>





			<?php } else if ($this->session->department_code == "07") { ?>
				<li class="<?php if ($active_menu == 'con') {





											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/construction"><span class="fa fa-wrench"></span><span class="xn-text">Construction Certificate</span></a></li>
			<?php }
			if ($this->session->department_code == "08") { ?>
				<li class="<?php if ($active_menu == 'plant') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/plant"><span class="fa fa-plus"></span><span class="xn-text">Plant Certificate</span></a></li>
			<?php }
			if ($this->session->department_code == "09") { ?>
				<li class="<?php if ($active_menu == 'fir_f') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/fire_fighting"><span class="glyphicon glyphicon-fire"></span><span class="xn-text">Fire fighting</span></a></li>
			<?php }
			if ($this->session->department_code == "10") { ?>
				<li class="<?php if ($active_menu == 'out') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/outstanding"><span class="fa fa-tachometer"></span><span class="xn-text">Outstanding Certificate</span></a></li>
			<?php }
			if ($this->session->department_code == "11") { ?>
				<li class="<?php if ($active_menu == 'no_ob') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/no_objection"><span class="fa fa-bullseye"></span><span class="xn-text">No Objection Certificate</span></a></li>
			<?php }
			if ($this->session->department_code == "12") { ?>
				<li class="<?php if ($active_menu == 'res') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/resident"><span class="fa fa-home"></span><span class="xn-text">Resident Certificate</span></a></li>
			<?php }
			if ($this->session->department_code == "13") { ?>
				<li class="<?php if ($active_menu == 'ass') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/asset_detail"><span class="fa fa-tachometer"></span><span class="xn-text">Asset Detail Certificate</span></a></li>

			<?php }
			if ($this->session->department_code == "14") { ?>
				<li class="<?php if ($active_menu == 'bir') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/birth_death"><span class="fa fa-calendar"></span><span class="xn-text">Birth</span></a>




				</li>
				<li class="<?php if ($active_menu == 'death') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/death"><span class="fa fa-calendar"></span><span class="xn-text">Death</span></a>














				</li>
			<?php }
			if ($this->session->department_code == "15") { ?>
				<li class="openable open ">
					<a href="#">
						<span class="fa fa-plus"></span><span class="xn-text">Marriage Registration Department</span>
						<span class="menu-hover"></span>
					</a>
					<ul class="submenu">
						<li class="<?php if ($active_menu == 'mar') {
													echo 'x-active-nav';
												} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/marriage_registration"><span class="submenu-label">Marriage Registration</span></a>
						</li>
						<li class="<?php if ($active_menu == 'cash_rv') {
													echo 'x-active-nav';
												} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/cash_counter_receipt_voucher"><span class="submenu-label">Cash Counter Receipt Voucher</span></a>
						</li>
						<li class="<?php if ($active_menu == 'cash_rv') {
													echo 'x-active-nav';
												} ?>"><a class="" target="_blank" href="<?php echo base_url(); ?>Marrige/showDatewiseReceipt"><span class="submenu-label">Generate Challan</span></a>
						</li>
					</ul>
				</li>
			<?php }
			if ($this->session->department_code == "16") { ?>
				<li class="openable open ">

					<a href="#">


						<span class="fa fa-plus"></span><span class="xn-text">Cash Counter</span>
						<span class="menu-hover"></span>
					</a>
					<ul class="submenu">
						<li class="<?php if ($active_menu == 'mar') {
													echo 'x-active-nav';
												} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/cash_counter"><span class="submenu-label">Cash
									Counter</span></a>
						</li>

						<li class="<?php if ($active_menu == 'cash_rv') {
													echo 'x-active-nav';
												} ?>"><a class="" target="_blank" href="<?php echo base_url(); ?>CashCounter/showDatewiseReceipt"><span class="submenu-label">Generate Challan</span></a>
						</li>
					</ul>
				</li>
				<li class="<?php if ($active_menu == 'miscellaneous') {
											echo 'x-active-nav';
										} ?>"><a class="" href="<?php echo base_url(); ?>Welcome/miscellaneous_cash_counter"><span class="fa fa-money"></span><span class="xn-text">Miscellaneous Cash Counter</span></a></li>




		<?php
			}
		}
		?>








		<!-- </li> -->
		<!-- <li> -->
		<!-- <a href="<?php echo base_url() ?>Welcome/multistep"><span class="fa fa-phone-square"></span> <span class="xn-text">Multi Step</span></a> -->
		<!-- </li> -->
		<!-- <li> -->
		<!-- <a href="<?php echo base_url() ?>Welcome/multistep1"><span class="fa fa-phone-square"></span> <span class="xn-text">Multi Step1</span></a> -->
		<!-- </li> -->
	</ul>
	<!-- END X-NAVIGATION -->
</div>
