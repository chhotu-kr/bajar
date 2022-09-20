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
                    <h6>Manage Category</h6>
                </div>
                <div class="col-4">
                    <a href="{{route('category.create')}}" class="btn btn-success">Add New category</a>

                </div>
            </div>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Cat_Title</th>
                    <th>Parent_id</th>
                    <th>Action</th>
                </tr>
                @foreach ($category as $item)
                    <tr>
                    <th>{{$item->id}}</th>
                    <th>{{$item->cat_title}}</th>
                    <th>
                        @if ($item->parent_id==0)
                           main
                           @else
                           {{$item->cat_title}} 
                        @endif
                        </th>
                      
                   <th>
                    <form action="{{route('category.destroy',[$item])}}" method="post">
                        @csrf
                        @method('delete')
                      <input type="submit" value="x" class="btn btn-danger">
                      <a href="{{route('category.edit',$item)}}" class="btn btn-danger">Edit</a>
                    </form>
                    
                   </th>
                    </tr>
                    
                @endforeach
                
            </table>
        </div>
    </div>
</div>
    
@endsection