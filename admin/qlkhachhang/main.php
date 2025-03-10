<?php include("../inc/top.php"); ?>
<div>
    <h3>Quản lý khách hàng</h3>
    <!-- Thông báo lỗi nếu có -->
    <?php
    if (isset($tb)) {
    ?>
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Lỗi!</strong> <?php echo $tb; ?>
        </div>
    <?php
    }
    ?>

    <br>

    <!-- Danh sách người dùng -->
    <table class="table table-hover">
        <tr>
            <th><a href="index.php?sort=email">Email</a></th>
            <th><a href="index.php?sort=sodienthoai">Số điện thoại</a></th>
            <th><a href="index.php?sort=hoten">Họ tên</a></th>

        </tr>
        <?php foreach ($nguoidung as $nd): ?>
            <tr>
                <td><?php echo $nd["email"]; ?></td>
                <td><?php echo $nd["sodienthoai"]; ?></td>
                <td><?php echo $nd["hoten"]; ?></td>
            </tr>
            </td>
            </tr>
        <?php
        endforeach; ?>
    </table>

</div>
<?php include("../inc/bottom.php"); ?>