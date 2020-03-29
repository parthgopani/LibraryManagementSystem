<?php
if(isset($_SESSION["username"]))
{
	?>
	<script type="text/javascript">
				window.location="login.php";
				</script>
				<?php
}

include "header.php";
include "connection.php";
?>

         <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">My Issued Books</h3>
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
                                <table class="table table-bordered">
								<th>
								Student Enrollment No.
								</th>
								<th>
								Books Name
								</th>
								<th>
								Books Issue Date
								</th>
								<?php
								$res=mysqli_query($link,"select * from issue_books where student_username='$_SESSION[username]'");
								while($row=mysqli_fetch_array($res))
								{
									echo "<tr>";
									echo "<td>";
									echo $row["student_enrollment"];
									echo "</td>";
									echo "<td>";
									echo $row["books_name"];
									echo "</td>";
									echo "<td>";
									echo $row["books_issue_date"];
									echo "</td>";
									
									echo "</tr>";
								}
								?>
								</table>
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