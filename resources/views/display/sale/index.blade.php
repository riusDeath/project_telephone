@extends('layouts.index')

@section('main')

@section('link')
    <link rel="stylesheet" href="{{ asset('public/css/my.css') }}">                                  
@endsection
<div class="container">
	@foreach($sales as $sale)
	<div class="thumbnail">
		<img data-src="#" alt="">
		<div class="caption">
			<h1>{{ $sale->name }}</h1>
			<p>
				<img src="{{ asset('uploads/'.$sale->image) }}" alt="">
			</p>
			<h3>
				<th data-hide="phone">{{ __('form.date_create') }}: {{ $sale->date_create }}</th>
                - <th data-hide="phone">{{ __('form.date_end') }} {{ $sale->date_end }}</th>
                <div>
					Chỉ còn: {{ $sale->total }} suất
                </div>
			</h3>
			<div>
				{!! $sale->description !!}
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection