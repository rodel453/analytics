@extends('layouts.app')

@section('content')
         <div class="container-fluid">
         <div class="row page-titles">
                <div class="col-lg-4 col-xlg-3 col-md-5 align-self-center">
                    <h3 class="text-themecolor">Campaign Table</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/website">Website</a></li>
                        <li class="breadcrumb-item">Campaign</li>
                    </ol>
                </div>
            </div>
            <table class="table table-bordered" id="table">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Status</th>
                     <th>Pacing</th>
                     <th>Total Spent</th>
                     <th>Spend Today</th>
                     <th>Budget</th>
                     <th>Days Remaining</th>
                     <th>Salesforce Number</th>
                     <th>Start</th>
                     <th>End</th>
                  </tr>
               </thead>
            </table>
         </div>
@endsection