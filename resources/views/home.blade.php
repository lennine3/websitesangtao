@extends('layouts.web.app')
@section('title')
    {{ @$generals['SHOP']['seo_title'] ? @$generals['SHOP']['seo_title'] : @$generals['SHOP']['web_name'] }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('web/assets/css/home.css') }}">
@endsection

@section('meta')
    @include('meta.home-meta')
@endsection

@section('content')
    <section>
        <div class="bannerContain">
            <div class="backgroundBanner">
                <div class="text-center">
                    <div class="bannerText">
                        <div>
                            THIẾT KẾ WEBSITE
                        </div>
                        <div>
                            CHƯA BAO GIỜ DỄ DÀNG ĐẾN THẾ
                        </div>
                    </div>
                    <button class="bannerBtn btn">Bắt đầu ngay</button>
                </div>
            </div>
            {{-- <img src="{{ asset('web/assets/image/home/banner.png') }}" alt=""> --}}
        </div>
    </section>
    <section class="container homeServiceSection" id="WebsiteDesignService">
        <h2 class="titleText homeServiceHeadTitle"> {{ $webDesignInfo->name }} <br>{{ $webDesignInfo->sub_name }}
        </h2>
        <div class="row">
            @foreach ($designService as $item)
                <div class="col-lg-4 col-md-6 homeServiceDesc">
                    <div class="homeServiceBox">
                        <h3 class="homeServiceBoxTitle"> {{ $item->title }} </h3>
                        <div class="homeServiceBoxDesc">
                            {{ $item->content }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Ui Design --}}
    @include('web.home.uiDesign')

    {{-- Service Benefit --}}
    @include('web.home.serviceBenefit')

    {{-- Service marketing --}}
    @include('web.home.service-marketing')

    <section class="no-horizontal-scroll">
        <div class="row">
            <div class="col-lg-4 seoServiceLeftBg px-0 d-flex col-sm-12">
                <div class="d-flex align-items-center">
                    <div class="seoServiceLeftBox">
                        <h2 class="seoServiceLeftTitle"> Chuyển đổi traffic thành doanh thu </h2>
                        <div class="seoServiceLeftDesc"> Một website thấu hiểu người dùng và đáp ứng được nhu cầu của người
                            dùng, sẽ trở thành một kênh bán hàng trực tuyến tạo ra hiệu quả doanh số bền vững. </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 px-0 col-sm-12">
                <div class="seoServiceVideoContain">
                    <video id="video-player" autoplay muted loop class="videoBanner" loading="lazy">
                        <source src="https://thietkewebsitechuanseo.com/public/storage/videos/1679675048.mp4"
                            type="video/mp4">
                        <source src="https://thietkewebsitechuanseo.com/public/storage/videos/1679675048.mp4"
                            type="video/ogg">
                    </video>
                </div>
            </div>
        </div>
    </section>

    {{-- Pricing section --}}
    @include('web.home.pricingTab')


    {{-- blog marketing --}}
    {{-- @include('web.home.blog-marketing') --}}

    {{-- form --}}
    @include('web.home.form')

    {{-- about us --}}
    <section class="aboutUsSection" id="aboutUsSection">
        <div class="aboutUsContain container">
            <h1 class="titleText text-center">{{ $aboutInfo->name }}</h1>
            <div class="aboutUsBox">
                <div class="descText">
                    {{ $aboutInfo->description }}
                </div>
            </div>
        </div>
    </section>

    {{-- Faq section --}}
    {{-- @include('web.home.faq') --}}
@endsection
@section('script')
    <script src="{{ asset('web/assets/js/home.js') }}"></script>
@endsection
