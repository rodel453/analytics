
// $(function() {
//     $('#user-table').DataTable({
//     processing: true,
//     serverSide: true,
//     ajax: 'http://127.0.0.1:8000/users',
//     columns: [
//             { data: 'id', name: 'id' },
//             { data: 'first_name', name: 'first_name' },
//             { data: 'email', name: 'email' }
//             ]
//     });
// });

$( document ).ready(function() {
    $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        // ajax: 'http://127.0.0.1:8000/users',
        columns: [
                { data: 'id', name: 'id' },
                { data: 'first_name', name: 'first_name' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'action' },
                ]
        });
});