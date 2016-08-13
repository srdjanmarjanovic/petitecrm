@extends('layouts.app')
@section('contentheader_title')
@endsection

@section('section-one')
	<ul class="contacts-top-menu list-inline text-right margin-tb-10">
	    <li><a href="{{ route('contact.edit', $contact->id) }}"><i class="fa fa-pencil"></i> Edit</a></li>
	    <li><a  data-toggle="modal" data-target="#delete-confirm" href="#" class="text-danger remove-contact"><i class="fa fa-trash-o"></i> Delete</a></li>
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
            var $modal =  me;

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : token }
            });

            $(this).find('.btn-confirm').on('click', function(e) {
                var btn_confirm = $(this);
                var path = btn_confirm.data('action');

                btn_confirm.addClass('disabled');

                $.ajax({
                    url: path,
                    type: 'DELETE'
                }).done(function(data) {
                    $modal.modal('hide');
                }).fail(function(data) {
                    console.log('Nay :/');
                }).always(function(data) {
                    btn_confirm.removeClass('disabled');
                });
            });
        });
    </script>
@endsection