@extends('Admin.layout.standard')
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            
            @if (count($errors))
            @foreach ($errors->all() as $error)
              <p class="alert alert-danger">{{$error}}</p>
            @endforeach
           @endif    
            <div class="card-body">
                
                <form method="POST" action="{{route('updatePassword',Auth::guard('admin')->user()->id)}}"  enctype="multipart/form-data">
                    
                    @csrf
                     
                    <div class="form-group row">
                        <label for="current_password" margin-top: 25px; class="col-form-label text-md-right input">Enter your current password : </label>

                        <div class="col-md-8">
                            <input id="current_password" type="password" class="form-control " name="current_password" required >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new_password" margin-top: 25px; class="col-form-label text-md-right input">Enter your new password : </label>

                        <div class="col-md-8">
                            <input id="new_password" type="password" class="form-control " name="new_password" required >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="confirm_new_password" margin-top: 25px; class="col-form-label text-md-right input">Confrim your new password : </label>

                        <div class="col-md-8">
                            <input id="confirm_new_password" type="password" class="form-control " name="confirm_new_password" required >
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