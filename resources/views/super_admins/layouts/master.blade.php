@include('super_admins.includes.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
<img class="animation__shake" src="{{asset('images/logo_dark.png')}}" alt="Consultant" height="50">
</div>
@include('super_admins.includes.navbar')
@include('super_admins.includes.sidebar')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper p-lg-4">
     @yield('content')
</div>
@include('super_admins.includes.footer')
@include('super_admins.includes.foot')
