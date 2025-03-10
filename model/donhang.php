<?php

class DONHANG
{

	// Thêm đơn hàng mới, trả về khóa của dòng mới thêm
	public function themdonhang($nguoidung_id, $diachi_id, $tongtien)
	{
		$db = DATABASE::connect();
		try {
			$sql = "INSERT INTO donhang(nguoidung_id, diachi_id, tongtien) 
					VALUES(:nguoidung_id,:diachi_id,:tongtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':nguoidung_id', $nguoidung_id);
			$cmd->bindValue(':diachi_id', $diachi_id);
			$cmd->bindValue(':tongtien', $tongtien);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	public function laytatcadonhangcttheoid($id)
	{
		$dsdonhang = array();
		$mh_db = new MATHANG();
		$dbcon = DATABASE::connect();
		try {
			$sql = "SELECT * FROM donhangct WHERE donhang_id=:id";
			$cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":id", $id);
			$cmd->execute();
			$result = $cmd->fetchAll();
			$index = 0;
			foreach ($result as $donhangct) {
				$id = $donhangct['id'];
				$mh = $mh_db->laymathangtheoid($donhangct['mathang_id']);
				$dsdonhang[$index]['id'] = $id;
				$dsdonhang[$index]['id_mathang'] = $donhangct['mathang_id'];
				$dsdonhang[$index]['tenmathang'] = $mh['tenmathang'];
				$dsdonhang[$index]['hinhanh'] = $mh['hinhanh'];
				$dsdonhang[$index]['giaban'] = $donhangct['dongia'];
				$dsdonhang[$index]['soluong'] = $donhangct['soluong'];
				$index += 1;
			}

			return $dsdonhang;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	public function laydonhangcttheoid($id)
	{
		$dbcon = DATABASE::connect();
		try {
			$sql = "SELECT * FROM donhangct WHERE donhang_id=:id";
			$cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":id", $id);
			$cmd->execute();
			$result = $cmd->fetch();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	public function laydonhangtheoid($id)
	{
		$dbcon = DATABASE::connect();
		try {
			$sql = "SELECT * FROM donhang WHERE id=:id";
			$cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":id", $id);
			$cmd->execute();
			$result = $cmd->fetch();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}


	public function laydanhsachdonhang($interval_time = 'all')
	{
		$dsdonhang = array();
		$nguoidung_db = new NGUOIDUNG();
		$diachi_db = new DIACHI();
		$dbcon = DATABASE::connect();
		try {
			$sql = "";
			if ($interval_time === 'day') {
				$sql = "SELECT * FROM donhang WHERE DATE(ngay) like CURDATE() ORDER BY id DESC;";
			} else if ($interval_time === 'month') {
				$sql = "SELECT * FROM donhang WHERE MONTH(ngay) = MONTH(CURDATE()) AND YEAR(ngay) = YEAR(CURDATE()) ORDER BY id DESC;";
			} else if ($interval_time === 'year') {
				$sql = "SELECT * FROM donhang WHERE YEAR(ngay) = YEAR(CURDATE()) ORDER BY id DESC;";
			} else {
				$sql = "SELECT * FROM donhang ORDER BY id DESC;";
			}
			$cmd = $dbcon->prepare($sql);
			$cmd->execute();
			$result = $cmd->fetchAll();
			$index = 0;
			foreach ($result as $donhang) {
				$id = $donhang['id'];
				$dh = $this->laydonhangtheoid($id);
				$dc = $diachi_db->laydiachitheoid($dh['diachi_id']);
				$ngd = $nguoidung_db->laynguoidungtheoid($dh['nguoidung_id']);
				$dsdonhang[$index]['id'] = $id;
				$dsdonhang[$index]['tenkh'] = $ngd['hoten'];
				$dsdonhang[$index]['sodienthoai'] = $ngd['sodienthoai'];
				$dsdonhang[$index]['diachi'] = $dc['diachi'];
				$dsdonhang[$index]['ngay'] = $dh['ngay'];
				$dsdonhang[$index]['tongtien'] = $dh['tongtien'];
				if( $dh['trangthai']== 1){
					$dsdonhang[$index]['trangthai'] = "Đã Xác Nhận";
				}else if( $dh['trangthai'] == 2){
					$dsdonhang[$index]['trangthai'] = "Đã Hủy";
				} else 
					$dsdonhang[$index]['trangthai'] = "Chưa Xác nhận";
				$index += 1;
			}

			return $dsdonhang;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	public function xoadonhang($id)
	{
		$db = DATABASE::connect();
		$dhct_db = new DONHANGCT();
		try {
			$dhct_db->xoadonhangchitiet($id);
			$sql = "DELETE FROM donhang where id like $id";
			$cmd = $db->prepare($sql);
			$ketqua = $cmd->execute();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	public function xoadonhangtheonguoidung($nguoidung_id)
	{
		$db = DATABASE::connect();
		try {
			$sql = "SELECT * FROM donhang WHERE nguoidung_id=:nguoidung_id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":nguoidung_id", $nguoidung_id);
			$cmd->execute();
			$result = $cmd->fetchAll();
			foreach ($result as $donhang) {
				$id = $donhang['id'];
				$this->xoadonhang($id);
			}
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	public function capnhatTrangThaiDonHang($id, $trangthai)
	{
		$db = DATABASE::connect(); // Kết nối database
		try {
			// Câu lệnh SQL cập nhật trạng thái
			$sql = "UPDATE donhang SET trangthai = :trangthai WHERE id = :id";
			$cmd = $db->prepare($sql);
			// Gắn giá trị vào câu lệnh SQL
			$cmd->bindValue(':trangthai', $trangthai );
			$cmd->bindValue(':id', $id);
			// Thực	
			$ketqua = $cmd->execute();
			//Trả về kết quả (true nếu thành công, false nếu thất bại)
			return $ketqua;
		} catch (PDOException $e) {
			// Bắt lỗi và in ra thông báo
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	 // Thống kê số lượng đơn hàng trong tháng
	 public function thongKeDonHangTrongThang($thang) {
        $db = DATABASE::connect();
        $sql = "SELECT DATE(ngay) AS ngay, COUNT(*) AS soluong 
                FROM donhang 
                WHERE DATE_FORMAT(ngay, '%Y-%m') = :thang
                GROUP BY DATE(ngay)";
        $cmd = $db->prepare($sql);
        $cmd->bindValue(':thang', $thang);
        $cmd->execute();
        $result = $cmd->fetchAll();

        $thongke = [];
        foreach ($result as $row) {
            $thongke[$row['ngay']] = $row['soluong'];
        }
        return $thongke;
    }
	public function layDonHangTheoNgay($ngay) {
        $db = DATABASE::connect();
        $sql = "SELECT * FROM donhang WHERE DATE(ngay) =:ngay";
        $cmd = $db->prepare($sql);
        $cmd->bindValue(':ngay', $ngay, PDO::PARAM_STR);
        $cmd->execute();
        return $cmd->fetchAll();
    }

    // Tổng số đơn hàng
    public function tongSoDonHang() {
        $db = DATABASE::connect();
        $sql = "SELECT COUNT(*) AS tong FROM donhang";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $row = $cmd->fetch();
        return $row['tong'];
    }

    // Tổng doanh thu
    public function tongDoanhThu() {
        $db = DATABASE::connect();
        $sql = "SELECT SUM(tongtien) AS doanhthu FROM donhang";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $row = $cmd->fetch();
        return $row['doanhthu'];
    }
        
}
