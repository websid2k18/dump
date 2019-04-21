<!-- page content -->
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>College List</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <div id="exportBtn"></div>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 no-padding">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sNameId">Collage Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="sTpoName" id="sTpoNameId" onchange="dept(this.value);" required="required" placeholder="Collage Name" class="form-control col-md-7 col-xs-12">
                                <option value="" selected="select"> Select Collage</option>
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
                                <option selected="select"> Select Department</option>
                                <?php foreach ($result1 as $key => $value) { ?>
                                    <option value="<?php echo $value->t_ID; ?>" <?php echo  set_select('sTpoName', $value->t_ID); ?>><?php echo $value->t_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="MyTable">
                        <thead>
                            <tr class="headings">
                                <th class="column-title"> Logo</th>
                                <th class="column-title"> Name </th>
                                <th class="column-title"> Contact Number </th>
                                <th class="column-title"> Prof. Image </th>
                                <th class="column-title"> Prof. name </th>
                                <th class="column-title"> Email </th>
                                <th class="column-title"> Prof. Contact Number </th>
                                <th class="column-title"> Website </th>
                                <th class="column-title"> Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $odd = "odd";

                            foreach ($result as $key) {
                                $s_img_path = (empty($key->s_img_path)) ? base_url("assets/images/stdstudent/user.png") : base_url("assets/images/stdstudent/" . $key->s_img_path);

                                $odd = ($odd == 'odd') ? "even" : "odd" ; ?>

                                <tr class="pointer text-center <?php echo $odd . " "; echo ($key->t_status == '0') ? "danger" : "" ?>">
                                    <td><img src="<?php echo $t_img ?>" alt="College Logo" class="hw-40"></td>
                                    <td><?php echo $key->t_name ?></td>
                                    <td><?php echo $key->t_contact_number ?></td>
                                    <td><img src="<?php echo $t_tpo_img ?>" alt="Profile Image" class="img-circle hw-40"></td>
                                    <td><?php echo $key->t_tpo_name ?></td>
                                    <td><?php echo $key->t_email ?></td>
                                    <td><?php echo $key->t_tpo_contact_number ?></td>
                                    <td><a href="https://<?php echo $key->t_website ?>"><?php echo $key->t_website ?></a></td>
                                    <td><a href="<?php echo base_url('/placement/profileTpoF/' . $key->t_ID); ?>" title="View Profile" class="btn btn-info">Info</a></td>
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