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
    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="route('Shopper')">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
    @if (count($products->all()))      
     <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description">Name</td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
               
                  @foreach ($products as $product)
                  <tr>
                    <td class="cart_product">
                        <img src="{{ URL::asset('storage/'.$product->image) }}"alt="" height="200" width="350" />
                    </td>
                    <td class="cart_description">
                        <p>{{$product->name}}</p>
                    </td>
                    <td class="cart_price">
                        <p>${{$product->price}}</p>
                    </td>
                    <td class="cart_price">
                      <form action="{{route('increaseQuantity',$product->id)}}" method="POST">
						@csrf
						<button class="btn btn-default add-to-cart" style="margin:5px" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
							<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
						  </svg></button>  
					</form>
                       <select style=" cursor: pointer;" name = "dropdown"  default="{{$product->pivot->quantity}}">
                       @for ($i = 0; $i < 11; $i++)
                        @if ($product->pivot->quantity == $i)
                        <option value = "{{$i}}" selected>{{$i}}</option>    
                        @else 
                        <option value = "{{$i}}" >{{$i}}</option>                       
                        @endif

                       @endfor
                       </select>
					   <form action="{{route('decreaseQuantity',$product->id)}}" method="POST">
						@csrf
						<button class="btn btn-default add-to-cart" style="margin:5px" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
							<path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
						  </svg></button>  
					</form>
                      
                  </td>
                  <td class="cart_price">
                    <p>${{$product->pivot->quantity * $product->price}}</p>
                </td>
                    <td class="cart_delete">
                      <form action="{{route('removeFromCart',$product->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                           <button class="btn btn-default add-to-cart" style="margin:5px" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg></button>
                        </form>
                     
                    </td>
                  </tr>
                                    
                  @endforeach
            </div>
          </table>

        </section>
        
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{TotalCost()}}</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{TotalCost()+2}}</span></li>
						</ul>
						<form action="{{route('checkout')}}" method="POST">
							@csrf
							<button class="btn btn-default check_out" >Checkout</button>  
						</form>
						  
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

        </tbody>
    @else
    <div class="row ">
        <div class="col-xl-3 col-lg-6 col-12 ">
          <div class="card pull-up">
            <div class="card-content ">
              <div class="card-body ">
                  <div class="media d-flex">
                  <div class="media-body text-left">
                    <h1 class="info"> No products !</h1> 
                  </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
     
    @endif
      </div>
    
        
@endsection