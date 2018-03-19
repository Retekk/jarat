<script type="text/javascript" src="/assets/jquery-validation-1.17.0/dist/jquery.validate.js"></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<h3>Új felhasználó</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<?php echo form_open('rkk_user/add', array('id' => 'rkk_user_form')); ?>
				<fieldset>
					<div class="form-group">
						<label>Név:</label> 
						<input class="form-control" type="text" name="user_name" id="user_name" value="<?php echo $this->input->post('user_name'); ?>" />
					</div>
					<div class="form-group">
						<label>Email:</label> 
						<input class="form-control" type="email" name="user_email" id="user_email" value="<?php echo $this->input->post('user_email'); ?>" />
					</div>
					<div class="form-group">
						<label>Jelszó:</label> 
						<input class="form-control" type="text" name="user_pass" id="user_pass" value="<?php echo $this->input->post('user_pass'); ?>" />
					</div>
					<div class="form-group">
						<label>Jogosultság:</label> 
						<select class="form-control" name="user_perm" id="user_perm">
							<option value="">Válassz!</option>
							<?php foreach($user_perms as $perm ){ ?>
							<option value="<?php echo $perm['id']; ?>"><?php echo $perm['name'];?></option>
							<?php } ?>
						</select>
						<span class="text-danger"><?php echo form_error('user_perm');?></span>
					</div>
				</fieldset>
				<fieldset>
					<button class="btn btn-primary" type="submit">Létrehoz</button>
					<a href="/rkk_user" class="btn btn-default" type="submit">Mégse</a>
				</fieldset>
			<?php echo form_close(); ?>
			<script type="text/javascript" src="/assets/js/rkk_user_add_validator.js"></script>
		</div>
	</div>
</div>