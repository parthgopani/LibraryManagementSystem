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
            <h3 class="content-header-title">Book details with books</h3>
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
									echo "<b>"."Total Quantity : ".$row["books_qty"]."</b>";
									echo "<br>";
									echo "<b>"."Available : ".$row["avail_qty"]."</b>";
									echo "<br>";
									?><a href="all_student_of_this_books.php?books_name=<?php echo $row["books_name"]; ?>" style="color:red">Student Record if this Books</a> <?php 
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