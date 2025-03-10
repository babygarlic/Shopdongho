<?php include("../inc/top.php"); ?>

<h4 class="text-info">Chi tiết đơn hàng <?php echo $_REQUEST["id"] ?></h4>
<h6>Ngày tạo: <?php echo $donhang['ngay'] ?></h6>
<h6>Tổng tiền: <?php echo number_format($donhang['tongtien']) ?>đ</h6>

<table class="table table-hover">
    <tr>
        <th>Tên mặt hàng</th>
        <th>Giá bán</th>
        <th>Số lượng</th>
        <th>Hình ảnh</th>
    </tr>
    <?php
    foreach ($dsmathang as $m):
    ?>
        <tr>
            <td>
                <a href="../qlmathang/index.php?action=chitiet&id=<?php echo $m["id_mathang"]; ?>">
                    <?php echo $m["tenmathang"]; ?>
                </a>
            </td>
            <td><?php echo number_format($m["giaban"]); ?>đ</td>
            <td><?php echo number_format($m["soluong"]); ?></td>
            <td>
                <a href="../qlmathang/index.php?action=chitiet&id=<?php echo $m["id_mathang"]; ?>">
                    <img src="../../<?php echo $m["hinhanh"]; ?>" width="80" class="img-thumbnail"></a>
            </td>
        </tr>
    <?php
    endforeach;
    ?>
</table>


<?php include("../inc/bottom.php"); ?>