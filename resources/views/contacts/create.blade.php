@extends('layouts.app')
@section('contentheader_title')
Contacts
@endsection

@section('main-content')
<div class="col-xs-8 col-xs-offset-2">
    <form class="form-horizontal">

        <div class="form-group">
            <label for="first_name" class="col-sm-2 control-label text-muted">Name</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-xs-4">
                        <input class="form-control" id="first_name" placeholder="Marco" type="text">
                    </div>
                    <div class="col-xs-8">
                        <input class="form-control" id="last_name" placeholder="Polo" type="text">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-2 control-label text-muted">Email</label>
            <div class="col-sm-10">
                <input class="form-control" id="email" placeholder="marco@polo.com" type="email">
            </div>
        </div>

        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label text-muted">Phone</label>

            <div class="col-sm-10">
                <input class="form-control" id="inputName" placeholder="+381 64 123 456 789" type="text">
            </div>
        </div>

        <div class="form-group">
            <label for="inputSkills" class="col-sm-2 control-label text-muted">Skills</label>

            <div class="col-sm-10">
                <input class="form-control" id="inputSkills" placeholder="Skills" type="text">
            </div>
        </div>


        <div class="form-group">
            <label for="notes" class="col-sm-2 control-label text-muted">Notes</label>

            <div class="col-sm-10">
                <textarea class="form-control" id="notes" placeholder="Notes about contact"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-9 col-sm-offset-10 col-xs-3 col-sm-2">
                <button type="submit" class="btn btn-block btn-primary btn-sm">Create</button>
            </div>
        </div>

    </form>
</div>
@endsection
