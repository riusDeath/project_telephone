@extends('admin.layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<p>
			@if(isset($mess))
			<p>{{$mess}}</p>
			@endif
			@if(count($errors) >0)
			<div class="alert alert-danger">
		    @foreach($errors->all() as $err)
		        {{$err}} <br/>
		    @endforeach
		  </div>
			@endif
			<div class="contanier">
				<form action="" method="POST" role="form" class="form-inline">
				<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<input type="text" name="name" class="form-control" id="" placeholder="{{__('form.name')}}">
					</div>
					<div class="form-group">
						<input type="text" name="value" class="form-control" id="" placeholder="{{__('form.value')}}">
					</div>
					<div class="form-group">
							<input type="text" name="types" class="form-control" id="" placeholder="{{__('form.type')}}">
					</div>							
					<button type="submit" class="btn btn-primary">{{__('admin.add',['name' => ''])}}</button>
				</form>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>id</th>
						<th>{{__('form.name')}}</th>
						<th>{{__('form.value')}}</th>
						<th>{{__('form.type')}}</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($attributes as $att)
					<tr>
						<td>{{$att->id}}</td>
						<td>{{$att->name}}</td>
						<td>{{$att->value}}</td>
						<td>{{$att->types}}</td>
						<td>
						<a href="{{route('editAtt',['id'=>$att->id])}}" class="label label-info">{{__('admin.update',['name' => ''])}}</a>		
						<a href="{{route('exitAtt',['id'=>$att->id])}}" class="label label-danger" onclick=" return confirm('You want to change status')">{{__('admin.update',['name' => ''])}}</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{$attributes->links()}}
			</p>
		</div>
	</div>
		
@endsection