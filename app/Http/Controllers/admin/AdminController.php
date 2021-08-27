<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
     public function products(){

        $products = Product::all();
        $arr = Array("products"=>$products);
        return view("product/products",$arr);
     }
     public function add(Request $r){

        if($r->isMethod("post"))
        {   $reqrules = $this->rulesreq();
            $therules= $this->allrules();
            $validate = Validator($r->all(),$therules,$reqrules);
            if($validate->fails())
            {   
                return redirect()->back()->withErrors($validate)->withInput($r->all());
            }
            Product::create([
                "name"=>$r->input("name"),
                "price"=>$r->input("price")
            ]);
            return redirect("product/products");
        }
        return view("product/add");

     }

     public function delete($id){

            $product = Product::find($id);
            $product->delete();
            return redirect()->back();

     }


     public function edit(Request $r , $id){
        $product= Product::find($id);
        if($r->isMethod("post"))
        {
            $reqrules = $this->rulesreq();
            $therules= $this->allrules();
            $validate = Validator($r->all(),$therules,$reqrules);
            if($validate->fails())
            {   
                return redirect()->back()->withErrors($validate)->withInput($r->all());
            }
           
            $product->name = $r->input("name");
            $product->price = $r->input("price");
            $product->save();
            return redirect("product/products");
        }
        $arr=Array("product"=>$product);
        return view("product/edit",$arr);

     }

     public function allrules(){
         return 
         [
            "name"=>"required|max:100",
            "price"=>"numeric|required"

         ];  
     }

     public function rulesreq(){


        return
        [

            "name.required"=> "please inter the name",
            "name.max" => "the name is too long",
            "price.numeric"=>"please enter just numbers",
            "price.required"=>"please enter trhe price"
        ];
     }
}

