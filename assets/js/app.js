$(document).ready(function(){
	if(window.location.pathname.indexOf('services')>-1){
		var icons=['fa fa-sellsy','fa fa-database','fa fa-stethoscope'];
$.ajax({url:"https://portalservicesapp.azurewebsites.net/portalservice/appservice/limit/3",contentType:"application/json",success:function(response){
	response.forEach(function(service,i){
		 var html='<div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 text-center">'+
								 '<a href="service.html?id='+service.name.split(" ").join("-").toLowerCase()+'">'+
									' <div class="'+icons[i]+'"></div>'+
									 '<div>'+service.name+'</div>'+
								' </a>'+
							 '</div>';
							 $(".services-list").append(html);
	});
}});
}
if(window.location.pathname.indexOf('service.html')>-1){
	var id=window.location.search.split("id=")[1];
$.ajax({url:"https://portalservicesapp.azurewebsites.net/portalservice/appservice/limit/3",contentType:"application/json",success:function(response){
response.forEach(function(service){
	 				if(service.name.split(" ").join("-").toLowerCase()==id){
						 $(".breadcrumb .active").html(service.name);
						  $(".activation-details .panel-title").html(service.name);
								$(".subscription-details .service-title h2").html(service.name);
							 $(".activation-details .panel-body p").html(service.desc);
					 }
});
}});
if(id=="health-monitoring-service"){
	$.ajax({url:"https://portalservicesapp.azurewebsites.net/portalservice/hmstatusservice/8F800777-AFBF-42BB-B280-91FCB760F264/dev",contentType:"application/json",success:function(response){

	response.forEach(function(service,i){
				if(service.parentid==null){
					$(".service-listing h2").html(service.name);
				}else{
					setServiceData(service,i);
				}
	});
	}});
}else{
	$(".service-listing h2").html(id.split("-").join(" "));
	var serviceText='<div class="panel panel-info">'+
			'<div class="panel-heading vertical-align" id="id-0">'+
						'<h4  class="ticket-header">'+
						'	App 1'+
						'</h4>'+
							'<div class="status major">'+
									'<span class="fa fa-exclamation-triangle"></span>'+
									'<span class="status-text"> Major Outage</span>'+
							'</div>'+
		'	</div>'+
			'<div class="panel-body" id="container-id-0">'+
					'desc 1'+
			'</div>'+
	'</div>';
	$(".service-listing .accordion").append(serviceText);
}
}
if(window.location.pathname.indexOf('home')>-1){
$.ajax({url:"https://portalservicesapp.azurewebsites.net/portalservice/newsservice/limit/2",contentType:"application/json",success:function(response){
	response.forEach(function(service){
			 var html='<div class="panel panel-default child-panel">'+
								 '<div class="panel-body posts">'+
									 '<div class="row">'+
										 '<div class="col-md-12">'+
												 				'<div class="post-item">'+
																	 '<div class="post-title">'+
																				 '<a href="">'+service.title+'</a>'+
																	 '</div>'+
																	 '<div class="post-date"><span class="fa fa-calendar"></span>'+service.createdDate+' </div>'+
																	' <div class="post-text">'+
																		 '<p>'+service.content+'</p>'+
																	 '</div>'+
															 '</div>'+
														 '</div>'+
												'</div>'+
											'</div>'+
										'</div>';
			 $("#newscontainer").append(html);
	});
}});
}
});

function login(){

	localStorage.setItem("user",'{"name":"Portal User","email":"user@abcd.com"}');
	setUser();
}
function setUser(){
	var user=JSON.parse(localStorage.getItem("user"));
	$('.profile-data-name').html(user.name);
	$('.profile-data-title').html(user.email);
		$('.logged-in a span').html(user.name);
	$('.page-container').show();
	$('.login').hide();
}
function getBillingDetails(){
	$('.activation-details').hide();
	$('.billing-details').show();
}
function getSubscription(){
	if($(".pricing .active").length==1){
	$('.activation-details').hide();
	$('.billing-details').hide();
	$('.subscription-details').show();
	}
}
function toggleForm(){
	$(".showForm").toggle();
	$(".char-textarea").eq(0).val("");
	$(".char-count span").html("1000");
	$('.support-listing .panel-body-open').removeClass("panel-body-open");
}
var statusConfig={"major_outage":{"status":"major","text":"Major Outage","icon":"fa-exclamation-triangle"},
"minor_outage":{"status":"minor","text":"Minor Outage","icon":"fa-exclamation-triangle"},
"healthy":{"status":"healthy","text":"Healthy","icon":"fa-check"}};
function setServiceData(service,i){
var serviceText='<div class="panel panel-info">'+
		'<div class="panel-heading vertical-align" id="id-'+i+'">'+
					'<h4  class="ticket-header">'+
					service.name+
					'</h4>'+
						'<div class="status '+statusConfig[service.status].status+'">'+
								'<span class="fa '+statusConfig[service.status].icon+'"></span>'+
								'<span class="status-text"> '+statusConfig[service.status].text+'</span>'+
						'</div>'+
	'	</div>'+
		'<div class="panel-body" id="container-id-'+i+'">'+
				service.desc+
		'</div>'+
'</div>';
$(".service-listing .accordion").append(serviceText);
}
