/*var Demo = (function() {

    function demoMain () {
        var mc = $('#cropper-1');
        mc.croppie({
            viewport: {
                width: 150,
                height: 150,
                type: 'circle'
            },
            boundary: {
                width: 300,
                height: 300
            },
            // url: 'demo/demo-1.jpg',
            // enforceBoundary: false
            // mouseWheelZoom: false
        });
        mc.on('update.croppie', function (ev, data) {
            // console.log('jquery update', ev, data);
        });


    }

    return {
        init: init
    };
})();
*/



class ImageChanger{

    constructor(type, idtype){
        this.ImageType = type;
        this.ElementId = idtype;
    }

    profilePicChangeInit(){
        //alert('profilePicChangeInit '+this.ImageType);

        var mc = $('#'+this.ElementId);
        mc.croppie({
            viewport: {
                width: 150,
                height: 150,
                type: 'circle'
            },
            boundary: {
                width: 300,
                height: 300
            },
            // url: 'demo/demo-1.jpg',
             enforceBoundary: false
            // mouseWheelZoom: true
        });
        mc.on('update.croppie', function (ev, data) {
             console.log('jquery update', ev, data);
        });

        mc.croppie('bind');

    }


    profilePicChangeDestroy(){
        var mc = $('#'+this.ElementId);
        mc.croppie('destroy');
    }
    coverPicChangeInit(){
        alert('coverPicChangeInit '+ImageType);
    }
    coverPicChangeDestroy(){
        alert('coverPicChangeDestroy '+ImageType);
    }
}

let profileImageChange = new ImageChanger('profilePicture', 'profile-image-changer' );


