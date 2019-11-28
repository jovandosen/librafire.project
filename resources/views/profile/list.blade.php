@extends('profile.home')

@section('title')
	Item List
@endsection

@section('content')
	
	<div id="item-list-container">
		<table style="width: 80%">
			<tr id="item-list-header">
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Payment</th>
				<th>Delivery</th>
				<th>Created By First Name</th>
				<th>Created By Last Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach( $items as $item )
				<tr class="item-list-rows">
					<td>{{ $item->name }}</td>
					<td>{{ $item->description }}</td>
					<td>{{ $item->price }}</td>
					<td>{{ $item->payment }}</td>
					<td>{{ $item->delivery }}</td>
					<td>{{ $item->firstName }}</td>
					<td>{{ $item->lastName }}</td>
					<td><a href="#">edit</a></td>
					<td>	
						<a href="{{ route('item.delete', $item->itemID) }}"><font color="red">delete</font></a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>

@endsection