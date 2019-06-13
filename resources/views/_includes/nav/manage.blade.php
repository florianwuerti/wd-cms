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

            <li><a href="#" class="has-submenu">Posts</a>
                <ul class="submenu">
                    <li><a href="#" class="">All Posts</a></li>
                    <li><a href="#" class="">Add new Post</a></li>
                </ul>
            </li>
            <li><a href="#" class="has-submenu">Pages</a>
                <ul class="submenu">
                    <li><a href="#" class="">All Pages</a></li>
                    <li><a href="#" class="">Add new Page</a></li>
                </ul>
            </li>
        </ul>

        <p class="menu-label">
            Users
        </p>
        <ul class="menu-list">
            <li>
                <a class="has-submenu">Users</a>
                <ul class="submenu">
                    <li><a href="{{route('users.index')}}" class="">All Users</a></li>
                    <li><a href="{{route('users.create')}}" class="">Add new User</a></li>
                    <li><a href="{{route('users.edit' , Auth::user()->id)}}" class="">Your Profile</a></li>
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