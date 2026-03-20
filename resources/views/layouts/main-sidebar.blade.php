<div class="sticky">
    <aside class="app-sidebar">
        <div class="main-sidebar-header active">
            <a class="header-logo active" href="{{ url('/dashboard') }}">
                <img src="{{ asset('nowa/assets/img/brand/logo (1).png') }}" class="main-logo  desktop-logo"
                    alt="logo">
                <img src="{{ asset('nowa/assets/img/brand/logo (1).png') }}" class="main-logo  desktop-dark"
                    alt="logo">
                <img src="{{ asset('nowa/assets/img/brand/logo2.png') }}" class="main-logo  mobile-logo" alt="logo">
                <img src="{{ asset('nowa/assets/img/brand/logo2.png') }}" class="main-logo  mobile-dark" alt="logo">
            </a>
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            @if (Auth::user()->is_aktif == 1)
                <ul class="side-menu">
                    <li class="slide">
                        <a class="side-menu__item {{ Request::is('dashboard') ? 'active' : '' }}"
                            href="{{ url('/dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M4 11h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm1-6h4v4H5V5zm15-2h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 12a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6zm-5-6h4v4H5v-4zm13-1h-2v2h-2v2h2v2h2v-2h2v-2h-2z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Dashboard</span>
                        </a>
                    </li>
                    {{-- Menu Admin --}}
                    @if (Gate::check('menu_user') || Gate::check('user_show'))
                        <li class="side-item side-item-category">Admin</li>
                    @endif
                    @if (Gate::check('menu_beranda') || Gate::check('beranda_show'))
                        <li class="slide">
                            <a class="side-menu__item 
                        {{ Request::is(
                            'beranda',
                            'beranda/addNew',
                            'beranda/addNew/create',
                            'beranda/edit/{id}',
                            'beranda/edit/process/{id}',
                            'beranda/delete/{id}',
                        )
                            ? 'active'
                            : '' }}"
                                data-bs-toggle="slide" href="{{ url('/beranda') }}"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24"
                                    height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H4V5h16zM4 19v-8h16.001l.001 8H4z">
                                    </path>
                                    <path d="M14 6h2v2h-2zm3 0h2v2h-2z"></path>
                                </svg>
                                <span class="side-menu__label">Halaman Beranda</span></a>
                        </li>
                    @endif
                    @if (Gate::check('menu_user') || Gate::check('user_show'))
                        <li class="slide">
                            <a class="side-menu__item 
                        {{ Request::is(
                            'user',
                            'user/isaktif',
                            'user/create',
                            'user/update/{user}',
                            'user/delete/{user}',
                            'roles/detail/{user}',
                        )
                            ? 'active'
                            : '' }}"
                                href="{{ url('user') }}">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                                    </path>
                                </svg>
                                <span class="side-menu__label">User</span>
                            </a>
                        </li>
                    @endif
                    @if (Gate::check('menu_role') || Gate::check('role_show'))
                        <li class="slide">
                            <a class="side-menu__item
                        {{ Request::is(
                            'getall',
                            'roles',
                            'roles/{role}',
                            'roles_create',
                            'roles_store',
                            'roles_edit/{role}',
                            'roles_update/{role}',
                            'roles_destroy/{role}',
                        )
                            ? 'active'
                            : '' }}"
                                href="{{ url('/roles') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    class="side-menu__icon" viewBox="0 0 24 24">
                                    <path
                                        d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192 1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z">
                                    </path>
                                    <path
                                        d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z">
                                    </path>
                                </svg>
                                <span class="side-menu__label">Role</span>
                            </a>
                        </li>
                    @endif

                    {{-- Menu Guru --}}
                    @if (Gate::check('guru_show'))
                        <li class="side-item side-item-category">Guru</li>
                    @endif
                    <li class="slide">
                        <a class="side-menu__item" href="{{ url('/guru') }}">
                            <svg class="side-menu__icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24">
                                <path
                                    d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z">
                                </path>
                                <path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Guru</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" href="{{ url('/murid') }}">
                            <svg class="side-menu__icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24">
                                <path
                                    d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z">
                                </path>
                                <path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Murid</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" href="{{ url('/kelas') }}">
                            <svg class="side-menu__icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24">
                                <path
                                    d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z">
                                </path>
                                <path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Kelas</span>
                        </a>
                    </li>


                </ul>
            @endif
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </aside>
</div>
