
// Pnotify
function notify(type, message){
    new PNotify({
        delay: 3000,
        title: 'Notification',
        text: message,
        addclass: 'annouce',
        type: type
    });
}


// toastNotify
function toastNotify(type, message){
    /*
    * For more details visit:- https://kamranahmed.info/toast
    *  Notification types: info, error, warning, success,
    *
    */
    let theType = type;
    let headingIs = 'Positioning';
    let successIs = 'success';

    if(theType == 'warning'){
         headingIs = 'Warning';
         successIs = 'warning';
    }else if(theType == 'success'){
        headingIs = 'Success';
        successIs = 'success';
    }else if(theType == 'error'){
        headingIs = 'Error';
        successIs = 'error';
    }else if(theType == 'info'){
        headingIs = 'Information';
        successIs = 'info';
    }

    $.toast({
        text: message, // Text that is to be shown in the toast
        heading: headingIs, // Optional heading to be shown on the toast
        icon: successIs, // Type of toast icon
        showHideTransition: 'fade', // fade, slide or plain
        allowToastClose: true, // Boolean value true or false
        hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
        stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
        position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values

        textAlign: 'left',  // Text alignment i.e. left, right or center
        loader: true,  // Whether to show loader or not. True by default
        loaderBg: '#9EC600',  // Background color of the toast loader
        beforeShow: function () {}, // will be triggered before the toast is shown
        afterShown: function () {}, // will be triggered after the toat has been shown
        beforeHide: function () {}, // will be triggered before the toast gets hidden
        afterHidden: function () {}  // will be triggered after the toast has been hidden
    });
}


/*
* Image Preview After After  Upload Image
*/

// Image Preview On Comment 
function preview_file_photo(e) {
    let objIs = $(e);

    var previewWrapperIs = '#comment-wrapper-'+objIs.data('comment-wrapper');

    let frame = document.querySelector(previewWrapperIs+' img');
    let imagePathOfFileImage = URL.createObjectURL(event.target.files[0]);
    frame.src = imagePathOfFileImage;
    let imageDisplay = objIs.val();
  
    
    if(imageDisplay != ''){
        
        var le=imageDisplay.length;
        var poin=imageDisplay.lastIndexOf(".");
        var accu1=imageDisplay.substring(poin,le);
        var accu = accu1.toLowerCase(); 
    
        if ((accu !='.png') && (accu !='.jpg') && (accu !='.jpeg')){
            notify('alert', "Please Select Valid Image File");
        }else{
            $(previewWrapperIs).show();
        }

    }else{
        $(previewWrapperIs).hide();
    }
    
}


function remove_comment_photo(r){

    let previewWrapperIs = '#comment-wrapper-'+r;
    $(previewWrapperIs).hide();
    let frame = document.querySelector(previewWrapperIs+' img');
    frame.src= '';
    $('*[data-comment-file="'+r+'"]').val('');
}

/*
* Comment Box Open
*/
function commentboxopen(id){
     $('#comment-form-'+id).show();
}

    
