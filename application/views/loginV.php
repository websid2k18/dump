<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">

                    <?php if($method == 'logComF') { ?>
                        <h2>Company Log In Form</h2>
                    <?php } ?>

                    <?php if($method == 'logTpoF') { ?>
                        <h2>College Log In Form</h2>
                    <?php } ?>

                    <?php if($method == 'logStdF') { ?>
                        <h2>Students Log In Form</h2>
                    <?php } ?>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    <?php
                    echo form_open('/placement/'. $method, 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"');

                    if (!empty($errorMsg) OR !empty(form_error())) { ?>
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

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cEmail" style="word-break: break-all;">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('Email', set_value('Email'), 'id="EmailId" required="required" onchange="unique(this.value);" maxlength="250" placeholder="Company Email" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-1">
                                    <li class="parsley-required">
                                        <?php echo form_error('Email'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cPassword" style="word-break: break-all;">Password<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_password('Password', set_value('Password'), 'id="PasswordId" required="required" placeholder="Password" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-2">
                                    <li class="parsley-required">
                                        <?php echo form_error('Password'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="float-right pull-right">
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <button class="btn btn-warning" type="button">Cancel</button>
                            <button class="btn btn-success" type="submit">Log In</button>
                        </div>
                    </div>

                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->