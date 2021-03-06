<div class="container-fluid">
	<div class="panel">
	<div class="row panel-heading">
		<div class="col-md-12">
			<h3>Felhasználók</h3>
		</div>
	</div>
	<div class="row panel-body">
		<div class="col-md-12">
			<table class="table table-bordered table-striped">
				<tr>
					<th>Név</th>
					<th>Jogosultság</th>
					<th>Műveletek</th>
				</tr>
				<?php foreach($rkk_users as $r){ ?>
				<tr>
					<td><?php echo $r['user_name']; ?></td>
					<td><?php echo $r['perm_name']; ?></td>
					<td>
						<a href="<?php echo site_url('rkk_user/edit/'.$r['user_id']); ?>">Szerkesztés</a>
						<?php if ($r['user_id'] != $user_id) {?> | <a href="<?php echo site_url('rkk_user/remove/'.$r['user_id']); ?>">Törlés</a><?php } ?>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<div class="panel-footer">
		<a href="<?php echo site_url('rkk_user/add'); ?>" class="btn btn-primary">Új felhasználó</a>
	</div>
	</div>
</div>