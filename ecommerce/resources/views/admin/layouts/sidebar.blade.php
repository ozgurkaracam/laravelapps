<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{asset('/admin/img/logo/logo2.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3">E-Commerce</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
           aria-expanded="true" aria-controls="collapseCategory">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Categories</h6>
                <a class="collapse-item" href="{{route('categories.index')}}">All Categories</a>
                <a class="collapse-item" href="{{route('categories.create')}}"> Add Category</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subcategories"
           aria-expanded="true" aria-controls="subcategories">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Sub Categories</span>
        </a>
        <div id="subcategories" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub Categories</h6>
                <a class="collapse-item" href="{{route('subcategories.index')}}">All Sub Categories</a>
                <a class="collapse-item" href="{{route('subcategories.create')}}">Add Sub Categories</a>
            </div>
        </div>

    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products"
           aria-expanded="true" aria-controls="products">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Products</span>
        </a>
        <div id="products" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Products</h6>
                <a class="collapse-item" href="{{route('products.index')}}">All Products</a>
                <a class="collapse-item" href="{{route('products.create')}}">Add Product</a>
            </div>
        </div>

    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
           aria-controls="collapseForm">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Forms</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Forms</h6>
                <a class="collapse-item" href="form_basics.html">Form Basics</a>
                <a class="collapse-item" href="form_advanceds.html">Form Advanceds</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
           aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tables</h6>
                <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
                <a class="collapse-item" href="datatables.html">DataTables</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
            <i class="fas fa-fw fa-palette"></i>
            <span>UI Colors</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Examples
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
           aria-controls="collapsePage">
            <i class="fas fa-fw fa-columns"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Example Pages</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->