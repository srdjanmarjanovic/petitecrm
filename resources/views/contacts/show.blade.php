@extends('layouts.app')
@section('contentheader_title')
{{ $contact->getDisplayName() }}
@endsection

@section('section-one')
	<ul class="contacts-top-menu list-inline text-right margin-tb-10">
	    <li><a href="{{ route('contact.edit', $contact->id) }}"><i class="fa fa-pencil"></i> Edit</a></li>
	    <li><a data-toggle="modal" data-target="#delete-confirm" data-back="{{ URL::previous() }}"  data-action="{{ route('contact.delete', $contact->id) }}"  href="#" class="text-danger remove-contact"><i class="fa fa-trash-o"></i> Delete</a></li>
	</ul>	
@endsection

@section('main-content')
    @include('contacts.partials.profile', compact('contact'))
    @include('contacts.partials.delete-confirm', compact('contact'))
@endsection

@section('scripts')
    @parent
    <script>
        $('#delete-confirm').on('show.bs.modal', function(me) {
            var token = '{!! csrf_token()  !!}';
            var path = $(me.relatedTarget).data('action');

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : token }
            });

            $(this).find('.btn-confirm').on('click', function(e) {
                var btn_confirm = $(this);
                btn_confirm.addClass('disabled');

                $.ajax({
                    url: path,
                    type: 'DELETE'
                }).done(function(data) {
                    $('#delete-confirm').modal('hide');
                }).fail(function(data) {
                    $('#delete-confirm .modal-body').text('<p class="text-error lead">There was an error while performing this action:</p>' + '<p>' + data + '</p>');
                }).always(function(data) {
                    btn_confirm.removeClass('disabled');
                });
            });
        });
    </script>
@endsection