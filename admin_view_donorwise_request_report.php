<?php
session_start();
include("admin_header.php");
include("connect.php");


?>
<div class="banner page-head">	
</div>
<!-- //banner -->
<!--contact-starts--> 
<div class="contact">
	 <div class="container">
		<h3 class="tittle">DONOR WISE REQUEST BLOOD STATUS</h3>
			<div class="contact-form">
				
				<div class="col-md-12 contact-in">
				<?php
				$donorid=$_REQUEST['doid'];
				$qur1=mysql_query("select * from request_blood_donor where donor_id='$donorid' and req_id in (select req_id from request_blood where status='3' and blood_group=(select blood_group from donor_registration where donor_id='$donorid'))");
				if(mysql_num_rows($qur1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>REQUEST ID</th>
								<th>REQUEST DATE</th>
								<th>RECEIVER NAME</th>
								<th>RECEIVER MOBILE NO</th>
								<th>DONOR NAME</th>
								<th>DONOR MOBILE NO</th>
								<th>REQUEST STATUS</th>
							
							</tr>";
					while($q1=mysql_fetch_array($qur1))
					{
						echo "<tr>";
						echo "<td>$q1[0]</td>";
						echo "<td>$q1[1]</td>";
						
						$qur2=mysql_query("select * from receiver_regis where receiver_id='$q1[3]'");
						$q2=mysql_fetch_array($qur2);
						echo "<td>$q2[1]</td>";
						
						echo "<td>$q2[4]</td>";
						
							if($q1[4]=="0")
						{
							echo "<td style='color:green;'>-------</td>";
							echo "<td style='color:green;'>-------</td>";
							echo "<td style='color:orange;'>REQUEST SEND TO DONOR</td>";
						}else if($q1[4]=="1")
						{
							$qur2=mysql_query("select * from donor_registration where donor_id='$q1[4]'");
							$q2=mysql_fetch_array($qur2);
							echo "<td style='color:green;'>$q2[1]</td>";
							echo "<td style='color:green;'>$q2[4]</td>";
							echo "<td style='color:green;'>ACCEPTED</td>";
							
						}else if($q1[7]=="2")
						{
							echo "<td style='color:green;'>-------</td>";
							echo "<td style='color:green;'>-------</td>";
							echo "<td style='color:red;'>REJECTED </td>";
						}
						echo "</tr>";
					}
					echo "</table>";
				}else{
					echo "<h2>No Blood Requested </h2>";
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