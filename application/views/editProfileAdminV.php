<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Admin Profile</h2>
                    <div class="clearfix"></div>
                </div>
                <?php 
                $a_profile_img = (empty($result[0]->a_profile_img)) ? base_url("assets/images/Admin/user.png") : base_url("assets/images/Admin/" . $result[0]->a_profile_img) ;
                $cre_img = (empty($result[1]->cre_img)) ? base_url("assets/images/Admin/user.png") : base_url("assets/images/Admin/" . $result[1]->cre_img) ;

                echo form_open_multipart( base_url('/placement/editProfileAdminF/'), 'id="demo-form" data-parsley-validate class="form-horizontal form-label-left" method="post"');

                if (!empty($errorMsg) OR !empty(form_error())) { ?>
                    <div class="col-md-12 no-padding">
                        <div class="form-group">
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong><?php echo form_error(); echo($errorMsg); ?></strong>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar col-md-12 text-center">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" src="<?php echo $a_profile_img ?>" alt="Avatar" title="College Logo">
                            </div>
                        </div>
                        <ul class="list-unstyled user_data">
                            <li class="text-center" style="padding-top: 10px;">
                                <div class="form-group">
                                    <label class="file-upload btn btn-primary">
                                        Edit Image<?php echo form_upload('aImg', set_value('aImg') ,'class="hide"'); ?>
                                    </label>
                                </div>
                            </li>
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
                                <h4 style="font-weight: 600;">Email :  <span style="font-weight: 100;"><?php echo $result[0]->a_email ?></span></h4>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;">Name : </h4>
                                    <?php echo form_input('aName', set_value('aName', $result[0]->a_name), 'id="aNameId" required="required" placeholder="Collage Name" class="form-control col-md-7 col-xs-12"'); ?>
                                    <ul class="parsley-errors-list filled" id="parsley-id-4">
                                        <li class="parsley-required">
                                            <?php echo form_error('aName'); ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;">Address : </h4>
                                    <?php echo form_textarea('aAddress', set_value('aAddress', $result[0]->a_address), 'class="form-control" id="aAddressID" style="resize : none; height:100px;" placeholder="Address"'); ?>
                                    <ul class="parsley-errors-list filled" id="parsley-id-4">
                                        <li class="parsley-required">
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <h4 style="font-weight: 600;">Mobile No : </h4>
                                    <?php echo form_input('aMobileNo', set_value('aMobileNo', $result[0]->a_contact_no), 'type="number" id="aMobileNo" required="required" minlength="10" maxlength="10" placeholder="Mobile No" class="form-control col-md-7 col-xs-12"'); ?>
                                    <ul class="parsley-errors-list filled" id="parsley-id-4">
                                        <li class="parsley-required">
                                            <?php echo form_error('aMobileNo'); ?>
                                            <?php echo validation_errors(); ?>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <hr style="margin-top: 10px; margin-bottom: 10px;">
                            <li>    
                                <div class="form-group">
                                    <div class="float-right pull-right">
                                        <button class="btn btn-danger" type="reset">Reset</button>
                                        <button class="btn btn-success" type="submit">Edit</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="BlockModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered" style="border-radius: 10px;">
            <div class="modal-content">
                <div class="modal-header label-danger" style="color: #fff;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Block Admin</h4>
                </div>
                <div class="modal-body">
                    <div style="font-size: 60px;" class="danger text-center text-danger"><i class="far fa-times-circle"></i></div>
                    <h4>Are you sure you want to Block this Admin?</h4>
                    <p>Blocked Admin will not be able to login on this site.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <!-- <button type="button" formaction="<?php echo base_url('/placement/blockUnblockAdminF/' . $result[0]->a_ID); ?>" class="btn btn-danger">Yse</button> -->
                    <a href="<?php echo base_url('/placement/blockUnblockAdminF/block/' . $result[0]->a_ID); ?>" title="Block Admin" class="btn btn-danger">Yse</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="UnblockModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered" style="border-radius: 10px;">
            <div class="modal-content">
                <div class="modal-header label-success" style="color: #fff;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Block Admin</h4>
                </div>
                <div class="modal-body">
                    <div style="font-size: 60px;" class="success text-center text-success"><i class="far fa-times-circle"></i></div>
                    <h4>Are you sure you want to Unblock this Admin?</h4>
                    <p>Unblocked Admin will be able to login and use this site.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <!-- <button type="button" formaction="<?php echo base_url('/placement/blockUnblockAdminF/' . $result[0]->a_ID); ?>" class="btn btn-success">Yse</button> -->
                    <a href="<?php echo base_url('/placement/blockUnblockAdminF/unblock/' . $result[0]->a_ID); ?>" title="Block Admin" class="btn btn-success">Yse</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->