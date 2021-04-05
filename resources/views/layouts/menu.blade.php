<li class="nav-item {{ Request::is('articles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('articles.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Articles</span>
    </a>
</li>
<li class="nav-item {{ Request::is('articleContents*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('articleContents.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Article Contents</span>
    </a>
</li>
