<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Admin Profile</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <?php 
                        if( $this->session->userdata('sessRole') == 'ADMIN' && $this->session->userdata('sessID') ) {
                            if( $result[0]->a_status == 1 && $this->session->userdata('sessID') == $result[0]->a_ID) { ?>
                                <a class="btn btn-info" style="color: #ffffff;"><i class="fa fa-edit m-right-xs"></i> Edit Profile</a>
                            <?php }
                            elseif( $result[0]->a_status == 0 ) { ?>
                                <a class="btn btn-success" style="color: #ffffff;"><i class="fa fa-edit m-right-xs"></i> Unblock</a>
                            <?php }
                            elseif( $result[0]->a_status == 1 && $this->session->userdata('sessRole') !== $result[0]->a_ID) { ?>
                                <a class="btn btn-danger"><i class="fa fa-edit m-right-xs"></i> Block</a>
                            <?php }
                        } ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <?php 
                $a_profile_img = (empty($result[0]->a_profile_img)) ? base_url("assets/images/Admin/user.png") : base_url("assets/images/Admin/" . $result[0]->a_profile_img) ;
                $cre_img = (empty($result[1]->cre_img)) ? base_url("assets/images/Admin/user.png") : base_url("assets/images/Admin/" . $result[1]->cre_img) ;?>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar col-md-12 text-center">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" src="<?php echo $a_profile_img ?>" alt="Avatar" title="College Logo">
                            </div>
                        </div>
                        <ul class="list-unstyled user_data">
                            <?php 
                            if( $this->session->userdata('sessRole') == 'ADMIN' && $this->session->userdata('sessRole') ) { ?>
                                <?php 
                                if( $result[0]->a_status == 1 && $result[0]->a_created_by == 0 ) { ?>
                                    <hr style="margin-bottom: 5px;">
                                    <li class="alert-danger text-center" style="padding: 10px;">
                                        <h4 style="font-weight: 600;">Master Admin</h4>
                                    </li>
                                    <hr style="margin-top: 5px;">
                                <?php }
                                elseif($result[0]->a_status == 1 ) { ?>
                                    <hr style="margin-bottom: 5px;">
                                    <li class="alert-danger text-center" style="padding: 10px;">
                                        <h4 style="font-weight: 600;">Admin</h4>
                                    </li>
                                    <hr style="margin-top: 5px;">
                                    <li>
                                        <h4 style="font-weight: 600;">Approved by admin :</h4>
                                        <a href="<?php echo base_url('/placement/profileAdminF/' . $result[1]->cre_ID); ?>" class="user-profile">
                                            <img src="<?php echo $cre_img; ?>" alt="">
                                            <?php echo $result[1]->cre_name ?>
                                        </a>
                                    </li>
                                    <hr>
                                <?php }
                                else { ?>
                                    <hr style="margin-bottom: 5px;">
                                    <li class="alert-danger text-center" style="padding: 10px;">
                                        <h4 style="font-weight: 600;">Slave</h4>
                                    </li>
                                    <hr style="margin-top: 5px;">
                                    <li>
                                        <h4 style="font-weight: 600;">Blocked by admin :</h4>
                                        <a href="<?php echo base_url('/placement/profileAdminF/' . $result[1]->cre_ID); ?>" class="user-profile">
                                            <img src="<?php echo $cre_img; ?>" alt="">
                                            <?php echo $result[1]->cre_name ?>
                                        </a>
                                    </li>
                                    <hr>
                                <?php } ?>
                            <?php } ?>
                            <li>
                                <h4 style="font-weight: 600;">Admin Register on :</h4>
                                <p><?php echo $result[0]->a_create_date ?></p>
                            </li>
                            <hr>
                            <li>
                                <h4 style="font-weight: 600;">Admin Updated on :</h4>
                                <p><?php echo $result[0]->a_update_date ?></p>
                            </li>
                            <hr>
                        </ul>
                        <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                        <ul class="list-unstyled user_data">
                            <li>
                                <h4 style="font-weight: 600;">Name :  <span style="font-weight: 100;"><?php echo $result[0]->a_name ?></span></h4>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                            <li>
                                <h4 style="font-weight: 600;">Email :  <span style="font-weight: 100;"><?php echo $result[0]->a_email ?></span></h4>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                            <li>
                                <h4 style="font-weight: 600;">Address :  <span style="font-weight: 100;"><?php echo $result[0]->a_address ?></span></h4>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                            <li>
                                <h4 style="font-weight: 600;">Mobile No :  <span style="font-weight: 100;"><?php echo $result[0]->a_contact_no ?></span></h4>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content