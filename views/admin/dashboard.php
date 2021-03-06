{% extends admin/template/app %}

{% block content %}

<div class="row row-eq-heigh">
    <div class="col-md-8">
        <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="card no-b mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div><i class="icon-timer s-18"></i></div>
                        <div><span class="badge badge-pill badge-primary">4:30</span></div>
                    </div>
                    <div class="text-center">
                        <div class="s-48 my-3 font-weight-lighter">68</div>
                        New Orders
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card no-b mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div><i class="icon-user-circle-o s-18"></i></div>
                        <div><span class="badge badge-pill badge-danger">4:30</span></div>
                    </div>
                    <div class="text-center">
                        <div class="s-48 my-3 font-weight-lighter">170</div>
                        New Users
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card no-b mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div><i class="icon-package s-18"></i></div>
                        <div><span class="text-success">40+35</span></div>
                    </div>
                    <div class="text-center">
                        <div class="s-48 my-3 font-weight-lighter">35</div>
                        New Products
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card no-b mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div><i class="icon-user-times s-18"></i></div>
                        <div><span class="text-danger">50</span></div>
                    </div>
                    <div class="text-center">
                        <div class="s-48 my-3 font-weight-lighter">95</div>
                        Returning Users
                    </div>

                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="card no-b mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="icon-package s-18"></i></div>
                            <div><span class="text-success">40+35</span></div>
                        </div>
                        <div class="text-center">
                            <div class="s-48 my-3 font-weight-lighter">35</div>
                            New Products
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card no-b mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="icon-user-times s-18"></i></div>
                            <div><span class="text-danger">50</span></div>
                        </div>
                        <div class="text-center">
                            <div class="s-48 my-3 font-weight-lighter">95</div>
                            Returning Users
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card no-b mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="icon-timer s-18"></i></div>
                            <div><span class="badge badge-pill badge-primary">4:30</span></div>
                        </div>
                        <div class="text-center">
                            <div class="s-48 my-3 font-weight-lighter">68</div>
                            New Orders
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card no-b mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="icon-user-circle-o s-18"></i></div>
                            <div><span class="badge badge-pill badge-danger">4:30</span></div>
                        </div>
                        <div class="text-center">
                            <div class="s-48 my-3 font-weight-lighter">170</div>
                            New Users
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="card no-b p-2"><div class="card-body">
          <div class="card-body">
              <div style="height: 300px">
                  <canvas
                          data-chart="chartJs"
                          data-chart-type="doughnut"
                          data-dataset="[
                                                [75, 25,25],
                                                [25, 50, 25],
                                                [70, 30],
                                                [20, 80]
                                            ]"
                          data-labels="[['Disk'],['Database'],['Disk2'],['Database2']]"
                          data-dataset-options="[
                                            {
                                                label: 'Disk',
                                                backgroundColor: [
                                                    '#0175fa',
                                                    '#8f5caf',
                                                    '#19ceb3'
                                                ],

                                            },
                                            {
                                                label: 'Database',
                                                backgroundColor: [
                                                '#ffd94a',
                                                '#8880e7',
                                                '#cd88ff',
                                                ],

                                            },
                                              {
                                                label: 'Disk2',
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                ],

                                            },
                                            {
                                                label: 'Database2',
                                                backgroundColor: [
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                ],

                                            },

                                            ]"
                          data-options="{legend: {display: !0,position: 'bottom',labels: {fontColor: '#7F8FA4',usePointStyle: !0}},
                        Scales: {
                         xAxes: [{
                                barPercentage: 0.9,
                                categoryPercentage: 0.55

                        }]
                           }}"
                  >
                  </canvas>
              </div>
          </div>
        </div></div>
    </div>
</div>

<div class="card no-b">
    <div class="card-body">
        <div class="row my-3 no-gutters">
            <div class="col-md-3">
                <h1>Tasks</h1>
                Currently assigned tasks to team.
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mb-3">
                                <h6>New Layout</h6>
                                <small>75% Completed</small>
                            </div>
                            <figure class="avatar">
                                <img src="../assets/admin/img/dummy/u12.png" alt=""> </figure>
                        </div>
                        <div class="progress progress-xs mb-3">
                            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mb-3">
                                <h6>New Layout</h6>
                                <small>75% Completed</small>
                            </div>
                            <figure class="avatar">
                                <img src="../assets/admin/img/dummy/u2.png" alt=""> </figure>
                        </div>
                        <div class="progress progress-xs mb-3">
                            <div class="progress-bar bg-indigo" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mb-3">
                                <h6>New Layout</h6>
                                <small>75% Completed</small>
                            </div>
                           <div class="avatar-group">
                               <figure class="avatar">
                                   <img src="../assets/admin/img/dummy/u4.png" alt=""> </figure>
                               <figure class="avatar">
                                   <img src="../assets/admin/img/dummy/u11.png" alt=""> </figure>
                               <figure class="avatar">
                                   <img src="../assets/admin/img/dummy/u1.png" alt=""> </figure>
                           </div>
                        </div>
                        <div class="progress progress-xs mb-3">
                            <div class="progress-bar yellow" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mb-3">
                                <h6>New Layout</h6>
                                <small>75% Completed</small>
                            </div>
                            <figure class="avatar">
                                <img src="../assets/admin/img/dummy/u5.png" alt=""> </figure>
                        </div>
                        <div class="progress progress-xs mb-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
</div>
<div class="card-deck my-3 pt-3">
    <div class="card b-0">
        <div class="card-body p-5">
            <canvas id="shadowChart" style="height: 450px"></canvas>
            <script>
                $(function(){
                    'use strict';
                    let draw = Chart.controllers.line.prototype.draw;
                    Chart.controllers.line = Chart.controllers.line.extend({
                        draw: function() {
                            draw.apply(this, arguments);
                            let ctx = this.chart.chart.ctx;
                            let _stroke = ctx.stroke;
                            ctx.stroke = function() {
                                ctx.save();
                                ctx.shadowColor = '#3f51b5';
                                ctx.shadowBlur = 10;
                                ctx.shadowOffsetX = 0;
                                ctx.shadowOffsetY = 4;
                                _stroke.apply(this, arguments)
                                ctx.restore();
                            }
                        }
                    });

                    let ctx = document.getElementById("shadowChart").getContext('2d');
                    let myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ["January", "February", "March", "April", "May", "June", "July"],
                            datasets: [{
                                label: "Months",
                                data: [65, 59, 80, 81, 56, 55, 40],
                                borderColor: '#03a9f4',
                                pointBackgroundColor: "#fff",
                                pointBorderColor: "#03a9f4",
                                pointHoverBackgroundColor: "#03a9f4",
                                pointHoverBorderColor: "#fff",
                                pointRadius: 4,
                                pointHoverRadius: 4,
                                fill: false
                            }]
                        },
                        options:{
                            legend: {
                                display: !0,
                                labels: {
                                    fontColor: '#7F8FA4',
                                    boxRadius: 4,
                                    usePointStyle: !0
                                }
                            },
                            layout: {
                                padding: {
                                    left: 0,
                                    right: 0,
                                    top: 0,
                                    bottom: 0
                                }
                            },
                            scales: {
                                xAxes: [{
                                    display: !0,
                                    ticks: {
                                        fontSize: '11',
                                        fontColor: '#969da5'
                                    },
                                    gridLines: {
                                        display: false,
                                        zeroLineColor: 'rgba(255,255,255,0.1)',
                                        color: 'rgba(255,255,255,0.1)',
                                    }
                                }],
                                yAxes: [{
                                    display: !0,
                                    gridLines: {
                                        display: false,
                                        zeroLineColor: 'rgba(255,255,255,0.1)',
                                        color: 'rgba(255,255,255,0.1)',
                                    },
                                    ticks: {
                                        beginAtZero: !0,
                                        max: 100,
                                        stepSize: 25,
                                        fontSize: '11',
                                        fontColor: '#969da5'
                                    }
                                }]
                            }
                        }
                    });
                });
            </script>
        </div>
    </div>
    <div class="card no-b">
        <div class="card-body">
            <table class="table table-hover earning-box">
                <tbody>
                <tr class="no-b">
                    <td class="w-10">
                        <a href="panel-page-profile.html" class="avatar avatar-lg">
                            <img src="../assets/admin/img/dummy/u6.png" alt="">
                        </a>
                    </td>
                    <td>
                        <h6>Sara Kamzoon</h6>
                        <small class="text-muted">Marketing Manager</small>
                    </td>
                    <td>25</td>
                    <td>$250</td>
                </tr>
                <tr>
                    <td class="w-10">
                        <a href="panel-page-profile.html" class="avatar avatar-lg">
                            <img src="../assets/admin/img/dummy/u7.png" alt="">
                        </a>
                    </td>
                    <td>
                        <h6>Sara Kamzoon</h6>
                        <small class="text-muted">Marketing Manager</small>
                    </td>
                    <td>25</td>
                    <td>$250</td>
                </tr>
                <tr>
                    <td class="w-10">
                        <a href="panel-page-profile.html" class="avatar avatar-lg">
                            <img src="../assets/admin/img/dummy/u9.png" alt="">
                        </a>
                    </td>
                    <td>
                        <h6>Sara Kamzoon</h6>
                        <small class="text-muted">Marketing Manager</small>
                    </td>
                    <td>25</td>
                    <td>$250</td>
                </tr>
                <tr>
                    <td class="w-10">
                        <a href="panel-page-profile.html" class="avatar avatar-lg">
                            <img src="../assets/admin/img/dummy/u11.png" alt="">
                        </a>
                    </td>
                    <td>
                        <h6>Sara Kamzoon</h6>
                        <small class="text-muted">Marketing Manager</small>
                    </td>
                    <td>25</td>
                    <td>$250</td>
                </tr>
                <tr>
                    <td class="w-10">
                        <a href="panel-page-profile.html" class="avatar avatar-lg">
                            <img src="../assets/admin/img/dummy/u12.png" alt="">
                        </a>
                    </td>
                    <td>
                        <h6>Sara Kamzoon</h6>
                        <small class="text-muted">Marketing Manager</small>
                    </td>
                    <td>25</td>
                    <td>$250</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{% endblock %}
