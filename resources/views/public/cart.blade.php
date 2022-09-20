@extends('public/master')
@section('content')
<div class="container-fluid bg-dark text-white p-2 shadow-sm sticky-top">
<div class="container">
    <h4 class="h2 fw-lighter">Your Cart</h4>
</div>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col-8">
            
            @foreach ($order->orderItem as $item)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-3">
                                <img src="{{asset('images/'.$item->product->image)}}" alt="" class="w-100" style="object-fit: cover; height:200px">
                            </div>
                            <div class="col-9 card-body">
                                <h5>{{$item->product->title}}</h5>
                                <p>{{$item->product->category->cat_title}}</p>
                                <h6>{{$item->product->discount_price}}<del>{{$item->product->price}}</del></h6>
                                <a href="{{route('removeFromCart',['p_id'=>$item->product_id])}}" class="btn btn-danger">-</a>
                                <span class="lead fw-bolder">{{$item->qty}}</span>
                                <a href="{{route('addToCart',['p_id'=>$item->product->id])}}" class="btn btn-success">+</a>
                                <a href="{{route('removeitemfromcart',['p_id'=>$item->product->id])}}" class="btn btn-dark float-end">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            @endforeach
           
        </div>
        <div class="col-4">
          <div class="list-group">
              <div class="list-group-item list-group-item-action">Total amount <span class="float-end">Rs.{{total_amount()}}/-</span></div>
              <div class="list-group-item list-group-item-action">Total discount <span class="float-end">Rs.{{total_saving_amount()}}/-</span></div>
              <div class="list-group-item list-group-item-action">Tax  <span class="float-end">Rs.{{get_tax()}}/-</span></div>
              @if ($order->coupan_id != null)
                
              <div class="list-group-item list-group-item-action  bg-warning text-dark">Coupon discount <span  class="float-end">{{$order->coupan->amount}} <a href="{{route('removeCoupon')}}" class="text-danger fw-bold text-decoration-none" title="Remove Coupon Code">X</a></span></div>

              @endif
              <div class="list-group-item list-group-item-action"><h5>paybale amount</h5> <span class="float-end">Rs.{{get_payble_amount()}}/-</span></div>
          </div>
          <div class="row mt-3 px-2">
              <a href="" class="btn btn-success col">continue shoping</a>
              <a href="{{route('checkout')}}" class="btn btn-danger ms-2 col">checkout</a>
          </div>
          @if ($order->coupon_id ==Null)
          <div class="card mt-4">
              <div class="card-body">
                  <h6 class="lead">Have you any coupon?</h6>
                  <form action="{{route('applyCoupon')}}" method="POST" class="d-flex">
                    @csrf
                  <input type="text" placeholder="Enter Code" name="code" value="{{old('code')}}" class="form-control">
                    @error('code')
                        <p class="text-muted small">{{$message}}</p>
                    @enderror
                    <input type="submit" class="btn btn-dark" value="Apply">
                   
                   </form>
                   @if (($msg = Session::get("msg")))
                   <div class="alert alert-danger mt-3 p-1">
                           {{$msg}}
                   </div>
               @endif
              </div>
          </div>
              
          @endif
        </div>
    </div>
   
</div>
    
@endsection