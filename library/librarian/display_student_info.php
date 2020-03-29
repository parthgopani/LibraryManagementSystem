<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
	?>
	<script type="text/javascript">
				window.location="login.php";
				</script>
				<?php
}
include "connection.php";
include "header.php";
?> 
     <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">All Student Information</h3>
          </div>
          
        </div>
        <div class="content-body"><!-- Line Awesome section start -->
<section id="line-awesome-icons">
	  <div class="row">
		  <div class="col-12">
			  <div class="card">
				  
				  <div class="card-content collapse show">
					  <div class="card-body">
						  <div class="feather-icons overflow-hidden row">
<?php
	$res=mysqli_query($link,"select * from student_registration");
	echo "<table class='table table-bordered'>";
	echo "<tr>";
	echo "<th>";echo "Firstname"; echo "</th>"; 
	echo "<th>";echo "Lastname"; echo "</th>";
	echo "<th>";echo "Username"; echo "</th>";
	echo "<th>";echo "Email"; echo "</th>";
	echo "<th>";echo "Contact"; echo "</th>";
	echo "<th>";echo "Sem"; echo "</th>";
	echo "<th>";echo "Enrollment"; echo "</th>";
	echo "<th>";echo "Update"; echo "</th>";
	echo "<th>";echo "Delete"; echo "</th>";
	echo "</tr>";
	while($row=mysqli_fetch_array($res))
	{
			echo "<tr>";
			echo "<td>"; echo $row["firstname"]; echo "</td>"; 
			echo "<td>"; echo $row["lastname"]; echo "</td>";
			echo "<td>"; echo $row["username"]; echo "</td>";
			echo "<td>"; echo $row["email"]; echo "</td>";
			echo "<td>"; echo $row["contact"]; echo "</td>";
			echo "<td>"; echo $row["sem"]; echo "</td>";
			echo "<td>"; echo $row["enrollment"]; echo "</td>";
			
			echo "<td>"; ?> <a href="user_update.php?id=<?php echo $row["id"]; ?>">Update</a> <?php echo "</td>";
			
			echo "<td>"; ?> <a href="user_delete.php?id=<?php echo $row["id"]; ?>">Delete</a> <?php echo "</td>";
			
			echo "</tr>";
	}
	echo "</table>";
?>                     
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>
	</section>
</div>
</div>
</div>


<?php
include "footer.php"; 
?>