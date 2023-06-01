<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"
        content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title', 'لوحة التحكم')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets2/img/ico/favicon.ico') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('app-assets2/img/ico/favicon-32.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
        href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/fonts/feather/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets2/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/vendors/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/vendors/css/prism.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/vendors/css/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/vendors/css/chartist.min.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/css-rtl/themes/layout-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets2/css-rtl/plugins/switchery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/css-rtl/custom-rtl.css') }}">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/css-rtl/core/menu/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets2/css-rtl/pages/dashboard1.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style-rtl.css">
    <!-- END: Custom CSS-->
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('style')
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns  navbar-sticky" data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">

    <nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-fixed">
        <div class="container-fluid navbar-wrapper">
            <div class="navbar-header d-flex">
                <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center"
                    data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
                <ul class="navbar-nav">
                    <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen"
                            id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a>
                    </li>
                    {{-- <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="javascript:"><i
                                class="ft-search font-medium-3"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="ft-search font-medium-3"></i></div>
                            <input class="input" type="text" placeholder="Explore Apex..." tabindex="0"
                                data-search="template-search">
                            <div class="search-input-close"><i class="ft-x font-medium-3"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li> --}}
                </ul>
                <div class="navbar-brand-center">
                    <div class="navbar-header">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <div class="logo">
                                    <a class="logo-text" href="{{ route('indexPage') }}">
                                        <span class="text">لوحة التحكم</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="navbar-container">
                <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
                    <ul class="navbar-nav">

                        <li class="dropdown nav-item"><a
                                class="nav-link dropdown-toggle dropdown-notification p-0 mt-2" id="dropdownBasic1"
                                href="javascript:;" data-toggle="dropdown"><i class="ft-bell font-medium-3"></i><span
                                    class="notification badge badge-pill badge-danger">18</span></a>

                            {{-- <ul
                                class="notification-dropdown dropdown-menu dropdown-menu-media dropdown-menu-right m-0 overflow-hidden">
                                <li class="dropdown-menu-header">
                                    <div
                                        class="dropdown-header d-flex justify-content-between m-0 px-3 py-2 white bg-primary">
                                        <div class="d-flex"><i
                                                class="ft-bell font-medium-3 d-flex align-items-center mr-2"></i><span
                                                class="noti-title">7 New Notification</span></div><span
                                            class="text-bold-400 cursor-pointer">Mark all as read</span>
                                    </div>
                                </li>
                                <li class="scrollable-container"><a class="d-flex justify-content-between"
                                        href="javascript:void(0)">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left">
                                                <div class="mr-3">
                                                    <img class="avatar"
                                                        src="{{ asset('app-assets2/img/portrait/small/avatar-s-20.png') }}"
                                                        alt="avatar" height="45" width="45">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0"><span>Kate Young</span><small
                                                        class="grey lighten-1 font-italic float-right">5 mins
                                                        ago</small></h6><small class="noti-text">Commented on your
                                                    photo</small>
                                                <h6 class="noti-text font-small-3 m-0">Great Shot John! Really enjoying
                                                    the composition on this piece.</h6>
                                            </div>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left">
                                                <div class="mr-3"><img class="avatar"
                                                        src="{{ asset('app-assets2/img/portrait/small/avatar-s-11.png') }}"
                                                        alt="avatar" height="45" width="45"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0"><span>Andrew Watts</span><small
                                                        class="grey lighten-1 font-italic float-right">49 mins
                                                        ago</small></h6><small class="noti-text">Liked your album:
                                                    UI/UX Inspo</small>
                                            </div>
                                        </div>
                                    </a><a class="d-flex justify-content-between read-notification"
                                        href="javascript:void(0)">
                                        <div class="media d-flex align-items-center py-0 pr-0">
                                            <div class="media-left">
                                                <div class="mr-3"><img
                                                        src="{{ asset('app-assets2/img/icons/sketch-mac-icon.png') }}"
                                                        alt="avatar" height="45" width="45"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0">Update</h6><small class="noti-text">MyBook
                                                    v2.0.7</small>
                                            </div>
                                            <div class="media-right">
                                                <div class="border-left">
                                                    <div class="px-4 py-2 border-bottom">
                                                        <h6 class="m-0 text-bold-600">Update</h6>
                                                    </div>
                                                    <div class="px-4 py-2 text-center">
                                                        <h6 class="m-0">Close</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a><a class="d-flex justify-content-between read-notification"
                                        href="javascript:void(0)">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left">
                                                <div class="avatar bg-primary bg-lighten-3 mr-3 p-1"><span
                                                        class="avatar-content font-medium-2">LD</span></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0"><span>Registration done</span><small
                                                        class="grey lighten-1 font-italic float-right">6 hrs
                                                        ago</small></h6>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="cursor-pointer">
                                        <div class="media d-flex align-items-center justify-content-between">
                                            <div class="media-left">
                                                <div class="media-body">
                                                    <h6 class="m-0">New Offers</h6>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <div class="custom-control custom-switch">
                                                    <input class="switchery" type="checkbox" checked
                                                        id="notificationSwtich" data-size="sm">
                                                    <label for="notificationSwtich"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between cursor-pointer read-notification">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left">
                                                <div class="avatar bg-danger bg-lighten-4 mr-3 p-1"><span
                                                        class="avatar-content font-medium-2"><i
                                                            class="ft-heart text-danger"></i></span></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0"><span>Application approved</span><small
                                                        class="grey lighten-1 font-italic float-right">18 hrs
                                                        ago</small></h6>
                                            </div>
                                        </div>
                                    </div><a class="d-flex justify-content-between read-notification"
                                        href="javascript:void(0)">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left">
                                                <div class="mr-3"><img class="avatar"
                                                        src="{{ asset('app-assets2/img/portrait/small/avatar-s-6.png') }}"
                                                        alt="avatar" height="45" width="45"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0"><span>Anna Lee</span><small
                                                        class="grey lighten-1 font-italic float-right">27 hrs
                                                        ago</small></h6><small class="noti-text">Commented on your
                                                    photo</small>
                                                <h6 class="noti-text font-small-3 text-bold-500 m-0">Woah!Loving these
                                                    colors! Keep it up</h6>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="d-flex justify-content-between cursor-pointer read-notification">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left">
                                                <div class="avatar bg-info bg-lighten-4 mr-3 p-1">
                                                    <div class="avatar-content font-medium-2"><i
                                                            class="ft-align-left text-info"></i></div>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0"><span>Report generated</span><small
                                                        class="grey lighten-1 font-italic float-right">35 hrs
                                                        ago</small></h6>
                                            </div>
                                        </div>
                                    </div><a class="d-flex justify-content-between read-notification"
                                        href="javascript:void(0)">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left">
                                                <div class="mr-3"><img class="avatar"
                                                        src="{{ asset('app-assets2/img/portrait/small/avatar-s-7.png') }}"
                                                        alt="avatar" height="45" width="45"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0"><span>Oliver Wright</span><small
                                                        class="grey lighten-1 font-italic float-right">2 days
                                                        ago</small></h6><small class="noti-text">Liked your album:
                                                    UI/UX Inspo</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-menu-footer">
                                    <div
                                        class="noti-footer text-center cursor-pointer primary border-top text-bold-400 py-1">
                                        Read All Notifications</div>
                                </li>
                            </ul> --}}



                            <ul
                                class="notification-dropdown dropdown-menu dropdown-menu-media dropdown-menu-right m-0 overflow-hidden">

                                <li class="dropdown-menu-header">
                                    <a href="{{ route('notificationPage') }}">
                                        <div
                                            class="dropdown-header d-flex justify-content-between m-0 px-3 py-2 white bg-primary">
                                            <div class="d-flex">
                                                <i
                                                    class="ft-bell font-medium-3 d-flex align-items-center mr-2"></i><span
                                                    class="noti-title">جميع الاشعارات</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="scrollable-container">

                                    <div class="d-flex justify-content-between">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-body">
                                                <h6 class="m-0"><span>عنوان الاشعار</span><small
                                                        class="grey lighten-1 font-italic float-right">منذ 5د</small>
                                                </h6>
                                                <h6 class="noti-text font-small-3 m-0">تفاصيل الاشعار 1</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-body">
                                                <h6 class="m-0"><span>عنوان الاشعار</span><small
                                                        class="grey lighten-1 font-italic float-right">منذ 5د</small>
                                                </h6>
                                                <h6 class="noti-text font-small-3 m-0">تفاصيل الاشعار 1</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-body">
                                                <h6 class="m-0"><span>عنوان الاشعار</span><small
                                                        class="grey lighten-1 font-italic float-right">منذ 5د</small>
                                                </h6>
                                                <h6 class="noti-text font-small-3 m-0">تفاصيل الاشعار 1</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-body">
                                                <h6 class="m-0"><span>عنوان الاشعار</span><small
                                                        class="grey lighten-1 font-italic float-right">منذ 5د</small>
                                                </h6>
                                                <h6 class="noti-text font-small-3 m-0">تفاصيل الاشعار 1</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-body">
                                                <h6 class="m-0"><span>عنوان الاشعار</span><small
                                                        class="grey lighten-1 font-italic float-right">منذ 5د</small>
                                                </h6>
                                                <h6 class="noti-text font-small-3 m-0">تفاصيل الاشعار 1</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-body">
                                                <h6 class="m-0"><span>عنوان الاشعار</span><small
                                                        class="grey lighten-1 font-italic float-right">منذ 5د</small>
                                                </h6>
                                                <h6 class="noti-text font-small-3 m-0">تفاصيل الاشعار 1</h6>
                                            </div>
                                        </div>
                                    </div>






                                </li>


                            </ul>





                        </li>
                        <li class="dropdown nav-item mr-1"><a
                                class="nav-link dropdown-toggle user-dropdown d-flex align-items-end"
                                id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                                <div class="user d-md-flex d-none mr-2"><span
                                        class="text-right">{{ Session::get('username') }}</span><span
                                        class="text-right text-muted font-small-3">متصل</span></div><img
                                    class="avatar" src="{{ asset(Session::get('image')) }}" alt="avatar"
                                    height="35" width="35">
                            </a>
                            <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0"
                                aria-labelledby="dropdownBasic2">
                                {{-- <a class="dropdown-item" href="app-chat.html">
                                    <div class="d-flex align-items-center"><i
                                            class="ft-message-square mr-2"></i><span>Chat</span></div>
                                </a> --}}
                                <a class="dropdown-item" href="{{ route('profilePage') }}">
                                    {{-- <a class="dropdown-item" href="{{ route('profile') }}"> --}}
                                    <div class="d-flex align-items-center"><i class="ft-edit mr-2"></i><span>تعديل
                                            الملف الشخصي</span></div>
                                </a>
                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                    href="{{ route('goOutProg') }}">
                                    <div class="d-flex align-items-center"><i class="ft-power mr-2"></i><span>تسجيل
                                            الخروج</span></div>
                                </a>
                            </div>
                        </li>
                        {{-- <li class="nav-item d-none d-lg-block mr-2 mt-1"><a
                                class="nav-link notification-sidebar-toggle" href="javascript:;"><i
                                    class="ft-align-right font-medium-3"></i></a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar (Header) Ends-->

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


        @include('partials.headerapex')


        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <!--Statistics cards Starts-->
                    @yield('content')


                </div>
            </div>
            <!-- END : End Main Content-->

            <!-- BEGIN : Footer-->


            @include('partials.footerapex')

            <!-- End : Footer-->
            <!-- Scroll to top button -->
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- START Notification Sidebar-->
    <aside class="notification-sidebar d-none d-sm-none d-md-block" id="notification-sidebar"><a
            class="notification-sidebar-close"><i class="ft-x font-medium-3 grey darken-1"></i></a>
        <div class="side-nav notification-sidebar-content">
            <div class="row">
                <div class="col-12 notification-nav-tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" id="base-tab1" data-toggle="tab"
                                aria-controls="activity-tab" href="#activity-tab" aria-expanded="true">Activity</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="base-tab2" data-toggle="tab"
                                aria-controls="settings-tab" href="#settings-tab" aria-expanded="false">Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 notification-tab-content">
                    <div class="tab-content">
                        <div class="row tab-pane active" id="activity-tab" role="tabpanel" aria-expanded="true"
                            aria-labelledby="base-tab1">
                            <div class="col-12" id="activity">
                                <h5 class="my-2 text-bold-500">System Logs</h5>
                                <div class="timeline-left timeline-wrapper mb-3" id="timeline-1">
                                    <ul class="timeline">
                                        <li class="timeline-line mt-4"></li>
                                        <li class="timeline-item">
                                            <div class="timeline-badge"><span class="bg-primary bg-lighten-4"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Portfolio project work"><i
                                                        class="ft-download primary"></i></span></div>
                                            <div class="activity-list-text">
                                                <h6 class="mb-1"><span>New Update Available</span><span
                                                        class="float-right grey font-italic font-small-2">1 min
                                                        ago</span></h6>
                                                <p class="mt-0 mb-2 font-small-3">Android Pie 9.0.0_r52v availabe
                                                    (658MB).</p>
                                                <div class="notification-note">
                                                    <div class="p-1 pl-2"><span class="text-bold-500">Download
                                                            Now!</span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-badge"><span class="bg-primary bg-lighten-4"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Portfolio project work"><img class="avatar"
                                                        src="{{ asset('app-assets2/img/portrait/small/avatar-s-15.png') }}"
                                                        alt="avatar" width="40"></span></div>
                                            <div class="activity-list-text">
                                                <h6 class="mb-1"><span>Reminder!</span><span
                                                        class="float-right grey font-italic font-small-2">52 min
                                                        ago</span></h6>
                                                <p class="mt-0 mb-2 font-small-3">Your meeting is scheduled with Mr.
                                                    Derrick Walters at 16:00.</p>
                                                <div class="notification-note">
                                                    <div class="p-1 pl-2"><span class="text-bold-500">Snooze</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-badge"><span class="bg-primary bg-lighten-4"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Portfolio project work"><img class="avatar"
                                                        src="{{ asset('app-assets2/img/portrait/small/avatar-s-16.png') }}"
                                                        alt="avatar" width="40"></span></div>
                                            <div class="activity-list-text">
                                                <h6 class="mb-1"><span>Recieved a File</span><span
                                                        class="float-right grey font-italic font-small-2">4 hours
                                                        ago</span></h6>
                                                <p class="mt-0 mb-2 font-small-3">Christina Rogers sent you a file for
                                                    the next conference.</p>
                                                <div class="notification-note">
                                                    <div class="p-1 pl-2"><img
                                                            src="{{ asset('app-assets2/img/icons/sketch-mac-icon.png') }}"
                                                            alt="icon" width="20"><span
                                                            class="text-bold-500 ml-2">Diamond.sketch</span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-badge"><span class="bg-primary bg-lighten-4"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Portfolio project work"><i
                                                        class="ft-mic primary"></i></span>
                                            </div>
                                            <div class="activity-list-text">
                                                <h6 class="mb-1"><span>Voice Message</span><span
                                                        class="float-right grey font-italic font-small-2">10 hours
                                                        ago</span></h6>
                                                <p class="mt-0 mb-2 font-small-3">Natalya Parker sent you a voice
                                                    message.</p>
                                                <div class="notification-note">
                                                    <div class="p-1 pl-2"><span class="text-bold-500">Listen</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-badge"><span class="bg-primary bg-lighten-4"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Portfolio project work"><i
                                                        class="ft-cloud-drizzle primary"></i></span></div>
                                            <div class="activity-list-text">
                                                <h6 class="mb-1"><span>Weather Update</span><span
                                                        class="float-right grey font-italic font-small-2">Yesterday</span>
                                                </h6>
                                                <p class="mt-0 mb-2 font-small-3">Hi John! It is a rainy day with
                                                    16&deg;C.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <h5 class="my-2 text-bold-500">Applications Logs</h5>
                                <div class="timeline-left timeline-wrapper" id="timeline-2">
                                    <ul class="timeline">
                                        <li class="timeline-line mt-4"></li>
                                        <li class="timeline-item">
                                            <div class="timeline-badge"><span class="bg-primary bg-lighten-4"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Portfolio project work"><img class="avatar"
                                                        src="{{ asset('app-assets2/img/portrait/small/avatar-s-26.png') }}"
                                                        alt="avatar" width="40"></span></div>
                                            <div class="activity-list-text">
                                                <h6 class="mb-1"><span>Gmail</span><span
                                                        class="float-right grey font-italic font-small-2">Just
                                                        now</span></h6>
                                                <p class="mt-0 mb-2 font-small-3">Victoria Hampton sent you a mail and
                                                    has a file attachment with it.</p>
                                                <div class="notification-note">
                                                    <div class="p-1 pl-2"><img
                                                            src="{{ asset('app-assets2/img/icons/pdf.png') }}"
                                                            alt="pdf icon" width="20"><span
                                                            class="text-bold-500 ml-2">Register.pdf</span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-badge"><span class="bg-primary bg-lighten-4"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Portfolio project work"><i
                                                        class="ft-droplet primary"></i></span></div>
                                            <div class="activity-list-text">
                                                <h6 class="mb-1"><span>MakeMyTrip</span><span
                                                        class="float-right grey font-italic font-small-2">7 hours
                                                        ago</span></h6>
                                                <p class="mt-0 mb-2 font-small-3">Your next flight for San Francisco
                                                    will be on 24th March.</p>
                                                <div class="notification-note">
                                                    <div class="p-1 pl-2"><span class="text-bold-500">Important</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-badge"><span class="bg-primary bg-lighten-4"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Portfolio project work"><img class="avatar"
                                                        src="{{ asset('app-assets2/img/portrait/small/avatar-s-23.png') }}"
                                                        alt="avatar" width="40"></span></div>
                                            <div class="activity-list-text">
                                                <h6 class="mb-1"><span>CNN</span><span
                                                        class="float-right grey font-italic font-small-2">16 hours
                                                        ago</span></h6>
                                                <p class="mt-0 mb-2 font-small-3">U.S. investigating report says email
                                                    account linked to CIA Director was hacked.</p>
                                                <div class="notification-note">
                                                    <div class="p-1 pl-2"><span class="text-bold-500">Read full
                                                            article</span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-badge"><span class="bg-primary bg-lighten-4"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Portfolio project work"><i
                                                        class="ft-map primary"></i></span>
                                            </div>
                                            <div class="activity-list-text">
                                                <h6 class="mb-1"><span>Maps</span><span
                                                        class="float-right grey font-italic font-small-2">Yesterday</span>
                                                </h6>
                                                <p class="mt-0 mb-2 font-small-3">You visited Walmart Supercenter in
                                                    Chicago.</p>
                                                <div class="notification-note">
                                                    <div class="p-1 pl-2"><span class="text-bold-500">Write a
                                                            Review!</span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-badge"><span class="bg-primary bg-lighten-4"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Portfolio project work"><i
                                                        class="ft-package primary"></i></span></div>
                                            <div class="activity-list-text">
                                                <h6 class="mb-1"><span>Updates Available</span><span
                                                        class="float-right grey font-italic font-small-2">2 days
                                                        ago</span></h6>
                                                <p class="mt-0 mb-2 font-small-3">19 app updates found.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row tab-pane" id="settings-tab" aria-labelledby="base-tab2">
                            <div class="col-12" id="settings">
                                <h5 class="mt-2 mb-3">General Settings</h5>
                                <ul class="list-unstyled mb-0 mx-2">
                                    <li class="mb-3">
                                        <div class="mb-1"><span class="text-bold-500">Notifications</span>
                                            <div class="float-right">
                                                <div class="custom-switch">
                                                    <input class="custom-control-input" id="noti-s-switch-1"
                                                        type="checkbox">
                                                    <label class="custom-control-label" for="noti-s-switch-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="font-small-3 m-0">Use switches when looking for yes or no answers.
                                        </p>
                                    </li>
                                    <li class="mb-3">
                                        <div class="mb-1"><span class="text-bold-500">Show recent activity</span>
                                            <div class="float-right">
                                                <div class="checkbox">
                                                    <input id="noti-s-checkbox-1" type="checkbox" checked>
                                                    <label for="noti-s-checkbox-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="font-small-3 m-0">The "for" attribute is necessary to bind checkbox
                                            with the input.</p>
                                    </li>
                                    <li class="mb-3">
                                        <div class="mb-1"><span class="text-bold-500">Product Update</span>
                                            <div class="float-right">
                                                <div class="custom-switch">
                                                    <input class="custom-control-input" id="noti-s-switch-4"
                                                        type="checkbox" checked>
                                                    <label class="custom-control-label" for="noti-s-switch-4"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="font-small-3 m-0">Message and mail me on weekly product updates.</p>
                                    </li>
                                    <li class="mb-3">
                                        <div class="mb-1"><span class="text-bold-500">Email on Follow</span>
                                            <div class="float-right">
                                                <div class="custom-switch">
                                                    <input class="custom-control-input" id="noti-s-switch-3"
                                                        type="checkbox">
                                                    <label class="custom-control-label" for="noti-s-switch-3"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="font-small-3 m-0">Mail me when someone follows me.</p>
                                    </li>
                                    <li class="mb-3">
                                        <div class="mb-1"><span class="text-bold-500">Announcements</span>
                                            <div class="float-right">
                                                <div class="checkbox">
                                                    <input id="noti-s-checkbox-2" type="checkbox" checked>
                                                    <label for="noti-s-checkbox-2"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="font-small-3 m-0">Receive all the news and announcements from my
                                            clients.</p>
                                    </li>
                                    <li class="mb-3">
                                        <div class="mb-1"><span class="text-bold-500">Date and Time</span>
                                            <div class="float-right">
                                                <div class="checkbox">
                                                    <input id="noti-s-checkbox-3" type="checkbox">
                                                    <label for="noti-s-checkbox-3"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="font-small-3 m-0">Show date and time on top of every page.</p>
                                    </li>
                                    <li>
                                        <div class="mb-1"><span class="text-bold-500">Email on Comments</span>
                                            <div class="float-right">
                                                <div class="custom-switch">
                                                    <input class="custom-control-input" id="noti-s-switch-2"
                                                        type="checkbox" checked>
                                                    <label class="custom-control-label" for="noti-s-switch-2"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="font-small-3 m-0">Mail me when someone comments on my article.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- END Notification Sidebar-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN VENDOR JS-->

    @yield('script')
    {{--  <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $('#sl').click(function() {
            $('#tl').loadingBtn();
            $('#tb').loadingBtn({
                text: "Signing In"
            });
        });

        $('#el').click(function() {
            $('#tl').loadingBtnComplete();
            $('#tb').loadingBtnComplete({
                html: "Sign In"
            });
        });

        $('#demoDate').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

        $('#demoSelect').select2();
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>  --}}
    <script src="{{ asset('app-assets2/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets2/vendors/js/switchery.min.js') }}"></script>

    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>




    {{--  <script>
        let ultrasonic = 0;
        let mq4 = 0;
        let mq7 = 0;
        let flame = 0;
        let temperature = 0;
        let humidity = 0;
        let ldr = 0;

        function fetchDataForInsert() {
            fetch('http://localhost/laravel-projects/Esp32/public/get_things_data')
                .then(response => response.json())
                .then(data => {
                    ultrasonic = data.distance;
                    mq4 = data.gas;
                    mq7 = data.carbon;
                    flame = data.flame;
                    temperature = data.temperature;
                    humidity = data.humidity;
                    ldr = 12321;
                });
        }

        function data_sensor_insert() {
            fetch('http://localhost/laravel-projects/MyAPIs/public/api/data_sensor_insert', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    ultrasonic,
                    mq4,
                    mq7,
                    flame,
                    temperature,
                    humidity,
                    ldr
                })
            })
        }

        setInterval(fetchDataForInsert, 15000);
        setInterval(data_sensor_insert, 15000);
    </script>  --}}







    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('app-assets2/vendors/js/chartist.min.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="{{ asset('app-assets2/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets2/js/core/app.js') }}"></script>
    <script src="{{ asset('app-assets2/js/notification-sidebar.js') }}"></script>
    <script src="{{ asset('app-assets2/js/customizer.js') }}"></script>
    <script src="{{ asset('app-assets2/js/scroll-top.js') }}"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('app-assets2/js/dashboard1.js') }}"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN: Custom CSS-->
    <script src="../../../assets/js/scripts.js"></script>
    <!-- END: Custom CSS-->
</body>
<!-- END : Body-->

</html>
