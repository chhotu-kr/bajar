@extends('admin/base')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-8">
                    <h6>Manage Order</h6>
                </div>
                <div class="col-4">
                    <a href="" class="btn btn-success">Add New Product</a>

                </div>
            </div>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>User_id</th>
                    <th>Address_id</th>
                    <th>Coupan_id</th>
                    <th>IsDelivered</th>
                    <th>IsProcessing</th>
                    <th>IsShiped</th>
                    
                    <th>DateofOrdered</th>
                    <th>Ordered</th>
                    <th>Action</th>
                </tr>
            </table>
        </div>
    </div>
</div>
    
@endsection