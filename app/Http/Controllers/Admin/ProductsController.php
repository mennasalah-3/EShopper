<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;
class ProductsController extends Controller
{
    public function indexadmin(){
        $products= Product::all();
        return view('Admin.products',compact('products'));
    }
    public function createProduct(){
        $categories= Category::all();
        return view('Admin.createProducts',compact('categories'));
    } 
    public function storeProduct(Request $request ){
  

      $this->validate($request, [
            'name'=>'required',
            'price'=>'required',
            'dicount'=>'required',
            'qty'=>'required',
            'image'=>'required|image',
           
        ]);
     
       Product::create([
            'name'=> $request->name,
            'price'=>$request->price,
            'dicount'=>$request->dicount,
            'qty'=>$request->qty,
            'image'=>$request->image->store('productsPhotos','public'),
            'category_id'=>$request->category_id,
        
        ]);

      return redirect(route('allProducts'));


//dd($request->all());

    }
    public function editProduct($id){
        $product=Product::find($id);
        return view('Admin.createProducts',['product'=>$product,'categories'=>Category::all()]);
    }
    public function updateProduct(Request $request,$id){
        $product=Product::find($id);
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required',
            'dicount'=>'required',
            'qty'=>'required',
            'image'=>'required|image',
           
        ]);
        $data=$request->only(['name','price','dicount','qty','category_id']);
        if($request->hasFile('image')){
            $image=$request->image->store('productsPhotos','public');
            Storage::disk('public')->delete($product->image);
            $data['image']=$image;
            $product->update($data);
        }
        return redirect(route('allProducts'));
    }
    public function deleteproduct($id){
        $product=Product::find($id);
        $product->delete();
        return redirect(route('allProducts'));
    }
}
