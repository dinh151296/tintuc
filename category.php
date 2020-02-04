<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>WebMag HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css"/>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>

		<!-- Header -->
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
							<li><a href="category.php">Trang Chủ</a></li>
							<?php
							require_once "database/connect.php";
							$sql = "SELECT * FROM danhmuc";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) :
								while ($item = $result->fetch_assoc()) :
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
								<input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
								<button class="search-close"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- /search & aside toggle -->
					</div>
				</div>
				<!-- /Main Nav -->

				<!-- Aside Nav -->
				<div id="nav-aside">
					<!-- nav -->
					<div class="section-row">
						<ul class="nav-aside-menu">
							<li><a href="index.php">Trang Chủ</a></li>
							<?php
							require_once "database/connect.php";
							$sql = "SELECT * FROM danhmuc";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) :
								while ($item = $result->fetch_assoc()) :
									?>
									<li class="cat-1"><a href="category.php"><?php echo $item['name'] ?></a></li>
									<?php
								endwhile;
							endif;
							?>
						</ul>
					</div>
					<!-- /nav -->

					<!-- widget posts -->
					<div class="section-row">
						<h3>Bài Viết Mới</h3>
						<?php
						require_once "database/connect.php";
						$qr = "SELECT id, thumbnail, tieude FROM tintuc ORDER BY id DESC LIMIT 0,3";
						$kq = $conn->query($qr);
						if ($kq->num_rows > 0) {
							while ($row = $kq->fetch_assoc()) {
								$id = $row['id'];
								?>
								<div class="post post-widget">
									<a class="post-img" href="blog-post.php?id=<?php echo $id ?>"><img src="<?php echo $row['thumbnail'] ?>" alt=""></a>
									<div class="post-body">
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id ?>"><?php echo $row['tieude'] ?></a></h3>
									</div>
								</div>
								<?php
							}
						}
						?>
					</div>
					<!-- /widget posts -->

					<!-- social links -->
					<div class="section-row">
						<h3>Follow us</h3>
						<ul class="nav-aside-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
					<!-- /social links -->

					<!-- aside nav close -->
					<button class="nav-aside-close"><i class="fa fa-times"></i></button>
					<!-- /aside nav close -->
				</div>
				<!-- Aside Nav -->
			</div>
			<!-- /Nav -->
		</header>
		<!-- Aside Nav -->
	</div>
	<!-- /Nav -->
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		require_once "./database/connect.php";
		$sql = "SELECT  *,name FROM tintuc INNER JOIN danhmuc On tintuc.danhmuc_id=danhmuc.id WHERE tintuc.id=$id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$name = $row['name'];
			?>
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<ul class="page-header-breadcrumb">
								<li><a href="index.php">Trang Chủ</a></li>
								<li><?php echo $row['name'] ?></li>
							</ul>
							<h1><?php echo $row['name'] ?></h1>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<!-- post -->

							<!-- lấy tin mới nhất trong danh mục-->
							<?php
							$sql_1 = "SELECT tintuc.id, thumbnail, tieude, thoigian FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE danhmuc.name='$name' ORDER BY tintuc.id DESC LIMIT 0,1";
							$kq_1 = $conn->query($sql_1);
							$row_1 = $kq_1->fetch_assoc();
							?>
							<div class="col-md-12">
								<div class="post post-thumb">
									<a class="post-img" href="blog-post.php?id=<?php echo $id ?>"><img src="<?php echo $row_1['thumbnail'] ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#"><?php echo $row['name'] ?></a>
											<span class="post-date"><?php echo $row_1['thoigian'] ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id ?>"><?php echo $row_1['tieude'] ?></a></h3>
									</div>
								</div>
							</div>
							<?php
							?>

							<!-- /post -->

							<!-- post -->

							<!-- lấy ra 2 tin mới tiếp theo(2,3) trong  trong danh mục -->
							<?php
							$sql2tin = "SELECT tintuc.id, thumbnail, tieude, thoigian FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE danhmuc.name='$name' ORDER BY tintuc.id DESC LIMIT 1,2";
							$result2 = $conn->query($sql2tin);
							if ($result2->num_rows > 0) {
								while ($row2 = $result2->fetch_assoc()) {
									$id_2tin = $row2['id'];
									?>
									<div class="col-md-6">
										<div class="post">
											<a class="post-img" href="blog-post.php?id=<?php echo $id_2tin ?>"><img src="<?php echo $row2['thumbnail'] ?>" alt=""></a>
											<div class="post-body">
												<div class="post-meta">
													<a class="post-category cat-2" href="#"><?php echo $row['name'] ?></a>
													<span class="post-date"><?php echo $row2['thoigian'] ?></span>
												</div>
												<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id_2tin ?>"><?php echo $row2['tieude'] ?></a></h3>
											</div>
										</div>
									</div>
									<?php
								}
							}
							?>
							<!-- /post -->

							<!-- post -->

							<!-- /post -->

							<div class="clearfix visible-md visible-lg"></div>

							<!-- ad -->
							<div class="col-md-12">
								<div class="section-row">
									<a href="#">
										<img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
									</a>
								</div>
							</div>
							<!-- ad -->
							<!-- lấy tiếp các tin còn lại của danh mục sắp xếp theo id -->
							<?php
							$sotin1trang = 2;
							if (isset($_GET['trang'])) {
								$trang = $_GET['trang'];
								settype($trang, "int");
							}else {
								$trang = 1;
							}
							$from = ($trang - 1) * $sotin1trang;

							$sql2tin = "SELECT tintuc.id, thumbnail, tieude, thoigian, mota FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE danhmuc.name='$name' ORDER BY tintuc.id DESC LIMIT $from, $sotin1trang";
							$result2 = $conn->query($sql2tin);
							if ($result2->num_rows > 0) {
								while ($row2 = $result2->fetch_assoc()) {
									?>
									<div class="col-md-12">
										<div class="post post-row">
											<a class="post-img" href="blog-post.php?id=<?php echo $row2['id'] ?>"><img src="<?php echo $row2['thumbnail'] ?>" alt=""></a>
											<div class="post-body">
												<div class="post-meta">
													<a class="post-category cat-2" href="#"><?php echo $row['name'] ?></a>
													<span class="post-date"><?php echo $row2['thoigian'] ?></span>
												</div>
												<h3 class="post-title"><a href="blog-post.php?id=<?php echo $row2['id'] ?>"><?php echo $row2['tieude'] ?></a></h3>
												<p><?php echo $row2['mota'] ?></p>
											</div>
										</div>
									</div>
									<?php
								}
							}
							?>
							<?php
							$sql = "SELECT tintuc.id, thumbnail, tieude, thoigian, mota FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE danhmuc.name='$name'";
							$result = $conn->query($sql);
							$tongsotin = $result->num_rows;
							$tongsotrang = ceil($tongsotin/$sotin1trang);
							for ($i=1; $i <= $tongsotrang; $i++) { 
								?>
								<a href="http://news.local/category.php?id=9&trang=<?php echo $i ?>"><?php echo $i ?></a>
								<?php
							}
							?>


							<!-- post -->

							<!-- /post -->


						</div>
					</div>
					<?php
				}
			}
			?>

			<!-- Page Header -->
			<!-- /Page Header -->


			<div class="col-md-4">
				<!-- ad -->
				<div class="aside-widget text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="./img/ad-1.jpg" alt="">
					</a>
				</div>
				<!-- /ad -->

				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Xem Nhiều</h2>
					</div>

					<?php
					require_once "./database/connect.php";
					$sql = "SELECT * FROM tintuc ORDER BY  solanxem DESC LIMIT 0,4";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while ($item = $result->fetch_assoc()) {
							$id = $item['id'];
							?>
							<div class="post post-widget">
								<a class="post-img" href="blog-post.php?id=<?php echo $id ?>"><img src="<?php echo $item['thumbnail'] ?>" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id ?>"><?php echo $item['tieude'] ?></a></h3>
									<div class="icon-read">
										<button><i class="fa fa-bars"></i></button>
										<span><?php echo $item['solanxem'] ?></span>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>
				</div>
				<!-- /post widget -->

				<!-- catagories -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Danh Mục</h2>
					</div>
					<div class="category-widget">
						<ul>
							<?php
							require_once "./database/connect.php";
							$sql = "SELECT * FROM danhmuc";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$id = $row['id'];
									?>
									<li><a href="#" class="cat-1"><?php echo $row['name'] ?>
									<?php
									$qr = "SELECT *, name FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE tintuc.danhmuc_id=$id";
									$kq = $conn->query($qr);
									$numrow = $kq->num_rows;
									?>
									<span><?php echo $numrow ?></span>
								</a></li>
								<?php
							}
						}
						?>
					</ul>
				</div>
			</div>
			<!-- /catagories -->

		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /section -->

<!-- Footer -->
<footer id="footer">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-5">
				<div class="footer-widget">
					<div class="footer-logo">
						<a href="index.php" class="logo"><img src="./img/logo.png" alt=""></a>
					</div>
					<ul class="footer-nav">
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Advertisement</a></li>
					</ul>
					<div class="footer-copyright">
						<span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="row">
						<div class="col-md-6">
							<div class="footer-widget">
								<h3 class="footer-title">About Us</h3>
								<ul class="footer-links">
									<li><a href="about.php">About Us</a></li>
									<li><a href="#">Join Us</a></li>
									<li><a href="contact.php">Contacts</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-6">
							<div class="footer-widget">
								<h3 class="footer-title">Danh Mục</h3>
								<ul class="footer-links">
									<?php
									require_once "database/connect.php";
									$sql = "SELECT * FROM danhmuc";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) :
										while ($item = $result->fetch_assoc()) :
											?>
											<li class="cat-1"><a href="category.php"><?php echo $item['name'] ?></a></li>
											<?php
										endwhile;
									endif;
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Join our Newsletter</h3>
						<div class="footer-newsletter">
							<form>
								<input class="input" type="email" name="newsletter" placeholder="Enter your email">
								<button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
							</form>
						</div>
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /Footer -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
