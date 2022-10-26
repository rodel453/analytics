@extends('layouts.app')


@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h3 class="text-themecolor">Demographics Overview</h3>

</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
           
            <!-- Card Body -->
            <div class="card-body">

            <h6 class="m-0 font-weight-bold text-gray-800">USERS IN LAST 30 MINUTES</h6>
            
            <h1 class="mt-2 font-weight-bold text-gray-800">0</h1>
                
            <h6 class="m-0 font-weight-bold text-gray-800">USERS PER MINUTE</h6>

            <h1 class="mt-2 font-weight-bold text-gray-800">0</h1>

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

    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
           
            <!-- Card Body -->
            <div class="card-body">

            <h6 class="mb-4 font-weight-bold text-gray-800">Users by City</h6>
            <div class="d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-gray-600">CITY</h6>
            <h6 class="m-0 font-weight-bold text-gray-600">USERS</h6>
            </div>
                <hr>
                @foreach ($userCity['rows'] as $city)
                    <div class="mb-2 d-flex justify-content-between">
                        <h6 class="m-0 ml-3 font-weight-bold text-gray-800">{{$city[0]}}</h6>
                        <h6 class="m-0 mr-3 font-weight-bold text-gray-800">{{$city[1]}}</h6>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
           
            <!-- Card Body -->
            <div class="card-body">

            <h6 class="mb-4 font-weight-bold text-gray-800">Users by Gender</h6>
            
                <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart2"></canvas>
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
           
            <!-- Card Body -->
            <div class="card-body">

            <h6 class="mb-4 font-weight-bold text-gray-800">Users by Interest</h6>
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-600">INTERESTS</h6>
                    <h6 class="m-0 font-weight-bold text-gray-600">USERS</h6>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-6 col-lg-6">
        <!-- Bar Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users by Language
                </h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChartHorizontalUserLanguage"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>
</div>




@endsection