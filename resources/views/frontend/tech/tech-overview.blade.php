@extends('layouts.app')


@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h3 class="text-themecolor">Tech Overview</h3>

</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-7 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Users by Platform</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChartPlatform"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-5 col-lg-6">
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
            <h6 class="m-0 font-weight-bold text-gray-800">TOP COUNTRIES</h6>
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

<div class="row">

    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            
            <!-- Card Body -->
            <div class="card-body">

            <h6 class="mb-4 font-weight-bold text-gray-800">Users by Operating System</h6>
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-600">OPERATING SYSTEM</h6>
                    <h6 class="m-0 font-weight-bold text-gray-600">USERS</h6>
                </div>
                <hr>
                @foreach ($userOS['rows'] as $OS)
                    <div class="mb-2 d-flex justify-content-between">
                        <h6 class="m-0 ml-3 font-weight-bold text-gray-800">{{$OS[0]}}</h6>
                        <h6 class="m-0 mr-3 font-weight-bold text-gray-800">{{$OS[1]}}</h6>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            
            <!-- Card Body -->
            <div class="card-body">

            <h6 class="mb-4 font-weight-bold text-gray-800">Users by Platform / device category</h6>
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-600">PLATFORM / DEVICE CATEGORY</h6>
                    <h6 class="m-0 font-weight-bold text-gray-600">USERS</h6>
                </div>
                <hr>
                @foreach ($userPlatform['rows'] as $Platform)
                    <div class="mb-2 d-flex justify-content-between">
                        <h6 class="m-0 ml-3 font-weight-bold text-gray-800">{{$Platform[0]}}</h6>
                        <h6 class="m-0 mr-3 font-weight-bold text-gray-800">{{$Platform[1]}}</h6>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            
            <!-- Card Body -->
            <div class="card-body">

            <h6 class="mb-4 font-weight-bold text-gray-800">Users by Browser</h6>
                <div class="chart-bar">
                    <canvas id="myBarChartHorizontalUserBrowser"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            
            <!-- Card Body -->
            <div class="card-body">

            <h6 class="mb-2 font-weight-bold text-gray-800">Users by Device category</h6>
            <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart1"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-xl-8 col-lg-8">
        <div class="card shadow mb-4">
            
            <!-- Card Body -->
            <div class="card-body">

            <h6 class="mb-4 font-weight-bold text-gray-800">Users  by Screen resolution</h6>
                <div class="chart-bar">
                    <canvas id="myBarChartHorizontalUserScreenResolution"></canvas>
                </div>    
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            
            <!-- Card Body -->
            <div class="card-body">

            <h6 class="mb-4 font-weight-bold text-gray-800">Users by App version</h6>

            </div>
        </div>
    </div>

</div>

</div>




@endsection