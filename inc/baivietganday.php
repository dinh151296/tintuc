<div class="row">
	<div class="col-md-12">
		<div class="section-title">
			<h2>Bài Viết Mới</h2>
		</div>
	</div>

	<!-- post -->

	<?php
	require_once  "./database/connect.php";
	$sql = "SELECT id, thumbnail, tieude, thoigian FROM tintuc ORDER BY id DESC LIMIT 2,6";
	$result = $conn->query($sql);
	// var_dump($result);die();
	if ($result->num_rows > 0) :
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
	endif;
	?>

	<!-- /post -->


</div>