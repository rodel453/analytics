@extends('layouts.app')


@section('content')

<div class="container-fluid">

                    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h3 class="text-themecolor">Monetization Overview</h3>

</div>

<!-- Content Row -->

<div class="row">

<div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active font-weight-bold" href="#users" data-toggle="tab">Total Revenue
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3></a></li>
                    <li class="nav-item"><a class="nav-link" href="#new_users" data-toggle="tab">Ecommerce Revenue
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3>
                    </a></li>
                    <li class="nav-item"><a class="nav-link" href="#avg_eng_time" data-toggle="tab">Total Ad Revenue
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

</div>

<div class="row">

<div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active font-weight-bold" href="#total_p" data-toggle="tab">Total Purchasers
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3></a></li>
                    <li class="nav-item"><a class="nav-link" href="#f_t_p" data-toggle="tab">First Time Purchasers
                    <h3 class="m-0 font-weight-bold text-white-800">50</h3>
                    </a></li>
                  </ul>
                </div>
            <!-- Card Body -->
            <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="total_p">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="f_t_p">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
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