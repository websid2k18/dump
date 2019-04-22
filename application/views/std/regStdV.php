<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Student Registrarion Form</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php echo form_open('/placement/regStdF', 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"'); ?>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sEmailId">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('sEmail', set_value('sEmail'), 'type="email" id="sEmailId" onchange="unique(this.value);" required="required" maxlength="250" placeholder="Student Email" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-1">
                                    <li class="parsley-required">
                                        <?php echo form_error('sEmail'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sPasswordId">Password<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <?php echo form_password('sPassword', set_value('sPassword'), ' id="sPasswordId" required="required" placeholder="Password" class="form-control col-md-7 col-xs-12"' ); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-2">
                                    <li class="parsley-required">
                                        <?php echo form_error('sPassword'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sPasswordConfirm">Confirm Password<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <?php echo form_password('sPasswordConfirm', set_value('sPasswordConfirm'), ' id="sPasswordConfirmId" required="required" placeholder="Confirm Password" class="form-control col-md-7 col-xs-12"' ); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-3">
                                    <li class="parsley-required">
                                        <?php echo form_error('sPasswordConfirm'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sNameId">Student Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('sName', set_value('sName'), 'id="sNameId" required="required" placeholder="Student Name" class="form-control col-md-7 col-xs-12"');; ?>
                            </div>
                            <ul class="parsley-errors-list filled" id="parsley-id-4">
                                <li class="parsley-required">
                                    <?php echo form_error('sName'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sMobileNo">Mobile No  <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('sMobileNo', set_value('sMobileNo'), 'type="number" id="sMobileNo" required="required" minlength="10" maxlength="10" placeholder="Mobile No" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">
                                        <?php echo form_error('sMobileNo'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sEnrollNoId">Enrollment No  <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('sEnrollNo', set_value('sEnrollNo'), 'type="number" id="sEnrollNoId" required="required" minlength="12" maxlength="12" placeholder="Enrollment No" class="form-control col-md-7 col-xs-12"'); ?>
                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">
                                        <?php echo form_error('sEnrollNo'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>


                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sNameId">Collage Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="sTpoName" id="sTpoNameId" onchange="dept(this.value);" required="required" placeholder="Collage Name" class="form-control col-md-7 col-xs-12">
                                    <option value="0" selected="select"> Select Collage</option>
                                    <?php foreach ($result as $key => $value) { ?>
                                        <option value="<?php echo $value->t_ID; ?>" <?php echo  set_select('sTpoName', $value->t_ID); ?>><?php echo $value->t_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <ul class="parsley-errors-list filled" id="parsley-id-4">
                                <li class="parsley-required">
                                    <?php echo form_error('sTpoName'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sDeptID">Department <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="sDept" id="sDeptID" required="required" placeholder="Collage Name" class="form-control col-md-7 col-xs-12">
                                    <option value="" selected="select"> Select Department</option>
                                    <?php $con->fetch_department(); ?>
                                </select>
                            </div>
                            <ul class="parsley-errors-list filled" id="parsley-id-4">
                                <li class="parsley-required">
                                    <?php echo form_error('sDept'); ?>
                                </li>
                            </ul>
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
                    <?php echo form_close(); echo validation_errors(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- /page content -->
<script>
    function dept(id) {
        $.ajax({
            type:'POST',
            url:'<?= base_url(); ?>Placement/fetch_department',
            data:{'sTpoName': id},
            success:function(data){
                $('#sDeptID').html(data);
            }
        });
    };
</script>