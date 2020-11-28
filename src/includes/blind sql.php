<?php
include("template/header.php");
echoHeader("Blind SQL Injection");
?>
<div class="col-sm-9 top-margin-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Home</a></li>
		<li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
		<li class="breadcrumb-item active">Blind SQL Injection</li>

	</ol>

	<h2>Blind SQL Injection</h2>
	<hr>
	<?php
	if (isset($_GET['id'])) {

		include("config/config.php");
		$id = $_GET["id"];

		$conn = new mysqli($_sv, $_user, $_pass, $_dbnamegi);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT id, user, email FROM login WHERE id='$id'";
		$res = $conn->query($sql);
		$textExists = @mysqli_num_rows($res);
		if ($textExists > 0) {

			echo "<h3>Product Finded<h3>";
		} else {
			echo "<h3>Error While Trying To Get Information<h3>";
		}
		$conn->close();
	} else {
		echo "<div class='alert alert-info'>Use 'id' parameter as input value . or <a href='?vuln=blind_sql_injection&id=1'>click here </a></div>";
	}
	?>
	<hr>

	<h4><small>Learn more</small></h4>
	<a href="https://www.owasp.org/index.php/Blind_SQL_Injection">Owasp</a><br>
	<a href="http://securityidiots.com/Web-Pentest/SQL-Injection/Blind-SQL-Injection.html">Security Idiots</a><br>
	<a href="https://www.exploit-db.com/papers/13045/">Exploit-db</a><br>
	<a href="http://guardiran.org/search/?&q=blind%20sql%20injection&eitherTermsOrTags=or&sortby=relevancy">GuardIran Security Team<span class="badge badge-secondary">Persian</a><br>

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