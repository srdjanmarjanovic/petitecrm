<div class="col-md-9">
    <div class="box box-solid">
        <div class="box-header with-border">
          <form action="#" method="get">
              <div class="input-group">
                  <input class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}" type="text" name="q" id="q">
                  <span class="input-group-btn">
                    <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
              </div>
          </form>

            @if($contacts->count())
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-flat btn-default btn-xs checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="pull-right">
                        {!! $contacts->firstItem() .' - '. $contacts->lastItem() !!}/{!! $contacts->total() !!} results
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
                    <td><div aria-disabled="false" aria-checked="false" style="position: relative;" class="icheckbox_flat-blue"><input style="position: absolute; opacity: 0;" type="checkbox"><ins style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" class="iCheck-helper"></ins></div></td>
                    <td class="mailbox-star" title="{{ $contact->type }}"><i class="fa {{ $contact->getTypeClass() }} text-yellow"></i></td>
                    <td class="mailbox-name">
                        <a href="{{ route('contact.single', ['id' => $contact->id]) }}">
                            {{ $contact->getDisplayName() }}
                        </a>
                    </td>
                    <td class="mailbox-subject">
                        {{ $contact->email }}
                    </td>
                    <td class="mailbox-subject">
                        @if($contact->company)
                            {{ $contact->company->name }}
                        @endif
                    </td>
                    <td class="mailbox-date text-muted text-right" title="{{ $contact->created_at }}"><small>{{ $contact->created_at->diffForHumans() }}</small></td>
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
                        {!! $contacts->firstItem() .' - '. $contacts->lastItem() !!}/{!! $contacts->total() !!} results
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
<!-- /.col -->
<div class="col-md-3">
    <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Companies</h3>

          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            @foreach($companies as $company)
                <li><a href="?company={{ $company->id }}">{{ $company->name }} <span class="label label-primary pull-right">{{ count($company->contacts) }}</span></a></li>
            @endforeach
            <li><a href="#">Other ...</a></li>
          </ul>
        </div>
    <!-- /.box-body -->
    </div>
  <!-- /.box -->
  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Tags</h3>

      <div class="box-tools">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body no-padding">
      <ul class="nav nav-pills nav-stacked">
        @foreach($tags as $tag)
            <li><a href="#">{{ $tag->name }} <span class="label label-primary pull-right">{{ count($tag->contacts) }}</span></a></li>
        @endforeach
      </ul>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>