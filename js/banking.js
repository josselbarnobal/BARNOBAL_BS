
$(function(){

	$("#date_of_deposit").datepicker();
	$("#date_of_withdrawal").datepicker();
//viewdepositor
$.ajax({
		type: "POST",
		url: "viewDepositor.php",
		//data: data,
		success: function(data){
			$("#depositor_table").append(data);		
		},
		error: function(data){
			console.log(data);	
		}
	});
//viewRecords
$.ajax({
		type: "POST",
		url: "viewRecords.php",
		//data: data,
		success: function(data){
			$("#records_table").append(data);		
		},
		error: function(data){
			console.log(data);	
		}
	});
	
//viewTransaction	
	$.ajax({
		type: "POST",
		url: "viewTransaction.php",
		//data: data,
		success: function(data){
			
			$("#transactions_table").append(data);		
		},
		error: function(data){
			console.log(data);	
		}
	});
	$("#addDialog_depositor").hide();
	$("#addDialog_records").hide();
	
$("#all_transaction").hide();
$("#successDialog").hide();

$("#depositor1").click(function(){
	$("#home").hide();
	$("#depositor").show();
	$("#records").hide();
	$("#all_transaction").hide();
	
});


$("#records1").click(function(){
	$("#home").hide();
	$("#depositor").hide();
	$("#records").show();
	$("#all_transaction").hide();

});

$("#home1").click(function(){
	$("#home").show();
	$("#depositor").hide();
	$("#records").hide();
	$("#all_transaction").hide();

});

$("transactions1").click(function(){
	$("#home").hide();
	$("#depositor").hide();
	$("#records").hide();
	$("transactions").show();

});


      

$("#register").click(function(){
		
		var obj = {
				"firstname":$("input[name='firstname']").val(),
				"lastname":$("input[name='lastname']").val(),
				"accountname":$("input[name='accountname']").val(),
				"accountpassword":$("input[name='accountpassword']").val(),
				"accountpassword2":$("input[name='accountpassword2']").val()
						};
		
		$.ajax({
			type: "POST",
			url: "add_account.php",
			data: obj,
			success: function(data){
					alert(data);
			},
			error: function(data){
				alert(data);		
			}
		});
	});

//AddDepositor
$("#add_button_depositor").click(function(){


		$("#addDialog_depositor").dialog({
			autoOpen: true,
			show: "slide",
			hide: "slide",
			modal: true,
			width: 500,
			height: 550,
			buttons: {
			
			"add": function(){
				var obj = {
					
					"depositorname":$("input[name='depositorname']").val(),
					"address":$("input[name='address']").val(),
					"occupation":$("input[name='occupation']").val(),
					"contactnumber":$("input[name='contactnumber']").val()
				};
				$.ajax({
				type: "POST",
				url: "addDepositor.php",
				data: obj,
				success: function(data){
						alert("succesfully added .. ");
						$("#depositor_table").append(data);		
					},
						error: function(data){
					}
				});
			},
			"close": function() {
				$(this).dialog("close");
				
				}
			}
		});
			
	});

//AddRecords
$("#add_button_records").click(function(){
	
	
	$("#addDialog_records").dialog({
		autoOpen: true,
		show: "slide",
		hide: "slide",
		height: 550,
		width: 500,
		modal: true,
		buttons: {
			"add":function(){
				var obj = {
				"depositor_id":$("input[name='depositor_id']").val(),
				"deposits":$("input[name='deposits']").val(),
				"date_of_deposits":$("input[name='date_of_deposits']").val(),
				"withdrawals":$("input[name='withdrawals']").val(),
				"date_of_withdrawals":$("input[name='date_of_withdrawals']").val(),
				"balance":$("input[name='balance']").val()
						};
						
		
				$.ajax({
					type: "POST",
					url: "addRecords.php",
					data: obj,
					success: function(data){
						alert("succesfully added .. ");
						$("#records_table").append(data);		
					},
					error: function(data){
						alert(data);		
					}
				});
			},
			"close":function(){
				$(this).dialog("close");
			}
		}
	});
});				
	$("#search").keyup(function(){ 
		 var depositor_id = $("#search").val();
		 var obj = {'depositor_id':depositor_id};
		
			  $.ajax({
				type:"POST",
				url: "search.php",
				data: obj,
				 success: function(data){
				 $("#transaction_tables").html(data);
					//alert(data);
						                         
				},
				error: function(data){
				// alert(data);
				 }
								 
				});	
                    }); 
				$("#search").click(function(){
				 $("#search").val("");
	  }); 

});  
	


	


//Depositor


	function deleteDepositor(depositor_id){
				$(function(){
						$(".myDialog").dialog({
						      		resizable: false,
								modal: true,
								show: 'bounce',
								hide: 'explode',
								buttons: {
									"yes": function() {
										$(this).dialog("close");
											var wordObj = {"depositor_id":depositor_id};
						 		$.ajax({
						       			type:"POST",
						       			data: wordObj,
						       			url:"deleteDepositor.php",
						       			success:function(data){ 
						       				$(document.getElementById(depositor_id)).remove();
						       			},
						  		 	error:function(data){}
										});     
									 },
									"no": function() {
										$(this).dialog("close");
									}
								}
						});
				});
  		}
	
	function editDepositor(depositor_id){
		$(function()
		
			{var Obj = {"depositor_id":depositor_id};
					$.ajax({
						type:"POST",
						data: Obj,
						url:"editDepositor.php",
						success:function(data){ 
							var Obj = JSON.parse(data);
								$("input[name = 'depositor_id']").val(Obj.depositor_id);
								$("input[name = 'depositorname']").val(Obj.depositorname);
								$("input[name = 'address']").val(Obj.address);
								$("input[name = 'occupation']").val(Obj.occupation);
								$("input[name = 'contactnumber']").val(Obj.contactnumber);
						},

						error:function(data){
							console.log();
						}
					});     
			
			
			$("#addDialog_depositor").dialog({
				autoOpen: true,
				resizable: false,
				modal: true,
				show: 'slide',
				hide: 'slide',
				buttons: {
					"save": function(){
						var obj = {
						"depositor_id":$("input[name='depositor_id']").val(),
						"depositorname":$("input[name='depositorname']").val(), 
						"address":$("input[name='address']").val(),
						"occupation":$("input[name='occupation']").val(),
						"contactnumber":$("input[name='contactnumber']").val()
						
					};
		
						$.ajax({
							type: "POST",
							url: "saveDepositor.php",
							data: obj,
							success: function(data){
								alert("successfully edited!");
								$(document.getElementById(obj.depositor_id)).html(data);
							},
							error: function(data){
								alert(data);		
							}
						});
					
					},
					"close":function(){
					$(this).dialog("close");
				}
				
				
				}
				
				});
					
		});
	}
						
//Records

function deleteRecords(id){
	$(function(){
		$(".myDialog").dialog({
			autoOpen: true,
			resizable: false,
			modal: true,
			show: 'bounce',
			hide: 'explode',
			buttons: {
				"yes": function() {
					$(this).dialog("close");
						var Obj = {"id":id};
							$.ajax({
						       		type:"POST",
						       		data: Obj,
						       		url:"deleteRecords.php",
						       		success:function(data){ 
						       			$(document.getElementById(id)).remove();
						       		},
						  		error:function(data){
						  			alert(data);
						  		}
							});     
				},
				"no": function() {
					$(this).dialog("close");
				}
			}
		});
	});
 }

	function editRecords(id){
		
		var obj = {"id":id};
				
				$.ajax({
				type: "POST",
				data: obj,
				url: "editRecords.php",
				success: function(data){
					var obj = JSON.parse(data);
					$("input[name ='id']").val(obj.id);
					$("input[name ='depositor_id']").val(obj.depositor_id);
					$("input[name ='deposits']").val(obj.deposits);
					$("input[name ='date_of_deposits']").val(obj.date_of_deposits);
					$("input[name ='withdrawals']").val(obj.withdrawals);
					$("input[name ='date_of_withdrawals']").val(obj.date_of_withdrawals);
					$("input[name ='balance']").val(obj.balance);
				},
				error: function(){
					console.log(data);		
				}
				});
				
		$("#addDialog_records").dialog({
			autoOpen: true,
			show: "slide",
			hide: "slide",
			modal: true,
			height:  550,
			width: 500,
			buttons: {
				"save":function(){
					var obj = {
					"id":$("input[name='id']").val(),
					"depositor_id":$("input[name='depositor_id']").val(), 
					"deposits":$("input[name='deposits']").val(),
					"date_of_deposits":$("input[name='date_of_deposits']").val(),
					"withdrawals":$("input[name='withdrawals']").val(),
					"date_of_withdrawals":$("input[name='date_of_withdrawals']").val(),
					"balance":$("input[name='balance']").val()
						
					};
		
					$.ajax({
						type: "POST",
						url: "saveRecords.php",
						data: obj,
						success: function(data){
								alert("successfully edited!");
								$(document.getElementById(obj.id)).html(data);
						},
						error: function(data){
							alert(data);		
						}
					});		
				},
				"close":function(){
					$(this).dialog("close");
				}
			}
	});
			
			
		
	}
	
			
