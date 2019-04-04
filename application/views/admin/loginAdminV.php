<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E Placement</title>

    <!-- Bootstrap -->
    <?= link_tag('assets/plugins/bootstrap/dist/css/bootstrap.min.css'); ?>
    <!-- Font Awesome -->
    <?= link_tag('assets/plugins/font-awesome/css/all.min.css'); ?>
    <!-- NProgress -->
    <?= link_tag('assets/plugins/nprogress/nprogress.css'); ?>
    <!-- Animate.css -->
    <?= link_tag('assets/plugins/animate.css/animate.min.css'); ?>
    <!-- Custom Theme Style -->
    <?= link_tag('assets/css/custom.css'); ?>
    <style>
        body {
            background: #f7f7f7;
            height: auto;
        }
    </style>
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?php echo form_open('/placement/admin_login', 'id="demo-form2 data-parsley-validate" class="form-horizontal form-label-left" method="post"'); ?>

                    <h1>Admin Login Form</h1>
                    
                    <?php if (!empty($errorMsg) OR !empty(form_error())) { ?>
                        <div class="col-md-12 no-padding">
                            <div class="form-group">
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong><?php echo form_error(); echo($errorMsg); ?></strong>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div>
                        <ul class="parsley-errors-list filled text-left" id="parsley-id-1">
                            <li class="parsley-required">
                                <?php echo form_error('Email'); ?>
                            </li>
                        </ul>
                        <?php echo form_input('Email', set_value('Email'), 'id="EmailId" required="required" onchange="unique(this.value);" maxlength="250" placeholder="Company Email" class="form-control col-md-7 col-xs-12"'); ?>
                    </div>
                    <div>
                        <ul class="parsley-errors-list filled text-left" id="parsley-id-2">
                            <li class="parsley-required">
                                <?php echo form_error('Password'); ?>
                            </li>
                        </ul>
                        <?php echo form_password('Password', set_value('Password'), 'id="PasswordId" required="required" placeholder="Password" class="form-control col-md-7 col-xs-12"'); ?>
                    </div>
                    <div>
                        <a class="reset_pass pull-left" href="#">Forget password?</a>
                        <!-- <a class="btn btn-default submit float-right" href="index.html">Log in</a> -->
                        <button class="btn btn-success pull-right" type="submit">Log In</button>
                    </div>
                    <div class="clearfix"></div>
                    <br />
                    <div>
                        <h1>E - Placement</h1>
                        <p>©2019 All Rights Reserved.</p>
                    </div>
                    <?php form_close(); ?>
                </section>
            </div>
        </div>
    </div>
</body>
</html>