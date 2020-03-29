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
            <h3 class="content-header-title">Search Books</h3>
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
							<form name="form1" action="" method="post" class="col-lg-12">
							<fieldset class="form-group">
							<input type="text" name="t1" placeholder="Enter Book Name" class="form-control" required>
							</fieldset>
							<fieldset class="form-group">
							<input type="submit" name="submit1" value="search books" class="btn btn-dark btn-min-width mr-1 mb-1">
							</fieldset>
							</form>
                                <?php
								
								if(isset($_POST["submit1"]))
								{
									$i=0;
									$res=mysqli_query($link,"select * from add_books where books_name like('%$_POST[t1]%')");
								
								echo "<table class='table table-bordered'>";
								echo "<tr>";
								while($row=mysqli_fetch_array($res))
								{
									$i=$i+1;
									echo "<td>";
									?> <img src="../librarian/<?php echo $row["books_image"]; ?>" height="100" width="100">
									
									<?php
									echo "<br>";
									echo "<b>".$row["books_name"]."</b>";
									echo "<br>";
									echo "<b>"."Available : ".$row["avail_qty"]."</b>";
									
									echo "</td>";
									if($i==4)
									{
										echo "</tr>";
										echo "<tr>";
										$i=0;
									}
								}
								echo "</tr>";
								echo "</table>";
								}
								else
								{
									$i=0;
								$res=mysqli_query($link,"select * from add_books");
								echo "<table class='table table-bordered'>";
								echo "<tr>";
								while($row=mysqli_fetch_array($res))
								{
									$i=$i+1;
									echo "<td>";
									?> <img src="../librarian/<?php echo $row["books_image"]; ?>" height="100" width="100">
									
									<?php
									echo "<br>";
									echo "<b>".$row["books_name"]."</b>";
									echo "<br>";
									echo "<b>"."Available : ".$row["avail_qty"]."</b>";
									
									echo "</td>";
									if($i==4)
									{
										echo "</tr>";
										echo "<tr>";
										$i=0;
									}
								}
								echo "</tr>";
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