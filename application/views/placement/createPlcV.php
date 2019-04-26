<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Placement</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php echo form_open('/placement/createPlcF', 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"'); ?>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pNameId">Placement Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('pName', set_value('pName'), 'id="pNameId" required="required" placeholder="Placement Name" class="form-control col-md-7 col-xs-12"');; ?>
                            </div>
                            <ul class="parsley-errors-list filled" id="parsley-id-4">
                                <li class="parsley-required">
                                    <?php echo form_error('pName'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pType">Placement Type <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="s" id="pType" onchange="dept(this.value);" required="required" placeholder="Collage Name" class="form-control col-md-7 col-xs-12">
                                    <option value="0" selected="select"> Select Type </option>
                                    <option value="on">On Campus</option>}
                                    <option value="off">Off Campus / Walk-in</option>}
                                    option
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tDescriptionId">Description</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_textarea('tDescription', set_value('tDescription'), 'class="form-control" id="tDescriptionId" style="resize : none; height:100px;" placeholder="Description"'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tDescriptionId">Qualification</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_textarea('tDescription', set_value('tDescription'), 'class="form-control" id="tDescriptionId" style="resize : none; height:100px;" placeholder="Description"'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pNameId">Assumed Salary<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php echo form_input('pName', set_value('pName'), 'id="pNameId" required="required" placeholder="Placement Name" class="form-control col-md-7 col-xs-12"');; ?>
                            </div>
                            <ul class="parsley-errors-list filled" id="parsley-id-4">
                                <li class="parsley-required">
                                    <?php echo form_error('pName'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>

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