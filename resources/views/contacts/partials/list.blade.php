<div class="col-md-9">
    <div class="box box-solid">
        <div class="box-header">
            @if($contacts->count())
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-flat btn-default btn-xs checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="pull-right">
                        <small class="text-muted">{!! $contacts->firstItem() .' - '. $contacts->lastItem() !!}/{!! $contacts->total() !!} results</small>

                        @if ($contacts->hasMorePages() || $contacts->previousPageUrl())
                            @include('contacts.partials.pagination.btns')
                        @endif
                    </div>
                    <!-- /.pull-right -->
                </div>
            @endif
        </div>
        <!-- /.box-header -->

        <div class="box-body">
          <div class="table-responsive mailbox-messages">
            <table class="table">
              <tbody>
              @if($contacts->count())
                @foreach($contacts as $contact)
                  <tr>
                    <td class="mailbox-star">
                        <input type="checkbox" value="{{ $contact->id }}" name="bulkcontacts[]"><span>&nbsp;</span>
                    </td>
                    {{--<td><div aria-disabled="false" aria-checked="false" style="position: relative;" class="icheckbox_flat-blue"><input style="position: absolute; opacity: 0;" type="checkbox"><ins style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" class="iCheck-helper"></ins></div></td>--}}
                    {{--<td class="mailbox-star" title="{{ $contact->type }}"><i class="fa {{ $contact->getTypeClass() }} text-yellow"></i></td>--}}
                    <td class="mailbox-name">
                        <small class="type-control"><i class="fa {{ $contact->getTypeClass() }}" title="{{ ucfirst($contact->type) }}"></i></small>
                        <a href="{{ route('contact.single', ['id' => $contact->id])}}">
                            {{ $contact->getDisplayName() }}
                        </a>
                        @if($contact->getRoleInCompany())
                            <div>
                                  <small class="text-muted">
                                     {{ $contact->getRoleInCompany() }}
                                  </small>
                            </div>
                         @endif

                    </td>
                    <td class="mailbox-subject">
                        {{ $contact->email }}
                    </td>
                    <td class="mailbox-subject">

                    </td>
                    <td class="mailbox-date text-muted text-right" title="{{ $contact->updated_at }}"><small>{{ $contact->updated_at->diffForHumans() }}</small></td>
                    <td>
                        <div class="dropdown context-menu">
                            <a class="label" id="dLabel" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-ellipsis-h text-muted"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>Send e-mail</a></li>
                                <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>Call</a></li>
                                <li><a href="#"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>Send SMS</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('contact.edit', $contact->id) }}"><i class="fa fa-pencil"></i> Edit</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#delete-confirm" data-action="{{ route('contact.delete', $contact->id) }}"><i class="fa fa-trash-o"></i> Delete</a></li>
                            </ul>
                        </div>
                    </td>   
                  </tr>
                @endforeach
              @else
                <p class="text-muted">You have no contacts at this moment. Why not <a href="{{ route('contact.create') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> add your first contact</a>?</p>
              @endif
              </tbody>
            </table>
            <!-- /.table -->
          </div>
          <!-- /.mail-box-messages -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            @if($contacts->count())
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-xs checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i></button>
                    </div>

                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-refresh"></i></button>
                    <!-- /.btn-group -->
                    <div class="pull-right">
                        <small class="text-muted">{!! $contacts->firstItem() .' - '. $contacts->lastItem() !!}/{!! $contacts->total() !!} results</small>
                        @if ($contacts->hasMorePages() || $contacts->previousPageUrl())
                            @include('contacts.partials.pagination.btns')
                        @endif
                    </div>
                    <!-- /.pull-right -->
                </div>
            @endif
        </div>
    </div>
  <!-- /. box -->
</div>