<?php
session_start();
include("header.php");
include("connect.php");

if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$res=mysql_query("select * from admin_login where email_id='$email' and pwd='$pwd'");
	if(mysql_num_rows($res)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Admin Login Successfully');";
		echo "window.location.href='admin_manage_blood_detail.php';";
		echo "</script>";
	}else{
		$res2=mysql_query("select * from receiver_regis where email_id='$email' and pwd='$pwd'");
		if(mysql_num_rows($res2)>0)
		{
			$r2=mysql_fetch_array($res2);
			$_SESSION['recid']=$r2[0];
			echo "<script type='text/javascript'>";
			echo "alert('Receiver Login Successfully');";
			echo "window.location.href='search_blood.php';";
			echo "</script>";
		}else{
			$res3=mysql_query("select * from donor_registration where email_id='$email' and pwd='$pwd'");
			if(mysql_num_rows($res3)>0)
			{
				$r3=mysql_fetch_array($res3);
				$_SESSION['donid']=$r3[0];
				echo "<script type='text/javascript'>";
				echo "alert('Donor Login Successfully');";
				echo "window.location.href='donor_view_new_req.php';";
				echo "</script>";
			}else{
				echo "<script type='text/javascript'>";
				echo "alert('Check Your Email ID or Password');";
				echo "window.location.href='login.php';";
				echo "</script>";
		}
		}
	}
}
?>
<div class="banner page-head">	
</div>
<!-- //banner -->
<!--contact-starts--> 
<div class="contact">
	 <div class="container">
		<h3 class="tittle">LOGIN</h3>
			<div class="contact-form">
				<div class="col-md-6 contact-grid">
					<form method="post">
						<p class="your-para">Email ID:</p>
						<input type="text" value="" placeholder="Enter Email ID" name="txtemail">
						<p class="your-para">Password:</p>
						<input type="password" placeholder="*******" name="txtpwd">
						
						<div class="send">
							<input type="submit" value="LOGIN" name="btnlogin">
							<br/><br/>
							<h3><a href="donor_regis.php">New Donor? Click Here</a></h3>
							<br/><br/>
							<h3><a href="receiver_regis.php">New Receiver? Click Here</a></h3>
						</div>
						
					</form>
				</div>
				<div class="col-md-6 contact-in">
					
					<img src="images/log1.jpg" style="width:500px; height:250px;">
					
				</div>
				<div class="clearfix"> </div>
			</div>
		 
	</div>
</div>

<?php
include("footer.php");
?>