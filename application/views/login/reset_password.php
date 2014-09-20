<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<h1>Reset Password</h1>
  		<p>Please enter your email address below, and we'll email you a password reset link.</p>
		
		<?= form_open("",array("class"=>"form-horizontal")); ?>
        
	        <div class="form-group">
	        	<?= form_label("Email", "email", array("class"=>"col-sm-2 control-label"));?>
	        	<div class="col-sm-10">
		        	<?= form_input(array("name"=>"email", "id"=>"email","type"=>"email", "class"=>"form-control", "placeholder"=>"Email Address", "value"=>set_value("email", ""), "required"=>"True")); ?>
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