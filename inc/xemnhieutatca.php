<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Xem Nhiều</h2>
						</div>
					</div>
					<!-- post -->
					<?php
					require_once "./database/connect.php";
					$sql = "SELECT tintuc.id, thumbnail, thoigian, tieude, mota, name FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id ORDER BY solanxem DESC LIMIT 0,6";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$id = $row['id'];
							?>
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?id=<?php echo $id ?>"><img src="<?php echo $row['thumbnail'] ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.php?id=<?php echo $id ?>"><?php echo $row['name'] ?></a>
											<span class="post-date"><?php echo $row['thoigian'] ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id ?>"><?php echo $row['tieude'] ?></a></h3>
										<p><?php echo $row['mota'] ?></p>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>

					<!-- /post -->


					<!-- <div class="col-md-12">
						<div class="section-row">
							<button class="primary-button center-block">Load More</button>
						</div>
					</div> -->
				</div>
			</div>