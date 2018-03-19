<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="panel">
				<div class="panel-heading">
					<h3><?php echo $rkk_user['user_name'] ?> adatainak szerkesztése</h3>
				</div>
				<div class="panel-body">
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
							<select class="form-control" name="user_perm">
								<option value="">Válassz!</option>
								<?php foreach($user_perms as $perm ){ ?>
								<option value="<?php echo $perm['id']; ?>" <?php echo $this->input->post('fk_user_id') ? $perm['id'] : "selected"; ?>><?php echo $perm['name'];?></option>
								<?php } ?>
							</select>
							<span class="text-danger"><?php echo form_error('user_perm');?></span>
						</div>
					</fieldset>
					<fieldset>
						<button class="btn btn-primary" type="submit">Mentés</button>
						<a href="/rkk_user" class="btn btn-default">Mégse</a>
					</fieldset>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>