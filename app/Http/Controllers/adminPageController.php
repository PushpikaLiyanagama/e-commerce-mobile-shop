<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Orderd;

use Notification;

use App\Notifications\Horizon_Mobile;

class adminPageController extends Controller
{
    public function view_category(){

        $data = category::all();

        return view('admin.category' , compact('data'));
    }

    public function add_category(Request $request){

        $data = new category;
        $data-> category_name= $request-> category;
        $data -> save();
        return redirect()->back()->with('message','Category Added Successfully');

    }

    public function delete_category($id){

        $data = category::find($id);
        $data->delete();

        return redirect()->back()->with('message','Category Deleted Successfully');;
    }

    public function view_product(){
        $category = category::all();
        return view('admin.product' ,compact('category'));
    }
    public function add_product(Request $request){

        $product = new product;
        
        $product -> title = $request->title;
        $product -> description = $request->description;
        $product -> price = $request->price;
        $product -> quantity = $request->quantity;
        $product -> discount_price = $request->discount_price;
        $product -> category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/product'); 
            $image->move($destinationPath, $imagename); 
            $product->image = $imagename;
        }
        $product->save();

        return redirect()->back()->with('message','Product Added Successfully');
    
    }
    public function show_product(){

        $product=product::all();
        return view('admin.show_product',compact('product'));
        
    }
    public function delete_product($id){

        $product = product::find($id);
        $product->delete();

        return redirect()->back()->with('message','Product  Deleted Successfully');
    }
    public function update_product($id){

        $product = product::find($id);
        $category= category::all();
        return view('admin.update_product',compact('product','category'));
    }
    public function updateProduct(Request $request,$id){

        $product = product::find($id);
        $product->title=$request->title;
        $product -> description = $request->description;
        $product -> price = $request->price;
        $product -> quantity = $request->quantity;
        $product -> discount_price = $request->discount_price;
        $product -> category = $request->category;
        $image = $request->image;

        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/product'); 
            $image->move($destinationPath, $imagename); 
            $product->image = $imagename;
        }
        $product->save();

        return redirect()->back()->with('message','Product  Update Successfully');
    }
    public function order(){
        $orderd = orderd::all();
        return view('admin.order',compact('orderd'));
    }
    public function send_email($id){
        $orderd =orderd::find($id);

        return view('admin.email_info',compact('orderd'));
    }
    public function send_user_email(Request $request, $id){
        $orderd =orderd::find($id);
        $details =[
            'greetings'=>$request->greetings,
            'fline'=>$request->fline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lline'=>$request->lline,
        ];
        Notification::send($orderd,new Horizon_Mobile($details));
        return redirect()->back();

    }
}