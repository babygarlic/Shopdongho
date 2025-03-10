<?php
include("inc/top.php");
?>
<!-- Banner khuyến mãi -->
<?php

if ($khuyenmai) {
    // Hiển thị banner khuyến mãi
    echo "<div class='text-center p-5' style='background-color: #2C2C2C;); color: #FFD700;'>";
    echo "<h1 class='fw-bolder'>" . strtoupper($khuyenmai['tenkhuyenmai']) . "</h1>";

    echo "</div>";
    echo "<div class='banner-container' style='background-image: url(../{$khuyenmai['banner']}); 
          background-size: cover; background-position: center; height: 400px;'>";
    echo "</div>";
}
?>
<h3><a class="text-decoration-none text-info" href="index.php?action=group&id=khuyenmai ?>">
        Sản phẩm khuyến mãi</a></h3>
<!-- danh sách các sản phẩm khuyến mai-->
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    <?php
    foreach ($sanphamkm as $product) {
    ?>
        <div class="col mb-5">
            <div class="card h-100 shadow">
                <!-- Sale badge-->
                <?php if ($product["giaban"] != $product["giagoc"]) { ?>
                    <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm giá</div>
                <?php } // end if 
                ?>
                <!-- Product image-->
                <a href="index.php?action=detail&id=<?php echo $product["id"]; ?>">
                    <img class="card-img-top" src="../<?php echo $product["hinhanh"]; ?>" alt="<?php echo $product["tenmathang"]; ?>" />
                </a>
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <a class="text-decoration-none" href="index.php?action=detail&id=<?php echo $product["id"]; ?>">
                            <h5 class="fw-bolder text-info"><?php echo $product["tenmathang"]; ?></h5>
                        </a>
                        <!-- Product reviews-->
                        <div class="d-flex justify-content-center small text-warning mb-2">
                            <div class="bi-star-fill"></div>
                            <div class="bi-star-fill"></div>
                            <div class="bi-star-fill"></div>
                            <div class="bi-star-fill"></div>
                            <div class="bi-star-fill"></div>
                        </div>
                        <!-- Product price-->
                        <?php if ($product["giaban"] != $product["giagoc"]) { ?>
                            <span class="text-muted text-decoration-line-through"><?php echo number_format($product["giagoc"]); ?>đ</span><?php } // end if 
                                                                                                                                            ?>
                        <span class="text-danger fw-bolder"><?php echo number_format($product["giaban"]); ?>đ</span>
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-info mt-auto" href="index.php?action=chovaogio&id=<?php echo $product["id"]; ?>">Chọn mua</a></div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>


<?php
foreach ($danhmuc as $d) {
    $i = 0;
?>
    <h3><a class="text-decoration-none text-info" href="index.php?action=group&id=<?php echo $d["id"]; ?>">
            <?php echo $d["tendanhmuc"]; ?></a></h3>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
        foreach ($mathang as $m) {
            if ($m["danhmuc_id"] == $d["id"] && $i < 4) {
                $i++;
        ?>
                <div class="col mb-5">
                    <div class="card h-100 shadow">
                        <!-- Sale badge-->
                        <?php if ($m["giaban"] != $m["giagoc"]) { ?>
                            <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm giá</div>
                        <?php } // end if 
                        ?>
                        <!-- Product image-->
                        <a href="index.php?action=detail&id=<?php echo $m["id"]; ?>">
                            <img class="card-img-top" src="../<?php echo $m["hinhanh"]; ?>" alt="<?php echo $m["tenmathang"]; ?>" />
                        </a>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <a class="text-decoration-none" href="index.php?action=detail&id=<?php echo $m["id"]; ?>">
                                    <h5 class="fw-bolder text-info"><?php echo $m["tenmathang"]; ?></h5>
                                </a>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <?php if ($m["giaban"] != $m["giagoc"]) { ?>
                                    <span class="text-muted text-decoration-line-through"><?php echo number_format($m["giagoc"]); ?>đ</span><?php } // end if 
                                                                                                                                            ?>
                                <span class="text-danger fw-bolder"><?php echo number_format($m["giaban"]); ?>đ</span>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-info mt-auto" href="index.php?action=chovaogio&id=<?php echo $m["id"]; ?>">Chọn mua</a></div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>

    </div>
    <?php
    if ($i == 0)
        echo "<p>Danh mục hiện chưa có sản phẩm.</p>";
    else
    ?>
    <div class="text-end mb-2"><a class="text-warning text-decoration-none fw-bolder" href="index.php?action=group&id=<?php echo $d["id"]; ?>">Xem thêm <?php echo $d["tendanhmuc"]; ?></a></div>
<?php
}
?>

<?php
include("inc/bottom.php");
?>