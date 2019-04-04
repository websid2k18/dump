<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
if( ! isset($CI))
{
	$CI = new CI_Controller();
}
$CI->load->helper('url');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> Error | E - Placement Portal </title>

	<!-- Bootstrap -->
	<link href="<?= base_url('assets/plugins/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?= base_url('assets/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?= base_url('assets/plugins/nprogress/nprogress.css'); ?>" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<!-- page content -->
			<div class="col-md-12">
				<div class="col-middle">
					<div class="text-center text-center">
						<h1 class="error-number">404</h1>
						<h2><?php echo $heading; ?></h2>
						<p><?php echo $message; ?> <a href="<?= base_url(''); ?>">Report this?</a>
						</p>
                        <!-- <div class="mid_center">
                            <h3>Search</h3>
                            <form>
                                <div class="col-xs-12 form-group pull-right top_search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Go!</button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/plugins/fastclick/lib/fastclick.js'); ?>"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets/plugins/nprogress/nprogress.js'); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>
</body>
</html>