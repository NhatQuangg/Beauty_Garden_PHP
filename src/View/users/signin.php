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
    <div class="col-12">
        <p class="small mb-0">
            Bạn chưa có tài khoản? <a href="/user/register" style="font-style: italic;">Đăng kí</a>
        </p>
    </div>
    <?php
    session_start();

    if (isset($_SESSION['flash_message'])) {
        unset($_SESSION['flash_message']);
    ?>
        <div class="col-12">
            <p class="small mb-0 text-center text-danger" style="font-style: italic;">
                Đăng nhập sai. Vui lòng thử lại
            </p>
        </div>
    <?php
    }
    ?>

</form>


<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ .  '/../../../templates/signin_templates.php'); ?>

<?php
session_start();

if (isset($_SESSION['message_register_success'])) {
?>
    <div id="myToast" class="toast position-absolute top-0 end-0 m-3">
        <div class="toast-header">
            <strong class="me-auto">Thông báo</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <p>Đăng ký thành công</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myToast = new bootstrap.Toast(document.getElementById('myToast'));
            myToast.show();
            setTimeout(function() {
                myToast.hide();
            }, 1000000);
        });
    </script>

<?php
    unset($_SESSION['message_register_success']);
}
?>