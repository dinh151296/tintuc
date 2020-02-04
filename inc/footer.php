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