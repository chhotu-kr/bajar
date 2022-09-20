<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    public function index()
    {
        //
        $data['brands']=Brand::all();
        return view('admin.manageBrand',$data);
    }

    
    public function create()
    {
        //
        return view('admin.insertBrand');
    }

    
    public function store(Request $request)
    {
        //
        $request->validate([
            'brand_title'=>'required',
        ]);
        $brand= new Brand();
        $brand->brand_title=$request->brand_title;
        $brand->save();
        return redirect()->route('brand.index')->with("success","Wow! Data inserted successfully");;
    }

    
    public function show(Brand $brand)
    {
        //
    }

    
    public function edit(Brand $brand)
    {
        //
        return view('admin/editBrand',["brand"=>$brand]);
    }

    
    public function update(Request $request, Brand $brand)
    {
        //
        $request->validate([
            'brand_title'=>'required',
        ]);
        
        $brand->brand_title=$request->brand_title;
        $brand->save();
        return redirect()->route('brand.index')->with("success","Wow! Data inserted successfully");;
    }

    
    public function destroy(Brand $brand)
    {
        //
        $brand->delete();
        return redirect()->route('brand.index')->with("error","Wow! Data deleted successfully");;
    }
}
