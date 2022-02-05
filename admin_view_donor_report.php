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
		<h3 class="tittle">DONOR DETAIL REPORT</h3>
			<div class="contact-form">
				
				<div class="col-md-12 contact-in">
				<?php
				
				$qur1=mysql_query("select * from donor_registration");
				if(mysql_num_rows($qur1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>DONOR ID</th>
								<th>DONOR NAME</th>
								<th>ADDRESS</th>
								<th>CITY</th>
								<th>MOBILE NO</th>
								<th>EMAIL ID</th>
								<th>GENDER</th>
								<th>DATE OF BIRTH</th>
								<th>BLOOD GROUP</th>
								<th>VIEW REQUESTED</th>
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
						echo "<td>$q1[8]</td>";
						echo "<td>$q1[9]</td>";
						echo "<td><a href='admin_view_donorwise_request_report.php?doid=$q1[0]'>VIEW REQUESTED DETAIL</a></td>";
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