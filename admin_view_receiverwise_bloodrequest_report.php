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
		<h3 class="tittle">RECEIVER WISE REQUEST BLOOD STATUS</h3>
			<div class="contact-form">
				
				<div class="col-md-12 contact-in">
				<?php
				$recid=$_REQUEST['reid'];
				$qur1=mysql_query("select * from request_blood where receiver_id='$recid'");
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
							echo "<td style='color:red;'>REJECTED <a href='receiver_view_blood_req_status.php?srid=$q1[0]'>SEND REQUEST TO DONOR</a></td>";
						}else if($q1[7]=="3")
						{
							echo "<td style='color:hotpink;'>REQUEST SEND TO DONOR</td>";
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