<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Admin Registrarion Form</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php echo form_open('/placement/regAdminF', 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"'); ?>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="aEmailId">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('aEmail', set_value('aEmail'), 'type="email" id="aEmailId" onchange="unique(this.value);" required="required" maxlength="250" placeholder="Admin Email" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-1">
                                    <li class="parsley-required">
                                        <?php echo form_error('aEmail'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="aPasswordId">Password<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <?php echo form_password('aPassword', set_value('aPassword'), ' id="aPasswordId" required="required" placeholder="Password" class="form-control col-md-7 col-xs-12"' ); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-2">
                                    <li class="parsley-required">
                                        <?php echo form_error('aPassword'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="aPasswordConfirm">Confirm Password<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <?php echo form_password('aPasswordConfirm', set_value('aPasswordConfirm'), ' id="aPasswordConfirmId" required="required" placeholder="Confirm Password" class="form-control col-md-7 col-xs-12"' ); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-3">
                                    <li class="parsley-required">
                                        <?php echo form_error('aPasswordConfirm'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="aNameId">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('aName', set_value('aName'), 'id="aNameId" required="required" placeholder="Admin Name" class="form-control col-md-7 col-xs-12"');; ?>
                            </div>
                            <ul class="parsley-errors-list filled" id="parsley-id-4">
                                <li class="parsley-required">
                                    <?php echo form_error('aName'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="aAddressID">Address</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_textarea('aAddress', set_value('aAddress'), 'class="form-control" id="aAddressID" style="resize : none; height:100px;" placeholder="Address"'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="aMobileNo">Mobile No  <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('aMobileNo', set_value('aMobileNo'), 'type="number" id="aMobileNo" required="required" minlength="10" maxlength="10" placeholder="Mobile No" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">
                                        <?php echo form_error('aMobileNo'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="float-right pull-right">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <button class="btn btn-success" type="submit">Register</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- /page content -->