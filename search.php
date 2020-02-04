<?php include 'inc/head.php' ?>

<!-- Header -->
<?php include 'inc/menu-cha.php' ?>
<!-- /Main Nav -->

<!-- Aside Nav -->
<?php include 'inc/menu-con.php' ?>
<!-- /Header -->

<!-- section -->
<!-- /row -->

<!-- row -->
<div class="container">
	<div class="row">

		<!-- post -->

		<?php
		if (isset($_GET['search'])) {
			$search = $_GET['search'];
			require_once "./database/connect.php";
			$sql = "SELECT * FROM tintuc WHERE tieude REGEXP '$search' ORDER BY id DESC";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while ($item = $result->fetch_assoc()) :
					$id = $item['id'];
					?>
					<div class="col-md-4">
						<div class="post post-tc">
							<a class="post-img ts" href="blog-post.php?id=<?php echo $id?>"><img src="<?php echo $item['thumbnail'] ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<?php
									$qr = "SELECT name FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE tintuc.id=$id";
									$kq = $conn->query($qr);
									$row = $kq->fetch_assoc();
									?>
									<a class="post-category cat-1" href="category.php?id=<?php echo $id?>"><?php echo $row['name'] ?></a>
									<?php
									?>
									<span class="post-date"><?php echo $item['thoigian'] ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id?>"><?php echo $item['tieude'] ?></a></h3>
							</div>
						</div>
					</div>
					<?php
				endwhile;
			}
			else {
				echo "<h3>Không tìm thấy kết quả</h3>";
			}
		}
		?>

		<!-- /post -->


	</div>
</div>

<!-- /row -->

<!-- row -->

<!-- /post widget -->

<!-- post widget -->

<!-- /post widget -->

<!-- ad -->

<!-- /section -->

<!-- section -->

<!-- /section -->

<!-- section -->


<!-- Footer -->
<?php include 'inc/footer.php' ?>
