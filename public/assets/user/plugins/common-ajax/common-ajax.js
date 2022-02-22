//process btn with post,animation,nofify once
function _run(e){
	var obj = $(e);
	obj.prop('disabled', true);
	var ajax_config = {
      'form': obj.data('form'),
      'type': 'POST',
      'btn': obj.data('btnid'),
      'status': obj.data('status'),
      'loading': obj.data('loading'),
      'validator': obj.data('validator'),
      'callback': obj.data('callback'),
      'notify': obj.data('notify'),
      'animation': obj.data('animation'),
      'redirect_url': obj.data('redirect'),
      'errorfield': obj.data('errorfield'),
      'errorfeedback': obj.data('errorfeedback'),
    //  'redirect_url': obj.data('redirect'),
      'param': obj.data('param'),
      'file': obj.data('file'),
      func: function(result){

      	functionName = obj.data('callback');
      	if(functionName){
	        window[functionName](result);
	    }
      }
    };
    ajax_form(ajax_config);
}

function ajax_form(ajax_config){

	var form_id = ajax_config['form'];
	var request_url = ajax_config['request_url'];
	var request_type = (ajax_config['type']) ? ajax_config['type'] : 'POST';
	var btn = ajax_config['btn'];
	var msg_id = ajax_config['status'];
	var redirect_url = ajax_config['redirect_url'];
	var loading_msg = (ajax_config['loading']) ? ajax_config['loading'] : 'Loading.....';
	var errorfield = (ajax_config['errorfield']) ? ajax_config['errorfield'] : 'is-invalid';
	var errorfeedback = (ajax_config['errorfeedback']) ? ajax_config['errorfeedback'] : 'invalid-feedback';
	var validator = ajax_config['validator'];
	var callBack = ajax_config['callback'];
	var responseBack = ajax_config['responseBack'];
	var notify = ajax_config['notify'];
	var animation = ajax_config['animation'];
	var param = ajax_config['param'];
	var file = (ajax_config['file']) ? ajax_config['file'] : false;


	$("#"+form_id).submit(function(e)
	{	
		if(btn){
			var temp_html = $("#"+btn).html();
			$("#"+btn).html(loading_msg);
		}
		if(msg_id){
			$("#"+msg_id).html(loading_msg);
		}
		
		if(file){
			var postData = new FormData(this);
		}else{
			var postData = $(this).serializeArray();
		}

		if(param && file){
			postData.append('extra', param);
		}
		else if(param){
			postData.push({ name: 'extra', value: param });
		}

		if(request_url){
			var formURL = request_url;
		}else{
			var formURL = $(this).attr("action");
		}
		
		var ac = {
		url : formURL,
		type: request_type,
		data : postData,
		dataType : 'json',
		success:function(data, textStatus, jqXHR) 
		{	

			var responsData = data;

			if(btn){
				$("#"+btn).html(temp_html);
			}

			if(msg_id){
				$("#"+msg_id).html(responsData.message);
			}

			if(callBack){
				ajax_config.func(responsData);
			}

			if(notify){
				
				//notify error
				if(notify == 2 && responsData.success == 0){
					$.makeNotify(responsData);
				}
				//notify Success
				if(responsData.success == 1){
					$.makeNotify(responsData);
				}
			}

			if(validator){
				r = responsData.success;
				validData = responsData.errors;
				$._validator(form_id, validData, errorfield, errorfeedback);
			}

			if (animation && responsData.success == 0) {
				if ($("#"+animation).exists()) {
			        $('#'+animation).makeAnimated();
			    }
			}

			if (redirect_url && responsData.success == 1) {
				$.redirectPost(redirect_url, responsData.data);
			}

				
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				if(btn){
					$("#"+btn).html(temp_html);
				}

				if(callBack){
					ajax_config.func(jqXHR);
				}
			}
		}
		if(file){
			ac.cache = false;
			ac.contentType = false;
			ac.processData = false;
		}
		$.ajax(ac);
	    e.preventDefault();	//STOP default action
	    $(this).unbind();
	});
		
	$("#"+form_id).submit(); //SUBMIT FORM
}


// jquery extend function
$.extend(
{
    redirectPost: function(location, args)
    {
        var form = '';
        $.each( args, function( key, value ) {
            //value = value.split('"').join('\"')
            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
        });
        $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo($(document.body)).submit();
    },
    _validator: function(form, errors, errorfield = "is-invalid", errorfeedback = 'invalid-feedback') {
	    $( 'form#'+form).find('.'+errorfield).removeClass(errorfield);
	    $( 'form#'+form).find('.'+errorfeedback).remove('.'+errorfeedback);

	    $.each(errors, function(k, v) {
	    	 console.log(errors);


	        if(k.includes('.')){

	          ka = k.split('.');
	          var k = ka[0];
	          ka.shift();
	          for(var i = 0; i < ka.length; i++){
	            k += '['+ka[i]+']';
	          }
	          
	        }
	        
	        $( 'form#'+form+' input[name="'+k+'"], textarea[name="'+k+'"], select[name="'+k+'"]').addClass(errorfield);  
	        $( 'form#'+form+' input[name="'+k+'"], textarea[name="'+k+'"], select[name="'+k+'"]').after( '<div class="'+k+' '+errorfeedback+'">'+v+'</div>' );
	        
	    });
	},
	makeNotify: function(data){
		var heading = (data.notify.heading) ? data.notify.heading : 'Notification';
		var text = (data.notify.text) ? data.notify.text : 'Empty';
		var position = (data.notify.position) ? data.notify.position : 'top-right';
		var loaderBg = (data.notify.loaderBg) ? data.notify.loaderBg : 'error';
		var icon = (data.notify.icon) ? data.notify.icon : 'error';
		if(data.notify){
			$.toast({
				heading: heading,
				text: text,
				position: position,
				loaderBg: loaderBg,
				icon: icon,
				hideAfter: 3500, 
				stack: 6
			});
		}
	}

});




$.fn.exists = function () {
  return this.length !== 0;
}

$.fn.clean = function (form) {
  	$(this)[0].reset();
	$(this).find('.error-msg').remove()
	$(this).find('.form-group').removeClass('has-error');
}

