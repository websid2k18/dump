<?php
$this->load->helper('url');?>
<nav id="jithu_nav" class="navbar navbar-default navbar-static-top navbar-inverse jithu_nav" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="<?php echo $active == "home"?"active":"";?>">
<?php echo anchor('/placement/students/home', 'Student Home');?>
                </li>
                <?php if($this->session->userdata('coordinator')=="1"){ ?>
<li class="<?php echo $active == "mark_verification"?"active":"";?>">
<?php echo anchor('/placement/students/mark_verification', 'Mark Verification');?>
                </li>
                <?php } ?>
                 <li class="<?php echo $active == "update"?"active":"";?>">
<?php echo anchor('/placement/students/update', 'Update Profile');?>
                </li>
                 <li class="<?php echo $active == "marks"?"active":"";?>">
<?php echo anchor('/placement/students/marks', 'Marks');?>
                </li>
                <li class="<?php echo $active == "performance"?"active":"";?>">
<?php echo anchor('/placement/students/performance', 'Performance');?>
                </li>
                <li class="<?php echo $active == "resume"?"active":"";?>">
<?php echo anchor('/placement/students/resume', 'Resume');?>
                </li>
                <li class="<?php echo $active == "offers"?"active":"";?>">
<?php echo anchor('/placement/students/offers', 'Job Offers');?>
                </li>
                <li class="<?php echo $active == "placements"?"active":"";?>">
<?php echo anchor('/placement/students/placements', 'Placements');?>
                </li>
                <li class="<?php echo $active == "search"?"active":"";?>">
<?php echo anchor('/placement/students/search', 'Search');?>
                </li>
                <li class="<?php echo $active == "settings"?"active":"";?>">
<?php echo anchor('/placement/students/settings', 'Settings');?>
                </li>
                <li class="<?php echo $active == "help"?"active":"";?>">
<?php echo anchor('/placement/students/help', 'Help');?>
                </li>
               <li class="<?php echo $active == "logout"?"active":"";?>">
<?php echo anchor('/placement/logout', 'Logout');?>
</li>

            </ul>


        </div>
        <!-- /.navbar-collapse -->

    </div>
</nav>
