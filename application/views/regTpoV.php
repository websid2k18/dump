<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Collage Registrarion Form</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php echo form_open('/placement/regTpoF', 'id="demo-form2" action="<?= base_url(); ?>tpoCtrl/registerFun" data-parsley-validate class="form-horizontal form-label-left" method="post"'); ?>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tEmailId">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('tEmail', set_value('tEmail'), 'type="email" id="tEmailId" onchange="unique(this.value);" required="required" maxlength="250" placeholder="Company Email" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-1">
                                    <li class="parsley-required">
                                        <?php echo form_error('tEmail'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tPasswordId">Password<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <?php echo form_password('tPassword', set_value('tPassword'), ' id="tPasswordId" required="required" placeholder="Password" class="form-control col-md-7 col-xs-12"' ); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-2">
                                    <li class="parsley-required">
                                        <?php echo form_error('tPassword'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tPasswordConfirm">Confirm Password<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <?php echo form_password('tPasswordConfirm', set_value('tPasswordConfirm'), ' id="tPasswordConfirmId" required="required" placeholder="Confirm Password" class="form-control col-md-7 col-xs-12"' ); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-3">
                                    <li class="parsley-required">
                                        <?php echo form_error('tPasswordConfirm'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tNameId">Collage Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('tName', set_value('tName'), 'id="tNameId" required="required" placeholder="Collage Name" class="form-control col-md-7 col-xs-12"');; ?>
                            </div>
                            <ul class="parsley-errors-list filled" id="parsley-id-4">
                                <li class="parsley-required">
                                    <?php echo form_error('tName'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tDescriptionId">Description</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_textarea('tDescription', set_value('tDescription'), 'class="form-control" id="tDescriptionId" style="resize : none; height:100px;" placeholder="Description"'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tAddressID">Address</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_textarea('tAddress', set_value('tAddress'), 'class="form-control" id="tAddressID" style="resize : none; height:100px;" placeholder="Address"'); ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tMobileNo">Mobile No  <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('tMobileNo', set_value('tMobileNo'), 'type="number" id="tMobileNo" required="required" minlength="10" maxlength="10" placeholder="Mobile No" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">
                                        <?php echo form_error('tMobileNo'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cWebSite">Web Site</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('tWebSite', set_value('tWebSite'), 'id="tWebSite" placeholder="Web Site" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-6">
                                    <li class="parsley-required">
                                        <?php echo form_error('tWebSite'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>

                    <h3>TPO Detail</h3>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tpoName">TPO Name  <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('tpoName', set_value('tpoName'), 'id="tpoName" required="required" placeholder="TPO Name" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-6">
                                    <li class="parsley-required">
                                        <?php echo form_error('tpoName'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tpoMobileNo">TPO Mobile No  <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('tpoMobileNo', set_value('tpoMobileNo'), 'type="number" id="tpoMobileNo" required="required" minlength="10" maxlength="10" placeholder="TPO Mobile No" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">
                                        <?php echo form_error('tpoMobileNo'); ?>
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