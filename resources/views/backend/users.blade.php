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
                    <h3 class="text-themecolor">User Table</h3>
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

      <div class="container">
        <div class="row">
    
          <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="box">
              <img id="view_picture" class="mb-3 profile-user-img img-fluid">
            </div>
          </div>
    
    
          <div class="col-lg-8 col-xlg-9 col-md-7">
          <div class="form-group">
                  <label for="id" class="col-sm-2 control-label">ID</label>
                   <div class="col-sm-12">
                   <input readonly type="text" class="form-control" id="view_id" name="view_id" maxlength="50" required="">
                   </div>
               </div>

               <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">Name</label>
                   <div class="col-sm-12">
                        <input readonly type="text" class="form-control" id="view_name" name="view_name" maxlength="50" required="">
                   </div>
               </div>
     
               <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                   <div class="col-sm-12">
                   <input readonly type="text" class="form-control" id="view_email" name="view_email" maxlength="50" required="">
                        </div>
                    </div>
          </div>
    
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
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
         <form id="userForm" name="userForm" class="form-horizontal">
            <div class="form-group">
                  <label for="id" class="col-sm-4 control-label">ID</label>
                   <div class="col-sm-12">
                   <input readonly type="text" class="form-control" id="user_id" name="user_id" maxlength="50" required="">
                   </div>
               </div>

               <div class="form-group">
                  <label for="first_name" class="col-sm-4 control-label">First Name</label>
                   <div class="col-sm-12">
                        <input type="text" class="form-control" id="first_name" name="first_name" maxlength="50" required="">
                   </div>
               </div>

               <div class="form-group">
                  <label for="last_name" class="col-sm-4 control-label">Last Name</label>
                   <div class="col-sm-12">
                        <input type="text" class="form-control" id="last_name" name="last_name" maxlength="50" required="">
                   </div>
               </div>
     
               <div class="form-group">
                  <label class="col-sm-4 control-label">Email</label>
                   <div class="col-sm-12">
                   <input readonly type="text" class="form-control" id="email" name="email" maxlength="50" required="">
                        </div>
                    </div>
               </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="saveBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger deleteUser">Delete</button>
               </div>
    </div>
  </div>
</div>


      
         <!-- {{ url('users') }} -->
       <script type="text/javascript">
         $(function() {

        let delete_user_id;


         $.ajaxSetup({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
         });

          var table = $('#table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ url('admin/users') }}',
               columns: [
                        { data: 'id', name: 'id' },
                        { data: 'fullname', name: 'fullname' },
                        { data: 'email', name: 'email' },
                        { data: 'action', name: 'action', orderable: false, searchable: false},
                     ]
            });


         $('body').on('click', '.viewUser', function () {
         var view_user_id = $(this).data('id');
         $.get("users/view" +'/' + view_user_id, function (data) {
            $('#view_id').val(data.id);
            $('#view_name').val(data.fullname);
            $('#view_email').val(data.email);
            $('#view_picture').attr("src", data.picture);
        })
    });



         $('body').on('click', '.editUser', function () {
         var user_id = $(this).data('id');
         $.get("users/edit" +'/' + user_id, function (data) {
            $('#user_id').val(data.id);
            $('#first_name').val(data.first_name);
            $('#last_name').val(data.last_name);
            $('#email').val(data.email);
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $.ajax({
            data: $('#userForm').serialize(),
            url: "users/update",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#userForm').trigger("reset");
                $('#editModal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $('body').on('click', '.delete_user', function (){
              
        delete_user_id = $(this).data("id");
                
    });

    $('body').on('click', '.deleteUser', function (){
              
              $.ajax({
              type: "GET",
              url: "/admin/users/delete/"+delete_user_id,
              success: function (data) {
                $('#deleteModal').modal('hide');
              table.draw();
          },
              error: function (data) {
              console.log('Error:', data);
              }
        });

    });
});
</script>
@endsection