<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-shadow menu-border navbar-brand-center"
    role="navigation" data-menu="menu-wrapper">
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content center-layout" data-menu="menu-container">
        <!-- include ../../../includes/mixins-->
        <ul class="navigation-main nav navbar-nav" id="main-menu-navigation">

            <li class=" nav-item">
                <a class=" nav-link d-flex align-items-center" href="{{ route('indexPage') }}"><i
                        class="ft-home"></i><span data-i18n="Dashboard">الشاشة الرئيسية</span></a>
            </li>
            @if (Session::get('permission') == 'owner')
                <li class=" nav-item">
                    <a class=" nav-link d-flex align-items-center" href="{{ route('usersPage') }}"><i
                            class="ft-user"></i><span data-i18n="Dashboard">المستخدمون</span></a>
                </li>
            @endif

        </ul>
    </div>
</div>
