$( document ).ready(function() {
    $('#website-table').DataTable({
        processing: true,
        serverSide: true,
        // ajax: 'http://127.0.0.1:8000/users',
        columns: [
                { data: 'id', name: 'id' },
                { data: 'user_id', name: 'user_id' },
                { data: 'g_view_id', name: 'g_view_id' },
                { data: 'website_name', name: 'website_name' }
                ]
        });
});