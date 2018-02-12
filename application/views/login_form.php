<div class="container loginform">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
	  <div class="panel panel-primary">
		<div class="panel-heading">
			<h3>Bejelentkezés</h3>
		</div>
		<div class="panel-body">
			<form action="login" method="POST">
				<fieldset>
					<div class="form-group">
					  <label>Felhasználónév</label>
					  <input type="text" class="form-control" name="username">
					</div>
					<div class="form-group">
					  <label>Jelszó</label>
					  <input type="password" class="form-control" name="password">
					</div>
				</fieldset>
				<div>
				 <button class="btn btn-primary btn-lg" type="submit" class="btn btn-default">Belépés</button>
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<a href="#">Elfelejtett jelszó</a>
		</div>
	  </div>
    </div>
  </div>
</div>