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
                    <h6>Manage Coupan</h6>
                </div>
                <div class="col-4">
                    <a href="{{route('coupon.create')}}" class="btn btn-success">Add New Coupan</a>

                </div>
            </div>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Code</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                @foreach ($coupon as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->amount}}</td>
                        <td>
                            <a href="{{route('coupon.edit',[$item])}}" class="btn btn-danger">Edit</a>
                           <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
    
@endsection