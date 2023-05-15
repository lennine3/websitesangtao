<div class="col-lg-12 col-md-12 designServiceContain">
    <form id="serviceBenefitInfoForm_{{ $benefitInfo->id }}">
        @csrf
        <div class="designServiceSave">
            <i class="far fa-save designServiceSaveButton" data-id="benefitId_{{ $benefitInfo->id }}"
                id="saveBenefitInfo"></i>
        </div>
        <input type="text" name="sectionInfo_id" value="{{ $benefitInfo->id }}" hidden>
        <div class="card card-custom">
            <div class="card-body my-auto">
                <div class="designServiceContain">
                    <div>
                        <label for="benefitTtile">Tên tiêu đề</label>
                        <input type="text" id="benefitTtile" value="{{ $benefitInfo->name }}"
                            class="form-control designServiceInput" name="name">
                    </div>
                    <div class="mt-5">
                        <label for="uiDesignInfoTitle">Tên tiêu đề 2</label>
                        <input type="text" id="uiDesignInfoTitle" value="{{ $benefitInfo->sub_name }}"
                            class="form-control designServiceInput" name="sub_name">
                    </div>
                    <div class="mt-5">
                        <label for="benefitTtile">Mô tả</label>
                        <input type="text" id="benefitDescription" value="{{ $benefitInfo->description }}"
                            class="form-control designServiceInput" name="description">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
