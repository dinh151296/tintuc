<div class="col-md-4">
	<!-- post widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2>Xem  Nhiều</h2>
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
							<p>View:<span><?php echo $item['solanxem'] ?></span></p>
						</div>
					</div>
				</div>
				<?php
			}
		}
		?>


	</div>
	<div class="aside-widget text-center">
		<a href="#" style="display: inline-block;margin: auto;">
			<img class="img-responsive" src="./img/ad-1.jpg" alt="">
		</a>
	</div>
	<!-- /ad -->
</div>
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>