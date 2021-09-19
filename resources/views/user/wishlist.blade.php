@extends('user.standard',['types'=>$types])
@section('content')

	<div class="slider-frame">
		<div class="slide-images">
         <div class="image-container">
			 <img src="{{URL::asset('storage/UserHomeImages/home/girl1.jpg')}}">
         </div>
		 <div class="image-container">
			<img src="{{URL::asset('storage/UserHomeImages/home/girl2.jpg')}}">
		</div>
		<div class="image-container">
			<img src="{{URL::asset('storage/UserHomeImages/home/girl3.jpg')}}">
		</div>
		</div>
	</div>
    <section >
      <div class="container">
        <div class="breadcrumbs">
          <ol class="breadcrumb">
            <li><a href="{{route('Shopper')}}">Home</a></li>
            <li class="active">Wishlist</li>
          </ol>
        </div>
   @if(count($products->all())) 
      @foreach ($products as $product)   
      <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
          <div class="col-sm-5">
            <div class="view-product">
              <img src="{{URL::asset('storage/'.$product->image)}}" alt="" />
            </div>
          </div>
          <div class="col-sm-7">
          <div class="product-information"><!--/product-information-->
            <h2>{{$product->name}}</h2>
            <span>
              <span>{{$product->price}}</span>
             @if(auth()->user())
             @if(is_added_to_cart($product->id) == '0')
               <form action="{{route('addToCart',$product->id)}}" method="POST">
                 @csrf
                  <button class="btn btn-default add-to-cart" style="margin:5px" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                     <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                     <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                   </svg> Add to cart</button>
               </form> 
             @else
               <form action="{{route('removeFromCart',$product->id)}}" method="POST">
                 @csrf
                 @method('DELETE')
                  <button class="btn btn-default add-to-cart" style="margin:5px" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                     <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                   </svg>Added to cart</button>
               </form>
             @endif
          @else
         <form action="{{route('addToCart',$product->id)}}" method="POST">
             @csrf
              <button class="btn btn-default add-to-cart" style="margin:5px" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                 <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                 <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
               </svg> Add to cart</button>
         </form> 
         @endif
            </span>
            <p><b>Brand:</b> E-SHOPPER</p>
            <form action="{{route('removeFromWishlist',$product->id)}}" method="POST">
              @csrf
              @method('DELETE')
                 <button class="btn btn-default add-to-cart" style="  position:absolute; top:0; right:0; margin:5px" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                  <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                </svg></button>
              </form>
        </div><!--/product-information-->
      </div>
    </div><!--/product-details-->
    
    @endforeach

    @else
    <div class="row ">
      <div class="col-xl-3 col-lg-6 col-12 ">
        <div class="card pull-up">
          <div class="card-content ">
            <div class="card-body ">
                <div class="media d-flex">
                <div class="media-body text-left">
                  <h1 class="info"> No products added to wishlist !</h1> 
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  
  @endif
         
@endsection