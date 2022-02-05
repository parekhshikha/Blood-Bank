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
		<h3 class="tittle">RECEIVER DETAIL REPORT</h3>
			<div class="contact-form">
				
				<div class="col-md-12 contact-in">
				<?php
				
				$qur1=mysql_query("select * from receiver_regis");
				if(mysql_num_rows($qur1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>RECEIVER ID</th>
								<th>RECEIVER NAME</th>
								<th>ADDRESS</th>
								<th>CITY</th>
								<th>MOBILE NO</th>
								<th>EMAIL ID</th>
								<th>GENDER</th>
								
								<th>VIEW BLOOD REQUEST</th>
								<th>VIEW PLASMA REQUEST</th>
							</tr>";
					while($q1=mysql_fetch_array($qur1))
					{
						echo "<tr>";
						echo "<td>$q1[0]</td>";
						echo "<td>$q1[1]</td>";
						echo "<td>$q1[2]</td>";
						echo "<td>$q1[3]</td>";
						echo "<td>$q1[4]</td>";
						echo "<td>$q1[5]</td>";
						echo "<td>$q1[7]</td>";
						
						echo "<td><a href='admin_view_receiverwise_bloodrequest_report.php?reid=$q1[0]'>VIEW BLOOD REQUESTED DETAIL</a></td>";
						echo "<td><a href='admin_view_receiverwise_plasmarequest_report.php?reid=$q1[0]'>VIEW PLASMA REQUESTED DETAIL</a></td>";
						echo "</tr>";
					}
					echo "</table>";
				}else{
					echo "<h2>No Donor Detail Found</h2>";
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