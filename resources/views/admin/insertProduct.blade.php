@extends('admin/base')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-9">
            <h3>Insert Product here</h3>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for=""> Title</label>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                            @error('title')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Brand</label>
                            <select name="brand_id" id="" class="form-select" value="{{old('brand_id')}}">
                                
                                @foreach ($brand as $item)
                                    <option value="{{$item->id}}">{{$item->brand_title}}</option>
                                @endforeach
                            </select>
                            @error('brand')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Category</label>
                            <select name="category_id" id="" class="form-select" value="{{old('category_id')}}">
                               
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->cat_title}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Price</label>
                            <input type="text" name="price" class="form-control" value="{{old('price')}}">
                            @error('price')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Discount</label>
                            <input type="text" name="discount_price" class="form-control" value="{{old('discount_price')}}">
                            @error('discount_price')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Image</label>
                            <input type="file" name="image" class="form-control" value="{{old('image')}}">
                            @error('image')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Description</label>
                            <input type="text" name="description" class="form-control" value="{{old('description')}}">
                            @error('description')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Stock</label>
                            <input type="text" name="stock" class="form-control" value="{{old('stock')}}">
                            @error('stock')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit"  class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection