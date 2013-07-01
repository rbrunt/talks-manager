	<?php echo form_open("admin/login", array("class"=>"form-signin")); ?>


	<!-- <form class="form-signin"> -->
		<h2 class="form-signin-heading">Please sign in</h2>
        <!-- <input type="text" class="input-block-level" placeholder="Email address"> -->
        <?php echo form_input(array("name"=>"email","type"=>"email", "class"=>"input-block-level", "placeholder"=>"Email Address", "value"=>set_value("email", ""), "required"=>"True")); ?>
        <?php echo form_password(array("name"=>"password", "class"=>"input-block-level", "placeholder"=>"Password", "required"=>"True")); ?>
        <!-- <input type="password" class="input-block-level" placeholder="Password"> -->
        <!-- <button class="btn btn-large btn-primary" type="submit">Sign in</button> -->
        <?php echo form_submit(array("class"=>"btn btn-large btn-primary", "value"=>"Sign in")); ?>
      	<?php echo form_close(); ?>
      	<script>
      		document.querySelector("input[name=email]").focus();
      	</script>
      <!-- </form> -->