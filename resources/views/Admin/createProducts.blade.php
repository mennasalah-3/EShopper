@extends('Admin.layout.standard')
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
                @endif
            <div class="card-body">
                
                <form method="POST" action="{{isset($product) ? route('product.update',$product->id) : route('storeProduct') }}"  enctype="multipart/form-data">
                    
                    @csrf

                    <div class="form-group row">
                        <label for="name" margin-top: 25px; class=" col-form-label text-md-right input">Name</label>

                        <div class="col-md-8">
                            <input id="name" type="name" class="form-control " name="name" required autocomplete autofocus value="{{isset($product)? $product->name : ' ' }}" >

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" margin-top: 25px; class="col-form-label text-md-right input">Price   </label>

                        <div class="col-md-8">
                            <input id="price" type="number" class="form-control " name="price" value="{{isset($product)? $product->price : ' ' }}" required autocomplete>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="qty" margin-top: 25px; class="col-form-label text-md-right input">Quantity  </label>

                        <div class="col-md-8">
                            <input id="qty" type="number" class="form-control " name="qty" value="{{isset($product)? $product->qty : ' ' }}" required autocomplete>
                        </div>
                    </div>
                  
                    <div class="form-group row">
                        <label for="dicount" margin-top: 25px; class="col-form-label text-md-right input">Discount</label>

                        <div class="col-md-8">
                            <input id="dicount" type="number" class="form-control " name="dicount" value="{{isset($product)? $product->dicount : ' ' }}">
                        </div>
                    </div>
                    
                   
                    <div class="form-group row">
                    <label for="image" margin-top: 25px; class="col-form-label text-md-right input">Image : </label>
                    <div>
                        @if(isset($product))
                        <div class="form-group">
                            <img width="100" src="{{URL::asset('storage/'.$product->image)}}" alt="">
                        @endif
                    </div>
                    </div>
                    <input type="file" name="image" autofocus  class=" form-control" >
                    
                    </div>
                    
                    <div class="form-group row">
                        <label for="categories">Select a Category : </label>

                            <select class="col-md-8" name="category_id" >
                           
                            @foreach ( $categories as $category )
                            <option value={{$category->id}}>{{$category->name}}</option>    
                            @endforeach
                            
                            
                            </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="submit" value="{{isset($product)?'Update' : 'Create'}}" class="button pull-right" name="submit">
                        </div>
                    </div>
                 
                </form>
               
            </div>
        </div>
    </div>
</div>
</div>

@endsection