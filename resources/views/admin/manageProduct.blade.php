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
                    <h6>Manage Products</h6>
                </div>
                <div class="col-4">
                    <a href="{{route('product.create')}}" class="btn btn-success">Add New Product</a>

                </div>
            </div>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>discount_Price</th>
                    <th>qty</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($product as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->brand->brand_title}}</td>
                        <td>{{$item->category->cat_title}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->discount_price}}<del class="ms-2">{{$item->price}}</del></td>
                        <td>{{$item->stock}}</td>
                        <td>
                            <img src="{{asset('images/'.$item->image)}}" width="50px" height="auto">
                        </td>
                       
                        <td>
                            <form action="{{route('product.destroy',[$item])}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="x" class="btn btn-danger mt-3">
                                <a href="{{route('product.edit',[$item])}}" class="btn btn-warning mt-3">Edit</a>
                            </form>
                           
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
    
@endsection