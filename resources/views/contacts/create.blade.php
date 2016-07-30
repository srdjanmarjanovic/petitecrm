@extends('layouts.app')
@section('contentheader_title')
Contacts
@endsection

@section('main-content')
<div class="col-xs-4 ">
    <form action="{{ route('contact.save') }}" method="POST">
        {{ csrf_field() }}
        <div class="input-group">
            <span class="input-group-addon"><i class="material-icons md-18">face</i></span>
            <input class="form-control" placeholder="Name" type="text">
        </div>

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input class="form-control" placeholder="Email" type="email">
        </div>

        <button class="btn btn-primary"><i class="fa fa-ok"></i>Save</button>
    </form>
</div>
@endsection
