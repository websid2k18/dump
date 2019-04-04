<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">      
            <div class="x_panel">
                <div class="x_title">
                    <h2>Company Registrarion Form</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php echo form_open('/placement/regComF', 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"'); ?>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cEmailId">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('cEmail', set_value('cEmail'), 'type="email" id="cEmailId" onchange="unique(this.value);" required="required" maxlength="250" placeholder="Company Email" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-1">
                                    <li class="parsley-required">
                                        <?php echo form_error('cEmail'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cPasswordId">Password<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <?php echo form_password('cPassword', set_value('cPassword'), ' id="cPasswordId" required="required" placeholder="Password" class="form-control col-md-7 col-xs-12"' ); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-2">
                                    <li class="parsley-required">
                                        <?php echo form_error('cPassword'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cPasswordConfirm">Confirm Password<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <?php echo form_password('cPasswordConfirm', set_value('cPasswordConfirm'), ' id="cPasswordConfirmId" required="required" placeholder="Confirm Password" class="form-control col-md-7 col-xs-12"' ); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-3">
                                    <li class="parsley-required">
                                        <?php echo form_error('cPasswordConfirm'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <h3>Company Detail</h3>
                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cNameId">Company Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('cName', set_value('cName'), 'id="cNameId" required="required" placeholder="Company Name" class="form-control col-md-7 col-xs-12"');; ?>
                            </div>
                            <ul class="parsley-errors-list filled" id="parsley-id-4">
                                <li class="parsley-required">
                                    <?php echo form_error('cName'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cDescriptionId">Description</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_textarea('cDescription', set_value('cDescription'), 'class="form-control" id="cDescriptionId" style="resize : none; height:100px;" placeholder="Description"'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cAddressID">Address</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_textarea('cAddress', set_value('cAddress'), 'class="form-control" id="cAddressID" style="resize : none; height:100px;" placeholder="Address"'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cMobileNo">Mobile No  <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('cMobileNo', set_value('cMobileNo'), 'type="number" id="cMobileNo" required="required" minlength="10" maxlength="10" placeholder="Mobile No" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">
                                        <?php echo form_error('cMobileNo'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cWebSite">Web Site </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('cWebSite', set_value('cWebSite'), 'id="cWebSite" placeholder="Web Site" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-6">
                                    <li class="parsley-required">
                                        <?php echo form_error('cWebSite'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>

                    <h3>HR Detail</h3>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hName">HR Name  <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('hName', set_value('hName'), 'id="hName" required="required" placeholder="HR Name" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-6">
                                    <li class="parsley-required">
                                        <?php echo form_error('hName'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hMobileNo">HR Mobile No  <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('hMobileNo', set_value('hMobileNo'), 'type="number" id="hMobileNo" required="required" minlength="10" maxlength="10" placeholder="HR Mobile No" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">
                                        <?php echo form_error('hMobileNo'); ?>
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