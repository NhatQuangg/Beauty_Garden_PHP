

<?php ob_start(); ?>

<?php
session_start();

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
            <h6>TEEN KH</h6>
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

<table class="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col" style="width: 450px;">Tên sản phẩm</th>
            <th scope="col">Giá mua</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ctghs as $ctgh) : ?>
            <tr>
                <td style="line-height: 89px; text-align:center">
                    <!-- Checkbox -->
                    <input form="checkbox" type="checkbox" name="xcb" value="">
                </td>
                <td><img src="../src/assets/img/<?= $ctgh['anh'] ?>" style="width: 80px;" /></td>
                <td>
                    <p><?= $ctgh['tensanpham'] ?></p>
                    <!-- Xóa 1 sản phẩm -->
                    <a href="/cart/deleteone/<?= $ctgh['masanpham'] ?>/<?= $magiohang['magiohang']; ?>/<?= $makhachhang; ?>/<?= $ctgh['machitietgiohang'] ?>" class="mt-3 ms-3"><i class="bi bi-trash"></i></a>
                </td>
                <td><?= $ctgh['gia'] ?>₫</td>
                <td>
                    <form class="input-group mb-3" action="/cart/update/<?= $ctgh['machitietgiohang'] ?>/<?= $makhachhang; ?>" method="post">
                        <div class="input-group">
                            <input style="width:40px;" min="1" name="txtsl" type="number" class="form-control" value="<?= $ctgh['soluongmua'] ?>">
                            <button class="btn btn-primary" type="submit" name="but1"><i class="bi bi-save"></i></button>
                        </div>
                    </form>
                </td>
                <td><?= $ctgh['tongtien'] ?>₫</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tr class="table-primary">
        <td colspan="7" style="	color:#012970; font-weight: bold; text-align: right;">
            Tổng tiền: <?= $tongtien['total']; ?>
        </td>
    </tr>
</table>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>

<?php if (!empty($machitietgiohangs['machitietgiohang'])) { ?>
    <form method="post" action="/cart/addbill/<?php echo $makhachhang ?>" class="mt-2" style="display: inline-block;">
        <input type="submit" class="btn btn-primary" name="b1" value="Mua hàng">
        <input type="hidden" class="btn btn-primary" name="mgh" value=<?php echo $magiohang['magiohang']; ?>>
    </form>
    <form method="post" action="/cart/deleteall/<?php echo $makhachhang ?>" class="mt-2" style="display: inline-block;">
        <input type="submit" class="btn btn-primary" name="b1" value="Xóa toàn bộ">
        <input type="hidden" class="btn btn-primary" name="mgh" value=<?php echo $magiohang['magiohang']; ?>>
    </form>
<?php } else { ?>
    <form method="post" action="/cart/add" class="mt-2" style="display: inline-block;">
        <input type="submit" class="btn btn-primary" name="b1" value="Mua hàng" disabled>
    </form>
    <form method="post" action="/cart/deleteall/" class="mt-2" style="display: inline-block;">
        <input type="submit" class="btn btn-primary" name="b1" value="Xóa toàn bộ" disabled>
    </form>
    <!-- <form id="checkbox" method="post" action="xoacheckgiohangcontroller" class="mt-2" style="display: inline-block;">
        <input type="submit" class="btn btn-primary" name="b1" value="Xóa checkbox" disabled>
    </form> -->
<?php  } ?>





<?php $contenttt = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/cart_templates.php'); ?>