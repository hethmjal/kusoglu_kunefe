<?php

namespace App\Http\Controllers\DashboardController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function manage_product()
    {
        $products = Product::get();       
         return view('admin.dashboard.manage-product',['products'=>$products]);

    }

    public function add()
    {
        $categories = Category::get();
        return view('admin.dashboard.add-product',['categories'=>$categories]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',
            'name'=>'required',
            'price'=>'required|numeric'

        ]);

        if ($request->hasFile('image')) {
           
            // Filename To store
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;
            
               $file = $request->file('image');
               $image=$file->storeAs('/images',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);
                $data = $request->all();
             
               $data['image'] = $image;
               Product::create($data);

            }
                 //add default image
                 else {
            $image = 'images/default.jpg';
            $data['image'] = $image;
            Product::create($data);
  
    }
    return redirect()->route('product.manage')->with('success','تم اضافة المنتج بنجاح');

}

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        return view('admin.dashboard.update-product',['product'=>$product,'categories'=>$categories]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric'

        ]);
        $data = $request->all();

        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            //delete old image 
            Storage::disk('uploads')->delete($product->image);
            // Filename To store
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;
            
               $file = $request->file('image');
               $image=$file->storeAs('/images',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);
               $data['image'] = $image;
              $product->update($data);
            }
            $product->update($data);

            return redirect()->route('product.manage')->with('success','تم تعديل المنتج بنجاح');

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // delete image from images folder
        Storage::disk('uploads')->delete($product->image);
         Product::destroy($id);
         return redirect()->route('product.manage')->with('success','تم حذف المنتج بنجاح');
        }
}