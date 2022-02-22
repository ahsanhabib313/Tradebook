<style type="text/css">
    .textColor {
        color: black !important;
        cursor: pointer;
    }

    textarea::-webkit-input-placeholder {
        font-size: 20px;
    }

    .likeColor {
        font-size: 20px;
        color: blue !important;
    }
    .page-cover-img-wrapper {
        max-height: 390px;
        overflow: hidden;
        position: relative;
    }
    .cover-img-inner-con {
        height: 83%;
        position: relative;
        overflow: hidden;
    }
.cover-img {
    height: auto !important;
}
.page-setting-asside {
	background-color: white;
	min-height: 658px;
}
.cover-img {
	height: auto !important;
	width: 100% !important;
}
.page-heading {
	letter-spacing: 4px;
}
.page-h-color{
    color: #053788 !important;
}
.author-img {
	width: 52px;
	height: 52px;
	border-radius: 50%;
}
/* post file input styel */
.image-upload > input
    {
        display: none;
    }
    .image-upload img
    {
        width: 80px;
        cursor: pointer;
    }
    /* image gallary modal image */
     /* Style the Image Used to Trigger the Modal */
.galary-img {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
.img-modal {
	display: none;
	position: fixed;
	z-index: 22;
	/* padding-top: 100px; */
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgb(0,0,0);
	background-color: #053788;
}
.galary-img:hover {opacity: 0.7;}

/* The Modal (background) */
.img-modal {
	display: none;
	position: fixed;
	z-index: 22;
	/* padding-top: 100px; */
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgb(0,0,0);
	background-color: #053788;
}

/* Modal Content (Image) */
.galary-modal-content {
	margin: auto;
	display: block;
	width: 93% !important;
	max-width: 750px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.galary-modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
	position: absolute;
	top: 15px;
	right: 13px;
	color: #f1f1f1;
	font-size: 40px;
	font-weight: bold;
	transition: 0.3s;
	z-index: 22;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .galary-modal-content {
    width: 100%;
  }
} 
.grid-image-con {
	/* height: 200px; */
	overflow: hidden;
	border: 3px solid #edf2f6;
}
.custom-col-lg {
	width: 50%;
	height: 200px;
	overflow: hidden;
}
.modal-img-container {
	margin: auto;
	max-width: a;
	position: relative;
	margin-top: 111px;
	background-color: #07337e;
}
.modal-next {
	position: absolute;
	right: 0;
	top: 0;
	bottom: 0;
	border: none;
	background: #0000000f;
	width: 100;
	font-weight: bolder;
}
.modal-prev {
	border: none;
	top: 0;
	position: absolute;
	bottom: 0;
	left: 0;
	z-index: 1;
	background-color: #0000000f;
}
.galary-multiple-img {
	bottom: 0;
	display: inline;
	left: -553px;
	width: 100px;
	float: right;
	position: absolute;
}
.galary-all-img {
	float: right;
	position: absolute;
	right: 0;
	bottom: 0;
	text-align: center;
	background-color: #05378882;
	left: 0;
	top: 50%;
	display: inline;
}
.post-thumb img {
	width: 100%;
	display: block;
	min-height: 150px;
    border:none;
}
.total-image {
	/* vertical-align: middle; */
	margin-top: 10%;
	display: block;
	font-weight: bolder;
	font-size: 24px;
}
.galary-modal-aside {
	height: 100%;
	height: 100vh;
	position: absolute;
	left: 0;
	right: 0;
	overflow: auto;
}
.post-thumb .galary-authore-img {
	/* height: 52px !important; */
	min-height: auto;
	width: auto;
}
.form-group-galary-comment {
	display: flex !important;
}
.frm-group-con {
	width: 100%;
	height: ;
    position:relative;
}
.frm-group-con textarea {
	min-height: auto !important;
	height: 58px;
}
.camera-icon-con {
	position: absolute;
	right: 6px;
	bottom: 6px;
}
#galaryPostCommentBtn215 {
	/* float: right; */
	margin-top: 1rem;
	width: 100%;
}
.comment-img-preview{
	min-height: auto !important;
	height: auto !important;
	border-radius: 4px !important;
	margin-right: 0 !important;
}
/* read more in paragraph */
.p-paging .more-text{
    display: none;
}
.comment-content {
	padding-left: 41px;
}
.comment-img {
	/* width: 100px !important; */
	min-height: auto !important;
	width: auto !important;
	float: left !important;
	height: 52px;
	border-radius: 4px;
	cursor: pointer;
    transition:0.7s all ease;
}
.comment-img:hover {
	opacity: 0.7;
}
.comments-list .post__author .author-img {
	width: 26px;
	height: 26px;
	min-height: auto;
}
/**********************************************
*COMMENT IMAGE MODAL STYLE
************************************************/
.comment-img-modal {
	position: fixed;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	background: rgba(0, 0, 0, 0.8);
	z-index: 24;
	display: none;
    overflow:auto;
}
.comment-content-img{
    max-width:auto !important;
    margin:75px auto;
    border:none;
    max-width:70%;
}
.galary-trash {
	visibility: visible;
	width: 40px;
	float: right;
	position: absolute;
	right: 3px;
	top: 55px;
	z-index: 24;
	cursor: pointer;
}
.modal-backdrop {
    z-index: 1040 !important;
}
.modal-content {
    margin: 2px auto;
    z-index: 1100 !important;
}
.comment-modal-img {
	margin-top: 75px;
	max-height: 89vh;
}
.btn-img-remove {
	position: absolute;
	/* top: 0; */
	right: 0;
	/* left: 0; */
	/* width: 100%; */
	border: none;
	background-color: rgba(87, 33, 33, 0.98);
	bottom: 0;
	text-align: right;
	color: white;
	border-radius: 4px;
	padding: 3px 5px;
	margin: 3px;
	z-index: 2;
}
.btn-add-more-image {
	margin-bottom: 0px;
	cursor: pointer;
}
/*****************************************
//  CUSTOM CAROUSEL STYLE
******************************************/
.image-add-more > input {
  visibility:hidden;
  width:0;
  height:0;
  position:absolute;
}
.image-add-more{
    position:relative;
}
/* medium - display 2  */
@media (min-width: 768px) {

.carousel-inner .carousel-item-right.active,
.carousel-inner .carousel-item-next {
    transform: translateX(50%);
}

.carousel-inner .carousel-item-left.active,
.carousel-inner .carousel-item-prev {
    transform: translateX(-50%);
}
}

/* large - display 3 */
@media (min-width: 992px) {

.carousel-inner .carousel-item-right.active,
.carousel-inner .carousel-item-next {
    transform: translateX(33%);
}

.carousel-inner .carousel-item-left.active,
.carousel-inner .carousel-item-prev {
    transform: translateX(-33%);
}
}

@media (max-width: 768px) {
.carousel-inner .carousel-item>div {
    display: none;
}

.carousel-inner .carousel-item>div:first-child {
    display: block;
}
}

.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
display: flex;
}

.carousel-inner .carousel-item-right,
.carousel-inner .carousel-item-left {
transform: translateX(0);
}
.carousel-item .col-lg-4:nth-child(odd) {
	padding: 0;
}
.edit-carousel-prev,.edit-carousel-next{
    width:37px !important
}
.edit-img-container {
	max-height: 150px !important;
	overflow: hidden;
}
.preview-img-row img{
    width:100%;
    height:auto;
    border-radius:4px;
}
.preview-img-row div{
    max-height:150px;
    overflow:hidden;
    margin-top:2rem;
    margin-bottom:2rem;
}
/********************************************** */ 
/*LOAD MORE COMMENTS STYLE
*************************************************/
.comments-wrapper {
	display: none;
	background-color: whitesmoke;
}
.comments-list .comment-item{
     display:none;
}
.loadMore {
    color:green;
    cursor:pointer;
}
.loadMore:hover {
    color:black;
}
.showLess {
    color:red;
    cursor:pointer;
    display:none;
    width:100px;
}
.showLess:hover {
    color:black;
}
.btn-submit-comment {
	display: none !important;
}
.fadeIn{
    display:inline-block !important;
}
.fadeOut{
    display:none !important;
}
.post__author img {
	width: 40px;
	height: 40px;
	border-radius: 100%;
	overflow: hidden;
	margin-right: 12px;
	min-height: auto !important;
}
.preview-img-row img {
	height: auto;
	border-radius: 4px;
}
ul.comments-list .comment-item {
	background-color: #F5F5F5;
}
.comment-image-wrapper span {
	padding-top: 7px;
	padding-right: 5px;
	color: #F44336;
}
.comment-image-wrapper span {
	position: absolute;
	right: 0;
}
.comment-image-wrapper {
	width: 100%;
	float: left;
}
.comment-image-wrapper {
	position: relative;
}
.page-profile-container {
	height: 139px  !important;
}
.page-cover-con {
	height: 150px;
	overflow: hidden;
	position: relative;
}
.page-cover-img {
	width: 100%;
	height: auto !important;
}
.page-profile-container {
	height: 139px !important;
	position: relative;
	width: 200px !important;
}
.profile-edit-icon {
	position: absolute;
	color: #534a4a;
	font-size: 25px;
	right: 18px;
	z-index: 12;
	bottom: 37px;
}
#pro-img-upload {
	visibility: hidden;
	position: absolute;
}
.profile-up-label {
	cursor: pointer;
}
.page-profile-img {
	width: auto;
	min-height: 200px;
}
.btn-cover-edit {
	position: absolute;
	display: block;
	top: 5px;
	right: 5px;
}
</style>