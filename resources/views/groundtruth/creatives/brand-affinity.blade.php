@extends('layouts.google-ads-app')


@section('content')


<div class="container-fluid">

                    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-themecolor ">Creatives Brand Affinity</h3>
        <div class="d-sm-flex align-items-left justify-content-between flex-column">
            <h6 class="text-themecolor ">DURATION:</h6>
            <input type="text" name="daterange" value="" />
        </div>
    </div>

<!-- Content Row -->
    <table class="table table-bordered" id="adstable">
        <thead>
            <tr>
                <th>CREATIVES ID</th>
                <th>CREATIVES NAME</th>
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
        ajax: '/get/table-creatives-brand?start_date='+start_date+'&end_date='+end_date+'',
        columns: [
                { data: 'creatives_id', name: 'creatives_id' },
                { data: 'creatives_name', name: 'creatives_name' },
                { data: 'ctr', name: 'ctr' },
                { data: 'sar', name: 'sar' },
                ]
        });
    });
});

</script>

@endsection