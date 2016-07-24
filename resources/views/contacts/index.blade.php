@extends('layouts.app')
@section('contentheader_title')
Contacts
@endsection

@section('main-content')
    {{--@foreach($contacts as $contact)--}}
        @include('contacts.partials.card', compact('contact'))
    {{--@endforeach--}}
@endsection