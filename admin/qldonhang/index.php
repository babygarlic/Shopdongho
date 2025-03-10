<?php
session_start();
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/donhang.php");
require("../../model/donhangct.php");
require("../../model/mathang.php");
require("../../model/diachi.php");


// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {  // chưa đăng nhập
    $action = "dangnhap";
} else {   // mặc định
    $action = "macdinh";
}

$nd = new NGUOIDUNG();
$dh = new DONHANG();

switch ($action) {
    case "macdinh":
        $dsdonhang = $dh->laydanhsachdonhang();
        include("main.php");
        break;

    case "chitiet":
        $id = $_REQUEST['id'];
        $donhang = $dh->laydonhangtheoid($id);
        $dsmathang = $dh->laytatcadonhangcttheoid($id);
        include("chitiet.php");
        break;

    case "xoa":
        $id = $_REQUEST['id'];
        $dh = new DONHANG();
        // xóa
        $dh->xoadonhang($id);
        $dsdonhang = $dh->laydanhsachdonhang();
        include("main.php");
        break;
    
    case "capnhat":
        $id = $_REQUEST['id']; // Lấy ID từ URL
        $trangthai = $_POST['trangthai']; // Lấy giá trị trạng thái từ form POST
        
        // Cập nhật trạng thái
        echo "Cập nhật trạng thái thành công với trạng thái: " . $trangthai;
            
        $dh = new DONHANG();
        $dh->capnhatTrangThaiDonHang($id, $trangthai);
            
        // Lấy lại danh sách đơn hàng sau khi cập nhật
        $dsdonhang = $dh->laydanhsachdonhang();
            
        // Bao gồm lại trang chính
        include("main.php");
        break;
        
    default:
        break;
}
