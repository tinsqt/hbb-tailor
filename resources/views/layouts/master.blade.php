<!DOCTYPE html>
<html>
@include('partial.head')
<body class="theme-red body-content">
<!-- Page Loader -->
{{--@include('partial.page_loader')--}}
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
@include('partial.search')
<!-- #END# Search Bar -->
<!-- Top Bar -->
@include('partial.top_bar')
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
    @include('partial.user_info')
    <!-- #User Info -->
        <!-- Menu -->
    @include('partial.menu')
    <!-- #Menu -->
        <!-- Footer -->
    @include('partial.footer')
    <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
@include('partial.right_sidebar')
<!-- #END# Right Sidebar -->
</section>
@hasSection('content')
    @yield('content')
@else
    Có lỗi trong quá trình đọc nội dung
@endif
@include('partial.js')
@yield('js')
<!--End Home-->
</body>

</html>