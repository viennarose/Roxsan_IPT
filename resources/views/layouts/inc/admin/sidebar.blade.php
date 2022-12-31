@include('layouts.inc.admin.navbar')

<nav class="sidebar sidebar-offcanvas nav-pills sidebar-fill bg-dark shadow-lg" id="sidebar">
    <ul class="nav mt-4 text-light">
      <li class="nav-item border-0">
        <a class="nav-link" href="{{url('/home')}}">
          <i class="mdi mdi-home menu-icon" style="color:white"></i>
          <span class="menu-title text-light">Dashboard</span>
        </a>
      </li>
      @role('user')
      <li class="nav-item border-0">
        <a class="nav-item nav-link " href="{{url('/posts')}}">
            <i class="bi bi-calendar3"></i>
          <span class="menu-title text-light ms-4">My Posts</span>
        </a>
      </li>
      @endrole
      @role('admin')
      <li class="nav-item border-0">
        <a class="nav-item nav-link " href="{{url('/posts')}}">
            <i class="bi bi-calendar3"></i>
          <span class="menu-title text-light ms-4">All Posts</span>
        </a>
      </li>
      @endrole
      <hr>
    </ul>
  </nav>
