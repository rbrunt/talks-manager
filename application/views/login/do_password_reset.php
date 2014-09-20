<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	<h1>Choose a new password</h1>
	<p>Re-enter your email address below (so we know you're who you say you are), and choose a new password. You'll be back into your account in no time!</p>

  	<?php echo form_open("",array("class"=>"form-horizontal")); ?>
        <div class="form-group">
        	<?= form_label("Email", "email", array("class"=>"col-sm-2 control-label"));?>
        	<div class="col-sm-10">
        		<?= form_input(array("name"=>"email","type"=>"email", "id"=>"email", "class"=>"form-control", "placeholder"=>"Email Address", "value"=>set_value("email", ""), "required"=>"True")); ?>
        	</div>
        </div>
        <div class="form-group">
        	<?= form_label("Password", "password1", array("class"=>"col-sm-2 control-label"));?>
        	<div class="col-sm-10">
        		<?= form_password(array("name"=>"password1", "id"=>"password1", "class"=>"form-control", "placeholder"=>"Choose a Password", "required"=>"True")); ?>
        	</div>
        </div>
        <div class="form-group">
        	<?= form_label("Repeat Password", "password2", array("class"=>"col-sm-2 control-label"));?>
       		<div class="col-sm-10">
       			<?= form_password(array("name"=>"password2", "id"=>"password2", "class"=>"form-control", "placeholder"=>"Password Again", "required"=>"True")); ?>
       		</div>
        </div>
        <div class="form-group">
        	<div class="col-sm-10 col-sm-offset-2">
        		<?= form_submit(array("class"=>"btn btn-primary", "value"=>"Reset Password")); ?>
        	</div>
        </div>
      	<?php echo form_close(); ?>

</div>
</div>