<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Student Profile</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <?php 
                        if( $con->checkIsTpoF() && $this->session->userdata('sessID') ) {
                            if( $result[0]->s_status == 1) { ?>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#BlockModal"><i class="fa fa-edit m-right-xs"></i> Block</button>
                            <?php }
                            elseif( $result[0]->s_status == 0  && $result[0]->s_created_by == NULL ) { ?>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ApproveModal"><i class="fa fa-edit m-right-xs"></i> Approve</button>
                            <?php }
                            elseif( $result[0]->s_status == 0) { ?>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#UnblockModal"><i class="fa fa-edit m-right-xs"></i> Unblock</button>
                            <?php }
                        }
                        elseif ( $con->checkIsStdF() && $result[0]->s_status == 1 && $this->session->userdata('sessID') == $result[0]->s_ID) { ?>
                            <button type="button" class="btn btn-info" onclick="location.href='<?php echo base_url('/placement/editProfileStdF/'); ?>'"><i class="fa fa-edit m-right-xs"></i> Edit Profile</button>
                        <?php } ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <?php 
                $s_img_path = (empty($result[0]->s_img_path)) ? base_url("assets/images/student/user.png") : base_url("assets/images/student/" . $result[0]->s_img_path) ;
                $t_img = (empty($result[0]->t_img)) ? base_url("assets/images/tpo/user.png") : base_url("assets/images/tpo/" . $result[0]->t_img) ; ?>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" src="<?php echo $s_img_path ?>" alt="Avatar" title="Student Profile Image">
                            </div>
                        </div>
                        <hr>
                        <ul class="list-unstyled user_data">
                            <li>
                                <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Enrollment No :</h4>
                                <p><?php echo $result[0]->s_enroll_no ?></p>
                            </li>
                            <hr>
                            <li>
                                <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Contact No :</h4>
                                <p><?php echo $result[0]->s_contact_no ?></p>
                            </li>
                            <hr>
                            <li class="text-center">
                                <button type="button" class="btn btn-info" onclick="location.href='<?php echo base_url('//'); ?>'"><i class="fa fa-download"></i> Resume</button>
                            </li>
                            <hr>
                            <?php 
                            if( ($con->checkIsTpoF() || $con->checkIsAdminF()) && $this->session->userdata('sessID') ) { ?>
                                <li>
                                    <h4 style="font-weight: 600;">Student Register on :</h4>
                                    <p><?php echo $result[0]->s_create_date ?></p>
                                </li>
                                <hr>
                                <li>
                                    <h4 style="font-weight: 600;">College Updated on :</h4>
                                    <p><?php echo $result[0]->s_update_date ?></p>
                                </li>
                                <hr>
                            <?php } ?>

                        </ul>
                        <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                        <div class="profile_title">
                            <div class="col-md-6">
                                <h3><?php echo $result[0]->s_name ?></h3>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                        <div style="width:100%; height:90px;">
                            <p><?php echo $result[0]->s_description ?></p>
                        </div>
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#COLLEGEDETAIL" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">COLLEGE DETAIL</a>
                                </li>
                                <li role="presentation" class=""><a href="#EDUCATION" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">EDUCATION</a>
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
        </div>
    </div>
</div>
<!-- /page content -->