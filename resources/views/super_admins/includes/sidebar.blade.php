
<style>
    .icon-size {
        font-size: 10px;
        padding-right: 3px;
    }

    .main-sidebar .brand-image {
        height: 24px;
    }

    .nav-link-active {
        background-color: rgba(255, 255, 255, .1);
        color: #fff;
    }
</style>
@php
    $site_logo = App\Models\GeneralSetting::where('name' , 'logo')->first();
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="{{ route('super_admin.dashboard') }}" class="d-flex flex-column align-items-center pt-3">
        <img src="{{ $site_logo && $site_logo->value ? asset($site_logo->value) : asset('images/logo.png')  }}" alt="zLogo" class="brand-image" style="height: 50px;">
        <!-- <span class="brand-text font-weight-light h5 mb-0 text-capitalize">
            {{ Auth::user()->name }}
        </span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div> --}}

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-sidebar">
             <i class="fas fa-search fa-fw"></i>
           </button>
         </div>
       </div>
     </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('super_admin.dashboard') }}"
                        class="nav-link @if (Route::is('super_admin.dashboard')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-home icon-size"></i>
                        <span class="text">
                            Dashboard
                        </span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('super_admin.customers.index') }}"
                        class="nav-link @if (Route::is('super_admin.customers.*')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-users icon-size"></i>
                        <span class="text">
                            Customers
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between @if (Route::is('super_admin.lawyers.*') ||
                            Route::is('super_admin.lawyer_categories.*') ||
                            Route::is('super_admin.lawyer_main_categories.*') ||
                            Route::is('super_admin.lawyer_posts.*') ||
                            Route::is('super_admin.lawyer_events.*') ||
                            Route::is('super_admin.lawyer_educations.*') ||
                            Route::is('super_admin.lawyer_certifications.*') ||
                            Route::is('super_admin.lawyer_experiences.*') ||
                            Route::is('super_admin.lawyer_broadcasts.*') ||
                            Route::is('super_admin.lawyer_podcasts.*') ||
                            Route::is('super_admin.lawyer_archives.*')) nav-link-active @endif"
                        data-toggle="collapse" href="#collapse100" role="button"
                        aria-expanded="@if (Route::is('super_admin.lawyers.*') ||
                                Route::is('super_admin.lawyer_categories.*') ||
                                Route::is('super_admin.lawyer_main_categories.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                        aria-controls="collapse100">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <span><i class="fa-solid fa-balance-scale icon-size"></i> <span
                                class="text">Lawyers</span></span>
                        <i class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.lawyers.*') ||
                            Route::is('super_admin.lawyer_categories.*') ||
                            Route::is('super_admin.lawyer_main_categories.*') ||
                            Route::is('super_admin.lawyer_posts.*') ||
                            Route::is('super_admin.lawyer_events.*') ||
                            Route::is('super_admin.lawyer_educations.*') ||
                            Route::is('super_admin.lawyer_certifications.*') ||
                            Route::is('super_admin.lawyer_experiences.*') ||
                            Route::is('super_admin.lawyer_broadcasts.*') ||
                            Route::is('super_admin.lawyer_podcasts.*') ||
                            Route::is('super_admin.lawyer_archives.*')) collapsed show @else collapse @endif"
                        id="collapse100">
                        <ul class="text-white">
                            <li><a href="{{ route('super_admin.lawyer_main_categories.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.lawyer_main_categories.*')) nav-link-sub-active @endif">
                                    Lawyer Main Categories</a></li>
                            <li><a href="{{ route('super_admin.lawyer_categories.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.lawyer_categories.*')) nav-link-sub-active @endif">
                                    Lawyer Categories</a></li>
                            <li>
                                <a href="{{ route('super_admin.lawyers.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.lawyers.*') ||
                                            Route::is('super_admin.lawyer_posts.*') ||
                                            Route::is('super_admin.lawyer_events.*') ||
                                            Route::is('super_admin.lawyer_educations.*') ||
                                            Route::is('super_admin.lawyer_certifications.*') ||
                                            Route::is('super_admin.lawyer_experiences.*') ||
                                            Route::is('super_admin.lawyer_broadcasts.*') ||
                                            Route::is('super_admin.lawyer_podcasts.*') ||
                                            Route::is('super_admin.lawyer_archives.*')) nav-link-sub-active @endif">Lawyers</a>

                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between @if (Route::is('super_admin.law_firms.*') ||
                            Route::is('super_admin.law_firm_categories.*') ||
                            Route::is('super_admin.law_firm_main_categories.*') ||
                            Route::is('super_admin.law_firm_posts.*') ||
                            Route::is('super_admin.law_firm_events.*') ||
                            Route::is('super_admin.law_firm_educations.*') ||
                            Route::is('super_admin.law_firm_certifications.*') ||
                            Route::is('super_admin.law_firm_experiences.*') ||
                            Route::is('super_admin.law_firm_broadcasts.*') ||
                            Route::is('super_admin.law_firm_podcasts.*') ||
                            Route::is('super_admin.law_firm_archives.*')) nav-link-active @endif"
                        data-toggle="collapse" href="#collapse101" role="button"
                        aria-expanded="@if (Route::is('super_admin.law_firms.*') ||
                                Route::is('super_admin.law_firm_categories.*') ||
                                Route::is('super_admin.law_firm_main_categories.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                        aria-controls="collapse101">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <span><i class="fa-solid fa-gavel icon-size"></i> <span class="text">LawFirms</span></span> <i
                            class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.law_firms.*') ||
                            Route::is('super_admin.law_firm_categories.*') ||
                            Route::is('super_admin.law_firm_main_categories.*') ||
                            Route::is('super_admin.law_firm_posts.*') ||
                            Route::is('super_admin.law_firm_events.*') ||
                            Route::is('super_admin.law_firm_educations.*') ||
                            Route::is('super_admin.law_firm_certifications.*') ||
                            Route::is('super_admin.law_firm_experiences.*') ||
                            Route::is('super_admin.law_firm_broadcasts.*') ||
                            Route::is('super_admin.law_firm_podcasts.*') ||
                            Route::is('super_admin.law_firm_archives.*')) collapsed show @else collapse @endif"
                        id="collapse101">
                        <ul class="text-white">
                            <li><a href="{{ route('super_admin.law_firm_main_categories.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.law_firm_main_categories.*')) nav-link-sub-active @endif">
                                    LawFirm Main Categories</a></li>
                            <li><a href="{{ route('super_admin.law_firm_categories.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.law_firm_categories.*')) nav-link-sub-active @endif">
                                    LawFirm Categories</a></li>
                            <li><a href="{{ route('super_admin.law_firms.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.law_firms.*') ||
                                            Route::is('super_admin.law_firm_posts.*') ||
                                            Route::is('super_admin.law_firm_events.*') ||
                                            Route::is('super_admin.law_firm_educations.*') ||
                                            Route::is('super_admin.law_firm_certifications.*') ||
                                            Route::is('super_admin.law_firm_experiences.*') ||
                                            Route::is('super_admin.law_firm_broadcasts.*') ||
                                            Route::is('super_admin.law_firm_podcasts.*') ||
                                            Route::is('super_admin.law_firm_archives.*')) nav-link-sub-active @endif">LawFirms</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between @if (Route::is('super_admin.events.*') || Route::is('super_admin.event_categories.*')) nav-link-active @endif"
                        data-toggle="collapse" href="#collapse106" role="button"
                        aria-expanded="@if (Route::is('super_admin.archives.*') || Route::is('super_admin.archive_categories.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                        aria-controls="collapse106">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <span><i class="fa-solid fa-calendar icon-size"></i><span class="text">Events</span></span> <i
                            class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.events.*') || Route::is('super_admin.event_categories.*')) collapsed show @else collapse @endif"
                        id="collapse106">
                        <ul class="text-white">
                            <li><a href="{{ route('super_admin.event_categories.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.event_categories.*')) nav-link-sub-active @endif">Event
                                    Categories</a></li>
                            <li><a href="{{ route('super_admin.events.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.events.*')) nav-link-sub-active @endif">Events</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('super_admin.booked_appointments.index') }}"
                        class="nav-link @if (Route::is('super_admin.booked_appointments.*')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-file-alt icon-size"></i>
                        <span class="text">
                            Booked Appointments
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between @if (Route::is('super_admin.podcasts.*') || Route::is('super_admin.podcast_categories.*')) nav-link-active @endif"
                        data-toggle="collapse" href="#collapse108" role="button"
                        aria-expanded="@if (Route::is('super_admin.podcasts.*') || Route::is('super_admin.podcast_categories.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                        aria-controls="collapse108">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <span><i class="fas fa-microphone icon-size"></i> <span class="text">Podcasts</span></span>
                        <i class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.podcasts.*') || Route::is('super_admin.podcast_categories.*')) collapsed show @else collapse @endif"
                        id="collapse108">
                        <ul class="text-white">
                            <li><a href="{{ route('super_admin.podcast_categories.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.podcast_categories.*')) nav-link-sub-active @endif">
                                    Podcast Categories</a></li>
                            <li><a href="{{ route('super_admin.podcasts.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.podcasts.*')) nav-link-sub-active @endif">Podcasts</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between @if (Route::is('super_admin.broadcasts.*') || Route::is('super_admin.broadcast_categories.*')) nav-link-active @endif"
                        data-toggle="collapse" href="#collapse111" role="button"
                        aria-expanded="@if (Route::is('super_admin.broadcasts.*') || Route::is('super_admin.broadcast_categories.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                        aria-controls="collapse111">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <span><i class="fa fa-camera icon-size"></i> <span class="text">Media</span></span> <i
                            class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.broadcasts.*') || Route::is('super_admin.broadcast_categories.*')) collapsed show @else collapse @endif"
                        id="collapse111">
                        <ul class="text-white">
                            <li><a href="{{ route('super_admin.broadcast_categories.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.broadcast_categories.*')) nav-link-sub-active @endif">
                                    Media Categories</a></li>
                            <li><a href="{{ route('super_admin.broadcasts.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.broadcasts.*')) nav-link-sub-active @endif">Media</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between @if (Route::is('super_admin.archive_categories.*')) nav-link-active @endif"  data-toggle="collapse" href="#collapse104" role="button" aria-expanded="@if (Route::is('super_admin.blog_categories.*') || Route::is('super_admin.archive_categories.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif" aria-controls="collapse104">
                    <span class="shape-1"></span>
                    <span class="shape-2"></span>
                    <span><i class="fa-solid fa-layer-group icon-size"></i> <span class="text">Misc. Categories</span></span> <i class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.archive_categories.*')) collapsed show @else collapse @endif" id="collapse104">
                        <ul class="text-white">
                            <li><a href="{{ route('super_admin.blog_categories.index') }}" class="nav-link-sub @if (Route::is('super_admin.blog_categories.*')) nav-link-sub-active @endif">Blog Categories</a></li>
                            <li><a href="{{ route('super_admin.archive_categories.index') }}" class="nav-link-sub @if (Route::is('super_admin.archive_categories.*')) nav-link-sub-active @endif">Archive Categories</a></li>
                        </ul>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a href="{{ route('super_admin.pricing_plans.index') }}"
                        class="nav-link @if (Route::is('super_admin.pricing_plans.*')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-money-bill icon-size"></i>
                        <span class="text">
                            Pricing Plans
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between @if (Route::is('super_admin.faqs.*') || Route::is('super_admin.faq_categories.*')) nav-link-active @endif"
                        data-toggle="collapse" href="#collapse102" role="button"
                        aria-expanded="@if (Route::is('super_admin.faqs.*') || Route::is('super_admin.faq_categories.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                        aria-controls="collapse102">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <span><i class="fa-solid fa-question-circle icon-size"></i> <span
                                class="text">FAQS</span></span>
                        <i class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.faqs.*') || Route::is('super_admin.faq_categories.*')) collapsed show @else collapse @endif"
                        id="collapse102">
                        <ul class="text-white">
                            <li><a href="{{ route('super_admin.faq_categories.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.faq_categories.*')) nav-link-sub-active @endif">
                                    FAQ Categories</a></li>
                            <li><a href="{{ route('super_admin.faqs.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.faqs.*')) nav-link-sub-active @endif">FAQS</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between @if (Route::is('super_admin.posts.*') || Route::is('super_admin.blog_categories.*')) nav-link-active @endif"
                        data-toggle="collapse" href="#collapse103" role="button"
                        aria-expanded="@if (Route::is('super_admin.posts.*') || Route::is('super_admin.blog_categories.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                        aria-controls="collapse103">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <span><i class="fa-solid fa-rss icon-size"></i><span class="text">Blogs</span></span>
                        <i class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.posts.*') || Route::is('super_admin.blog_categories.*')) collapsed show @else collapse @endif"
                        id="collapse103">
                        <ul class="text-white">
                            <li><a href="{{ route('super_admin.blog_categories.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.blog_categories.*')) nav-link-sub-active @endif">Blog
                                    Categories</a></li>
                            <li><a href="{{ route('super_admin.posts.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.posts.*')) nav-link-sub-active @endif">Blogs</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between @if (Route::is('super_admin.archives.*') || Route::is('super_admin.archive_categories.*')) nav-link-active @endif"
                        data-toggle="collapse" href="#collapse104" role="button"
                        aria-expanded="@if (Route::is('super_admin.archives.*') || Route::is('super_admin.archive_categories.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                        aria-controls="collapse104">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <span><i class="fa-solid fa-layer-group icon-size"></i><span
                                class="text">Courses</span></span> <i class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.archives.*') || Route::is('super_admin.archive_categories.*')) collapsed show @else collapse @endif"
                        id="collapse104">
                        <ul class="text-white">
                            <li><a href="{{ route('super_admin.archive_categories.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.archive_categories.*')) nav-link-sub-active @endif">Course
                                    Categories</a></li>
                            <li><a href="{{ route('super_admin.archives.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.archives.*')) nav-link-sub-active @endif">Courses</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('super_admin.users.index') }}" class="nav-link @if (Route::is('super_admin.users.*')) nav-link-active @endif">
                    <span class="shape-1"></span>
                    <span class="shape-2"></span>
                    <i class="fa-solid fa-users icon-size"></i>
                    <span class="text">
                        Users
                    </span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('super_admin.testimonials.index') }}"
                        class="nav-link @if (Route::is('super_admin.testimonials.*')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-quote-left icon-size"></i>
                        <span class="text">
                            Testimonials
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('super_admin.tags.index') }}"
                        class="nav-link @if (Route::is('super_admin.tags.*')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-tag icon-size"></i>
                        <span class="text">
                            Tags
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('super_admin.contacts.index') }}"
                        class="nav-link @if (Route::is('super_admin.contacts.*')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-comment icon-size"></i>
                        <span class="text">
                            Contacts
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('super_admin.company_pages.index') }}"
                        class="nav-link @if (Route::is('super_admin.company_pages.*')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-building icon-size"></i>
                        <span class="text">
                            Company Pages
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if (Route::is('super_admin.pages_contents.*')) nav-link-active @endif d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#collapse1010" role="button"
                        aria-expanded="@if (Route::is('super_admin.pages_contents.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                        aria-controls="collapse1010">
                        <span><i class="fa-solid fa-gear icon-size"></i> <span>Site Content</span></span>
                        <i class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.pages_contents.*')) collapsed show @else collapse @endif"
                        id="collapse1010">







                        <ul class="text-white">

                            <li class="nav-item">
                                <a class="nav-link text-white @if (Route::is('super_admin.pages_contents.*'))  @endif d-flex align-items-center justify-content-between"
                                    data-toggle="collapse" href="#collapse109" role="button"
                                    aria-expanded="@if (Route::is('super_admin.pages_contents.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                                    aria-controls="collapse109">
                                    <span>Sections</span></span>
                                    <i class="fa-solid fa-chevron-down"></i></a>
                                <div class="@if (Route::is('super_admin.pages_contents.*')) collapsed show @else collapse @endif"
                                    id="collapse109">
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'home_page_search') }}"
                                                class="nav-link-sub">Search</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'lawyer_mian_category') }}"
                                                class="nav-link-sub">Lawyer Main Categories</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'premium_lawyers') }}"
                                                class="nav-link-sub">Premium Lawyer</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'find_nearest_lawyers') }}"
                                                class="nav-link-sub">Nearest Lawyers</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'lawyers_tabs') }}"
                                                class="nav-link-sub">Lawyers Tabs</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'featured_law_firms') }}"
                                                class="nav-link-sub">Featured LawyerFirms</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'free_consultation') }}"
                                                class="nav-link-sub">Free Consultation</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'community_events') }}"
                                                class="nav-link-sub">Community Events</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'testimonials') }}"
                                                class="nav-link-sub">Testimonials</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'app_section') }}"
                                                class="nav-link-sub">App Section</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'faqs_section') }}"
                                                class="nav-link-sub">Faqs Section</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'general') }}"
                                                class="nav-link-sub">General Content</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'footer_section') }}"
                                                class="nav-link-sub">Footer Section</a></li>
                                    </ul>
                                </div>
                            </li>

                        </ul>



















                        <ul class="text-white">

                            <li class="nav-item">
                                <a class="nav-link text-white @if (Route::is('super_admin.pages_contents.*'))  @endif d-flex align-items-center justify-content-between"
                                    data-toggle="collapse" href="#collapse107" role="button"
                                    aria-expanded="@if (Route::is('super_admin.pages_contents.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                                    aria-controls="collapse107">
                                    <span>Pages</span></span>
                                    <i class="fa-solid fa-chevron-down"></i></a>
                                <div class="@if (Route::is('super_admin.pages_contents.*')) collapsed show @else collapse @endif"
                                    id="collapse107">
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li class="list-style-cicrle"><a
                                                href="{{ route('super_admin.pages_contents.get', 'categories_page') }}"
                                                class="nav-link-sub">Categories Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'lawyers_page') }}"
                                                class="nav-link-sub">Lawyers Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'law_firms_page') }}"
                                                class="nav-link-sub">LawFirms Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'events_page') }}"
                                                class="nav-link-sub">Events Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'faq_page') }}"
                                                class="nav-link-sub">Faqs Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'login_page') }}"
                                                class="nav-link-sub">Login Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'register_page') }}"
                                                class="nav-link-sub">Register Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li class="list-style-cicrle"><a
                                                href="{{ route('super_admin.pages_contents.get', 'contact_page') }}"
                                                class="nav-link-sub">Contact Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li class="list-style-cicrle"><a
                                                href="{{ route('super_admin.pages_contents.get', 'blog_page') }}"
                                                class="nav-link-sub">Blog Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li class="list-style-cicrle"><a
                                                href="{{ route('super_admin.pages_contents.get', 'media_page') }}"
                                                class="nav-link-sub">Media Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li class="list-style-cicrle"><a
                                                href="{{ route('super_admin.pages_contents.get', 'archives_page') }}"
                                                class="nav-link-sub">Courses Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'reset_password_page') }}"
                                                class="nav-link-sub">Reset Password Page</a></li>
                                    </ul>
                                    <ul class="text-white" style="list-style-type: circle">
                                        <li><a href="{{ route('super_admin.pages_contents.get', 'forgot_password_page') }}"
                                                class="nav-link-sub">Forgot Password Page</a></li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>






                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between @if (Route::is('super_admin.countries.*') ||
                            Route::is('super_admin.states.*') ||
                            Route::is('super_admin.cities.*') ||
                            Route::is('super_admin.languages.*')) nav-link-active @endif"
                        data-toggle="collapse" href="#collapse105" role="button"
                        aria-expanded="@if (Route::is('super_admin.countries.*') ||
                                Route::is('super_admin.states.*') ||
                                Route::is('super_admin.cities.*') ||
                                Route::is('super_admin.languages.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                        aria-controls="collapse105">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <span><i class="fa-solid fa-gear icon-size"></i> <span class="text">Admin</span></span> <i
                            class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.countries.*') ||
                            Route::is('super_admin.states.*') ||
                            Route::is('super_admin.cities.*') ||
                            Route::is('super_admin.languages.*')) collapsed show @else collapse @endif"
                        id="collapse105">
                        <ul class="text-white">
                            <li><a href="{{ route('super_admin.countries.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.countries.*')) nav-link-sub-active @endif">Countries</a>
                            </li>
                            <li><a href="{{ route('super_admin.states.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.states.*')) nav-link-sub-active @endif">States</a>
                            </li>
                            <li><a href="{{ route('super_admin.cities.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.cities.*')) nav-link-sub-active @endif">Cities</a>
                            </li>
                            <li><a href="{{ route('super_admin.languages.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.languages.*')) nav-link-sub-active @endif">Languages</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('super_admin.roles.index') }}" class="nav-link @if (Route::is('super_admin.roles.*')) nav-link-active @endif">
                    <span class="shape-1"></span>
                    <span class="shape-2"></span>
                    <i class="fa-solid fa-user-cog icon-size"></i>
                        <span class="text">
                            Roles
                        </span>
                    </a>
                </li> --}}
                <li class="nav-item mb-4">
                    <a class="nav-link d-flex align-items-center justify-content-between @if (Route::is('super_admin.general_settings.*') ||
                            Route::is('super_admin.specific_settings.social_media_settings.*') ||
                            Route::is('super_admin.specific_settings.configurations.*') ||
                            Route::is('super_admin.specific_settings.payment_method_settings.*')) nav-link-active @endif"
                        data-toggle="collapse" href="#collapse102" role="button"
                        aria-expanded="@if (Route::is('super_admin.general_settings.*') ||
                                Route::is('super_admin.specific_settings.social_media_settings.*') ||
                                Route::is('super_admin.specific_settings.configurations.*') ||
                                Route::is('super_admin.specific_settings.payment_method_settings.*')) @php echo 'true' @endphp@else@php echo 'false' @endphp @endif"
                        aria-controls="collapse102">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <span><i class="fa-solid fa-question-circle icon-size"></i> <span
                                class="text">Settings</span></span>
                        <i class="fa-solid fa-chevron-down"></i></a>
                    <div class="@if (Route::is('super_admin.general_settings.*') ||
                            Route::is('super_admin.specific_settings.social_media_settings.*') ||
                            Route::is('super_admin.specific_settings.configurations.*') ||
                            Route::is('super_admin.specific_settings.payment_method_settings.*')) collapsed show @else collapse @endif"
                        id="collapse102">
                        <ul class="text-white">

                            <li><a href="{{ route('super_admin.general_settings.index') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.general_settings.*')) nav-link-sub-active @endif">General
                                    Settings</a>
                            </li>
                            <li><a href="{{ route('super_admin.specific_settings.configurations') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.specific_settings.configurations.*')) nav-link-sub-active @endif">Configuration
                                    Settings</a>
                            </li>
                            <li><a href="{{ route('super_admin.specific_settings.social_media_settings') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.specific_settings.social_media_settings.*')) nav-link-sub-active @endif">
                                    Social media Settings</a></li>
                            <li><a href="{{ route('super_admin.specific_settings.payment_method_settings') }}"
                                    class="nav-link-sub @if (Route::is('super_admin.specific_settings.payment_method_settings.*')) nav-link-sub-active @endif">
                                    Payment Method Settings</a></li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('super_admin.general_settings.index') }}"
                        class="nav-link @if (Route::is('super_admin.general_settings.index')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-tools icon-size"></i>
                        <span class="text">
                            General Settings
                        </span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('super_admin.specific_settings.social_media_settings') }}"
                        class="nav-link @if (Route::is('super_admin.specific_settings.social_media_settings')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-tools icon-size"></i>
                        <span class="text">
                            Social media Settings
                        </span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('super_admin.specific_settings.configurations') }}"
                        class="nav-link @if (Route::is('super_admin.specific_settings.configurations')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-tools icon-size"></i>
                        <span class="text">
                            Configuration Settings
                        </span>
                    </a>
                </li> --}}
                <!-- <li class="nav-item">
                    <a href="{{ route('super_admin.specific_settings.footer_settings') }}"
                        class="nav-link @if (Route::is('super_admin.specific_settings.footer_settings')) nav-link-active @endif">
                        <span class="shape-1"></span>
                        <span class="shape-2"></span>
                        <i class="fa-solid fa-tools icon-size"></i>
                        <span class="text">
                            Footer Settings
                        </span>
                    </a>
                </li> -->
                {{-- <li class="nav-item">
                    <a href="{{ route('super_admin.specific_settings.home_page_statistics_settings') }}" class="nav-link @if (Route::is('super_admin.specific_settings.home_page_statistics_settings')) nav-link-active @endif">
                    <span class="shape-1"></span>
                    <span class="shape-2"></span>
                    <i class="fa-solid fa-tools icon-size"></i>
                        <span class="text">
                            Home Page Statistics Settings
                        </span>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
