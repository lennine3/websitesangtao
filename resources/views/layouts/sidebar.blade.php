<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('admin/assets/img/logo.svg') }}" class="navbar-logo" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link"> CORK </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ $routeName == 'admin.dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li
                class="menu {{ $routeName == 'admin.home-setting' || $routeName == 'admin.edit.pricing-table' ? 'active' : '' }}">
                <a href="{{ route('admin.home-setting') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="layout"></i>
                        <span>Home</span>
                    </div>
                </a>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg><span>Blog</span></div>
            </li>
            @php
                $blogCategoryCheck = ['blog.category.index', 'admin.blog.category.create', 'admin.blog.category.edit'];
                $blogCheck = ['blog.index', 'blog.create', 'blog.edit'];
            @endphp
            <li
                class="menu {{ in_array($routeName, $blogCategoryCheck) || in_array($routeName, $blogCheck) ? 'active' : '' }}">
                <a href="#blogMenuParent" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="settings"></i>
                        <span>Blog</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ in_array($routeName, $blogCategoryCheck) || in_array($routeName, $blogCheck) ? 'show' : '' }}"
                    id="blogMenuParent" data-bs-parent="#accordionExample">
                    <li>
                        <a href="#blog-category-menu" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle collapsed"> Blog Category <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="collapse list-unstyled sub-submenu {{ in_array($routeName, $blogCategoryCheck) ? 'show' : '' }}"
                            id="blog-category-menu" data-bs-parent="#pages">
                            <li class="{{ $routeName == 'blog.category.index' ? 'active' : '' }}">
                                <a href="{{ route('blog.category.index') }}">
                                    Danh mục blog </a>
                            </li>
                            <li
                                class="{{ $routeName == 'admin.blog.category.create' || $routeName == 'admin.blog.category.edit' ? 'active' : '' }}">
                                <a href="{{ route('admin.blog.category.create') }}">
                                    Thêm mới </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#blog-menu" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle collapsed"> Blog <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="collapse list-unstyled sub-submenu {{ in_array($routeName, $blogCheck) ? 'show' : '' }}"
                            id="blog-menu" data-bs-parent="#pages">
                            <li class="{{ $routeName == 'blog.index' ? 'active' : '' }}">
                                <a href="{{ route('blog.index') }}">
                                    Danh sách Blog </a>
                            </li>
                            <li
                                class="{{ $routeName == 'blog.create' || $routeName == 'blog.edit' ? 'active' : '' }}">
                                <a href="{{ route('blog.create') }}">
                                    Thêm mới </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg><span>USER AND PAGES</span></div>
            </li>

            @php
                $userCheck = ['users.index', 'users.setting'];
            @endphp
            <li class="menu {{ in_array($routeName, $userCheck) ? 'active' : '' }}">
                <a href="#users" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Users</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ $routeName == 'users.index' || $routeName == 'users.setting' ? 'show' : '' }}"
                    id="users" data-bs-parent="#accordionExample">
                    <li class="{{ $routeName == 'users.index' ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}">
                            User list </a>
                    </li>
                    <li class="{{ $routeName == 'users.setting' ? 'active' : '' }}">
                        <a href="{{ route('users.setting', ['user' => Auth::user()->id]) }}">
                            Profile </a>
                    </li>
                </ul>
            </li>

            @if (Auth::user()->hasPermissionTo('view administrator'))
                <li class="menu menu-heading">
                    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg><span>Administrator</span></div>
                </li>
                @php
                    $administratorCheck = ['roles.edit', 'roles.page', 'permission.page', 'permission.edit'];
                @endphp
                <li class="menu {{ in_array($routeName, $administratorCheck) ? 'active' : '' }}">
                    <a href="#administrator" data-bs-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                            <span>Administrator</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ in_array($routeName, $administratorCheck) ? 'show' : '' }}"
                        id="administrator" data-bs-parent="#accordionExample">
                        <li class="{{ $routeName == 'roles.page' || $routeName == 'roles.edit' ? 'active' : '' }}">
                            <a href="{{ route('roles.page') }}">
                                Role </a>
                        </li>
                        <li
                            class="{{ $routeName == 'permission.page' || $routeName == 'permission.edit' ? 'active' : '' }}">
                            <a href="{{ route('permission.page') }}"> Permission </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg><span>Setting</span></div>
            </li>
            @php
                $settingCheck = ['setting.index'];
            @endphp
            <li class="menu {{ in_array($routeName, $settingCheck) ? 'active' : '' }}">
                <a href="#settingMenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="settings"></i>
                        <span>General setting</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ in_array($routeName, $settingCheck) ? 'show' : '' }}"
                    id="settingMenu" data-bs-parent="#accordionExample">
                    <li class="{{ $routeName == 'setting.index' ? 'active' : '' }}">
                        <a href="{{ route('setting.index') }}">
                            Website setting </a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>

</div>
