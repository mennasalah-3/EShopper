<!DOCTYPE html>
<head>
    <link href="{{asset('css/adminloginCSS/login.css')}}" rel="stylesheet">
</head>
<body>
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
                    
                    <form method="POST" action="{{ route('authenticate') }}" >
                        @csrf
                        <h2>{{ __('Login') }}</h2>
                        

                        <div class="form-group row">
                            <label for="email" margin-top: 25px; class=" col-form-label text-md-right input">{{ __('E-mail') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" style="margin-top: 25px;" class="col-md-6 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group col">
                            <div class="col-md-8 ">
                                <div class="form-check  form-check checkbox-wrapper checkbox ">
                                    <input  class="checkbox " style="margin-top: 10px; " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label  class="checkbox-label " style="margin-top: 10px; font-size: medium;" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                               
                                <button type="submit" style="" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{route('getEmail')}}" style="font-size: medium">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                      @include('layouts.errors')
                    </form>
                   
                </div>
            </div>
        </div>
    </div>

    
</div>

</body>