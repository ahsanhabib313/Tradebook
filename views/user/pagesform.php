{% extends user/template/app %}

{% block content  %}
<style type="text/css">
    .textColor {
        color: black !important;
    }

    #pageDescription {
        border: 1px solid blue;
        border-radius: 10px;
        min-height: 45px !important;
    }
</style>
<div id="createForm">
    <div class="row pl-3">

        <div class="bg-white col-md-4 shadow">
            <h4 class="mt-2 font-weight-bolder pl-2" style="color:royalblue">Page Information</h4>
            <input id="pageName" type="text" class="form-control" name="pageName" style="border:1px solid blue; border-radius:5px !important;line-height: 15px !important;" placeholder="Page Name (required)">
            <input id="pageCategory" type="text" name="pageCategory" class="form-control" style="border:1px solid blue;border-radius:5px !important;line-height: 15px !important;" placeholder="Category (required)">
            <textarea id="pageDescription" name="pageDescription" cols="30" rows="1" class="form-control" placeholder="Description"></textarea>
            <div class="text-center">
                <a href="" id="createPageBtn" style="padding:10px; border-radius:10px;" type="button" class="btn btn-primary btn-block disabled">Create Page</a>
            </div>
            <div id="extraInfo" class="d-none">
                <form action="" method="POST" id="imgSubmitForm">
                    <h4 class="mt-2 font-weight-bolder pl-2" style="color:royalblue">Images</h4>

                    <div class="w-100 font-weight-bolder btn-block mb-3 pl-2" style="border:1px solid blue;border-radius: 10px;">Add profile picture
                        <input type="file" name="profileImage" onchange="document.getElementById('proImg').src = window.URL.createObjectURL(this.files[0])" id="pageProImg">
                    </div>
                    <div class="w-100 font-weight-bolder pl-2" style="border:1px solid blue;border-radius: 10px;"> Add cover photo

                        <input type="file" onchange="document.getElementById('coverImg').src = window.URL.createObjectURL(this.files[0])" name="coverImage" id="pageCoverImg">
                    </div>
                    <input type="hidden" name="id" value="<?= $getPageInfo->id ?>" />
                    <div class="text-center mt-3">
                        <input id="pageSaveBtn" type="submit" style="padding:10px; border-radius:10px;" value="Save" class="btn btn-primary btn-block ">

                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white shadow col-md-8 pt-4">
            <div class="row">
                <div class="col-md-12">
                    <img class="mx-auto" id="coverImg" style="width:98%; height:80%;border-radius: 10px; z-index:-1;" src="../public/uploads/user/webpage2.jpg" alt="">
                </div>
            </div>
            <div class="row">
                <div class="d-flex">
                    <div class="col-md-3">
                        <img class="rounded-circle" id="proImg" style=" width:100%; z-index: 1111; position:relative;top:-100px;left:5px;" src="../public/uploads/user/propic2.jpg" alt="">
                    </div>
                    <div class="col-md-9" style="z-index: 9999; position:relative;top:-60px;">
                        <h2 id="pnameHolder" class="font-weight-bold" style="color:royalblue">Page Name</h2>
                        <p id="pcategoryHolder" class="">Category</p>
                    </div>
                </div>
            </div>

            <div class="row shadow" style="z-index: 9999; position:relative; top:-110px">
                <div class="col-md-12">
                    <hr>
                    <div class="d-flex justify-content-between">
                        <ul class="d-flex">
                            <li class="pr-3">Home</li>
                            <li class="pr-3">About</li>
                            <li class="pr-3">Photos</li>
                            <li class="pr-3">Videos</li>
                            <li class="pr-3">More</li>
                        </ul>
                        <ul class="d-flex">
                            <li class="pr-3">Message</li>
                            <li class="pr-3">search</li>
                            <li class="pr-3">settings</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" style="z-index: 9999; position:relative; top:-90px">
                <div class="col-md-3"></div>
                <div class="col-md-6 shadow">
                    <h4 class="font-weight-bold" style="color:royalblue">About</h4>
                    <p id="pdescriptionHolder">Description</p>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row mt-5" style="z-index: 9999; position:relative; top:-90px">
                <div class="col-md-3"></div>
                <div class="col-md-6 shadow">
                    <div class="text-left py-2">
                        <a type="button" style="padding:10px; border-radius:10px;" class="btn btn-primary btn-block text-white disabled">Create post</a>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a class="textColor" href="">Photo/video</a>
                        <a class="textColor" href="">Tag People</a>
                        <a class="textColor" href="">Check in</a>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
{% block pushInEnd %}
<script src="../public/assets/admin/plugins/common-ajax/common-ajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $("#pageName").keyup(function() {
            let pname = $(this).val();
            if (pname != '') {
                $("#pnameHolder").html(pname);
                check_submit();

            } else {
                $("#pnameHolder").html("Page Name");
                check_submit();
            }
        });
        $("#pageCategory").keyup(function() {
            let pcategory = $(this).val();
            if (pcategory != '') {
                $("#pcategoryHolder").html(pcategory);
                check_submit();
            } else {
                $("#pcategoryHolder").html("Category");
                check_submit();
            }
        });
        $("#pageDescription").keyup(function() {
            let pdescription = $(this).val();
            if (pdescription != '') {
                $("#pdescriptionHolder").html(pdescription);
            } else {
                $("#pdescriptionHolder").html("Description");
            }
        });

        function check_submit() {
            let pname = $("#pageName").val();
            let pcategory = $("#pageCategory").val();
            if (pname != '' && pcategory != '') {
                $("#createPageBtn").removeClass("disabled");
            } else if (pname != '' || pcategory == '') {
                $("#createPageBtn").addClass("disabled");
            } else if (pname = '' || pcategory != '') {
                $("#createPageBtn").addClass("disabled");
            } else {
                $("#createPageBtn").addClass("disabled");
            }
        }
        $("#createPageBtn").on("click", function(e) {
            e.preventDefault();
            let pname = $("#pageName").val();
            let pcategory = $("#pageCategory").val();
            let pdescription = $("#pageDescription").val();
            $("#pnameHolder").html(pname);
            $("#pcategoryHolder").html(pcategory);
            $("#pdescriptionHolder").html(pdescription);
            $("#pageName").val('');
            $("#pageCategory").val('');
            $("#pageDescription").val('');
            $("#createPageBtn").addClass("d-none");
            $("#extraInfo").addClass("d-block");
            $.ajax({
                url: "pagesform",
                type: "POST",
                data: {
                    pname: pname,
                    pcategory: pcategory,
                    pdescription: pdescription
                },
                success: function(data) {
                    console.log(data);
                }
            });
        });

        $("#imgSubmitForm").on("submit", function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: "pagesImg",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    // window.location.href = "http://tradebook.local/user/pageloading?id=" + data;
                    data = JSON.parse(data);
                    notify(data.status, data.message);
                }

            });
        });
    });
</script>

{% endblock %}