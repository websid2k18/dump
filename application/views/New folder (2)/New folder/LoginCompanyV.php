<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Company Log In Form</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <?php echo form_open('HomeC/LoginCompanyF', 'id="demo-form2 data-parsley-validate" class="form-horizontal form-label-left" method="post"');

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

          <div class="col-md-12 no-padding">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Email" style="word-break: break-all;">Email <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <?php echo form_input('Email', set_value('Email'), 'type="email" id="EmailId" required="required" onchange="unique(this.value);" maxlength="250" placeholder="Company Email" class="form-control col-md-7 col-xs-12"');; ?>
                <ul class="parsley-errors-list filled" id="parsley-id-1">
                  <li class="parsley-required">
                    <?php echo form_error('Email'); ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-12 no-padding">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Password" style="word-break: break-all;">Password<span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <?php echo form_password('Password', set_value('Password'), 'type="Password" id="PasswordId" required="required" placeholder="Password" name="Password" class="form-control col-md-7 col-xs-12"'); ?>
                <ul class="parsley-errors-list filled" id="parsley-id-2">
                  <li class="parsley-required">
                    <?php echo form_error('Password'); ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="float-right pull-right">
              <button class="btn btn-danger" type="reset">Reset</button>
              <button class="btn btn-warning" type="button">Cancel</button>
              <button class="btn btn-success" type="submit">Log In</button>
            </div>
          </div>

          <?php form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<!-- <script>
  function unique(id) {
    $.ajax({
      type:'POST',
      url:'<?= base_url(); ?>HomeC/cEmailUniqueF',
      data:{'Email': id},
      success:function(data){
        if (data == 'Unique' ) {
          $('#parsley-id-1').html("You are not Register yet!<a href='<?= base_url(); ?>CompanyC/RegCompanyF'> Click Here To Register</a>");
          $('#EmailId').addClass("parsley-error");
        }
        else {
          $('#parsley-id-1').html("");
          $('#EmailId').removeClass("parsley-error");
        }
      }
    });
  };
</script> -->