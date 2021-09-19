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
                    <div class="card-header">Verify Your Email Address</div>
                    <div class="card-body">
                        @if (session('resent'))
                          <div class="alert alert-success" role="alert">
                           {{ __('A fresh verification link has been sent to your email address.') }}
                          </div>
                        @endif
                   <a href="{{ url('/reset-password/'.$token) }}">Click Here</a>
               </div>
           </div>
       </div>
   </div>
</div>
