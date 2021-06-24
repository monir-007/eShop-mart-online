@php
    $tagsEng = App\Models\Product::groupBy('tags_eng')->select('tags_eng')->get();
    $tagsBng = App\Models\Product::groupBy('tags_bng')->select('tags_bng')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(session()->get('language') === 'bangla')
                @foreach($tagsBng as $tag)
                        <a class="item active" href="{{url('product/tag/'.$tag->tags_bng)}}">{{ str_replace(',',' ',$tag->tags_bng) }}</a>
                    @endforeach
            @else
                @foreach($tagsEng as $tag)
                    <a class="item active" href="{{url('product/tag/'.$tag->tags_eng)}}">{{ str_replace(',',' ',$tag->tags_eng) }}</a>
                @endforeach
            @endif
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>

