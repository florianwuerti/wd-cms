<div class="side-menu" id="admin-side-menu">
    <aside class="menu m-t-30 m-l-10">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a href="{{route('manage.dashboard')}}" class="">Dashboard</a></li>
        </ul>

        <p class="menu-label">
            Content
        </p>
        <ul class="menu-list">

            <li><a class="has-submenu {{Nav::hasSegment(['posts'], 2)}}">Posts</a>
                <ul class="submenu">
                    <li><a href="{{route('posts.index')}}" class="{{Nav::isRoute('posts.index')}}">All Posts</a></li>
                    <li><a href="{{route('posts.create')}}" class="{{Nav::isRoute('posts.create')}}">Add new Post</a>
                    </li>
                </ul>
            </li>
            <li><a class="has-submenu" {{Nav::hasSegment(['pages'], 2)}}>Pages</a>
                <ul class="submenu">
                    <li><a href="{{route('pages.index')}}" class="{{Nav::isRoute('pages.index')}}">All Pages</a></li>
                    <li><a href="{{route('pages.index')}}" class="{{Nav::isRoute('pages.create')}}">Add new Page</a>
                    </li>
                </ul>
            </li>
        </ul>

        <p class="menu-label">
            Users
        </p>
        <ul class="menu-list">
            <li>
                <a class="has-submenu {{Nav::hasSegment(['users'], 2)}}">Users</a>
                <ul class="submenu">
                    <li><a href="{{route('users.index')}}" class="{{Nav::isRoute('users.index')}}">All Users</a></li>
                    <li><a href="{{route('users.create')}}" class="{{Nav::isRoute('users.create')}}">Add new User</a>
                    </li>
                    @if(Auth::user()->id == Request::segment(3))
                        <li><a href="{{route('users.show' , Auth::user()->id)}}" class='is-active'>Your Profile</a></li>
                    @else
                        <li><a href="{{route('users.show' , Auth::user()->id)}}" class=''>Your Profile</a></li>
                    @endauth
                </ul>
            </li>
        </ul>
        <p class="menu-label">
            Seetings
        </p>
        <ul class="menu-list">
            <li>
                <a class="has-submenu ">Settings</a>
                <ul class="submenu">
                    <li><a href="#" class="">General</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>