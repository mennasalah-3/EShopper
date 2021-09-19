<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Type;
use App\Category;
use App\Wishlist;
use App\WishlistProduct;
use App\Order;
use DateTime;
use Illuminate\Support\Facades\Auth;
use DB;
class UserController extends Controller
{
  public $checkout_message='';
    public function index(){
        $products= Product::all();
        $types=Type::all();
        $featureditems = DB::table('products')
                ->inRandomOrder()
                ->limit(5)
                ->get();
        return view('user.userHome',compact('products','types','featureditems'));
    }

    
    public function products($id){
      $products= Category::find($id)->products;
      $types=Type::all();
      return view('user.productsOfCategory',compact('products','types'));
    }
    public function cart(){
      $types=Type::all();
      $cart=auth()->user()->cart;
      $products=$cart->product;
   return view('user.cart',compact('products','types'));
  }

  public function addToCart($id){
     $cart=auth()->user()->cart;
     $cart->product()->sync($id);
     return redirect()->route('cart');
  }

  public function increaseQuantity($product_Id){
    $cart=auth()->user()->cart;
    $product=\App\CartProduct::where('cart_Id',$cart->id)->where('product_Id',$product_Id)->first();
    $product->quantity=($product->quantity)+1;
    $product->save();
    return redirect()->route('cart');  }

  public function decreaseQuantity($product_Id){
    $cart=auth()->user()->cart;
    $product=\App\CartProduct::where('cart_Id',$cart->id)->where('product_Id',$product_Id)->first();
    $product->quantity=($product->quantity)-1;
    $product->save();
    return redirect()->route('cart');
  
  }


  public function removeFromCart($product_Id){
   $cart=auth()->user()->cart;
   $cart->product()->detach($product_Id);
   return redirect()->route('cart');
  }

    public function addToWishlist($product_Id){
      $wishlist=auth()->user()->wishlist;
      $wishlist->product()->sync($product_Id);
      return redirect()->route('wishlist');
      
    }

    public function wishlist(){
      $wishlist=auth()->user()->wishlist;
      $products=$wishlist->product;
      $types=Type::all();
      return view('user.wishlist',compact('products','types'));
  }
  public function removeFromWishlist($product_Id){
    $wishlist=auth()->user()->wishlist;
    $wishlist->product()->detach($product_Id);
    return redirect()->route('wishlist');
  }


  public function storeOrder(storeOrder $request){
   $cart=auth()->user()->cart;
   $products=$cart->product;
   foreach($products as $cartProduct){
     $product=Product::find($cartProduct->id);
     if(!$product || $product->qty < $cartProduct->pivot->quantity){
         $this->checkout_message='Error : product not found  ';
     }
     $date = new DateTime();

     $order= Order::create([
      'user_Id'=>auth()->user()->id,
      'total_price'=>TotalCost(),
      'updated_at'=>$date,
      'Country'=>$request->country,
      'Address'=>'address',
      'notes'=>'notes',
     ]);
     $productsofcart=\App\CartProduct::all();
     foreach($productsofcart as $product){
       $order->product()->attach($product->id,[
        'quantity'=>$product->quantity,
       ]
      );
      $updatedproduct=Product::find($cartProduct->id);
      $updatedproduct->qty=$updatedproduct->qty - $cartProduct->pivot->quantity;
      $updatedproduct->save();
      $cart->product()->detach();
      return route('cart');
     }
   }
  }
}
