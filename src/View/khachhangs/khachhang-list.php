<!-- sanpham-list.php -->
<?php ob_start(); ?>


<h4 class="card-title">Danh sách khách hàng</h4>
	<!-- Đã xác nhận -->
	<table class="table table-bordered">
		<thead>
			<tr style="text-align: center; vertical-align: middle;">
				<th scope="col" style="width: 100px;">Mã khách hàng</th>
				<th scope="col" style="width: 145px;">Họ tên khách hàng</th>
				<th scope="col"  style="width: 150px;">Địa chỉ khách hàng</th>
				<th scope="col" style="width: 100px;">Số điện thoại khách hàng</th>
				<th scope="col" style="width: 105px;">Email khách hàng</th>
				<th scope="col" style="width: 145px;">Tên đăng nhập khách hàng</th>
				<th scope="col"  style="width: 150px;">Mật khẩu khách hàng</th>
				<th scope="col" style="width: 105px;"></th>
            	<th scope="col" style="width: 105px;"></th>
				
			</tr>
		</thead>
		<tbody>
            <?php foreach ($khachhangs as $khachhang): ?>
                <tr style="vertical-align: middle;">
                    <td style="text-align: center;"><?= $khachhang['makhachhang'] ?></td>
                    <td style="text-align: center;"><?= $khachhang['hotenkh'] ?></a></td>                
                    <td style="text-align: center;"><?= $khachhang['diachikh'] ?></td>
                    <td style="text-align: center;"><?= $khachhang['sodienthoaikh'] ?></td>
                    <td style="text-align: center;"><?= $khachhang['emailkh'] ?></td>
                    <td style="text-align: center;"><?= $khachhang['tendangnhapkh'] ?></td>
                    <td style="text-align: center;"><?= $khachhang['matkhaukh'] ?></td>

                    <!--  -->
                    <td style="text-align: center;">
                      <a href="/khachhang/update/<?= $khachhang['makhachhang'] ?>">Edit</a>
                    </td>
                    <td style="text-align: center;">
                      <a href="/khachhang/delete/<?= $khachhang['makhachhang'] ?>">Xóa</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>							
	</table>


<?php $content = ob_get_clean(); ?>
<?php include (__DIR__ . '/../../../templates/layout.php'); ?>
<!--
</body>
</html>
-->
