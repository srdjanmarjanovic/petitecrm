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
            @if(Request::is('contacts/company/' . $company->id))
                <li class="active"><a href="{{ route('contacts.all') }}">{{ $company->name }} <span class="label label-primary pull-right">{{ count($company->contacts) }}</span></a></li>
            @else
                <li><a href="{{ route('company_contacts', $company->id) }}">{{ $company->name }} <span class="label label-primary pull-right">{{ count($company->contacts) }}</span></a></li>
            @endif
        @endforeach
      </ul>
    </div>
</div>