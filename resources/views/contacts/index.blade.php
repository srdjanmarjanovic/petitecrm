@extends('layouts.app')
@section('contentheader_title')
Contacts
@endsection

@section('context_menu')
    <ul class="context_menu">
        <li><a href="#">Advanced search</a></li>
    </ul>
@endsection

@section('main-content')
    {{--@foreach($contacts as $contact)--}}
        @include('contacts.partials.card', compact('contact'))
    {{--@endforeach--}}
@endsection