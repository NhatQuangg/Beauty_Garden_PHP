<?php ob_start(); ?>

<form class="row g-3 needs-validation" method="post" action="/auth/validate">
    <div class="col-12">
        <label for="yourUsername" class="form-label">Tên đăng nhập</label>
        <div class="input-group has-validation">
            <input type="text" name="username" class="form-control" id="username" required>
        </div>
    </div>
    <div class="col-12">
        <label for="yourPassword" class="form-label">Mật khẩu</label>
        <input type="password" name="password" class="form-control" id="password" required>
    </div>

    <div class="col-12">
        <button class="btn btn-primary w-100" type="submit" value="Đăng nhập">Đăng nhập</button>
    </div>
    <!-- <div class="col-12">
        <p class="small mb-0">
            Bạn chưa có tài khoản? <a href="dangki.jsp" style="font-style: italic;">Đăng kí</a>
        </p>
    </div> -->

</form>
<?php
session_start();

if (isset($_SESSION['flash_message'])) {
    $message = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
    echo $message . '<br>';
}
?>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ .  '/../../../templates/signin_templates.php'); ?>