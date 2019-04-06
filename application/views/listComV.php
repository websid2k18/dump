<!-- page content -->
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Company List</h2>
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
                                <th class="column-title"> HR Image </th>
                                <th class="column-title"> HR name </th>
                                <th class="column-title"> Email </th>
                                <th class="column-title"> HR Contact Number </th>
                                <th class="column-title"> Website </th>
                                <th class="column-title"> Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $odd = "odd";

                            foreach ($result as $key) {
                                $c_img = (empty($key->c_img)) ? base_url("assets/images/company/user.png") : base_url("assets/images/company/" . $key->c_img) ;
                                $c_hr_img = (empty($key->c_hr_img)) ? base_url("assets/images/company/user.png") : base_url("assets/images/company/" . $key->c_hr_img) ;

                                $odd = ($odd == 'odd') ? "even" : "odd" ; ?>

                                <tr class="pointer text-center <?php echo $odd . " "; echo ($key->c_status == '0') ? "danger" : "" ?>">
                                    <td><img src="<?php echo $c_img ?>" alt="College Logo" class="hw-40"></td>
                                    <td><?php echo $key->c_name ?></td>
                                    <td><?php echo $key->c_contact_no ?></td>
                                    <td><img src="<?php echo $c_hr_img ?>" alt="Profile Image" class="img-circle hw-40"></td>
                                    <td><?php echo $key->c_hr_name ?></td>
                                    <td><?php echo $key->c_email ?></td>
                                    <td><?php echo $key->c_hr_no ?></td>
                                    <td><?php echo $key->c_website ?></td>
                                    <td><a href="/placenebt/profileComF/<?php echo $key->c_ID; ?>" title="Edit College" class="btn btn-info">Edit</a></td>
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