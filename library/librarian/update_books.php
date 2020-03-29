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
$id=$_GET["id"];
$res=mysqli_query($link,"select * from add_books where id=$id");
$row=mysqli_fetch_array($res);

if(isset($_GET["new"]) && $_GET["new"]==1)
{
$id=$_GET["id"]; 

$bname=$_GET['bookname'];
$bauthorname=$_GET['bookauthorname'];
$bpublicationname=$_GET['bookpublicationname'];
$bpurchasedate=$_GET['bookpurchasedate'];
$bprice=$_GET['bookprice'];
$bqty=$_GET['bookqty'];
$bavailqty=$_GET['bookavailqty'];
$qry="update add_books set books_name='$bname',books_author_name='$bauthorname',books_publication_name='$bpublicationname',books_purchase_date='$bpurchasedate',books_price='$bprice',books_qty='$bqty',avail_qty='$bavailqty' where id=$id";
mysqli_query($link,$qry);
}
else{
?>

 <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Update Books</h3>
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
							<form name="form1" action="" class="col-lg-12" enctype="multipart/form-data">
							<table class="table">
							<input type="hidden" name="new" value="1">
							<input name="id" type="hidden"  value="<?php echo $row['id']?>">
							<fieldset class="form-group">
							Books Name :
							<input type="text" class="form-control" placeholder="Books Name" name="bookname" required value="<?php echo $row['books_name']?>">
							</fieldset>
							<fieldset class="form-group">
							Books Author Name :
							<input type="text" class="form-control" placeholder="Books Author Name" name="bookauthorname" required value="<?php echo $row['books_author_name']?>">
							</fieldset>
							<fieldset class="form-group">
							Books Publication Name :
							<input type="text" class="form-control" placeholder="Books Publication Name" name="bookpublicationname" required value="<?php echo $row['books_publication_name']?>">
							</fieldset>
							<fieldset class="form-group">
							Books Purchase Date :
							<input type="text" class="form-control" placeholder="Books Purchase Date" name="bookpurchasedate" required value="<?php echo $row['books_purchase_date']?>">
							</fieldset>
							<fieldset class="form-group">
							Books Price :
							<input type="text" class="form-control" placeholder="Books Price" name="bookprice" required value="<?php echo $row['books_price']?>">
							</fieldset>
							<fieldset class="form-group">
							Books Quantity :
							<input type="text" class="form-control" placeholder="Books Quantity" name="bookqty" required value="<?php echo $row['books_qty']?>">
							</fieldset>
							<fieldset class="form-group">
							Books Available Quantity :
							<input type="text" class="form-control" placeholder="Books Available Quantity" name="bookavailqty" required value="<?php echo $row['avail_qty']?>">
							</fieldset>
							<fieldset class="form-group">
							<input type="submit" name="submit1" class="btn btn-dark btn-min-width mr-1 mb-1" value="update">
							 			</fieldset>		 
							</table>
							</form> 
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
  }
if(isset($_GET["submit1"]))
{?>
	<script type="text/javascript">
	alert("Book Detail Updated Successsfully");
	  window.location="display_books.php";
	</script>
	<?php
}
?>
<?php
include "footer.php"; 
?>
 
  
