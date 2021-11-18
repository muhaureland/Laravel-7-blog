<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class=active><a class="nav-link" href="{{route('home')}}"><i class="fas fa-fire"></i> <span>Blank Page</span></a></li>
        <li class="menu-header">Starter</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-address-card"></i> <span>Post</span></a>
          <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('post.index') }}">List post</a></li>
            <li><a class="nav-link" href="{{ route('post.tes') }}">Recycle bin</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kategori</span></a>
          <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('category.index') }}">List kategori</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Tag</span></a>
          <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('tag.index') }}">List tag</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>User</span></a>
          <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('user.index') }}">List User</a></li>
        </ul>
        </li>
    </aside>
</div>
