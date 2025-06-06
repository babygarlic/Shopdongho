<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <title>Shop Đồng Hồ Thời Trang</title>

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        
    </head>
    <body id="top">
        
 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark shadow" style="background-color: #2C2C2C;"> <!-- Nền đen xám -->
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php" style="color: #FFD700;"> <!-- Màu vàng đồng -->
                <i class="bi bi-shop-window"></i> Đồng Hồ Hải Triều
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #E0E0E0;" aria-current="page" href="index.php">Trang chính</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #E0E0E0;" href="#!">Giới thiệu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: #E0E0E0;" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục sản phẩm
                        </a>
                        <ul class="dropdown-menu" style="background-color: #383838;">
                            <?php foreach ($danhmuc as $d): ?>
                                <li>
                                    <a class="dropdown-item" style="color: #FFD700;" href="?action=group&id=<?php echo $d["id"]; ?>">
                                        <?php echo $d["tendanhmuc"]; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php if(isset($_SESSION["khachhang"])){ ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item">
                                <a class="nav-link" style="color: #FFD700;" href="index.php?action=thongtin">
                                    Chào <?php echo $_SESSION["khachhang"]["hoten"]; ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color: #E0E0E0;" href="index.php?action=dangxuat">Đăng xuất</a>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <a href="index.php?action=dangnhap" class="btn btn-outline-warning">
                            <i class="bi bi-person"></i> Đăng nhập
                        </a>
                    <?php } ?>
                    &nbsp;
                    <a href="index.php?action=giohang" class="btn btn-outline-warning">
                        <i class="bi bi-cart3"></i> Giỏ hàng 
                        <span class="badge bg-danger text-white ms-1 rounded-pill"><?php echo demsoluongtronggio(); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
        
        <!-- Section-->        
        <section class="py-5">            
            <div class="container px-4 px-lg-5 mt-1">