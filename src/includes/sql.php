<?php
include("template/header.php");
echoHeader("SQL Injection");
?>
<div class="col-sm-9 top-margin-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Home</a></li>
		<li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
		<li class="breadcrumb-item active">SQL Injection</li>

	</ol>

	<h2>SQL Injection</h2>
	<hr>
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET["id"];
		include("config/config.php");
		$conn = new mysqli($_sv, $_user, $_pass, $_dbnamegi);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT id, user, email FROM login WHERE id='$id'";
		echo 'The Query is : ' . $sql;
		$res = $conn->query($sql);

		if ($res && $res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				echo "<div class='alert alert-info text-center'>You Can Contact Me By This Email :<br/>" . $row['email'] . "</div>";
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	} else {
		echo "<div class='alert alert-info'>Use 'id' parameter as input value or <a href='?vuln=sql_injection&id=1'>click here </a></div>";
	}
	?>

	<h4><small>Learn more</small></h4>
	<hr>

	<a href="https://www.owasp.org/index.php/SQL_Injection">Owasp</a><br>
	<a href="https://www.w3schools.com/sql/sql_injection.asp">w3schools</a><br>
	<a href="http://php.net/manual/en/security.database.sql-injection.php">php.net</a><br>
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