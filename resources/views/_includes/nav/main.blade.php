<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{route('manage.dashboard')}}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 217.67 65.68" width="100">
                <defs>
                    <style>.cls-1 {
                            fill: #083651;
                        }

                        .cls-2 {
                            font-size: 59.77px;
                            fill: #f6a028;
                            font-family: FrutigerLTPro-Black, Frutiger LT Pro;
                            font-weight: 800;
                        }</style>
                </defs>
                <title>WD CMS Logo</title>
                <g id="Ebene_2" data-name="Ebene 2">
                    <g id="Ebene_1-2" data-name="Ebene 1">
                        <path class="cls-1"
                              d="M33.83,50.74,28.49,27.89h-.12l-6,22.85H9.7L0,19.16H11.4l5.09,22.73h.12l5.46-22.73H35.16L40.5,41.89h.12l5-22.73H56.14L46.5,50.74Z"/>
                        <path class="cls-1"
                              d="M84,50.74V45.1h-.12c-1.58,3.82-6.13,6.37-10.86,6.37-9.09,0-14.42-7.4-14.42-17.1,0-8.06,5-15.94,13.51-15.94,5.16,0,8.43,1.64,10.86,4.79h.12V5.27H94V50.74ZM83.12,35c0-4.73-2.61-8.24-6.73-8.24-3.82,0-6.55,3.21-6.55,7.82,0,5.09,2.55,8.48,6.61,8.48C80.21,43.1,83.12,39.53,83.12,35Z"/>
                        <text class="cls-2" transform="translate(98.14 50.74)">cms</text>
                    </g>
                </g>
            </svg>
            <!--<img src="#" width="112" height="28">-->
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
           data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div class="navbar-menu">

        <ul>
            @foreach($pages as $page)


                <li id="page-{{$loop->iteration}}">
                    <a href="{{$page->page_slug}}">{{$page->page_title}}</a>
                </li>
            @endforeach
        </ul>
        <!-- end of .navbar-start -->

        @auth()
            <div class="navbar-end nav-menu" style="overflow: visible">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        @if(Auth::user()->image)
                            <img src="{{asset('/uploads/images/'. Auth::user()->image)}}" class="m-r-5 is-rounded"
                                 alt=""/>
                        @endif
                        {{Auth::user()->first_name}}
                    </a>
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
            </div>
        @endauth
    </div>
</nav>