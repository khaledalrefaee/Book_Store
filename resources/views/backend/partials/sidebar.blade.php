<div class="sidebar">


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('all.users')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('all.books')}}" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Books</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Category')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('all.sliders')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sliders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('manage-cities')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>cities</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('manage-addresses')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>addresses</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('pending-orders')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>pinding orders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('confirmed-orders')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>confirmed orders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('picked-orders')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>picked orders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('shipped-orders')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>shipped orders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('delivered-orders')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>delivered orders</p>
                        </a>
                    </li>




                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
