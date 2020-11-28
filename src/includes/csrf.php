<?php
include("template/header.php");
echoHeader("Cross Site Request Forgery");
?>
<div class="col-sm-9 top-margin-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Home</a></li>
		<li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
		<li class="breadcrumb-item active">Cross Site Request Forgery</li>

	</ol>

	<h2>Cross Site Request Forgery</h2>
	<hr>
	<div class="container-fluid">
		<form class="form-horizontal" action="" method="get">
			<input type="text" style="display:none;" value="csrf" name="vuln">

			<div class="form-group"><input type="submit" value="Create Posts" class="btn btn-info form-control" name="create"></div>
		</form>
		<p>Hi Please select post that you want to delete : </p>
		<form class="form-horizontal" action="" method="get">
			<input type="text" style="display:none;" value="csrf" name="vuln">
			<div class="form-group"><label></label><select class="form-control" name="post">
					<option>Post 1</option>
					<option>Post 2</option>
					<option>Post 3</option>
					<option>Post 4</option>
					<option>Post 5</option>
				</select></div>
			<div class="form-group"><input type="submit" class="btn btn-default" value="Delete" style="display:block;margin:0 auto">
				<div>
		</form>
		<hr />
		<br /><br />
		<?php
		if (isset($_GET["post"])) {
			$post = getcwd() . "/posts/" .  $_GET["post"] . ".php";
			if (!unlink($post)) {
				echo $post;
				echo ("<h3 class='alert alert-danger'> Error While deleting " .  $_GET['post'] . " </h3>");
			} else {
				echo ("<h3 class='alert alert-success'>" . $_GET['post'] . " Deleted :</h3>");
			}
		}
		if (isset($_GET['create'])) {
			for ($i = 1; $i <= 5; $i++) {
				$create = fopen(getcwd() . "/posts/POST $i.php", "w") or die("<div class='alert alert-danger'>Unable to open file!</div>");
				fwrite($create, "<h1>post $i</h1>");
				fclose($create);
			}
			echo "<h2 class='alert alert-success'>Created</h2>";
		}

		?>
	</div>
	<h4><small>Learn more</small></h4>
	<hr>

	<a href="https://www.owasp.org/index.php/Cross-Site_Request_Forgery_(CSRF)">Owasp</a><br>
	<a href="https://www.sitepoint.com/preventing-cross-site-request-forgeries/">Site Point</a><br>
	<a href="http://guardiran.org/search/?&q=csrf&eitherTermsOrTags=or&sortby=relevancy">GuardIran Security Team<span class="badge badge-secondary">Persian</a><br>

	<hr>
</div>
</div>
</div>

<?php
include("template/footer.php");
echoFooter();
?>

</body>

</html>