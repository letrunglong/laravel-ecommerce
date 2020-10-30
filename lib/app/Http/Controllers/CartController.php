<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Mail;
use App\Models\Product;
class CartController extends Controller
{
    public function getAddCart($id){
        $product =  Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price, 'options' => ['img' => $product->prod_img]]);
        return redirect('cart/show');
    }

    public function getShowCart(){
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        return view('frontend.cart',$data);
    }
    public function getDeleteCart($id){
        // có 2 th xảy ra là rowid và all
        if($id == 'all'){
            Cart::destroy();
        }
        else {
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request){

        // 404 not found
        Cart::update($request->rowId,$request->qty);
    }
    public function postComplete(Request $request){
        $data['infor'] =$request->all();
        $email = $request->email;
        $data['total']= Cart::total();
        $data['cart'] = Cart::content();
        Mail::send('frontend.email', $data, function ($message) use ($email){
            $message->from('letrunglong07@gmail.com', 'Trung Long Le');
        
            $message->to($email, $email);
        
            $message->cc('letrunglong2809@gmail.com', 'John Doe');
        
            $message->subject('Xác nhận đơn hàng từ Như CC Shop');
        });
        return redirect('complete');
    }
    public function getComplete(){
        return view('frontend.complete');
    }
}
