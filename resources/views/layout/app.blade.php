@extends('layout.master')

@section('styles')
@parent
	{!! HTML::style(asset_path('scss/welcome.scss')) !!}
@endsection
