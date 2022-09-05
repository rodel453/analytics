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
                    <h3 class="text-themecolor">UserTable</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
            <table class="table table-bordered" id="table">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
         </div>

<!--View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="productForm" name="productForm" class="form-horizontal">
               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">ID</label>
                   <div class="col-sm-12">
                        <input disabled type="text" class="form-control" id="name" name="name" value="" maxlength="50" required="">
                   </div>
               </div>

               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                   <div class="col-sm-12">
                        <input disabled type="text" class="form-control" id="name" name="name"  value="" maxlength="50" required="">
                   </div>
               </div>
     
               <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                   <div class="col-sm-12">
                   <input disabled type="text" class="form-control" id="name" name="name"  value="" maxlength="50" required="">
                        </div>
                    </div>
               </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="productForm" name="productForm" class="form-horizontal">
            <input type="hidden" name="product_id" id="product_id">
            <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">ID</label>
                   <div class="col-sm-12">
                        <input disabled class="form-control" value="123">
                   </div>
               </div>

               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                   <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                   </div>
               </div>
     
               <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                   <div class="col-sm-12">
                   <input disabled type="text" class="form-control" id="name" name="name" placeholder="Enter Mail" value="" maxlength="50" required="">
                        </div>
                    </div>
               </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

      
         <!-- {{ url('users') }} -->
       <script type="text/javascript">
         $(function() {
          var table = $('#table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ url('users') }}',
               columns: [
                        { data: 'id', name: 'id' },
                        { data: 'first_name', name: 'first_name' },
                        { data: 'email', name: 'email' },
                        { data: 'action', name: 'action', orderable: false, searchable: false},
                     ]
            });
         
               $('body').on('click', '.deleteUser', function (){
               var user_id = $(this).data("id");
               console.log($(this).data("id"));
               var result = confirm("Are You sure want to delete !");
                  if(result){
                     $.ajax({
                     type: "GET",
                     url: "http://localhost:8000/users/delete"+'/'+user_id,
                     success: function (data) {
                     table.draw();
                  },
                     error: function (data) {
                     console.log('Error:', data);
                     }
               });
            }else{
            return false;
        }
    });

    $('body').on('click', '.viewUser', function (){
               var user_id = $(this).data("id");
               console.log($(this).data("id"));
                  if(result){
                     $.ajax({
                     type: "GET",
                     url: "http://localhost:8000/users/view"+'/'+user_id,
                     success: function (data) {
                    
                  }
               });
            }else{
            return false;
        }
    });







         });


      
         </script>
@endsection