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
            <h3 class="content-header-title">Return Books</h3>
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
                                <form name="form1" action="" class="col-lg-12" method="post">
								<table class="table">
								<fieldset class="form-group">
								<select name="enr" class="form-control selectpicker">
									<?php
									$res=mysqli_query($link,"select student_enrollment from issue_books where books_return_date=''");
									while($row=mysqli_fetch_array($res))
									{
										echo "<option>";
										echo $row["student_enrollment"];
										echo "</option>";
									}
									?>
									</select></fieldset>
										 <fieldset class="form-group">
									<input type="submit" name="submit1" value="Return" class="btn btn-dark btn-min-width mr-1 mb-1" >
									</fieldset>	
								</table>
								</form>
								<?php
								if(isset($_POST["submit1"]))
								{
									$res=mysqli_query($link,"select * from issue_books where student_enrollment='$_POST[enr]'");
									echo "<table class='table table-bordered'>";
									echo "<tr>";
									echo "<th>"; echo "Student Enrollment"; echo "</th>";
									echo "<th>"; echo "Student Name"; echo "</th>";
									echo "<th>"; echo "Student Sem"; echo "</th>";
									echo "<th>"; echo "Student Contact"; echo "</th>";
									echo "<th>"; echo "Student Email"; echo "</th>";
									echo "<th>"; echo "Books Name"; echo "</th>";
									echo "<th>"; echo "Books Issue Date"; echo "</th>";
									echo "<th>"; echo "Return Books"; echo "</th>";
									echo "</tr>";
									while($row=mysqli_fetch_array($res))
									{
										echo "<tr>";
										echo "<td>"; echo $row["student_enrollment"]; echo "</td>";
										echo "<td>"; echo $row["student_name"]; echo "</td>";
										echo "<td>"; echo $row["student_sem"]; echo "</td>";
										echo "<td>"; echo $row["student_contact"]; echo "</td>";
										echo "<td>"; echo $row["student_email"]; echo "</td>";
										echo "<td>"; echo $row["books_name"]; echo "</td>";
										echo "<td>"; echo $row["books_issue_date"]; echo "</td>";
										echo "<td>"; ?> <a href="return.php?id=<?php echo $row["id"]; ?>">Return Books</a><?php echo "</td>";
										echo "</tr>";
									}
									echo "</table>";
								}
								
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