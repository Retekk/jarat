<form action="upload" enctype="multipart/form-data" accept-charset="utf-8" method="POST">
  <div class="form-group">
      <select name="beszall">
        <?php 
        foreach ($beszallitok as $value) {
          echo '<option value="'.$value.'">'.$value.'</option>';
        }
        ?>
      </select>
  </div>  
  <div class="form-group">
      <input type="file" class="form-control" name="xls">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-default">Feltöltés</button>
    </div>
</form>
