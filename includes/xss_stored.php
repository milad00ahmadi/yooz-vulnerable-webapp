<?php
include("template/header.php");
echoHeader("Cross Site Scripting Stored");
?>
<style>.card{
	margin-top: 10px;
	}</style>
    <div class="col-sm-9 top-margin-2">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="./">Home</a></li>
  <li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
  <li class="breadcrumb-item active">Cross Site Scripting Stored</li>

</ol>

      <h2>Cross Site Scripting Stored</h2>
      <hr>
				<div class="container-fluid">
				<form class="form-horizontal" action="" method="post">
			<div class="form-group"><label>Enter Your Comment</label><input type="text" placeholder="My Comment" class="form-control" name="comment"></div>
				<div class="form-group"><input type="submit" class="btn btn-default" value="submit" style="display:block;margin:0 auto"><div>
		

				</form>
						<div class="form-group"><a href="?vuln=xss_stored&xss_clear=true" style="color:#FFF;"><button class="btn btn-danger" style="display:block;margin:10px auto;color:#FFF !important">Clear Table</a></button><div>
				<hr/>
				<h1 class="text-center">Comments</h1>
				<br/><br/>

				<?php
				include("config/config.php");
				if (isset($_GET["xss_clear"])){
					$connect = new mysqli($_sv, $_user, $_pass,$dbnamegi);
					$queryInsert = "TRUNCATE TABLE comments";
				
				if ($connect->query($queryInsert)){
					echo "<div class='alert alert-success'>table cleared . <a href='?vuln=xss_stored'>click here </a>to back</div>";

				}
				}
				if(isset($_POST['comment']))
				{


				$comment=$_POST['comment'];
				$connect = new mysqli($_sv, $_user, $_pass,$dbnamegi );
				$queryInsert = "INSERT INTO comments (comment) VALUES (
				'$comment');";
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
if ($connect->query($queryInsert) === TRUE) {
					$getComment = "SELECT comment FROM comments";

					$res = $connect->query($getComment);

if ($res->num_rows > 0) {
					while($row = $res->fetch_assoc()) {
						echo "<div class='card'><div class='card-body'><h4 class='card-title'>Comment</h4><div class='container'><p><b></b> " . $row['comment'] . "</p></div></div></div>";
					}
}
} else {
}
			$connect->close();	
				}else {
									$connect = new mysqli($_sv, $_user, $_pass, $dbnamegi);

					$getComment = "SELECT comment FROM comments";

					$res = $connect->query($getComment);

if ($res->num_rows > 0) {
					while($row = $res->fetch_assoc()) {
						echo "<div class='card'><div class='card-body'><h4 class='card-title'>Comment</h4><div class='container'><p><b></b> " . $row['comment'] . "</p></div></div></div>";
					}
}
				}
				?>

</div>
	</div>
</div>
			 <h4><small>Learn more</small></h4>
      				 <hr>

      <a href="https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)">On Owasp</a><br>
      <a href="https://en.wikipedia.org/wiki/Cross-site_scripting">On WikiPedia</a><br>
      <a href="http://guardiran.org/search/?&q=cross%20site%20scripting&eitherTermsOrTags=or&sortby=relevancy">On GuardIran Security Team<span class="badge badge-secondary">Persian</a><br>

    </div>
  </div>
</div>

<?php
include("template/footer.php");
echoFooter();
?>

</body>
</html>
