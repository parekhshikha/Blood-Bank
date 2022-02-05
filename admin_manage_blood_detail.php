<?php
include("admin_header.php");
include("connect.php");

//auto number code start...
$res1=mysql_query("select max(blood_id) from blood_detail");
$bid=0;
while($r1=mysql_fetch_array($res1))
{
	$bid=$r1[0];
}
$bid++;
//auto number cod3 end....

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
		
		var v=/^[0-9]+$/
		if(form1.txtbqty.value=="")
		{
			alert("Please Enter Blood Quantity");
			form1.txtbqty.focus();
			return false;
		}else if((parseInt(form1.txtbqty.value))<0)
		{
			alert("Please Enter Blood Quantity Greater Than Equal to 0");
			form1.txtbqty.focus();
			return false;
		}else{
			if(!v.test(form1.txtbqty.value))
			{
				alert("Please Enter Only Digits in Blood Quantity ");
				form1.txtbqty.focus();
				return false;
			}
		}
		
		if(form1.txtpqty.value=="")
		{
			alert("Please Enter Plasma Quantity");
			form1.txtpqty.focus();
			return false;
		}else if((parseInt(form1.txtpqty.value))<0)
		{
			alert("Please Enter Plasma Quantity Greater Than Equal to 0");
			form1.txtpqty.focus();
			return false;
		}else{
			if(!v.test(form1.txtpqty.value))
			{
				alert("Please Enter Only Digits in Plasma Quantity ");
				form1.txtpqty.focus();
				return false;
			}
		}
	}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$bid=$_POST['txtbid'];
	$bgroup=$_POST['selbgroup'];
	$bqty=$_POST['txtbqty'];
	$pqty=$_POST['txtpqty'];
	
	$query="insert into blood_detail values('$bid','$bgroup','$bqty','$pqty')";
	
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Blood Group Detail Saved Successfully');";
		echo "window.location.href='admin_manage_blood_detail.php';";
		echo "</script>";
	}
	
}

if(isset($_REQUEST['ubid']))
{
	$bid=$_REQUEST['ubid'];
	$res3=mysql_query("select * from blood_detail where blood_id='$bid'");
	$r3=mysql_fetch_array($res3);
	$bgroup1=$r3[1];
	$bqty1=$r3[2];
	$pqty1=$r3[3];
}

if(isset($_POST['btnupdate']))
{
	$bid=$_POST['txtbid'];
	$bgroup=$_POST['selbgroup'];
	$bqty=$_POST['txtbqty'];
	$pqty=$_POST['txtpqty'];
	
	$query="update blood_detail set blood_group='$bgroup',qty='$bqty',qty_plasma='$pqty' where blood_id='$bid'";
	
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Blood Group Detail Updated Successfully');";
		echo "window.location.href='admin_manage_blood_detail.php';";
		echo "</script>";
	}
	
}

if(isset($_REQUEST['dbid']))
{
	$bid=$_REQUEST['dbid'];
	$query="delete from blood_detail where blood_id='$bid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Blood Group Detail Deleted Successfully');";
		echo "window.location.href='admin_manage_blood_detail.php';";
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
		<h3 class="tittle">MANAGE BLOOD QUANTITY</h3>
			<div class="contact-form">
				<div class="col-md-5 contact-grid">
					<form method="post" name="form1">
						<p class="your-para">Enter Blood Id</p>
						<input type="text" value="<?php echo $bid; ?>" placeholder="Enter Blood Id" name="txtbid" readonly>
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
						<p class="your-para">Enter Blood Quantity</p>
						<input type="number" value="<?php echo $bqty1; ?>" placeholder="Enter Blood Quantity" name="txtbqty" >
						<p class="your-para">Enter Blood Plasma Quantity</p>
						<input type="number" value="<?php echo $pqty1; ?>" placeholder="Enter Blood Plasma Quantity" name="txtpqty" >
						<div class="send">
						<?php
						if(isset($_REQUEST['ubid']))
						{
							?>
							<input type="submit" value="UPDATE" name="btnupdate" onclick="return validation();">
							<?php
						}else{
						?>
							<input type="submit" value="SAVE" name="btnsave" onclick="return validation();">
						<?php
						}
						
						?>
						</div>
						
					</form>
				</div>
				<div class="col-md-7 contact-in">
				<?php
				$qur1=mysql_query("select * from blood_detail");
				if(mysql_num_rows($qur1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>BLOOD ID</th>
								<th>BLOOD GROUP</th>
								<th>BLOOD QTY</th>
								<th>PLASMA QTY</th>
								<th>UPDATE</th>
								<th>DELETE</th>
							</tr>";
					while($q1=mysql_fetch_array($qur1))
					{
						echo "<tr>";
						echo "<td>$q1[0]</td>";
						echo "<td>$q1[1]</td>";
						echo "<td>$q1[2]</td>";
						echo "<td>$q1[3]</td>";
						echo "<td><a href='admin_manage_blood_detail.php?ubid=$q1[0]'>UPDATE</a></td>";
						echo "<td><a href='admin_manage_blood_detail.php?dbid=$q1[0]'>DELETE</a></td>";
						echo "</tr>";
					}
					echo "</table>";
				}else{
					echo "<h2>No Blood Group Found</h2>";
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