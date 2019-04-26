<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contact Us Form</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    <?php
                    echo form_open('/placement/contactUsF', 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"');

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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cEmail" style="word-break: break-all;">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('name', set_value('name'), 'id="name" required="required" maxlength="250" placeholder="Enter Name" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-1">
                                    <li class="parsley-required">
                                        <?php echo form_error('name'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tDescriptionId">Description</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_textarea('tDescription', set_value('tDescription'), 'class="form-control" id="tDescriptionId" style="resize : none; height:100px;" placeholder="Description"'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="float-right pull-right">
                            <button class="btn btn-success" type="submit">Contact Us</button>
                        </div>
                    </div>

                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- /page content -->