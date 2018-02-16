
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="{{route('dashboard-index')}}"><img src="{{ asset('/images/logo.jpg') }}" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="{{route('dashboard-index')}}"><img src="{{ asset('/images/logo.jpg') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav">
                <li class="nav-item dropdown d-none d-lg-flex">
                    <a class="nav-link  nav-btn"  href="#" >
                        <span class="btn">+ Campagne</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="icon-arrow-down mx-0"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon">
                                    <i class="icon-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <span class="preview-subject font-weight-medium">Votre compte</span>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon">
                                    <i class="icon-logout mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <span class="preview-subject font-weight-medium">Se déconnecter</span>
                            </div>
                        </a>
                    </div>
                </li>

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
