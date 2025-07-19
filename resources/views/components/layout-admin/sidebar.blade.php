<div class="nav-container primary-menu">
    <div class="mobile-topbar-header">
        <div>
            <img src="{{url('public/template/admin')}}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <nav class="navbar navbar-expand-xl w-100">
      <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="{{ url('admin') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Home</div>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/cuti*') ? 'active' : '' }}" href="{{ url('admin/cuti') }}">
                <div class="parent-icon"><i class='bx bx-cart'></i></div>
                <div class="menu-title">Cuti</div>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/mutasi*') ? 'active' : '' }}" href="{{ url('admin/mutasi') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">Mutasi</div>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/pajak*') ? 'active' : '' }}" href="{{ url('admin/pajak') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Pajak SPT</div>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/pensiun*') ? 'active' : '' }}" href="{{ url('admin/pensiun') }}">
                <div class="parent-icon"><i class="bx bx-line-chart"></i></div>
                <div class="menu-title">Pensiun</div>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/akun-baru*') ? 'active' : '' }}" href="{{ url('admin/akun-baru') }}">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i></div>
                <div class="menu-title">Akun Baru Sintari</div>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/tambah-opd*') ? 'active' : '' }}" href="{{ url('admin/tambah-opd') }}">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i></div>
                <div class="menu-title">Tambah OPD</div>
            </a>
        </li>
        
    
    </nav>
</div>