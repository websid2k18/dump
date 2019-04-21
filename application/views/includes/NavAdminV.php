<?php if ($con->checkIsAdminF()) { ?>
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="<?php echo base_url(); ?>" class="site_title"><i class="fas fa-user-graduate"></i><span> E - Placement</span></a>
            </div>
            <div class="clearfix"></div>
            <br />
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="<?php echo $_SESSION['sessImg']; ?>" alt="User Profile Image" class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2><?php echo $_SESSION['sessName']; ?></h2>
                </div>
            </div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3 class="text-center" style="width:35%; padding-left: 0px;">Admin</h3>
                    <ul class="nav side-menu">
                        <li class="<?php echo $active == "dashboardAdminF" ?  "active" :  ""; ?>">
                            <a href="<?= base_url('/placement/dashboardAdminF')?>"><i class="fas fa-home"></i>&nbsp;&nbsp;Home </a>
                        </li>

                        <li><a><i class="fas fa-university"></i>&nbsp;&nbsp;College Management<span class="fa"><i class="fas fa-chevron-down"></i></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url('/placement/RegTpoF')?>"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Add College</a></li>
                                <li><a href="<?= base_url('/placement/listTpoF')?>"><i class="fas fa-university"></i>&nbsp;&nbsp;List College</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo ($active=="RegComF" && $active=="listComF") ? "active" :  ""; ?>">
                            <a><i class="fas fa-industry"></i>&nbsp;&nbsp;Company Management<span class="fa"><i class="fas fa-chevron-down"></i></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url('/placement/RegComF')?>"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Add Company</a></li>
                                <li><a href="<?= base_url('/placement/listComF')?>"><i class="fas fa-industry"></i>&nbsp;&nbsp;List Company</a></li>
                            </ul>
                        </li>
                        <li class="<?php echo ($active=="RegComF" && $active=="listAdminF") ? "active" :  ""; ?>">
                            <a><i class="fas fa-user-cog"></i>&nbsp;&nbsp;Admin Management<span class="fa"><i class="fas fa-chevron-down"></i></span></a>
                            <ul class="nav child_menu">

                                <?php if( $this->session->userdata('sessMaster') == 'MasterAdmin' ) { ?>
                                    <li><a href="<?= base_url('/placement/RegAdminF')?>"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Add Admin</a></li>
                                <?php } ?>

                                <li><a href="<?= base_url('/placement/listAdminF')?>"><i class="fas fa-users-cog"></i>&nbsp;&nbsp;List Admin</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo $active=="aboutUsF" ?  "active":  ""; ?>">
                            <a href="<?= base_url('/placement/aboutUsF')?>"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;About Us</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
            </div>
            <!-- /menu footer buttons -->
        </div>
    </div>
    <!-- top navigation -->
    <div class="top_nav">
        <div class="nav_menu">
            <nav>
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fas fa-bars"></i></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo $_SESSION['sessImg']; ?>" alt=""><?php echo $this->session->userdata('sessName'); ?>
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="<?= base_url('/placement/profileAdminF')?>"> Profile</a></li>
                            <li>
                                <a href="javascript:;">
                                    <span class="badge bg-red pull-right">50%</span>
                                    <span>Settings</span>
                                </a>
                            </li>
                            <li><a href="javascript:;">Help</a></li>
                            <li><a href="<?= base_url('/placement/logOutF')?>"><i class="fas fa-sign-out-alt pull-right" style="font-size: 14px;"></i> Log Out</a></li>
                        </ul>
                    </li>

                    <li role="presentation" class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <span class="badge bg-green">6</span>
                        </a>
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                            <li>
                                <a>
                                    <span class="image"><img src="<?php echo $_SESSION['sessImg']; ?>" alt="Profile Image"></span>
                                    <span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                    </span>
                                    <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="image"><img src="<?php echo $_SESSION['sessImg']; ?>" alt="Profile Image"></span>
                                    <span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                    </span>
                                    <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="image"><img src="<?php echo $_SESSION['sessImg']; ?>" alt="Profile Image"></span>
                                    <span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                    </span>
                                    <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="image"><img src="<?php echo $_SESSION['sessImg']; ?>" alt="Profile Image"></span>
                                    <span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                    </span>
                                    <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                </a>
                            </li>
                            <li>
                                <div class="text-center">
                                    <a>
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
<?php } ?>
<!-- top navigation -->