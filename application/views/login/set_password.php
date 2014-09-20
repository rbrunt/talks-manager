<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
  <h1>Create your account</h1>
  <p>Just enter in your details and you'll have shiny new account to log in with!</p>

  <?php echo form_open("",array("class"=>"form-horizontal")); ?>
  	<div class="form-group">
  		<?= form_label("Email", "email", array("class"=>"col-sm-2 control-label"));?>
       	<div class="col-sm-10">
        	<?= form_input(array("name"=>"email","type"=>"email", "class"=>"form-control", "placeholder"=>"Email Address", "value"=>set_value("email", ""), "required"=>"True", "id"=>"email")); ?>
        	<span class="help-block">Enter the email you received your account invite on.</span>
        </div>
    </div>
    <div class="form-group">
    	<?= form_label("Name", "name", array("class"=>"col-sm-2 control-label"));?>
        <div class="col-sm-10">
        	<?= form_input(array("name"=>"name", "type"=>"text", "class"=>"form-control", "placeholder"=>"Your Name", "value"=>set_value("name", ""), "required"=>"True", "id"=>"name")); ?>
        </div>
    </div>
    <div class="form-group">
    	<?= form_label("Password", "password1", array("class"=>"col-sm-2 control-label"));?>
    	<div class="col-sm-10">
        	<?= form_password(array("name"=>"password1", "class"=>"form-control", "placeholder"=>"Choose a Password", "required"=>"True", "id"=>"password1")); ?>
        </div>
    </div>
    <div class="form-group">
    	<?= form_label("Password Repeat", "password2", array("class"=>"col-sm-2 control-label"));?>
    	<div class="col-sm-10">
       		<?= form_password(array("name"=>"password2", "class"=>"form-control", "placeholder"=>"Password Again", "required"=>"True", "id"=>"password2")); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
        	<?=	 form_submit(array("class"=>"btn btn-large btn-primary", "value"=>"Add User")); ?>
        </div>
    </div>
      	<?php echo form_close(); ?>

</div>
</div>