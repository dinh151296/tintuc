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