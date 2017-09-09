<?php
include("template/header.php");
echoHeader("Remote Code Execution");
?>
    <div class="col-sm-9 top-margin-2">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="./">Home</a></li>
  <li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
  <li class="breadcrumb-item active">Remote Code Execution</li>

</ol>

      <h2>Remote Code Execution</h2>
      <hr>
		 <?php
		 if (isset($_GET['code'])){
		 $code=$_GET['code'];
		 eval($code);
		 }else {
		 echo "<div class='alert alert-info'>Use 'code' parameter as input value or <a href='?vuln=remote_code_execution&code=phpinfo();'>click here </a></div>";

		 }
		 ?>

      <h4><small>Learn more</small></h4>
      				 <hr>

      <a href="https://www.owasp.org/index.php/Code_Injection">On Owasp</a><br>
      <a href="http://guardiran.org/search/?&q=code%20Execution%20injection&eitherTermsOrTags=or&sortby=relevancy">On GuardIran Security Team<span class="badge badge-secondary">Persian</a><br>

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
