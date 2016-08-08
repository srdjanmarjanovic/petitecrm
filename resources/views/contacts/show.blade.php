@extends('layouts.app')
@section('contentheader_title')
@endsection

@section('section-one')
	<ul class="contacts-top-menu list-inline text-right margin-tb-10">
	    <li><a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-flat btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a></li>
	    <li><a href="#" class="btn btn-flat btn-danger btn-xs remove-contact"><i class="fa fa-trash-o"></i> Delete</a></li>
	</ul>	
@endsection

@section('main-content')
    @include('contacts.partials.profile', compact('contact'))
@endsection