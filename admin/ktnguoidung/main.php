<?php include("../inc/top.php"); ?>
<h1 class="text-info">Bảng điều khiển</h1> 
<!-- Thông tin tổng quan -->
<div class="row">
    <div class="col-md-3">
        <div class="card bg-primary text-white p-3">
            <h4>Tổng số đơn hàng</h4>
            <p><?php echo $tongDonHang; ?> đơn</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white p-3">
            <h4>Tổng doanh thu</h4>
            <p><?php echo number_format($tongDoanhThu); ?> đ</p>
        </div>
    </div>
</div>  
<!-- Danh sách đơn hàng hôm nay -->
<h4 class="mt-4">Đơn hàng hôm nay</h4>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($donhangHomNay as $dh): ?>
        <tr>
            <td><?php echo $dh['id']; ?></td>
            <td><?php echo $dh['ngay']; ?></td>
            <td><?php echo number_format($dh['tongtien']); ?> đ</td>
            <td><?php echo $dh['trangthai']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Biểu đồ thống kê -->
<h4 class="mt-4">Thống kê đơn hàng theo từng ngày Trong tháng</h4>
<canvas id="chartDonHang" style="width: 100%; height: 400px;"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartDonHang').getContext('2d');
    const data = {
    labels: [<?php echo "'" . implode("', '", array_keys($thongKeThang)) . "'"; ?>],
    datasets: [{
        label: 'Số lượng đơn hàng',
        data: [<?php echo implode(", ", array_values($thongKeThang)); ?>],
        backgroundColor: 'rgba(54, 162, 235, 0.5)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
    }]
};


    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

<?php include("../inc/bottom.php"); ?>
