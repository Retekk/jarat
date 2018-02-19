<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<h3><?php echo $rkk_user['user_name'] ?> adatainak szerkesztése</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<?php echo form_open('rkk_user/edit/'.$rkk_user['user_id']); ?>
				<fieldset>
					<div class="form-group">
						<label>Név:</label> 
						<input class="form-control" type="text" name="user_name" value="<?php echo ($this->input->post('user_name') ? $this->input->post('user_name') : $rkk_user['user_name']); ?>" />
					</div>
					<div class="form-group">
						<label>Email:</label> 
						<input class="form-control" type="text" name="user_email" value="<?php echo ($this->input->post('user_email') ? $this->input->post('user_email') : $rkk_user['user_email']); ?>" />
					</div>
					<div class="form-group">
						<label>Jogosultság:</label> 
						<input class="form-control" type="text" name="user_perm" value="<?php echo ($this->input->post('user_perm') ? $this->input->post('user_perm') : $rkk_user['user_perm']); ?>" />
						<span class="text-danger"><?php echo form_error('user_perm');?></span>
					</div>
				</fieldset>
				<fieldset>
					<button class="btn btn-primary" type="submit">Mentés</button>
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>