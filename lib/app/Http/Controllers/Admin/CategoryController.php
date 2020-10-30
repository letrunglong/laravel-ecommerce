<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getCate(){
        $data['catelist'] = Category::all();
        return view('backend.category',$data);
    }

    //add category
    public function postCate(AddCateRequest $request){
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        return back();
    }
    //delete category
    public function getDeleteCate($id){
        Category::destroy($id);
        return back();
    }

    //edit category
    public function getEditCate($id){
        $data['cate'] = Category::find($id);
        return view('backend.editcategory',$data);
    }
    public function postEditCate(EditCateRequest $request,$id){
        $category = Category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        return redirect()->intended('admin/category');
    }
}
