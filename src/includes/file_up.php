<?php
include("template/header.php");
echoHeader("File Upload");
?>
<div class="col-sm-9 top-margin-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Home</a></li>
		<li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
		<li class="breadcrumb-item active">File Upload</li>

	</ol>

	<h2>File Upload</h2>
	<hr>
	<div class="container-fluid">
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="form-group"><label class="btn btn-default file" style="display:block;margin:0 auto;cursor: pointer;">Click here to select file <input type="file" style="display: none;" name="file" id="file"></label></div>
			<div class="form-group"><input type="submit" name="submit" class="btn btn-default btn-block" value="submit" id="submit-button" style="display:block;margin:0 auto;cursor: pointer;">
				<div>


		</form>
		<a href="?vuln=file_upload&clear_upload=true" class="btn btn-danger" style="color:#FFF;cursor: pointer;display:block;margin:10px auto;">clear upload directory</a>
		<br /><br />
		<?php
		if (isset($_GET["clear_upload"])) {
			try {
				$files = scandir(getcwd() . "/up");
				foreach ($files as $file) {
					if (!is_dir($file)) {
						unlink(getcwd() . "/up/" .  $file);
					}
				}
				echo "<div class='alert alert-success'>All files successfully removed <a href='?vuln=file_upload'>click here</a> to back</div><script>$('#submit-button').css('display','none');</script>";
			} catch (Exception $e) {
				echo "<div class='alert alert-danger'>Error while removing files</div>";
			}
		}
		if (isset($_POST['submit'])) {
			$file = "up/" . basename($_FILES["file"]["name"]);
			$up = 1;
			$check = ($_FILES["file"]["type"]);

			if (isset($_POST["submit"])) {
				$check = ($_FILES["file"]["type"]);
				if ($check == "image/jpeg" || $check == "image/png" || $check == "image/gif") {
					$up = 1;
				} else {
					echo "<div class='alert alert-danger'>You Can Just Upload JPG , JPEG , PNG & GIF Files</div>";
					$up = 0;
				}
			}
			if (file_exists($file)) {
				echo "<div class='alert alert-danger'>Sorry, file already exists.</div>";
				$up = 0;
			}


			if ($up == 0) {
				echo "<div class='alert alert-danger'>Error While Uploading File.</div>";
			} else {
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {
					echo "<div class='alert alert-success'>Your File ' " . basename($_FILES["file"]["name"]) . " ' has been uploaded . To Access Your Image Click On Bellow Link : <a href='up/" . basename($_FILES["file"]["name"]) . "'>Click Here</a></div>";
				} else {
					echo "<div class='alert alert-danger'>Error While Uploading File.</div>";
				}
			}
		}
		?>
	</div>
</div>
</div>

<h4><small>Learn more</small></h4>
<hr>

<a href="https://www.owasp.org/index.php/Unrestricted_File_Upload">Owasp</a><br>
<a href="https://www.w3schools.com/php/php_file_upload.asp">w3schools</a><br>
<a href="http://guardiran.org/search/?&q=file%20upload&eitherTermsOrTags=or&sortby=relevancy">GuardIran Security Team<span class="badge badge-secondary">Persian</a><br>

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