<?php echo form_open('rkk_user/add'); ?>

	<div>
		Név: 
		<input type="text" name="user_name" value="<?php echo $this->input->post('user_name'); ?>" />
	</div>
	<div>
		Jelszó: 
		<input type="text" name="user_pass" value="<?php echo $this->input->post('user_pass'); ?>" />
	</div>
	<div>
		Jogosultság: 
		<input type="text" name="user_perm" value="<?php echo $this->input->post('user_perm'); ?>" />
		<span class="text-danger"><?php echo form_error('user_perm');?></span>
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>