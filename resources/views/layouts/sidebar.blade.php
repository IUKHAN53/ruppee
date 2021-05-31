<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Rupp<span>ee</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>


            <li class="nav-item nav-category">Users Management</li>
            <li class="nav-item {{ active_class(['admin/users/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#users" role="button"
                   aria-expanded="{{ is_active_route(['users/*']) }}" aria-controls="general">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Users</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['users/*']) }}" id="users">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin-users') }}" class="nav-link {{ active_class(['users/index']) }}">View
                                Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-user-create') }}"
                               class="nav-link {{ active_class(['users/create']) }}">Create User</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Service Management</li>
            <li class="nav-item {{ active_class(['admin/services/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#services" role="button"
                   aria-expanded="{{ is_active_route(['admin/services/*']) }}" aria-controls="general">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Services</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['services/*']) }}" id="services">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin-services') }}"
                               class="nav-link {{ active_class(['admin/services']) }}">View Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-services-create') }}"
                               class="nav-link {{ active_class(['admin/services/create']) }}">Create Service</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Dispute Management</li>
            <li class="nav-item {{ active_class(['admin/disputes/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#disputes" role="button"
                   aria-expanded="{{ is_active_route(['admin/disputes/*']) }}" aria-controls="general">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Disputes</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['disputes/*']) }}" id="disputes">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin-disputes') }}"
                               class="nav-link {{ active_class(['admin/disputes']) }}">View Disputes</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-disputes-create') }}"
                               class="nav-link {{ active_class(['admin/disputes/create']) }}">Create Dispute</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
