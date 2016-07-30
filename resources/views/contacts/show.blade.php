@extends('layouts.app')
@section('contentheader_title')
Contacts
@endsection
@section('main-content')
    @include('contacts.partials.profile', compact('contact'))
@endsection