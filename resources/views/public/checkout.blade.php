@extends('public/master')
@section('content')
<div class="container-fluid bg-dark text-white p-2 shadow-sm sticky-top">
    <div class="container">
        <h4 class="h2 fw-lighter">Your Checkout</h4>
    </div>
    </div>
<div class="container mt-3">
    <div class="row">
        <div class="col-8 mt-3">
            <h4>Fill Address details</h4>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('address.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                    @error('name')
                                    <p class="text-danger small">{{$message}}</p>
                                        
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label>Contact</label>
                                    <input type="text" name="contact" class="form-control" value="{{old('contact')}}">
                                    @error('contact')
                                    <p class="text-danger small">{{$message}}</p>
                                        
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label>PinCode</label>
                                    <input type="text" name="pincode" class="form-control" value="{{old('pincode')}}">
                                    @error('pincode')
                                    <p class="text-danger small">{{$message}}</p>
                                        
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label>street/village</label>
                                    <input type="text" name="street" class="form-control" value="{{old('street')}}">
                                    @error('street')
                                    <p class="text-danger small">{{$message}}</p>
                                        
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label>Lalandmark</label>
                                    <input type="text" name="landmark" class="form-control" value="{{old('landmark')}}">
                                    @error('landmark')
                                    <p class="text-danger small">{{$message}}</p>
                                        
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" value="{{old('address')}}">
                                    @error('address')
                                    <p class="text-danger small">{{$message}}</p>
                                        
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" value="{{old('city')}}">
                                        @error('city')
                                        <p class="text-danger small">{{$message}}</p>
                                            
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" value="{{old('state')}}">
                                        @error('state')
                                        <p class="text-danger small">{{$message}}</p>
                                            
                                        @enderror 
                                    </div>
                                </div>
                                
                                    <div class="mb-3">
                                        <a href="submit" class="btn btn-secondary w-100 mt-4">Submit</a> 
                                    </div>
                                
                            </div>
                            
                                
                                
                                    
                            
                                
                                   
                                
                
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            @foreach ($address as $item)
            <div class="card mt-3  @if($item->type =='office')
                border border-success
                @else
                'border' border-danger
                @endif
                ">
                <span class="@if($item->type =="office")
                    bg-success
                    @else
                    bg-danger
                    @endif
                    badge position-absolute shadow-sm text-capitalize
                    " style="right:0;border-radius:5px,0px,0px,5px">{{$item->type}}</span>
                <div class="card-body">
                    <h5>{{$item->name}} ({{$item->contact}})</h5>
                    <p class="small mb-0">{{$item->street}}<br> {{$item->city}} {{$item->state}} - {{$item->pincode}}</p>
                    <p class="small mb-0">LandMark:{{$item->landmark}}</p>
                    <a href="" class="btn btn-info small">Use this address</a>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
    
@endsection