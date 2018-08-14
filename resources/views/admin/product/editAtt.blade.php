@extends('admin.layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h3>{{ __('admin.update',['name' => trans('admin.Specification')]) }}</h3>
			<p>{{ isset($mess)?$mess:'' }}</p>
	        @foreach($errors->all() as $err)
			<div class="alert alert-danger">
	            {{ $err }} <br/>
	        </div>
	        @endforeach
		    <div class="col-md-6">
				<p id="ship"></p>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for="">{{ __('form.name') }}</label>
						<input type="text" class="form-control" id="" placeholder="{{ __('form.name') }} " name="name" value="{{ $att->name }}">
					</div>		
					<div class="form-group">
						<label for="">{{ __('form.value') }}</label>
						<input type="text" class="form-control" id="" placeholder="{{ __('form.value') }} " name="value" value="{{ $att->value }}">
					</div>		
					<div class="form-group">
						<label for="">{{ __('form.type') }}</label>
						<input type="text" class="form-control" id="" placeholder="{{ __('form.type') }}" name="types" value="{{ $att->types }}">
					</div>		
															
					<button type="submit" class="btn btn-primary">{{ __('admin.update',['name' => '']) }}</button>

				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')

@endsection
