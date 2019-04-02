<?php $this->load->helper('url'); ?>
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
            
                <li class="<?php echo $active=="home" ?  "active" :  ""; ?>">
                    <?php echo anchor( '/placement/home', 'Home' ); ?>
                </li>
                <li class="<?php echo $active=="instructions" ? "active" :  ""; ?>">
                    <?php echo anchor( '/placement/home/instructions', 'Instructions' ); ?>
                </li>
                <li class="<?php echo $active=="alumni" ? "active" :  ""; ?>">
                    <?php echo anchor( '/placement/home/alumni', 'Alumni' ); ?>
                </li>
                <li class="<?php echo $active=="history" ? "active" :  ""; ?>">
                    <?php echo anchor( '/placement/home/history', 'Placement History' ); ?>
                </li>
               <li class="<?php echo $active=="contact" ?  "active":  ""; ?>">
                    <?php echo anchor( '/placement/home/contact', 'Contact Us' ); ?>
                </li>
               
            </ul>


        </div>
        <!-- /.navbar-collapse -->

    </div>
</nav>
