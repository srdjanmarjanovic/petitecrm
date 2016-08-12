@extends('layouts.app')
@section('contentheader_title')
@endsection

@section('section-one')
	<ul class="contacts-top-menu list-inline text-right margin-tb-10">
	    <li><a href="{{ route('contact.edit', $contact->id) }}"><i class="fa fa-pencil"></i> Edit</a></li>
	    <li><a  data-toggle="modal" data-target="#delete-confirm" href="#" class="text-danger remove-contact"><i class="fa fa-trash-o"></i> Delete</a></li>
	</ul>	
@endsection

@section('main-content')
    @include('contacts.partials.profile', compact('contact'))
    @include('contacts.partials.delete-confirm')
@endsection