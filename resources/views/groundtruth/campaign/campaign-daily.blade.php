@extends('layouts.google-ads-app')


@section('content')


<div class="container-fluid">

                    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-themecolor ">Campaign Daily</h3>
        <div class="d-sm-flex align-items-left justify-content-between flex-column">
            <h6 class="text-themecolor ">DURATION:</h6>
            <input type="text" name="daterange" value="" />
        </div>
    </div>

<!-- Content Row -->
    <table class="table table-bordered" id="adstable">
        <thead>
            <tr>
                <th>ADGROUP ID</th>
                <th>CAMPAIGN NAME</th>
                <th>ADGROUP NAME</th>
                <th>ADGROUP STATUS</th>
                <th>DATE</th>
                <th>ACTION</th>
            </tr>
            </tbody>
        </thead>
    </table>

    <!-- Content Row -->

<div class="row mt-5">

<div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header p-2">
                  <ul id="user_statistics" class="nav nav-pills">
                    <li class="nav-item user_stats"><a class="nav-link active font-weight-bold groundtruth-chart" data-selector="impressions" data-fetch-type="impressions" href="#impressions" data-toggle="tab" data-canvas="GroundtruthChart">impressions
                    <h3 class="m-0 font-weight-bold text-white-800"></h3></a></li>
                    <li class="nav-item user_stats"><a class="nav-link groundtruth-chart" data-selector="clicks" data-fetch-type="clicks" href="#clicks" data-toggle="tab" data-canvas="GroundtruthChart">clicks
                    <h3 class="m-0 font-weight-bold text-white-800"></h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link groundtruth-chart" data-selector="ctr" data-fetch-type="ctr" href="#ctr" data-toggle="tab" data-canvas="GroundtruthChart">CTR
                    <h3 class="m-0 font-weight-bold text-white-800"></h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link groundtruth-chart" data-selector="daily_reach" href="#daily_reach" data-toggle="tab" data-canvas="GroundtruthChart">Daily Reach
                    <h3 class="m-0 font-weight-bold text-white-800"></h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link groundtruth-chart" data-selector="cumulative_reach" href="#cumulative_reach" data-toggle="tab" data-canvas="GroundtruthChart">Cumulative Reach
                    <h3 class="m-0 font-weight-bold text-white-800"></h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link groundtruth-chart" data-selector="total_sa" href="#total_sa" data-toggle="tab" data-canvas="GroundtruthChart">Total Spend
                    <h3 class="m-0 font-weight-bold text-white-800"></h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link groundtruth-chart" data-selector="total_sa" href="#total_sa" data-toggle="tab" data-canvas="GroundtruthChart">Secondary Actions
                    <h3 class="m-0 font-weight-bold text-white-800"></h3>
                    </a></li>
                    <li class="nav-item user_stats"><a class="nav-link groundtruth-chart" data-selector="sar" href="#sar" data-toggle="tab" data-canvas="GroundtruthChart">SAR
                    <h3 class="m-0 font-weight-bold text-white-800"></h3>
                    </a></li>
                  </ul>
                </div>
            <!-- Card Body -->
            <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane groundtruth-chart" id="impressions" data-legend="impressions">
                        <div class="chart-area">
                            <canvas class = "GroundtruthChart" id="GroundtruthChart"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane groundtruth-chart" id="clicks" data-="impressions" data-legend="clicks">
                        <div class="chart-area">
                            <canvas class = "GroundtruthChart" id="GroundtruthChart2"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane groundtruth-chart" id="ctr" data-legend="ctr">
                        <div class="chart-area">
                            <canvas class = "GroundtruthChart" id="GroundtruthChart3"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane groundtruth-chart" id="daily_reach" data-legend="DailyReach">
                        <div class="chart-area">
                            <canvas class = "GroundtruthChart" id="GroundtruthChart4"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane groundtruth-chart" id="cumulative_reach" data-legend="CumulativeReach">
                        <div class="chart-area">
                            <canvas class = "GroundtruthChart" id="GroundtruthChart5"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane groundtruth-chart" id="total_sa" data-legend="TotalSpend">
                        <div class="chart-area">
                            <canvas class = "GroundtruthChart" id="GroundtruthChart6"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane groundtruth-chart" id="total_sa" data-legend="SecondaryActions">
                        <div class="chart-area">
                            <canvas class = "GroundtruthChart" id="GroundtruthChart7"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane groundtruth-chart" id="sar" data-legend="SAR">
                        <div class="chart-area">
                            <canvas class = "GroundtruthChart" id="GroundtruthChart8"></canvas>
                        </div>
                    </div>
                    
                  </div>
                  <!-- /.tab-content -->
                </div>
        </div>
    </div>

</div>

</div>

<script>

$(function() {
    var table = $('#adstable').DataTable({
        destroy: true,
    })

    $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        "maxSpan": {
            "days": 7
        },

    }, function(start, end, label) {
       
        let start_date = start.format('YYYY-MM-DD');
        let end_date =  end.format('YYYY-MM-DD');

        $('#adstable').DataTable().destroy();

        $.ajax({
    
            url: '/get/table-campaign-daily-view?start_date='+start_date+'&end_date='+end_date+'',
            type: 'GET',
            success: function(response){ 
        
                data_chart_response = response;
                draw_impressions(response, document.getElementsByClassName('GroundtruthChart'));
    
            }
      
        });
        
        $('#adstable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/get/table-campaign-daily?start_date='+start_date+'&end_date='+end_date+'',
        columns: [
                { data: 'adgroup_id', name: 'adgroup_id' },
                { data: 'campaign_name', name: 'campaign_name' },
                { data: 'adgroup_name', name: 'adgroup_name' },
                { data: 'adgroup_status', name: 'adgroup_status' },
                { data: 'date', name: 'date' },
                { data: 'action', name: 'action', orderable: false, searchable: false},
                ]
        });
    });
});



</script>

@endsection