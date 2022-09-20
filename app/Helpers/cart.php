<?php
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

function get_order(){
    return $order=Order::where([['ordered',false],['user_id',Auth::id()]])->first();

}

function get_cart_count(){
    return get_order()->orderItem->count();  
}

function total_amount(){
    $total=0;
    foreach(get_order()->orderItem as $value){
        $total += $value->product->price * $value->qty;
    }
    return $total;
}

function total_discount_amount(){
    $total = 0;
    foreach(get_order()->orderItem as $value){
        $total += $value->product->discount_price * $value->qty;
    }
    return $total;

}

function total_saving_amount(){
    return total_amount() - total_discount_amount();
}

function get_tax(){
    return total_discount_amount() * 0.18;
}

function get_payble_amount(){
    if(get_order()->coupan_id !=Null){
        $total = total_discount_amount() + get_tax();
        return $total - get_order()->coupan->amount;
    }
    else{
        return total_discount_amount() + get_tax();
    }
}