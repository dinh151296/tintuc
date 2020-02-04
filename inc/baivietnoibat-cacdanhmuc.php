<div class="row">
	<div class="col-md-8">
		<div class="row">
			<!-- post -->
			<!-- lấy tin thể thao có số lần xem cao nhất -->
			<?php
			require_once "./database/connect.php";
			$sql = "SELECT tintuc.id, thoigian, thumbnail, tieude, name FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE danhmuc.name='Thể Thao' ORDER BY solanxem DESC LIMIT 0,1";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$id = $row['id'];
			?>
			<div class="col-md-12">
				<div class="post post-thumb">
					<a class="post-img" href="blog-post.php?id=<?php echo $id ?>"><img src="<?php echo $row['thumbnail'] ?>" alt=""></a>
					<div class="post-body">
						<div class="post-meta">
							<a class="post-category cat-3" href="category.php?id=<?php echo $id ?>"><?php echo $row['name'] ?></a>
							<span class="post-date"><?php echo $row['thoigian'] ?></span>
						</div>
						<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id ?>"><?php echo $row['tieude'] ?></a></h3>
					</div>
				</div>
			</div>
			<?php
			?>
			<!-- /post -->

			<!-- post -->

			<!-- Lấy ra 2 tin thời sự có số lần xem cao nhất -->
			<?php
			require_once "./database/connect.php";
			$sql = "SELECT tintuc.id, thoigian, thumbnail, tieude, name FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE danhmuc.name='Thời Sự' ORDER BY solanxem DESC LIMIT 0,2";
			$result = $conn->query($sql);
			while ( $row = $result->fetch_assoc()) {
				$id = $row['id'];
				?>
				<div class="col-md-6">
					<div class="post">
						<a class="post-img ts" href="blog-post.php?id=<?php echo $id ?>"><img src="<?php echo $row['thumbnail'] ?>" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-1" href="category.php?id=<?php echo $id ?>"><?php echo $row['name'] ?></a>
								<span class="post-date"><?php echo $row['thoigian'] ?></span>
							</div>
							<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id ?>"><?php echo $row['tieude'] ?></a></h3>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			<!-- /post -->

			<!-- post -->

			<!-- /post -->

			<div class="clearfix visible-md visible-lg"></div>

			<!-- Lấy ra 2 tin cuộc sống có số lần xem cao nhất -->
			<?php
			require_once "./database/connect.php";
			$sql = "SELECT tintuc.id, thoigian, thumbnail, tieude, name FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE danhmuc.name='Cuộc Sống' ORDER BY solanxem DESC LIMIT 0,2";
			$result = $conn->query($sql);
			while ( $row = $result->fetch_assoc()) {
				$id = $row['id'];
				?>
				<div class="col-md-6">
					<div class="post">
						<a class="post-img ts" href="blog-post.php?id=<?php echo $id ?>"><img src="<?php echo $row['thumbnail'] ?>" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-1" href="category.php?id=<?php echo $id ?>"><?php echo $row['name'] ?></a>
								<span class="post-date"><?php echo $row['thoigian'] ?></span>
							</div>
							<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id ?>"><?php echo $row['tieude'] ?></a></h3>
						</div>
					</div>
				</div>
				<?php
			}
			?>

			<div class="clearfix visible-md visible-lg"></div>

			<!-- Lấy ra 2 tin công nghệ có số lần xem cao nhất -->
			<?php
			require_once "./database/connect.php";
			$sql = "SELECT tintuc.id, thoigian, thumbnail, tieude, name FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE danhmuc.name='Công Nghệ' ORDER BY solanxem DESC LIMIT 0,2";
			$result = $conn->query($sql);
			while ( $row = $result->fetch_assoc()) {
				$id = $row['id'];
				?>
				<div class="col-md-6">
					<div class="post">
						<a class="post-img ts" href="blog-post.php?id=<?php echo $id ?>"><img src="<?php echo $row['thumbnail'] ?>" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-1" href="category.php?id=<?php echo $id ?>"><?php echo $row['name'] ?></a>
								<span class="post-date"><?php echo $row['thoigian'] ?></span>
							</div>
							<h3 class="post-title"><a href="blog-post.php?id=<?php echo $id ?>"><?php echo $row['tieude'] ?></a></h3>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>