<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Listed Colleges</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <?php 
                        if (!empty($listcom)) {
                            foreach ($listcom as $key => $value) { 
                                $c_img = (empty($value->c_img)) ? base_url("assets/images/company/user.png") : base_url("assets/images/company/" . $value->c_img) ;  ?>
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="<?php echo $c_img; ?>" alt="image" />
                                            <div class="mask">
                                                <div class="tools tools-bottom">
                                                    <a href="https://<?= $value->c_website ?>"><i class="fa fa-link"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption">
                                            <p><?= $value->c_name ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Listed Company</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <?php 
                        if (!empty($listtpo)) {
                            foreach ($listtpo as $key => $value) { 
                                $t_img = (empty($value->t_img)) ? base_url("assets/images/tpo/user.png") : base_url("assets/images/tpo/" . $value->t_img) ;  ?>
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="<?php echo $t_img; ?>" alt="image" />
                                            <div class="mask">
                                                <div class="tools tools-bottom">
                                                    <a href="https://<?= $value->t_website ?>"><i class="fa fa-link"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption">
                                            <p><?= $value->t_name ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- /page content -->

            <!-- <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 events well text-justify home_steps" id="events">
                        <?php /*$this->view('placement_news',$news_data);*/ ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 login_sidebar events well text-justify home_steps" id="login_sidebar">
                        <?php /*$this->view('placement_login_sidebar');*/ ?>
                    </div>
                </div>
            </div> -->