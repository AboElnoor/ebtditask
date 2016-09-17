@extends('layouts.app')

@if($product)
	@section('title', '- '.$product->name)

	@section('content')
			<div class="featurette" id="about">
			    <img class="featurette-image img-circle img-responsive pull-right" src="{{ url($product->image) }}" height="500" width="500" alt="{{ $product->name }}" />
			    <h2 class="featurette-heading"><a href="{{ url('/product/'.$product->id) }}">{{ $product->name }}</a> 
			        <h5 class="text-muted">By {{ $product->user->name }}</h5>
			    </h2>
			    <p class="lead">
			    	{{ $product->description }}
			    </p>
			</div>
	@endsection
@endif
