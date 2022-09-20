<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    //
    public function index()
    {
        //
        return view('admin/managePayment');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Payment $payment)
    {
        //
    }

    public function edit(Payment $payment)
    {
        //
    }

    
    public function update(Request $request, Payment $payment)
    {
        //
    }

    
    public function destroy(Payment $payment)
    {
        //
    }
}
