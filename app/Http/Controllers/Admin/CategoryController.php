<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Type;
class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('Admin.allCategories',compact('categories'));
    }
    public function createCategory(Request $request){
        $types=Type::all();
       return view('Admin.createCategory',compact('types'));
    }
    public function storeCategory(Request $request){
        $this->validate($request,[
            'name'=>'required',
            
        ]);
        $category= Category::create([
            'name'=>$request->name,
            'type_id'=>$request->type_id
        ]);
        return redirect(route('allcategories'));
    }
    public function deleteCategory($id){
        $category=Category::find($id);
        $category->products()->delete();
        $category->delete();
        return redirect(route('allcategories'));
    }
}
