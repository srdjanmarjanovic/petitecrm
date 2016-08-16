$('#delete-confirm').on('show.bs.modal', function(me) {
    var trigger = $(me.relatedTarget);
    var path = trigger.data('action');

    $(this).find('.btn-confirm').on('click', function(e) {
        var btn_confirm = $(this);
        var form = $('#delete-form');

        btn_confirm.addClass('disabled');

        form.attr('action', path);
        form.submit();
    });
});