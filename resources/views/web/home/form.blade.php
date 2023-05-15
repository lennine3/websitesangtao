<section id="formContactSection">
    <div class="homeFormContain d-flex homeBlock">
        <div class="homeBlock d-flex align-items-center justify-content-center">
            <div class="homeFormBox">
                <h2 class="homeFormTitle titleText"> Liên hệ tư vấn </h2>
                <div class="homeBlock formContainInputMobile d-flex justify-content-center">
                    <form id="formContact" name="formContact" method="POST" class="form validate">
                        @csrf
                        <div class="homeFormInputContain position-relative">
                            <input type="text" placeholder="Tên của bạn" name="full_name"
                                class="homeFormInput form-control">
                            <span class="homeFormInputIcon">(*)</span>
                        </div>
                        <div class="homeFormInputContain position-relative">
                            <input type="text" placeholder="Số điện thoại liên hệ" class="homeFormInput form-control"
                                name="phone" id="phone-Input" autocomplete="off">
                            <span class="homeFormInputIcon" id="phone-required">(*)</span>
                            <span class="invalid-feedback invalid-home" id="phone-error">lỗi</span>
                        </div>
                        <div class="position-relative homeFormInputContain">
                            <input type="email" placeholder="Email nhận thông tin" class="homeFormInput form-control"
                                name="email">
                            <span class="homeFormInputIcon">(*)</span>
                        </div>
                        <div class="position-relative">
                            <textarea name="content" id="" cols="60" rows="3" class="form-control" placeholder="Yêu cầu của bạn"></textarea>
                        </div>
                        <div class="homeFormButtonContain">
                            <button class="btn homeFormButton" type="submit"> Gửi thông tin </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
