<?php
session_start();
include("donor_header.php");
include("connect.php");

if(isset($_REQUEST['arid']))
{
	$rid=$_REQUEST['arid'];
	$donorid=$_SESSION['donid'];
	$query="update request_blood_donor set donor_id='$donorid',req_status='1' where req_d_id='$rid'";
	
	if(mysql_query($query))
	{

		echo "<script type='text/javascript'>";
		echo "alert('Blood Request Accepted Successfully');";
		echo "window.location.href='donor_view_new_req.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['rrid']))
{
	$rid=$_REQUEST['rrid'];
	$query="update request_blood_donor set req_status='2' where req_d_id='$rid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Blood Request Rejected Successfully');";
		echo "window.location.href='donor_view_new_req.php';";
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
		<h3 class="tittle">VIEW REQUEST BLOOD STATUS</h3>
			<div class="contact-form">
				
				<div class="col-md-12 contact-in">
				<?php
				$donorid=$_SESSION['donid'];
				$qur1=mysql_query("select * from request_blood_donor where req_status='0' and req_id in (select req_id from request_blood where status='3' and blood_group=(select blood_group from donor_registration where donor_id='$donorid'))");
				if(mysql_num_rows($qur1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>REQUEST ID</th>
								<th>REQUEST DATE</th>
								<th>RECEIVER NAME</th>
								<th>RECEIVER MOBILE NO</th>
								
								<th>ACCEPT</th>
								<th>REJECT</th>
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
						
						echo "<td><a href='donor_view_new_req.php?arid=$q1[0]'>ACCEPT</a></td>";
						echo "<td><a href='donor_view_new_req.php?rrid=$q1[0]'>REJECT</a></td>";
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