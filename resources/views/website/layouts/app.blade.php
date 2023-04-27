@include('website.includes.header_style')

    <!-- Header Section Begin -->
    <header class="header-section">
@include('website.includes.header_info')
@include('website.includes.navbar')
    </header>
    <!-- Header End -->
@yield('content')
<!-- Partner Logo Section Begin -->
@include('website.includes.logo_footer')
<!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
@include('website.includes.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
@include('website.includes.script')
</body>
</html>
