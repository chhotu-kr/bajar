@extends('admin/base')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-9">
            <h3>Edit brand here</h3>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('brand.update',$brand)}}" method="POST">
                        @method("put")
                        @csrf
                        
                        <div class="mb-3">
                            <label for=""> Title</label>
                            <input type="text" name="brand_title" class="form-control" value="{{$brand->brand_title}}">
                            @error('brand_title')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="update brand" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection