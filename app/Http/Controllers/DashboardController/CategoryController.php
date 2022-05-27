<?php

namespace App\Http\Controllers\DashboardController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function manage_category()
    {
        $categories = Category::get();
        return view('admin.dashboard.manage-category',['categories'=>$categories]);
    }
    public function add()
    { 
        return view('admin.dashboard.add-category');
    }
    public function store(Request $request)
    {   
        $request->validate([
            'category'=>'required'
        ]);
        $category = new Category();
        $category->category = $request->category;
        $category->save();   
        return redirect()->route('category.manage')->with('success','تم اضافة التصنيف بنجاح');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.dashboard.update-category',['category'=>$category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category'=>'required',

        ]);
        $category = Category::findOrFail($id);
        $category->update($request->all());    
         return redirect()->route('category.manage')->with('success','تم تعديل التصنيف بنجاح');
    }


    
    public function destroy($id)
    {
         Category::destroy($id);
        return redirect()->route('category.manage')->with('success','تم حذف التصنيف بنجاح');

    }
}