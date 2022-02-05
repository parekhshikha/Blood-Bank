<?php
session_start();
include("receiver_header.php");
include("connect.php");

?>
<script type="text/javascript">
	function validation()
	{
		var v=/^[a-zA-Z ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Your Patient Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in Your Patient Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		var v=/^[a-zA-Z0-9 ]+$/
		if(form1.txthname.value=="")
		{
			alert("Please Enter Your Hospital Name");
			form1.txthname.focus();
			return false;
		}else{
			if(!v.test(form1.txthname.value))
			{
				alert("Please Enter Only Characters in Your Hospital Name");
				form1.txthname.focus();
				return false;
			}
		}
		
		var fname=document.getElementById('txtpresc').value;
		var ext=fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById('txtpresc').value=="")
		{
			alert("Please Select Doctor Prescription");
			return false;
		}else{
			if(!(ext=="jpg" || ext=="png"|| ext=="jpeg"))
			{
				alert("Please Select Doctor Prescription in Format like jpg jpeg or png");
				return false;
			}
		}
	}
</script>
<?php
if(isset($_POST['btnrequest']))
{
	$bgroup=$_SESSION['tempbgroup'];
	
	$name=$_POST['txtname'];
	$hname=$_POST['txthname'];
	
	$recid=$_SESSION['recid'];
	$rdate=date("Y-m-d");
	//auto number code start...
	$res1=mysql_query("select max(req_id) from request_blood");
	$rid=0;
	while($r1=mysql_fetch_array($res1))
	{
		$rid=$r1[0];
	}
	$rid++;
	//auto number cod3 end....

	$tpath=$_FILES['txtpresc']['tmp_name'];
	$ipath="pres_img/P".$rid.".png";
	$query="insert into request_blood values('$rid','$rdate','$recid','$name','$hname','$bgroup','$ipath','0')";
	
	if(mysql_query($query))
	{
		move_uploaded_file($tpath,$ipath);
		unset($_SESSION['tempbgroup']);
		echo "<script type='text/javascript'>";
		echo "alert('Blood Requested Successfully');";
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
		<h3 class="tittle">REQUEST BLOOD</h3>
			<div class="contact-form">
				<div class="col-md-6 contact-grid">
					<form method="post" name="form1" enctype="multipart/form-data">
						<p class="your-para">Enter Patient Name</p>
						<input type="text" value="" placeholder="Enter Patient Name" name="txtname" >
						<p class="your-para">Enter Hospital Name</p>
						<input type="text" value="" placeholder="Enter Hospital Name" name="txthname" >
						<p class="your-para">Select Blood Prescription Image:</p>
						<input type="file" name="txtpresc" id="txtpresc">
						
						<div class="send">
						<br/>
							<input type="submit" value="REQUEST BLOOD" name="btnrequest" onclick="return validation();">
						
						</div>
						
					</form>
				</div>
				<div class="col-md-6 contact-in">
				<img src="images/request1.jpg" style="margin-left:50px;">
					
				</div>
				<div class="clearfix"> </div>
			</div>
		 
	</div>
</div>

<?php
include("footer.php");
?>