<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Tags</h3>
        <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
        @foreach($tags as $tag)
            @if(Request::is('contacts/tag/' . $tag->id))
                <li class="active"><a href="{{ route('contacts.all') }}">{{ $tag->name }} <span class="label label-primary pull-right">{{ count($tag->contacts) }}</span></a></li>
            @else
                <li><a href="{{ route('tag_contacts', $tag->id) }}">{{ $tag->name }} <span class="label label-primary pull-right">{{ count($tag->contacts) }}</span></a></li>
            @endif
        @endforeach
        </ul>
    </div>
</div>