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
if(isset($_GET["id"]))
  {
$id=$_GET["id"]; 
mysqli_query($link,"delete from student_registration where id=$id");
?>
  
  <script type="text/javascript">
  window.location="display_student_info.php";
  </script>
  <?php
  
  }
  else
  {
	  ?>
	<script type="text/javascript">
  window.location="display_student_info.php";
  </script>
<?php
  }  ?>
  
