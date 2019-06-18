<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{route('manage.dashboard')}}">
            <img src="#" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
           data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div class="navbar-menu">
        @guest
            <div class="navbar-start">
                <a class="navbar-item is-tab is-active">Learn</a>
                <a class="navbar-item is-tab">Discuss</a>
                <a class="navbar-item is-tab">Share</a>
            </div> <!-- end of .navbar-start -->
        @endguest

        <div class="navbar-end nav-menu" style="overflow: visible">
            @guest
                <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
                <a href="{{route('register')}}" class="navbar-item is-tab">Join the Community</a>
            @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">{{Auth::user()->first_name}}</a>
                    <div class="navbar-dropdown is-right">
                        <a href="{{route('users.show' , Auth::user()->id)}}" class="navbar-item"><span class="icon"><i
                                        class="fa fa-fw fa-user-circle-o m-r-5"></i></span>Profile</a>
                        <a href="#" class="navbar-item"><span class="icon"><i class="fa fa-fw fa-bell m-r-5"></i></span>Notifications</a>
                        <a href="{{route('manage.dashboard')}}" class="navbar-item"><span class="icon"><i
                                        class="fa fa-fw fa-cog m-r-5"></i></span>Manage</a>
                        <hr class="navbar-divider">
                        <a href="{{route('manage.logout')}}" class="navbar-item"><span class="icon"><i
                                        class="fa fa-fw fa-sign-out m-r-5"></i></span>Logout</a>
                        <!--@//include('_includes.forms.logout')-->
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>