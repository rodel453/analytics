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
              <img class="mb-3 profile-user-img img-fluid"  src="{{ auth()->user()->picture }}"
                        alt="...">
            </div>
          </div>
    
    
          <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="box">
            <label for="name" class="control-label">ID</label>
            </div>
            <div class="box">
            <label for="name" class="control-label">Name</label>
            </div>
            <div class="box">
            <label for="name" class="control-label">Email</label>
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
                  <label for="id" class="col-sm-2 control-label">ID</label>
                   <div class="col-sm-12">
                   <input readonly type="text" class="form-control" id="user_id" name="user_id" maxlength="50" required="">
                   </div>
               </div>

               <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">Name</label>
                   <div class="col-sm-12">
                        <input type="text" class="form-control" id="first_name" name="first_name" maxlength="50" required="">
                   </div>
               </div>
     
               <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
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

      
         <!-- {{ url('users') }} -->
       <script type="text/javascript">
         $(function() {


         $.ajaxSetup({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
         });

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


         $('body').on('click', '.editUser', function () {
         var user_id = $(this).data('id');
         $.get("users/edit" +'/' + user_id, function (data) {
            $('#modelHeading').html("Edit Product");
            $('#saveBtn').val("edit-user");
            $('#user_id').val(data.id);
            $('#first_name').val(data.first_name);
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

               $('body').on('click', '.deleteUser', function (){
               var user_id = $(this).data("id");
               var result = confirm("Are You sure want to delete !");
                  if(result){
                     $.ajax({
                     type: "GET",
                     url: "/users/delete"+'/'+user_id,
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
});
</script>
@endsection