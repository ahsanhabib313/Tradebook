

function addFriendUnfriendFollowUnfollow(e){
    let objetIs = $(e);
    let friendId = objetIs.data('friendid');
    let actiontype = objetIs.data('actiontype');

    $.ajax({
        url: 'add-friend-follow-unfollow',
        type: 'POST',
        dataType: 'json',
        data: { friend_id: friendId , actiontype: actiontype },
        success: function(data){

            if(data.success){
                $('#copy-btn').data('actiontype', data.nextaction);

                // Friend And Unfriend Section
                if(data.nextaction == 'add'){
                    objetIs.data('original-title', 'Copy');
                    objetIs.attr('data-original-title', 'Copy');

                    objetIs.data('actiontype', 'add');
                    objetIs.attr('data-actiontype', 'add');

                }else if(data.nextaction == 'remove'){
                    objetIs.data('original-title', 'Uncopy');
                    objetIs.attr('data-original-title', 'Uncopy');

                    objetIs.data('actiontype', 'remove');
                    objetIs.attr('data-actiontype', 'remove');
                }

                // Follow And Unfollow Section
                if(data.nextaction == 'follow'){
                    objetIs.data('original-title', 'Follow');
                    objetIs.attr('data-original-title', 'Follow');

                    objetIs.data('actiontype', 'follow');
                    objetIs.attr('data-actiontype', 'follow');


                    // Follow/Unfollow Button Changed
                    $('#follow-btn').html('<i class="fas fa-user-minus"></i>');
                    $('#follow-btn').attr('style', 'background-color: #f92552 !important');


                    notificationSocket(friendId, 'follow');

                }else if(data.nextaction == 'unfollow'){
                    objetIs.data('original-title', 'Unfollow');
                    objetIs.attr('data-original-title', 'Unfollow');

                    objetIs.data('actiontype', 'unfollow');
                    objetIs.attr('data-actiontype', 'unfollow');

                    // Follow/Unfollow Button Changed
                    $('#follow-btn').html('<i class="fas fa-user-plus"></i>');
                    $('#follow-btn').attr('style', 'background-color: #41c300 !important');


                    notificationSocket(friendId, 'unfollow');
                }

            }


        },
        error: function(e){
            console.log('This is error'/*e*/)
        }
    });





}