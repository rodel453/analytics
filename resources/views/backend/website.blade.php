@extends('layouts.app')
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
@section('content')
         <div class="container-fluid">
         <div class="row page-titles">
                <div class="col-lg-4 col-xlg-3 col-md-5 align-self-center">
                    <h3 class="text-themecolor">Website Table</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Website</li>
                    </ol>
                </div>
            </div>
            <table class="table table-bordered" id="table">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>User ID</th>
                     <th>Google ID</th>
                     <th>Website Name</th>
                     <th>Website Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
         </div>
         <!-- {{ url('users') }} -->
       <script>
         $(function() {

          var table = $('#table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ url('website') }}',
               columns: [
                        { data: 'id', name: 'id' },
                        { data: 'user_id', name: 'user_id' },
                        { data: 'g_view_id', name: 'g_view_id' },
                        { data: 'website_name', name: 'website_name' },
                        { data: 'website_status', name: 'website_status', render: function ( data, type, full, meta ) {
                        return data === 1 ? "active" : "not active" ;
                        } },
                        { data: 'action', name: 'action', orderable: false, searchable: false},
                     ]
            });

               $('body').on('click', '.editStatus', function () {
               let id = $(this).data('id');
               let status = $(this).data('update-status');
                  $.ajax({
                     url: `website/status-update/${$(this).data('id')}/${status}`,
                     type: "GET",
                     dataType: 'json',
                     success: function (data) {
                     
                     table.draw();
                     },
                  });
               });
         });
       </script>
@endsection