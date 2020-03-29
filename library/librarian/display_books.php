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
            <h3 class="content-header-title">Display All Books</h3>
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
							<input type="text" name="t1" class="form-control" placeholder="Enter Book Name" required>
							</fieldset>
							<fieldset class="form-group">
							<input type="submit" name="submit1" value="search books" class="btn btn-dark btn-min-width mr-1 mb-1"> 
							</fieldset>
							</form>
							
                               <?php 
							   
							   if(isset($_POST["submit1"]))
							   {
								   $res=mysqli_query($link,"select * from add_books where books_name like('%$_POST[t1]%')");
							    
							   echo "<table class='table table-bordered'>";
							   echo "<tr>";
							   echo "<th>"; echo "Book Image"; echo"</th>";
							   echo "<th>"; echo "Book Name"; echo"</th>";
							   
							   echo "<th>"; echo "Author Name"; echo"</th>";
							   echo "<th>"; echo "Publication Name"; echo"</th>";
							   echo "<th>"; echo "Purchase Date"; echo"</th>";
							   echo "<th>"; echo "Price"; echo"</th>";
							   echo "<th>"; echo "Quantity"; echo"</th>";
							   echo "<th>"; echo "Available Quantity"; echo"</th>";
							   echo "<th>"; echo "Books Delete"; echo"</th>";
							   echo "</tr>";
							   while($row=mysqli_fetch_array($res))
							   {
								   echo "<tr>";
								   echo "<td>"; ?> <img src="<?php echo $row["books_image"]; ?>" height="100" width="100" <?php echo"</td>"; 
							   echo "<td>"; echo $row["books_name"]; echo"</td>";
							   
							   echo "<td>"; echo $row["books_author_name"]; echo"</td>";
							   echo "<td>"; echo $row["books_publication_name"]; echo"</td>";
							   echo "<td>"; echo $row["books_purchase_date"]; echo"</td>";
							   echo "<td>"; echo $row["books_price"]; echo"</td>";
							   echo "<td>"; echo $row["books_qty"]; echo"</td>";
							   echo "<td>"; echo $row["avail_qty"]; echo"</td>";
							   echo "<td>"; ?> <a href="update_books.php?id=<?php echo $row["id"]; ?>">Update</a> <?php echo"</td>";
							   echo "<td>"; ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete</a> <?php echo"</td>";
							   echo "<tr>";
							   }
							   echo "</table>";
							   }
							   else
							   {
							   $res=mysqli_query($link,"select * from add_books");
							   
							   echo "<table class='table table-bordered'>";
							   echo "<tr>";
							   echo "<th>"; echo "Book Image"; echo"</th>";
							   echo "<th>"; echo "Book Name"; echo"</th>";
							   
							   echo "<th>"; echo "Author Name"; echo"</th>";
							   echo "<th>"; echo "Publication Name"; echo"</th>";
							   echo "<th>"; echo "Purchase Date"; echo"</th>";
							   echo "<th>"; echo "Price"; echo"</th>";
							   echo "<th>"; echo "Quantity"; echo"</th>";
							   echo "<th>"; echo "Available Quantity"; echo"</th>";
							   echo "<th>"; echo "Books Update"; echo"</th>";
							   echo "<th>"; echo "Books Delete"; echo"</th>";
							   echo "</tr>";
							   while($row=mysqli_fetch_array($res))
							   {
								   echo "<tr>";
								   echo "<td>"; ?> <img src="<?php echo $row["books_image"]; ?>" height="100" width="100" <?php echo"</td>"; 
							   echo "<td>"; echo $row["books_name"]; echo"</td>";
							   
							   echo "<td>"; echo $row["books_author_name"]; echo"</td>";
							   echo "<td>"; echo $row["books_publication_name"]; echo"</td>";
							   echo "<td>"; echo $row["books_purchase_date"]; echo"</td>";
							   echo "<td>"; echo $row["books_price"]; echo"</td>";
							   echo "<td>"; echo $row["books_qty"]; echo"</td>";
							   echo "<td>"; echo $row["avail_qty"]; echo"</td>";
							   echo "<td>"; ?> <a href="update_books.php?id=<?php echo $row["id"]; ?>">Update</a> <?php echo"</td>";
							   echo "<td>"; ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete</a> <?php echo"</td>";
							   echo "<tr>";
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