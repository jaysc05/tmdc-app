@extends('layouts.app')

@section('content')
	<div id="app">
    	@foreach($users as $user)
    		{{ $user->created_at }}
    		<br>
    	@endforeach
	</div>
@endsection