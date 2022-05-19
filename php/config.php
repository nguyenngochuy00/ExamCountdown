<!-- Cấu hình, thao tác vs csdl -->
<?php
	define('LOCALHOST', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'bt3_ltw');

	// thêm, sửa, xóa -> sử dụng function (hàm dùng chung)
	function crud($sql) {
		// mysqli_connect : tạo kết nối tới csdl
		$con = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DATABASE);

		// truy vấn tới csdl
		mysqli_query($con, $sql);

		// đóng kết nối
		mysqli_close($con);
	}

	// sử dụng cho lệnh select -> trả về kết quả
	function select($sql) {
		// mysqli_connect : tạo kết nối tới csdl
		$con = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DATABASE);

		// truy vấn tới csdl
		$result = mysqli_query($con, $sql);
		// khai báo mảng
		$list = [];
		// tìm nạp 1 hàng kết quả dưới dạng 1 mảng kết hợp, 1 mảng số hoặc cả 2
		while ($row = mysqli_fetch_array($result, 1)) {
			// thêm dữ liệu vào row (row chứa tất cả dữ liệu)
			$list[] = $row;
		}

		// đóng kết nối
		mysqli_close($con);

		return $list;
	}
?>