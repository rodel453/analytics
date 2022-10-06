@extends('layouts.app')


@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h3 class="website-title text-themecolor">{{$website_data->website_name ?? 'No Website Listed'}}</h3>
<a href="/campaign/overview" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Google Ads</a>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            <!-- <div style="border:none;"
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-gray-800">Websites</h6>
                <div class="dropdown ml-2">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Website List:</div>
                        @foreach($user_website as $website)
                        <a class="dropdown-item" href="#">{{$website->website_name}}</a>
                        @endforeach -->
                        <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                    <!-- </div>
                </div>
            </div> -->
</div>

<h6 class="website-google-id text-themecolor">Google ID: {{$website_data->g_view_id ?? ' '}} </h6>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           website visitors</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$latest_page_views['visitors']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Page Views</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$latest_page_views['pageViews']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-binoculars fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">avg session duration
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">12345</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                           avg page load</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

<div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header p-2">
                  <ul id="user_statistics" class="nav nav-pills">
                    <li class="nav-item user_stats"><a class="nav-link active font-weight-bold" href="#users" data-toggle="tab" data-canvas="myAreaChart">Users
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3></a></li>
                    <li class="nav-item user_stats"><a class="nav-link" href="#new_users" data-toggle="tab" data-canvas="myAreaChart2">New Users
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link" href="#avg_eng_time" data-toggle="tab" data-canvas="myAreaChart3">Average Engagement Time
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link" href="#total_revenue" data-toggle="tab" data-canvas="myAreaChart4">Total Revenue
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
                            <canvas id="myAreaChart2"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="avg_eng_time">
                        <div class="chart-area">
                            <canvas id="myAreaChart3"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="total_revenue">
                        <div class="chart-area">
                            <canvas id="myAreaChart4"></canvas>
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
                        <div class="">
                                <div>
                                    <div style="height:100px;" class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>
            <div class="mb-2 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-gray-800">TOP COUNTRIES</h6>
                <h6 class="m-0 font-weight-bold text-gray-800">USERS</h6>
            </div>
            <hr>
            <div class="mb-2 d-flex justify-content-between">
                <h6 class="m-0 ml-3 font-weight-bold text-gray-800">Philippines</h6>
                <h6 class="m-0 mr-3 font-weight-bold text-gray-800">5</h6>
            </div>
            
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
        <!-- Bar Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Top Refererrers
                </h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChartHorizontal1"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6">
        <!-- Bar Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Types of Users
                </h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChartHorizontal"></canvas>
                </div>
            </div>
        </div>
    </div>  
</div>

<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Top Browsers</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-2 text-center small d-flex flex-row align-items-center justify-content-around">
                @forelse ($top_browsers as $top_browser)
                <div class="mt-2 text-center small d-flex flex-column align-items-center justify-content-around">
                    <h6 class="m-0 font-weight-bold text-gray-800">{{$top_browser['browser']}}</h6>
                    <!-- <h6 class="m-0 font-weight-bold text-gray-800"></h6> -->
                </div>
                @empty
                <h6 class="m-0 font-weight-bold text-gray-800">No Browser Detected</h6>
                @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection