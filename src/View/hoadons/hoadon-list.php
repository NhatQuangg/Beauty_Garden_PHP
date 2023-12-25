<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>
-->
<?php ob_start(); ?>
<h5 class="card-title">Danh sách hóa đơn chưa xác nhận</h5>
	<!-- Đã xác nhận -->
	<table class="table table-bordered">
		<thead>
			<tr style="text-align: center; vertical-align: middle;">
				<th scope="col" style="width: 100px;">Mã hóa đơn</th>
				<th scope="col" style="width: 145px;">Mã khách hàng</th>
				<th scope="col"  style="width: 300px;">Tên khách hàng</th>
				<th scope="col" style="width: 100px;">Ngày mua</th>
				<th scope="col" style="width: 105px;">Thành tiền</th>
				<th scope="col" style="width: 90px;"></th>
			</tr>
		</thead>
			<tbody>
			<?php foreach ($hoadons as $hoadon): ?>
				<tr style="vertical-align: middle;">
					<a href="/hoadon/hoadonchuaxacnhanList/<?= $hoadon['mahoadon'] ?>">
					<td style="text-align: center;"><?= $hoadon['mahoadon'] ?></td>
					<td style="text-align: center;"><?= $hoadon['makhachhang'] ?></td>
					<td style="text-align: center;"><?= $hoadon['hotenkh'] ?></td>
					<td style="text-align: center;"><?= $hoadon['ngaymua'] ?></td>
					<td style="text-align: center;"><?= $hoadon['tongtien'] ?></td>
					<td style="text-align: center;">
                    	<a href="/hoadon/update/<?= $hoadon['mahoadon'] ?>">Xác nhận</a>
					</td>
					</tr>
            <?php endforeach; ?>
			</tbody>							
	</table>
    <!-- <a href="/index.php?action=create">Add User</a> -->
    <?php
    session_start();

    if(isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        echo $message . '<br>';
    }
    
    ?>
<?php $content = ob_get_clean(); ?>
<?php include (__DIR__ . '/../../../templates/layout.php'); ?>
<!--
</body>
</html>
-->