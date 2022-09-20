@extends('admin/base')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-3">
            @include('admin.side')
        </div>
        <div class="col-9">
            <div class="container">
                @if ($msg = Session::get("success"))
                <div class="alert  bg-danger text-white">
                    {{$msg}}
                </div>
                    
                @endif
            <div class="container">
                @if ($msg = Session::get("error"))
                <div class="alert  bg-danger text-white">
                    {{$msg}}
                </div>
                    
                @endif
            </div>
            <div class="row">
                <div class="col-8">
                    <h5>Manage Brand</h5>
                </div>
                <div class="col-4">
                    <a href="{{route('brand.create')}}" class="btn btn-secondary">Add New Brand</a>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                
                    @foreach ($brands as $item)
                      <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->brand_title}}</td>
                    <th> <form action="{{route('brand.destroy',[$item])}}" method="post">
                        @csrf
                        @method('delete')
                      <input type="submit" value="x" class="btn btn-danger">
                      <a href="{{route('brand.edit',$item)}}" class="btn btn-danger">Edit</a>
                    </form>
                    
                </th>      
                    </tr>  
                    @endforeach
                

            </table>
            
        </div>
    </div>
</div>
    
@endsection