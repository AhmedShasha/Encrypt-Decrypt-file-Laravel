<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo row">
                    <a href="" class="col-md-2 m-auto"><img src="{{ asset('dist/assets/images/logo/logo.png') }}"
                            alt="Logo" srcset="">
                    </a>
                    <h4 class="col-md-10 mt-3">AES-Algorithm</h4>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item active has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi fas fa-users"></i>
                        <span>Files</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="">
                                All Files</a>
                        </li>
                        
                    </ul>
                </li>

                <li class="sidebar-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="dropdown-item sidebar-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class=" bi fas fa-sign-out-alt"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>

    </div>
</div>
