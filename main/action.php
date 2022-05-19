<?php

// gửi yêu cầu api đến api / test_api.php để chèn hoặc thêm dữ liệu vào bảng mysql

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$form_data = array(
			'name'	=>	$_POST['name'],
			'phone'	=>	$_POST['phone'],
			'email'	=>	$_POST['email'],
			'address'	=>	$_POST['address'],
			'subject'	=>	$_POST['subject']
		);
		$api_url = "http://localhost/PhatTrienPMHDV/ExamCountdown/api/test_api.php?action=insert";
		// CURL là bộ thư viện được sử dụng để giúp thực hiện việc chuyển dữ liệu thông qua nhiều giao thức khác nhau (như HTTP, FPT...).
		$client = curl_init($api_url);	// Khởi tạo một phiên curl
		curl_setopt($client, CURLOPT_POST, true);	// Đặt một tùy chọn để chuyển curl
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);	// giá trị của nó chính là một mảng các key => value, tương ứng với name và value của nó trong các thẻ input khi submit FORM
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);	//true trả về curl_exec, false in lên trình duyệt
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}


}


?>