<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<h3>Új felhasználó</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<?php echo form_open('rkk_user/add'); ?>
				<fieldset>
					<div class="form-group">
						<label>Név:</label> 
						<input class="form-control" type="text" name="user_name" value="<?php echo $this->input->post('user_name'); ?>" />
					</div>
					<div class="form-group">
						<label>Email:</label> 
						<input class="form-control" type="text" name="user_email" value="<?php echo $this->input->post('user_email'); ?>" />
					</div>
					<div class="form-group">
						<label>Jelszó:</label> 
						<input class="form-control" type="text" name="user_pass" value="<?php echo $this->input->post('user_pass'); ?>" />
					</div>
					<div class="form-group">
						<label>Jogosultság:</label> 
						<input class="form-control" type="text" name="user_perm" value="<?php echo $this->input->post('user_perm'); ?>" />
						<span class="text-danger"><?php echo form_error('user_perm');?></span>
					</div>
				</fieldset>
				<fieldset>
					<button class="btn btn-primary" type="submit">Létrehoz</button>
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>