<div class="box box-solid sidebar-block">
    <div class="box-header with-border">
        <h3 class="box-title">Filter by tag</h3>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            @foreach($tags as $tag)
                @if(Request::is("{$context}/tag/{$tag->id}"))
                    <li class="active"><a href="{{ route("{$context}.all") }}">{{ $tag->name }} <span class="label label-primary pull-right">{{ count($tag->{$context}) }}</span></a></li>
                @else
                    <li><a href="{{ route("tag_{$context}", $tag->id) }}">{{ $tag->name }} <span class="label label-primary pull-right">{{ count($tag->{$context}) }}</span></a></li>
                @endif
            @endforeach
            @if(Request::is("{$context}/tag/none"))
                <li class="active"><a href="{{ route("{$context}.all") }}"><em>Without tags</em> <span class="label label-primary pull-right">{{ $no_tag_count }}</span></a></li>
            @else
                <li><a href="{{ route("no_tag_{$context}") }}"><em>Without tags</em> <span class="label label-primary pull-right">{{ $no_tag_count }}</span></a></li>
            @endif
        </ul>
    </div>
</div>