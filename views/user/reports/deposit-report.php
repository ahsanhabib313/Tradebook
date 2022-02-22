{% extends user/template/app %}
{% block title %}Deposit Report{% endblock %}
{% block pushInHead %}
<!-- push header link here -->


<link rel="stylesheet" type="text/css" href="<?php echo(getBaseUrl())?>/public/assets/user/fontawesome/css/all.min.css">
<!--------------- bootstrap min style sheet ------------------------------->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!------------------------ select2 style sheet ---------------------------------------------->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!------------------------ data table sttle ------------------------------->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

<!----------------- datepicker css --------------------------->
<link rel="stylesheet" type="text/css" href=" <?php echo(getBaseUrl())?>/public/assets/user/report/css/jquery-datepicker2.css" >

<!----------------- date picker css --------------------------->
<link rel="stylesheet" type="text/css" href=" <?php echo(getBaseUrl())?>/public/assets/user/report/css/jquery-ui.min.css" >

<!----------------- custom css --------------------------->
<link rel="stylesheet" type="text/css" href=" <?php echo(getBaseUrl())?>/public/assets/user/report/css/report.css" >

{% endblock %}
{% block content %}
<!--================================= Top Header-Profile ==============================================-->
<div class="main-header">
    <div class="content-bg-wrap bg-account"></div>
    <div class="container">
        <div class="row">
            <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                <div class="main-header-content">
                    <p><br/><br/></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-1"></div>
        <div class="col col-3">
            <p style="color:#fff;">Account Balance</p>
            <h1 class="text-left" style="color:#fff;"> <span>$</span>10.248438381</h1>
        </div>
        <div class="col col-2">
            <p style="color:#fff;">Total Withdraw</p>
            <h4 class="text-left" style="color:#fff;"> <span>$</span>1.24843838</h4>
        </div>
        <div class="col col-2">
            <p style="color:#fff;">Total Deposit</p>
            <h4 class="text-left" style="color:#fff;"> <span>$</span>1.24843838</h4>
        </div>
        <div class="col col-2">
            <p style="color:#fff;">Equity</p>
            <h4 class="text-left" style="color:#fff;"> <span>$</span>0.24843838</h4>
        </div>
    </div>

</div>

<!--=================================== Report Section =======================================================================-->
<div class="container" id="deposit_main_content">
    <div class="row d-flex justify-content-center">

<!--=================================== Filter Report =======================================================================-->
     <div class="col-md-12" id="filter_report">
            <div class="card mt-2">
                <div class="card-header p-3 ">
                    Filter Report
                </div>
                    <div class="card-body px-4 py-4">
                        <form autocomplete="off" id="filter_form"  action="/user/get/deposit/csv/file?action=export" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user->id?>">

                <!--=================================== first row of filter form =======================================================================-->
                <div class="form-row">
                               <div class="col-md-6">
                                        <div class="form-group">
                                            <select class=" form-control form-control-md type"  name="type" id="filter_report_select1" >
                                                <option class="option" value="" selected>Select Method</option>
                                                <option class="option" value="" >All</option>
                                                <option class="option" value="Bank">Bank</option>
                                                <option class="option" value="Netelle">Netelle</option>
                                                <option class="option" value="Skrill">Skrill</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-6">

                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                MIN
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control min_amount" name="min_amount">
                                                             <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                To
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control max_amount" name="max_amount">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                MAX
                                                                </div>
                                                            </div>
                                                   </div>
                                            </div>
                                </div>
                            </div>
                            <div class="form-row">
                               <div class="col-md-6">
                               <div class="form-group">
                                                <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3"> 
                                                                <div class="livicon-evo livicon-evo-holder" data-options="
                                                                name: calendar.svg; 
                                                                size: 15px;
                                                                style: lines;
                                                                autoPlay: true;
                                                                drawTime:3;
                                                                repeat: 'loop';
                                                                strokeColor:#555555;" style="visibility: visible; width: 23px;">
                                                                </div>
                                                            
                                                            </span>
                                                        </div>
                                                    <input type="text" placeholder="From" name="from_date" class=" from form-control form-control-md from_date"   aria-describedby="basic-addon3"  id="from_date" >
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3"> 
                                                                To
                                                            </span>
                                                    </div>
                                                <input type="text" placeholder="To" name="to_date" class=" to form-control form-control-md" aria-describedby="basic-addon3 to_date"  id="to_date" >
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3"> 
                                                            <div class="livicon-evo livicon-evo-holder" data-options="
                                                            name: calendar.svg; 
                                                            size: 15px;
                                                            style: lines;
                                                            autoPlay: true;
                                                            drawTime:3;
                                                            repeat: 'loop';
                                                            strokeColor:#555555;" style="visibility: visible; width: 23px;">
                                                            </div>
                                                    
                                                        </span>
                                                   </div>
                                            
                                                </div>  
  
                                            </div>
                                       
                                </div>

                               <div class="col-md-6">
                                       <div class="form-group">
                                                <select class="form-control form-control-md status" name="status" id="filter_report_select2" >
                                                        <option class="option" selected value="">Select Status</option>
                                                        <option class="option" value="" >All</option>
                                                        <option class="option" value="pending">Pending</option>
                                                        <option class="option" value="approved">Approved</option>
                                                        <option class="option" value="declined">Declined</option>
                                                        <option class="option" value="failed">Failed</option>
                                                       

                                                </select>
                                        </div>
                                </div>
                        </div>
                        <div class="form-row">
                               <div class="col-md-6">
                                      
    
                                </div>


                                
                                <div class="col-md-6">
                                            <div class="form-group btnGroup d-flex justify-content-end">
                                                <button  class="btn btn-success btn-md"  id="export_btn">Export</button>
                                                <button  class="btn btn-success btn-md " type="button" id="filter_btn">Filter</button>
                                            </div>
                                </div>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 



 <!--=================================== withdraw report =======================================================================-->
    <div class="row d-flex justify-content-center " id="balance_report">
            <div class="col-md-12 mt-5">
                        <div class="card bg-white file_report mb-5">
                            <div class="card-header p-3">
                               Deposit Report
                            </div>
                            <div class="card-body" >
                            
                            <!--=========================== Responsive data tablee ===================================================-->
                            <table id="deposit_table" class="display"  style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Method</th>
                                        <th>Charge</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        
                                </thead>
                                <tfoot>
                                           <tr>
                                               <td colspan="4" class="text-right text-dark font-weight-bold">Total Amount:</td>
                                               <td  class="total_amount text-dark font-weight-bold"></td>
                                           </tr>

                                </tfoot>
                              
                             
                            </table>
                                
                            </div>
                        </div>
    </div>    </div>
</div>



<!-------------------- jquery min version cdn ------------------------------------->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<!---------------------- select 2 script------------------------------------------------>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!----------------- bootstrap js script --------------------------->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<!------------------- date picker script ---------------------------->
<script src="<?php echo(getBaseUrl())?>/public/assets/user/report/js/jquery-datepicker2.js"></script>

<!------------------------ data table js script------------------------------->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<!----start  date picker js -------------------------------------------------------------->
<script src="<?php echo(getBaseUrl())?>/public/assets/user/report/js/jquery-ui.min.js" ></script>

<!------------------- custom script ---------------------------->

<script>

/** date picker  */

$('#from_date').datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    autoSize: true,
    yearRange: "2000:2050"
});
$('#to_date').datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    autoSize: true,
    yearRange: "2000:2050"
});

/*** start with draw data table************** */
 var dt = $('#deposit_table').DataTable({

            "language": { "search": '', "searchPlaceholder": "Search...", "lengthMenu": "_MENU_" },
            "processing": true,
            "serviceSide": true,
            "ajax":{
                "url":'/user/get/deposit-report/data',
                "data": function(d){
                    return $.extend({},d, {
                        "user_id": $('#filter_form').find('input[name="user_id"]').val(),
                        "type": $('#filter_form').find('select[name="type"]').val(),
                        "min_amount": $('#filter_form').find('input[name="min_amount"]').val(),
                        "max_amount": $('#filter_form').find('input[name="max_amount"]').val(),
                        "from_date": $('#filter_form').find('input[name="from_date"]').val(),
                        "to_date": $('#filter_form').find('input[name="to_date"]').val(),
                        "status": $('#filter_form').find('select[name="status"]').val(),
                        
                        
                    })
                }

            }, 

            "columns": [

                { "data": 'type' },
                { "data": 'fee' },
                { "data": 'status' },
                { "data": 'created_at' },
                { "data": 'amount' },

            ],
            "drawCallback": function( settings ) {
                	$("#filter_btn").html("FILTER");
                    if (settings.json != undefined) {
                    $('.total_amount').text('$' + settings.json.total_amount)
        }
                    
                },
                "order": [[1, 'desc']],
            

    });


$('#filter_btn').click(function (e) {
        	e.preventDefault();
            $(this).html("<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>");
            dt.ajax.reload();
        });
     

/** select 2 plugin *****/
$('#filter_report_select1').select2();
$('#filter_report_select2').select2();

</script>
{% endblock %}


{% block pushInEnd %}
<!-- script here -->
{% endblock %}