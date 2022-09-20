<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupan;

class CoupanController extends Controller
{
    //
    public function index()

    {   $data['coupon'] = Coupan::all();
        return view("admin.manageCoupan",$data);
    }

   
    public function create()
    {
        return view('admin.insertCoupan');
    }

    
    public function store(Request $request)
    {
        
        $request->validate([

            'code'=>'required',
            'status'=>'required',
            'amount'=>'required',
        ]);

        $data = new Coupan();
        $data->code = $request->code;
        $data->status = $request->status;
        $data->amount = $request->amount;
        $data->save();

        return redirect()->route('coupon.index');
    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
       
        
    }

    
    public function update(Request $request, $id)
    {
        //
        
       
    }

    
    public function destroy(coupan $coupan)
    {
        //
        $coupan->delete();
        return redirect()->route('coupon.index');
    }
}
