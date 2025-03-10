<?php include("../inc/top.php"); ?>

<h4 class="text-info">Quản lý doanh thu</h4>

<table class="table table-hover">
    <tr>
        <th>Loại</th>
        <th>Doanh thu</th>
    </tr>
    <?php
    // Khởi tạo đối tượng DOANHTHU
    $doanhthu = new DOANHTHU();

    // Lấy tổng doanh thu
    $tongDoanhThu = $doanhthu->layTongDoanhThu();

    // Lấy doanh thu theo ngày, tháng, năm
    $doanhThuNgay = $doanhthu->layDoanhThuTheoKhoangThoiGian('day');
    $doanhThuThang = $doanhthu->layDoanhThuTheoKhoangThoiGian('month');
    $doanhThuNam = $doanhthu->layDoanhThuTheoKhoangThoiGian('year');
    ?>
    <tr>
        <td>Hôm nay</td>
        <td><?php echo number_format($doanhThuNgay); ?> đ</td>
    </tr>
    <tr>
        <td>Tháng này</td>
        <td><?php echo number_format($doanhThuThang); ?> đ</td>
    </tr>
    <tr>
        <td>Năm nay</td>
        <td><?php echo number_format($doanhThuNam); ?> đ</td>
    </tr>
    <tr>
        <td>Tổng doanh thu</td>
        <td><?php echo number_format($tongDoanhThu); ?> đ</td>
    </tr>
</table>

<h4 class="text-info mt-4">Doanh thu theo sản phẩm</h4>

<table class="table table-hover">
    <tr>
        <th>Sản phẩm</th>
        <th>Số lượng bán</th>
        <th>Doanh thu</th>
    </tr>
    <?php
    // Lấy danh sách doanh thu theo sản phẩm
    $doanhThuSanPham = $doanhthu->layDoanhThuTheoSanPham();
    foreach ($doanhThuSanPham as $sp):
    ?>
        <tr>
            <td><?php echo $sp['tenmathang']; ?></td>
            <td><?php echo $sp['tong_soluong']; ?></td>
            <td><?php echo number_format($sp['tong_doanhthu']); ?> đ</td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include("../inc/bottom.php"); ?>
