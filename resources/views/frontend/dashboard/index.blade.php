@extends('frontend.dashboard.layouts.master')

@section('content')
    <!-- Dashboard Nav Start -->
    <div class="dashboard-nav bg-white flx-between gap-md-3 gap-2">
        <div class="dashboard-nav__left flx-align gap-md-3 gap-2">
            <button type="button" class="icon-btn bar-icon text-heading bg-gray-seven flx-center">
                <i class="las la-bars"></i>
            </button>
            <button type="button" class="icon-btn arrow-icon text-heading bg-gray-seven flx-center">
                <img src="assets/frontend//images/icons/angle-right.svg" alt="">
            </button>
            <form action="#" class="search-input d-sm-block d-none">
                <span class="icon">
                    <img src="assets/frontend//images/icons/search-dark.svg" alt="" class="white-version">
                    <img src="assets/frontend//images/icons/search-dark-white.svg" alt="" class="dark-version">
                </span>
                <input type="text" class="common-input common-input--md common-input--bg pill w-100"
                    placeholder="Search here...">
            </form>
        </div>
        <div class="dashboard-nav__right">
            <div class="header-right flx-align">
                <div class="header-right__inner gap-sm-3 gap-2 flx-align d-flex">

                    <div class="user-profile">
                        <button class="user-profile__button flex-align">
                            <span class="user-profile__thumb">
                                <img src="assets/frontend//images/thumbs/user-profile.png" class="cover-img" alt="">
                            </span>
                        </button>
                        <ul class="user-profile-dropdown">
                            <li class="sidebar-list__item">
                                <a href="dashboard-profile.html" class="sidebar-list__link">
                                    <span class="sidebar-list__icon">
                                        <img src="assets/frontend//images/icons/sidebar-icon2.svg" alt=""
                                            class="icon">
                                        <img src="assets/frontend//images/icons/sidebar-icon-active2.svg" alt=""
                                            class="icon icon-active">
                                    </span>
                                    <span class="text">Profile</span>
                                </a>
                            </li>

                            <li class="sidebar-list__item">
                                <a href="setting.html" class="sidebar-list__link">
                                    <span class="sidebar-list__icon">
                                        <img src="assets/frontend//images/icons/sidebar-icon10.svg" alt=""
                                            class="icon">
                                        <img src="assets/frontend//images/icons/sidebar-icon-active10.svg" alt=""
                                            class="icon icon-active">
                                    </span>
                                    <span class="text">Settings</span>
                                </a>
                            </li>
                            <li class="sidebar-list__item">
                                <a href="login.html" class="sidebar-list__link">
                                    <span class="sidebar-list__icon">
                                        <img src="assets/frontend//images/icons/sidebar-icon13.svg" alt=""
                                            class="icon">
                                        <img src="assets/frontend//images/icons/sidebar-icon-active13.svg" alt=""
                                            class="icon icon-active">
                                    </span>
                                    <span class="text">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="language-select flx-align select-has-icon">
                        <img src="assets/frontend//images/icons/globe.svg" alt="" class="globe-icon white-version">
                        <img src="assets/frontend//images/icons/globe-white.svg" alt=""
                            class="globe-icon dark-version">
                        <select class="select py-0 ps-2 border-0 fw-500">
                            <option value="1">Eng</option>
                            <option value="2">Bn</option>
                            <option value="3">Eur</option>
                            <option value="4">Urd</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard Nav End -->


    <div class="dashboard-body__content">

        <!-- welcome balance Content Start -->
        <div class="welcome-balance mt-2 mb-40 flx-between gap-2">
            <div class="welcome-balance__left">
                <h4 class="welcome-balance__title mb-0">Welcome back! Michel</h4>
            </div>
            <div class="welcome-balance__right flx-align gap-2">
                <span class="welcome-balance__text fw-500 text-heading">Available Balance:</span>
                <h4 class="welcome-balance__balance mb-0">$580.00</h4>
            </div>
        </div>
        <!-- welcome balance Content End -->

        <div class="dashboard-body__item-wrapper">

            <!-- dashboard body Item Start -->
            <div class="dashboard-body__item">
                <div class="row gy-4">
                    <div class="col-xl-3 col-sm-6">
                        <div class="dashboard-widget green">
                            <span class="dashboard-widget__icon">
                                <i class="ti ti-list-details"></i>
                            </span>
                            <div class="dashboard-widget__content flx-between gap-1 align-items-end">
                                <div>
                                    <h4 class="dashboard-widget__number mb-1 mt-3">2M+</h4>
                                    <span class="dashboard-widget__text font-14">Total Products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="dashboard-widget orange">
                            <span class="dashboard-widget__icon">
                                <i class="ti ti-currency-dollar"></i>
                            </span>
                            <div class="dashboard-widget__content flx-between gap-1 align-items-end">
                                <div>
                                    <h4 class="dashboard-widget__number mb-1 mt-3">$5289.00</h4>
                                    <span class="dashboard-widget__text font-14">Total Earnings</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="dashboard-widget blue">
                            <span class="dashboard-widget__icon">
                                <i class="ti ti-download"></i>
                            </span>
                            <div class="dashboard-widget__content flx-between gap-1 align-items-end">
                                <div>
                                    <h4 class="dashboard-widget__number mb-1 mt-3">5,2458</h4>
                                    <span class="dashboard-widget__text font-14">Total Downloads</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="dashboard-widget red">
                            <span class="dashboard-widget__icon">
                                <i class="ti ti-basket-check"></i>
                            </span>
                            <div class="dashboard-widget__content flx-between gap-1 align-items-end">
                                <div>
                                    <h4 class="dashboard-widget__number mb-1 mt-3">2,589</h4>
                                    <span class="dashboard-widget__text font-14">Total Sales</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- dashboard body Item End -->



        </div>
    </div>
@endsection
