	<?php echo form_open("admin/login", array("class"=>"form-signin")); ?>

		<h2 class="form-signin-heading clearfix">Please sign in</h2>
        <?php echo form_input(array("name"=>"email","type"=>"email", "class"=>"input-block-level", "placeholder"=>"Email Address", "value"=>set_value("email", ""), "required"=>"True", "autofocus"=>"True")); ?>
        <?php echo form_password(array("name"=>"password", "class"=>"input-block-level", "placeholder"=>"Password", "required"=>"True")); ?>
        <?php echo form_submit(array("class"=>"btn btn-primary pull-right", "value"=>"Sign in")); ?>
        <a href="<?php echo base_url("admin/passwordreset")?>" class="">Forgotten Password?</a>
        <?php echo form_close(); ?>
        <p>If you don't have a login, but think you should, you can <a href="mailto:web@diccu.co.uk?subject=Account%20Request%20for%20Talks%20System">ask for one by email.</a></p>