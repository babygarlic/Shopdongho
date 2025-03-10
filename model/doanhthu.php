<?php
class DOANHTHU {
    public function layTongDoanhThu() {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT SUM(tongtien) AS tongdoanhthu FROM donhang WHERE trangthai = 1";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result['tongdoanhthu'] ?? 0; // Trả về 0 nếu không có kết quả
        } catch (PDOException $e) {
            echo "<p>Lỗi: " . $e->getMessage() . "</p>";
            return 0;
        }
    }
    public function layDoanhThuTheoKhoangThoiGian($loai) {
        $db = DATABASE::connect();
        try {
            $sql = "";
            if ($loai === 'day') {
                $sql = "SELECT SUM(tongtien) AS tongdoanhthu FROM donhang WHERE trangthai = 1 AND DATE(ngay) = CURDATE()";
            } else if ($loai === 'month') {
                $sql = "SELECT SUM(tongtien) AS tongdoanhthu FROM donhang WHERE trangthai = 1 AND MONTH(ngay) = MONTH(CURDATE()) AND YEAR(ngay) = YEAR(CURDATE())";
            } else if ($loai === 'year') {
                $sql = "SELECT SUM(tongtien) AS tongdoanhthu FROM donhang WHERE trangthai = 1 AND YEAR(ngay) = YEAR(CURDATE())";
            }
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result['tongdoanhthu'] ?? 0;
        } catch (PDOException $e) {
            echo "<p>Lỗi: " . $e->getMessage() . "</p>";
            return 0;
        }
    }
    public function layDoanhThuTheoSanPham() {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT mathang.tenmathang, 
                       SUM(donhangct.soluong) AS tong_soluong, 
                       SUM(donhangct.thanhtien) AS tong_doanhthu
                FROM donhangct
                JOIN mathang ON donhangct.mathang_id = mathang.id
                GROUP BY donhangct.mathang_id
                ORDER BY tong_doanhthu DESC";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch (PDOException $e) {
            echo "<p>Lỗi: " . $e->getMessage() . "</p>";
            return [];
        }
    }

   
}
?>