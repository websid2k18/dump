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
						<a href="<?= base_url('/placement/home')?>"><i class="fas fa-home"></i>&nbsp;&nbsp;Home </a>
					</li>
					<li>
						<a>
							<i class="fas fa-user-plus"></i>&nbsp;&nbsp;Registration <span class="fas fa-chevron-down"></span>
						</a>
						<ul class="nav child_menu">
							<li><a href="<?= base_url()?>"><i class="fas fa-industry"></i>&nbsp;&nbsp;Company</a></li>
							<li><a href="<?= base_url(); ?>tpoCtrl/registerFun"><i class="fas fa-university"></i>&nbsp;&nbsp;College</a></li>
							<li><a href="<?= base_url(); ?>studentCtrl/registerFun"><i class="fas fa-user-graduate"></i>&nbsp;&nbsp;Student</a></li>
						</ul>
					</li>
					<li><a><i class="fas fa-user"></i>&nbsp;&nbsp;Log In <span class="fas fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?= base_url()?>HomeC/LoginCompanyF"><i class="fas fa-industry"></i>&nbsp;&nbsp;Company</a></li>
							<li><a href="<?= base_url()?>HomeC/LoginTpoF"><i class="fas fa-university"></i>&nbsp;&nbsp;TPO</a></li>
							<li><a href="<?= base_url()?>HomeC/LoginStudentF"><i class="fas fa-user-graduate"></i>&nbsp;&nbsp;Student</a></li>
						</ul>
					</li>
					<li><a href="<?= base_url()?>HomeC/AboutUsF"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;About Us</a></li>
					<li><a href="<?= base_url()?>HomeC/ContactUsV"><i class="fas fa-comment"></i>&nbsp;&nbsp;Contact Us</a></li>
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
					<div class="title_right" style="margin-top: 15px;">
						<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Go!</button>
								</span>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- top navigation -->