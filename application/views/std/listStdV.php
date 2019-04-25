<!-- page content -->
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php if ($con->checkIsTpoF() || $con->checkIsComF()) {  ?>
            <div class="x_panel">
                <div class="x_content">
                    <?php echo form_open('/placement/listStdF', 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"'); ?>
                    <?php if ($con->checkIsTpoF()) { ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="statusId">Status</label>
                                <select name="status" id="statusId" class="form-control">
                                    <option value="all" <?php echo  set_select('status', 'all', true); ?>> All </option>
                                    <option value="new" <?php echo  set_select('status', 'new'); ?>> New </option>
                                    <option value="block" <?php echo  set_select('status', 'block'); ?>> Blocked </option>
                                    <option value="unblock" <?php echo  set_select('status', 'unblock'); ?>> Unblocked </option>
                                </select>
                            </div>
                        </div>
                    <?php }
                    if ($con->checkIsComF()) { ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="sTpoNameId">Collage Name</label>
                                <select name="sTpoName" id="sTpoNameId" onchange="dept(this.value);" required="required" placeholder="Collage Name" class="form-control">
                                    <option value="" selected="select"> Select Collage</option>
                                    <?php
                                    foreach ($resultListTpo as $key => $value) { ?>
                                        <option value="<?php echo $value->t_ID; ?>" <?php echo  set_select('sTpoName', $value->t_ID); ?>><?php echo $value->t_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="statusId">Department</label>
                            <select name="sDept" id="sDeptID" placeholder="Collage Name" class="form-control">
                                <?php $con->fetch_department(); ?>
                                <option value="all">ALL</option>}
                                option
                            </select>
                            <ul class="parsley-errors-list filled" id="parsley-id-4">
                                <li class="parsley-required">
                                    <?php echo form_error('sDept'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="">
                                <label class="control-label" for="sNameId">&nbsp;</label>
                                <button class="btn btn-success form-control"  type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        <?php } ?>
        <div class="x_panel">
            <div class="x_title">
                <h2>Student List</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <div id="exportBtn"></div>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped" id="MyTable">
                        <thead>
                            <tr class="headings">
                                <th class="column-title"> Image</th>
                                <th class="column-title"> Name </th>
                                <th class="column-title"> Contact Number </th>
                                <th class="column-title"> Email </th>
                                <th class="column-title"> Enrollment No </th>
                                <th class="column-title"> Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $odd = "odd";
                            if (!empty($resultListStd)) {
                                foreach ($resultListStd as $key) {
                                    $s_img_path = (empty($key->s_img_path)) ? base_url("assets/images/student/user.png") : base_url("assets/images/student/" . $key->s_img_path);

                                    $odd = ($odd == 'odd') ? "even" : "odd" ; ?>

                                    <tr class="pointer text-center <?php echo $odd . " "; echo ($key->s_status == '0') ? "danger" : "" ?>">
                                        <td><img src="<?php echo $s_img_path ?>" alt="Student Image" class="hw-40"></td>
                                        <td><?php echo $key->s_name ?></td>
                                        <td><?php echo $key->s_contact_no ?></td>
                                        <td><?php echo $key->s_email ?></td>
                                        <td><?php echo $key->s_enroll_no ?></td>
                                        <td><a href="<?php echo base_url('/placement/profileStdF/' . $key->s_ID); ?>" title="View Profile" class="btn btn-info">Info</a></td>
                                    </tr>

                                <?php }
                            } ?>
                        </tbody>
                    </table>
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