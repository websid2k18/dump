<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Company Profile</h2>
                    <div class="clearfix"></div>
                </div>
                <?php 
                $c_img = (empty($result[0]->c_img)) ? base_url("assets/images/company/user.png") : base_url("assets/images/company/" . $result[0]->c_img) ;
                $c_hr_img = (empty($result[0]->c_hr_img)) ? base_url("assets/images/company/user.png") : base_url("assets/images/company/" . $result[0]->c_hr_img) ;
                echo form_open_multipart( base_url('/placement/editProfileComF/'), 'id="demo-form" data-parsley-validate class="form-horizontal form-label-left" method="post"');

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
                                <img class="img-responsive avatar-view" src="<?php echo $c_img ?>" alt="Avatar" title="Company Logo">
                            </div>
                            <div class="form-group text-center" style="padding-top: 10px;">
                                <label class="file-upload btn btn-primary">
                                    Edit Company Logo<?php echo form_upload('cImg', set_value('cImg') ,'class="hide"'); ?>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <ul class="list-unstyled user_data">
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Address :</h4>
                                    <?php
                                    echo form_textarea('cAddress', set_value('cAddress', $result[0]->c_address), 'class="form-control" id="cAddressID" style="resize : none; height:100px;" placeholder="Address"');
                                    ?>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Contact No :</h4>
                                    <?php
                                    echo form_input('cMobileNo', set_value('cMobileNo', $result[0]->c_contact_no), 'type="number" id="cMobileNo" required="required" minlength="10" maxlength="10" placeholder="Mobile No" class="form-control col-md-7 col-xs-12"');
                                    ?>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Web Site :</h4>
                                    <?php
                                    echo form_input('cWebSite', set_value('cWebSite', $result[0]->c_website), 'id="cWebSite" placeholder="Web Site" class="form-control col-md-12 col-xs-12"');
                                    ?>
                                </div>
                            </li>
                        </ul>
                        <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <ul class="list-unstyled user_data">
                            <li>
                                <h4 style="font-weight: 600;">Email :  <span style="font-weight: 100;"><?php echo $result[0]->c_email ?></span></h4>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;">Name : </h4>
                                    <?php echo form_input('cName', set_value('cName', $result[0]->c_name), 'id="cNameId" required="required" placeholder="Company Name" class="form-control col-md-12 col-xs-12"'); ?>
                                    <ul class="parsley-errors-list filled" id="parsley-id-4">
                                        <li class="parsley-required">
                                            <?php echo form_error('cName'); ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;">Description : </h4>
                                    <?php echo form_textarea('cDescription', set_value('cDescription', $result[0]->c_description), 'class="form-control" id="cDescriptionId" style="resize : none; height:100px;" placeholder="Description"'); ?>
                                </div>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                        </ul>

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="display-sm-block active"><a href="#OfficerInfo" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">HR Information</a>
                                </li>

                                <!-- <li role="presentation" class="">
                                    <a href="#Departments" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Departments</a>
                                </li> -->
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="OfficerInfo" aria-labelledby="home-tab">
                                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                        <div class="profile_img">
                                            <div id="crop-avatar">
                                                <!-- Current avatar -->
                                                <img class="img-responsive avatar-view img-circle" src="<?php echo $c_hr_img ?>" alt="Avatar" title="Placement Officer Image">
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="padding-top: 10px;">
                                            <label class="file-upload btn btn-primary">
                                                Edit Image<?php echo form_upload('hImg', set_value('hImg') ,'class="hide"'); ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <ul class="list-unstyled user_data">
                                            <li>
                                                <div class="form-group">
                                                    <h4 style="font-weight: 600;">Name : </h4>
                                                    <?php echo form_input('hName', set_value('hName', $result[0]->c_hr_name), 'id="hNameId" required="required" placeholder="HR Name" class="form-control col-md-7 col-xs-12"'); ?>
                                                    <ul class="parsley-errors-list filled" id="parsley-id-4">
                                                        <li class="parsley-required">
                                                            <?php echo form_error('hName'); ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                                            <li>
                                                <div class="form-group">
                                                    <h4 style="font-weight: 600;">Mobile No : </h4>
                                                    <?php echo form_input('hMobileNo', set_value('hMobileNo', $result[0]->c_hr_no), 'type="number" id="hMobileNo" required="required" minlength="10" maxlength="10" placeholder="Mobile No" class="form-control col-md-7 col-xs-12"'); ?>
                                                    <ul class="parsley-errors-list filled" id="parsley-id-4">
                                                        <li class="parsley-required">
                                                            <?php echo form_error('cMobileNo'); ?>
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
<!-- /page content