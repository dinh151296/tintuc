<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<?php
			require_once "database/connect.php";
			$sql = "SELECT * FROM tintuc ORDER BY id DESC LIMIT 0,2";
			$result = $conn->query($sql);
			if ($result->num_rows > 0 ) :
				while ($item = $result->fetch_assoc()) :
					$id = $item['id'];
					// var_dump($item); die();

					?>
					<div class="col-md-6">
						<div class="post post-thumb post-tc">
							<a class="post-img tc" href="blog-post.php?id=<?php echo $id?>"><img src="<?php echo $item['thumbnail'] ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">

									<?php
									$qr = "SELECT name, danhmuc.id FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE tintuc.id=$id";
									$kq = $conn->query($qr);
									$row = $kq->fetch_assoc();
									$id_danhmuc = $row['id'];
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
			endif;
			?>
			<!-- post -->

			<!-- /post -->

			<!-- post -->

			<!-- /post -->
		</div>