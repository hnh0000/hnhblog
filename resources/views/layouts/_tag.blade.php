<section class="col-md-12">
    <h4>热门标签</h4>
    <ul class="list-inline">

        @foreach($tags as $tag)
            <li class="{{ active_class(if_route_param('tag',$tag->id)) }}">
                <a  href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}
                    <small>({{ $tag->articles_count }})</small>
                </a>
            </li>
        @endforeach

    </ul>
</section>
