{% extends user/template/app %}


{% block title %}Profile{% endblock %}

{% block pushInHead %}

<!-- Start Float CSS  -->



<!-- End Float CSS  -->
<style type="text/css">
    .star-icon .lievo-svg-wrapper {
        top: -6px;
        left: 10px;
    }

    .comment-icon .lievo-svg-wrapper {
        top: -6px;
        left: 10px;
    }

    .copie-icon .lievo-svg-wrapper {
        left: 9px;
        top: -3px;
    }

    .followers-icon .lievo-svg-wrapper {
        left: 7px;
        top: -3px;
    }

    .system-icon .lievo-svg-wrapper {
        left: 7px;
        top: -3px;
    }

    .avrage-icon .lievo-svg-wrapper {
        left: 7px;
        top: -3px;
    }

    .top-header-author .author-thumb img {
        width: 100% !important;
    }
</style>
{% endblock %}

{% block content %}
<?php
$profilePicture = App\Models\Attachment::select('name')->where('attachmentable_id', (Auth('user')->id))->where("attachmentable_type", "user")->first();
$coverImage = App\Models\Attachment::select('name')->where('attachmentable_id', (Auth('user')->id))->where("attachmentable_type", "cover_image")->orderBy('id', "desc")->first();
?>
<!-- Top Header-Profile -->
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="top-header top-header-favorit">
                    <div class="top-header-thumb">
                        <img src="../public/uploads/user/<?= $coverImage->name; ?>" alt="nature">
                        <div class="top-header-author">
                            <div class="author-thumb">
                                <img src="../public/uploads/user/<?= $profilePicture->name; ?>" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h3 author-name"><?= selfInfo(); ?></a>
                                <div class="country"><?= ((selfInfo('city') != '') ? selfInfo('city') . ',' : ''); ?> <?= selfInfo('country'); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col col-xl-8 m-auto col-lg-8 col-md-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="profile">Timeline</a>
                                    </li>
                                    <li>
                                        <a class="active" href="statistics">Statistics</a>
                                    </li>
                                    <li>
                                        <a href="07-ProfilePage-Photos.html">Following</a>
                                    </li>
                                    <li>
                                        <a href="09-ProfilePage-Videos.html">Follower</a>
                                    </li>
                                    <li>
                                        <a href="14-FavouritePage-Statistics.html">Finance</a>
                                    </li>
                                    <li>
                                        <a href="15-FavouritePage-Events.html">More</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="control-block-button">
                            <a href="#" class="btn btn-control bg-primary" data-toggle="tooltip" data-original-title="Follow">
                                <div class="star-icon livicon-evo" data-options="name: users.svg;size: 30px; style:lines;  strokeColor: #fff;"></div>
                            </a>

                            <a href="#" class="btn btn-control bg-purple" data-toggle="tooltip" data-original-title="Copy">
                                <div class="comment-icon livicon-evo" data-options="name: touch.svg;size: 30px; style:lines; strokeColor: #fff;"></div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <!-- Copiers Info -->
        <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-content">
                    <div class="monthly-indicator">
                        <a href="#" class="btn btn-control bg-breez negative copie-icon ">
                            <div class="livicon-evo" style="left: 12px" data-options="name: arrow-top.svg;size: 30px;strokeWidth: 3;"></div>
                        </a>
                        <div class="monthly-count">
                            522
                            <span class="period">Copiers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Followers Info -->
        <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-content">
                    <div class="monthly-indicator">
                        <a href="#" class="btn btn-control bg-primary negative followers-icon">
                            <div class=" livicon-evo" style="left: 12px" data-options="name:arrow-bottom.svg;size: 30px;strokeWidth: 3;rotate:180"></div>
                        </a>
                        <div class="monthly-count">
                            2083
                            <span class="indicator negative"> - 7052</span>
                            <span class="period">Followers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Days in System Info -->
        <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-content">
                    <div class="monthly-indicator">
                        <a href="#" class="btn btn-control bg-purple negative system-icon">
                            <div class="livicon-evo" style="left: 12px" data-options="name:arrow-bottom.svg;size: 30px;strokeWidth: 3;rotate:180"></div>
                        </a>
                        <div class="monthly-count">
                            208
                            <span class="indicator negative"> 6.6 Month</span>
                            <span class="period">Days in System</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Average Profit/Loss System Info -->
        <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-content">
                    <div class="monthly-indicator">
                        <a href="#" class="btn btn-control bg-success negative avrage-icon">
                            <div class="livicon-evo" style="left: 12px" data-options="name:arrow-bottom.svg;size: 30px;strokeWidth: 3;rotate:180"></div>
                        </a>
                        <div class="monthly-count">
                            +239.73
                            <span class="indicator negative"> + 47.052</span>
                            <span class="period">Average Profit/Loss</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Return Rate Info -->
        <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-content">
                    <div class="monthly-indicator">
                        <a href="#" class="btn btn-control bg-success negative avrage-icon">
                            <div class="livicon-evo" style="left: 12px" data-options="name:arrow-bottom.svg;size: 30px;strokeWidth: 3;rotate:180"></div>
                        </a>
                        <div class="monthly-count">
                            488.92
                            <span class="period">Return Rate</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Risk Level Info -->
        <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-content">
                    <div class="monthly-indicator">
                        <a href="#" class="btn btn-control bg-success negative avrage-icon">
                            <div class="livicon-evo" style="left: 12px" data-options="name:arrow-bottom.svg;size: 30px;strokeWidth: 3;rotate:180"></div>
                        </a>
                        <div class="monthly-count">
                            1
                            <span class="period">Risk Level</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Trade Info -->
        <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-content">
                    <div class="monthly-indicator">
                        <a href="#" class="btn btn-control bg-success negative avrage-icon">
                            <div class="livicon-evo" style="left: 12px" data-options="name:arrow-bottom.svg;size: 30px;strokeWidth: 3;rotate:180"></div>
                        </a>
                        <div class="monthly-count">
                            354
                            <span class="period">Total Trade</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Risk Level Info -->
        <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-content">
                    <div class="monthly-indicator">
                        <a href="#" class="btn btn-control bg-success negative avrage-icon">
                            <div class="livicon-evo" style="left: 12px" data-options="name:arrow-bottom.svg;size: 30px;strokeWidth: 3;rotate:180"></div>
                        </a>
                        <div class="monthly-count">
                            $ 1890.00
                            <span class="period">Managed Fund</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>







    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <div class="h6 title">Profit Stats</div>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg></a>
                </div>

                <div class="ui-block-content">




                    <div class="panel-body" style="height: 432px">
                        <!-- Flot: Pie -->
                        <div class="chart chart-md" id="flotPie"></div>
                        <script type="text/javascript">
                            // See: assets/javascripts/ui-elements/examples.charts.js for more settings.
                        </script>
                    </div>





                </div>

            </div>
        </div>
        <div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex">
                <div class="ui-block-title">
                    <div class="h6 title">Instruments Traded</div>

                    <a href="#" class="more"><svg class="olymp-three-dots-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg></a>

                </div>

                <div class="ui-block-content">
                    <div class="chart-js chart-js-line-stacked">
                        <canvas id="line-stacked-chart" width="730" height="300"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col col-lg-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex">
                <div class="ui-block-title">
                    <div class="h6 title">Trades By Month</div>
                    <select class="selectpicker form-control without-border">
                        <option value="LY">LAST YEAR (2020)</option>
                        <option value="2">CURRENT YEAR (2021)</option>
                    </select>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg></a>
                </div>

                <div class="ui-block-content">
                    <div class="chart-js chart-js-line-chart">
                        <canvas id="trades-by-month-chart" width="1400" height="380"></canvas>
                    </div>
                </div>
                <hr>
                <div class="ui-block-content display-flex content-around">
                    <div class="chart-js chart-js-small-pie">
                        <canvas id="trades-by-yearly-circle-chart" width="90" height="90"></canvas>
                    </div>

                    <div class="points points-block">

                        <span>
                            <span class="statistics-point bg-breez"></span>
                            Yearly Profit
                        </span>

                        <span>
                            <span class="statistics-point bg-danger"></span>
                            Yearly Loss
                        </span>

                    </div>

                    <div class="text-stat">
                        <div class="count-stat">2.758</div>
                        <div class="title">Best Position</div>
                        <div class="sub-title">This Year</div>
                    </div>

                    <div class="text-stat">
                        <div class="count-stat">5.420,7</div>
                        <div class="title">Worst Position</div>
                        <div class="sub-title">This Year</div>
                    </div>

                    <div class="text-stat">
                        <div class="count-stat">42.973</div>
                        <div class="title">Total Trades</div>
                        <div class="sub-title">This Year</div>
                    </div>

                    <div class="text-stat">
                        <div class="count-stat">3.581,1</div>
                        <div class="title">Total Profit / Loss</div>
                        <div class="sub-title">By Month</div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>



{% endblock %}


{% block pushInEnd %}

<!-- Start Float JS  -->
<script src="../public/assets/user/plugins/flot/jquery.flot.js"></script>
<script src="../public/assets/user/plugins/flot.tooltip/flot.tooltip.js"></script>
<script src="../public/assets/user/plugins/flot/jquery.flot.pie.js"></script>
<script src="../public/assets/user/plugins/flot/jquery.flot.categories.js"></script>
<script src="../public/assets/user/plugins/flot/jquery.flot.resize.js"></script>
<!--   ../public/assets/user/img/author-main2.jpg    -->

<!-- End Float JS  -->

<script>
    /* **************************************************
     *    Start Trades By Month Chart
     * ***************************************************/
    var lineChart = document.getElementById("trades-by-month-chart");

    if (lineChart !== null) {
        var ctx_lc = lineChart.getContext("2d");
        var data_lc = {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                    label: " - Loss",
                    borderColor: "#ff5e3a",
                    borderWidth: 4,
                    pointBorderColor: "#ff5e3a",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 4,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    fill: false,
                    lineTension: 0,
                    data: [96, 63, 136, 78, 111, 83, 101, 83, 102, 61, 45, 135]
                },
                {
                    label: " - Profit",
                    borderColor: "#08ddc1",
                    borderWidth: 4,
                    pointBorderColor: "#08ddc1",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 4,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    fill: false,
                    lineTension: 0,
                    data: [118, 142, 119, 123, 165, 139, 145, 116, 152, 123, 139, 195]
                }
            ]
        };

        var lineChartEl = new Chart(ctx_lc, {
            type: 'line',
            data: data_lc,
            options: {
                legend: {
                    display: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        ticks: {
                            fontColor: '#888da8'
                        },
                        gridLines: {
                            color: "#f0f4f9"
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: "#f0f4f9"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#888da8'
                        }
                    }]
                }
            }
        });
    }
    // End Trades By Month Chart


    /* **************************************************
     *    Start Trades By Month Chart
     * ***************************************************/






    /* **************************************************
     *    Start Trades By Month Circle Chart
     * ***************************************************/
    var pieSmallChart = document.getElementById("trades-by-yearly-circle-chart");
    /*
     *  Colors Pie Chart
     * 26-Statistics.html
     */
    if (pieSmallChart !== null) {
        var ctx_sc = pieSmallChart.getContext("2d");
        var data_sc = {
            labels: ["Yearly Likes", "Yearly Comments"],
            datasets: [{
                data: [65.048, 42.973],
                borderWidth: 0,
                backgroundColor: [
                    "#08ddc1",
                    "#ff5e3a"
                ]
            }]
        };

        var pieSmallEl = new Chart(ctx_sc, {
            type: 'doughnut',
            data: data_sc,
            options: {
                deferred: { // enabled by default
                    delay: 300 // delay of 500 ms after the canvas is considered inside the viewport
                },
                cutoutPercentage: 93,
                legend: {
                    display: false
                },
                animation: {
                    animateScale: false
                }
            }
        });
    }

    // End Trades By Month Circle Chart



    /*************************************************
     *      Start Profit Stats
     *************************************************/
    (function() {
        if ($('#flotPie').get(0)) {
            var plot = $.plot('#flotPie', flotPieData, {
                series: {
                    pie: {
                        show: true,
                        combine: {
                            color: '#999',
                            threshold: 0.1
                        }
                    }
                },
                legend: {
                    show: false
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
        }
    })();



    var flotPieData = [{
        label: "Profit",
        data: [
            [1, 80]
        ],
        color: '#00b276'
    }, {
        label: "Loss",
        data: [
            [1, 20]
        ],
        color: '#ec1d24'
    }];

    // End Profit Stats
</script>
{% endblock %}