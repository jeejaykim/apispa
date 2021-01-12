<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() == 'reservation.index' ? 'active' : '' }}" href="{{ route('reservation.index')}}" >
                            <i class="material-icons">calendar_today</i> RESERVATIONS
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() == 'category.index' ? 'active' : '' }}" href="{{ route('category.index')}}" >
                            <i class="material-icons">list</i> CATEGORIES
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() == 'service.index' ? 'active' : '' }}" href="{{ route('service.index')}}" >
                            <i class="material-icons">spa</i> SERVICES
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() == 'addon.index' ? 'active' : '' }}" href="{{ route('addon.index')}}" >
                            <i class="material-icons">add</i> ADD-ONS
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>