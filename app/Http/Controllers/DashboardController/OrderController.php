<?php

namespace App\Http\Controllers\DashboardController;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NewOrderCreateNotification;
use App\Rules\ArrayAtLeastOneRequired;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
         $orders = Order::where('is_parent','true')->with('children')->with('product')->latest()->get();
        // dd($orders[0]->children[0]);
         $user =User::first();
         $notificationes = $user->notifications;
         $notificationes->markAsRead();
        return view('admin.dashboard.orders',['orders'=>$orders]);
    }

    public function store(Request $request)
    {
     // dd($request->quantity);
     $arr = array_filter($request->quantity);
     $quantity=[];
     $i=0;
     foreach ($arr as  $value) {
         $quantity[$i] = $value;
         $i++;
     }
     //dd($quantity);
     $request->validate([
            'quantity'=>'required|min:1',
            'quantity.*'=>[new ArrayAtLeastOneRequired($quantity)],
            'product_id'=>'required',

            'product_id.*'=>[new ArrayAtLeastOneRequired($request->product_id)],
            'table'=>'required|numeric|min:1',
        ],
    [
        'quantity.min'=>'الكمية يجب ان تكون (1) على الاقل',
        'quantity.required'=>'الرجاء ادخال الكمية أولا',
        'table.min'=>'الرجاء ادخال رقم طاولة صحيح',
        'table.required'=>'الرجاء ادخال رقم الطاولة اولا',
        'product_id.required'=>'الرجاء اختيار منتج اولا ثم ادخال الكمية المطلوبة'

    ]);
    
       if(count($quantity) != count($request->product_id)){
        return redirect()->back()->with('field','الرجاء اختيار منتج اولا ثم ادخال الكمية المطلوبة');

       }
        
      
        $data =  $request->all();
    
        $data['table'] = $request->table;
        $data['is_parent'] = 'true';
        $data['product_id'] = NULL;
        $data['quantity'] = NULL;
        $data['price'] = NULL;
        
        $order = Order::create($data);
        $order2 = '';
        $all_price = 0;
        $i=0;
        foreach ($request->product_id as $key => $product_id) {
            $data =  $request->all();
            $product = Product::findORFail($product_id);
            $data =  $request->all();
           // 
            $data['table'] = $request->table;
            $data['product_id'] = $product->id;
            $data['is_parent'] = 'false';
            $data['parent_id'] = $order->id;
            
            for ($i; $i < count($quantity) ; $i++) { 
                $data['price'] = $product->price * $quantity[$i];
                $data['price'] = $product->price * $quantity[$i];
                $all_price += $product->price * $quantity[$i];
                $data['quantity']= $quantity[$i]; 
    
               break ;
            }
            $i++;
             $order2 =Order::create($data);
        }
   
        $parent_order = Order::findOrFail($order->id);
        $parent_order->price= $all_price;
        $parent_order->save(); 
        
      // dd($order2);
        $user = User::first();
        $user->notify(new NewOrderCreateNotification($order2));
        Toastr::success('Post Successfully Saved :)','Success');
        return redirect()->back()->with('success','تم ارسال طلبك بنجاح');
    }

    public function confirm(Request $request)
    {
         $order = Order::findOrFail($request->order_id);
        $order->status = 'complete';
        $order->update(); 
        return response()->json([
           'id'=> $request->all(),
          
        ]);
    }
}