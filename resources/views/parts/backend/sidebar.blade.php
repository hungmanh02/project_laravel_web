<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Tổng Quan
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                @include('parts.backend.menu-item',[
                    'title' =>'Chuyên mục',
                    'name' => 'categories'
                    ])
                @include('parts.backend.menu-item',[
                    'title' =>'Khóa học',
                    'name' => 'courses'
                    ])
                @include('parts.backend.menu-item',[
                    'title' =>'Giảng viên',
                    'name' => 'teachers'
                    ])
                @include('parts.backend.menu-item',[
                    'title' =>'Người dùng',
                    'name' => 'users'
                    ])
                @include('parts.backend.menu-item',[
                    'title' =>'Danh mục bài viết',
                    'name' => 'category-posts'
                    ])
                @include('parts.backend.menu-item',[
                    'title' =>'Bài viết',
                    'name' => 'posts'
                    ])
                @include('parts.backend.menu-item',[
                    'title' =>'Tùy chọn',
                    'name' => 'options'
                    ])
                @include('parts.backend.menu-item',[
                    'title' =>'Nhóm',
                    'name' => 'groups'
                    ])
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Đăng nhập:</div>
            {{Auth::user()->name}}
        </div>
    </nav>
</div>
