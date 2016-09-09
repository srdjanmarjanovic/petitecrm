@extends('layouts.app')
@section('contentheader_title')
Add new Contact
@endsection

@section('htmlheader')
    <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}">
    @parent
@endsection

@section('main-content')
    <div class="col-xs-8 col-xs-offset-2">
        {{ Form::open(['class' => 'form-horizontal', 'route' => ['contact.save'], 'method' => 'post']) }}
            {!! csrf_field(); !!}

            <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label text-muted">Type</label>
                <div class="col-sm-10">
                    <div class="btn-group btn-options" data-toggle="buttons">
                        <label class="btn btn-default btn-flat {{ (old('type') === 'lead' || empty (old('type'))) ? 'active' : '' }}">
                            {{ Form::radio('type', 'lead', (old('type') === 'lead'), ['autocomplete' => 'off']) }} Lead
                        </label>
                        <label class="btn btn-default btn-flat {{ (old('type') === 'prospect') ? 'active' : ''}}">
                            {{ Form::radio('type', 'prospect', (old('type') === 'prospect'), ['autocomplete' => 'off']) }} Prospect
                        </label>
                        <label class="btn btn-default btn-flat {{ (old('type') === 'customer') ? 'active' : ''}}">
                            {{ Form::radio('type', 'customer', (old('type') === 'customer'), ['autocomplete' => 'off']) }} Customer
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group {{ $errors->has('first_name') || $errors->has('last_name') ? 'has-error' : '' }}">
                <label for="first_name" class="col-sm-2 control-label text-muted">Name</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-xs-4">
                            {{ Form::text('first_name', null, ['class' => 'form-control ', 'id' => 'first_name', 'placeholder' => 'Marco', 'tabindex' => 2]) }}
                        </div>
                        <div class="col-xs-8">
                            {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Polo', 'tabindex' => 3]) }}
                        </div>
                        @if($errors->has('first_name') || $errors->has('last_name'))
                            <div class="col-xs-12">
                                @if($errors->has('first_name'))
                                    <span class="help-block">{{ $errors->first('first_name') }}</span>
                                @endif
                                @if($errors->has('last_name'))
                                    <span class="help-block">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email" class="col-xs-2 control-label text-muted">Email</label>
                <div class="col-xs-10">
                    {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'tabindex' => 4]) }}
                    @if($errors->has('email'))
                        <div class="row">
                            <div class="col-xs-12">
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone" class="col-sm-2 control-label text-muted">Phone</label>
                <div class="col-sm-10">
                    {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => '+381 64 123 456 789', 'tabindex' => 5]) }}
                    @if($errors->has('phone'))
                        <div class="row">
                            <div class="col-xs-12">
                                <span class="help-block">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group  {{ $errors->has('role') ? 'has-error' : '' }}">
                <label for="role" class="col-sm-2 control-label text-muted">Role</label>
                <div class="col-sm-10">
                    {{ Form::text('role', null, ['class' => 'form-control', 'id' => 'role', 'placeholder' => 'Store manager', 'tabindex' => 6]) }}
                    @if($errors->has('role')) 
                        <div class="row">
                            <div class="col-xs-12">
                                <span class="help-block">{{ $errors->first('role') }}</span>
                            </div>
                        </div>
                   @endif
                </div>
            </div>
            
            <div class="form-group">
                <label for="company" class="col-sm-2 control-label text-muted">Company</label>
                <div class="col-sm-4">
                    {{  Form::select('company_id', $companies->lists('name', 'id'), Request::get('company_id'), ['id' =>'company_id', 'placeholder' => '- none -', 'tabindex' => 7, 'class' => 'form-control select2 select2-hidden-accessible']) }}
                </div> 
                 <label for="tags" class="col-sm-1 control-label text-muted">Tags</label>
                <div class="col-sm-5">
                    {{  Form::select('tags', $tags->lists('name', 'id'), null, ['multiple' => 'multiple', 'id' =>'tags', 'name' => 'tags[]' ,'tabindex' => 8, 'class' => 'form-control select2 select2-hidden-accessible']) }}
                </div>               
            </div>

            <div class="form-group">
                <label for="notes" class="col-sm-2 control-label text-muted">Notes</label>

                <div class="col-sm-10">
                    {{ Form::textarea('notes', null, ['class' => 'form-control', 'id' => 'notes', 'placeholder' => 'Notes about this contact...', 'tabindex' => 9]) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-0 col-sm-offset-6 col-xs-12 col-sm-3 col-md-offset-8 col-lg-offset-8 col-md-2 col-lg-2">
                    <button tabindex="8" type="button" onclick="window.history.back();" class="btn btn-default btn-block btn-flat btn-sm">Cancel</button>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                    <button tabindex="8" type="submit" class="btn btn-block btn-flat btn-primary btn-sm"><i class="fa fa-check"></i> Done</button>
                </div>
            </div>

        {{ Form::close() }}
    </div>
@endsection

@section('scripts')
    @parent
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>

    <script>
        $(function() {
            $(".select2").select2({
                allowClear: true,
                width: '100%',
                placeholder: "- select -",
                tags: true
            });
        });
    </script>
@endsection
