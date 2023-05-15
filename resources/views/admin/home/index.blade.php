@extends('layouts.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/home/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/src/splide/splide.min.css') }}">

    {{-- dark --}}
    <link rel="stylesheet" href="{{ asset('admin/plugins/css/dark/splide/custom-splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/css/light/splide/custom-splide.min.css') }}">
@endsection
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12">
                <div>
                    <div class="text-center">
                        <h3>About</h3>
                    </div>
                    <div class="row mb-4">
                        @include('admin.home.about.aboutInfo')
                    </div>
                </div>
                {{-- Web design --}}
                <div>
                    <div class="text-center">
                        <h3>Web Design</h3>
                    </div>
                    <div class="row mb-4">
                        @include('admin.home.webDesign.webDesignInfo')
                        @foreach ($designService as $item)
                            @include('admin.home.webDesign.webDesignService')
                        @endforeach
                    </div>
                </div>

                {{-- Ui Design --}}
                <div>
                    <div class="text-center">
                        <h3>Giao diện trang web</h3>
                    </div>
                    <div class="row mb-4">
                        @include('admin.home.UiDesign.UiDesignInfo')
                        @include('admin.home.UiDesign.UiDesign')
                        @include('admin.home.UiDesign.UiDesignList')
                    </div>
                </div>
                {{-- Benefit --}}
                <div>
                    <div class="text-center">
                        <h3>Lợi ích</h3>
                    </div>
                    <div class="row mb-4">
                        @include('admin.home.Benefit.benefitInfo')
                        @foreach ($benefitList as $item)
                            @include('admin.home.Benefit.serviceBenefit')
                        @endforeach
                    </div>
                </div>
                {{-- Pricing --}}
                <div>
                    <div class="text-center">
                        <h3>Bảng báo giá</h3>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-header">
                                    Pricing list form
                                </div>
                                <div class="card-body">
                                    @include('admin.home.pricingForm')
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <section class="splide" id="splide" aria-label="Splide Basic HTML Example">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach ($pricingTable as $item)
                                            <li class="splide__slide">@include('admin.home.prcing-list')</li>
                                        @endforeach
                                        <div class="splide__pagination"></div>
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                {{-- Faq --}}
                <div>
                    <div class="text-center">
                        <h3>Câu hỏi thường gặp</h3>
                    </div>
                    <div class="mb-3">
                        @include('admin.home.faqForm')
                    </div>
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-header">
                                Danh sách câu hỏi
                            </div>
                            <div class="card-body">
                                @include('admin.home.faqList')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin/plugins/src/splide/splide.min.js') }}"></script>
    <script src="{{ asset('js/admin/home.js') }}"></script>
    <script>
        new Splide('.splide', {
            perPage: 3,
            pagination: true,
            arrows: false,
        }).mount();
    </script>
    <script>
        // about ìnfo
        $('#saveAboutInfo').on('click', function(e) {
            let id = $(this).attr("data-id");
            id = id.split("_")[1];
            e.preventDefault();
            var form = $('form#aboutInfoForm_' + id);
            var formData = form.serialize(); // serialize form data
            $.ajax({
                type: 'POST', // get HTTP method from form attribute
                url: '/admin/home-section-info', // get form action URL
                data: formData,
                success: function(response) {
                    toastr.success(response.message);
                    // handle server response
                },
                error: function(xhr, status, error) {
                    toastr.error(error);
                    // handle errors
                }
            });
        });
        // Web design
        $('#saveWebDesignInfo').on('click', function(e) {
            let id = $(this).attr("data-id");
            id = id.split("_")[1];
            e.preventDefault();
            var form = $('form#serviceWebDesignInfoForm_' + id);
            var formData = form.serialize(); // serialize form data
            $.ajax({
                type: 'POST', // get HTTP method from form attribute
                url: '/admin/home-section-info', // get form action URL
                data: formData,
                success: function(response) {
                    toastr.success(response.message);
                    // handle server response
                },
                error: function(xhr, status, error) {
                    toastr.error(error);
                    // handle errors
                }
            });
        });

        function serviceProcess(id) {
            var form = $('form#webDesignForm_' + id);
            var formData = form.serialize(); // serialize form data
            $.ajax({
                type: 'POST', // get HTTP method from form attribute
                url: '/admin/home-web-design', // get form action URL
                data: formData,
                success: function(response) {
                    toastr.success(response.message);
                    // handle server response
                },
                error: function(xhr, status, error) {
                    toastr.error(error);
                    // handle errors
                }
            });
        }
        // Service Benefit
        $('#saveBenefitInfo').on('click', function(e) {
            let id = $(this).attr("data-id");
            id = id.split("_")[1];
            e.preventDefault();
            var form = $('form#serviceBenefitInfoForm_' + id);
            var formData = form.serialize(); // serialize form data
            // var formData = new FormData($('#serviceBenefitForm_' + id));
            $.ajax({
                type: 'POST', // get HTTP method from form attribute
                url: '/admin/home-section-info', // get form action URL
                data: formData,
                success: function(response) {
                    // handle server response
                    toastr.success(response.message);
                },
                error: function(xhr, status, error) {
                    // handle errors
                    toastr.error(error);
                }
            });
        });

        function benefitProcess(id) {
            var form = $('form#serviceBenefitForm_' + id);
            var formData = form.serialize(); // serialize form data
            $.ajax({
                type: 'POST', // get HTTP method from form attribute
                url: '/admin/home-service-benefit', // get form action URL
                data: formData,
                success: function(response) {
                    toastr.success(response.message);
                    // handle server response
                },
                error: function(xhr, status, error) {
                    toastr.error(error);
                    // handle errors
                }
            });
        }
    </script>
@endsection
