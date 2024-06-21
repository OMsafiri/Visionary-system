<nav class="navbar navbar-main navbar-expand-lg navbar-dark bg-primary py-3 fixed-top shadow border-bottom">
	<div class="container">
		<a class="navbar-brand" href="#">Visionary System</a>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link" href="#">Dashboard</a></li>
			</ul>
			<span class="text-white">
				<?php
				echo "Welcome , logged as ".$username . " <a class='ml-3 text-white' href='../logout.php?value=logout'>Signout</a> ";
				?>
			</span>
			<span class="ml-2 text-white"><i class="far fa-user-circle medium"></i></span>
		</div>
	</div>
</nav>