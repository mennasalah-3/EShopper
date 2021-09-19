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
            <div class="card-body">
                
                <form method="POST" action="{{route('saveUpdates',Auth::guard('admin')->user()->id)}}"  enctype="multipart/form-data">
                    
                    @csrf

  

                    <div class="form-group row">
                        <label for="name" margin-top: 25px; class="col-form-label text-md-right input">Name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control " name="name" value="{{Auth::guard('admin')->user()->name}}" required autocomplete>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                    <label for="email" margin-top: 25px; class="col-form-label text-md-right input">E-mail</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control " name="email" value="{{Auth::guard('admin')->user()->email}}">
                    </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="submit" value="Update" class="button pull-right" name="submit">
                        </div>
                    </div>
                 
                </form>
               
            </div>
        </div>
    </div>
</div>
</div>

@endsection