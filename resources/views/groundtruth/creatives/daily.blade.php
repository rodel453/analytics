@extends('layouts.google-ads-app')


@section('content')


<div class="container-fluid">

                    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-themecolor ">Creatives Daily</h3>
        <div class="d-sm-flex align-items-left justify-content-between flex-column">
            <h6 class="text-themecolor ">DURATION:</h6>
            <input type="text" name="daterange" value="" />
        </div>
    </div>

<!-- Content Row -->
    <table class="table table-bordered" id="adstable">
        <thead>
            <tr>
                <th>CREATIVE ID</th>
                <th>ADGROUP ID</th>
                <th>CAMPAIGN ID</th>
                <th>CREATIVE URL</th>
                <th>DATE</th>
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
        ajax: '/get/table-creatives-daily?start_date='+start_date+'&end_date='+end_date+'',
        columns: [
                { data: 'creative_id', name: 'creative_id' },
                { data: 'adgroup_id', name: 'adgroup_id' },
                { data: 'campaign_id', name: 'campaign_id' },
                { data: 'creative_url', name: 'creative_url' },
                { data: 'date', name: 'date' },
                ]
        });
    });
});

</script>

@endsection