<!-- page content -->
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <?php echo form_open('/placement/listAdminF', 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"'); ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="statusId">Status<span class="required">*</span>
                        </label>
                        <select name="status" id="statusId" class="form-control">
                            <option value="ALL" <?php echo  set_select('status', 'ALL', true); ?>> All </option>
                            <option value="Blocked" <?php echo  set_select('status', 'Blocked'); ?>> Blocked </option>
                            <option value="Unblocked" <?php echo  set_select('status', 'Unblocked'); ?>> Unblocked </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="">
                            <label class="control-label" for="sNameId">&nbsp;</label>
                            <button class="btn btn-success form-control" type="submit">Search</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Admin List</h2>
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
                                <th class="column-title"> Image </th>
                                <th class="column-title"> Name </th>
                                <th class="column-title"> Email </th>
                                <th class="column-title"> Contact Number </th>
                                <th class="column-title"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $odd = "odd";

                            foreach ($result as $key) {
                                $a_profile_img = (empty($key->a_profile_img)) ? base_url("assets/images/admin/user.png") : base_url("assets/images/admin/" . $key->a_profile_img) ;
                                $odd = ($odd == 'odd') ? "even" : "odd" ; ?>

                                <tr class="pointer text-center <?php echo $odd . " "; echo ($key->a_status == '0') ? "danger" : "" ?>">
                                    <td><img src="<?php echo $a_profile_img ?>" alt="College Logo" class="hw-40"></td>
                                    <td><?php echo $key->a_name ?></td>
                                    <td><?php echo $key->a_email ?></td>
                                    <td><?php echo $key->a_contact_no ?></td>
                                    <td><a href="<?php echo base_url('/placement/profileAdminF/' . $key->a_ID); ?>" title="View Profile" class="btn btn-info">Info</a></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- /page content -->