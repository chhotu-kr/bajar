<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        //
        $data['category']= Category::all();

        return view('admin/manageCategory',$data);
    }

    
    public function create()
    {
        //
        $data['category']= Category::where("parent_id",0)->get();
    
        return view('admin.insertCategory',$data);
    }

    
    public function store(Request $request)
    {
        //
        $request->validate([
            'cat_title'=>'required',
            'parent_id'=>'required',
        ]);
        $category = new Category();
        $category->cat_title=$request->cat_title;
        $category->parent_id=$request->parent_id;
        $category->save();
        return redirect()->route('category.index')->with("success","Wow! Data inserted successfully");
    }

    
    public function show(Category $category)
    {
        //
    }

    
    public function edit(Category $category)
    {
        //
        $data['categories']= Category::where("parent_id",0)->get();
        $data['category']= $category;
        return view('admin/editCategory',$data);
    }

    
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'cat_title'=>'required',
            'parent_id'=>'required',
        ]);
       
        $category->cat_title=$request->cat_title;
        $category->parent_id=$request->parent_id;
        $category->save();
        return redirect()->route('category.index')->with("success","Wow! Data edit successfully");
    }

    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('category.index')->with("error","Wow! Data deleted successfully");
    }
}
