<div class="modal" id="delete-confirm" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete {{ str_singular($context) }}</h4>
      </div>
      <div class="modal-body">
        <small class="text-muted">This action can not be undone!</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-default btn-flat" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-sm btn-danger btn-confirm btn-flat">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->