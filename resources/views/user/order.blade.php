@extends('user.standard',['types'=>$types])
@section('content')

<div class="shopper-informations">
    <div class="row">
        <div class="col-sm-3 clearfix">
            <div class="bill-to">
                <p>Bill To</p>
                <div class="form-one">
                    <form>
                        <input type="text" placeholder="Email" name="email">
                        <input type="text" placeholder="First Name " name="first_name">
                        <input type="text" placeholder="Last Name " name="last_name">
                        <input type="text" placeholder="Address 1 " name="address">
                    
                        <select>
                            <option>-- Country --</option>
                            <option>United States</option>
                            <option>Bangladesh</option>
                            <option>UK</option>
                            <option>India</option>
                            <option>Pakistan</option>
                            <option>Ucrane</option>
                            <option>Canada</option>
                            <option>Dubai</option>
                        </select>
                        <input type="text" placeholder="Mobile Phone" name="phonenumber">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="order-message">
                <p>Shipping Order</p>
                <textarea name="notes"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                
            </div>	
        </div>					
    </div>
</div>
@endsection