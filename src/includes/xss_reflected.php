<?php
include("template/header.php");
echoHeader("Cross Site Scripting Reflected");
?>
<div class="col-sm-9 top-margin-2">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
    <li class="breadcrumb-item active">Cross Site Scripting Reflected</li>

  </ol>

  <h2>Cross Site Scripting Reflected</h2>
  <hr>
  <?php
  if (isset($_GET["search"])) {
    echo "<h1 class='text-center'>Searched Word : ";
    echo '<b>' . $_GET['search'] . '</b></h1>';
  } else {
    echo "<div class='alert alert-info'>Use 'search' parameter as input value or <a href='?vuln=xss_reflected&search=somthing'>click here </a></div>";
  }

  ?> <h4><small>Learn more</small></h4>
  <hr>

  <a href="https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)">Owasp</a><br>
  <a href="https://en.wikipedia.org/wiki/Cross-site_scripting">WikiPedia</a><br>
  <a href="http://guardiran.org/search/?&q=cross%20site%20scripting&eitherTermsOrTags=or&sortby=relevancy">GuardIran Security Team<span class="badge badge-secondary">Persian</a><br>

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