	<!-- <?php echo form_open("admin/login", array("class"=>"form-signin")); ?> -->
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
    <?php echo form_open("admin/login", array("role"=>"form", "class"=>"form-horizontal")); ?>

  		<h2 class="form-signin-heading clearfix">Please sign in</h2>
        
          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <?php echo form_input(array("name"=>"email","type"=>"email","id"=>"inputEmail", "class"=>"form-control", "placeholder"=>"Email Address", "value"=>set_value("email", ""), "required"=>"True")); ?>
            </div>
          </div>
        
          <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <?php echo form_password(array("name"=>"password","id"=>"inputPassword", "class"=>"form-control", "placeholder"=>"Password", "required"=>"True")); ?>
            </div>
          </div>
        
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <?php echo form_submit(array("class"=>"btn btn-primary", "value"=>"Sign in")); ?>
              <a href="<?php echo base_url("admin/passwordreset")?>" class="pull-right btn btn-link">Forgotten Password?</a>
            </div>
          </div>
          <p>If you don't have a login, but think you should, you can <a href="mailto:web@diccu.co.uk?subject=Account%20Request%20for%20Talks%20System">ask for one by email.</a></p>        
        	<?php echo form_close(); ?>
        	<script>
        		document.querySelector("input[name=email]").focus();
        	</script>
    </div>
  </div>
