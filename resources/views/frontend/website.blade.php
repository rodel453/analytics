@extends('layouts.app')

@section('content')
<div class="container-fluid">
         <div class="row page-titles">
                <div class="col-lg-4 col-xlg-3 col-md-5 align-self-center">
                    <h3 class="text-themecolor">Add Website</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Website</li>
                    </ol>
                </div>
          </div>

            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5 mb-4">
                <div class="card border-primary">
                    <div class="card-header">
                        Website List
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush text-center">
                            @forelse($user_website as $website)
                            <li class="list-group-item">{{$website->website_name}}</li>
                            @empty
                              There are no websites listed
                            @endforelse
                        </ul>
                    </div>
                </div>
                </div>
                


        <div class="col-lg-8 col-xlg-9 col-md-7 mb-4">
                <div class="card border-primary">
                <div class="card-header">
                    Add Website
                </div><!-- /.card-header -->
                <div class="card-body">
                      <form class="form-horizontal" action="/website-create" method="POST" >
                            @csrf
        
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                </div>
  
                            @endif
                        <div class="form-group">
                          <label for="inputName5" class="col-sm-4 col-form-label">Website Name:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="website_name" placeholder="Enter your website name" value="" name="website_name">
                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group">
                        <label for="inputName6" class="col-sm-4 col-form-label">Google ID:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="g_view_id" placeholder="Enter your website's Google ID" value="" name="g_view_id">
                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-8 col-sm-4">
                            <button type="submit" class="btn btn-primary">Add Website</button>
                          </div>
                        </div>
                      </form>
                    </div>
            </div>
            </div>
            </div>
</div>
@endsection