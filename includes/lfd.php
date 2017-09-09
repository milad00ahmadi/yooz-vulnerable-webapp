<?php
include("template/header.php");
echoHeader("Local File Disclosure/Download");
?>
    <div class="col-sm-9 top-margin-2">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="./">Home</a></li>
  <li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
  <li class="breadcrumb-item active">Local File Disclosure/Download</li>

</ol>

      <h2>Local File Disclosure/Download</h2>
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
					$file = basename($_GET['file']);
$file = $_GET['file'];

if(!$file){
    die('Not Found');
} else {

    header("Cache-Control: public");
    header("Content-Description: File Download");

	header( "Content-Disposition: attachment; filename=".basename($file));
	header("Content-Type: application/force-download");
    header("Content-Length:".filesize($file));

    header("Content-Transfer-Encoding: binary");

    readfile($file);
	die();
}

				}else {
			 	echo "<div class='alert alert-info'>Use 'file' parameter as input value or <a href='?vuln=lfd&file=download/doc.pdf'>click here </a></div>";


					
				}
				
	
	?>
      <h4><small>Learn more</small></h4>
      				 <hr>

      <a href="https://www.owasp.org/index.php/Full_Path_Disclosure">On Owasp</a><br>
      <a href="https://www.nulled.to/topic/107894-local-file-disclosure-tutorial/">On Nulled</a><br>

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
