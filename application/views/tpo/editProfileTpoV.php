<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>College Profile</h2>
                    <div class="clearfix"></div>
                </div>
                <?php 
                $t_img = (empty($result[0]->t_img)) ? base_url("assets/images/tpo/user.png") : base_url("assets/images/tpo/" . $result[0]->t_img) ;
                $t_tpo_img = (empty($result[0]->t_tpo_img)) ? base_url("assets/images/tpo/user.png") : base_url("assets/images/tpo/" . $result[0]->t_tpo_img) ;
                echo form_open_multipart( base_url('/placement/editProfileTpoF/'), 'id="demo-form" data-parsley-validate class="form-horizontal form-label-left" method="post"');

                if (!empty($errorMsg) OR !empty(form_error())) { ?>
                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>
                                    <?php
                                    echo form_error();
                                    echo($errorMsg);
                                    echo validation_errors(); ?>
                                </strong>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar col-md-12 text-center">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" src="<?php echo $t_img ?>" alt="Avatar" title="Company Logo">
                            </div>
                            <div class="form-group text-center" style="padding-top: 10px;">
                                <label class="file-upload btn btn-primary">
                                    Edit College Logo<?php echo form_upload('tImg', set_value('tImg') ,'class="hide"'); ?>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <ul class="list-unstyled user_data">
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Address :</h4>
                                    <?php
                                    echo form_textarea('tAddress', set_value('tAddress', $result[0]->t_address), 'class="form-control" id="tAddressID" style="resize : none; height:100px;" placeholder="Address"');
                                    ?>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Contact No :</h4>
                                    <?php
                                    echo form_input('tMobileNo', set_value('tMobileNo', $result[0]->t_contact_number), 'type="number" id="cMobileNo" required="required" minlength="10" maxlength="10" placeholder="Mobile No" class="form-control col-md-7 col-xs-12"');
                                    ?>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Web Site :</h4>
                                    <?php
                                    echo form_input('tWebSite', set_value('tWebSite', $result[0]->t_website), 'id="cWebSite" placeholder="Web Site" class="form-control col-md-12 col-xs-12"');
                                    ?>
                                </div>
                            </li>
                        </ul>
                        <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <ul class="list-unstyled user_data">
                            <li>
                                <h4 style="font-weight: 600;">Email :  <span style="font-weight: 100;"><?php echo $result[0]->t_email ?></span></h4>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;">Name : </h4>
                                    <?php echo form_input('tName', set_value('tName', $result[0]->t_name), 'id="cNameId" required="required" placeholder="Company Name" class="form-control col-md-12 col-xs-12"'); ?>
                                    <ul class="parsley-errors-list filled" id="parsley-id-4">
                                        <li class="parsley-required">
                                            <?php echo form_error('tName'); ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;">Description : </h4>
                                    <?php echo form_textarea('tDescription', set_value('tDescription', $result[0]->t_description), 'class="form-control" id="cDescriptionId" style="resize : none; height:100px;" placeholder="Description"'); ?>
                                </div>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                        </ul>

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="display-sm-block active"><a href="#OfficerInfo" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Officer Information</a>
                                </li>

                                <li role="presentation" class="">
                                    <a href="#Departments" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Departments</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="OfficerInfo" aria-labelledby="home-tab">
                                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                        <div class="profile_img">
                                            <div id="crop-avatar">
                                                <!-- Current avatar -->
                                                <img class="img-responsive avatar-view img-circle" src="<?php echo $t_tpo_img ?>" alt="Avatar" title="Placement Officer Image">
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="padding-top: 10px;">
                                            <label class="file-upload btn btn-primary">
                                                Edit Image<?php echo form_upload('tpoImg', set_value('tpoImg') ,'class="hide"'); ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <ul class="list-unstyled user_data">
                                            <li>
                                                <div class="form-group">
                                                    <h4 style="font-weight: 600;">Name : </h4>
                                                    <?php echo form_input('tpoName', set_value('tpoName', $result[0]->t_tpo_name), 'id="tpoNameId" required="required" placeholder="HR Name" class="form-control col-md-7 col-xs-12"'); ?>
                                                    <ul class="parsley-errors-list filled" id="parsley-id-4">
                                                        <li class="parsley-required">
                                                            <?php echo form_error('tpoName'); ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                                            <li>
                                                <div class="form-group">
                                                    <h4 style="font-weight: 600;">Mobile No : </h4>
                                                    <?php echo form_input('tpoMobileNo', set_value('tpoMobileNo', $result[0]->t_tpo_contact_number), 'type="number" id="tpoMobileNo" required="required" minlength="10" maxlength="10" placeholder="Mobile No" class="form-control col-md-7 col-xs-12"'); ?>
                                                    <ul class="parsley-errors-list filled" id="parsley-id-4">
                                                        <li class="parsley-required">
                                                            <?php echo form_error('tpoMobileNo'); ?>
                                                            <?php echo validation_errors(); ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                                        </ul>
                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="Departments" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <table class="table table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Department</th>
                                                    <th class="text-center">Action</th>
                                                    <th class="text-center">Deactivate/Activate</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result[1] as $key => $value) { ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $value->d_ID ?></th>
                                                        <td><?php echo $value->d_name ?></td>
                                                        <td class="text-center"><a href="<?php echo base_url('/placement/listStdF/unblock/' . $result[0]->t_ID); ?>" title="Block Admin" class="btn btn-sm btn-info">Student List</a></td>
                                                        <td class="text-center">
                                                            <?php echo form_checkbox("tDepartment[]", $value->d_ID, set_checkbox('tDepartment', $value->d_ID, TRUE), 'class="js-switch"')
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php foreach ($dept as $key => $value) { ?>

                                                    <tr>
                                                        <th scope="row"><?php echo $value->d_ID ?></th>
                                                        <td><?php echo $value->d_name ?></td>
                                                        <td class="text-center"><a href="<?php echo base_url('/placement/listStdF/unblock/' . $result[0]->t_ID); ?>" title="Block Admin" class="btn btn-sm btn-info">Student List</a></td>
                                                        <td class="text-center">
                                                            <?php echo form_checkbox("tDepartment[]", $value->d_ID, set_checkbox('tDepartment', $value->d_ID, FALSE), 'class="js-switch"')
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="list-unstyled user_data"><li><hr></li></ul>
                    <div class="form-group">
                        <div class="float-right pull-right">
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<script>
    $("#insert-more").click(function () {
        $("#myDepartment").each(function () {
            var tds = '<tr>';
            jQuery.each($('tr:last td', this), function () {
                tds += '<td>' + $(this).html() + '</td>';
            });
            tds += '</tr>';
            if ($('tbody', this).length > 0) {
                $('tbody', this).append(tds);
            } else {
                $(this).append(tds);
            }
        });
    });
</script>