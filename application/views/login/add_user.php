<div class="row">
  <div class="col-md-8 col-md-offset-2">
  		<h1>Add New User</h1>
        <p>What is the new user's email address? An email will be sent to them with a link to create a password.</p>
        <div class="row">
        	<div class="col-md-12">
				<?php echo form_open("admin/adduser", array("class"=>"form-inline")); ?>
        		<div class="form-group">        	
	        		<?php echo form_input(array("name"=>"email","type"=>"email", "class"=>"form-control", "placeholder"=>"Email Address", "value"=>set_value("email", ""), "required"=>"True")); ?>
        		</div>
        		<div class="form-group">
        			<?php echo form_submit(array("class"=>"btn btn-large btn-primary", "value"=>"Add User")); ?>
        		</div>
      			<?php echo form_close(); ?>
      		</div>
      	</div>

</div>
</div>