<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function getHome(){
        //san pham db
        $data['featured'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
        // dd($data['featured']);

        $data['new']= Product::orderBy('prod_id','desc')->take(8)->get();
        // dd($data['new']);
        // $data['catelist'] = Category::all();
        // dd($data['catelist']);
        return view('frontend.home',$data);
    }
    public function getDetails($id){
        //get list categories
        // $data['catelist'] = Category::all();
        $data['item'] =Product::find($id);
        return view('frontend.details',$data);
    }
    public function getCategory($id){
        $data['items'] = Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(8);
        $data['cate'] = Category::find($id);
        return view('frontend.category',$data);
    }

    //search

    public function getSearch(Request $request){
        $result = $request->result;
        $result = Str::replaceArray(' ',['%'],$result);
        $data['product'] = Product::where('prod_name','like','%'.$result.'%')->get();

        return view('frontend.search',$data);
    }
}
