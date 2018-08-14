@extends('admin.layouts.admin')

@section('content')
<div class="jumbotron">
	<div class="alert">
		{{  isset($mess)?$mess:'' }}
	</div>
	<div class="container">
		<h3>id : {{ $product->id }} </h3>
		<h3>Name : {{ $product->name }}</h3>
		<p>Specifications</p>
		<p>
			<form action="{{ route('proAtt',['id' => $product->id]) }}" method="POST" role="form">
				<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
				@foreach($types as $type)
				<div class="col-md-2">
					<div class="dropdown">
					  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ $type->types }}
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					  	@foreach($attributes as $att)
					  		@if($att->types == $type->types)
					    	<li>							
					    	<input type="checkbox" name="attribute_id[]" value="{{ $att->id }}">{{ $att->name }}  {{ isset($att->value)?':'.$att->value:'' }} 						
					   		</li>
					    	@endif
					    @endforeach
					  </ul>
					</div>
				</div>
				@endforeach										
				<button type="submit" class="btn btn-primary">{{ __('admin.add',['name' => '']) }}</button>
			</form>			
		</p>
		<p> 
		<span class="container"><table class="table table-hover">
			<thead>
				<tr>
					<th>id</th>
					<th>{{ __('form.name') }}</th>
					<th>{{ __('form.value') }}</th>
					<th>{{ __('form.type') }}</th>
					<th></th>
					</tr>
					</thead>
					<tbody>
					@foreach($product->attribute as $att)
						<tr>
							<td>{{ $att->id }}</td>
							<td>{{ $att->name }}</td>
							<td>{{ isset($att->value)?$att->value:'' }}</td>
							<td>{{ $att->types }}</td>
							<td>
								<a href="{{ route('deleteAtt',[ 'product_id' => $product->id,'id' => $att->pivot->id, ]) }}" onclick=" return confirm('You want to delete {{ $att->name }}?')" class="label label-danger"> {{ __('form.delete') }}</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table></span>
		</p>
	</div>
</div>	
@endsection