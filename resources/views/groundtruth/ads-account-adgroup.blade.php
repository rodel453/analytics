@extends('layouts.google-ads-app')


@section('content')


<div class="container-fluid">


                    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-themecolor ">Adgroups Product</h3>
        <!-- <div class="d-sm-flex align-items-left justify-content-between flex-column">
            <h6 class="text-themecolor ">DURATION:</h6>
            <input type="text" name="daterange" value="" />
        </div> -->
    </div>

<!-- Content Row -->
    <table class="table table-bordered" id="adstable">
        <thead>
            <tr>
                <th>ADGROUP ID</th>
                <th>PRODUCT GROUP</th>
                <th>ADGROUP NAME</th>
                <th>PRODUCT</th>
            </tr>
            </tbody>
        </thead>
    </table>
</div>

<script>

        var table = $('#adstable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('get/account/table-account-adgroups/'.$campaign_id) }}',
        columns: [
                { data: 'adgroup_id', name: 'adgroup_id' },
                { data: 'product_group', name: 'product_group' },
                { data: 'adgroup_name', name: 'adgroup_name' },
                { data: 'product', name: 'product' },
                ]
        });

</script>

@endsection