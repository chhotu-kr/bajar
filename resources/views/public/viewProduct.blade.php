@extends('public/master')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
            @include('public.side')
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-4">
                    <img src="{{asset('images/'.$product->image)}}" alt="" class="w-100">
                </div>
                <div class="col-8">
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <td>{{$product->title}}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{$product->category->cat_title}}</td>
                        </tr>
                        <tr>
                            <th>price</th>
                            <td><h5><del>{{$product->price}}/-</del></h5></td>
                        </tr>
                        <tr>
                            <th>Offer price</th>
                            <td><h5>{{$product->discount_price}}/-</h5></td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td>{{$product->brand->brand_title}}</td>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td>{{$product->stock}}</td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col">
                            <a href="{{route('addToCart',['p_id'=>$product->id])}}" class="btn btn-success">Add To Cart</a>
                            <a href="" class="btn btn-warning">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="card p-0">
                    <div class="card-header bg-primary text-center text-white">Description</div>
                    <div class="card-body">
                        <p class="lead">{{$product->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection