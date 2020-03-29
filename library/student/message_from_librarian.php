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
mysqli_query($link,"update messages set read1='y' where dusername='$_SESSION[username]'");
?>

       <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Message</h3>
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
								<tr>
								<th>Full Name</th>
								<th>Title</th>
								<th>Message</th>
								
								</tr>
								
								<?php
								$res=mysqli_query($link,"select * from messages where dusername='$_SESSION[username]' order by id desc");
								while($row=mysqli_fetch_array($res))
								{
									$res1=mysqli_query($link,"select * from librarian_registration where username='$row[susername]'");
									while($row1=mysqli_fetch_array($res1))
									{
										$fullname=$row1["firstname"]." ".$row1["lastname"];
									}
									echo "<tr>";
									echo "<td>"; echo $fullname; echo "</td>";
									echo "<td>"; echo $row["title"]; echo "</td>";
									echo "<td>"; echo $row["msg"]; echo "</td>";
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