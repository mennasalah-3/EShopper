@extends('Admin.layout.standard')
@section('content')
  
    <div class="app-content container center-layout mt-2">
        <div class="content-wrapper">
          <a href="{{route('createCategory')}} " type= "button" style="float: right;" class="button pull-right">Create category</a>
          <br>
          <br>
          <br>
          <div class="content-header row">
            
          </div>
          <div class="content-body">
      
            <div class="row ">
              @foreach($categories as $category)
              <div class="col-xl-3 col-lg-6 col-12 ">
                <div class="card pull-up">
                  <div class="card-content ">
                    <div class="card-body ">
                        <div class="media d-flex">
                        <div class="media-body text-left">
                          
                          <h2>{{$category->name}}</h6>
                            <form action="{{route('category.delete',$category->id)}}" method="POST">
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
            </div>
          </div>
        </div>
    </div>
        
@endsection