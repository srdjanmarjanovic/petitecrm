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
    @include('contacts.partials.list')
@endsection