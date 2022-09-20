@extends('admin/base')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-9">
            <h3>Update Product here</h3>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('product.update',$product)}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        
                        <div class="mb-3">
                            <label for=""> Title</label>
                            <input type="text" name="title" class="form-control" value="{{$product->title}}">
                            @error('title')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Brand</label>
                            <select name="brand_id" id="" class="form-select" value="">
                                <option value="0">slelect brand</option>
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
                            <select name="category_id" id="" class="form-select" value="">
                                <option value="0">select category</option>
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
                            <input type="text" name="price" class="form-control" value="{{$product->price}}">
                            @error('price')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Discount</label>
                            <input type="text" name="discount_price" class="form-control" value="{{$product->discount_price}}">
                            @error('discount_price')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Image</label>
                            <input type="file" name="image" class="form-control" value="{{$product->image}}">
                            @error('image')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Description</label>
                            <input type="text" name="description" class="form-control" value="{{$product->description}}">
                            @error('description')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Stock</label>
                            <input type="text" name="stock" class="form-control" value="{{$product->stock}}">
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