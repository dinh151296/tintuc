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
	$id = $_GET['id'];
	require_once "./database/connect.php";
	$qr = "UPDATE tintuc SET solanxem=solanxem + 1 WHERE id = $id";
	$conn->query($qr);
	$sql = "SELECT *, name FROM tintuc INNER JOIN danhmuc On tintuc.danhmuc_id=danhmuc.id WHERE tintuc.id=$id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			?>
			<div id="post-header" class="page-header">
				<div class="background-img" style="background-image: url('<?php echo  $row['thumbnail']; ?>');"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">
								<a class="post-category cat-2" href="category.php?id=<?php echo $id?>"><?php echo  $row['name']; ?></a>
								<span class="post-date"><?php echo  $row['thoigian']; ?></span>
							</div>
							<h1><?php echo $row['tieude'] ?></h1>
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
					<!-- Post content -->
					<div class="col-md-8">
						<div class="section-row sticky-container">
							<div class="main-post" id="editor">
								<h3><?php echo $row['mota'] ?></h3>
								<p><?php echo $row['noidung'] ?></p>
								<figure class="figure-img">
									<img class="img-responsive" src="<?php echo $row['thumbnail'] ?>" alt="">
									<figcaption><?php echo $row['mota_anh'] ?></figcaption>
								</figure>
							</div>
							<div class="post-shares sticky-shares">
								<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
								<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-envelope"></i></a>
							</div>
						</div>

						<!-- ad -->
						<div class="section-row text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-2.jpg" alt="">
							</a>
						</div>
						<!-- ad -->

						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/author.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h3><?php echo $row['nguoiviet'] ?></h3>
										</div>
										<p><?php echo $row['thongtin_nguoiviet'] ?></p>
										<ul class="author-social">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->

						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								<h2>3 Comments</h2>
							</div>

							<div class="post-comments">
								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>John Doe</h4>
											<span class="time">March 27, 2018 at 8:00 am</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

										<!-- comment -->
										<div class="media">
											<div class="media-left">
												<img class="media-object" src="./img/avatar.png" alt="">
											</div>
											<div class="media-body">
												<div class="media-heading">
													<h4>John Doe</h4>
													<span class="time">March 27, 2018 at 8:00 am</span>
													<a href="#" class="reply">Reply</a>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
											</div>
										</div>
										<!-- /comment -->
									</div>
								</div>
								<!-- /comment -->

								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>John Doe</h4>
											<span class="time">March 27, 2018 at 8:00 am</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
								</div>
								<!-- /comment -->
							</div>
						</div>
						<!-- /comments -->

						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a reply</h2>
								<p>your email address will not be published. required fields are marked *</p>
							</div>
							<form class="post-reply">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<span>Name *</span>
											<input class="input" type="text" name="name">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span>Email *</span>
											<input class="input" type="email" name="email">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span>Website</span>
											<input class="input" type="text" name="website">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="message" placeholder="Message"></textarea>
										</div>
										<button class="primary-button">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /reply -->
					</div>
					<!-- /Post content -->

					<!-- aside -->
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
							$sql = "SELECT thumbnail, tieude, solanxem FROM tintuc ORDER BY  solanxem DESC LIMIT 0,4";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while ($item = $result->fetch_assoc()) {
									?>
									<div class="post post-widget">
										<a class="post-img" href="blog-post.php"><img src="<?php echo $item['thumbnail'] ?>" alt=""></a>
										<div class="post-body">
											<h3 class="post-title"><a href="blog-post.php"><?php echo $item['tieude'] ?></a></h3>
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

						<!-- post widget -->

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
											<li><a href="#" class="cat-1"><?php echo $row['name'] ?><?php
											$qr = "SELECT *, name FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE tintuc.danhmuc_id=$id";
											$kq = $conn->query($qr);
											$numrow = $kq->num_rows;
											?>
											<span><?php echo $numrow ?></span></a></li>
											<?php
										}
									}
									?>
								</ul>
							</div>
						</div>
						<!-- /catagories -->

						<!-- tags -->
						<!-- /tags -->

						<!-- archive -->
						<!-- /archive -->
					</div>
					<!-- /aside -->
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
										<h3 class="footer-title">Catagories</h3>
										<ul class="footer-links">
											<li><a href="category.php">Web Design</a></li>
											<li><a href="category.php">JavaScript</a></li>
											<li><a href="category.php">Css</a></li>
											<li><a href="category.php">Jquery</a></li>
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
		<?php
	}
}
?>
<!-- Page Header -->

<!-- /Page Header -->

