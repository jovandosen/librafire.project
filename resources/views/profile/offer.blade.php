@extends('profile.home')

@section('title')
	Item Offer
@endsection

@section('content')
	<div id="item-container">
		<form method="POST" action="#" id="item-form" enctype="multipart/form-data">

			<div id="item-name-container">
				<div id="item-name-label-container">
					<label for="name">Name:</label>
				</div>
				<div id="item-name-field-container">
					<input type="text" name="name" id="name" placeholder="Enter item name..." autocomplete="off" 
						class="@if( $errors->has('name') ) {{ 'error-box' }} @endif" value="{{ $item->name }}" readonly />
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
					<label for="description">Description:</label>
				</div>
				<div id="item-description-field-container">
					<input type="text" name="description" id="description" placeholder="Enter item description..." autocomplete="off" 
						class="@if( $errors->has('description') ) {{ 'error-box' }} @endif" value="{{ $item->description }}" readonly />
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
					<label for="price">Price:</label>
				</div>
				<div id="item-price-field-container">
					<input type="number" name="price" id="price" placeholder="Enter item price..." autocomplete="off" 
						class="@if( $errors->has('price') ) {{ 'error-box' }} @endif" value="{{ $item->price }}" readonly />
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
					<label for="payment">Payment:</label>
				</div>
				<div id="item-payment-field-container">
					<select name="payment" id="payment">
						<option value="">Select payment:</option>
						<option value="cash" @if( $item->payment == "cash" ) {{ 'selected' }} @endif>Cash Money</option>
						<option value="card" @if( $item->payment == "card" ) {{ 'selected' }} @endif>Credit Card</option>
						<option value="checks" @if( $item->payment == "checks" ) {{ 'selected' }} @endif>Checks</option>
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
					<label for="delivery">Delivery:</label>
				</div>
				<div id="item-delivery-field-container">
					<select name="delivery" id="delivery">
						<option value="">Select delivery:</option>
						<option value="courier" @if( $item->delivery == "courier" ) {{ 'selected' }} @endif>Courier</option>
						<option value="arrival" @if( $item->delivery == "arrival" ) {{ 'selected' }} @endif>Arrival</option>
						<option value="other" @if( $item->delivery == "other" ) {{ 'selected' }} @endif>Other</option>
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
					@if( !empty($item->image) )
						{{ $item->image }}
					@else
						{{ 'No image' }}	
					@endif
				</div>
				<div id="item-image-error-container">
					<p></p>
				</div>
			</div>

			@csrf
		</form>
	</div>

	<div id="offer-form-container">	
		<form method="POST" action="{{ route('add.offer') }}" id="offer-form">

			<div id="offer-data-container">
				<div id="offer-label-container">
					<label for="offer">Offer:</label>
				</div>
				<div id="offer-field-container">
					<input type="number" name="offer" id="offer" min="{{ $item->price }}" />
				</div>
				<div id="offer-error-container">
					<p></p>
				</div>
			</div>

			<div id="offer-button-container">
				<button type="button" id="offer-button">OFFER</button>
			</div>
			
			<input type="hidden" name="userId" id="userId" value="{{ session('user')->id }}" />

			<input type="hidden" name="itemId" id="itemId" value="{{ $item->id }}" />

			<input type="hidden" name="minPrice" id="minPrice" value="{{ $item->price }}" />

			@csrf
		</form>
	</div>
@endsection