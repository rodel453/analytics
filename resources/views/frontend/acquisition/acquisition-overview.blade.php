@extends('layouts.app')


@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h3 class="text-themecolor ">Acquisition Overview</h3>

</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active font-weight-bold" href="#users" data-toggle="tab">Users
                    <h3 class="m-0 font-weight-bold text-white-800">{{$total_user}}</h3></a></li>
                    <li class="nav-item"><a class="nav-link" href="#new_users" data-toggle="tab">New Users
                    <h3 class="m-0 font-weight-bold text-white-800">{{$total_newuser}}</h3>
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
                  </div>
                  <!-- /.tab-content -->
                </div>
        </div>
    </div>


    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
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
            <h6 class="m-0 font-weight-bold text-gray-800">TOP COUNTRIES</h6>
            <h6 class="m-0 font-weight-bold text-gray-800">USERS</h6>
            </div>
            <hr>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h6 class="m-0 font-weight-bold text-gray-800">New users by</h6>
                <h6 class="mt-1 font-weight-bold text-gray-800">First user default channel grouping</h6>
                <div class="mt-2 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-600" style="text-overflow: ellipsis;
                        overflow: hidden; width: 160px; white-space: nowrap;">FIRST USER DEFAULT CHANNEL GROUPING</h6>
                    <h6 class="m-0 font-weight-bold text-gray-600">NEW USERS</h6>
                </div>
                <hr>
                @foreach ($channelNewUser['rows'] as $channel)
                    <div class="mb-2 d-flex justify-content-between">
                        <h6 class="m-0 ml-3 font-weight-bold text-gray-800">{{$channel[0]}}</h6>
                        <h6 class="m-0 mr-3 font-weight-bold text-gray-800">{{$channel[1]}}</h6>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h6 class="m-0 font-weight-bold text-gray-800">Sessions by</h6>
                <h6 class="mt-1 font-weight-bold text-gray-800">Session default channel grouping</h6>
                <div class="mt-2 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-600" style="text-overflow: ellipsis;
                        overflow: hidden; 
                        width: 160px; 

                        white-space: nowrap;">SESSION DEFAULT CHANNEL GROUPING</h6>
                    <h6 class="m-0 font-weight-bold text-gray-600">SESSIONS</h6>
                </div>
                <hr>
                @foreach ($channelSession['rows'] as $channel)
                    <div class="mb-2 d-flex justify-content-between">
                        <h6 class="m-0 ml-3 font-weight-bold text-gray-800">{{$channel[0]}}</h6>
                        <h6 class="m-0 mr-3 font-weight-bold text-gray-800">{{$channel[1]}}</h6>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h6 class="m-0 font-weight-bold text-gray-800">Sessions by</h6>
                <h6 class="mt-1 font-weight-bold text-gray-800">Session Google Ads Campaign</h6>
                <div class="mt-2 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-600" style="text-overflow: ellipsis;
                        overflow: hidden; 
                        width: 160px; 

                        white-space: nowrap;">SESSION GOOGLE ADS CAMPAIGN</h6>
                    <h6 class="m-0 font-weight-bold text-gray-600">SESSIONS</h6>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>


</div>




@endsection