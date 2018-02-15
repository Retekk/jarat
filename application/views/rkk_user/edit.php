<?php echo form_open('rkk_user/edit/'.$rkk_user['user_id']); ?>

	<div>
		Név: 
		<input type="text" name="user_name" value="<?php echo ($this->input->post('user_name') ? $this->input->post('user_name') : $rkk_user['user_name']); ?>" />
	</div>
	<div>
		Jogosultság: 
		<input type="text" name="user_perm" value="<?php echo ($this->input->post('user_perm') ? $this->input->post('user_perm') : $rkk_user['user_perm']); ?>" />
		<span class="text-danger"><?php echo form_error('user_perm');?></span>
	</div>
	
	<button type="submit">Mentés</button>
	
<?php echo form_close(); ?>