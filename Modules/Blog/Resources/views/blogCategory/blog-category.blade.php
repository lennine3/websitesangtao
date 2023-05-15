@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/plugins/src/tomSelect/tom-select.default.min.css') }}">
    {{-- dark theme --}}
    <link rel="stylesheet" href="{{ asset('admin/plugins/css/dark/tomSelect/custom-tomSelect.css') }}">
    {{-- light theme --}}
    <link rel="stylesheet" href="{{ asset('admin/plugins/css/light/tomSelect/custom-tomSelect.css') }}">
@endsection

@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="breadcrumb-wrapper-content  mt-3 d-flex justify-content-end layout-top-spacing">
            <div>
                <button class="btn btn-light-primary" type="submit" id="submitForm">Save</button>
            </div>
        </div>
        <form id="blogCateForm" action="#" method="POST">
            @csrf
            <input type="text" value="{{ @$blogCategory->id }}" name="blog_cate_id" hidden>
            <div class="row layout-top-spacing">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            Danh mục bài viết
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="parent-select" class="form-label">Danh mục cha hiện tại:
                                        {{ @$blogCategory->parent_id != 0 ? @$blogCategory->parent->title : 'Danh mục cha' }}
                                    </label>
                                    <select id="parent-select" name="parent_id" placeholder="Select your parent"
                                        autocomplete="off">
                                        <option value="0">Danh mục cha</option>
                                        @foreach ($blogCategoryList as $item)
                                            <option value="{{ $item->id }}"
                                                {{ @$item->parent_id == $item->id ? 'selected' : '' }}>
                                                {{ @$item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="title" class="form-label">Tên tiều đề</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ @$blogCategory->title }}">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="title_short" class="form-label">Tên tiêu đề ngắn</label>
                                    <input type="text" class="form-control" id="title_short" name="title_short"
                                        value="{{ @$blogCategory->title_short }}">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="slug" class="form-label">slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ @$blogCategory->slug }}">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="description" class="form-label">Mô tả</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ @$blogCategory->description }}">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="status-select" class="form-label">
                                        Trạng thái
                                    </label>
                                    <select id="status-select" name="status" placeholder="Select your parent"
                                        autocomplete="off">
                                        <option value="A" {{ @$blogCategory->status == 'A' ? 'selected' : '' }}>
                                            Hoạt động
                                        </option>
                                        <option value="D" {{ @$blogCategory->status == 'D' ? 'selected' : '' }}>
                                            KHông hoạt động
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            Seo
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="seoTitle" class="form-label">Seo title</label>
                                    <input type="text" class="form-control" id="seoTitle" name="seo_title"
                                        value="{{ @$blogCategory->seo->seo_title }}">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="seoDescription" class="form-label">Seo Description</label>
                                    <textarea type="text" cols="30" rows="5" class="form-control" id="seoDescription" name="seo_description">{{ @$blogCategory->seo->seo_keyword }}</textarea>
                                </div>
                                <div class="col-lg-12">
                                    <label for="seoKeyword" class="form-label">Seo Keyword</label>
                                    <textarea type="text" cols="30" rows="5" class="form-control" id="seoKeyword" name="seo_keyword">{{ @$blogCategory->seo->seo_description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/plugins/src/tomSelect/tom-select.complete.min.js') }}"></script>
    <script>
        new TomSelect("#parent-select", {});
        new TomSelect("#status-select", {});
    </script>
    <script>
        $(document).ready(function() {
            // listen for click event on button
            $('#submitForm').click(function(e) {
                e.preventDefault(); // prevent default form submission
                var form_data = new FormData($('#blogCateForm')[0]); // get form data
                console.log(form_data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/admin/blog/category/process',
                    type: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        // handle error response here
                    }
                });
            });
        });
    </script>
@endsection
