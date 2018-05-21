<aside class="col-md-4 hidden-sm hidden-xs shade-1" style="padding: 0;">
    <section class="col-md-12">
        <h4>热门标签</h4>
        <ul class="list-inline">

            @foreach(\App\Models\Tag::select('name','article_num','id')->orderBy('article_num','desc')->get() as $tag)
            <li class="">
                <a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }} <small>({{ $tag->article_num }})</small></a>
            </li>
            @endforeach

        </ul>
    </section>
</aside>