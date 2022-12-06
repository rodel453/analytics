$(document).ready(function(){
    
    
    $('body').on('click', '.select_id', function(e){

    let website_id = $(this).data('id');
  
   
    $.ajax({
        type: 'GET',
        url: `/user/fetch_website/${website_id}`,
        success: function(response){
            console.log(response);
            // let avg_load_time = response.avg_page_load_time.rows[0];

            $('.website-title').text(response.website_name);
            $('.website-google-id').text(`Google ID: ${response.g_view_id}`);
            $('#page_views').text(response.view_page[response.view_page.length-1].pageViews);
            $('#website_visitors').text(response.view_page[response.view_page.length-1].visitors);
            $('#avg_session_duration').text(response.avg_session_duration_round+' seconds');
            $('#avg_page_load').text(Number(response.avg_page_load_time.rows[0]).toFixed(2));
            $('#total_user').text(response.total_user);
            $('#total_newuser').text(response.total_newuser);
            draw_graph(response.user_types, document.getElementById('myBarChartHorizontalUserTypes'), "type", "sessions");
        }
    })

    });

});
