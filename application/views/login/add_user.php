<div class="row">
  <div class="span12">

  <?php echo form_open("admin/adduser"); ?>
        <p>What is the new user's email address? An email will be sent to them with a link to create a password.</p>
        <?php echo form_input(array("name"=>"email","type"=>"email", "class"=>"span12", "placeholder"=>"Email Address", "value"=>set_value("email", ""), "required"=>"True")); ?>
        <?php echo form_submit(array("class"=>"btn btn-large btn-primary", "value"=>"Add User")); ?>
      	<?php echo form_close(); ?>

</div>
</div>