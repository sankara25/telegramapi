$('#but_database_create').click(function() {	
    
	var database_url = $('#database_url').val();
	var username = $('#txt_username').val();
	var password = $('#txt_password').val();
	var database_name = $('#txt_database_name').val();
	
	$.ajax({  
			type: "POST",
			url: base_url + 'install/settings/',  
			data: {'database_url': database_url,'username': username,'password': password,'database_name': database_name},  
			dataType: "html",
			success: function(data){ // <-- note the parameter here, not in your code
				var data = data.split("|");
			  if(data[0] == '0')
			  {
				   
				   $('#install_message').html("<div class='alert alert-danger'>"+data[1]+"</div>");
			  }
			  else
			  {
				  
				  $('#install_message').html("<div class='alert alert-success'>"+data[1]+"</div>");
			  }
			}
		});
	
});

$('#but_add_bot').click(function() {	
    
	var bot_token = $('#txt_bot_token').val();
	var bot_name = $('#txt_bot_name').val();
	var bot_username = $('#txt_bot_username').val();
	
	$.ajax({  
			type: "POST",
			url: base_url + 'api/v1/bot/add/',  
			data: {'bot_token': bot_token,'bot_name': bot_name,'bot_username': bot_username},  
			dataType: "html",
			success: function(data){ // <-- note the parameter here, not in your code
				$('#add_bot_message').html(data);
			}
		});
	
});

function get_api_data(method_type)  
{	
    var telegram_bot = $('#sel_telegram_bot').val();
    var data = "telegram_bot="+telegram_bot+"&method_type="+method_type;
    var message = 'get_bot_message';
    
    if(method_type == 'setWebhook')
    {
        var webhook_url = encodeURI($('#txt_bot_webhook_url').val()); 
        var data = "telegram_bot="+telegram_bot+"&method_type="+method_type+"&webhook_url="+webhook_url;
        var message = 'get_webhook_message';
    }
    
	$.ajax({  
			type: "POST",
			url: base_url + 'api/v1/bot/'+method_type+'/',  
			data: data,  
			dataType: "html",
			success: function(data){ // <-- note the parameter here, not in your code
				$('#'+message).html(data);
			}
		});
	
}

