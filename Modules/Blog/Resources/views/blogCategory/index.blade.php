@extends('layouts.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/light/elements/custom-tree_view.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dark/elements/custom-tree_view.css') }}">
@endsection
@section('content')
    <div class="middle-content container-xxl p-0">
        <div class="row layout-top-spacing">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        Blog category
                    </div>
                    <div class="card-body">
                        {{-- <ul class="treeview" id="treeviewBasicMainChild">
                            <li class="tv-item tv-folder">
                                <div class="tv-header" id="mainChildHeadingOne">
                                    <div class="tv-collapsible" data-bs-toggle="collapse" data-bs-target="#mainChildOne"
                                        aria-expanded="true" aria-controls="mainChildOne">
                                        <div class="icon">
                                            <i data-feather="chevron-right"></i>
                                        </div>
                                        <p class="title">CSS</p>
                                    </div>
                                </div>
                                <div id="mainChildOne" class="treeview-collapse collapse show"
                                    aria-labelledby="mainChildHeadingOne" data-bs-parent="#treeviewBasicMainChild">

                                    <ul class="treeview" id="treeviewBasicCSSChild">
                                        <li class="tv-item tv-folder">
                                            <div class="tv-header" id="cssChildHeadingOne">
                                                <div class="tv-collapsible collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#cssChildOne" aria-expanded="false"
                                                    aria-controls="cssChildOne">
                                                    <div class="icon">
                                                        <i data-feather="chevron-right"></i>
                                                    </div>
                                                    <p class="title">Modules</p>
                                                </div>
                                            </div>
                                            <div id="cssChildOne" class="treeview-collapse collapse"
                                                aria-labelledby="cssChildHeadingOne"
                                                data-bs-parent="#treeviewBasicCSSChild">
                                                <ul class="treeview" id="treeviewBasicModulesChild">
                                                    <li class="tv-item">
                                                        <p>style.module.css</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="tv-item">
                                            <p>style.css</p>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul> --}}
                        @foreach ($blogCategory as $item)
                            <ul class="treeview" id="treeviewBasicMainChild">
                                <li class="tv-item tv-folder">
                                    <div class="tv-header" id="mainChildHeadingOne">
                                        <div class="tv-collapsible">
                                            <div class="icon" data-bs-toggle="collapse"
                                                data-bs-target="#mainChild_{{ $item->id }}" aria-expanded="true"
                                                aria-controls="mainChild_{{ $item->id }}">
                                                <i data-feather="chevron-right"></i>
                                            </div>
                                            <p class="title">
                                                <a
                                                    href="{{ route('admin.blog.category.edit', ['blogCategory' => $item->id]) }}">{{ $item->title }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="mainChild_{{ $item->id }}" class="treeview-collapse collapse show"
                                        aria-labelledby="mainChildHeadingOne" data-bs-parent="#treeviewBasicMainChild">

                                        {{-- <ul class="treeview" id="treeviewBasicCSSChild">
                                        <li class="tv-item tv-folder">
                                            <div class="tv-header" id="cssChildHeadingOne">
                                                <div class="tv-collapsible collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#cssChildOne" aria-expanded="false"
                                                    aria-controls="cssChildOne">
                                                    <div class="icon">
                                                        <i data-feather="chevron-right"></i>
                                                    </div>
                                                    <p class="title">Modules</p>
                                                </div>
                                            </div>
                                            <div id="cssChildOne" class="treeview-collapse collapse"
                                                aria-labelledby="cssChildHeadingOne"
                                                data-bs-parent="#treeviewBasicCSSChild">
                                                <ul class="treeview" id="treeviewBasicModulesChild">
                                                    <li class="tv-item">
                                                        <p>style.module.css</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="tv-item">
                                            <p>style.css</p>
                                        </li>
                                    </ul> --}}
                                    </div>
                                </li>
                            </ul>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
