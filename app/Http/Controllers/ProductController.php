<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Auth;

class ProductController extends Controller
{
    //

    public function show() {


        $user = Auth::user();
        $user_products = $user->products()->get();


        return view('product', ['products'=>$user_products]);
    }
    
    
    public function addProduct(Request $request) {

       $imgs = $request->images;


       if($imgs) {
            foreach($imgs as $img){
                $img_name = $img->getClientOriginalName();
            }   

            $img->move('images', $img_name);

       }


      $user_id = Auth::user()->id;

       Product::create([
        'product_name' => $request->input('product_name'),
        'product_img' => $img_name,
        'user_id' => $user_id,
    ]);

    return redirect('product');

    }

    public function deleteProduct($id) {
       
        $product = Product::find($id);

        $deleted_product = $product->delete();

        if($deleted_product) {
            unlink("images/".$product->product_img);

            return redirect('product');
        }



       

        
          
        
    }
    
   
}