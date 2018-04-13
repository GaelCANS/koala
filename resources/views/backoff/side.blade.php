
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link">
                        <div class="profile-image">
                            <img src="@if (auth()->user()->avatar){{ asset( URL::to('/').'/storage/'.auth()->user()->avatar ) }} @else {{ asset('/images/avatar-cans.png') }} @endif" alt="image" />
                        </div>
                        <div class="profile-name">
                            <p class="name">
                                @if (auth()->user())
                                    {{ auth()->user()->fullname }}
                                @endif
                            </p>
                            <p class="designation">
                                @if (auth()->user())
                                    {{ auth()->user()->load('Services')->Services->name }}
                                @endif
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
                <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
                        <i class="icon-settings menu-icon"></i>
                        <span class="menu-title">Paramètres</span>
                    </a>
                    <div class="collapse" id="ui-advanced" style="">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item "> <a class="nav-link" href="../../pages/ui-features/dragula.html"><i class="icon-people mr-2"></i>Utilisateurs</a></li>
                            <li class="nav-item @if( Route::currentRouteName() == 'services-index' ) active @endif"><a class="nav-link" href="{{route('services-index')}}"><i class="icon-organization mr-2"></i>Services</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/context-menu.html"><i class="icon-energy mr-2"></i>Canaux</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/slider.html"><i class="icon-bag mr-2"></i>Marchés</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>

