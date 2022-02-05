<?php
session_start();
include("receiver_header.php");
include("connect.php");

?>
<div class="banner page-head">	
</div>
<!-- //banner -->
<!--contact-starts--> 
<div class="contact">
	 <div class="container">
		<h3 class="tittle">VIEW DONOR REQUEST BLOOD STATUS</h3>
			<div class="contact-form">
				
				<div class="col-md-12 contact-in">
				<?php
				$recid=$_SESSION['recid'];
				$qur1=mysql_query("select * from request_blood_donor where receiver_id='$recid'");
				if(mysql_num_rows($qur1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>REQUEST ID</th>
								<th>REQUEST DATE</th>
								<th>DONOR NAME</th>
								<th>DONOR MOBILE NO</th>
								
								<th>REQUSET STATUS</th>
							</tr>";
					while($q1=mysql_fetch_array($qur1))
					{
						echo "<tr>";
						echo "<td>$q1[0]</td>";
						echo "<td>$q1[1]</td>";
						
						
						
						if($q1[5]=="0")
						{
							echo "<td style='color:green;'>-------</td>";
							echo "<td style='color:green;'>-------</td>";
							echo "<td style='color:orange;'>REQUEST SEND TO DONOR</td>";
						}else if($q1[5]=="1")
						{
							$qur2=mysql_query("select * from donor_registration where donor_id='$q1[4]'");
							$q2=mysql_fetch_array($qur2);
							echo "<td style='color:green;'>$q2[1]</td>";
							echo "<td style='color:green;'>$q2[4]</td>";
							echo "<td style='color:green;'>ACCEPTED</td>";
							
						}else if($q1[5]=="2")
						{
							echo "<td style='color:green;'>-------</td>";
							echo "<td style='color:green;'>-------</td>";
							echo "<td style='color:red;'>REJECTED </td>";
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