<section class="UiDesignContainer" id="UiDesignGallery">
    <div class="webContainer container">
        <div class="UiDesignBoxMobile text-center">
            <h2 class="UiDesignTitle titleText">
                {{ $uiDesignInfo->name }} <br>
                {{ $uiDesignInfo->sub_name }}
            </h2>
            <div class="d-flex justify-content-center">
                <div class="UiDesignDesc descText">
                    {{ $uiDesignInfo->description }}
                </div>

            </div>
            <div class="d-flex justify-content-center">
                <hr class="UiDesignSeparateLine">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="UiDesignSlideContain">
                <div class="product-slide">
                    {{-- @foreach (glob('public/web/assets/image/home/uiDesign/*.*') as $filename) --}}
                    @foreach ($uiDesignList as $item)
                        <div>
                            <div class="slideImg">
                                {{-- <img src="{{ $filename }}" alt="{{ $filename }}" loading="lazy"> --}}
                                <img src="{{ asset('/storage/UiDesign') . '/' . $item->id . '/' . $item->webp_image }}"
                                    alt="{{ $item->name }}" loading="lazy">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="product-slide-name">
                    {{-- @foreach (glob('public/web/assets/image/home/uiDesign/*.*') as $filename) --}}
                    @foreach ($uiDesignList as $item)
                        <div class="productSlideNameItem">
                            {{ $item->name }}
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a href="#" class="registerBtn lynessa-menu-item-title">Liên hệ để nhận bộ giao diện tùy
                        chỉnh</a>
                </div>
            </div>
        </div>

    </div>
</section>
