
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
      <select name="jarat_nev" class="form-control">
        <option value="">-- Beszállító --</option>
        <?php 
        foreach ($beszallitok_select as $value) {
          echo '<option value="'.$value['id'].'">'.$value['nev'].'</option>';
        }
        ?>
      </select>
    </div>
    <div class="col-md-3 form-group">
      <input type="text" class="form-control" placeholder="Beszállító">
    </div>
    <div class="col-md-3 form-group">
      <input type="text" class="form-control" placeholder="Kiadványnév">
    </div>
  </div>
  <div class="row">
    <div class="col-md-2 form-check">
      <label>Teljesítés kezdete</label>
      <input type="date" class="form-control">
    </div>
    <div class="col-md-2 form-check">
      <label>Teljesítés vége</label>
      <input type="date" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
   </div>
</form>
<?php 
  $array = json_decode(json_encode($jaratok), true);
  foreach ($array as $key => $value) {
  echo $value['jarat_nev_egy'];
  echo $value['jarat_nev_ketto'];
  echo $value['kerulet'];
  
  ?>
<br>
<?php
}?>