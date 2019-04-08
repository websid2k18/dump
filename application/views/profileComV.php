<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Company Profile</h2>
                    <ul class="nav navbar-right panel_toolbox">

                        <?php 
                        if( $this->session->userdata('sessRole') == 'ADMIN' && $this->session->userdata('sessID') ) {
                            if( $result[0]->c_status == 1) { ?>
                                <a class="btn btn-danger"><i class="fa fa-edit m-right-xs"></i> Block</a>
                            <?php }
                            elseif( $result[0]->c_status == 0  && $result[0]->c_approved_by_admin_ID == NULL ) { ?>
                                <a class="btn btn-success" style="color: #ffffff;"><i class="fa fa-edit m-right-xs"></i> Approve</a>
                            <?php }
                            elseif( $result[0]->c_status == 0) { ?>
                                <a class="btn btn-success" style="color: #ffffff;"><i class="fa fa-edit m-right-xs"></i> Unblock</a>
                            <?php }
                        }
                        elseif ( $this->session->userdata('sessRole') == 'Company' && $this->session->userdata('sessRole') == $result[0]->c_ID ) {
                            ?>
                            <a class="btn btn-success" style="color: #ffffff;"><i class="fa fa-edit m-right-xs"></i> Edit Profile</a>
                        <?php } ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <?php 
                $c_img = (empty($result[0]->c_img)) ? base_url("assets/images/company/user.png") : base_url("assets/images/company/" . $result[0]->c_img) ;
                $c_hr_img = (empty($result[0]->c_hr_img)) ? base_url("assets/images/company/user.png") : base_url("assets/images/company/" . $result[0]->c_hr_img) ;
                ?>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" src="<?php echo $c_img ?>" alt="Avatar" title="Company Logo">
                            </div>
                        </div>
                        <hr>
                        <ul class="list-unstyled user_data">
                            <li>
                                <h4 style="font-weight: 600;"><i class="fa fa-map-marker user-profile-icon"></i> Address :</h4>
                                <p><?php echo $result[0]->c_address ?></p>
                            </li>
                            <hr>
                            <?php 
                            if( $this->session->userdata('sessRole') == 'ADMIN' && $this->session->userdata('sessRole') ) { ?>
                                <li>
                                    <h4 style="font-weight: 600;">College Register on :</h4>
                                    <p><?php echo $result[0]->c_create_date ?></p>
                                </li>
                                <hr>
                                <li>
                                    <h4 style="font-weight: 600;">College Updated on :</h4>
                                    <p><?php echo $result[0]->c_update_date ?></p>
                                </li>
                                <hr>
                                <?php if ($result[0]->c_status == 1) { ?>
                                    <li>
                                        <h4 style="font-weight: 600;">Approved by admin :</h4>
                                        <a href="<?php echo base_url('/placement/profileAdminF/' . $result[0]->a_ID); ?>" class="user-profile">
                                            <img src="<?php echo base_url('assets/images/admin/' . $result[0]->a_profile_img); ?>" alt="">
                                            <?php echo $result[0]->a_name ?>
                                        </a>
                                    </li>
                                    <hr>
                                <?php }
                                elseif ($result[0]->c_status == 0) { ?>
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

                        <div class="profile_title">
                            <div class="col-md-6">
                                <h3><?php echo $result[0]->a_name ?></h3>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                        <!-- start of user-activity-graph -->
                        <div style="width:100%; height:90px;">
                            <p><?php echo $result[0]->c_description ?></p>
                        </div>
                        <!-- end of user-activity-graph -->

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
                                    </div>

                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <ul class="list-unstyled user_data">
                                            <li>
                                                <h4 style="font-weight: 600;">Name :  <span style="font-weight: 100;"><?php echo $result[0]->c_hr_name ?></span></h4>
                                            </li>
                                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                                            <li>
                                                <h4 style="font-weight: 600;">Email :  <span style="font-weight: 100;"><?php echo $result[0]->c_email ?></span></h4>
                                            </li>
                                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                                            <li>
                                                <h4 style="font-weight: 600;">Mobile No :  <span style="font-weight: 100;"><?php echo $result[0]->c_hr_no ?></span></h4>
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
            </div>
        </div>
    </div>
</div>
<!-- /page content