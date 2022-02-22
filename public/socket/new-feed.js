/****************************************************************
 *          Socket For New Post Appending
 ************************************************************/
function realTimePostSocket(newpostid, type) {
    let newPostId = newpostid;
    let itemType = type;


    /**
     * Send New Post Information To The Server
     */
    socket.emit('newpostforuser', {
        newPostId: newPostId,
        itemtype: itemType
    });
}


// Broadcast Post & Comment To The Users
socket.on('newpost', ({newPostId, itemtype }) => {

    let latestPostId = newPostId;
    let itemType = itemtype;


    $.ajax({
        url: 'real-time-post-comment',
        type: 'POST',
        dataType: 'json',
        data: {
            op: 'realtimepost',
            lastitem: latestPostId,
            itemtype: itemType
        },
        success: function(data) {
            if (data.success) {

                if (itemType == 'post') {
                    $('#newsfeed-items-grid').prepend(data.elementHtml);
                } else if (itemType == 'comment') {
                    let commentOnPostId = data.commmentpostid;
                    $('#post-comment-' + commentOnPostId).append(data.elementHtml);
                } else if (itemType == 'reply') {
                    $('#repliedText-' + data.replyPostid).append(data.reply);
                }

                $('.livicon-evo').addLiviconEvo();

            }
        },
        error: function(e) {
            console.log(e)
        }
    });
});