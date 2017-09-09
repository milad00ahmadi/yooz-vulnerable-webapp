<?php
include("template/header.php");
echoHeader("Session Hijacking");
?>
    <div class="col-sm-9 top-margin-2">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="./">Home</a></li>
  <li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
  <li class="breadcrumb-item active">Session Hijacking</li>

</ol>

      <h2>Session Hijacking</h2>
      <hr>
		 <?php
			session_start();

			if (!isset($_SESSION['visits']))
			{
			    $_SESSION['visits'] = 1;
			}
			else
			{
			    $_SESSION['visits']++;
			}
			if (isset($_GET["close_session"])){
				session_destroy();
				header("Refresh:0; url=?vuln=session_hijacking");
			}

			echo "<p>You visited this page : " . $_SESSION['visits'];
					 
		 ?>
		 <br><br><br>
		 <a href="?vuln=session_hijacking&close_session=true"><button class="btn btn-danger" style="cursor: pointer;">Destroy session</button></a>
      <h4><small>Learn more</small></h4>
      				 <hr>

      <a href="https://www.owasp.org/index.php/Session_hijacking_attack">On Owasp</a><br>
      <a href="https://stackoverflow.com/questions/6483092/php-session-hijacking">On Stack Overflow</a><br>
      <a href="http://guardiran.org/search/?&q=Session%20hijacking&eitherTermsOrTags=or&sortby=relevancy">On GuardIran Security Team<span class="badge badge-secondary">Persian</a><br>

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
