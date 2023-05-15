@extends('layouts.web.app')
@section('title')
    {{ @$blogData->seo->seo_title ? @$blogData->seo->seo_title : @$blogData->title }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('web/assets/css/web/blogDetail.css') }}">
@endsection

@section('meta')
@endsection

@section('content')
    <section>
        <div class="blogDetailHeadBanner">
            <img class="imgBannerBlogDetail" data-src="/public/storage/editor/blog/toyota-fortuner.webp"
                alt="{{ @$blogData->title }}"
                src="{{ @$blogData->image ? asset(config('blog.image.path') . $blogData->id . '/' . $blogData->image) : asset('admin/assets/img/no-image.jpeg') }}">
        </div>
    </section>
    <section>
        <div class="blog-detail-wrapper">
            <h1 class="titleText text-center px-3 blogDetailTitle">{{ $blogData->title }}</h1>
            <article class="mx-auto blog-detail-article">
                <div class="infoBox">
                    <div>Biên tập viên: {{ $blogData->user->name }}</div>
                    <div>Ngày đăng: {{ Carbon\Carbon::parse($blogData->created_at)->format('d-m-Y') }}</div>
                </div>
                <div>
                    <div class="short-description">{!! $blogData->description !!}</div>
                </div>

                <div id="post-content">

                    <div class="bg-light py-3 px-3 tableOfContent" id="toc-content" data-bs-toggle="collapse"
                        data-bs-target="#tocAccordion">
                        <div class="mb-0 d-flex justify-content-between align-items-center">
                            <div>
                                <b>Nội dung tiêu điểm:</b>
                            </div>
                            <button class="toc-accordion-btn">
                                <span id="tocText">Thu gọn</span><i class="fa fa-angle-up"></i>
                            </button>

                        </div>
                        <div class="collapse show" id="tocAccordion">
                            <ul data-toc="#post-content" data-toc-headings="h1,h2,h3" id="toc-blog" class="ml-3">
                            </ul>
                        </div>
                    </div>
                    <div class="blogDetailContent">
                        {!! $blogData->content !!}
                    </div>
                </div>
                <div class="d-flex justify-content-center socialBox">
                    <div>
                        <div class="blogDetailShareTitle"> Hãy chia sẻ ngay bài viết hữu ích này nhé! </div>
                        <div class="d-flex justify-content-center blogDetailSocialBox">
                            <div> <a href="https://www.facebook.com/sharer/sharer.php?u=https://hello-xe-local.com.vn/bang-gia-xe-toyota/"
                                    target="_blank"> <img src="{{ asset('web/assets/image/blogDetail/facebook.svg') }}"
                                        alt="">
                                </a> </div>
                            <div> <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://hello-xe-local.com.vn/bang-gia-xe-toyota/"
                                    target="_blank"> <img src="{{ asset('web/assets/image/blogDetail/linkedin.svg') }}"
                                        alt="">
                                </a> </div>
                            <div> <span type="button" data-toggle="tooltip" data-placement="top" title=""
                                    id="copylink" data-original-title="Copy to clipboard"> <img
                                        src="{{ asset('web/assets/image/blogDetail/sharingLink.svg') }}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </section>
    <section class="relatedSection">
        <div class="container">
            <div class="maybeCareTitle text-center titleText">Tham khảo thêm</div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 relatedBox">
                    <a href="#">
                        <div class="post-thumb">
                            <img src="{{ asset('web/assets/image/home/blog.png') }}" alt="">
                        </div>
                        <div>
                            <h3 class="relatedPostTitle">Xuất Hiện Làn Sóng Gom Đất Nền Ven Biển Khi Giá Giảm Mạnh</h3>
                            <div class="relatedPostDesc"> Thực trạng khó khăn của thị trường bất động sản năm 2022 đã khiến
                                thị trường nghỉ dưỡng càng thêm thách thức. Đất nền ven biển có xu hướng giảm giá mạnh. Điểm
                                sáng duy nhất là sức mua tăng, đến từ xu hướng bắt đáy, săn hàng cắt lỗ của những nhà đầu tư
                                trường vốn. </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 relatedBox">
                    <a href="#">
                        <div class="post-thumb">
                            <img src="{{ asset('web/assets/image/home/blog.png') }}" alt="">
                        </div>
                        <div>
                            <h3 class="relatedPostTitle">Xuất Hiện Làn Sóng Gom Đất Nền Ven Biển Khi Giá Giảm Mạnh</h3>
                            <div class="relatedPostDesc"> Thực trạng khó khăn của thị trường bất động sản năm 2022 đã khiến
                                thị trường nghỉ dưỡng càng thêm thách thức. Đất nền ven biển có xu hướng giảm giá mạnh. Điểm
                                sáng duy nhất là sức mua tăng, đến từ xu hướng bắt đáy, săn hàng cắt lỗ của những nhà đầu tư
                                trường vốn. </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 relatedBox">
                    <a href="#">
                        <div class="post-thumb">
                            <img src="{{ asset('web/assets/image/home/blog.png') }}" alt="">
                        </div>
                        <div>
                            <h3 class="relatedPostTitle">Xuất Hiện Làn Sóng Gom Đất Nền Ven Biển Khi Giá Giảm Mạnh</h3>
                            <div class="relatedPostDesc"> Thực trạng khó khăn của thị trường bất động sản năm 2022 đã khiến
                                thị trường nghỉ dưỡng càng thêm thách thức. Đất nền ven biển có xu hướng giảm giá mạnh. Điểm
                                sáng duy nhất là sức mua tăng, đến từ xu hướng bắt đáy, săn hàng cắt lỗ của những nhà đầu tư
                                trường vốn. </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('web/assets/js/toc/jquery.toc.js') }}"></script>
    <script type="text/javascript">
        $("#toc-blog").toc();
    </script>
@endsection
