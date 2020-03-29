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
            <h3 class="content-header-title">Messages
			</h3>
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
							<select class="form-control" name="desurename">
							<?php
									$res=mysqli_query($link,"select * from student_registration");
									while($row=mysqli_fetch_array($res))
									{
										?><option value="<?php echo $row["username"] ?>">
										<?php echo $row["username"]."(".$row["enrollment"].")";?>
										</option><?php
									}
							?>
						
							</select>
							</fieldset>
							<fieldset class="form-group">
							<input type="text" class="form-control" name="title" placeholder="Enter Title">
							</fieldset>
							<fieldset class="form-group">
							Message <br>
							<textarea name="msg" class="form-control">
							
							</textarea>
							</fieldset>
							<fieldset class="form-group">
							<input type="submit" name="submit1" value="send message" class="btn btn-dark btn-min-width mr-1 mb-1">
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
if(isset($_POST["submit1"]))
{
	mysqli_query($link,"insert into messages value('','$_SESSION[librarian]','$_POST[desurename]','$_POST[title]','$_POST[msg]','n')") or die(mysqli_error($link));
	
	?>
	<script type="text/javascript">
	alert("Message Send Successfully");
	</script>
	<?php
}
?>
<?php
include "footer.php"; 
?>