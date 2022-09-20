<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin/manageOrder');
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    
    public function show(Order $order)
    {
        //
    }

    
    public function edit(Order $order)
    {
        //
    }

    
    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
