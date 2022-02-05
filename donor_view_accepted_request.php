<?php
session_start();
include("donor_header.php");
include("connect.php");


?>
<div class="banner page-head">	
</div>
<!-- //banner -->
<!--contact-starts--> 
<div class="contact">
	 <div class="container">
		<h3 class="tittle">VIEW ACCEPTED BLOOD REQUEST</h3>
			<div class="contact-form">
				
				<div class="col-md-12 contact-in">
				<?php
				$donorid=$_SESSION['donid'];
				$qur1=mysql_query("select * from request_blood_donor where req_status='1' and donor_id='$donorid'");
				if(mysql_num_rows($qur1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>REQUEST ID</th>
								<th>REQUEST DATE</th>
								<th>RECEIVER NAME</th>
								<th>RECEIVER MOBILE NO</th>
								
								
							</tr>";
					while($q1=mysql_fetch_array($qur1))
					{
						echo "<tr>";
						echo "<td>$q1[0]</td>";
						echo "<td>$q1[1]</td>";
						
						$qur2=mysql_query("select * from receiver_regis where receiver_id='$q1[2]'");
						$q2=mysql_fetch_array($qur2);
						echo "<td>$q2[1]</td>";
						
						echo "<td>$q2[4]</td>";
						
						
						echo "</tr>";
					}
					echo "</table>";
				}else{
					echo "<h2>No Accepted Requested Found</h2>";
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