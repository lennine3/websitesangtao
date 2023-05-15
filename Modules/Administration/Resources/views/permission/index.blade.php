@extends('layouts.layout')
@section('style')
    <style>
        body.dark .table:not(.dataTable).table-bordered>tbody>tr td {
            border: 1px solid #3b3f5c;
        }

        body.dark .table:not(.dataTable).table-bordered thead tr th {
            border: 1px solid #3b3f5c;
            background: transparent;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
@endsection
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-header">
                        @if (@$editData->id)
                            {{ __('Chỉnh sửa Permission') }}
                        @else
                            {{ __('Thêm Permission mới') }}
                        @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" id="permissionStore" action="{{ route('permission.store') }}"
                            data-url="{{ route('permission.store') }}">
                            @csrf
                            <input type="text" value="{{ @$editData->id }}" name="permission_id" hidden>
                            <div class="form-group row mb-3">

                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Tên') }}</label>
                                <div class="col-md-8">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ @$editData->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Quyền') }}</label>


                                <div class="col-md-8">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ @$editData->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if (@$editData->id)
                                            {{ __('Update Permission') }}
                                        @else
                                            {{ __('Add Permission') }}
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Danh sách Permission
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Tên gọi</th>
                                        <th scope="col">Quyền</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td class="text-center">
                                                <div class="action-btns">
                                                    <a href="{{ route('permission.edit', ['id' => $item->id]) }}"
                                                        class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                                        data-placement="top" title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-edit-2">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    {{-- <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip"
                                                        data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10"
                                                                y2="17"></line>
                                                            <line x1="14" y1="11" x2="14"
                                                                y2="17"></line>
                                                        </svg>
                                                    </a> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Bind a submit event handler to the form
            $('#permissionStore').submit(function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();

                // Serialize the form data into a query string
                var formData = $(this).serialize();
                var url = $(this).data('url');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Send an AJAX request to the server
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        Snackbar.show({
                            text: response.text,
                            pos: 'top-right',
                            showAction: false,
                            duration: 3000
                        });
                        $("#permissionStore")[0].reset();
                    },
                    error: function(response) {
                        // Show error message using Snackbar
                        Snackbar.show({
                            text: response.text,
                            pos: 'top-right',
                            showAction: false,
                            duration: 3000
                        });
                    }
                });
            });
        });
    </script>
@endsection
