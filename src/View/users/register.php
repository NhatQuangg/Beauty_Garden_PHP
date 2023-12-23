<?php ob_start(); ?>
<div class="d-flex justify-content-center py-4">
    <a href="/index" class="logo d-flex align-items-center w-auto">
        <img src="../src/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">BeautyGarden</span>
    </a>
</div>

<?php $contentt = ob_get_clean();
?>


<?php ob_start(); ?>

<form class="row g-3 needs-validation" method="post" action="/user/<?= isset($user['id']) ? "update/$user[id]" : 'register' ?>">
    <div class="col-12">
        <label for="yourName" class="form-label">Họ tên</label>
        <input type="text" name="txtname" class="form-control" id="" required>
    </div>
    <div class="col-12">
        <label for="yourUn" class="form-label">Tên đăng nhập</label>
        <input type="text" name="txtun" class="form-control" id="" required>
    </div>
    <div class="col-12">
        <label for="yourPass" class="form-label">Mật khẩu</label>
        <input type="password" name="txtpass" class="form-control" id="" required>
    </div>
    <div class="col-12">
        <label for="yourPhone" class="form-label">Số điện thoại</label>
        <input type="number" name="txtphone" class="form-control" id="" required>
    </div>
    <div class="col-12">
        <label for="yourEmail" class="form-label">Email</label>
        <input type="email" name="txtemail" class="form-control" id="" required>
    </div>
    <div class="col-12">
        <label for="yourAd" class="form-label">Địa chỉ</label>
        <input type="text" name="txtad" class="form-control" id="" required>
    </div>
    <?php
    session_start();

    if (isset($_SESSION['message_register_failed'])) {
        unset($_SESSION['message_register_failed']);
    ?>
        <div class="col-12">
            <p class="small mb-0 text-center text-danger" style="font-style: italic;">Tên đăng nhập đã tồn tại</p>
        </div>
    <?php
    }

    ?>

    <div class="col-12">
        <input class="btn btn-primary w-100" type="submit" value="<?= isset($user['id']) ? 'Update' : 'Tạo tài khoản' ?>">

    </div>
    <div class="col-12">
        <p class="small mb-0">
            Bạn đã có tài khoản? <a href="/user/signin" style="font-style: italic;">Đăng nhập</a>
        </p>
    </div>

</form>

<?php $content = ob_get_clean();
?>
<?php include(__DIR__ .  '/../../../templates/register_templates.php'); ?>