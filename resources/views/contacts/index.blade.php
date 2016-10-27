@extends('layouts.app')
@section('contentheader_title')
	Contacts
@endsection

@section('section-one')
	<ul class="contacts-top-menu list-inline text-right margin-tb-10">
        <li>
            <div class="dropdown">
              <a class="dropdown-toggle"id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="caret"></span>
                Quick List
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#">Leads</a></li>
                <li><a href="#">Prospects</a></li>
                <li><a href="#">Customers</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Recently created</a></li>
                <li><a href="#">Recently contacted</a></li>
                <li><a href="#">Never contacted</a></li>
              </ul>
            </div>
        </li>
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
    <div class="col-md-3">
        @include('companies.partials.sidebar-block')
        @include('tags.partials.sidebar-block')
    </div>

    @include('partials.delete.form', ['backpath' => Request::fullUrl()])
    @include('partials.delete.confirm')
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        $('.dropdown-toggle').dropdown();
        @include('partials.delete.js')
    </script>


@endsection