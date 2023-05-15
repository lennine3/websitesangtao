<section id="homeMarketingSection">
    <div class="homeMarketingContainer container">
        <div class=" text-center">
            <div class="d-flex justify-content-center">
                <h2 class="titleText homeMarketingTitle">
                    Đáp ứng nhu cầu thiết kế <br>
                    của doanh nghiệp vừa và nhỏ </h2>
            </div>
            <div class="d-flex justify-content-center">
                <span class="descText homeMarketingDesc"> Lựa chọn thể loại website mà bạn muốn thiết kế, chúng tôi sẽ
                    giúp bạn xây dựng một kênh bán hàng và kênh truyền thông doanh nghiệp đạt hiệu quả cao nhất.
                </span>
            </div>
            <div class="d-flex justify-content-center">
                <hr class="homeMarketingSeparateLine">
            </div>
        </div>
        <div class="row">
            @foreach ($marketingService as $item)
                <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center homeMarketingBoxContain">
                    <div class="homeMarketingBox">
                        <div class="homeMarketingBoxImg">
                            <img src="{{ @$item->image ? asset(config('blog.image.path') . $item->id . '/' . $item->image) : asset('admin/assets/img/no-image.jpeg') }}"
                                alt="{{ $item->title }}" loading="lazy">
                        </div>
                        <div>
                            <h3 class="homeMarketingBoxTitle"> {{ $item->title }} </h3>
                            <div class="homeMarketingBoxDesc"> {!! $item->description !!} </div>
                            <div class="homeMarketingBoxLink">
                                <a target="_blank" href="{{ url($item->slug) }}" class="homeMarketLink">
                                    Bấm vào để xem chi tiết <i class="far fa-chevron-double-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
