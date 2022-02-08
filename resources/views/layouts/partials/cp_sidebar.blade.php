<aside class="sidebar p-3 bg-light">
    <ul class="nav nav-pills flex-column flex-grow-1 font-weight-bold">
        <li>
            <a 
                href="{{ route('admin.home') }}"
                class="nav-link link-dark
                @if(Request::route()->getName() == 'admin.home') active @endif"
            >
                Dashboard
            </a>
        </li>
        <li class="@if(preg_match('/admin\/post/', Request::route()->uri)) active @endif">
            <a 
                href="{{ route('admin.posts.index') }}" 
                class="nav-link link-dark font-weight-bold
                @if(preg_match('/admin\/post/', Request::route()->uri)) active @endif"
            >
                Post
            </a>
            @if (preg_match('/admin\/post/', Request::route()->uri))
                <ul class="subnav flex-column py-2">
                    <li>
                        <a href="{{ route('admin.categories.index') }}">Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.tags.index') }}">Tags</a>
                    </li>
                </ul>
            @endif
        </li>
    </ul>
    <hr>
    <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
    </div>
</aside>