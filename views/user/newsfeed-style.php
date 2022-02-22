<style type="text/css">
    #file-preview-wrappper {
        display: none;
    }

    #file-preview-wrappper li {
        width: 120px;
        position: relative;
        border: solid 1px #c4c4c4;
        margin: 3px 5px;
    }

    .modal-body label {
        cursor: pointer;
    }

    /* Image Preview */
    #file-preview-wrappper li span {
        position: absolute;
        right: 5px;
        top: 4px;
        color: #F44336;
        padding-top: 7px;
        padding-right: 6px
    }

    #file-preview-wrappper li span:hover {
        color: #D50000;
    }

    #poststatusphoto {
        display: none;
    }

    ul.comments-list .comment-item {
        background-color: #F5F5F5;
    }

    ul.comments-list .comment-item p {
        background-color: rgba(158, 158, 158, 0.07);
        border-radius: 4px;
        padding: 4px 6px;
    }

    /* Comment Wrapper Image */
    .comment-image-wrapper {
        position: relative;
    }

    .comment-image-wrapper span {
        padding-top: 7px;
        padding-right: 5px;
        color: #F44336;
    }

    .comment-image-wrapper span:hover {
        color: #D50000;
    }

    .comment-image-wrapper {
        width: 100%;
        float: left;
    }

    .comment-image-wrapper img {
        width: 45%;
        float: right;
    }

    .reply-form {
        display: none;
    }

    .like-item-element {
        cursor: pointer;
    }

    #shareable-post-preview {
        width: 100%;
        float: left;
    }

    /*
			Modal Of Post Share Form
		*/
    #postShareModal .modal-header {
        padding-top: 0;
        padding-bottom: 0;
    }

    #postShareModal .modal-body {
        padding-top: 10px;
    }

    #postShareModal .modal-footer {
        padding-top: 0;
        padding-bottom: 0;
    }

    #postShareModal .modal-footer #postShareBtn {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    #share-form {}

    #share-form .form-group {
        margin-bottom: 10px;
    }

    #share-form div {
        width: 100%;
    }

    #share-form textarea {
        float: left;
        width: 100%;
        background-color: #EEEEEE;
    }

    #post-image,
    #post-text {
        float: left;
    }

    .shared-post-content-wrapper {
        padding-left: 8%;
    }

    .shared-image-display {
        width: 100%;
        float: left
    }

    /* --------------------------------------------
            Modifications For Design Changing
         -------------------------------------------- */
    .togglebutton label input[type=checkbox]:checked+.toggle {
        background-color: #43D799 !important;
        margin-top: -5px;
    }

    .togglebutton label .toggle,
    .togglebutton label input[type=checkbox][disabled]+.toggle {
        margin-top: -5px;
        width: 26px;
        height: 16px;
    }

    .togglebutton label input[type=checkbox]:checked+.toggle:after {
        left: 29px !important;
    }

    .togglebutton label .toggle:after {
        content: "";
        display: inline-block;
        width: 14px !important;
        height: 14px !important;
        line-height: 16px;
        background-color: #FFFFFF;
        border-radius: 20px;
        position: relative;
        left: 3px;
        top: 3px;
        transition: left 0.3s ease, background 0.3s ease, box-shadow 0.1s ease;
        text-align: center;
    }

    .togglebutton label .toggle,
    .togglebutton label input[type=checkbox][disabled]+.toggle {
        content: "";
        display: inline-block;
        width: 46px !important;
        height: 20px !important;
        background-color: rgba(80, 80, 80, 0.7);
        border-radius: 15px;
        margin-right: 0;
        transition: background 0.3s ease;
        vertical-align: middle;
    }

    .block {
        display: inline-block !important;
    }
    
</style>