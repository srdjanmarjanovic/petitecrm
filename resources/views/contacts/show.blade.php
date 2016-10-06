@extends('layouts.app')
@section('contentheader_title')
{{ $contact->present()->displayName }}
@endsection

@section('section-one')
	<ul class="contacts-top-menu list-inline text-right margin-tb-10">
	    <li><a href="{{ route('contact.edit', $contact->id) }}"><i class="fa fa-pencil"></i> Edit</a></li>
	    <li><a data-toggle="modal" data-target="#delete-confirm" data-back="{{ URL::previous() }}"  data-action="{{ route('contact.delete', $contact->id) }}"  href="#" class="text-danger remove-contact"><i class="fa fa-trash-o"></i> Delete</a></li>
	</ul>	
@endsection

@section('main-content')
    @include('contacts.partials.profile')
    @include('partials.delete.form', ['backpath' => URL::previous()])
    @include('partials.delete.confirm')
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        $('.dropdown-toggle').dropdown();
        @include('partials.delete.js')
    </script>
@endsection