 <?php
include("template/header.php");
echoHeader("Local File Inclusion");
?>
 <div class="col-sm-9 top-margin-2">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="./">Home</a></li>
  <li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
  <li class="breadcrumb-item active">Local File Inclusion</li>


</ol>
      <h2>Local File Inclusion</h2>
      <hr>
      <?php
if( !ini_get( 'allow_url_include' ) ) {
  echo "<div class='alert alert-danger'>allow_url_include is not enabled.</div>";
}
if( !ini_get( 'allow_url_fopen' ) ) {
  echo "<div class='alert alert-danger'>allow_url_fopen is not enabled</div>";
}

        if (isset($_GET["file"]))
        {
          $file = "/posts/" . $_GET['file'] . ".php";
          include $file;
        }else {
          echo "<div class='alert alert-info'>Use 'file' parameter as input value or <a href='?vuln=lfi&file=POST 1'>click here </a></div>";

        }
        if (isset($_POST['phpini'])){
          phpinfo();
        }

  
  ?>
	

      <h4><small>Learn more</small></h4>
      <hr>
      <a href="https://www.owasp.org/index.php/Command_Injection">On Owasp</a><br>
      <a href="http://teamultimate.in/local-file-inclusion-lfi-tutorial/">On TeamUltimate</a><br>
    </div>
	
	<?php
include("template/footer.php");
echoFooter();
?>
	</body>
</html>