
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link">
                        <div class="profile-image">
                            <img src="{{ asset('/images/faces/face10.jpg') }}" alt="image" />
                        </div>
                        <div class="profile-name">
                            <p class="name">
                                Vincent Timetre
                            </p>
                            <p class="designation">
                                Canaux Digitaux
                            </p>
                        </div>
                    </div>
                </li>


                <li class="nav-item @if( Route::currentRouteName() == 'dashboard-index' ) active @endif">
                    <a class="nav-link" href="{{route('dashboard-index')}}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Tableau de bord</span>
                    </a>
                </li>
                <li class="nav-item @if( Route::currentRouteName() == 'campaigns-index' ) active @endif">
                    <a class="nav-link" href="{{route('campaigns-index')}}">
                        <i class="icon-flag menu-icon"></i>
                        <span class="menu-title">Campagnes</span>
                    </a>
                </li>
                <li class="nav-item @if( Route::currentRouteName() == 'cmm-index' ) active @endif">
                    <a class="nav-link" href="{{route('cmm-index')}}">
                        <i class="icon-bubbles menu-icon"></i>
                        <span class="menu-title">CMM</span>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block nav-item @if( Route::currentRouteName() == 'planning-index' ) active @endif">
                    <a class="nav-link" href="{{route('planning-index')}}">
                        <i class="icon-calendar menu-icon"></i>
                        <span class="menu-title">Planning</span>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block nav-item @if( Route::currentRouteName() == 'statistic-index' ) active @endif">
                    <a class="nav-link" href="{{route('statistic-index')}}">
                        <i class="icon-chart menu-icon"></i>
                        <span class="menu-title">Statistiques</span>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block nav-item @if( Route::currentRouteName() == 'services-index' ) active @endif">
                    <a class="nav-link" href="{{route('services-index')}}">
                        <i class="icon-settings menu-icon"></i>
                        <span class="menu-title">Paramètres</span>
                    </a>
                </li>
            </ul>
        </nav>

