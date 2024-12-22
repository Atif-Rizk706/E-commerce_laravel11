<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('/admincss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{route('admin.dashboard')}}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{route('admin.view_category')}}"> <i class="icon-grid"></i>Add Category </a></li>
        <li><a href="{{route('admin.manage_category')}}"> <i class="icon-grid"></i>Manage Category </a></li>
        <li><a href="{{route('admin.all_orders')}}"> <i class="icon-grid"></i>All orders </a></li>

        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Product </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.add_product') }}">Add product</a></li>
                <li><a href="{{ route('admin.show_product') }}">Show Products</a></li>
            </ul>
        </li>
    </ul>
</nav>
