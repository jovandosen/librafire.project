@extends('welcome')

@section('title')
	Register
@endsection

@section('content')
	<div id="register-form-container">
		<form method="post" action="{{ route('register') }}" id="register-form">

			<div id="first-name-container">
				<div id="first-name-label-container">
					<label for="first-name"><i class="fa fa-user icon"></i> <font color="red">*</font>First Name:</label>
				</div>
				<div id="first-name-field-container">
					<input type="text" name="first-name" id="first-name" placeholder="Enter your first name..." minlength="3" autocomplete="off" 
						value="{{ old('first-name') }}" class="@if( $errors->has('first-name') ) {{ 'error-border' }} @endif" />
				</div>
				<div id="first-name-error-container">
					<p>
						@if( $errors->has('first-name') )
							{{ $errors->first('first-name') }}
						@endif
					</p>
				</div>
			</div>

			<div id="last-name-container">
				<div id="last-name-label-container">
					<label for="last-name"><i class="fa fa-user icon"></i> <font color="red">*</font>Last Name:</label>
				</div>
				<div id="last-name-field-container">
					<input type="text" name="last-name" id="last-name" placeholder="Enter your last name..." minlength="3" autocomplete="off" 
						value="{{ old('last-name') }}" class="@if( $errors->has('last-name') ) {{ 'error-border' }} @endif" />
				</div>
				<div id="last-name-error-container">
					<p>
						@if( $errors->has('last-name') )
							{{ $errors->first('last-name') }}
						@endif
					</p>
				</div>
			</div>

			<div id="email-container">
				<div id="email-label-container">
					<label for="email"><i class="fa fa-envelope icon"></i> <font color="red">*</font>Email:</label>
				</div>
				<div id="email-field-container">
					<input type="text" name="email" id="email" placeholder="Enter your email address..." autocomplete="off" value="{{ old('email') }}" 
						class="@if( $errors->has('email') ) {{ 'error-border' }} @endif" />
				</div>
				<div id="email-error-container">
					<p>
						@if( $errors->has('email') )
							{{ $errors->first('email') }}
						@endif
					</p>
				</div>
			</div>

			<div id="password-container">
				<div id="password-label-container">
					<label for="password"><i class="fa fa-key icon"></i> <font color="red">*</font>Password:</label>
				</div>
				<div id="password-field-container">
					<input type="password" name="password" id="password" placeholder="Enter your password..." minlength="5" 
						class="@if( $errors->has('password') ) {{ 'error-border' }} @endif" />
					<i class="fa fa-eye-slash" aria-hidden="true" id="password-eye"></i>
				</div>
				<div id="password-error-container">
					<p>
						@if( $errors->has('password') )
							{{ $errors->first('password') }}
						@endif
					</p>
				</div>
			</div>

			<div id="register-button-container">
				<button type="button" id="register-button">REGISTER</button>
			</div>

			<input type="hidden" name="email-address" id="email-address" value="" />

			@csrf
		</form>
	</div>
@endsection