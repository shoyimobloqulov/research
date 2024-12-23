<header class="adminuiux-header">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <button class="btn btn-link btn-square sidebar-toggler" type="button" onclick="initSidebar()"><i
                    class="sidebar-svg" data-feather="menu"></i></button>
            <a class="navbar-brand" href="/"><img data-bs-img="light"
                                                  src="{{ asset('logo.jpg') }}" alt=""> <img
                    data-bs-img="dark" src="{{ asset('assets/img/logo.svg') }}" alt="">
                <div class=""><span class="h5"> <b>Research Hub</b></span>
                    <p class="fs-12 opacity-75">System</p></div>
            </a>
            <div class="ms-auto">
                <button class="btn btn-link btn-square btnsunmoon btn-link-header" id="btn-layout-modes-dark-page"><i
                        class="sun mx-auto" data-feather="sun"></i> <i class="moon mx-auto" data-feather="moon"></i>
                </button>

                @auth
                    <div class="dropdown d-inline-block"><a
                            class="dropdown-toggle btn btn-link btn-square btn-link-header style-none no-caret px-0"
                            id="userprofiledd" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                            <div class="row gx-0 d-inline-flex">
                                <div class="col-auto align-self-center">
                                    <figure class="avatar avatar-28 rounded-circle coverimg align-middle"><img
                                            src="{{ asset('assets/img/user.png') }}" alt=""
                                            id="userphotoonboarding2">
                                    </figure>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end width-300 pt-0 px-0"
                             aria-labelledby="userprofiledd">
                            <div class="bg-theme-1-space rounded py-3 mb-3 dropdown-dontclose">
                                <div class="row gx-0">
                                    <div class="col-auto px-3">
                                        <figure class="avatar avatar-50 rounded-circle coverimg align-middle"><img
                                                src="{{ asset('assets/img/user.png') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="col align-self-center"><p class="mb-1">
                                            <span>{{ auth()->user()->name }}</span></p>
                                        <p><i class="bi bi-calendar me-2"></i> {{ auth()->user()->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="px-2">
                                <div><a class="dropdown-item" href="{{ route('profile') }}"><i data-feather="user"
                                                                                               class="avatar avatar-18 me-1"></i>
                                        Profile</a></div>

                                <div><a class="dropdown-item" href="{{ route('settings') }}"><i data-feather="settings"
                                                                                                class="avatar avatar-18 me-1"></i>
                                        Sozlamalar</a></div>
                                <div>
                                    <!-- Logout uchun formani yaratamiz -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item theme-red" style="border: none; background: none;">
                                            <i data-feather="power" class="avatar avatar-18 me-1"></i>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-sm btn-theme"><i
                            class="bi bi-box-arrow-in-right me-0 me-md-1"></i> <span>Kirish</span></a>
                @endguest

            </div>
        </div>
    </nav>
</header>
