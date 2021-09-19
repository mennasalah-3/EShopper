<!DOCTYPE html>
<head>
<link href="{{asset('css/adminloginCSS/login.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    @if(session()->has('error'))
                       <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                         {{ session()->get('success') }}
                     </div>
                 @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('postEmail') }}" >
                            <h2>{{ __('Login') }}</h2>
                            @csrf
    
                            <div class="form-group row">
                                <label for="email" margin-top: 25px; class=" col-form-label text-md-right input">{{ __('E-mail') }}</label>
    
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                </div>
                            </div>
                            <button type="submit" style="" class="btn btn-primary"> Send the new password</button>
                        </form>
                    </div>
    

</body>