<?php
session_start();
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/donhang.php");
require("../../model/mathang.php");
require("../../model/diachi.php");
require("../../model/doanhthu.php");


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
$dt = new DOANHTHU();

switch ($action) {
    case "macdinh":
        $dsdonhang = $dh->laydanhsachdonhang();
        date_default_timezone_set('Asia/Ho_Chi_Minh');  // Thiết lập múi giờ Việt Nam
        $donhangHomNay = $dh->layDonHangTheoNgay(date('Y-m-d'));
        $thongKeThang = $dh->thongKeDonHangTrongThang(date('Y-m')); 
        $tongDonHang = $dh->tongSoDonHang();
        $tongDoanhThu = $dh->tongDoanhThu();
        include("main.php");
        break;
    case "dangnhap":
        include("login.php");
        break;
    case "xldangnhap":
        $email = $_REQUEST["txtemail"];
        $matkhau = $_REQUEST["txtmatkhau"];
        if ($nd->kiemtranguoidunghople($email, $matkhau, true) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email); // đặt biến session
            $dsdonhang = $dh->laydanhsachdonhang();
            include("main.php");
        } else {
            include("login.php");
        }
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        //include("login.php"); 
        header("location:../../index.php");
        break;
    case "hoso":
        include("profile.php");
        break;
    case "xlhoso":
        $mand = $_POST["txtid"];
        $email = $_POST["txtemail"];
        $sodt = $_POST["txtdienthoai"];
        $hoten = $_POST["txthoten"];
        $hinhanh = $_POST["txthinhanh"];

        if ($_FILES["fhinh"]["name"] != null) {
            $hinhanh = basename($_FILES["fhinh"]["name"]);
            $duongdan = "../../images/users/" . $hinhanh;
            move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
        }

        $nd->capnhatnguoidung($mand, $email, $sodt, $hoten, $hinhanh);

        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        include("main.php");
        break;
    case "matkhau":
        include("changepass.php");
        break;
    case "doimatkhau":
        if (isset($_REQUEST["txtmatkhaumoi"])) {
            $email = $_SESSION["nguoidung"]["email"];
            $nd->doimatkhau($email, $_REQUEST["txtmatkhaumoi"]);
        }
        $dsdonhang = $dh->laydanhsachdonhang();
        include("main.php");
        break;
    default:
        break;
}
