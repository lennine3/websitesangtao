<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <form class="section general-info" action="{{ route('users.setting.process', ['user' => $user->id]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="info">
                <h6 class="">General Information</h6>
                <div class="row">
                    <div class="col-lg-11 mx-auto">
                        <div class="row">
                            <div class="col-xl-2 col-lg-12 col-md-4">
                                <div class="profile-image d-flex justify-content-center  mt-4 pe-md-4">

                                    <div class="position-relative">
                                        <img id="avatar-preview"
                                            src="{{ $user->avatar != null ? asset(config('user.image.path') . $user->id . '/' . $user->avatar) : asset('admin/assets/img/blank.png') }}"
                                            alt="Avatar preview">
                                        <div class="uploadButtonContain d-flex justify-content-end">
                                            <label class="uploadButton" for="avatar-upload"><i
                                                    data-feather="upload"></i>
                                            </label>
                                            <input type="file" id="avatar-upload" accept="image/*" hidden
                                                name="avatarImage">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fullName">Full Name</label>
                                                <input type="text" name="name" class="form-control mb-3"
                                                    id="fullName" placeholder="Full Name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" name="address" class="form-control mb-3"
                                                    id="address" placeholder="Address" value="{{ $user->address }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" name="phone" class="form-control mb-3"
                                                    id="phone" placeholder="Write your phone number here"
                                                    value="{{ $user->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" class="form-control mb-3"
                                                    id="email" placeholder="Write your email here"
                                                    value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Gender</label>
                                                <select id="sex-user" name="gender" placeholder="Select your sex"
                                                    autocomplete="off">
                                                    <option value="M" {{ $user->gender == 'M' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="F" {{ $user->gender == 'F' ? 'selected' : '' }}>
                                                        Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">DOB</label>
                                                <input id="basicFlatpickr" value="{{ $user->dob }}" name="dob"
                                                    class="form-control flatpickr flatpickr-input active" type="text"
                                                    placeholder="Select Date..">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Status</label>
                                                <select id="status-user" name="status" placeholder="Select a person..."
                                                    autocomplete="off">
                                                    <option value="">Select a person...
                                                    </option>
                                                    <option value="A" {{ $user->status == 'A' ? 'selected' : '' }}>
                                                        Hoạt động</option>
                                                    <option value="D"
                                                        {{ $user->status == 'D' ? 'selected' : '' }}>
                                                        Không hoạt động
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-1">
                                            <div class="form-group text-end">
                                                <button class="btn btn-secondary">Save</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
