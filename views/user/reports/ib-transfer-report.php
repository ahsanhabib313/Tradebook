{% extends user/template/app %}
{% block title %}IB Transfer Report{% endblock %}
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
<link rel="stylesheet" type="text/css" href=" <?php echo(getBaseUrl())?>/public/assets/user/report/css/jquery-datepicker2.css">

<!----------------- custom css --------------------------->
<link rel="stylesheet" type="text/css" href=" <?php echo(getBaseUrl())?>/public/assets/user/report/css/report.css">

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
<div class="container" id="ib_transfer_main_content">
    <div class="row d-flex justify-content-center">

<!--=================================== Filter Report =======================================================================-->
     <div class="col-md-12" id="filter_report">
            <div class="card mt-2">
                <div class="card-header p-3 ">
                    Filter Report
                </div>
                    <div class="card-body px-4 py-4">
                        <form autocomplete="off" >

                <!--=================================== first row of filter form =======================================================================-->
                           <div class="form-row">
                               <div class="col-md-4">
                                        <div class="form-group">
                                            <select class=" form-control form-control-md"  id="filter_report_select1" >
                                                <option class="option" value="Trader">Select Category</option>
                                                <option class="option" value="Trader" selected>Send</option>
                                                <option class="option" value="IB">Receive</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control email" placeholder="Name/Email/subcode">
                                        </div>
                                </div>
                                <div class="col-md-4">
                                            <div class="form-group">
                                                    <select class="form-control form-control-md"  id="filter_report_select2" >
                                                            <option class="option" value="Trader" selected>Select Status</option>
                                                            <option class="option" value="IB">All</option>
                                                            <option class="option" value="IB">Done</option>
                                                            <option class="option" value="IB">Pending</option>
                                                            <option class="option" value="IB">Declined</option>

                                                    </select>
                                            </div>
                                    </div>
                            </div>
                            <div class="form-row">
                                  
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                    <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                MIN
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" >
                                                             <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                -
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" >
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                MAX
                                                                </div>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>

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
                                                                    <input type="text" placeholder="From"class="from form-control form-control-md"  data-select="datepicker" aria-describedby="basic-addon3" min="2000-01-01" max="2050-12-31">
                                                                    <!-- <div class="input-group-append">
                                                                        <span class="input-group-text">To</span>
                                                                    </div> -->
                                                                    <input type="text" placeholder="To"class=" to form-control form-control-md"  data-select="datepicker" aria-describedby="basic-addon3" min="2000-01-01" max="2050-12-31">
                                                            
                                                            </div>  
                                             </div> 
                                     </div>
                                   
                            </div>
                            <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-top: 10px;margin-bottom: 22px;">
                                            <a href="" class="btn btn-success btn-md btn-block" type="button" id="reset_btn">Reset</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group" style="margin-top: 10px;margin-bottom: 22px;">
                                            <a href="" class="btn btn-success btn-md btn-block" type="button" id="export_btn">Export</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group" style="margin-top: 10px;margin-bottom: 22px;">
                                            <a href="" class="btn btn-success btn-md btn-block" type="button" id="filter_btn">Filter</a>
                                        </div>
                                    </div>      
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div> 



 <!--=================================== withdraw report =======================================================================-->
    <div class="row d-flex justify-content-center " id="ib_transfer_report">
            <div class="col-md-12 mt-5">
                        <div class="card bg-white file_report mb-5">
                            <div class="card-header p-3">
                                IB Transfer Report
                            </div>
                            <div class="card-body" >
                            
                            <!--=========================== Responsive data tablee ===================================================-->
                            
                            <table id="ib_transfer_table" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                   
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

<!--------------- data picker js script ------------------->
<script src="<?php echo(getBaseUrl())?>/public/assets/user/report/js/jquery-datepicker2.js" defer="defer"></script>

<!------------------------ data table js script------------------------------->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>


<script>

/** select 2 plugin *****/
$('#filter_report_select1').select2();
$('#filter_report_select2').select2();
  
var dataTable = $('#ib_transfer_table').DataTable({
    
    language: { search: '', searchPlaceholder: "Search...", lengthMenu: "_MENU_" },
    processing: true,
    serverSide: true,
    ajax: '/user/get/internal-transfer/data',
    columns: [
        {
            className: 'details-control',
            orderable: false,
            data: null,
            defaultContent: '',
            "render" : function(){
                return '<i class="fa fa-plus text-secondary" style="pointer:cursor" aria-hidden="true"></i>'
            } 
        },
        { data: "name"},
        { data: "position"},
        { data: "office" },
        { data: "salary" },
       
    ],
    order: [1, 'asc']



});

/* Formatting function for row details - modify as you need */
function format ( d ) {

    return d.details;
   
}
// Add event listener for opening and closing details
$('#ib_transfer_table tbody').on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var tdi = tr.find('.svg-inline--fa');
    var row = dataTable.row(tr);

    if (row.child.isShown()) {
        // This row is already open - close it
        row.child.hide(5000);
        tdi.removeClass('fa-minus');
        tdi.addClass('fa-plus');
        tr.removeClass('shown');
    }
    else {
        // Open this row
        row.child(format(row.data())).show(5000);
        tr.addClass('shown');
        tdi.addClass('fa-minus');
        tdi.removeClass('fa-plus');
    }
});


</script>

{% endblock %}


{% block pushInEnd %}
<!-- script here -->
{% endblock %}