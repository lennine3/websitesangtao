<div id="UiDesignListItem">
    <div class="row">
        @foreach ($uiDesignList as $item)
            <div class="col-lg-4 col-md-6 mt-5">
                <form id="uiDesignForm_{{ $item->id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="UiItemBox">
                        <div class="UiDesignSaveItem">
                            <i class="far fa-save UiDesignSaveButton" data-id="uiDesignId_{{ $item->id }}"
                                id="saveUiDesign" onclick="submitForm('uiDesignForm_{{ $item->id }}')"></i>
                        </div>
                        <input type="text" name="UiDesign_id" value="{{ $item->id }}" hidden>
                        <div class="card card-custom-Ui">
                            <div class="card-body my-auto position-relative">
                                {{-- <div> --}}
                                <label for="img_{{ $item->id }}" class="file-label">
                                    <div class="image-container">
                                        <div class="slideImg">
                                            <img src="{{ asset('/storage/UiDesign') . '/' . $item->id . '/' . $item->webp_image }}"
                                                alt="{{ $item->name }}" loading="lazy"
                                                id="imgUiDesignItem_{{ $item->id }}">
                                        </div>
                                        <input id="img_{{ $item->id }}" type="file" accept="image/*"
                                            class="file-input" name="uiDesignImage" onchange="UiItemImage(this);"
                                            data-id="{{ $item->id }}">
                                        <div class="text-overlay">
                                            <p><i class="fas flaticon2-image-file"></i></p>
                                        </div>
                                    </div>
                                </label>

                                <div class="d-flex justify-content-between mt-4">
                                    <div class="form-group px-2">
                                        <label class="col-form-label text-right">
                                            Tên
                                            <span class="label-text-error">*</span>
                                        </label>
                                        <div>
                                            <input type="text" value="{{ $item->name }}" name="name"
                                                class="form-control">
                                            <span class="form-text text-error slug-error"></span>
                                        </div>
                                    </div>
                                    <div class="form-group px-2">
                                        <label class="col-form-label text-right">
                                            Đường dẫn
                                            <span class="label-text-error">*</span>
                                        </label>
                                        <div>
                                            <input type="text" value="{{ $item->link }}" name="link"
                                                class="form-control">
                                            <span class="form-text text-error slug-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <div class="{{ $item->status == 'A' ? 'UiActiveStatus' : 'UiDeActiveStatus' }}"
                                        onclick="UiDesignStatusProcess({{ $item->id }})">
                                        {{ $item->status == 'A' ? 'Hoạt động' : 'Không hoạt động' }}
                                    </div>
                                </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
</div>

<script>

</script>
