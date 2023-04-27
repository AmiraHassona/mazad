<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu">
                <a href="#datatables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span>DataTables</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="datatables" data-parent="#accordionExample">
                    <li>
                        <a href="{{route('admin.countries.index')}}">Countries</a>
                    </li>
                    <li>
                        <a href="{{route('admin.uploads.index')}}">Uploads</a>
                    </li>
                    <li>
                        <a href="{{route('admin.brands.index')}}">Brands</a>
                    </li>
                    <li>
                        <a href="{{route('admin.categories.index')}}">Categories</a>
                    </li>
                    <li>
                        <a href="{{route('admin.products.index')}}">Products</a>
                    </li>
                </ul>
            </li>

        </ul>
        <!-- <div class="shadow-bottom"></div> -->

    </nav>

</div>
