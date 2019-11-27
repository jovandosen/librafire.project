@extends('profile.home')

@section('title')
	Profile
@endsection

@php
	$user = session('user');
	$firstName = $user->firstName;
	$lastName = $user->lastName;
	$email = $user->email;
@endphp

@section('content')
	<div id="profile-data-container">
		<form method="POST" action="{{ route('profile') }}" id="profile-form">

			<div id="profile-first-name-container">
				<div id="profile-first-name-label">
					<label for="first-name-profile">First Name:</label>
				</div>
				<div id="profile-first-name-field">
					<input type="text" name="first-name-profile" id="first-name-profile" value="{{ $firstName }}" 
						class="@if( $errors->has('first-name-profile') ) {{ 'error-border-profile' }} @endif" />
				</div>
				<div id="profile-first-name-error">
					<p>
						@if( $errors->has('first-name-profile') )
							{{ $errors->first('first-name-profile') }}
						@endif
					</p>
				</div>
			</div>

			<div id="profile-last-name-container">
				<div id="profile-last-name-label">
					<label for="last-name-profile">Last Name:</label>
				</div>
				<div id="profile-last-name-field">
					<input type="text" name="last-name-profile" id="last-name-profile" value="{{ $lastName }}" 
						class="@if( $errors->has('last-name-profile') ) {{ 'error-border-profile' }} @endif" />
				</div>
				<div id="profile-last-name-error">
					<p>
						@if( $errors->has('last-name-profile') )
							{{ $errors->first('last-name-profile') }}
						@endif
					</p>
				</div>
			</div>

			<div id="profile-email-container">
				<div id="profile-email-label">
					<label for="email-profile">Email:</label>
				</div>
				<div id="profile-email-field">
					<input type="text" name="email-profile" id="email-profile" value="{{ $email }}" 
						class="@if( $errors->has('email-profile') ) {{ 'error-border-profile' }} @endif" />
				</div>
				<div id="profile-email-error">
					<p>
						@if( $errors->has('email-profile') )
							{{ $errors->first('email-profile') }}
						@endif
					</p>
				</div>
			</div>

			<div id="profile-button-container">
				<button type="button" id="profile-update-button">UPDATE</button>
			</div>

			<input type="hidden" name="email-address" id="email-address" value="" />

			<input type="hidden" name="hidden-email" id="hidden-email" value="{{ $email }}" />

			@csrf
		</form>
	</div>
@endsection