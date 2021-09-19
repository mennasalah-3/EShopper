@extends('user.standard',['types'=>$types])
@section('content')
	
	<section id="form"><!--form-->
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
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST" action="{{ route('authenticateUser') }}" >

							@csrf
							<input type="email" name="email" placeholder="Email Address" />
							<input type="password" name="password" placeholder="Password"/>
                            <span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="buttons">

					<div class="action_btn">
					<div class="col-sm-1">
						<h2 class="or">OR</h2>
					</div>
					<div class="col-sm-1">
							<a href="{{route('register')}}" class="btn btn-default " style="margin:5px">Create a new account</a>		
						</div>
					</div>
				</div>

						
				</div>
			</div>
		
	</section><!--/form-->
    @endsection