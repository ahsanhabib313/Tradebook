// image modal script 
// image gallary open
// Get the modal
$(document).ready(function(){
    let id = "";
    let max ="";
    $(".galary-img").click(function(){
        var post_thumb = $(this).parents('.post-thumb');
        var modalImg = $(this).find(".galary-modal-content");
        var img_src = $(this).attr("src");
        id = $(this).data("image_id");
        $(this).closest(".post-thumb").children(".img-modal").toggle();
        $(this).closest(".post-thumb").children(".img-modal").find(".galary-modal-content").attr("src",img_src);
        max = $(this).data("total_img");
        $("body").css({
            "overflow":"clip"
        });
    });
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    $(".modal-close").click(function(){
        $(".img-modal").hide();
        $("body").css({
            "overflow":"auto"
        });
    });
    $(".modal-next").click(function(){
        if(id<max){
            id++;
        }
        let src = $(this).parents(".post-thumb").children(".galary").find("#grid_image"+id).attr("src");
        $(this).prev('.galary-modal-inner-container').children(".galary-modal-content").attr("src",src)
    });
    $(".modal-prev").click(function(){
        if(id >1){
            id--;
        }
        let src = $(this).parents(".post-thumb").children(".galary").find("#grid_image"+id).attr("src");
        $(this).next('.galary-modal-inner-container').children(".galary-modal-content").attr("src",src);
    });
});
/****************************************
 * GALARY COMMENT BOX SHOW
 ***************************************/
function galary_commentboxopen(id){
    $('.comment-form-galary').show();
}
/***********************************************************************
 * GALARY MODAL COMMETS CALL BACK FUNCTION
 **********************************************************************/
function GalaryCommentPostCallback(data) {
    if (data.success) {
        $('#GalaryPostCommentBtn' + data.postid).prop('disabled', false);
        $(".comment-form-galary").trigger("reset");
    } else {
        // notify('error', data.message);
        $('#GalaryPostCommentBtn' + data.postid).prop('disabled', false);
        $._validator("comment-form-galary-" + data.postid, data.errors);
    }
}
/************************************************************
 * GALARY SCROLLER FOR ASIDE
 ************************************************************/
$(document).ready(function(){
    (function($){
		$(window).on("load",function(){
			$(".mCustomScrollbar").mCustomScrollbar({
				setHeight:340,
				theme:"minimal-dark"
			});
		});
	})(jQuery);
});

/***********************************************************
 * SHOW MORE IN A PARAGRAPH
 ***********************************************************/
 $(document).ready(function(){
	var maxLength = 300;
    let all_text = "";
	$(".p-paging").each(function(){
		var myStr = $(this).text();
        all_text = $(this).text();
		if($.trim(myStr).length > maxLength){
			var newStr = myStr.substring(0, maxLength);
			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
			$(this).empty().html(newStr);
			$(this).append(' <a href="javascript:void(0);" class="read-more text-primary">Read more...</a>');
			$(this).append('<span class="more-text">' + removedStr + ' <a href="javascript:void(0);" class="read-less text-primary">Read less...</a>'+'</span>');
		}
	});

    $("body").on('click','.read-more',function(e){
	// $(".read-more").click(function(){
        if($(this).next().hasClass("more-text")){
            $(this).next(".more-text").contents().unwrap();
        }
		$(this).remove();
	});
    $("body").on('click','.read-less',function(e){
        // $(".more-text").toggle();
        let p_str = $(this).parent(".p-paging").text();
        if($.trim(p_str).length > maxLength){
            let newStr = p_str.substring(0,maxLength);
            let removedStr = p_str.substring(maxLength, $.trim(p_str).length);
            $(this).parent(".p-paging").empty().html(newStr).append('<a href="javascript:void(0);" class="read-more text-primary">Read more...</a>').append('<span class="more-text">' + removedStr+'</span>');// $("span").remove();
        }
	});
});
/**********************************
 * COMMENT GALARY MODAL
 **********************************/
$(document).ready(function(e) {
    $("body").on('click','.comment-img',function(e) {
        let image_src = $(this).attr('src');
        $(this).parents(".comment-image-wrapper").next(".comment-img-modal").show();
        $(this).parents(".comment-image-wrapper").next(".comment-img-modal").find("img").attr("src",image_src);
        $("body").css({
            "overflow":"clip"
        });
    });
    $("body").on('click','.modal-close-comment',function(e) {
        $(".comment-img-modal").hide();
        $("body").css({
            "overflow":"auto"
        });
    });
});
/****************************************************
 * POST IMAGE DELETE FROM EDITE MODAL
 ***************************************************/
$(document).ready(function () {
    $('body').on('click','.btn-img-remove',function (e) {
        e.preventDefault();
        if (confirm("Are you sure to delte photo!")) {
            var type = "POST";
            var image_id = $(this).data("image_id");
            var ajaxurl = '/user/post-image-delete';
            $.ajax({
                type: type,
                url: ajaxurl,
                data: { 
                    'image_id': image_id,
                },
                dataType: 'json',
                success: function (data) {
                    if(data.status==1){
                        $("#item-id-"+image_id).remove();
                        notify('success', data.message);
                    }else{
                        notify('error', data.message);
                    }
                }
            });
        } 
    });
});
/*************************************************
 * EDITE POST OR UPDATE POST
 ************************************************/
function postEditCallBack(data) {
    if( data.status==="success"){
        if(data.hasOwnProperty('success')){
            notify('success', data.success);
        }else if(data.hasOwnProperty('upload_success')){
            notify('success',data.upload_success);
            $('.edit-errors').fadeOut();
        }else{
            $('.edit-errors').each(function (index, element) {
                $(this).append("<li>"+data.upload_error+"</li>")
                $(this).after("<span>"+data.upload_error+"</span>")
            });
        }
        
        $('.edit-post-btn').removeAttr('disabled');

    } else {
        $('.edit-errors').children("li").remove();
        for($i=0;$i<data.failed.length;$i++){
            $('.edit-errors').each(function (index, element) {
                $(this).append("<li>"+data.failed[$i]+"</li>")
            });
        }
        $('.edit-errors').each(function (index, element) {
            $(this).append("<li>"+data.upload_error+"</li>")
            if($(this).next().hasClass('alert')){
                $(this).next(".alert").html("Only post text updated but other operation failed");
            }else{
                $(this).after("<div class='alert alert-success'>"+"Only post text updated but other operation failed"+"</dive>")
            }
            
        })
        $('.edit-errors').fadeIn();
        $('.edit-post-btn').removeAttr('disabled');
    }
}
/********************************************************
 * IMAGE PREVIEW WHEN UPLOAD NEW IMAGE
 *******************************************************/
$(document).ready(function(){
    $('.input-post-img').change(function(){
        $(".preview-img-row").html('');
        for (var i = 0; i < $(this)[0].files.length; i++) {
            $(".preview-img-row").append('<div class="col-lg-4 col-lg-6"><img src="'+window.URL.createObjectURL(this.files[i])+'" class="img img-fluid" style="width:100%; border-radious:4px;"/></div>');
            
        }
    });
});
/*************************************************
 * LOAD MORE CONTENT IN COMMENT PART
 *************************************************/
 $(document).ready(function () {
    $(".comments-list").each(function (index, element) {
        x=$(this).data("item");
        $(this).children('li:lt('+x+')').fadeIn();
        size_li = $(this).children(".comment-item").length;
        $(this).data("size",size_li);
        if(size_li<2){
            $(this).parents('.comments-wrapper').find(".loadMore").fadeOut();
        }
        $(this).parents(".comments-wrapper").find(".available-comments").html("("+(size_li-x)+" comments)");
    });
    var x = "";
    // $('.comments-list li:lt('+x+')').fadeIn();
    $('.loadMore').click(function () {
        size_li = $(this).parents(".more-less-wrapper").prev().data("size");
        x = $(this).parents(".more-less-wrapper").prev().data("item");
        x= (x+2 <= size_li) ? x+2 : size_li;
        $(this).parents(".more-less-wrapper").prev().children('li:lt('+x+')').fadeIn();
         $(this).next('.showLess').fadeIn();
        if(x == size_li){
            $(this).fadeOut();
        }
        $(this).parents(".more-less-wrapper").prev().data("item",x);
        $(this).find(".available-comments").html("("+(size_li-x)+" comments)");
    });
    $('.showLess').click(function () {
        size_li = $(this).parents(".more-less-wrapper").prev().data("size");
        x = $(this).parents(".more-less-wrapper").prev().data("item");
        x=(x-2<0) ? 1 : x-2;
        $(this).parents(".more-less-wrapper").prev().children('li').not(':lt('+x+')').fadeOut();
        $(this).prev('.loadMore').fadeIn();
         $(this).fadeIn();
        if(x < 2){
            $(this).fadeOut();
        }
        $(this).parents(".more-less-wrapper").prev().data("item",x);
        $(this).prev().find(".available-comments").html("("+(size_li-x)+" comments)");
    });
});
/**************************************
 * SHOW COMMENTS SUBMIT BUTTON
 **************************************/
$(document).ready(function () {
    $('.comment-form').trigger('reset');
    $(".textarea-comment").keyup(function(e) {
        var total = $(this).val().length;
        console.log(total);
        if(total>3){
            $(this).parents("form").children(".btn-submit-comment").addClass('fadeIn');
            $(this).parents("form").children(".btn-submit-comment").removeClass('fadeOut');
        }else{
            $(this).parents("form").children(".btn-submit-comment").removeClass('fadeIn');
            $(this).parents("form").children(".btn-submit-comment").addClass('fadeOut');
        }
        // trap the back space and delete button
        if (e.which == 8 || e.which == 46) {
            var total = $(this).val().length;
            console.log(total);
            if(total>3){
                $(this).parents("form").children(".btn-submit-comment").addClass('fadeIn');
                $(this).parents("form").children(".btn-submit-comment").removeClass('fadeOut');
            }else{
                $(this).parents("form").children(".btn-submit-comment").removeClass('fadeIn');
                $(this).parents("form").children(".btn-submit-comment").addClass('fadeOut');
            }
        }
    });
    $(".comment-file-input").on("change",function () {
        $(this).parents("form").children(".btn-submit-comment").addClass('fadeIn');
    })
});
/***********************************************
 * SHOW COMMENTS WHEN CLICK THE COMMENTS ICON
 ***********************************************/
$(document).ready(function () {
    $(".comments-icon").click(function () {
        $(this).parents("article").next(".comments-wrapper").toggle();
    });
});
/*******************************************************
     * PAGE PROFILE PREVIEW
     *******************************************/
 $(document).ready(function(){
    $('#pro-img-upload').change(function(){
        $("#profile-preview").html('');
        for (var i = 0; i < $(this)[0].files.length; i++) {
            $("#profile-preview").append('<div class="col-lg-4 col-lg-6"><img src="'+window.URL.createObjectURL(this.files[i])+'" class="img img-fluid" style="width:100%; border-radious:4px;"/></div>');
        }
    });
});
/************************************
 * PROFILE PICTURE UPDATE
 ***********************************/
function profile_pic_update_callBack(data) {
    $("#pro-upload-error").hide();
    $("#proUpBtn").removeAttr("disabled");
    if( data.success){
        notify('success',data.message);
        $('#profile-edit').modal('hide');
    } else {
        $("#pro-upload-error").show().text(data.upload[0]);
        notify('error',"Please fix following errors!");
    }
}