<header id="mainheader">
	<div class="container-fluid">
		<div class="row">
			<div id="logo-container" class="col-md-2">
				<div class="logo">
					<img src="" />
				</div>
			</div>
			<div id="header-menu-container" class="col-md-10">
				<ul class="menu">
					<li><a href="/admin/logout">Kijelentkezés</a></li>
				</ul>
			</div>
		</div>
	</div>
</header>
<div id="maincontent">
	<div class="container-fluid">
		<div class="row">
			<div id="main-menu-container" class="col-md-2">
				<ul class="menu">
					<li><a href="/admin"><?php echo ($user_perm == '1')?"Főoldal":"Járataim"?></a></li>
					<?php if($user_perm == '1'){?>
					<li><a href="/rkk_user">Felhasználók kezelése</a></li>
					<li><a href="/xls">Excel feltöltés</a></li>
					<li><a href="/jaratok">Járatok</a></li>
					<li><a href="/beszall">Beszállítók</a></li>
					<li><a href="/kiszall">Kiszállítók</a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-md-10 content"> 
			<!--ide jön a content-->