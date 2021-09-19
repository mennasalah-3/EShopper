@extends('Admin.layout.standard')
@section('content')
  
    <div class="app-content container center-layout mt-2">
        <div class="content-wrapper">
          <a href="{{route('createProduct')}} " type= "button" style="float: right;" class="button pull-right">Create product</a>
          <br>
          <br>
          <br>
          <div class="content-header row">
            
          </div>
          <div class="content-body">
      
            <div class="row ">
              @foreach($products as $product)
              <div class="col-xl-3 col-lg-6 col-12 ">
                <div class="card pull-up">
                  <div class="card-content ">
                    <div class="card-body ">
                        <div class="media d-flex">
                        <div class="media-body text-left">
                          <img src="{{ URL::asset('storage/'.$product->image) }}" width="100">
                          <h3 class="info">{{$product->price}}</h3>
                          <h6>{{$product->name}}</h6>
                          <a href="{{route('product.edit',$product->id)}}" class="btn float-right btn-success" style="margin:5px">Edit</a>
                          <form action="{{route('product.delete',$product->id)}}" method="POST">
                            @csrf
                             <!-- Delete -->
                             @method('DELETE')
                             <button class="btn float-right btn-danger" style="margin:5px" >Delete</button>
                          </form>
                            </div>
                       
                        </div>
              
                    </div>
               
                
                  </div>
                </div>
              </div>
              @endforeach

@endsection