<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php include('Crypto.php')?>
<?php

	error_reporting(0);
	
	$workingKey='B3C750C696EFBB5ED13C8F22B1C0BA6F';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	
    //==print_r($dataSize);die; 
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
		if($i==0)	$order_id=$information[1];
		if($i==1)	$tracking_code=$information[1];
		
		if($i==10)	$amount=$information[1];
		if($i==11)	$name=$information[1];
		if($i==12)	$address=$information[1];
		if($i==15)	$pincode=$information[1];
		if($i==17)	$mobile=$information[1];
	}
	
	$servername = "localhost";
    $username = "workshipapp";
    $password = "sr6jBAWspiMBhXk5";
    $dbname = "workshipapp";
        
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection

	if($order_status==="Success")
	{
	    $sql = "UPDATE orders SET payment_status='Success', tracking_code=$tracking_code WHERE order_id=$order_id";
        $conn->query($sql);
        
        $sql = "SELECT user_id FROM orders WHERE order_id=$order_id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $uid = $row["user_id"];
          }
        }
        
        $sqldel = "DELETE FROM carts WHERE uid=$uid";
        $conn->query($sqldel);
        // echo $uid;
        
        echo "<br><br><br><br><br>";
        echo "<i class='fa fa-check-circle' style='font-size:50px;color:green;'></i>";
		echo "<br><span style='font-size:35px;'>Thank you for shopping with us. </span>
		      <br><span style='font-size:20px;'>We will be shipping your order to you soon.</span>";
	}
	else
	{
	    $sql = "UPDATE orders SET payment_status='Failed', tracking_code=$tracking_code WHERE order_id=$order_id";
        $conn->query($sql);
        
        echo "<br><br><br><br><br>";
        echo "<i class='fa fa-times-circle-o' style='font-size:50px;color:red;'></i>";
        echo "<br><span style='font-size:35px;'>Payment Failed </span>";
	}

	echo "<br><br>";

	echo "<table cellspacing='4' cellpadding='4' style='width:400px;margin-left:20px;' border='1'>";
	echo '<tr><td>Order Status- </td><td>'.$order_status.'</td></tr>';
	echo '<tr><td>Order Id- </td><td>'.$order_id.'</td></tr>';
	echo '<tr><td>Tracking Id- </td><td>'.$tracking_code.'</td></tr>';
	
	echo '<tr><td>Amount- </td><td>'.$amount.'</td></tr>';
	echo '<tr><td>Name- </td><td>'.$name.'</td></tr>';
	echo '<tr><td>Address- </td><td>'.$address.'</td></tr>';
	
	echo '<tr><td>Pincode- </td><td>'.$pincode.'</td></tr>';
	echo '<tr><td>Mobile No- </td><td>'.$mobile.'</td></tr>';
	
	
	// 	for($i = 0; $i < $dataSize; $i++) 
    // 	{
    // 		$information=explode('=',$decryptValues[$i]);
    // 	    echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
    // 	}

	echo "</table><br>";
	echo "</center>";
?>


