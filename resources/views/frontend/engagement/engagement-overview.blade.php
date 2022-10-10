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
                    </div>
                    <!-- /.tab-content -->
                    </div>
            </div>
        </div>


    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
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
            </div>
        </div>
    </div>
</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active font-weight-bold" href="#views" data-toggle="tab">VIEWS
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3></a></li>
                    <li class="nav-item"><a class="nav-link" href="#event_count" data-toggle="tab">EVENT COUNT
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3>
                    </a></li>
                  </ul>
                </div>
            <!-- Card Body -->
            <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="views">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="event_count">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                  </div>
                  <!-- /.tab-content -->
                </div>
        </div>
    </div>


    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
            <h6 class="mb-4 font-weight-bold text-gray-800">Event count by Event name</h6>
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-600">EVENT NAME</h6>
                    <h6 class="m-0 font-weight-bold text-gray-600">EVENT COUNT</h6>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-5 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
            <h6 class="mb-4 font-weight-bold text-gray-800">Views by Page title and screen class</h6>
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-600">PAGE TITLE AND SCREEN CLASS</h6>
                    <h6 class="m-0 font-weight-bold text-gray-600">VIEWS</h6>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

</div>

@endsection