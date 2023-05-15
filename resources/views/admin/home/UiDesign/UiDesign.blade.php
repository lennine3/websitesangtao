<div class="designServiceContain mt-3">
    <div class="card">
        <div class="card-body my-auto">
            <form id="upload-uiDesign-form" enctype="multipart/form-data">
                <div class="row">
                    @csrf
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="col-form-label text-right">
                                Tên
                                <span class="label-text-error">*</span>
                            </label>
                            <div>
                                <input class="form-control" type="text" name="name" placeholder=""
                                    value="{{ @$brand->name }}">
                                <span class="form-text text-error slug-error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label text-right">
                                Đường dẫn
                                <span class="label-text-error">*</span>
                            </label>
                            <div>
                                <input class="form-control" type="text" name="link" placeholder=""
                                    value="{{ @$brand->link }}">
                                <span class="form-text text-error slug-error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label text-right">
                                Hình ảnh
                                <span class="label-text-error">*</span>
                            </label>
                            <div>
                                <input class="form-control" type="file" name="uiDesignImage"
                                    onchange="readURLUiImg(this);">
                                <span class="form-text text-error slug-error"></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn-banner-save">Lưu thông tin</button>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex justify-content-center">
                        <div class="uiDesignContain">
                            <img src="{{ asset('admin/assets/img/no-image.jpeg') }}" alt="" id="imgPreviewInput">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

