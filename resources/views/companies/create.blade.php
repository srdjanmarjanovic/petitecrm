@extends('layouts.app')
@section('contentheader_title')
Add new Company
@endsection

@section('htmlheader')
    <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}">
    @parent
@endsection

@section('main-content')
    <div class="col-xs-8 col-xs-offset-2">
        {{ Form::open(['class' => 'form-horizontal', 'route' => ['contact.save'], 'method' => 'post']) }}
            {!! csrf_field(); !!}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name" class="col-sm-2 control-label text-muted">Name</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-xs-12">
                            {{ Form::text('name', null, ['class' => 'form-control ', 'id' => 'name', 'placeholder' => 'SuperCool inc.', 'tabindex' => 2]) }}
                        </div>
                        <div class="col-xs-12">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label text-muted">Email</label>
                <div class="col-sm-10">
                    {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'tabindex' => 4]) }}
                </div>
            </div>

            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label text-muted">Phone</label>

                <div class="col-sm-10">
                    {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => '+381 64 123 456 789', 'tabindex' => 5]) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label text-muted">Tags</label>
                <div class="col-sm-10">
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
