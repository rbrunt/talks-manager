<div class="row">
  <div class="span12">

  <?php echo form_open(); ?>
  		<p>Please enter your email address below, and we'll email you a password reset link.</p>
        <?php echo form_input(array("name"=>"email","type"=>"email", "class"=>"span12", "placeholder"=>"Email Address", "value"=>set_value("email", ""), "required"=>"True")); ?>
        <?php echo form_submit(array("class"=>"btn btn-primary", "value"=>"Reset Password")); ?>
      	<?php echo form_close(); ?>
</div>
</div>