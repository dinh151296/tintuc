<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->

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
											<li><a href="blog-post.php" class="cat-1"><?php echo $row['name'] ?>
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
						<!-- tags -->
						<!-- /tags -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->