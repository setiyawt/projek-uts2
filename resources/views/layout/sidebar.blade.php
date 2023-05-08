  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="{{Request::is('dashboard')?'nav-link':'nav-link collapsed'}}" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="{{Request::is('kategori','produk')?'nav-link':'nav-link collapsed'}}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="{{Request::is('kategori','produk')?'nav-content collapse show':'nav-content collapse'}}" data-bs-parent="#sidebar-nav">

          <li>
            <a href="{{ route('kategori.index') }}" class="{{Request::is('kategori')?'active':''}}">
              <i class="bi bi-circle"></i><span>Daftar Kategori</span>
            </a>
          </li>

          <li>
            <a href="{{ route('produk.index') }}" class="{{Request::is('produk')?'active':''}}">
              <i class="bi bi-circle"></i><span>Daftar Produk</span>
            </a>
          </li>

        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="{{Request::is('admin')?'nav-link':'nav-link collapsed'}}" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-kanban"></i><span>Pengelolaan Admin</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="{{Request::is('admin')?'nav-content collapse show':'nav-content collapse'}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin" class="{{Request::is('admin')?'active':''}}">
              <i class="bi bi-circle"></i><span>Data Admin</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="{{Request::is('user')?'nav-link':'nav-link collapsed'}}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-badge"></i><span>Pengelolaan User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="{{Request::is('user')?'nav-content collapse show':'nav-content collapse'}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/user" class="{{Request::is('user')?'active':''}}">
              <i class="bi bi-circle"></i><span>Data User</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/profile/{{ auth()->user()->id }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-right"></i>
          <span>Sign Out</span>
        </a>
      </li>
      <!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
