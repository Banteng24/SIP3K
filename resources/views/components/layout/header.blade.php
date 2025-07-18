<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn">
                <i class="bx bx-menu"></i>
            </a>
        </div>

        {{-- <div class="flex-grow-1 search-bar">
            <div class="input-group">
                <button class="btn btn-search-back search-arrow-back" type="button">
                    <i class="bx bx-arrow-back"></i>
                </button>
                <input type="text" class="form-control" placeholder="search" />
                <button class="btn btn-search" type="button">
                    <i class="lni lni-search-alt"></i>
                </button>
            </div>
        </div> --}}

        <div class="right-topbar ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item search-btn-mobile">
                    <a class="nav-link position-relative" href="javascript:;">
                        <i class="bx bx-search vertical-align-middle"></i>
                    </a>
                </li>

                {{-- <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-bs-toggle="dropdown">
                        <i class="bx bx-bell vertical-align-middle"></i>
                        <span class="msg-count">8</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <h6 class="msg-header-title">8 New</h6>
                                <p class="msg-header-subtitle">Application Notifications</p>
                            </div>
                        </a>

                        <div class="header-notifications-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify bg-light-primary text-primary">
                                        <i class="bx bx-group"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Customers
                                            <span class="msg-time float-end">14 Sec ago</span>
                                        </h6>
                                        <p class="msg-info">5 new user registered</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify bg-light-danger text-danger">
                                        <i class="bx bx-cart-alt"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Orders
                                            <span class="msg-time float-end">2 min ago</span>
                                        </h6>
                                        <p class="msg-info">You have received new orders</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify bg-light-shineblue text-shineblue">
                                        <i class="bx bx-file"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">24 PDF File
                                            <span class="msg-time float-end">19 min ago</span>
                                        </h6>
                                        <p class="msg-info">The pdf files generated</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify bg-light-cyne text-cyne">
                                        <i class="bx bx-send"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Time Response
                                            <span class="msg-time float-end">28 min ago</span>
                                        </h6>
                                        <p class="msg-info">5.1 min average time response</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify bg-light-purple text-purple">
                                        <i class="bx bx-home-circle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Product Approved
                                            <span class="msg-time float-end">2 hrs ago</span>
                                        </h6>
                                        <p class="msg-info">Your new product has been approved</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify bg-light-warning text-warning">
                                        <i class="bx bx-message-detail"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Comments
                                            <span class="msg-time float-end">4 hrs ago</span>
                                        </h6>
                                        <p class="msg-info">New customer comments received</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify bg-light-success text-success">
                                        <i class="bx bx-check-square"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Your item is shipped
                                            <span class="msg-time float-end">5 hrs ago</span>
                                        </h6>
                                        <p class="msg-info">Successfully shipped your item</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify bg-light-sinata text-sinata">
                                        <i class="bx bx-user-pin"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New 24 authors
                                            <span class="msg-time float-end">1 day ago</span>
                                        </h6>
                                        <p class="msg-info">24 new authors joined last week</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify bg-light-mehandi text-mehandi">
                                        <i class="bx bx-door-open"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Defense Alerts
                                            <span class="msg-time float-end">2 weeks ago</span>
                                        </h6>
                                        <p class="msg-info">45% less alerts last 4 weeks</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <a href="javascript:;" class="text-center msg-footer">View All Notifications</a>
                    </div>
                </li> --}}
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                        <div class="d-flex user-box align-items-center">
                            <div class="user-info">
                                <p class="user-name mb-0">User</p>
                                <p class="designation mb-0">Admin Opd</p>
                            </div>
                            <img src="{{ url('public/template/user/assets/images/icons/dinas.jpeg') }}" class="user-img" alt="user avatar" />
                        </div>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{'user/ profile'}}">
                            <i class="bx bx-user"></i><span>Profile</span>
                        </a>

                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" class="dropdown-item" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bx bx-power-off"></i> <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
