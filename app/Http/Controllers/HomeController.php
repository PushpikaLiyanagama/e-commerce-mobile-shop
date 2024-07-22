<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Orderd;

class HomeController extends Controller
{
    public function index()
    {

        if(Auth::user()->usertype=='user')
        {
            $product=Product::paginate(9);
            //return view('home.index');
            return view('home.index',compact('product'));
        }
        else{
            return view('admin.index');
        }
    }
    public function product_details($id){
        $product=product::find($id);

        return view('home.product_details',compact('product'));
    }
    public function add_cart(Request $request, $id){

        if(Auth::id()){
            $user=Auth::user();
            $product=product::find($id);
            $cart = new cart;
            $cart->name= $user->name;
            $cart->email= $user->email;
            $cart->phone= $user->phone;
            $cart->address= $user->address;
            $cart->user_id= $user->id;

            $cart->product_title= $product->title;
            if($product->discount_price!=null){
                $cart->price= $product->discount_price * $request->quantity;
            }
            else{
                $cart->price= $product->price * $request->quantity;
            }
            
            $cart->image= $product->image;
            $cart->product_id= $product->id;

            $cart->quantity= $request->quantity;

            $cart->save();
            return redirect()->back();


        }
        else{
            return redirect('login');
        }
        
    }
    public function show_cart(){

        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('home.showCart',compact('cart'));
        }
        else{
            return redirect('login');
        }

        
    }
    public function remove_cart($id){
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function delivery(){
        $user=Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();
        foreach($data as $data){
            $orderd=new orderd;

            $orderd->name = $data->name;
            $orderd->email = $data->email;
            $orderd->phone = $data->phone;
            $orderd->address = $data->address;

            $orderd->user_id = $data->user_id;
            $orderd->product_title = $data->product_title;
            $orderd->price = $data->price;
            $orderd->quantity = $data->quantity;
            $orderd->image = $data->image;
            $orderd->product_id = $data->product_id;
            $orderd->payment_status = 'Delivery';
            $orderd->delivery_status = 'Processing';
            $orderd->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();

        }
        return redirect()->back()->with('message','We have received your order. We will connect with connect with you soon...');
    }
    public function product_search(Request $request){
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->orWhere('category','LIKE',"$search_text")->paginate(9);
        return view('home.index',compact('product'));

    }
    
}
