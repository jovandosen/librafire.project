@extends('welcome')

@section('title')
	Login
@endsection

@section('content')
	<div id="login-form-container">
		<form method="POST" action="{{ route('login') }}" id="login-form">

			@php
				if( session()->has('emailOk') ){
					$emailOk = session('emailOk');
				} else {
					$emailOk = '';
				}
			@endphp
			
			<div id="email-container">
				<div id="email-label-container">
					<label for="email"><i class="fa fa-envelope icon"></i> <font color="red">*</font>Email:</label>
				</div>
				<div id="email-field-container">
					<input type="text" name="email" id="email" placeholder="Enter your email address..." autocomplete="off" value="{{ old('email') }}" 
						class="@if( $errors->has('email') ) {{ 'error-border' }} @endif @if( session()->has('emailError') ) {{ 'error-border' }} @endif" />
				</div>
				<div id="email-error-container">
					<p>
						@if( $errors->has('email') )
							{{ $errors->first('email') }}
						@endif

						@if( session()->has('emailError') )
							{{ session('emailError') }}
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
						class="@if( $errors->has('password') ) {{ 'error-border' }} @endif @if( session()->has('passwordError') ) {{ 'error-border' }} @endif" />
					<i class="fa fa-eye-slash" aria-hidden="true" id="password-eye"></i>
				</div>
				<div id="password-error-container">
					<p>
						@if( $errors->has('password') )
							{{ $errors->first('password') }}
						@endif

						@if( session()->has('passwordError') )
							{{ session('passwordError') }}
						@endif
					</p>
				</div>
			</div>

			<div id="login-button-container">
				<button type="button" id="login-button">LOGIN</button>
			</div>

			<input type="hidden" name="email-address" id="email-address" value="" />

			@csrf
		</form>
	</div>
@endsection