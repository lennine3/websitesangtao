<section class="container blogContainer blogContain" id="blogMarketing">
    <h2 class="titleText blogHeadTitle">Blog marketing </h2>
    <div class="descText"> Chia sẻ kinh nghiệm chọn mua xe ô tô và hướng dẫn cách chăm sóc xế yêu của bạn </div>
    <div class="blogContainBox">
        <div class="blog-slider">
            @foreach ($marketingBlog as $item)
                <div class="blogContainMobile">
                    <a href="{{ url($item->slug) }}">
                        <div class="blogBox">
                            <img src="{{ @$item->image ? asset(config('blog.image.path') . $item->id . '/' . $item->image) : asset('admin/assets/img/no-image.jpeg') }}"
                                alt="{{ $item->title }}" loading="lazy">
                        </div>
                        <div class="blogTitle"> {{ $item->title }} </div>
                        <div class="blogSubTitle">{!! $item->description !!}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
