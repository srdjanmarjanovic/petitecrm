@extends('layouts.app')
@section('contentheader_title')
	Companies
@endsection

@section('section-one')
	{{--<ul class="contacts-top-menu list-inline text-right margin-tb-10">--}}
	    {{--<li><a href="#">Advanced search</a></li>--}}
	    {{--<li><a href="{{ route('contacts.import.form') }}">Import</a></li>--}}
	    {{--<li><a href="#">Detect duplicates</a></li>--}}
	</ul>	
@endsection

@section('section-two')
	<div class="col-xs-12 margin-bottom">
		<a href="{{ route('company.create')  }}" class="btn btn-success btn-flat btn-md">
			<i class="fa fa-briefcase" aria-hidden="true"></i> Add Company
		</a>
	</div>
@endsection

@section('main-content')
{{--    @include('contacts.partials.list')--}}
    <div class="col-md-3">
{{--        @include('companies.partials.sidebar-block')--}}
        @include('tags.partials.sidebar-block')
    </div>

{{--    @include('contacts.partials.delete.form', ['backpath' => Request::fullUrl()])--}}
{{--    @include('contacts.partials.delete.confirm')--}}
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        $('.dropdown-toggle').dropdown();
{{--        @include('contacts.partials.delete.js')--}}
    </script>


@endsection