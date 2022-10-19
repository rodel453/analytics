$(document).ready(function(){
    
    
    $('body').on('click', '.select_id', function(e){

    let website_id = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: `/user/fetch_website/${website_id}`,
        success: function(response){

            $('.website-title').text(response.website_name);
            $('.website-google-id').text(`Google ID: ${response.g_view_id}`);
        }
    })

    });

});