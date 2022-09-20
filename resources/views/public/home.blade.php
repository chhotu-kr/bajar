@extends('public/master')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
            @include('public.side')
        </div>
        <div class="col-9">
            <div class="row">
               @foreach ($products as $pro)
               <div class="col-3">
                <div class="mb-3">
                    <div class="card">
                        <img src="{{asset('images/'.$pro->image)}}" alt="" class="w-100" style="object-fit: cover; height:220px">
                        <div class="card-body">
                            <strong>{{$pro->title}}</strong>
                            <p class="m-0 p-0">{{$pro->discount_price}} <del>{{$pro->price}}</del></p>
                            <p class="m-0 p-0">{{$pro->category->cat_title}}</p>
                            <a href="{{route('viewProduct',['p_id'=>$pro->id])}}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
               @endforeach
            </div>
        </div>
    </div>
</div>
    
@endsection