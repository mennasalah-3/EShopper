<?php


 function is_added_to_cart($product_Id){
    $cart=auth()->user()->cart;
    $cart_Id=$cart->id;
    $product=\App\CartProduct::where('cart_Id',$cart_Id)->where('product_Id',$product_Id)->first();
    if($product){
      return '1';
    }
    else{
      return '0';
    }
   }

   function is_added_to_wishlist($product_Id){
    $wishlist=auth()->user()->wishlist;
    $product=\App\WishlistProduct::where('wishlist_Id',$wishlist->id)->where('product_Id',$product_Id)->first();
     if($product){
       return '1';
     }
     else{
       return '0';
     }
    }
function TotalCost(){
  $cart=auth()->user()->cart;
    $cart_Id=$cart->id;
    $products=$cart->product;
    $totalCost=0;
    foreach($products as $product){
    $cartProduct=\App\CartProduct::where('cart_Id',$cart_Id)->where('product_Id',$product->id)->first();
    $quantity=$cartProduct->quantity;
    $totalCost=$totalCost+($quantity* $product->price);  
  }
  return $totalCost;
}