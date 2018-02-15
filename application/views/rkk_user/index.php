<table class="table table-bordered table-striped">
    <tr>
		<th>Név</th>
		<th>Jogosultság</th>
		<th>Műveletek</th>
    </tr>
	<?php foreach($rkk_users as $r){ ?>
    <tr>
		<td><?php echo $r['user_name']; ?></td>
		<td><?php echo $r['user_perm']; ?></td>
		<td>
            <a href="<?php echo site_url('rkk_user/edit/'.$r['user_id']); ?>">Szerkesztés</a> | 
            <a href="<?php echo site_url('rkk_user/remove/'.$r['user_id']); ?>">Törlés</a>
        </td>
    </tr>
	<?php } ?>
</table>
<a href="<?php echo site_url('rkk_user/add'); ?>" class="btn btn-primary">Új felhasználó</a>