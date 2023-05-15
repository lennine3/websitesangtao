<div class="col-lg-12 col-md-12 designServiceContain">
    <form id="uiDesignInfoInfoForm_{{ $uiDesignInfo->id }}">
        @csrf
        <div class="designServiceSave">
            <i class="far fa-save designServiceSaveButton" data-id="uiDesignInfoInfoId_{{ $uiDesignInfo->id }}"
                id="saveUiDesignInfo"></i>
        </div>
        <input type="text" name="sectionInfo_id" value="{{ $uiDesignInfo->id }}" hidden>
        <div class="card card-custom">
            <div class="card-body my-auto">
                <div class="designServiceContain">
                    <div>
                        <label for="uiDesignInfoTitle">Tên tiêu đề</label>
                        <input type="text" id="uiDesignInfoTitle" value="{{ $uiDesignInfo->name }}"
                            class="form-control designServiceInput" name="name">
                    </div>
                    <div class="mt-5">
                        <label for="uiDesignInfoTitle">Tên tiêu đề 2</label>
                        <input type="text" id="uiDesignInfoTitle" value="{{ $uiDesignInfo->sub_name }}"
                            class="form-control designServiceInput" name="sub_name">
                    </div>
                    <div class="mt-5">
                        <label for="uiDesignInfoDescription">Mô tả</label>
                        <input type="text" id="uiDesignInfoDescription" value="{{ $uiDesignInfo->description }}"
                            class="form-control designServiceInput" name="description">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
