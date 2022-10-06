@extends('layouts.app')


@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h3 class="text-themecolor">Engagement Overview</h3>

</div>

<!-- Content Row -->

<div class="row">

<div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active font-weight-bold" href="#users" data-toggle="tab">Average Engagement Time
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3></a></li>
                    <li class="nav-item"><a class="nav-link" href="#new_users" data-toggle="tab">Engaged sessions per user
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3>
                    </a></li>
                    <li class="nav-item"><a class="nav-link" href="#avg_eng_time" data-toggle="tab">Average engagement time per session
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3>
                    </a></li>
                  </ul>
                </div>
            <!-- Card Body -->
            <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="users">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="new_users">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="avg_eng_time">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="total_revenue">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                    
                  </div>
                  <!-- /.tab-content -->
                </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <!-- <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div> -->
            <!-- Card Body -->
            <div class="card-body">

            <h6 class="m-0 font-weight-bold text-gray-800">USERS IN LAST 30 MINUTES</h6>
            
            <h1 class="mt-2 font-weight-bold text-gray-800">0</h1>
                
            <h6 class="m-0 font-weight-bold text-gray-800">USERS PER MINUTE</h6>

                        <!-- Bar Chart -->
                        <div class="mb-4">
                                <div>
                                    <div style="height:100px;" class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>



            <div class="d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-gray-800">TOP PAGES & SCREENS</h6>
            <h6 class="m-0 font-weight-bold text-gray-800">USERS</h6>
            </div>
            <hr>

            


                <!-- <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                    </span>
                </div> -->
            </div>
        </div>
    </div>
</div>

</div>

@endsection