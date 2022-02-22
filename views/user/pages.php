 {% extends user/template/app %}

 {% block content  %}
 <style type="text/css">
     .textColor {
         color: black !important;
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
    .your-page {
        display: block;
        padding: 6px;
        font-weight: ;
        font-size: 1rem;
    }
    .page-title-in {
        font-size: 1rem;
    }
    .all-pages-con {
        min-height: 80vh;
    }
 </style>
 <div class="container">
     <div class="row">
         <div class="col-lg-3">
             <div class="ui-block p-3">
                <h3 style="color:royalblue;" class="font-weight-bolder">Pages</h3>
                <a id="createPageBtn" href="pagesform" class=" fs-4 btn btn-primary btn-sm btn-block">Create new Page</a>
                <hr>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group">
                        Discover
                    </a>
                    <a href="#" class="list-group-item">
                        Liked Pages
                    </a>
                    <a href="#" class="list-group-item">
                        Invites
                    </a>
                </div>
             </div>
         </div>
         <div class="col-lg-9">
                <div class="ui-block all-pages-con">
                    <span class="font-weight-bolder your-page">Your Pages</span>
                    <hr>
                    <div class="container-fluid">
                    <div class="row">
                    {% foreach($getPageInfo as $pinfo): %}
                        <div class="col-md-6 mb-3 col-lg-4">
                            <div class="border p-2">
                                <a href="pageloading?id=<?= $pinfo->id ?>">
                                    <div class="page-cover-con position-relative">
                                        <img class="mx-auto page-cover-img" style=" width:100%; height:80%; border-radius: 10px" src="../public/uploads/user/<?php echo(!empty($pinfo->coverphoto)?$pinfo->coverphoto:'webpage2.jpg')?>" alt="Page cover photo">
                                    </div>
                                </a>
                                <div class="d-flex">
                                    <div class="mt-1">
                                        <a href="pageloading?id=<?= $pinfo->id ?>">
                                            <img class="rounded-circle" style="width:40px;height:40px" src="../public/uploads/user/<?php echo($pinfo->profilepic)?>" alt="Page cover">
                                            
                                        </a>
                                    </div>
                                    <div class="pl-2">
                                        <a class="page-title-in" style="color: #888da8 !important" href="pageloading?id=<?= $pinfo->id ?>"><?php echo substr($pinfo->pname,0,15); echo(strlen($pinfo->pname)>15?"....":'') ?></a>
                                        <br>
                                        <a href="#" class="pl-1"><?php echo(substr($pinfo->pcategory,0,15)) ?></a>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block">like</button>
                            </div>
                        </div>
                        {% endforeach %}
                    </div>
                    </div>
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

 </script>

 {% endblock %}