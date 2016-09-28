<div class="box box-solid sidebar-block">
    <div class="box-header with-border">
      <h3 class="box-title">Industries</h3>

      <div class="box-tools">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body no-padding">
      <ul class="nav nav-pills nav-stacked">
        @foreach($industries as $industry)
            @if(Request::is('companies/industry/' . $industry->id))
                <li class="active"><a href="{{ route('companies.all') }}">{{ $industry->name }} <span class="label label-primary pull-right">{{ count($industry->companies) }}</span></a></li>
            @else
                <li><a href="{{ route('industry_companies', $industry->id) }}">{{ $industry->name }} <span class="label label-primary pull-right">{{ count($industry->companies) }}</span></a></li>
            @endif
        @endforeach
          @if(Request::is('companies/industry/none'))
            <li class="active"><a href="{{ route('companies.all') }}"><em>Without industry</em> <span class="label label-primary pull-right">{{ $no_industry_count }}</span></a></li>
          @else
            <li><a href="{{ route('no_industry_companies') }}"><em>Without industry</em> <span class="label label-primary pull-right">{{ $no_industry_count }}</span></a></li>
          @endif
      </ul>
    </div>
</div>