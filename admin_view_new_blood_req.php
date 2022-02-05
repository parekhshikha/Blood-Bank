<?php
session_start();
include("admin_header.php");
include("connect.php");


if(isset($_REQUEST['arid']))
{
	$rid=$_REQUEST['arid'];
	$res1=mysql_query("select blood_group from request_blood where req_id='$rid'");
	$r1=mysql_fetch_array($res1);
	$bgroup=$r1[0];
	$query="update request_blood set status='1' where req_id='$rid'";
	
	if(mysql_query($query))
	{
		mysql_query("update blood_detail set qty=qty-1 where blood_group='$bgroup'");
		echo "<script type='text/javascript'>";
		echo "alert('Blood Request Accepted Successfully');";
		echo "window.location.href='admin_view_new_blood_req.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['rrid']))
{
	$rid=$_REQUEST['rrid'];
	$query="update request_blood set status='2' where req_id='$rid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Blood Request Rejected Successfully');";
		echo "window.location.href='admin_view_new_blood_req.php';";
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
		<h3 class="tittle">VIEW NEW BLOOD REQUEST</h3>
			<div class="contact-form">
				
				<div class="col-md-12 contact-in">
				<?php
				
				$qur1=mysql_query("select * from request_blood where status='0'");
				if(mysql_num_rows($qur1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>REQUEST ID</th>
								<th>REQUEST DATE</th>
								<th>RECEIVER NAME</th>
								<th>RECEIVER ADDRESS</th>
								<th>RECEIVER MOBILE NO</th>
								<th>PATIENT NAME</th>
								<th>HOSPITAL NAME</th>
								<th>BLOOD GROUP</th>
								<th>PRESCRIPTION</th>
								<th>ACCEPT</th>
								<th>REJECT</th>
							</tr>";
					while($q1=mysql_fetch_array($qur1))
					{
						echo "<tr>";
						echo "<td>$q1[0]</td>";
						echo "<td>$q1[1]</td>";
						$qur2=mysql_query("select * from receiver_regis where receiver_id='$q1[2]'");
						$q2=mysql_fetch_array($qur2);
						echo "<td>$q2[1]</td>";
						echo "<td>$q2[2] $q2[3]</td>";
						echo "<td>$q2[4]</td>";
						echo "<td>$q1[3]</td>";
						echo "<td>$q1[4]</td>";
						echo "<td>$q1[5]</td>";
						echo "<td><a href='$q1[6]' target='_blank'><img src='$q1[6]' style='width:150px; height:150px;'></a></td>";
						echo "<td><a href='admin_view_new_blood_req.php?arid=$q1[0]'>ACCEPT</a></td>";
						echo "<td><a href='admin_view_new_blood_req.php?rrid=$q1[0]'>REJECT</a></td>";
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