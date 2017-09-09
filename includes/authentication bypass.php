<?php
include("template/header.php");
echoHeader("Authentication Bypass");
?>
 <div class="col-sm-9 top-margin-2">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="./">Home</a></li>
  <li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
  <li class="breadcrumb-item active">Authentication Bypass</li>


</ol>
      <h2>Authentication Bypass</h2>
      <hr>
      <form class="form-horizontal" action="" method="post">
			<div class="container-fluid">
				<div class="form-group"><label style="color:#FFF;">Username : </label><input type="text" class="form-control" name="user"></div>
				<div class="form-group"><label style="color:#FFF;">Password : </label><input type="password" class="form-control" name="pass"></div>
				<div class="form-group"><input type="submit" class="btn btn-default btn-block" value="login" name="submit"></div>
				</div>

				<?php
					include("config/config.php");
						if(isset($_POST['submit'])){
											$connect = new mysqli($_sv, $_user, $_pass, $dbnamegi);
				if ($connect->connect_error) {
					die("Failed :  " . $connect->connect_error);
				} 

				$getLoginInfo = "SELECT id FROM login WHERE user = '" . $_POST["user"] . "' AND password='" . $_POST['pass'] . "'";
				$res = $connect->query($getLoginInfo);
				
				$count = mysqli_num_rows($res);
				if ($count>=1){
							header('Location: ?page=admin_panel&login=1', true, "" ? 301 : 302);

				}else {
					header('Location: ?page=admin_panel&login=0', true, "" ? 301 : 302);
				}

							
				
						
						
						}



				?>
      <h4><small>Learn more</small></h4>
      <hr>
      <a href="http://www.sqlinjection.net/login/">On sqlinjection.net</a><br>
            <a href="https://www.owasp.org/index.php/Testing_for_Bypassing_Authentication_Schema_(OTG-AUTHN-004)">On Owasp</a><br>

      <a href="https://www.exploit-db.com/papers/14340/">On Exploit-db</a><br>
      <a href="http://guardiran.org/search/?&q=Authentication%20bypass&eitherTermsOrTags=or&sortby=relevancy">On GuardIran Security Team<span class="badge badge-secondary">Persian</a><br>

    </div>
	
	<?php
include("template/footer.php");
echoFooter();
?>
	</body>
</html>