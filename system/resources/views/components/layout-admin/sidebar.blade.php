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
            <li class="nav-item dropdown">
              <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Home</div>
            </a>
            <ul class="dropdown-menu">
                <li> <a class="dropdown-item" href="{{url('admin')}}"><i class="bx bx-right-arrow-alt"></i>Home</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Cuti</div>
              </a>
              <ul class="dropdown-menu">
                <li> <a class="dropdown-item" href="{{url('admin/cuti')}}"><i class="bx bx-right-arrow-alt"></i>Cuti</a>
                </li>
                </ul>
              </li>
              
              <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Mutasi</div>
              </a>
              <ul class="dropdown-menu">
                <li> <a class="dropdown-item" href="{{url('admin/mutasi')}}"><i class="bx bx-right-arrow-alt"></i>Mutasi</a>
                </li>
                </ul>
              </li>
             <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Pajak SPT</div>
             </a>
              <ul class="dropdown-menu">
                <li> <a class="dropdown-item" href="{{url('admin/pajak  ')}}"><i class="bx bx-right-arrow-alt"></i>lapor Pajak</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Pensiun</div>
              </a>
              <ul class="dropdown-menu">
                <li> <a class="dropdown-item" href="{{url('admin/pensiun')}}"><i class="bx bx-right-arrow-alt"></i>Pensiun</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Akun Baru</div>
              </a>
              <ul class="dropdown-menu">
                <li> <a class="dropdown-item" href="{{url('admin/akun-baru')}}"><i class="bx bx-right-arrow-alt"></i>Akun Baru</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Tambah OPD</div>
              </a>
              <ul class="dropdown-menu">
                <li> <a class="dropdown-item" href="{{url('admin/tambah-opd')}}"><i class="bx bx-right-arrow-alt"></i>Tambah OPD</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Pengguna</div>
              </a>
              <ul class="dropdown-menu">
                <li> <a class="dropdown-item" href="{{url('#')}}"><i class="bx bx-right-arrow-alt"></i>Pengguna</a>
                </li>
              </ul>
            </li>
           
          </ul>
    </nav>
</div>