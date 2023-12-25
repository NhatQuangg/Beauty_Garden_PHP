<?php ob_start(); ?>

<?php
session_start();

// if (isset($_SESSION['flash_message'])) {
//     $message = $_SESSION['flash_message'];
//     unset($_SESSION['flash_message']);
//     echo $message . '<br>';
// }
function isUserLoggedIn()
{
    return isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser']);
}


if (isUserLoggedIn()) {
    $currentUser = $_SESSION['currentUser'];
    $makhachhang = $currentUser['makhachhang'];
?>
    <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="/ctgh/<?php echo $makhachhang ?>">
            <i class="bi bi-cart"></i>
            <span class="badge bg-primary badge-number"> </span>
        </a>
    </li>

    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="img/bsfbfs.jpg" alt="" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">Tài khoản</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
            <h6><%=kh.getHotenkh() %></h6>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        <!-- Profile -->
        <li>
            <a class="dropdown-item d-flex align-items-center" href="profilecontroller">
                <i class="bi bi-person"></i>
                <span>Hồ sơ của tôi</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        <!-- Profile -->
        <li>
            <a class="dropdown-item d-flex align-items-center" href="lichsumuahangcontroller">
                <i class="bi bi-clock-history"></i>
                <span>Đơn mua</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        <!-- Đăng xuất -->
        <li>
            <a class="dropdown-item d-flex align-items-center" href="/user/logout">
                <i class="bi bi-box-arrow-right"></i> <span>Đăng xuất</span>
            </a>
        </li>
    </ul>
<?php
} else { ?>
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <span class="d-none d-md-block dropdown-toggle" style="margin-right: 10px;">Tài khoản</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <!-- Profile -->
        <li>
            <a class="dropdown-item d-flex align-items-center" href="/user/signin">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Đăng nhập</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        <!-- Đăng xuât -->
        <li>
            <a class="dropdown-item d-flex align-items-center" href="/user/register">
                <i class="bi bi-card-list"></i> <span>Đăng kí</span>
            </a>
        </li>
    </ul>
<?php } ?>

<?php $contentt = ob_get_clean(); ?>


<?php ob_start(); ?>
<!-- Bắt đầu bộ nhớ đệm đầu ra để chứa HTML và PHP -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <!-- Mục chính trong thanh sidebar -->
            <a class="nav-link collapsed">
                <i class="bi bi-circle"></i>
                <span>Toàn bộ</span>
            </a>
        </li>
        <?php foreach ($loais as $loai) : ?>
            <!-- Vòng lặp hiển thị danh sách loại -->
            <a class="nav-link collapsed">
                <i class="bi bi-circle"></i>
                <span><?= $loai['tenloai'] ?></span>

                </li>
            <?php endforeach; ?>
    </ul>

</aside>

<h5 class="card-title">Chọn loại để hiện sản phẩm muốn tìm</h5>
<!-- Kết thúc thanh sidebar -->


<?php $contentttt = ob_get_clean(); ?>

<?php ob_start(); ?>
<h5 class="card-title">Kết quả tìm kiếm sản phẩm</h5>
<!-- Hiển thị kết quả tìm kiếm -->
<div class="row">
    <?php foreach ($sanphams as $sanpham) : ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card">
                <img src="../src/assets/img/<?= $sanpham['anh'] ?>" class="card-img-top" style="height: 380px" alt="Hình ảnh sản phẩm">
                <div class="card-body">
                    <a clas="detail-product" href="">
                        <p class="mt-1" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; color: #666; height: 48px;">
                            <?= $sanpham['tensanpham'] ?>
                        </p>
                    </a>
                    <span class="d-block" style="font-style: italic; margin: 12px 0px;"> <?= $sanpham['soluong'] ?> sản phẩm có sẵn</span>
                    <span style="color: #199427; font-weight: 600; font-size: 18px;"><?= $sanpham['gia'] ?>₫</span>
                    <a href="/sanpham/sanphamList/<?= $sanpham['masanpham'] ?>">
                        <button class="btn btn-primary float-end" style="font-size: 14px;">Đặt mua</button>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- <a href="/index.php?action=create">Add User</a> -->
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/home_templates.php'); ?>
<!--
</body>
</html>
-->