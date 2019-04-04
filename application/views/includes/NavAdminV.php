<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url(); ?>" class="site_title"><i class="fas fa-user-graduate"></i><span> E - Placement</span></a>
        </div>

        <div class="clearfix"></div>
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li class="<?php echo $active=="home" ?  "active" :  ""; ?>">
                        <a href="<?= base_url('/placement/')?>"><i class="fas fa-home"></i>&nbsp;&nbsp;Home </a>
                    </li>

                    <li class="<?php echo $active=="about" ?  "active":  ""; ?>">
                        <a href="<?= base_url('/placement/aboutUsF')?>"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;About Us</a>
                    </li>

                    <li class="active">
                        <a>
                            <i class="fas fa-user-plus"></i>&nbsp;&nbsp;College Management<span class="fas fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu" style="display: block;">
                            <li><a href="http://127.0.0.1/x/placement/RegTpoF"><i class="fas fa-industry"></i>&nbsp;&nbsp;Add College</a></li>
                            <li><a href="http://127.0.0.1/x/placement/listTpoF"><i class="fas fa-university"></i>&nbsp;&nbsp;List College</a></li>
                        </ul>
                    </li>

                    <li  class="<?php echo $active=="contact" ?  "active":  ""; ?>">
                        <a href="<?= base_url('/placement/contactUsF')?>"><i class="fas fa-comment"></i>&nbsp;&nbsp;Contact Us</a>
                    </li>
                    <li  class="<?php echo $active=="contact" ?  "active":  ""; ?>">
                        <a href="<?= base_url('/placement/logOutF')?>"><i class="fas fa-comment"></i>&nbsp;&nbsp;Contact Us</a>
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
                <li role="presentation" class="dropdown">
                    <div class="title_right" style="margin-top: 15px; margin-right: 20px;">
                        <h2>Admin</h2>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- top navigation -->