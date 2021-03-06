<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Student Profile</h2>
                    <div class="clearfix"></div>
                </div>
                <?php 
                $s_img_path = (empty($result[0]->s_img_path)) ? base_url("assets/images/student/user.png") : base_url("assets/images/student/" . $result[0]->s_img_path) ;
                $t_img = (empty($result[0]->t_img)) ? base_url("assets/images/student/user.png") : base_url("assets/images/student/" . $result[0]->t_img) ;
                echo form_open_multipart( base_url('/placement/editProfileStdF/'), 'id="demo-form" data-parsley-validate class="form-horizontal form-label-left" method="post"');

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
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" src="<?php echo $s_img_path ?>" alt="Avatar" title="College Logo">
                            </div>
                            <div class="form-group text-center" style="padding-top: 10px;">
                                <label class="file-upload btn btn-primary">
                                    Edit Profile Image<?php echo form_upload('sImg', set_value('sImg') ,'class="hide"'); ?>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <ul class="list-unstyled user_data">
                            <li>
                                <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Enrollment No :</h4>
                                <?php echo form_input('sEnrollNo', set_value('sEnrollNo', $result[0]->s_enroll_no), 'type="number" id="cMobileNo" required="required" minlength="12" maxlength="12" placeholder="Enter Enrollment No" class="form-control"');
                                ?>
                            </li>
                            <hr>
                            <li>
                                <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Contact No :</h4>
                                <?php echo form_input('sMobileNo', set_value('sMobileNo', $result[0]->s_contact_no), 'type="number" id="cMobileNo" required="required" minlength="10" maxlength="10" placeholder="Mobile No" class="form-control"');
                                ?>
                            </li>
                            <hr>
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Address :</h4>
                                    <?php
                                    echo form_textarea('sAddress', set_value('sAddress', $result[0]->s_address), 'class="form-control" id="tAddressID" style="resize : none; height:100px;" placeholder="Address"');
                                    ?>
                                </div>
                            </li>
                            <hr>
                            <li class="text-center">
                                <label class="file-upload btn btn-primary">
                                    <i class="fas fa-upload"></i>&nbsp;&nbsp;Upload Resume<?php echo form_upload('sResume', set_value('sResume') ,'class="hide"'); ?>
                                </label>
                            </li>
                            <hr>
                            <?php 
                            if( ($con->checkIsTpoF() || $con->checkIsAdminF()) && $this->session->userdata('sessID') ) { ?>
                                <li>
                                    <h4 style="font-weight: 600;">College Register on :</h4>
                                    <p><?php echo $result[0]->t_create_date ?></p>
                                </li>
                                <hr>
                                <li>
                                    <h4 style="font-weight: 600;">College Updated on :</h4>
                                    <p><?php echo $result[0]->t_update_date ?></p>
                                </li>
                                <hr>
                                <?php if($result[0]->t_status == 1) { ?>
                                    <li>
                                        <h4 style="font-weight: 600;">Approved by admin :</h4>
                                        <a href="<?php echo base_url('/placement/profileAdminF/' . $result[0]->a_ID); ?>" class="user-profile">
                                            <img src="<?php echo base_url('assets/images/admin/' . $result[0]->a_profile_img); ?>" alt="">
                                            <?php echo $result[0]->a_name ?>
                                        </a>
                                    </li>
                                    <hr>
                                <?php }
                                else { ?>
                                    <li>
                                        <h4 style="font-weight: 600;">Blocked by admin :</h4>
                                        <a href="<?php echo base_url('/placement/profileAdminF/' . $result[0]->a_ID); ?>" class="user-profile">
                                            <img src="<?php echo base_url('assets/images/admin/' . $result[0]->a_profile_img); ?>" alt="">
                                            <?php echo $result[0]->a_name ?>
                                        </a>
                                    </li>
                                    <hr>
                                <?php } ?>
                            <?php } ?>

                        </ul>
                        <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <ul class="list-unstyled user_data">
                            <li>
                                <h4 style="font-weight: 600;">Email :  <span style="font-weight: 100;"><?php echo $result[0]->s_email ?></span></h4>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;">Name : </h4>
                                    <?php echo form_input('sName', set_value('sName', $result[0]->s_name), 'id="cNameId" required="required" placeholder="Student Name" class="form-control"'); ?>
                                    <ul class="parsley-errors-list filled" id="parsley-id-4">
                                        <li class="parsley-required">
                                            <?php echo form_error('sName'); ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;">Description : </h4>
                                    <?php echo form_textarea('sDescription', set_value('sDescription', $result[0]->s_description), 'class="form-control" id="cDescriptionId" style="resize : none; height:100px;" placeholder="Description"'); ?>
                                </div>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                        </ul>
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#EDUCATION" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">EDUCATION</a>
                                </li>
                                <li role="presentation" class=""><a href="#COLLEGEDETAIL" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">COLLEGE DETAIL</a>
                                </li>
                                <li role="presentation" class=""><a href="#PROJECT" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">PROJECT</a>
                                </li>
                                <li role="presentation" class=""><a href="#HOBBIES" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">HOBBIES</a>
                                </li>
                                <li role="presentation" class=""><a href="#LANGUAGE" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">LANGUAGE</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="EDUCATION" aria-labelledby="home-tab">
                                    <div class="">
                                        <div class="x_content">
                                            <ul class="list-unstyled timeline">
                                                <li>
                                                    <div class="block">
                                                        <div class="tags">
                                                            <a href="" class="tag">
                                                                <span>2018</span>
                                                            </a>
                                                        </div>
                                                        <div class="block_content">
                                                            <h2 class="title">
                                                                <a>Bachelor of Technology (Computer Engineering)</a>
                                                            </h2>
                                                            <div class="byline">
                                                                <span>Government Engineering Collage, Sec-28, Gandhinagar Gujarat, India</span>
                                                            </div>
                                                            <p class="excerpt">CPI 7.2/10, Sem 6 SPI 8.17/10 </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="block">
                                                        <div class="tags">
                                                            <a href="" class="tag">
                                                                <span>2016</span>
                                                            </a>
                                                        </div>
                                                        <div class="block_content">
                                                            <h2 class="title">
                                                                <a>Diploma (Computer Engineering)</a>
                                                            </h2>
                                                            <div class="byline">
                                                                <span>Rai University, Saroda, Dholka, Ahmedabad-382260, Gujarat, India</span>
                                                            </div>
                                                            <p class="excerpt"> Percentage 81%, CGPA 3.0/4.0</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="block">
                                                        <div class="tags">
                                                            <a href="" class="tag">
                                                                <span>2013</span>
                                                            </a>
                                                        </div>
                                                        <div class="block_content">
                                                            <h2 class="title">
                                                                <a>SSC </a>
                                                            </h2>
                                                            <div class="byline">
                                                                <span> Seth Hasanali High School, Dholka, Ahmedabad-382225, Gujarat, India</span>
                                                            </div>
                                                            <p class="excerpt">Percentage 71%, Percentile Rank 84 </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="COLLEGEDETAIL" aria-labelledby="profile-tab">
                                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                        <div class="profile_img">
                                            <div id="crop-avatar">
                                                <!-- Current avatar -->
                                                <img class="img-responsive avatar-view img-circle" src="<?php echo $t_img ?>" alt="Avatar" title="Placement Officer Image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <ul class="list-unstyled user_data">
                                            <li>
                                                <h4 style="font-weight: 600;">College Name :  <span style="font-weight: 100;"><?php echo $result[0]->t_name ?></span></h4>
                                            </li>
                                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                                            <li>
                                                <h4 style="font-weight: 600;">Department :  <span style="font-weight: 100;"><?php echo $result[1][0]->d_name ?></span></h4>
                                            </li>
                                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                                            <li>
                                                <h4 style="font-weight: 600;">Email :  <span style="font-weight: 100;"><?php echo $result[0]->t_email ?></span></h4>
                                            </li>
                                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                                        </ul>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="PROJECT" aria-labelledby="profile-tab">
                                    <!-- start user projects -->
                                    <table class="data table table-striped no-margin">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project Name</th>
                                                <th>Client Company</th>
                                                <th class="hidden-phone">Hours Spent</th>
                                                <th>Contribution</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>New Company Takeover Review</td>
                                                <td>Deveint Inc</td>
                                                <td class="hidden-phone">18</td>
                                                <td class="vertical-align-mid">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>New Partner Contracts Consultanci</td>
                                                <td>Deveint Inc</td>
                                                <td class="hidden-phone">13</td>
                                                <td class="vertical-align-mid">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Partners and Inverstors report</td>
                                                <td>Deveint Inc</td>
                                                <td class="hidden-phone">30</td>
                                                <td class="vertical-align-mid">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>New Company Takeover Review</td>
                                                <td>Deveint Inc</td>
                                                <td class="hidden-phone">28</td>
                                                <td class="vertical-align-mid">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- end user projects -->

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="HOBBIES" aria-labelledby="profile-tab">
                                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                    photo booth letterpress, commodo enim craft beer mlkshk </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="LANGUAGE" aria-labelledby="profile-tab">
                                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                    photo booth letterpress, commodo enim craft beer mlkshk </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="BlockModal" tabindex="-1">
                        <div class="modal-dialog modal-sm modal-dialog-centered" style="border-radius: 10px;">
                            <div class="modal-content">
                                <div class="modal-header label-danger" style="color: #fff;">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Block College</h4>
                                </div>
                                <div class="modal-body">
                                    <div style="font-size: 60px;" class="danger text-center text-danger"><i class="far fa-times-circle"></i></div>
                                    <h4>Are you sure you want to Block this College?</h4>
                                    <p>Blocked College will not be able to login on this site.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    <a href="<?php echo base_url('/placement/blockUnblockTpoF/block/' . $result[0]->t_ID); ?>" title="Block Admin" class="btn btn-danger">Yse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="UnblockModal" tabindex="-1">
                        <div class="modal-dialog modal-sm modal-dialog-centered" style="border-radius: 10px;">
                            <div class="modal-content">
                                <div class="modal-header label-success" style="color: #fff;">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Block College</h4>
                                </div>
                                <div class="modal-body">
                                    <div style="font-size: 60px;" class="success text-center text-success"><i class="far fa-times-circle"></i></div>
                                    <h4>Are you sure you want to Unblock this College?</h4>
                                    <p>Unblocked College will be able to login and use this site.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    <a href="<?php echo base_url('/placement/blockUnblockTpoF/unblock/' . $result[0]->t_ID); ?>" title="Block Admin" class="btn btn-success">Yse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ApproveModal" tabindex="-1">
                        <div class="modal-dialog modal-sm modal-dialog-centered" style="border-radius: 10px;">
                            <div class="modal-content">
                                <div class="modal-header label-success" style="color: #fff;">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Approve College</h4>
                                </div>
                                <div class="modal-body">
                                    <div style="font-size: 60px;" class="success text-center text-success"><i class="far fa-times-circle"></i></div>
                                    <h4>Are you sure you want to Approve this College?</h4>
                                    <p>Approve College will be able to login and use this site.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    <a href="<?php echo base_url('/placement/blockUnblockTpoF/unblock/' . $result[0]->t_ID); ?>" title="Block Admin" class="btn btn-success">Yse</a>
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
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->