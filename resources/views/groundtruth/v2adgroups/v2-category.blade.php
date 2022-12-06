@extends('layouts.google-ads-app')


@section('content')


<div class="container-fluid">

                    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-themecolor ">V2 Adgroups Category</h3>
        <div class="d-sm-flex align-items-left justify-content-between flex-column">
            <h6 class="text-themecolor ">DURATION:</h6>
            <input type="text" name="daterange" value="" />
        </div>
    </div>

<!-- Content Row -->
    <table class="table table-bordered" id="adstable">
        <thead>
            <tr>
                <th>ADGROUP ID</th>
                <th>ADGROUP NAME</th>
                <th>CTR</th>
                <th>SAR</th>
            </tr>
            </tbody>
        </thead>
    </table>
</div>

<script>

$(function() {
    var table = $('#adstable').DataTable({
        destroy: true,
    })

    $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        "maxSpan": {
            "days": 7
        },

    }, function(start, end, label) {
        let start_date = start.format('YYYY-MM-DD');
        let end_date =  end.format('YYYY-MM-DD');

        $('#adstable').DataTable().destroy();
        
        $('#adstable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/get/v2/table-adgroups-category?start_date='+start_date+'&end_date='+end_date+'',
        columns: [
                { data: 'adgroup_id', name: 'adgroup_id' },
                { data: 'adgroup_name', name: 'adgroup_name' },
                { data: 'click_through_rate', name: 'click_through_rate' },
                { data: 'secondary_action_rate', name: 'secondary_action_rate' },
                ]
        });
    });
});

</script>

@endsection