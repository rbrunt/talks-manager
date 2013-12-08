<div class="row">
  <div class="span12">

  <?php echo form_open(); ?>
  		<p>Please confirm your email address and a new password, then hit "Reset Password":</p>
        <?php echo form_input(array("name"=>"email","type"=>"email", "class"=>"span12", "placeholder"=>"Email Address", "value"=>set_value("email", ""), "required"=>"True")); ?>
        <?php echo form_password(array("name"=>"password1", "class"=>"span12", "placeholder"=>"Choose a Password", "required"=>"True")); ?>
       	<?php echo form_password(array("name"=>"password2", "class"=>"span12", "placeholder"=>"Password Again", "required"=>"True")); ?>
        <?php echo form_submit(array("class"=>"btn btn-primary", "value"=>"Reset Password")); ?>
      	<?php echo form_close(); ?>

</div>
</div>