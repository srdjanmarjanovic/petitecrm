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