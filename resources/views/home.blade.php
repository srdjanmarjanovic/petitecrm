@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    DASHBOARD
@endsection


@section('main-content')
	@if($loggedIn)
		Hello {{ $user->name }}!
	@else
		Mrka kapa mili moj
	@endif
@endsection
