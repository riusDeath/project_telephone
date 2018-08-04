@extends('admin.layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h3>{{__('admin.ship')}}</h3>
			@if(isset($mess))
			<p>{{$mess}}</p>
			@endif
	<table class="table table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>{{__('form.name')}}</th>
							<th>{{__('form.adress')}}</th>
							<th>{{__('form.price')}}</th>
							<th>{{__('form.status')}}</th>
							<th>{{__('form.description')}}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($ships as $ship)
						<tr>
							<td>{{$ship->id}}</td>
							<td>{{$ship->name}}</td>
							<td>{{$ship->price}}</td>
							<td>{{($ship->status==1)?trans('form.show'):trans('form.hidden')}}</td>
							<td><?php echo $ship->description; ?></td>
							<td>
								<a href="{{route('editShip',['id'=>$ship->id])}}" class="label label-success">{{__('admin.update',['name' => ''])}}</a>
								<a href="{{route('deleteShip',['id' => $ship->id])}}" class="label label-danger" onclick=" return confirm( trans('admin.change',['name' => trans('form.status')]) )">{{__('admin.change',['name' => trans('form.status')])}}</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
		    <div class="col-md-12">
				
				<p id="ship"></p>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" class="form-control" id="" placeholder="Name" name="name">
					</div>	
					<div class="form-group">
						<label for="">price: </label>
						<input type="text" class="form-control" id="" placeholder="price" name="price">
					</div>	
					<div class="form-group">
						<label for="">Adress: </label>
						<input type="text" class="form-control" id="" placeholder="Adress" name="adress">
					</div>		
					 <div class="form-group">
					 	<textarea name="description" id="description_ship" rows="10" cols="80">  </textarea>
					 </div>
				<script>
				      CKEDITOR.replace( 'description_ship' );
				</script>										
					<button type="submit" class="btn btn-primary">{{__('admin.add',['name' => ''])}}</button>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')

@endsection
