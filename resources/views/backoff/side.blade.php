
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
                <li class="nav-item">
                    <a class="nav-link collapsed " data-toggle="collapse" href="#ui-planning" aria-expanded="false" aria-controls="ui-advanced">
                        <i class="icon-calendar menu-icon"></i>
                        <span class="menu-title">Planning</span>
                    </a>
                    <div class="collapse" id="ui-planning" style="">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item @if( Route::currentRouteName() == 'planning-index' ) active @endif"><a class="nav-link" href="{{route('planning-index')}}"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;Calendrier</a></li>
                            <li class="nav-item @if( Route::currentRouteName() == 'timeline-index' ) active @endif"><a class="nav-link" href="{{route('timeline-index')}}"><i class="fa fa-tasks"></i>&nbsp;Timeline</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item d-none d-lg-block nav-item @if( Route::currentRouteName() == 'statistic-index' ) active @endif">
                    <a class="nav-link" href="{{route('statistic-index')}}">
                        <i class="icon-chart menu-icon"></i>
                        <span class="menu-title">Statistiques</span>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block nav-item @if( Route::currentRouteName() == 'lexique-index' ) active @endif">
                    <a class="nav-link" href="{{route('lexique-index')}}">
                        <i class="icon-book-open menu-icon"></i>
                        <span class="menu-title">Glossaire</span>
                    </a>
                </li>
                @if (auth()->user()->admin)
                <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
                        <i class="icon-settings menu-icon"></i>
                        <span class="menu-title">Paramètres</span>
                    </a>
                    <div class="collapse" id="ui-advanced" style="">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item @if( Route::currentRouteName() == 'users-index' ) active @endif"><a class="nav-link" href="{{route('users-index')}}"><i class="icon-people mr-2"></i>Utilisateurs</a></li>
                            <li class="nav-item @if( Route::currentRouteName() == 'services-index' ) active @endif"><a class="nav-link" href="{{route('services-index')}}"><i class="icon-organization mr-2"></i>Services</a></li>
                            <li class="nav-item @if( Route::currentRouteName() == 'channels-index' ) active @endif"><a class="nav-link" href="{{route('channels-index')}}"><i class="icon-energy mr-2"></i>Canaux</a></li>
                            <li class="nav-item @if( Route::currentRouteName() == 'markets-index' ) active @endif"><a class="nav-link" href="{{route('markets-index')}}"><i class="icon-bag mr-2"></i>Marchés</a></li>
                            <li class="nav-item @if( Route::currentRouteName() == 'parameters-index' ) active @endif"><a class="nav-link" href="{{route('parameters-index')}}"><i class="icon-equalizer mr-2"></i>Paramètres</a></li>
                        </ul>
                    </div>
                </li>
                @endif
            </ul>
        </nav>

