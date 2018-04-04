<aside class="col-md-4 hidden-sm hidden-xs shade-1" style="padding: 0;">
    <section class="col-md-12">
        <h4>热门标签</h4>
        <ul class="list-inline">

            @foreach(\App\Models\Tag::select('name','count')->get() as $tag)
            <li class="">
                <a href="">{{ $tag->name }} <small>({{ $tag->count }})</small></a>
            </li>
            @endforeach

        </ul>
    </section>
</aside>