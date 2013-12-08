<div class="row">
  <div class="span12">

  <?php echo form_open(); ?>
  		<p>Enter your current password, followed by your new one (twice!)</p>
        <?php echo form_password(array("name"=>"password", "class"=>"span12", "placeholder"=>"Current Password", "required"=>"True")); ?>
        <?php echo form_password(array("name"=>"password1", "class"=>"span12", "placeholder"=>"Choose a Password", "required"=>"True")); ?>
       	<?php echo form_password(array("name"=>"password2", "class"=>"span12", "placeholder"=>"Password Again", "required"=>"True")); ?>
        <?php echo form_submit(array("class"=>"btn btn-primary", "value"=>"Change Password")); ?>
      	<?php echo form_close(); ?>

</div>
</div>