@extends('layouts.app')
@section('contentheader_title')
Edit {{ $contact->getDisplayName() }}
@endsection

@section('htmlheader')
    <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}">
    @parent
@endsection

@section('main-content')
    <div class="col-xs-8 col-xs-offset-2">
        {{ Form::model($contact, ['class' => 'form-horizontal', 'route' => ['contact.update', $contact->id], 'method' => 'put']) }}

            <input name="_back" type="hidden" value="{{ URL::previous() }}"/>
            <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label text-muted">Type</label>
                <div class="col-sm-10">
                    <div class="btn-group btn-options" data-toggle="buttons">
                        <label class="btn btn-default btn-flat {{ ($contact->type === 'lead') ? 'active' : '' }}">
                            {{ Form::radio('type', 'lead', ($contact->type === 'lead'), ['autocomplete' => 'off']) }} Lead
                        </label>
                        <label class="btn btn-default btn-flat {{ ($contact->type === 'prospect') ? 'active' : ''}}">
                            {{ Form::radio('type', 'prospect', ($contact->type === 'prospect'), ['autocomplete' => 'off']) }} Prospect
                        </label>
                        <label class="btn btn-default btn-flat {{ ($contact->type === 'customer') ? 'active' : ''}}">
                            {{ Form::radio('type', 'customer', ($contact->type === 'customer'), ['autocomplete' => 'off']) }} Customer
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
                        <div class="col-xs-12">
                            @if($errors->has('first_name'))
                                <span class="help-block">{{ $errors->first('first_name') }}</span>
                            @endif
                            @if($errors->has('last_name'))
                                <span class="help-block">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group {{ $errors->has('email') }}">
                <label for="email" class="col-sm-2 control-label text-muted">Email</label>
                <div class="col-sm-10">
                    {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'tabindex' => 4]) }}
                    @if($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label text-muted">Phone</label>

                <div class="col-sm-10">
                    {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => '+381 64 123 456 789', 'tabindex' => 5]) }}
                </div>
            </div>

            <div class="form-group">
                <label for="company" class="col-sm-2 control-label text-muted">Company</label>
                <div class="col-sm-4">
                    {{  Form::select('company_id', $companies->lists('name', 'id'), null, ['id' =>'company_id', 'placeholder' => '- none -', 'tabindex' => 6, 'class' => 'form-control select2 select2-hidden-accessible']) }}
                </div>

                <label for="company" class="col-sm-1 control-label text-muted">Role</label>
                <div class="col-sm-5">
                    {{ Form::text('role', null, ['class' => 'form-control', 'id' => 'role', 'placeholder' => 'Store manager', 'tabindex' => 7]) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label text-muted">Tags</label>
                <div class="col-sm-10">
                    {{  Form::select('tags', $tags->lists('name', 'id'), $contact->tags->pluck('id')->all(), ['multiple' => 'multiple', 'id' =>'tags', 'name' => 'tags[]' ,'tabindex' => 8, 'class' => 'form-control select2 select2-hidden-accessible']) }}
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

        </form>
    </div>
{{ Form::close() }}
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
                placeholder: "- select -"
            });

            $("#tags").select2({
                tags: true,
                width: '100%',
                allowClear: true,
                placeholder: "- select -"
            });
        });
    </script>
@endsection
