@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();


@endphp
<ul class="sidebar-menu" data-widget="tree">

    <li class="{{ ($route === 'dashboard') ? 'active':''}}">
        <a href="{{url('admin/dashboard')}}">
            <i data-feather="target"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview {{ ($prefix === '/brand') ? 'active':''}}">
        <a href="#">
            <i data-feather="grid"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ ($route === 'brand.index') ? 'active':''}}"><a href="{{route('brand.index')}}"><i
                        class="ti-more"></i>All Brands</a></li>
        </ul>
    </li>

    <li class="treeview {{ ($prefix === '/category') ? 'active':''}}">
        <a href="#">
            <i data-feather="layers"></i>
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
            <i data-feather="shopping-bag"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{($route==='product.insert') ? 'active':''}}"><a href="{{route('product.insert')}}"><i
                        class="ti-more"></i>Add Products</a></li>
            <li class="{{($route==='product.manage') ? 'active':'' }}"><a href="{{route('product.manage')}}"><i
                        class="ti-more"></i>Manage Products</a></li>
        </ul>
    </li>

    <li class="treeview {{($prefix === '/slider') ? 'active' : ''}}">
        <a href="#">
            <i data-feather="anchor"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{($route==='slider.insert') ? 'active':''}}"><a href="{{route('slider.insert')}}"><i
                        class="ti-more"></i>Add Slider</a></li>
            <li class="{{($route==='slider.manage') ? 'active':'' }}"><a href="{{route('slider.manage')}}"><i
                        class="ti-more"></i>Manage Slider</a></li>
        </ul>
    </li>

    <li class="treeview {{($prefix === '/coupons') ? 'active' : ''}}">
        <a href="#">
            <i data-feather="archive"></i> <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{($route==='coupon.manage') ? 'active':'' }}"><a href="{{route('coupon.manage')}}"><i
                        class="ti-more"></i>Manage Coupons</a></li>
        </ul>
    </li>
    <li class="treeview {{($prefix === '/shipping') ? 'active' : ''}}">
        <a href="#">
            <i data-feather="navigation"></i> <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{($route==='shipping-division.manage') ? 'active':'' }}"><a
                    href="{{route('shipping-division.manage')}}"><i
                        class="ti-more"></i>Shipping Division</a></li>
            <li class="{{($route==='shipping-district.manage') ? 'active':'' }}"><a
                    href="{{route('shipping-district.manage')}}"><i
                        class="ti-more"></i>Shipping District</a>
            </li>
            <li class="{{($route==='shipping-state.manage') ? 'active':'' }}"><a
                    href="{{route('shipping-state.manage')}}"><i
                        class="ti-more"></i>Shipping Sate</a></li>
        </ul>
    </li>
    <li class="treeview {{($prefix === '/orders') ? 'active' : ''}}">
        <a href="#">
            <i data-feather="truck"></i> <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{($route==='pending.orders') ? 'active':'' }}"><a href="{{route('pending.orders')}}"><i
                        class="ti-more"></i>Pending Orders</a></li>
            <li class="{{($route==='confirmed.orders') ? 'active':'' }}"><a href="{{route('confirmed.orders')}}"><i
                        class="ti-more"></i>Confirmed Orders</a></li>
            <li class="{{($route==='processing.orders') ? 'active':'' }}"><a href="{{route('processing.orders')}}"><i
                        class="ti-more"></i>Processing Orders</a></li>
            <li class="{{($route==='picked.orders') ? 'active':'' }}"><a href="{{route('picked.orders')}}"><i
                        class="ti-more"></i>Picked Orders</a></li>
            <li class="{{($route==='shipped.orders') ? 'active':'' }}"><a href="{{route('shipped.orders')}}"><i
                        class="ti-more"></i>Shipped Orders</a></li>
            <li class="{{($route==='delivered.orders') ? 'active':'' }}"><a href="{{route('delivered.orders')}}"><i
                        class="ti-more"></i>Delivered Orders</a></li>
            <li class="{{($route==='cancel.orders') ? 'active':'' }}"><a href="{{route('cancel.orders')}}"><i
                        class="ti-more"></i>Cancel Orders</a></li>
        </ul>
    </li>


    <li class="header nav-small-cap">User Interface</li>

    <li class="treeview">
        <a href="#">
            <i data-feather="package"></i>
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
