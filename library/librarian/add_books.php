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
            <h3 class="content-header-title">Add Books</h3>
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
                       <form name="form1" action="" method="post" class="col-lg-12" enctype="multipart/form-data">
							<table class="table">
							
                      <fieldset class="form-group">
					  <input type="text" class="form-control" placeholder="Books Name" name="bookname" required=""></fieldset>
                  
							
							<fieldset class="form-group">
							<input type="text" class="form-control" placeholder="Books Author Name" name="bookauthorname" required="">
							</fieldset>
							<fieldset class="form-group">
							<input type="text" class="form-control" placeholder="Books Publication Name" name="bookpublicationname" required="">
									</fieldset>
							<fieldset class="form-group">
							<input type="text" class="form-control" placeholder="Books Purchase Date" name="bookpurchasedate" required="">
									</fieldset>
							<fieldset class="form-group">
							<input type="text" class="form-control" placeholder="Books Price" name="bookprice" required="">
									</fieldset>
							<fieldset class="form-group">
							<input type="text" class="form-control" placeholder="Books Quantity" name="bookqty" required="">
									</fieldset>
							<fieldset class="form-group">
							<input type="text" class="form-control" placeholder="Books Available Quantity" name="bookavailqty" required="">
									</fieldset>
							<fieldset class="form-group">
							books image<input type="file" name="f1"  required="">
									</fieldset>
							<fieldset class="form-group">
							<input type="submit" name="submit1" class="btn btn-dark btn-min-width mr-1 mb-1" value="insert books data">
							 		</fieldset>
														 
							</table>
							</form>  </div>
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
if(isset($_POST["submit1"]))
{
	$tm=md5(time());
	$fnm=$_FILES["f 1"]["name"];
	$dst="./book_image/".$tm.$fnm;
	$dst1="book_image/".$tm.$fnm;
	move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
	mysqli_query($link,"insert into add_books values('','$_POST[bookname]','$_POST[bookauthorname]','$_POST[bookpublicationname]','$_POST[bookpurchasedate]','$_POST[bookprice]','$_POST[bookqty]','$_POST[bookavailqty]','$_SESSION[librarian]','$dst1')");
	
	?>
	<script type="text/javascript">
	alert("Books Inserted Successsfully");
	</script>
	<?php
}
?>
<?php
if(isset($_POST["submit1"]))
{
	
}
?>

<?php
include "footer.php"; 
?>