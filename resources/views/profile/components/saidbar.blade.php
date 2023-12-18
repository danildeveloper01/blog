<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('profile.index') }}" class="brand-link">
        <span class="brand-text font-weight-light ml-3">Admin BLog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column mt-3" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{ route('profile.like') }}" class="nav-link">
                    <p>My likes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.comment') }}" class="nav-link">
                    <p>My commentaries</p>
                </a>
            </li>

        </ul>

    </div>
    <!-- /.sidebar -->
</aside>
