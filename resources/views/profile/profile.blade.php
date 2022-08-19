@extends('layouts.app')

@section('content')

<div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Profile</h3>
                    <ol class="breadcrumb" style="width: 79%;">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->

            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <center class="mt-4"> <img src="{{ auth()->user()->picture }}" class="profile-user-img img-fluid rounded-circle admin_picture"
                                    width="150" />
                                <h4 class="card-title mt-2">{{ $user->name }}</h4>
                                <input type="file" name="admin_image" id="admin_image" style="opacity: 0;height:1px;display:none">
                                <button type="submit" class="btn btn-primary" id="change_picture_btn">Change Picture</button>
                            </center>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5>Website List</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">GOOGLE.COM</li>
                                <li class="list-group-item">YOUTUBE.COM</li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7 mb-4">
                <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#personal_info" data-toggle="tab"><i class="bi bi-file-earmark-person mr-2"></i>Personal Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab"><i class="bi bi-key mr-2"></i>Change Password</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="personal_info">
                      <form class="form-horizontal" action="{{ route('update-user') }}" method="POST" id="updatePassword">
                            @csrf
        
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                </div>
  
                            @endif
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Enter your name" value="{{ $user->name }}" name="name">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input class="form-control"  disabled value="{{ $user->email }}" name="email">
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-8 col-sm-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="change_password">
                        <form class="form-horizontal" action="{{ route('update-password') }}" method="POST" id="updatePassword">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                                </div>
                            @endif
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Old Password</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="inputName" placeholder="Enter current password" name="old_password">
                              <!-- <span class="text-danger error-text oldpassword_error"></span> -->
                              @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-4 col-form-label">New Password</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="newpassword" placeholder="Enter new password" name="new_password">
                              <!-- <span class="text-danger error-text newpassword_error"></span> -->
                              @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-4 col-form-label">Confirm New Password</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="cnewpassword" placeholder="Confirm new password" name="new_password_confirmation">
                              <!-- <span class="text-danger error-text cnewpassword_error"></span> -->
                              @error('new_password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-8 col-sm-4 d-flex justify-content-end">
                              <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                          </div>
                        </form>
                      </div>
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
@endsection
