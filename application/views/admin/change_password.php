<div class="row">
  <div class="col-md-8 col-md-offset-2">
  		<h1>Change Password</h1>
  		<p>Enter your current password followed by your new one (twice!) to change it.</p>
  <?= form_open("", array("role"=>"form", "class"=>"form-horizontal")); ?>
        <div class="form-group">
        	<?= form_label("Password", "inputPassword", array("class"=>"col-sm-3 control-label"));?>
        	<div class="col-sm-9">
        		<?= form_password(array("name"=>"password", "class"=>"form-control", "placeholder"=>"Current Password", "required"=>"True", "id"=>"inputPassword")); ?>
        	</div>
        </div>
        <div class="form-group">
        	<?= form_label("New Password", "inputNewPassword1", array("class"=>"col-sm-3 control-label"));?>
        	<div class="col-sm-9">
        		<?= form_password(array("name"=>"password1", "class"=>"form-control", "placeholder"=>"Choose a Password", "required"=>"True", "id"=>"inputNewPassword1")); ?>
        	</div>
        </div>
        <div class="form-group">
        	<?= form_label("New Password Again", "inputNewPassword2", array("class"=>"col-sm-3 control-label"));?>
       		<div class="col-sm-9">
       			<?= form_password(array("name"=>"password2", "class"=>"form-control", "placeholder"=>"Password Again", "required"=>"True", "id"=>"inputNewPassword2")); ?>
       		</div>
       	</div>
        <div class="form-group">
        	<div class="col-sm-9 col-sm-offset-3">
        		<?= form_submit(array("class"=>"btn btn-primary", "value"=>"Change Password")); ?>
        	</div>
        </div>
      	<?= form_close(); ?>

</div>
</div>