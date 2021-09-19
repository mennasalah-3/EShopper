@extends('user.standard',['types'=>$types])
@section('content')
	
	<section id="form"><!--form-->
        <div class="justify-content-center">
		<div class="container">
            @if ($errors->any())
                            <div class="alert alert-danger">
                              <ul>
                               @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                               @endforeach
                               </ul>
                             </div>
                             @endif
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form method="POST" action="{{ route('storeUser') }}" >
                        @csrf
                        <input type="text" name="first_name" placeholder="First Name"/>
                        <input type="text" name="last_name" placeholder="Last Name"/>
                        <input type="email" name="email" placeholder="Email Address"/>
                        <input type="text" name="phonenumber" placeholder="Phonenumber"/>
                        <input type="password" name="password" placeholder="Password"/>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
    
</section><!--/form-->
@endsection