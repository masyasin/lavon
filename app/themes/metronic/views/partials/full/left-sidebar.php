<div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            <li class="sidebar-search-wrapper">
                                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                    <a href="javascript:;" class="remove">
                                        <i class="icon-close"></i>
                                    </a>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form>
                                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                            </li>
                            <li class="nav-item start ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-wrench"></i>
                                    <span class="title">Pengaturan</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item start ">
                                        <a href="{{ base_url }}grup" class="nav-link ">
                                            <i class="icon-users"></i>
                                            <span class="title">Grup</span>
                                        </a>
                                    </li>
                                    <li class="nav-item start ">
                                        <a href="{{ base_url }}pengguna" class="nav-link ">
                                            <i class="icon-user"></i>
                                            <span class="title">Pengguna</span>
                                            <!-- <span class="badge badge-success">1</span> -->
                                        </a>
                                    </li>
                                    <li class="nav-item start ">
                                        <a href="{{ base_url }}setting" class="nav-link ">
                                            <i class="icon-settings"></i>
                                            <span class="title">Setting</span>
                                            <!-- <span class="badge badge-danger">5</span> -->
                                        </a>
                                    </li>
                                </ul>
                            </li>
                          <!--   <li class="heading">
                                <h3 class="uppercase">Aplikasi</h3>
                            </li> -->
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-globe"></i>
                                    <span class="title">Transaksi</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ base_url }}member/entry" class="nav-link ">
                                            <span class="title">Entri Card/Member</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ base_url }}transaksi/poin" class="nav-link ">
                                            <span class="title">Fasilitas Member/Poin</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ base_url }}transaksi/redeem" class="nav-link ">
                                            <span class="title">Redeem Poin</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ base_url }}transaksi/histori" class="nav-link ">
                                            <span class="title">Histrori</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">Manajemen</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ base_url }}cluster" class="nav-link ">
                                            <span class="title">Cluster</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ base_url }}unit" class="nav-link ">
                                            <span class="title">Unit</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ base_url }}tenan" class="nav-link ">
                                            <span class="title">Tenan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ base_url }}fasilitas" class="nav-link ">
                                            <span class="title">Fasilitas</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ base_url }}marcendaise" class="nav-link ">
                                            <span class="title">Marcendais</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ base_url }}poin" class="nav-link ">
                                            <span class="title">Member Poin</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Laporan</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ base_url }}laporan" class="nav-link ">
                                            <span class="title">Laporan Bla</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>