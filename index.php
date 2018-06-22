<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

set_error_handler("error");

$page;$vulnerability;
$htmlCode=     '<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vulnerable Web App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    .row.content {height: 95vh}
    .footer {
      height: 5vh !important;
    }
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
      overflow:auto;
    }
    .top-margin{
      margin-top: 50px;
    }
    .top-margin-2{
      margin-top: 20px;
    }
    footer {
      background-color: #555;
      color: white;
      padding-left: 10px;
    }
        @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
    <div class="container-fluid">
      <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="./">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?vuln=sql_injection">Sql Injection</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?vuln=blind_sql_injection">Blind Sql Injection</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=authentication_bypass">Authentication Bypass</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=xss_stored">Stored Cross-site scripting</a>
  </li>
     <li class="nav-item">
    <a class="nav-link" href="?vuln=xss_reflected">Reflected Cross-site scripting</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=file_upload">File Upload</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=csrf">Cross Site Request Forgery</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=rfi">Remote File Inclusion</a>
  </li>
     <li class="nav-item">
    <a class="nav-link" href="?vuln=lfi">Local File Inclusion<span class="badge badge-secondary">New</span></a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=lfd">Local File Disclosure/Download</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=remote_code_execution">Remote Code Execution</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=remote_command_execution">Remote Command Execution</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=object_injection">PHP Object Injection<span class="badge badge-secondary">New</span></a>
  </li>
         <li class="nav-item">
    <a class="nav-link" href="?vuln=session_hijacking">Session Hijacking<span class="badge badge-secondary">New</span></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="?page=info">PHP INFO</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?page=about">About</a>
  </li>
</ul>
      </div>
    </div>

    <div class="col-sm-9 top-margin-2">
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Home</li>
  
</ol>
      <hr>
      <div class="alert alert-success" role="alert">Setup Process Finished With No Errors</div>

      <h4>Welcome To Vulnerable Web Application.</h4>
      <hr>
      <p>With vulnerable webapp you can test your skills in penetration testing or learn penetration testing and help developers better understand the processes of securing web applications . This script has been created for beginner users read more in <a href="?page=about">about page</a> or vist to vulnerabilities pages.</p>
      <div class="alert alert-warning">Do not upload it to your hosting providers public html folder or any internet facing web server as it will be compromised. We recommend downloading and installing <a href="https://www.apachefriends.org/index.html">XAMPP</a> or <a href="http://www.wampserver.com/en/">WAMP</a> onto a local machine inside your LAN which is used solely for testing.</div>
      <!--<h4><small>Learn more</small></h4>-->
      <hr>
    </div>
  </div>
</div>

<footer class="container-fluid footer">
  <p style="margin-top:1vh;display: inline-block;">Design & Developed by <a href="http://miladahmadi.net">Milad Ahmadi</a></p>
</footer>

</body>
</html>

    
    ';
	if(!isset($_GET['vuln']) || empty($_GET['vuln'])){
	$vulnerability= "";
} else {
	$vulnerability = $_GET["vuln"];
}
if (empty($vulnerability)){
$vulnerability == "";
}
if ($vulnerability == "sql_injection")
{
	require(getcwd() . "/config/config.php");

	require(getcwd() . "/includes/sql.php");
	
}else if ($vulnerability == "blind_sql_injection"){
		require(getcwd() . "/config/config.php");

	require(getcwd() . "/includes/blind sql.php");
}else if ($vulnerability == "session_hijacking"){
  include("includes/session_hijacking.php");
}else if ($vulnerability == "xss_reflected"){
	require(getcwd() . "/includes/xss_reflected.php");

}else if ($vulnerability == "xss_stored"){
require(getcwd() . "/config/config.php");

require (getcwd(). "/includes/xss_stored.php");
}
else if ($vulnerability == "lfi"){

require (getcwd(). "/includes/lfi.php");
}else if ($vulnerability == "rfe"){
	require(getcwd() . "/includes/rfe.php");
}else if ($vulnerability == "file_upload"){
	require(getcwd() . "/includes/file_up.php");
}else if ($vulnerability == "csrf"){
	require(getcwd() . "/includes/csrf.php");
}else if ($vulnerability == "rfi"){
	require(getcwd() . "/includes/rfi.php");
}else if ($vulnerability == "authentication_bypass"){
			require(getcwd() . "/config/config.php");

	require(getcwd() . "/includes/authentication bypass.php");
}else if ($vulnerability == "remote_command_execution"){

	require(getcwd() . "/includes/remote_command_execution.php");
}else if ($vulnerability == "remote_code_execution"){

	require(getcwd() . "/includes/remote_code_execution.php");
}else if ($vulnerability == "lfd"){

	require(getcwd() . "/includes/lfd.php");
}else if ($vulnerability == "object_injection"){

	require(getcwd() . "/includes/object_injection.php");
}else {


if(!isset($_GET['page']) || empty($_GET['page'])){
	$page= "";
} else {
	$page = $_GET["page"];
	
}
if (empty($page)){
$page == "";
}
if ($page == "about")
{
	require(getcwd() . "/about.php");
	
}else if ($page == "vuln"){
	require(getcwd() . "/vulnerabilities.php");
}else if ($page == "info"){
	echo phpinfo();
	die();
}else if ($page == "admin_panel"){
	require(getcwd() . "/includes/adminpanel.php");
}
else {
require(getcwd() . "/config/config.php");

	$connect = new mysqli($_sv, $_user, $_pass);


$mysql = mysqli_connect($_sv, $_user, $_pass);

if(@mysqli_select_db($connect, $dbnamegi)){
echo $htmlCode;
}else{
	

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 


$sqlCode = "CREATE DATABASE IF NOT EXISTS GIVuln";
$sqlTableCreator = "CREATE TABLE IF NOT EXISTS login (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50))";
$sqlTableCreatorComments = "CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
comment VARCHAR(30))";
if ($connect->query($sqlCode) === TRUE) {
	$connect2 = new mysqli($_sv, $_user, $_pass,$dbnamegi);

	if ($connect2->query($sqlTableCreator) === TRUE && $connect2->query($sqlTableCreatorComments) === TRUE)
	{
		
	
			$sqlInsertInTable = "INSERT INTO login (user, password, email)
VALUES ('Admin', 'admin_Password', 'admin@example.com')";
		$sqlInsertInTable2 = "INSERT INTO login (user, password, email)
VALUES ('King', 'coder', 'kingcoder@example.com')";
		$sqlInsertInTable3 = "INSERT INTO login (user, password, email)
VALUES ('guardiran', 'guardiran', 'info@guardiran.org')";
		$sqlInsertInTable4 = "INSERT INTO login (user, password, email)
VALUES ('salam', 'salam_pass', 'salam@example.com')";

	if (mysqli_query($connect2, $sqlInsertInTable) && mysqli_query($connect2, $sqlInsertInTable2) && mysqli_query($connect2, $sqlInsertInTable3) && mysqli_query($connect2, $sqlInsertInTable4)) {
		echo $htmlCode;

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}else {
		echo "Error While Inserting Table <br/> Error : " . $connect2->error;
		
	}


} else {
    echo "Error While Connecting To DataBase <br/> Error" . $connect->error;
}

$connect->close();
}
}

}

function error($err, $errtxt) {
  echo '<html><head><link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script></head><body><div class="container"><div class="alert alert-danger"><strong>Error </strong>' . $errtxt . "</div></div></body></html>";
  die();
}
?>
	
