
<form action="/admin">
  <div class="row">
    <div class="col-md-2 form-group">
      <select name="jarat_nev" class="form-control">
        <option value="">-- Járat név --</option>
        <?php 
        foreach ($jaratnev_select as $value) {
          echo '<option value="'.$value.'">'.$value.'</option>';
        }
        ?>
      </select>
    </div>
    <div class="col-md-2 form-group">
      <select name="jarat_kerulet" class="form-control">
        <option value="">-- Kerület --</option>
        <?php 
        foreach ($jaratker_select as $value) {
          echo '<option value="'.$value.'">'.$value.'</option>';
        }
        ?>
      </select>
    </div>
    <div class="col-md-2 form-check">
      <select name="beszallito" class="form-control">
        <option value="">-- Beszállító --</option>
        <?php 
        foreach ($beszallitok_select as $value) {
          echo '<option value="'.$value['id'].'">'.$value['nev'].'</option>';
        }
        ?>
      </select>
    </div>
    <div class="col-md-3 form-group">
      <select name="kioszto" class="form-control">
        <option value="">-- Kézbesítő --</option>
        <?php 
        foreach ($kezbesitok_select as $value) {
          echo '<option value="'.$value['id'].'">'.$value['nev'].'</option>';
        }
        ?>
      </select>
    </div>
    <div class="col-md-3 form-group">
      <select name="kiadvany" class="form-control">
        <option value="">-- Kiadvány --</option>
        <?php 
        foreach ($kiadvanynev_select as $value) {
          echo '<option value="'.$value['nev'].'">'.$value['nev'].'</option>';
        }
        ?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2 form-check">
      <label>Teljesítés kezdete</label>
      <input type="date" class="form-control" name="from">
    </div>
    <div class="col-md-2 form-check">
      <label>Teljesítés vége</label>
      <input type="date" class="form-control" name="to">
    </div>
    <button type="submit" class="btn btn-primary">Szűrés</button>
   </div>
</form>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered table-striped">
        <tr>
          <td>Kiadvány</td>
          <td>Beszállító</td>
          <td>Gyűjtő</td>
          <td>Kézbesítő</td>
		  <td>Járat</td>
		  <td>Kerület</td>
		  <td>Db</td>
        </tr>
      <?php
        $array = json_decode(json_encode($ujsagJarat), true);
        foreach ($array as $key => $value) { ?>
        <tr>
          <td><?php echo $value['kiadvany']; ?></td>
          <td><?php echo $value['beszalito']; ?></td>
          <td><?php echo $value['gyujto']; ?></td>
          <td><?php echo $value['user_name']; ?></td>
		  <td><?php echo ($value['jarat_nev_egy']?$value['jarat_nev_egy']:$value['jarat_nev_ketto']);?></td>
		  <td><?php echo $value['kerulet']; ?></td>
          <td><?php echo $value['u_db']; ?></td>
        </tr>
			<?php } ?>
		</table>
	</div>
</div>