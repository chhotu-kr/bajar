<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        //
        $data['product']=Product::all();
        return view('admin/manageProduct',$data);
        
    }
   
    
    public function create()
    {
        //
       
        $data['category']=Category::all();
        $data['brand']=Brand::all();
        return view('admin/insertProduct',$data);
    }

    
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'discount_price'=>'required',
            'image'=>'required',
            'description'=>'required',
            'stock'=>'required',
        ]);

        $data= new Product();
        $data->title=$request->title;
        $data->brand_id=$request->brand_id;
        $data->category_id=$request->category_id;
         //image work
         $filename = $request->image->getClientOriginalName();
         $request->image->move(public_path('images'),$filename);
         $data->image = $filename;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->discount_price=$request->discount_price;
       

       
        $data->stock=$request->stock;
        $data->save();
        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        //
        
    }

    
    public function edit(Product $product)
    {
        //
     
        
        $data['category']=Category::all();
        $data['brand']=Brand::all();
        $data['product']= $product;
       
       
        return view('admin.editProduct',$data);
    }

    
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'title'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'discount_price'=>'required',
            'image'=>'required',
            'description'=>'required',
            'stock'=>'required',
        ]);

        
        $product->title=$request->title;
        $product->brand_id=$request->brand_id;
        $product->category_id=$request->category_id;
         
        $product->price=$request->price;
        $product->description=$request->description;
        $product->discount_price=$request->discount_price;
        $product->stock=$request->stock;
        //image work
        $filename = $request->image->getClientOriginalName();
        $request->image->move(public_path('images'),$filename);
        $product->image = $filename;
        $product->save();
        return redirect()->route('product.index');
    }

    
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('product.index');
    }
}
