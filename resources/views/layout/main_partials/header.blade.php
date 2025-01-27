<!-- navbar-->
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">

                @php
                $dashboardRoute = auth()->user()->role_users_id == 1 ? route('admin.dashboard') : url('/employee/dashboard');
                @endphp

                <a href="{{ $dashboardRoute }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('miniadmin/images/logo-sm.svg') }}" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('miniadmin/images/logo-sm.svg') }}" alt="" height="24"> <span class="logo-txt">HRMS</span>
                    </span>
                </a>

                <a href="{{ $dashboardRoute }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('miniadmin/images/logo-sm.svg') }}" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('miniadmin/images/logo-sm.svg') }}" alt="" height="24"> <span class="logo-txt">HRMS</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="search" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img id="header-lang-img" src="{{asset('miniadmin/images/flags/us.jpg')}}" alt="Header Language" height="16">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    @foreach($languages as $lang)
                    <li>
                        <a href="{{route('language.switch',$lang)}}"> <span class="align-middle">{{$lang}}</span></a>
                    </li>
                    @endforeach

                    <!-- item-->
                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                        <img src="{{ asset('miniadmin/images/flags/us.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                    </a> -->
                    <!-- item-->
                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                        <img src="{{ asset('miniadmin/images/flags/spain.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                    </a> -->

                    <!-- item-->
                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                        <img src="{{ asset('miniadmin/images/flags/germany.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                    </a> -->

                    <!-- item-->
                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                        <img src="{{ asset('miniadmin/images/flags/italy.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                    </a> -->

                    <!-- item-->
                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                        <img src="{{ asset('miniadmin/images/flags/russia.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                    </a> -->
                </div>
            </div>

            <!-- <li class="nav-item"><a id="btnFullscreen" data-bs-toggle="tooltip"
            title="{{__('Full Screen')}}"><i class="dripicons-expand"></i></a></li> -->
            <div class="dropdown d-none d-sm-inline-block">
                <!-- Full Screen set button -->
                <button type="button" class="btn header-item" id="btnFullscreen">
                    <i data-feather="maximize" class="icon-lg"></i>
                </button>
            </div>


            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <!-- <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <div class="p-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('miniadmin/images/brands/github.png')}}" alt="Github">
                                    <span>GitHub</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('miniadmin/images/brands/bitbucket.png')}}" alt="bitbucket">
                                    <span>Bitbucket</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('miniadmin/images/brands/dribbble.png')}}" alt="dribbble">
                                    <span>Dribbble</span>
                                </a>
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('miniadmin/images/brands/dropbox.png')}}" alt="dropbox">
                                    <span>Dropbox</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('miniadmin/images/brands/mail_chimp.png')}}" alt="mail_chimp">
                                    <span>Mail Chimp</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('miniadmin/images/brands/slack.png')}}" alt="slack">
                                    <span>Slack</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell" class="icon-lg"></i>
                    <span class="badge bg-danger rounded-pill">5</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            @if(auth()->user()->unreadNotifications->count())
                            <div class="col-auto">
                                <a href="#!" class="small text-reset text-decoration-underline"> Unread {{auth()->user()->unreadNotifications->count()}}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        @foreach(auth()->user()->notifications as $notification)
                        <li><a class="unread-notification"
                                href={{$notification->data['link']}}>{{$notification->data['data']}}</a></li>

                        <a href="{{$notification->data['link']}}" class="text-reset notification-item unread-notification">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ asset('miniadmin/images/users/avatar-3.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <!-- <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                        bx bx-badge-check
                                    </span>
                                </div> -->
                                <div class="flex-grow-1">
                                    <!-- <h6 class="mb-1">James Lemire</h6> -->
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">{{$notification->data['data']}}</p>
                                        <!-- <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour ago</span></p> -->
                                    </div>
                                </div>
                            </div>
                        </a>

                        @endforeach


                    </div>
                    <div class="p-2 border-top d-grid">
                        <!-- <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                        </a> -->

                        <span class="pull-right"><a href="{{route('clearAll')}}">{{__('Clear All')}}</a></span>
                        <span class="pull-left"><a href="{{route('seeAllNoti')}}">{{__('See All')}}</a></span>

                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item right-bar-toggle me-2">
                    <i data-feather="settings" class="icon-lg"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(!empty(auth()->user()->profile_photo))
                    <img class="rounded-circle header-profile-user" src="{{ asset('uploads/profile_photos/')}}/{{auth()->user()->profile_photo}}"
                        alt="Header Avatar">
                    @else
                    <img class="rounded-circle header-profile-user" src="{{ asset('miniadmin/images/users/avatar-1.jpg')}}"
                        alt="Header Avatar">
                    @endif

                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{auth()->user()->username}}.</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('profile')}}"><i class="mdi mdi mdi-face-man font-size-16 align-middle me-1"></i> Profile</a>
                    @if(auth()->user()->role_users_id == 1)
                    <a class="dropdown-item" href="{{route('export_database')}}"><i class="mdi mdi-file font-size-16 align-middle me-1"></i> Export Database</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        <button type="submit" class="dropdown-item"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>