<?php
include("template/header.php");
echoHeader("About");
?>
	<div class="col-sm-9">
    <div class="container-fluid">
    	<div class="jumbotron"><h1 class="text-center">Admin Panel</h1></div>

    </div>

<?php
if(isset($_GET['login'])){
	$login = $_GET['login'];
	if ($login == 1){

		echo "<div class='alert alert-success'>Welcome Admin</div>";
				echo "<a href='?vuln=file_upload'>Upload Profile Avatar</a>";


	}else {
		echo "<div class='alert alert-danger'>Wrong Password</div>";
	}
	
}


?>
</div>
<?php
include("template/footer.php");
echoFooter();
?>

