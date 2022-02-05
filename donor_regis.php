<?php
include("header.php");
include("connect.php");
?>
<script type="text/javascript">
	function validation()
	{
		var v=/^[a-zA-Z ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Your Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in Your Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Your Address");
			form1.txtadd.focus();
			return false;
		}
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter Your City Name");
			form1.txtcity.focus();
			return false;
		}else{
			if(!v.test(form1.txtcity.value))
			{
				alert("Please Enter Only Characters in Your City Name");
				form1.txtcity.focus();
				return false;
			}
		}
		
		var v=/^[0-9]+$/
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Mobile No");
			form1.txtmno.focus();
			return false;
		}else if(form1.txtmno.value.length!=10)
		{
			alert("Please Enter Your Mobile No 10 Digit Long");
			form1.txtmno.focus();
			return false;
		}else{
			if(!v.test(form1.txtmno.value))
			{
				alert("Please Enter Only Digits in Mobile No");
				form1.txtmno.focus();
				return false;
			}
		}
		
		var v=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/
		if(form1.txtemail.value=="")
		{
			alert("Please Enter Your Email ID");
			form1.txtemail.focus();
			return false;
		}else{
			if(!v.test(form1.txtemail.value))
			{
				alert("Please Enter Valid Email ID");
				form1.txtemail.focus();
				return false;
			}
		}
		
		if(form1.txtpwd.value=="")
		{
			alert("Please Enter Password");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length<6)
		{
			alert("Please Enter Your Password More Than 6 Characters");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length>10)
		{
			alert("Please Enter Your Password Less Than 10 Characters");
			form1.txtpwd.focus();
			return false;
		}
		
		if(form1.gender[0].checked==false)
		{
			if(form1.gender[1].checked==false)
			{
				alert("Please Select Gender");
				return false;
			}
		}
		
		if(form1.selbgroup.value=="0")
		{
			alert("Please Select Blood Group");
			form1.selbgroup.focus();
			return false;
		}
	}
</script>

<?php
if(isset($_POST['btnregis']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$gender=$_POST['gender'];
	$dob=date("Y-m-d",strtotime($_POST['txtdob']));
	$bgroup=$_POST['selbgroup'];
	
	$res1=mysql_query("select * from donor_registration where email_id='$email'");
	if(mysql_num_rows($res1)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Email Id Already Exists');";
		echo "window.location.href='donor_regis.php';";
		echo "</script>";
	}else{
		//auto number code start...
		$res2=mysql_query("select max(donor_id) from donor_registration");
		$did=0;
		while($r2=mysql_fetch_array($res2))
		{
			$did=$r2[0];
		}
		$did++;
		//auto number cod3 end....
		$query="insert into donor_registration values('$did','$name','$add','$city','$mno','$email','$pwd','$gender','$dob','$bgroup')";	
		if(mysql_query($query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Registration Successfully');";
			echo "window.location.href='login.php';";
			echo "</script>";
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
		<h3 class="tittle">DONOR REGISTRATION</h3>
			<div class="contact-form">
				<div class="col-md-6 contact-grid">
					<form method="post" name="form1">
						<p class="your-para">Donor Name:</p>
						<input type="text" value="" placeholder="Enter Your Name" name="txtname">
						<p class="your-para">Address:</p>
						<textarea name="txtadd" placeholder="Enter Your Address"></textarea>
						<p class="your-para">City:</p>
						<input type="text" value="" placeholder="Enter Your City Name" name="txtcity">
						<p class="your-para">Mobile No:</p>
						<input type="text" value="" placeholder="Enter Your Mobile No" name="txtmno">
						<p class="your-para">Email ID:</p>
						<input type="text" value="" placeholder="Enter Email ID" name="txtemail">
						<p class="your-para">Password:</p>
						<input type="password" placeholder="*******" name="txtpwd">
						<p class="your-para">Select Gender:</p>
						<input type="radio" name="gender" value="MALE"> MALE &nbsp;&nbsp;&nbsp;
						<input type="radio" name="gender" value="FEMALE"> FEMALE &nbsp;&nbsp;&nbsp;
						<input type="radio" name="gender" value="TRANSGENDER"> TRANSGENDER
						<p class="your-para">Date Of Birth:</p>
						<input type="date" name="txtdob" value="<?php echo date("Y-m-d",strtotime("-18 years")); ?>" max="<?php echo date("Y-m-d",strtotime("-18 years")); ?>">
						<p class="your-para">Blood Groupd:</p>
						<select name="selbgroup" >
							<option value="0">--Select Blood Group--</option>
							<option value="A+">A+</option>
							<option value="B+">B+</option>
							<option value="AB+">AB+</option>
							<option value="O+">O+</option>
							<option value="A-">A-</option>
							<option value="B-">B-</option>
							<option value="AB-">AB-</option>
							<option value="O-">O-</option>
						</select>
						<div class="send">
						<br/>
							<input type="submit" value="REGISTER" name="btnregis" onclick="return validation();">
							
						</div>
						
					</form>
				</div>
				<div class="col-md-6 contact-in">
					
					<img src="images/regis1.gif" style="width:600px; height:850px;">
					
				</div>
				<div class="clearfix"> </div>
			</div>
		 
	</div>
</div>

<?php
include("footer.php");
?>