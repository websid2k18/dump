<!-- page content -->
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table design <small>Custom design</small></h2>
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
                                <th class="column-title"> Logo</th>
                                <th class="column-title"> Name </th>
                                <th class="column-title"> Contact Number </th>
                                <th class="column-title"> TPO Img </th>
                                <th class="column-title"> TPO name </th>
                                <th class="column-title"> Email </th>
                                <th class="column-title"> TPO Contact Number </th>
                                <th class="column-title"> Website </th>
                                <th class="column-title"> Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $odd = "odd";

                            foreach ($result as $key) {
                                $t_img = (empty($result->t_img)) ? base_url("assets/images/admin/user.png") : base_url("assets/images/admin/" . $result->t_img) ;
                                $t_tpo_img = (empty($result->t_tpo_img)) ? base_url("assets/images/admin/user.png") : base_url("assets/images/admin/" . $result->t_tpo_img) ;

                                $odd = ($odd == 'odd') ? "even" : "odd" ; ?>

                                <tr class="pointer text-center <?php echo $odd . " "; echo ($key->t_status == '0') ? "danger" : "" ?>">
                                    <td><img src="<?php echo $t_img ?>" alt="College Logo" class="hw-40"></td>
                                    <td><?php echo $key->t_name ?></td>
                                    <td><?php echo $key->t_contact_number ?></td>
                                    <td><img src="<?php echo $t_tpo_img ?>" alt="Profile Image" class="img-circle hw-40"></td>
                                    <td><?php echo $key->t_tpo_name ?></td>
                                    <td><?php echo $key->t_email ?></td>
                                    <td><?php echo $key->t_tpo_contact_number ?></td>
                                    <td><?php echo $key->t_website ?></td>
                                    <td><a href="/placenebt/profileTpoF" title="View Profile" class="btn btn-info">Info</a></td>
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