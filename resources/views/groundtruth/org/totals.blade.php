@extends('layouts.google-ads-app')


@section('content')


<div class="container-fluid">

                    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-themecolor ">Organization Totals</h3>
        <div class="d-sm-flex align-items-left justify-content-between flex-column">
            <h6 class="text-themecolor ">DURATION:</h6>
            <input type="text" name="daterange" value="" />
        </div>
    </div>

<!-- Content Row -->
    <table class="table table-bordered" id="adstable">
        <thead>
            <tr>
                <th>CAMPAIGN ID</th>
                <th>ACCOUNT ID</th>
                <th>CUMULATIVE REACH</th>
                <th>CAMPAIGN NAME</th>
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
        ajax: '/get/table-org-totals?start_date='+start_date+'&end_date='+end_date+'',
        columns: [
                { data: 'campaign_id', name: 'campaign_id' },
                { data: 'account_id', name: 'account_id' },
                { data: 'cumulative_reach', name: 'cumulative_reach' },
                { data: 'campaign_name', name: 'campaign_name' },
                ]
        });
    });
});

</script>

@endsection