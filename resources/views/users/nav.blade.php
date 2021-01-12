<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() == 'user.index' ? 'active' : '' }}" href="{{ route('user.index')}}" >
                            <i class="material-icons">people</i> Employees Stats
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() == 'schedule.index' ? 'active' : '' }}" href="{{ route('schedule.index')}}" >
                            <i class="material-icons">schedule</i> Schedules
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() == 'attendance.index' ? 'active' : '' }}" href="{{ route('attendance.index')}}" >
                            <i class="material-icons">spellcheck</i> Attendance
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() == 'expense.index' ? 'active' : '' }}" href="{{ route('expense.index')}}" >
                            <i class="material-icons">confirmation_number</i> Expenses
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>