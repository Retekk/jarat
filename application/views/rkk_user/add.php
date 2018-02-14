<?php echo form_open('rkk_user/add'); ?>

	<div>
		User Name : 
		<input type="text" name="user_name" value="<?php echo $this->input->post('user_name'); ?>" />
	</div>
	<div>
		User Pass : 
		<input type="text" name="user_pass" value="<?php echo $this->input->post('user_pass'); ?>" />
	</div>
	<div>
		User Perm : 
		<input type="text" name="user_perm" value="<?php echo $this->input->post('user_perm'); ?>" />
		<span class="text-danger"><?php echo form_error('user_perm');?></span>
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>