<?php include("../inc/top.php"); ?>

<h4 class="text-info">Quản lý đơn hàng</h4>

<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Tên khách hàng</th>
        <th>Số ĐT KH</th>
        <th>Địa chỉ</th>
        <th>Ngày tạo</th>
        <th>Tổng tiền</th>
        <th>Trạng Thái</th>
        <th>Chi tiết</th>
        <th>Xóa</th>
        <th>Thao tác</th>
    </tr>
    <?php
    foreach ($dsdonhang as $dh):
    ?>
        <tr>
            <td><?php echo $dh["id"]; ?></td>
            <td><?php echo $dh["tenkh"]; ?></td>
            <td><?php echo $dh["sodienthoai"]; ?></td>
            <td><?php echo $dh["diachi"]; ?></td>
            <td><?php echo $dh["ngay"]; ?></td>
            <td><?php echo number_format($dh["tongtien"]); ?>đ</td>
            <td>
                <?php echo $dh["trangthai"];?>
            </td>
            <td>
                <a class="btn btn-info" href="index.php?action=chitiet&id=<?php echo $dh["id"]; ?>"><i class="align-middle" data-feather="info"></i></a>
            </td>
            <td>
                <a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $dh["id"]; ?>"><i class="align-middle" data-feather="trash-2"></i></a>
            </td>
            <td>
                <!-- Dropdown chọn trạng thái mới -->
                <form action="index.php?action=capnhat&id=<?php echo $dh['id']; ?>" method="POST">
    <select name="trangthai" class="form-control">
        <option value="1" <?php echo ($dh['trangthai'] == 1) ? 'selected' : ''; ?>>Xác Nhận</option>
        <option value="2" <?php echo ($dh['trangthai'] == 2) ? 'selected' : ''; ?>>Hủy Đơn</option>
    </select>
    <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
</form>


            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include("../inc/bottom.php"); ?>
