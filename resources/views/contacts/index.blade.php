@extends('layouts.app')
@section('contentheader_title')
	Contacts
@endsection

@section('section-one')
	<ul class="contacts-top-menu list-inline text-right margin-tb-10">
	    <li><a href="#">Advanced search</a></li>
	    <li><a href="{{ route('contacts.import.form') }}">Import</a></li>
	    <li><a href="#">Detect duplicates</a></li>
	</ul>	
@endsection

@section('section-two')
	<div class="col-xs-12 margin-bottom">
		<a href="{{ route('contact.create')  }}" class="btn btn-success btn-flat btn-md">
			<i class="fa fa-user-plus" aria-hidden="true"></i> Add Contact
		</a>
	</div>
@endsection

@section('main-content')
    @include('contacts.partials.list')
    @include('contacts.partials.delete-confirm')
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        $('.dropdown-toggle').dropdown();

        $('#delete-confirm').on('show.bs.modal', function(me) {
            var token = '{!! csrf_token()  !!}';
            var trigger = $(me.relatedTarget);
            var path = trigger.data('action');

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : token }
            });

            $(this).find('.btn-confirm').on('click', function(e) {
                trigger.closest('tr').hide();
                var btn_confirm = $(this);
                btn_confirm.addClass('disabled');


                $.ajax({
                    url: path,
                    type: 'DELETE'
                }).done(function(data) {
                    $('#delete-confirm').modal('hide');
                    $.notify({
                        title: '<strong>Success!</strong>',
                        message: data
                    },{
                        type: 'success',
                        onClosed: function() {
                            window.location = trigger.data('back');
                        }
                    });
                }).fail(function(data) {
                    trigger.closest('tr').show();
                    $('#delete-confirm').modal('hide');

                    $.notify({
                        title: '<strong>😞 Bummer,something went wrong</strong>',
                        message: data
                    },{
                        type: 'danger'
                    });
                }).always(function(data) {
                    btn_confirm.removeClass('disabled');
                });
            });
        });
    </script>

@endsection