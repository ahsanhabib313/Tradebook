/*
* To Invitation This  Script Add This
*   	$("body").filterInput();
*/
$.fn.filterInput = function () {

//filter special

	$('.filter').on('keypress blur keyup', function(e){
		var string = $(this).val();
		$(this).val(string.replace(/[^a-z0-9\s-_.]/gi, ''));
	});


//filter address
	$('.filter-address').on('keypress blur keyup', function(e){
		var string = $(this).val();
		$(this).val(string.replace(/[^a-z0-9\s-_+.,@#/*()]/gi, ''));
	});

//filter website
	$('.filter-website').on('keypress blur keyup', function(e){
		var string = $(this).val();
		$(this).val(string.replace(/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/gi, ''));
	});

//filter mobile
	$('.filter-mobile').on('keypress blur keyup', function(e){
		var string = $(this).val();
		$(this).val(string.replace(/[^0-9\+]/gi, ''));
	});

//filter email
	$('.filter-email').on('keypress blur keyup', function(e){
		var string = $(this).val();
		$(this).val(string.replace(/[^a-z0-9\-_.@]/gi, ''));
	});

//only number
	$('.filter-num').on('keypress blur keyup', function(e){
		var string = $(this).val();
		$(this).val(string.replace(/[^0-9\.]/gi, ''));
	});

	$('.filter-error').on('keypress blur keyup', function(e){
		var _self = $(this);
		var _parent = $(this).closest('.form-group');

		var string = _self.val();
		if (string != "" && $(_parent.find('.invalid-feedback')).exists()) {
	        _parent.find('.invalid-feedback').remove();
			_self.removeClass('is-invalid');
	        // _parent.removeClass('has-error');
	    }
	});


}


