@extends('layouts.app')
@section('contentheader_title')
Add new Contact
@endsection

@section('main-content')
<div class="col-xs-8 col-xs-offset-2">
    <form class="form-horizontal" action="{{ route('contact.save') }}" method="POST">
        {!! csrf_field(); !!}

        <div class="form-group">
            <label for="first_name" class="col-sm-2 control-label text-muted">Type</label>
            <div class="col-sm-4">
                <select name="type" tabindex="1" class="form-control select2 select2-hidden-accessible" data-placeholder="Select type of contact">
                    <option value="lead">Lead</option>
                    <option value="prospect">Prospect</option>
                    <option value="customer">Customer</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="first_name" class="col-sm-2 control-label text-muted">Name</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-xs-4">
                        <input tabindex="1" class="form-control" name="first_name" id="first_name" placeholder="Marco" type="text">
                    </div>
                    <div class="col-xs-8">
                        <input tabindex="2" class="form-control" name="last_name" id="last_name" placeholder="Polo" type="text">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-2 control-label text-muted">Email</label>
            <div class="col-sm-10">
                <input tabindex="3" class="form-control" name="email" id="email" placeholder="marco@polo.com" type="email">
            </div>
        </div>

        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label text-muted">Phone</label>

            <div class="col-sm-10">
                <input tabindex="4" class="form-control" name="phone" id="phone" placeholder="+381 64 123 456 789" type="text">
            </div>
        </div>

        <div class="form-group">
            <label for="company" class="col-sm-2 control-label text-muted">Company</label>

            <div class="col-sm-4">
                <select name="company_id" tabindex="5" class="form-control select2 select2-hidden-accessible" data-placeholder="Select a company">
                    <option value="">- none -</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <label for="company" class="col-sm-1 control-label text-muted">Role</label>
            <div class="col-sm-5">
                <input tabindex="6" class="form-control" name="role" id="position" placeholder="Store manager" type="text">
            </div>
        </div>

        <div class="form-group">
            <label for="inputSkills" class="col-sm-2 control-label text-muted">Tags</label>

            <div class="col-sm-10">
                <input tabindex="7" class="form-control" name="tags" id="tags" placeholder="Tags" type="text">
            </div>
        </div>


        <div class="form-group">
            <label for="notes" class="col-sm-2 control-label text-muted">Notes</label>

            <div class="col-sm-10">

                <textarea tabindex="8" class="form-control" name="notes" id="notes" placeholder="Notes about contact"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-9 col-sm-offset-10 col-xs-3 col-sm-2">
                <button tabindex="8" type="submit" class="btn btn-block btn-primary btn-sm">Create</button>
            </div>
        </div>

    </form>
</div>
@endsection
