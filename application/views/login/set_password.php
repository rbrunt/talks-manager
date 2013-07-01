<div class="row">
  <div class="span12">

  <?php echo form_open(); ?>
        <?php echo form_input(array("name"=>"email","type"=>"email", "class"=>"span12", "placeholder"=>"Email Address", "value"=>set_value("email", ""), "required"=>"True")); ?>
        <?php echo form_password(array("name"=>"password1", "class"=>"span12", "placeholder"=>"Choose a Password", "required"=>"True")); ?>
       	<?php echo form_password(array("name"=>"password2", "class"=>"span12", "placeholder"=>"Password Again", "required"=>"True")); ?>
        <?php echo form_submit(array("class"=>"btn btn-large btn-primary", "value"=>"Add User")); ?>
      	<?php echo form_close(); ?>

</div>
</div>