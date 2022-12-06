@extends('layouts.google-ads-app')


@section('content')


<div class="container-fluid">

                    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <a href="/" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Google Analytics</a>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-themecolor ">Ads Account</h3>
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
                <th>CAMPAIGN NAME</th>
                <th>OPEN HOUR VISITS</th>
                <th>CUMULATIVE REACH</th>
                <th>ACTION</th>
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
            ajax: '/get/table-account?start_date='+start_date+'&end_date='+end_date+'',
            columns: [
                    { data: 'campaign_id', name: 'campaign_id' },
                    { data: 'campaign_name', name: 'campaign_name' },
                    { data: 'open_hour_visits', name: 'open_hour_visits' },
                    { data: 'cumulative_reach', name: 'cumulative_reach' },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]

            });
            
        });
     });

</script>

@endsection