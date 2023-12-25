<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Beauty Garden</title>

	<!-- Favicons -->
	<!-- <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

	<link href="../src/css/style.css" rel="stylesheet">

</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">

		<div class="d-flex align-items-center justify-content-between">
			<a href="../index.php" class="logo d-flex align-items-center">
				<img src="img/logo.png" alt="">
				<span class="d-none d-lg-block">BeautyGarden</span>
			</a>
			<i class="bi bi-list toggle-sidebar-btn"></i>
		</div>
		<!-- End Logo -->

		<!-- Tìm kiếm -->
		<div class="search-bar">
			<form class="search-form d-flex align-items-center" method="post" action="/sanphams/timkiemList">
				<input type="text" placeholder="Tìm kiếm" name="search">
				<button type="submit" title="Tìm kiếm" name="but1">
					<i class="bi bi-search"></i>
				</button>
			</form>
		</div>
		<!-- End Search Bar -->

		<nav class="header-nav ms-auto">
			<ul class="d-flex align-items-center">
				<!-- Icon search -->
				<li class="nav-item d-block d-lg-none">
					<a class="nav-link nav-icon search-bar-toggle" href="#">
						<i class="bi bi-search"></i>
					</a>
				</li>
				<!-- End Search Icon-->

				<li class="nav-item dropdown pe-3">
					<?= $contentt ?>
				</li>
				<!-- End Profile Nav -->
			</ul>
		</nav>
		<!-- End Icons Navigation -->
	</header>
	<!-- End Header -->

	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">
		<ul class="sidebar-nav" id="sidebar-nav">
			<li class="nav-item">
				<a class="nav-link collapsed" href="">
					<i class="bi bi-circle"></i>
					<span>Toàn bộ</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link collapsed" href="">
					<i class="bi bi-circle"></i>
					<span>Tên loại</span>
				</a>
			</li>

		</ul>
	</aside>
	<!-- End Sidebar-->

	<!-- =============== Main ============== -->
	<main id="main" class="main" style="min-height: 625px;">
		<section class="section">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Giỏ hàng</h5>
							<!-- Table with stripped rows -->
							<?= $content ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?= $contenttt ?>

	</main>

	<!-- ===================== Footer ====================== -->
	<footer id="footer" class="footer">
		<div class="copyright">&copy; Copyright
			<strong><span>QuangNguyen</span></strong>. All Rights Reserved
		</div>
	</footer>
	<!-- End Footer -->

	<!-- Nút lên đầu trang -->
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
		<i class="bi bi-arrow-up-short"></i>
	</a>
	<script>
		$(document).ready(function() {
			$('.toast').toast('show');
		});
	</script>
	<!-- ======== Script ========  -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script src="../src/js/main.js"></script>

</body>

</html>