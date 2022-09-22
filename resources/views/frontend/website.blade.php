@extends('layouts.app')

@section('content')
<div class="container-fluid">
         <div class="row page-titles">
                <div class="col-lg-4 col-xlg-3 col-md-5 align-self-center">
                    <h3 class="text-themecolor">Website</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Website</li>
                    </ol>
                </div>
          </div>

            <div class="row ">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5 mb-4">
                <div class="card border-primary">
                  <div class="refreshcard">
                    <div class="card-header">
                        Website List
                    </div>
                    <div class="card-body" style="padding: 0.625rem 1.25rem 0px 1.25rem">
                        <ul class="list-group list-group-flush">
                            @forelse($user_website as $website)
                            <div class="row" style="border:1px solid rgba(0,0,0,.125); margin-bottom: 10px;">
                            <div class="col-lg-8 col-xlg-10 col-md-10 text-center">
                            <li class="list-group-item" style="border:none;">{{$website->website_name}}</li>
                            </div>
                            <div class="col-lg-4 col-xlg-2 col-md-2" style="align-items:center; display:flex; justify-content: space-around">
                            <a href="javascript:void(0)" data-id="{{$website->id}}" data-toggle="modal" data-target="#editModal" class="btn btn-primary btn-sm editWebsite"><i class="bi bi-pencil-square"></i></a>
                            <a href="javascript:void(0)" data-id="{{$website->id}}" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm deleteWebsite"><i class="bi bi-x-circle"></i></i></a>
                            </div>
                            </div>
                            @empty
                              There are no websites listed
                            @endforelse
                        </ul>
                    </div>
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
                            <input type="text" class="form-control" id="website_name" placeholder="Enter your website name" value="" name="website_name" required>
                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group">
                        <label for="inputName6" class="col-sm-4 col-form-label">Google ID:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="g_view_id" placeholder="Enter your website's Google ID" value="" name="g_view_id" required>
                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group">
                        <label for="inputName6" class="col-sm-4 col-form-label">Upload File: </label>
                          <div class="col-sm-5">
                            <input type="file"  id="file" name="file" required>
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



<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Website Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="websiteForm" name="websiteForm" class="form-horizontal">

               <div class="form-group">
                  <label for="first_name" class="col-sm-4 control-label">Website Name</label>
                   <div class="col-sm-12">
                        <input type="text" class="form-control" id="website_name_edit" name="website_name_edit" maxlength="50" required="">
                   </div>
               </div>

               <div class="form-group">
                  <label for="last_name" class="col-sm-4 control-label">Google ID</label>
                   <div class="col-sm-12">
                        <input type="text" class="form-control" id="g_id" name="g_id" maxlength="50" required="">
                   </div>
               </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="updateBtn">Save changes</button>
      </div>
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
        <button type="button" class="btn btn-danger deleteWebsiteModal">Delete</button>
               </div>
    </div>
  </div>
</div>





<script type="text/javascript">
         $(function() {


         $.ajaxSetup({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
         });



         $('body').on('click', '.editWebsite', function () {
         var website_id = $(this).data('id');
         $.get("/website/edit/"+ website_id, function (data) {
            $('#updateBtn').attr('data-id', data.id);
            $('#website_name_edit').val(data.website_name);
            $('#g_id').val(data.g_view_id);
        })
    });

    $('#updateBtn').click(function (e) {
        e.preventDefault();
        let form_data = new FormData($('#websiteForm')[0]);
        form_data.append('website_id', $(this).data('id'));
        $.ajax({
            data: form_data,
            contentType: false,
            processData: false,
            url: "website/update",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#websiteForm').trigger("reset");
                $('#editModal').modal('hide');
                $(".refreshcard").load(location.href + " .refreshcard");
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

         
         $('body').on('click', '.deleteWebsite', function (){
          
              let delete_website_id = $(this).data("id");
              $('.deleteWebsiteModal').attr('data-id', delete_website_id);
            
        });

        $('.deleteWebsiteModal').on('click', function (e){
          
          $.ajax({
              type: "GET",
              url: "/website/delete/"+$(this).data('id'),
              success: function (data) {
                $('#deleteModal').modal('hide');
                $(".refreshcard").load(location.href + " .refreshcard");
              }
          })
        });

});

</script>
                
@endsection