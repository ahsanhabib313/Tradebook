const socket = io('http://localhost:3000', {
    secure: true,
    transports: ['websocket', 'polling'],
});


// subscribe the to a channel
socket.emit('joinRoom', {'userid': 'user'+cUserId});





function notificationSocket(otheruserid, actiontype, extra = null){
    let userId = otheruserid;
    let notificatinType = actiontype;
    let brodcasemsg = null;


    // Follow/Unfollow Operation Message
    if(notificatinType == 'follow'){
        brodcasemsg = '<a href="profile?id='+userId+'" class="h6 notification-friend"><strong>'+cUserName+'</strong></a> started '+notificatinType+' your profile';
    }else if(notificatinType == 'unfollow'){
        brodcasemsg = '<a href="profile?id='+userId+'" class="h6 notification-friend"><strong>'+cUserName+'</strong></a> '+notificatinType+'ed your profile';
    }else if(notificatinType == 'post_share'){
        brodcasemsg = '<a href="profile?id='+userId+'" class="h6 notification-friend"><strong>'+cUserName+'</strong></a> share your post';
    }else if(notificatinType == 'like'){
        brodcasemsg = '<a href="profile?id='+userId+'" class="h6 notification-friend"><strong>'+cUserName+'</strong></a> Like your '+((extra) ? extra : 'post');
    }else if(notificatinType == 'comment'){
        brodcasemsg = '<a href="profile?id='+userId+'" class="h6 notification-friend"><strong>'+cUserName+'</strong></a> comment on your post';
    }

    /**
     * Send Notification to server for other user
     */
    socket.emit('notiftouser', {
        room: 'user'+userId,
        message: brodcasemsg,
        notificatinType: notificatinType
    });

}


// Broadcast Notification To The User
socket.on('nmessage', ({message, notificatinType}) => {

    // Right Icon Set
    let notificationRightIcon = null;
    if(notificatinType == 'follow'){
        notificationRightIcon = 'olymp-happy-face-icon';
    }else if(notificatinType == 'unfollow'){
        notificationRightIcon = 'olymp-happy-face-icon';
    }else if(notificatinType == 'post_share'){
        notificationRightIcon = 'olymp-share-icon';
    }else if(notificatinType == 'like'){
        notificationRightIcon = 'olymp-heart-icon';
    }else if(notificatinType == 'comment'){
        notificationRightIcon = 'olymp-comments-post-icon';
    }

    // Added Notification On LI List
    let appendElement = '<li id="notification-list-wrapper" class="un-read">'+
                                '<div class="author-thumb">'+
                                    '<img src="../public/assets/user/img/avatar63-sm.jpg" alt="author">'+
                                '</div>'+
                                '<div class="notification-event">'+
                                    '<div>'+message+'</div>'+
                                    '<span class="notification-date"><time class="entry-date updated" dateTime="2004-07-24T18:18">9 hours ago</time></span>'+
                                '</div>'+
                                '<span class="notification-icon"><svg class="'+notificationRightIcon+'"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#'+notificationRightIcon+'"></use></svg></span>'+

                                '<div class="more">'+
                                    '<svg class="olymp-three-dots-icon">'+
                                        '<use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>'+
                                    '</svg>'+
                                    '<svg class="olymp-little-delete">'+
                                        '<use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-little-delete"></use>'+
                                    '</svg>'+
                                '</div>'+
                        '</li>';

    $('ul#notifications-list').prepend(appendElement);
    $('#notifications-level').show();

    if($('#notifications-level').text() == ''){
        $('#notifications-level').text(1);
    }else{
        let currentNotificationCount = $('#notifications-level').text();
        $('#notifications-level').text(parseInt(currentNotificationCount) + 1);
    }




    let audio = document.getElementById("notificationSound");
    audio.play();
});


