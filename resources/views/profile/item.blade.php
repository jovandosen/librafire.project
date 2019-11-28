@extends('profile.home')

@section('title')
	Add New Item
@endsection

@section('content')
	<div id="item-container">
		<form method="POST" action="{{ route('item') }}" id="item-form">
			
			<div id="item-name-container">
				<div id="item-name-label-container">
					<label for="name"><font color="red">*</font>Name:</label>
				</div>
				<div id="item-name-field-container">
					<input type="text" name="name" id="name" placeholder="Enter item name..." autocomplete="off" 
						class="@if( $errors->has('name') ) {{ 'error-box' }} @endif" />
				</div>
				<div id="item-name-error-container">
					<p>
						@if( $errors->has('name') )
							{{ $errors->first('name') }}
						@endif
					</p>
				</div>
			</div>

			<div id="item-description-container">
				<div id="item-description-label-container">
					<label for="description"><font color="red">*</font>Description:</label>
				</div>
				<div id="item-description-field-container">
					<input type="text" name="description" id="description" placeholder="Enter item description..." autocomplete="off" 
						class="@if( $errors->has('description') ) {{ 'error-box' }} @endif" />
				</div>
				<div id="item-description-error-container">
					<p>
						@if( $errors->has('description') )
							{{ $errors->first('description') }}
						@endif
					</p>
				</div>
			</div>

			<div id="item-price-container">
				<div id="item-price-label-container">
					<label for="price"><font color="red">*</font>Price:</label>
				</div>
				<div id="item-price-field-container">
					<input type="number" name="price" id="price" placeholder="Enter item price..." autocomplete="off" 
						class="@if( $errors->has('price') ) {{ 'error-box' }} @endif" />
				</div>
				<div id="item-price-error-container">
					<p>
						@if( $errors->has('price') )
							{{ $errors->first('price') }}
						@endif
					</p>
				</div>
			</div>

			<div id="item-payment-container">
				<div id="item-payment-label-container">
					<label for="payment"><font color="red">*</font>Payment:</label>
				</div>
				<div id="item-payment-field-container">
					<select name="payment" id="payment">
						<option value="cash">Cash Money</option>
						<option value="card">Credit Card</option>
						<option value="checks">Checks</option>
					</select>
				</div>
				<div id="item-payment-error-container">
					<p>
						@if( $errors->has('payment') )
							{{ $errors->first('payment') }}
						@endif
					</p>
				</div>
			</div>

			<div id="item-delivery-container">
				<div id="item-delivery-label-container">
					<label for="delivery"><font color="red">*</font>Delivery:</label>
				</div>
				<div id="item-delivery-field-container">
					<select name="delivery" id="delivery">
						<option value="courier">Courier</option>
						<option value="arrival">Arrival</option>
						<option value="other">Other</option>
					</select>
				</div>
				<div id="item-delivery-error-container">
					<p>
						@if( $errors->has('delivery') )
							{{ $errors->first('delivery') }}
						@endif
					</p>
				</div>
			</div>

			<div id="item-image-container">
				<div id="item-image-label-container">
					<label for="image">Image:</label>
				</div>
				<div id="item-image-field-container">
					<input type="file" name="image" id="image" />
				</div>
				<div id="item-image-error-container">
					<p></p>
				</div>
			</div>

			<div id="item-button-container">
				<button type="button" id="add-item">ADD ITEM</button>
			</div>

			@csrf
		</form>
	</div>
@endsection