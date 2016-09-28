@extends('layouts.app')
@section('contentheader_title')
	Companies
@endsection

@section('section-one')
    <ul class="contacts-top-menu list-inline text-right margin-tb-10">
        <li><a href="{{ route('industries.all') }}">Manage Industries</a></li>
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
    @include('companies.partials.list')
    <div class="col-md-3">
        @include('industries.partials.sidebar-block')
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