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
if(isset($_POST['btnview']))
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
		<h3 class="tittle">VIEW DONOR LIST</h3>
			<div class="contact-form">
				<div class="col-md-6 contact-grid">
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
						
						
				</div>
				<div class="col-md-6 contact-in">
				<div class="send">
						<BR/>
							<input type="submit" value="VIEW DONOR LIST" name="btnview" onclick="return validation();">
						
						</div>
						
					</form>
				
					
					
				</div>
				<div class="clearfix"> </div>
				<div class="col-md-12">
				
				<?php
				if(isset($_POST['btnview']))
				{
				$qur1=mysql_query("select * from donor_registration where blood_group='$bgroup1'");
				if(mysql_num_rows($qur1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>DONOR NAME</th>
								<th>DONOR CITY</th>
								<th>DONOR MOBILE NO</th>
								<th>DONOR EMAIL ID</th>
								<th>GENDER</th>
								<th>BLOOD GROUP</th>
								
							</tr>";
					while($q1=mysql_fetch_array($qur1))
					{
						echo "<tr>";
						
						echo "<td>$q1[1]</td>";
						
						echo "<td>$q1[3]</td>";
						echo "<td>$q1[4]</td>";
						echo "<td>$q1[5]</td>";
						echo "<td>$q1[7]</td>";
						echo "<td>$q1[9]</td>";
						
						echo "</tr>";
					}
					echo "</table>";
				}else{
					echo "<h2>No Donor List Found</h2>";
				}
				}
				?>
					
				</div>
			</div>
		
	</div>
</div>

<?php
include("footer.php");
?>