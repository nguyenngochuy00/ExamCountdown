<?php
// Xử lý yêu cầu của api

include('api.php');

$api_object = new API();

if($_GET["action"] == 'fetch_all')
{
	// tìm nạp tất cả các hàng kết quả và trả về tập kết quả dưới dạng mảng kết hợp, mảng số hoặc cả hai.
	$data = $api_object->fetch_all(); 
}

// phương thức chạy để chèn hoặc thêm dữ liệu của api / Api.php
if($_GET["action"] == 'insert')
{
	$data = $api_object->insert();
}

// mã hóa một giá trị sang định dạng JSON.
echo json_encode($data);

?>