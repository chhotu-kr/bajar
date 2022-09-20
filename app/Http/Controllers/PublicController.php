<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Coupan;

use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //
    public function index(Request $request,$cat_id=Null){
        $data['products']=Product::all();
        //search
        if($request->has('find')){
            $search = $request->search;
            $data['products'] = Product::where('title',"LIKE","%$search%")->get();
        }
        elseif($cat_id !=Null){
            $data['products']=Product::where('category_id',"$cat_id")->get();
        }
        $data['categories']= Category::all();
        return view('public/home',$data);
    }

    public function filter(Request $request,$cat_id){
        $data['products']=Product::all();
        $data['categories']=Category::all();
        return view('public/home',$data);
    }
    public function view($p_id){
        $data['categories']=Category::all();
        $data['product']= Product::find($p_id);
        return view('public/viewProduct',$data);
    }

    public function Cart(Request $request){
         $data['order']=get_order();

        return view('public/cart',$data);
    }

    private function checkCode($code){
        $coupan= Coupan::where([["code",$code],["status",'1']])->first();
        return $coupan;
    }

    public function applyCoupon(Request $req){
        $req->validate([
            'code' => 'required'
        ]);

        if ($coupan = $this->checkCode($req->code)) {
            # code...
            $order=Order::where([["ordered",false],["user_id",Auth::id()]])->first();
            $order->coupan_id=$coupan->id;
            $order->save();
            return redirect()->route('cart');
        }
        else{
            return redirect()->route("cart")->with("msg","Invalid Coupon");
        }
    }

    public function removeCoupon(){
        $order=Order::where([["ordered",false],["user_id",Auth::id()]])->first();
        $order->coupan_id=Null;
        $order->save();
        return redirect()->route('cart');
    }
    public function check(){
        $data['address']=Address::where("user_id",Auth::id())->get();
        return view('public/checkout',$data);
    }

    static public function assignAddress($id){
        $address = Address::findOrFail($id);
        $order = get_order();
        $order->address_id = $address->id;
        $order->save();
        return redirect()->route("checkout");

    }

    // Add to cart
 public function addToCart(Request $request,$p_id){
    
    $product = Product::findOrFail($p_id);
    $user = Auth::user();
    
    if($product){
       $order=get_order();
    
        if($order){
            $orderItem=OrderItem::where([['ordered',false],["order_id",$order->id],["product_id",$product->id]])->first();
            if($orderItem){
                //increase qty
            $orderItem->qty+=1;
            $orderItem->save();
            }
            else{
                //create new orderItem in order(cart)
            $oi = new OrderItem();
            $oi->ordered = false;
            $oi->product_id = $product->id;
            $oi->order_id =$order->id;
            $oi->save();
            }
            


        }
        else{
            //create new order
           $o= new order();
           $o->ordered = false;
           $o->user_id = $user->id;
           $o->save();

           //create new orderItem
           $oi= new OrderItem();
           $oi->ordered= false;
           $oi->product_id = $product->id;
           $oi->order_id = $o->id;
           $oi->save();
        }
     }
    return redirect()->route('cart');
    }

 public function removeFromCart(Request $request,$p_id){
    
    $product = Product::find($p_id);
    $user = Auth::user();
    
    if($product){
        $order = Order::where([['ordered',false],['user_id',$user->id]])->first();
        
    
        if($order){
            $orderItem=OrderItem::where([['ordered',false],["order_id",$order->id],["product_id",$product->id]])->first();
            if($orderItem){
                if($orderItem->qty > 1){
                    $orderItem->qty -=1;
                    $orderItem->save();
                }
                else{
                    $orderItem->delete();
                }
            }
            


        }
        
     }
    return redirect()->route('cart');
    }

    public function removeItemFromCart(Request $request,$p_id){
          $product=Product::find($p_id);
          $user=Auth::user();
          if($product){
              $order=Order::where([['ordered',false],['user_id',$user->id]])->first();
              if($order){
                  $orderItem=OrderItem::where([['ordered',false],['order_id',$order->id],['product_id',$product->id]])->first();
                  if($orderItem){
                      $orderItem->delete();
                  }
              }
          }

          return redirect()->route('cart');
    }

}
