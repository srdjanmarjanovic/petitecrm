@extends('layouts.app')

@section('contentheader_title')
{{ $company->name }}
@endsection

@section('section-one')
	<ul class="companies-top-menu list-inline text-right margin-tb-10">
	    <li><a href="{{ route('company.edit', $company->id) }}"><i class="fa fa-pencil"></i> Edit</a></li>
	    <li><a data-toggle="modal" data-target="#delete-confirm" data-back="{{ URL::previous() }}"  data-action="{{ route('company.delete', $company->id) }}"  href="#" class="text-danger remove-company"><i class="fa fa-trash-o"></i> Delete</a></li>
	</ul>	
@endsection

@section('main-content')
    @include('companies.partials.profile')
    @include('partials.delete.form', ['backpath' => URL::previous() ?: route('companies.all')])
    @include('partials.delete.confirm')
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        $('.dropdown-toggle').dropdown();
        @include('partials.delete.js')
    </script>
@endsection