@extends('layouts.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin/plugins/src/tomSelect/tom-select.default.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/src/tomSelect/tom-select.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('admin/plugins/css/dark/tomSelect/custom-tomSelect.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/css/light/tomSelect/custom-tomSelect.css') }}">

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

        .countPermission {
            background-color: red;
            color: #fff;
            padding: 0px 5px;
            border-radius: 3px;
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
                            {{ __('Chỉnh sửa Role') }}
                        @else
                            {{ __('Thêm Role mới') }}
                        @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}" id="roleStore"
                            data-url="{{ route('roles.store') }}">
                            @csrf
                            <input type="text" value="{{ @$editData->id }}" name="role_id" hidden>
                            <div class="form-group row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Tên Role') }}</label>

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
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Quyền') }}</label>

                                <div class="col-md-8">
                                    <select id="select-permission" name="permission[]" multiple
                                        class="@error('name') is-invalid @enderror " placeholder="Select permission..."
                                        autocomplete="off">
                                        @foreach ($permissions as $item)
                                            <option value="{{ $item->id }}"
                                                {{ @$editData && @$editData->hasPermissionTo($item) ? 'selected' : '' }}>
                                                {{ $item->title }}</option>
                                        @endforeach
                                    </select>

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
                                            {{ __('Update Role') }}
                                        @else
                                            {{ __('Add Role') }}
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($roles as $index => $item)
                        <div class="col-lg-4 {{ !in_array($index,[0,1,2]) ? 'layout-top-spacing' : '' }}">
                            <a href="{{ route('roles.edit', ['id' => $item->id]) }}">
                                <div class="card">
                                    <div class="card-header">
                                        {{ $item->name }} <span
                                            class="countPermission">{{ count($item->permissions) }}</span>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($item->permissions as $item)
                                            <div>{{ $item->title }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/src/tomSelect/tom-select.complete.min.js') }}"></script>
    <script>
        new TomSelect("#select-permission", {
            plugins: ['dropdown_input', 'remove_button'],
        });
    </script>
    <script>
        $(document).ready(function() {
            // Bind a submit event handler to the form
            $('#roleStore').submit(function(event) {
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
                        $("#roleStore")[0].reset();
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
