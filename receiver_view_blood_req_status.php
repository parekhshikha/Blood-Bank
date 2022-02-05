<?php
session_start();
include("receiver_header.php");
include("connect.php");
include("PHPMailer-master/class.phpmailer.php");


if(isset($_REQUEST['srid']))
{
	$rid=$_REQUEST['srid'];
	$res1=mysql_query("select * from request_blood where req_id='$rid'");
	$r1=mysql_fetch_array($res1);
	$bgroup=$r1[5];
	$recid=$r1[2];
	
	$res2=mysql_query("select * from donor_registration where blood_group='$bgroup'");
	if(mysql_num_rows($res2)>0)
	{
		while($r2=mysql_fetch_array($res2))
		{
			try {
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "ssl";
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465;
			$mail->Username = "valsadbgroup@gmail.com"; 
			$mail->Password = "valsadbgroup1";
			$mail->FromName  =  "Blood Bank";	
			$mail->AddAddress($r2[5]);

			$mail->Subject = "Urgent Blood Required $bgroup";
			
			$mail->MsgHTML("Urgent Require for Blood Group $bgroup.<br/> If you want to donate a blood than please accept our request on blood bank website.");
			
			if(!$mail->Send())
			{
				echo $mail->ErrorInfo;
			}
			} catch (phpmailerException $e) {
				echo $e->errorMessage();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		//auto number code start...
		$res3=mysql_query("select max(req_d_id) from request_blood_donor");
		$reqid=0;
		while($r3=mysql_fetch_array($res3))
		{
			$reqid=$r3[0];
		}
		$reqid++;
		//auto number code end....
		$rdate=date("Y-m-d");
		$query="insert into request_blood_donor values('$reqid','$rdate','$recid','$rid','0','0')";
		if(mysql_query($query))
		{
			mysql_query("update request_blood set status='3' where req_id='$rid'");
			echo "<script type='text/javascript'>";
			echo "alert('Email & Request Send To Donor Successfully');";
			echo "window.location.href='receiver_view_blood_req_status.php';";
			echo "</script>";
		}
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('No Donot Found For This Blood Group');";
		echo "window.location.href='receiver_view_blood_req_status.php';";
		echo "</script>";
	}
}
?>
<div class="banner page-head">	
</div>
<!-- //banner -->
<!--contact-starts--> 
<div class="contact">
	 <div class="container">
		<h3 class="tittle">VIEW REQUEST BLOOD STATUS</h3>
			<div class="contact-form">
				
				<div class="col-md-12 contact-in">
				<?php
				$recid=$_SESSION['recid'];
				$qur1=mysql_query("select * from request_blood where receiver_id='$recid'");
				if(mysql_num_rows($qur1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>REQUEST ID</th>
								<th>REQUEST DATE</th>
								<th>PATIENT NAME</th>
								<th>HOSPITAL NAME</th>
								<th>BLOOD GROUP</th>
								<th>PRESCRIPTION</th>
								<th>REQUSET STATUS</th>
							</tr>";
					while($q1=mysql_fetch_array($qur1))
					{
						echo "<tr>";
						echo "<td>$q1[0]</td>";
						echo "<td>$q1[1]</td>";
						
						echo "<td>$q1[3]</td>";
						echo "<td>$q1[4]</td>";
						echo "<td>$q1[5]</td>";
						echo "<td><a href='$q1[6]' target='_blank'><img src='$q1[6]' style='width:150px; height:150px;'></a></td>";
						if($q1[7]=="0")
						{
							echo "<td style='color:orange;'>NEW REQUEST</td>";
						}else if($q1[7]=="1")
						{
							echo "<td style='color:green;'>ACCEPTED</td>";
						}else if($q1[7]=="2")
						{
							echo "<td style='color:red;'>REJECTED <a href='receiver_view_blood_req_status.php?srid=$q1[0]'>SEND REQUEST TO DONOR</a></td>";
						}else if($q1[7]=="3")
						{
							echo "<td style='color:hotpink;'>REQUEST SEND TO DONOR</td>";
						}
						echo "</tr>";
					}
					echo "</table>";
				}else{
					echo "<h2>No Blood Requested</h2>";
				}
				?>
					
					
				</div>
				<div class="clearfix"> </div>
			</div>
		 
	</div>
</div>

<?php
include("footer.php");
?>