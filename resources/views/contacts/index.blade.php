@extends('layouts.app')
@section('contentheader_title')
Contacts
@endsection

@section('context_menu')
    <ul class="context_menu">
        <li><a href="#">Advanced search</a></li>
        <li><a href="{{ route('contacts.import.form') }}">Import</a></li>
        <li><a href="#">Detect duplicates</a></li>
    </ul>
@endsection

@section('main-content')
    @include('contacts.partials.list')
@endsection