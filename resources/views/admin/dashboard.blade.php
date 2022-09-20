@extends('admin/base')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-3">
            @include('admin.side')

        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h2 class="display-3">55+</h2>
                                <h5>Total Products</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                   <div class="mb-3">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h2 class="display-3">553+</h2>
                            <h5>Total Orders</h5>
                        </div>
                    </div>
                   </div>
                </div>
                <div class="col-4">
                   <div class="mb-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h2 class="display-3">155+</h2>
                            <h5>Total Users</h5>
                        </div>
                    </div>
                   </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <h2 class="display-3">554567</h2>
                                <h5>Total Payment</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h2 class="display-3">554+</h2>
                                <h5>Total Category</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h2 class="display-3">255+</h2>
                                <h5>Total Brand</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection