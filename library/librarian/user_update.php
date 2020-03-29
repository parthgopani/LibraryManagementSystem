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
$res=mysqli_query($link,"select * from student_registration where id=$id");
$row=mysqli_fetch_array($res);
//if(isset($_GET["id"]))
//{
if(isset($_GET["new"]) && $_GET["new"]==1)
{
$id=$_GET["id"]; 
$fname=$_GET['firstname'];
$lname=$_GET['lastname'];
$uname=$_GET['username'];
$email=$_GET['email'];
$contact=$_GET['contact'];
$sem=$_GET['sem'];
$enrollment=$_GET['enrollment'];
$qry="update student_registration set firstname='$fname',lastname='$lname',username='$uname',email='$email',contact='$contact',sem='$sem',enrollment='$enrollment' where id=$id";
mysqli_query($link,$qry);
$status="Record Updated Successfully.<br/><br/>
<a href='display_student_info.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;"></p>'.$status.'</p>';
}
else{
?>
  <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Update Students</h3>
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
							
							<input name="id" type="hidden"  value="<?php echo $row['id'];?>">
							
							<fieldset class="form-group">
							First Name :
							<input type="text" class="form-control" placeholder="First Name" name="firstname" required value="<?php echo $row['firstname']?>">
							</fieldset>
							<fieldset class="form-group">
							Last Name :
							<input type="text" class="form-control" placeholder="Last Name" name="lastname" required value="<?php echo $row['lastname']?>">
							</fieldset>
							<fieldset class="form-group">
							Username :
							<input type="text" class="form-control" placeholder="User Name" name="username" required value="<?php echo $row['username']?>">
							</fieldset>
							<fieldset class="form-group">
							Email :
							<input type="text" class="form-control" placeholder="Email" name="email" required value="<?php echo $row['email']?>">
							</fieldset>
							<fieldset class="form-group">
							Contact :
							<input type="text" class="form-control" placeholder="Contact" name="contact" required value="<?php echo $row['contact']?>">
							</fieldset>
							<fieldset class="form-group">
							Semester: 
							<input type="text" class="form-control" placeholder="semester" name="sem" required value="<?php echo $row['sem']?>">
							</fieldset>
							<fieldset class="form-group">
							Enrollment :	
							<input type="text" class="form-control" placeholder="enrollment" name="enrollment" required value="<?php echo $row['enrollment']?>">
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
	alert("User Detail Updated Successsfully");
	  window.location="display_student_info.php";
	</script>
	<?php
}
?>
<!--<script type="text/javascript">
  window.location="display_student_info.php";
  </script>-->
<?php
include "footer.php"; 
?> 
  
