<ul class="list-group">
    <li class="list-group-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-chart-line"></i>
            home
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.users.profile') }}">
            <i class="fas fa-user"></i>
            Profile
        </a>
    </li>
    @if(auth()->user()->admin)
        <li class="list-group-item">
            <a href="{{ route('admin.settings.index') }}">
                <i class="fas fa-cogs"></i>
                Settings
            </a>
        </li>    
        <li class="list-group-item">
            <a href="{{ route('admin.users.index') }}">
                <i class="fas fa-users"></i>
                Users
            </a>
        </li>
    @endif
    <li class="list-group-item">
        <a href="{{ route('admin.categories.index') }}">
            <i class="fas fa-tag"></i>
            Categories
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.tags.index') }}">
            <i class="fas fa-tags"></i>
            Tags
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.posts.index') }}">
            <i class="fas fa-newspaper"></i>
            Posts
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.posts.trashed') }}">
            <i class="fas fa-trash"></i>
            Trashed Posts
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.users.create') }}">
            <i class="fas fa-plus"></i>
            Create Users
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.categories.create') }}">
            <i class="fas fa-plus"></i>
            Create Category
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.tags.create') }}">
            <i class="fas fa-plus"></i>
            Create Tag
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.posts.create') }}">
            <i class="fas fa-plus"></i>
            Create Post
        </a>
    </li>
</ul>