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

<form id="Form" action="/loai/add" method="post" class="mb-3" style="margin: 20px;">
    <!-- Các trường của form -->
    <div class="form-row align-items-end">
        <div class="form-group col-md-4" style="margin-bottom: 20px;">
            <label for="maloai">Mã loại:</label>
            <input type="text" id="maloai" name="maloai" class="form-control" value="<?= isset($loai['maloai']) ? $loai['maloai'] : '' ?>" required>
        </div>
        <div class="form-group col-md-4" style="margin-bottom: 20px;">
            <label for="tenloai">Tên loại:</label>
            <input type="text" id="tenloai" name="tenloai" class="form-control" value="<?= isset($loai['tenloai']) ? $loai['tenloai'] : '' ?>">
        </div>

        <!-- Thêm các trường khác... -->
        <div class="col-md-12 mt-3 d-flex justify-content-end" style="margin-right: 30px;">
            <input type="submit" value="add">
        </div>
    </div>
</form>

<h4 class="card-title">Danh sách loại</h4>
<!-- Đã xác nhận -->
<table class="table table-bordered">
    <thead>
        <tr style="text-align: center; vertical-align: middle;">
            <th scope="col" style="width: 100px;">Mã loại</th>
            <th scope="col" style="width: 145px;">Tên loại</th>

            <th scope="col" style="width: 105px;"></th>
            <th scope="col" style="width: 105px;"></th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($loais as $loai) : ?>
            <tr style="vertical-align: middle;">
                <td style="text-align: center;"><?= $loai['maloai'] ?></td>
                <td style="text-align: center;"><?= $loai['tenloai'] ?></a></td>

                <td style="text-align: center;">
                    <a href="/loai/update/<?= $loai['maloai'] ?>">Edit</a>
                </td>
                <td style="text-align: center;">
                    <a href="/loai/delete/<?= $loai['maloai'] ?>">Xóa</a>
                    
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