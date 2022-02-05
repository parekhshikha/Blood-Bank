<?php
session_start();
include("receiver_header.php");
include("connect.php");

?>
<script type="text/javascript">
	function validation()
	{
		if(form1.selbgroup.value=="0")
		{
			alert("Please Select Blood Group");
			form1.selbgroup.focus();
			return false;
		}
		
		
	}
</script>
<?php
if(isset($_POST['btncheck']))
{
	
	$bgroup=$_POST['selbgroup'];
	
	
	$res1=mysql_query("select * from blood_detail where blood_group='$bgroup'");
	if(mysql_num_rows($res1)>0)
	{
		$r1=mysql_fetch_array($res1);
		if($r1[2]>0)
		{
			$_SESSION['tempbgroup']=$bgroup;
			echo "<script type='text/javascript'>";
			echo "alert('Blood is Available');";
			echo "window.location.href='receiver_request_blood.php';";
			echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Blood is Not Available');";
			echo "window.location.href='search_blood.php';";
			echo "</script>";
		}
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('No Blood Added');";
		echo "window.location.href='search_blood.php';";
		echo "</script>";
	}	

	
}

if(isset($_POST['btncheckplasma']))
{
	
	$bgroup=$_POST['selbgroup'];
	
	
	$res1=mysql_query("select * from blood_detail where blood_group='$bgroup'");
	if(mysql_num_rows($res1)>0)
	{
		$r1=mysql_fetch_array($res1);
		if($r1[3]>0)
		{
			$_SESSION['tempbgroup']=$bgroup;
			echo "<script type='text/javascript'>";
			echo "alert('Plasma is Available');";
			echo "window.location.href='receiver_request_plasma.php';";
			echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Plasma is Not Available');";
			echo "window.location.href='search_blood.php';";
			echo "</script>";
		}
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('No Plasma Added');";
		echo "window.location.href='search_blood.php';";
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
		<h3 class="tittle">SEARCH BLOOD AVABILITY</h3>
			<div class="contact-form">
				<div class="col-md-7 contact-grid">
					<form method="post" name="form1">
						
						<p class="your-para">Select Blood Group:</p>
						<select name="selbgroup" >
							<option value="0">--Select Blood Group--</option>
							<option value="A+" <?php if($bgroup1=="A+"){ echo "selected='selected'"; } ?>>A+</option>
							<option value="B+" <?php if($bgroup1=="B+"){ echo "selected='selected'"; } ?>>B+</option>
							<option value="AB+" <?php if($bgroup1=="AB+"){ echo "selected='selected'"; } ?>>AB+</option>
							<option value="O+" <?php if($bgroup1=="O+"){ echo "selected='selected'"; } ?>>O+</option>
							<option value="A-" <?php if($bgroup1=="A-"){ echo "selected='selected'"; } ?>>A-</option>
							<option value="B-" <?php if($bgroup1=="B-"){ echo "selected='selected'"; } ?>>B-</option>
							<option value="AB-" <?php if($bgroup1=="AB-"){ echo "selected='selected'"; } ?>>AB-</option>
							<option value="O-" <?php if($bgroup1=="O-"){ echo "selected='selected'"; } ?>>O-</option>
						</select>
						<div class="send">
						
							<input type="submit" value="CHECK BLOOD AVABILITY" name="btncheck" onclick="return validation();">
							<input type="submit" value="CHECK PLASMA AVABILITY" name="btncheckplasma" onclick="return validation();">
						</div>
						
					</form>
				</div>
				<div class="col-md-5 contact-in">
					<img src="images/search1.png" style="margin-left:50px;">
					
					
				</div>
				<div class="clearfix"> </div>
			</div>
		 
	</div>
</div>

<?php
include("footer.php");
?>