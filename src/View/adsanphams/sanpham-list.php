<!-- sanpham-list.php -->
<?php ob_start(); ?>

<!-- Nút để hiển thị form thêm sản phẩm -->
<style>
    #Form .form-row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        /* Giảm độ lớn của margin để tránh lỗi dòng */
        margin-left: -15px;
        /* Giảm độ lớn của margin để tránh lỗi dòng */
    }

    #Form .form-group {
        flex: 0 0 33.3333%;
        /* Chia đều 3 cột */
        padding-right: 15px;
        /* Tăng margin phải để tạo khoảng cách giữa các cột */
        padding-left: 15px;
        /* Tăng margin trái để tạo khoảng cách giữa các cột */
    }
</style>
<h1>Sản phẩm Form</h1>
<form id="Form" action="/sanpham/add" method="post" class="mb-3" style="margin: 20px;" enctype="multipart/form-data>
    <!-- Các trường của form -->
    <div class=" form-row align-items-end">
    <div class="form-group col-md-4" style="margin-bottom: 20px;">
        <label for="masanpham">Mã sản phẩm:</label>
        <input type="text" id="masanpham" name="masanpham" class="form-control" value="<?= isset($sanpham['masanpham']) ? $sanpham['masanpham'] : '' ?>" required>
    </div>
    <div class="form-group col-md-4" style="margin-bottom: 20px;">
        <label for="tensanpham">Tên sản phẩm:</label>
        <input type="text" id="tensanpham" name="tensanpham" class="form-control" value="<?= isset($sanpham['tensanpham']) ? $sanpham['tensanpham'] : '' ?>" required>
    </div>
    <div class="form-group col-md-4" style="margin-bottom: 20px;">
        <label for="soluong">Số lượng:</label>
        <input type="number" id="soluong" name="soluong" class="form-control" value="<?= isset($sanpham['soluong']) ? $sanpham['soluong'] : '' ?>" required>
    </div>

    <div class="form-group col-md-4" style="margin-bottom: 20px;">
        <label for="gia">Giá:</label>
        <input type="number" id="gia" name="gia" class="form-control" value="<?= isset($sanpham['gia']) ? $sanpham['gia'] : '' ?>" required>
    </div>
    <div class="form-group col-md-4" style="margin-bottom: 20px;">
        <label for="file">Chọn ảnh:</label>
        <input type="file" name="anh" id="anh" accept=".jpg, .jpeg, .png" value="<?= isset($sanpham['anh']) ? $sanpham['anh'] : '' ?>" required>
    </div>
    <div class="form-group col-md-4" style="margin-bottom: 20px;">
        <label for="ngaynhap">Ngày nhập:</label>
        <input type="date" id="ngaynhap" name="ngaynhap" class="form-control" value="<?= isset($sanpham['ngaynhap']) ? $sanpham['ngaynhap'] : '' ?>" required>
    </div>
    <div class="form-group col-md-4" style="margin-bottom: 20px;">
        <label for="tomtat">Tóm tắt:</label>
        <input type="text" id="tomtat" name="tomtat" class="form-control" value="<?= isset($sanpham['tomtat']) ? $sanpham['tomtat'] : '' ?>" required>
    </div>
    <div class="form-group col-md-4" style="margin-bottom: 20px;">
        <label for="thongtinsanpham">Thông tin sản phẩm:</label>
        <input type="text" id="thongtinsanpham" name="thongtinsanpham" class="form-control" value="<?= isset($sanpham['thongtinsanpham']) ? $sanpham['thongtinsanpham'] : '' ?>" required>
    </div>
    <!-- ... -->
    <div class="form-group col-md-4" style="margin-bottom: 20px;">
        <label for="maloai">Mã loại: </label>
        <select id="maloai" name="maloai" class="form-control" required>
            <?php foreach ($loais as $loai) : ?>
                <option value="<?= $loai['maloai'] ?>"><?= $loai['tenloai'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <!-- ... -->


    <!-- Thêm các trường khác... -->
    <div class="col-md-12 mt-3 d-flex justify-content-end" style="margin-right: 30px;">
        <input type="submit" value="add">
    </div>
    </div>
    <?php
    session_start();

    if (isset($_SESSION['message_addsp_fail'])) {
        $message = $_SESSION['message_addsp_fail'];
        unset($_SESSION['message_addsp_fail']);
    ?>
        <p class="big mb-0 text-left text-danger" style="font-style: italic;">Mã sản phẩm đã tồn tại</p>
    <?php  }  ?>
</form>



<h4 class="card-title">Danh sách sản phẩm</h4>
<!-- Đã xác nhận -->
<table class="table table-bordered">
    <thead>
        <tr style="text-align: center; vertical-align: middle;">
            <th scope="col" style="width: 100px;">Mã sản phẩm</th>
            <th scope="col" style="width: 145px;">Tên sản phẩm</th>
            <th scope="col" style="width: 150px;">Số lượng</th>
            <th scope="col" style="width: 100px;">Giá</th>
            <th scope="col" style="width: 105px;">Ảnh</th>
            <th scope="col" style="width: 145px;">Ngày nhập</th>
            <th scope="col" style="width: 150px;">Tóm tắt</th>
            <th scope="col" style="width: 100px;">Thông tin sản phẩm</th>
            <th scope="col" style="width: 105px;">Mã loại</th>
            <th scope="col" style="width: 105px;"></th>
            <th scope="col" style="width: 105px;"></th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($sanphams as $sanpham) : ?>
            <tr style="vertical-align: middle;">
                <td style="text-align: center;"><?= $sanpham['masanpham'] ?></td>
                <td style="text-align: center;"><?= $sanpham['tensanpham'] ?></a></td>
                <td style="text-align: center;"><?= $sanpham['soluong'] ?></td>
                <td style="text-align: center;"><?= $sanpham['gia'] ?></td>
                <td style="text-align: center;"><img src="../src/assets/img/<?= $sanpham['anh'] ?>" alt="Hình ảnh sản phẩm" style="max-width: 100px; max-height: 100px;"></td>
                <td style="text-align: center;"><?= $sanpham['ngaynhap'] ?></td>
                <td style="text-align: center;"><?= $sanpham['tomtat'] ?></td>
                <td style="text-align: center;"><?= $sanpham['thongtinsanpham'] ?></td>
                <td style="text-align: center;"><?= $sanpham['maloai'] ?></td>
                <!--  -->
                <td style="text-align: center;">
                    <a href="/sanpham/update/<?= $sanpham['masanpham'] ?>">Edit</a>
                </td>
                <td style="text-align: center;">
                    <a href="/sanpham/delete/<?= $sanpham['masanpham'] ?>">Xóa</a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>
<!--
</body>
</html>
-->