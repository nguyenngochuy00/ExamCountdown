<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/base.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css.map">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/fontawesome-free-6.1.1-web/css/all.min.css">
    <title>Đếm ngược ngày thi tốt nghiệp THPTQG 2022</title>
    <script src="js/quote.js"></script>
</head>

<body onload="newQuote();">
    <img src="images/background1.jpg" id="images">

    
    
    <h1 style="font-size:60px; color: white;"><strong>Đếm ngược ngày thi tốt nghiệp THPT 2022</strong> </h1>
    
   
   
    <p class="article">
        <i class="material-icons" style="color: white;">article</i>
        <a href="#" id="quotedisplay" onclick="newQuote();"></a>
    </p>
    <p class="alarm" style="color: white;">
        <span class="material-icons" >alarm</span> Ngày thi: 07/07/2022
    </p>
    <p style="font-size:30px;font-weight: bold; color: white;"> Thời gian còn lại</p>
    
    <div id="countdown" class="countdown" style="color: white;">
        <div class="time">
            <h2 id="days">--</h2>
            <small>Ngày</small>
        </div>

        <div class="time">
            <h2 id="hours">--</h2>
            <small>Giờ</small>
        </div>

        <div class="time">
            <h2 id="minutes">--</h2>
            <small>Phút</small>
        </div>

        <div class="time">
            <h2 id="seconds">--</h2>
            <small>Giây</small>
        </div>
    </div>

    <div class="app">
            <div class="grid">
                <nav class="header__navbar">
    
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--strong">
                            <button class="btn" style="font-size: 20px; background-color: green; border-color: green; color: white;">
                                ĐĂNG KÝ
                            </button>
                        </li>
                    </ul>
                </nav> 
            </div>


        
    </div>

	<?php
		include "PHPMailer/src/PHPMailer.php";
		include "PHPMailer/src/Exception.php";
		// include "PHPMailer/src/OAuth.php";
		include "PHPMailer/src/OAuthTokenProvider.php";
		include "PHPMailer/src/POP3.php";
		include "PHPMailer/src/SMTP.php";
		 
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		use PHPMailer\PHPMailer\OAuthTokenProvider;

		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try {
			//Server settings
			$mail->SMTPDebug = 0;                                 // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  						// Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = '';                 // SMTP username
			$mail->Password = '';                           // SMTP password
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			 
				//Recipients
				$mail->setFrom('', 'Admin');
				$mail->addAddress('', 'Nguyen');     // Add a recipient
				// $mail->addAddress('ellen@example.com');               // Name is optional
				// $mail->addReplyTo('info@example.com', 'Information');
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');
			 
				//Attachments
				// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			 
				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'Dang ky nhan thong bao nhac nho on thi';
				$mail->Body    = 'Bạn đã đăng ký thành công';
				// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			 
				$mail->send();
				// echo 'Message has been sent';
			} catch (Exception $e) {
				echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}
		
	?>

	<style>

	</style>

	<div id="apicrudModal" class="modal fade" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content" style="background-color: #D8F2FB; box-shadow: 0 0 20px 9px #ff61241f; border-radius: 15px;">
				<form method="post" id="api_crud_form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="color: cornflowerblue;"><legend> ĐĂNG KÝ NHẬN THÔNG BÁO</legend> </h4>
					  </div>
					  <div class="modal-body" align="left">
						  <div class="form-group">
							<label for="name">Họ và tên:</label>
							<!-- <input type="text" name="first_name" id="first_name" class="form-control" /> -->
							<input required="true" type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên" 
									pattern="(?:[A-Z]\p{L}+ ){1,3}[A-Z]\p{L}+" title="Vui lòng nhập đúng họ tên">
	
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại:</label>
							<!-- <input type="text" name="last_name" id="last_name" class="form-control" /> -->
							<input required="true" type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" 
							pattern="\+?(0|84)\d{9}" title="Vui lòng nhập đúng số điện thoại">
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input required="true" type="email" class="form-control" id="email" name="email" placeholder="Nhập email" 
									pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" title="Vui lòng nhập đúng email">
						</div>
						<div class="form-group">
							<label for="address">Địa chỉ:</label>
							<input required="true" type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
						</div>
						<div class="form-group">
							<label for="subject">Chọn môn học:</label><br>
							
							<input type="checkbox" id="mathematics" name="subject" value="Toán">
							<label for="mathematics">Toán</label><br>
							<input type="checkbox" id="literature" name="subject" value="Văn">
							<label for="literature">Văn</label><br>
							<input type="checkbox" id="english" name="subject" value="Anh">
							<label for="english">Anh</label><br>
							<input type="checkbox" id="physics" name="subject" value="Lý">
							<label for="physics">Lý</label><br>
							<input type="checkbox" id="chemistry" name="subject" value="Hóa">
							<label for="chemistry">Hóa</label><br>
							<input type="checkbox" id="biology" name="subject" value="Sinh">
							<label for="biology">Sinh</label><br>
							<input type="checkbox" id="history" name="subject" value="Sử">
							<label for="history">Sử</label><br>
							<input type="checkbox" id="geography" name="subject" value="Địa">
							<label for="geography">Địa</label><br>
							<input type="checkbox" id="civic" name="subject" value="Công dân">
							<label for="civic">Công dân</label><br>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="hidden_id" id="hidden_id" />
						<input type="hidden" name="action" id="action" value="insert" />
						<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
				</form>
			</div>
		  </div>
	</div>
	
	
	<script type="text/javascript">
	$(document).ready(function(){
	
		fetch_data();
	
		function fetch_data()
		{
			// gửi yêu cầu đến trang fetch.php
			$.ajax({
				url:"main/fetch.php",
				success:function(data)
				{
					$('tbody').html(data);
				}
			})
		}
	
		$('.btn').click(function(){
			$('#action').val('insert');
			$('#button_action').val('Insert');
			$('.modal-title').text('ĐĂNG KÝ NHẬN THÔNG BÁO');
			$('#apicrudModal').modal('show');
		});
	
		$('#api_crud_form').on('submit', function(event){
			event.preventDefault();
			if($('#name').val() == '')
			{
				alert("Enter First Name");
			}
			else if($('#last_name').val() == '')
			{
				alert("Enter Last Name");
			}
			else
			{
				var form_data = $(this).serialize();	// tạo một chuỗi văn bản được mã hóa URL bằng cách tuần tự hóa các giá trị biểu mẫu.
				$.ajax({
					// gửi yêu cầu Ajax từ index.php đến action.php
					url:"main/action.php",
					method:"POST",
					data:form_data,
					success:function(data)
					{
						fetch_data();
						$('#api_crud_form')[0].reset();
						$('#apicrudModal').modal('hide');
						if(data == 'insert')
						{
							alert("Đăng ký thành công");
						}
					}
				});
			}
		});
	
	});
	</script>
    
    
    <script src="js/main.js"></script>

</body>
<script type="text/javascript"> 
    var totalCount = 5;
    var num = Math.ceil( Math.random() * totalCount );
    document.getElementById("images").src = 'images/' + "background"+num+'.jpg';
</script>
</html>

