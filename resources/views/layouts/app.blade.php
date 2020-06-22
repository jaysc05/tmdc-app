@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
	
	@if (session('success'))
    	<div class="alert alert-success">
    	    {{ session('success') }}
    </div>
	@endif

	@if (session('error'))
    	<div class="alert alert-warning">
    	    {{ session('error') }}
    </div>
	@endif

    <h1>{{ $title }}</h1>
@stop

@section('content')
    @yield('content')
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
@stop