<?php

class API
{
	private $connect = '';

	// PHP sẽ tự động gọi hàm này khi tạo một đối tượng từ một lớp.
	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=bt3_ltw", "root", "");
	}

	// tìm nạp tất cả các hàng kết quả và trả về tập kết quả dưới dạng mảng kết hợp, mảng số hoặc cả hai.
	function fetch_all()
	{
		$query = "SELECT * FROM khachhang ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) // tìm nạp một hàng kết quả dưới dạng một mảng kết hợp.
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["name"]))
		{
			
			$form_data = array(
				':name'		=>	$_POST["name"],
				':phone'	=>	$_POST["phone"],
				':email'	=>	$_POST["email"],
				':address'	=>	$_POST["address"],
				':subject'	=> 	$_POST["subject"]
			);
			$query = "
			INSERT INTO khachhang (name, phone, email, address, subject) VALUES (:name, :phone, :email, :address, :subject) 
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>