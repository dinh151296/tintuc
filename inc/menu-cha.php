<header id="header">
	<!-- Nav -->
	<div id="nav">
		<!-- Main Nav -->
		<div id="nav-fixed">
			<div class="container">
				<!-- logo -->
				<div class="nav-logo">
					<a href="index.php" class="logo"><img src="./img/logo.png" alt=""></a>
				</div>
				<!-- /logo -->

				<!-- nav -->
				<ul class="nav-menu nav navbar-nav">
					<li><a href="index.php">Trang Chủ</a></li>
					<?php
					require_once "database/connect.php";
					$sql = "SELECT * FROM danhmuc";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) :
						while ($item = $result->fetch_assoc()) :
							$id = $item['id'];
							?>
							<li class="cat-1"><a href="category.php"><?php echo $item['name'] ?></a></li>
							<?php
						endwhile;
					endif;
					?>
				</ul>
				<!-- /nav -->

				<!-- search & aside toggle -->
				<div class="nav-btns">
					<button class="aside-btn"><i class="fa fa-bars"></i></button>
					<button class="search-btn"><i class="fa fa-search"></i></button>
					<div class="search-form">
						<form action="./search.php" method="GET">
							<input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
							<button class="search-close"><i class="fa fa-times"></i></button>
						</form>

					</div>
				</div>
				<!-- /search & aside toggle -->
			</div>
		</div>