@extends('layouts.google-ads-app')


@section('content')


<div class="container-fluid">


                    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-themecolor ">Campaign Daily View</h3>
    </div>

    <!-- <h6 class="text-themecolor">Date: </h6> -->

<!-- Content Row -->

<div class="row">

<div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header p-2">
                  <ul id="user_statistics" class="nav nav-pills">
                    <li class="nav-item user_stats"><a class="nav-link active font-weight-bold " data-selector="GroundtruthChart" data-fetch-type="impressions" href="#impressions" data-toggle="tab" data-canvas="GroundtruthChart">impressions
                    <h3 class="m-0 font-weight-bold text-white-800">{{$ads_data['impressions']}}</h3></a></li>
                    <li class="nav-item user_stats"><a class="nav-link " data-selector="GroundtruthChart2" data-fetch-type="clicks" href="#clicks" data-toggle="tab" data-canvas="GroundtruthChart">clicks
                    <h3 class="m-0 font-weight-bold text-white-800">{{$ads_data['clicks']}}</h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link " data-selector="GroundtruthChart3" href="#CTR" data-toggle="tab" data-canvas="GroundtruthChart3">CTR
                    <h3 class="m-0 font-weight-bold text-white-800">{{$ads_data['ctr']}}</h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link " data-selector="GroundtruthChart4" href="#DailyReach" data-toggle="tab" data-canvas="GroundtruthChart4">Daily Reach
                    <h3 class="m-0 font-weight-bold text-white-800">{{$ads_data['daily_reach']}}</h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link " data-selector="GroundtruthChart5" href="#CumulativeReach" data-toggle="tab" data-canvas="GroundtruthChart5">Cumulative Reach
                    <h3 class="m-0 font-weight-bold text-white-800">{{$ads_data['cumulative_reach']}}</h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link " data-selector="GroundtruthChart6" href="#TotalSpend" data-toggle="tab" data-canvas="GroundtruthChart6">Total Spend
                    <h3 class="m-0 font-weight-bold text-white-800">{{$ads_data['total_sa']}}</h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link " data-selector="GroundtruthChart7" href="#SecondaryActions" data-toggle="tab" data-canvas="GroundtruthChart7">Secondary Actions
                    <h3 class="m-0 font-weight-bold text-white-800">{{$ads_data['clicks']}}</h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link " data-selector="GroundtruthChart8" href="#SAR" data-toggle="tab" data-canvas="GroundtruthChart8">SAR
                    <h3 class="m-0 font-weight-bold text-white-800">{{$ads_data['sar']}}</h3>
                    </a></li>
                  </ul>
                </div>
            <!-- Card Body -->
            <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="impressions">
                        <div class="chart-area">
                            <canvas id="GroundtruthChart"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="clicks">
                        <div class="chart-area">
                            <canvas id="GroundtruthChart2"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="CTR">
                        <div class="chart-area">
                            <canvas id="GroundtruthChart3"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="DailyReach">
                        <div class="chart-area">
                            <canvas id="GroundtruthChart4"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="CumulativeReach">
                        <div class="chart-area">
                            <canvas id="GroundtruthChart5"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="TotalSpend">
                        <div class="chart-area">
                            <canvas id="GroundtruthChart6"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="SecondaryActions">
                        <div class="chart-area">
                            <canvas id="GroundtruthChart7"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="SAR">
                        <div class="chart-area">
                            <canvas id="GroundtruthChart8"></canvas>
                        </div>
                    </div>
                    
                  </div>
                  <!-- /.tab-content -->
                </div>
        </div>
    </div>

</div>
</div>



@endsection