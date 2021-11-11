<div class="logged_in_menu_container">
    <nav class="navbar navbar-expand-lg navbar-light top-navbar logged_in_menu">
        <ul class="nav-menu nav navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ asset('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('profile') ? 'active' : '' }}" href="{{ asset('profile') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('changepass') ? 'active' : '' }}" href="{{ asset('changepass') }}">Change Password</a>
            </li>
            @if($user && $user->advertiser == '1')
                <li class="nav-item">
                    <!-- <a class="nav-link  {{ request()->is('advert') ? 'active' : '' }}" href="javascript:void(0)">My Advert</a> -->
                    <a class="nav-link  {{ request()->is('advert') ? 'active' : '' }}" href="{{ asset('advert') }}">My Adverts</a>
                </li>
                <li class="nav-item">                    
                    <a class="nav-link  {{ request()->is('applicants') ? 'active' : '' }}" href="{{ asset('applicants') }}">View Applicants</a>
                </li>
            @endif
            @if($user && $user->sponser == '1')
                <li class="nav-item">                    
                    <a class="nav-link  {{ request()->is('msponsor') ? 'active' : '' }}" href="{{ asset('msponsor') }}">Manage Logo</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ request()->is('myevents') ? 'active' : '' }}" href="{{ asset('myevents') }}">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('transactions') ? 'active' : '' }}" href="{{ asset('transactions') }}">Transaction History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>                         
        </ul>
    </nav>
</div>