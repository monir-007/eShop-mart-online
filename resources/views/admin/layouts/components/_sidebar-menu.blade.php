@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();


@endphp
<ul class="sidebar-menu" data-widget="tree">

    <li class="{{ ($route === 'dashboard') ? 'active':''}}">
        <a href="{{url('admin/dashboard')}}">
            <i data-feather="pie-chart"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview {{ ($prefix === '/brand') ? 'active':''}}">
        <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ ($route === 'brand.index') ? 'active':''}}"><a href="{{route('brand.index')}}"><i
                        class="ti-more"></i>All Brands</a></li>
            <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li>
        </ul>
    </li>

    <li class="treeview {{ ($prefix === '/category') ? 'active':''}}">
        <a href="#">
            <i data-feather="message-circle"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ ($route === 'category.index') ? 'active':''}}"><a href="{{route('category.index')}}"><i
                        class="ti-more"></i>Categories</a></li>
            <li class="{{ ($route === 'subcategory.index') ? 'active':''}}"><a href="{{route('subcategory.index')}}"><i
                        class="ti-more"></i>Subcategories</a></li>
            <li class="{{ ($route === 'sub-subcategory.index') ? 'active':''}}"><a
                    href="{{route('sub-subcategory.index')}}"><i
                        class="ti-more"></i>Sub-subcategories</a></li>
        </ul>
    </li>

    <li class="treeview {{($prefix === '/product') ? 'active' : ''}}">
        <a href="#">
            <i data-feather="mail"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{($route==='product.insert') ? 'active':''}}"><a href="{{route('product.insert')}}"><i
                        class="ti-more"></i>Add Products</a></li>
            <li><a href="mailbox_compose.html"><i class="ti-more"></i>Compose</a></li>
            <li><a href="mailbox_read_mail.html"><i class="ti-more"></i>Read</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i data-feather="file"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="profile.html"><i class="ti-more"></i>Profile</a></li>
            <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
            <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
            <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
            <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li>
        </ul>
    </li>

    <li class="header nav-small-cap">User Interface</li>

    <li class="treeview">
        <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
            <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
            <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
        </ul>
    </li>

</ul>
