@extends('profile.home')

@section('title')
	Password
@endsection

@section('content')
	<div id="password-data-container">
		<form method="POST" action="{{ route('password') }}" id="password-form">
			@method('patch')
			
			<div id="current-password-container">
				<div id="current-password-container-label">
					<label for="current-password">Current Password:</label>
				</div>
				<div id="current-password-container-field">
					<input type="password" name="current-password" id="current-password" />
					<i class="fa fa-eye-slash" aria-hidden="true" id="password-eye-current" onclick="hideShowPassword(this)"></i>
				</div>
				<div id="current-password-container-error">
					<p></p>
				</div>
			</div>

			<div id="new-password-container">
				<div id="new-password-container-label">
					<label for="new-password">New Password:</label>
				</div>
				<div id="new-password-container-field">
					<input type="password" name="new-password" id="new-password" />
					<i class="fa fa-eye-slash" aria-hidden="true" id="password-eye-new" onclick="hideShowPassword(this)"></i>
				</div>
				<div id="new-password-container-error">
					<p></p>
				</div>
			</div>

			<div id="new-password-repeat-container">
				<div id="new-password-repeat-container-label">
					<label for="new-password-repeat">Repeat new:</label>
				</div>
				<div id="new-password-repeat-container-field">
					<input type="password" name="new-password-repeat" id="new-password-repeat" />
					<i class="fa fa-eye-slash" aria-hidden="true" id="password-eye-new-repeat" onclick="hideShowPassword(this)"></i>
				</div>
				<div id="new-password-repeat-container-error">
					<p></p>
				</div>
			</div>

			<div id="update-password-button-container">
				<button id="update-password">UPDATE</button>
			</div>

			@csrf
		</form>
	</div>
@endsection