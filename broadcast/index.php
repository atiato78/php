<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Send BroadCast Notification
				</span>

			
			<div style="background-color:powderblue"><p style="font-size:0%;"> 
			
			
			<?php
$conn=mysqli_connect("35.222.161.231:3306", "user7SS", "qLipb2eRpLsKdJLT", "sampledb");
$arr=[];
$a=0;
/* check connection */
if (mysqli_connect_errno()) {
	$data = [ 'response' => 'internal server error']; 
	header('Content-type: application/json');
	echo json_encode( $data );
	
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
		$sql="select * from AppDetails;";
		$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
array_push($arr,$row['appid']);
$a++;
		echo($row['appid']."-");
		 
    }
} else {
    echo "0 results";
}
$conn->close();
	
}
?>
			</p>
			
				</div>
				
				
</br></br>
				
				
								<div class="wrap-input100 input100-select">
					<span class="label-input100">Services</span>
					<div> 
						<select class="selection-2" name="service" id="service">
							<option>Select Service</option>
							<option>عرض عيد الأضحى</option>
							<option>باقات إضافية مجانا</option>
							<option>Firmware Upgrade</option>
							<option>New Offer!</option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>
				
				

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message</span>
					<textarea id="textarea" class="input100" name="message" placeholder="Your message here..."></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" onclick='Send("BCF685DB774A")'>
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
  
  function Send(a){
	//var msg = document.getElementById("textarea").value;

//var d = '<?php //echo $arr[0]; ?>';
//alert(d);




				
				
					
					<?php 
					echo('	var msg = document.getElementById("textarea").value;
							var service = document.getElementById("service").value;');
					echo('for(var k=0;k<'.$a.';$k++){');
					for($r=0;$r<$a;$r++){
					
					echo('
					
							var jqxhr = $.post( "https://exp.host/--/api/v2/push/send",  

							{
									"to": "'.$arr[$r].'",
									"title": service,
									"body": msg,
									"badge":2,
									"sound":"default",
									"data": { "message": msg}
								
							}
							)
							  .done(function() {
								//alert( "second success" );
							  })
							  .fail(function() {
								//alert( "error" );
							  })
							  .always(function() {
								//alert( "finished" );
							  });
					   
					
					');
					}
					
  echo('}');
					
					?>
					
}
  
</script>

</body>
</html>
