<?php
include("admin_header.php");
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
if(isset($_POST['btnreport']))
{
	$bgroup1=$_POST['selbgroup'];
}


?>
<div class="banner page-head">	
</div>
<!-- //banner -->
<!--contact-starts--> 
<div class="contact">
	 <div class="container">
		<h3 class="tittle">PLASMA WISE REQUEST REPORT</h3>
			<div class="contact-form">
				<div class="col-md-4 contact-grid">
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
						
							<input type="submit" value="VIEW REPORT" name="btnreport" onclick="return validation();">
						
						</div>
						
					</form>
				</div>
				<div class="col-md-8 contact-in">
				<?php
				if(isset($_POST['btnreport']))
				{
					$qur1=mysql_query("select * from request_plasma where blood_group='$bgroup1'");
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
							echo "<td style='color:red;'>REJECTED</td>";
						}
						echo "</tr>";
					}
					echo "</table>";
				}else{
					echo "<h2><center>No Plasma Requested</center></h2>";
				}
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