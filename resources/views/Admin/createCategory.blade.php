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
                
                <form method="POST" action="{{ route('storeCategory') }}"  enctype="multipart/form-data">
                    
                    @csrf

                    <div class="form-group row">
                        <label for="name" margin-top: 25px; class=" col-form-label text-md-right input">Name</label>

                        <div class="col-md-8">
                            <input id="name" type="name" class="form-control " name="name" required autocomplete autofocus>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="types">Select the type : </label>

                            <select class="col-md-8" name="type_id" >
                           
                            @foreach ( $types as $type )
                            <option value={{$type->id}}>{{$type->name}}</option>    
                            @endforeach
                            
                            
                            </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="submit" value="Create" class="button pull-right" name="submit">
                        </div>
                    </div>
                 
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection