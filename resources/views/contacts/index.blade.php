@extends('layouts.app')
@section('contentheader_title')
Contacts
@endsection

@section('section-one')
	<ul class="contacts-top-menu list-inline text-right margin">
	    <li><a href="#">Advanced search</a></li>
	    <li><a href="{{ route('contacts.import.form') }}">Import</a></li>
	    <li><a href="#">Detect duplicates</a></li>
	</ul>	
@endsection

@section('section-two')
	<div class="col-xs-12 margin-bottom">
		<a href="{{ route('contact.create')  }}" class="btn btn-success btn-flat btn-md">
			<i class="fa fa-user-plus" aria-hidden="true"></i> Add Contact
		</a>
	</div>
@endsection

@section('main-content')
    @include('contacts.partials.list')
@endsection