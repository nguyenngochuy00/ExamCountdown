<?php
	// đc sử dụng để nhúng mã PHP từ 1 tệp khác. Nếu tệp ko đc tìm thấy, 1 lỗi nghiêm trọng sẽ xảy ra và chương trình dừng lại
	// nếu tệp đc đưa vào trc đó, câu lệnh này sẽ ko bao gồm lại tệp đó
	require_once ('config.php');

	$name = $phone = $email = $address = $subject = '';

	// $_POST : là 1 biến siêu toàn cục PHP đc sd để thu thập data biểu mẫu sau khi gửi biểu mẫu HTML vs method="post"
	if (!empty($_POST)) {
		$idx = '';

		// isset : kiểm tra xem 1 biến có đc đặt hay ko, có nghĩa là biến đó phải đc khai báo và ko phải là NULL
				// Hàm này trả về true nếu biến tồn tại và ko phải là NULL, ngược lại, nó trả về false
		// ý nghĩa : ktra xem trong data post có id hay ko để ko bị gặp lỗi
		if (isset($_POST['id'])) {
			$idx = $_POST['id'];
		}

		if (isset($_POST['name'])) {	
			$name = $_POST['name'];
		}

		if (isset($_POST['phone'])) {
			$phone = $_POST['phone'];
		}

		if (isset($_POST['email'])) {
			$email = $_POST['email'];
		}

		if (isset($_POST['address'])) {
			$address = $_POST['address'];
		}

		if (isset($_POST['subject'])) {
			$subject = $_POST['subject'];
			$s = implode(', ', $subject);
			
		}
		

		// fix lỗi sql injection - SQL Injection là 1 kĩ thuật lợi dụng những lỗ hổng về câu truy vấn của các ứng dụng đc thực hiện 
								// bằng cách chèn thêm 1 đoạn SQL để làm sai lệch đi câu truy vấn ban đầu, từ đó có thể khai thác dữ liệu từ db
		// str_replace : thay thế 1 số ký tự bằng 1 số ký tự khác trong 1 chuỗi
		// insert into khachhang(name, phone, email, address) value ('Huy'', '0987657890', 'huy@gmail.com', 'Hà Nội')
		// -> insert into khachhang(name, phone, email, address) value ('Huy', '0326598756', 'huy@gmail.com', ''Hà Nội'); 
		// 		delete from khachhang; /*, '0987657890', 'huy@gmail.com', 'Hà Nội')
		// $idx = str_replace('\'', '\\\'', $idx);
		// $name = str_replace('\'', '\\\'', $name);	
		// $phone = str_replace('\'', '\\\'', $phone);
		// $email = str_replace('\'', '\\\'', $email);
		// $address = str_replace('\'', '\\\'', $address);

		// if ($idx != '') {
			// update : sửa đổi các bản ghi hiện có trong bảng
			// $sql = "update khachhang set name = '$name', phone = '$phone', email = '$email', address = '$address' where id = " .$idx;
		// } else {
			// insert : chèn các bản ghi mới trong 1 bảng
			$sql = "insert into khachhang(name, phone, email, address, subject) values ('$name', '$phone', '$email', '$address', '$s')";
		// }

		// echo $sql;

		crud($sql);

		// header : gửi 1 tiêu đề HTTP thô tới 1 máy khách
		// header('Location: list.php');
		// là 1 bí danh của hàm exit 
		die();
	}

	// ý nghĩa : id trên link -> sửa dữ liệu
	// $id = '';
	// isset : kiểm tra xem 1 biến có đc đặt hay ko, có nghĩa là biến đó phải đc khai báo và ko phải là NULL
				// Hàm này trả về true nếu biến tồn tại và ko phải là NULL, ngược lại, nó trả về false
	// $_GET : 1 biến siêu toàn cục PHP đc sử dụng để thu thập dữ liệu biểu mẫu sau khi gửi biểu mẫu HTML vs method="get"   
	// if (isset($_GET['id'])) {	
	// 	$id = $_GET['id'];
	// 	$sql = 'select * from khachhang where id = '.$id;
	// 	$customerList = select($sql);
	// 	if ($customerList != null && count($customerList) > 0) {
	// 		$cusList = $customerList[0];
	// 		$name = $cusList['name'];
	// 		$phone = $cusList['phone'];
	// 		$email = $cusList['email'];
	// 		$address  = $cusList['address'];
	// 	} else {
	// 		// dữ liệu ko tồn tại
	// 		$id = '';	
	// 	}
	// }
?>

<!DOCTYPE html>
<html>

<head>
	<title>Thêm/Sửa thông tin khách hàng</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function display_alert()
		{
			alert("Data Updated Successfully...!!!");
		}
  </script>
</head>

<style>
	.navbar {
		margin-bottom: 0;
		background-color: darkcyan;
		z-index: 9999;
		border: 0;
		font-size: 12px !important;
		line-height: 1.42857143 !important;
		letter-spacing: 4px;
		border-radius: 0;
	}

	.navbar li a,
	.navbar .navbar-brand {
		color: #fff !important;
	}

	.navbar-nav li a:hover,
	.navbar-nav li.active a {
		color: darkcyan !important;
		background-color: #fff !important;
	}

	.navbar-default .navbar-toggle {
		border-color: transparent;
		color: #fff !important;
	}
</style>

<body style="background-color: #f6f6f6;">
	<!-- nav-bar: một thanh điều hướng có thể mở rộng hoặc thu gọn, tùy thuộc vào kích thước màn hình. -->
  	<!-- navbar-fixed-top: Thanh điều hướng cũng có thể được cố định ở đầu hoặc cuối trang. -->
	<!-- <nav class="navbar navbar-default navbar-fixed-top"> -->
		<!-- container: cung cấp một vùng chứa có chiều rộng cố định đáp ứng -->
		<!-- <div class="container">
			<a class="navbar-brand" href="list.php">MuerShop</a>
			<div class="abc" id="myNavbar"> -->
				<!-- navbar-nav: các mục menu xuất hiện trên Navbar -->
				<!-- <ul class="nav navbar-nav">
					<li><a style="text-decoration: none; padding: 20px;" href="signout.php">ĐĂNG XUẤT</a></li>
				</ul>
			</div>
		</div>
	</nav> -->

	<!-- container: cung cấp một vùng chứa có chiều rộng cố định đáp ứng -->
	<div class="container" style="background-color: #D8F2FB; box-shadow: 0 0 20px 9px #ff61241f; border-radius: 15px;">
		<!-- panel : là 1 hộp có viền vs 1 số đệm xung quanh nội dung của nó -->
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center">
					<legend style="color: cornflowerblue;">
						<br>
						<h1>ĐĂNG KÝ NHẬN THÔNG BÁO</h1>
					</legend>
				</div>
			</div>

			<div class="panel-body">
				<!-- phương thức đẩy dữ liệu post lên php -->
				<form method="post">
						<!-- form-group : cần thiết cho khoảng cách tối ưu  -->
					<div class="form-group">
						<label for="name">Họ và tên:</label>
						<input type="number" name="id" value="<?=$id?>" style="display: none;">
						<!-- form-control : có chiều rộng là 100%. -->
						<input required="true" type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên" 
								pattern="(?:[A-Z]\p{L}+ ){1,3}[A-Z]\p{L}+" title="Vui lòng nhập đúng họ tên" value="<?=$name?>">
					</div>
					<div class="form-group">
						<label for="phone">Số điện thoại:</label>
						<input required="true" type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" 
								pattern="\+?(0|84)\d{9}" title="Vui lòng nhập đúng số điện thoại" value="<?=$phone?>">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input required="true" type="email" class="form-control" id="email" name="email" placeholder="Nhập email" 
								pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" title="Vui lòng nhập đúng email" value="<?=$email?>">
					</div>
					<div class="form-group">
						<label for="address">Địa chỉ:</label>
						<input required="true" type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" value="<?=$address?>">
					</div>
					<div class="form-group">
						<label for="subject">Chọn môn học:</label><br>
						
						<input type="checkbox" id="mathematics" name="subject[]" value="Toán">
						<label for="mathematics">Toán</label><br>
						<input type="checkbox" id="literature" name="subject[]" value="Văn">
						<label for="literature">Văn</label><br>
						<input type="checkbox" id="english" name="subject[]" value="Anh">
						<label for="english">Anh</label><br>
						<input type="checkbox" id="physics" name="subject[]" value="Lý">
						<label for="physics">Lý</label><br>
						<input type="checkbox" id="chemistry" name="subject[]" value="Hóa">
						<label for="chemistry">Hóa</label><br>
						<input type="checkbox" id="biology" name="subject[]" value="Sinh">
						<label for="biology">Sinh</label><br>
						<input type="checkbox" id="history" name="subject[]" value="Sử">
						<label for="history">Sử</label><br>
						<input type="checkbox" id="geography" name="subject[]" value="Địa">
						<label for="geography">Địa</label><br>
						<input type="checkbox" id="civic" name="subject[]" value="Công dân">
						<label for="civic">Công dân</label><br>
					</div>
					<button class="btn btn-success" onclick="display_alert()" value="Display alert box">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>