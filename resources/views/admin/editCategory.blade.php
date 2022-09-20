@extends('admin/base')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-9">
            <h3> Update category here</h3>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('category.update',$category)}}" method="POST">
                        @method("put")
                        @csrf
                        <div class="mb-3">
                            <label>Parent</label>
                            <select name="parent_id" id="" class="form-select">
                             @if ($category->parent_id!=0)
                             <option value="{{$category->parent_id}}">{{$category->parent->cat_title}}</option>
                             @else
                             <option value="{{$category->parent_id}}">Main Category</option>
                             @endif
                            <option value="0">Main Category</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->cat_title}}</option>
                            @endforeach
                            </select>
                            @error('parent_id')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                            <label>Category Title</label>
                            <input type="text" name="cat_title" value="{{$category->cat_title}}" class="form-control">
                            @error('cat_title')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="update category" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection