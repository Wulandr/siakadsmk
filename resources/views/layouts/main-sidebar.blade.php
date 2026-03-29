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
                        {{-- <li class="slide">
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
                        </li> --}}
                    @endif
                    @if (Gate::check('menu_user') || Gate::check('user_show'))
                        <li class="slide">
                            <a class="side-menu__item 
                        {{ Request::is('user', 'user/create', 'user/update/{user}', 'user/delete/{user}', 'roles/detail/{user}')
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

                    <li class="slide">
                        <a class="side-menu__item {{ Request::is('thajaran', 'thajaran/addNew', 'thajaran/edit/{id}', 'thajaran/delete/{id}') ? 'active' : '' }}""
                            href="{{ url('/thajaran') }}">
                            <svg class="side-menu__icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24">
                                <path
                                    d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z">
                                </path>
                                <path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Tahun Ajaran</span>
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

                    {{-- Menu Guru --}}
                    @if (Gate::check('guru_show'))
                        <li class="side-item side-item-category">DATA</li>
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
                        <a class="side-menu__item" href="{{ url('/mapel') }}">
                            <svg class="side-menu__icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24">
                                <path
                                    d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z">
                                </path>
                                <path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Mapel</span>
                        </a>
                    </li>

                    {{-- Menu Guru bk --}}
                    @if (Gate::check('guru_show') || Gate::check('absensi_show'))
                        <li class="side-item side-item-category">Guru BK</li>
                    @endif
                    <li class="slide">
                        <a class="side-menu__item" href="{{ url('/absensi') }}">
                            <svg class="side-menu__icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24">
                                <path
                                    d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z">
                                </path>
                                <path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Absensi Murid</span>
                        </a>
                    </li>

                    {{-- Menu Wali kelas --}}
                    @if (Gate::check('rapor'))
                        <li class="side-item side-item-category">Wali Kelas</li>
                    @endif
                    <li class="slide">
                        <a class="side-menu__item" href="{{ url('/nilai') }}">
                            <svg class="side-menu__icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24">
                                <path
                                    d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z">
                                </path>
                                <path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z">
                                </path>
                            </svg>
                            <span class="side-menu__label">Nilai Murid</span>
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
