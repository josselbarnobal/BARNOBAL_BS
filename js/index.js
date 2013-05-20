
$(function(){

$("#tabs").tabs();
$("#tabs_loan").tabs();

$("#index").show();
$("#mission").hide();
$("#vision").hide()
$("#bankhistory").hide();
$("#loan").hide();

$("#index1").click(function(){
	$("#index").show();
	$("#mission").hide();
	$("#vision").hide()
	$("#bankhistory").hide();
	$("#loan").hide();
});

$("#mission1").click(function(){
	$("#index").hide();
	$("#mission").show();
	$("#vision").hide()
	$("#bankhistory").hide();
	$("#loan").hide();
});

$("#vision1").click(function(){
	$("#index").hide();
	$("#mission").hide();
	$("#vision").show()
	$("#bankhistory").hide();
	$("#loan").hide();
});
$("#bankhistory1").click(function(){
	$("#index").hide();
	$("#mission").hide();
	$("#vision").hide()
	$("#bankhistory").show();
	$("#loan").hide();
});
$("#loan1").click(function(){
	$("#index").hide();
	$("#mission").hide();
	$("#vision").hide()
	$("#bankhistory").hide();
	$("#loan").show();
});



});


