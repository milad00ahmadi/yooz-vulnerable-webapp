<?php
include("template/header.php");
echoHeader("Remote Command Execution");
?>
<div class="col-sm-9 top-margin-2">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
    <li class="breadcrumb-item active">Remote Command Execution</li>


  </ol>
  <h2>Remote Command Execution</h2>
  <hr>
  <?php
  if (isset($_GET['cmd'])) {
    $cmd = $_GET['cmd'];
    system($cmd);
  } else {
    echo "<div class='alert alert-info'>Use 'cmd' parameter as input value or <a href='?vuln=remote_command_execution&cmd=echo test'>click here </a></div>";
  }
  ?>

  <h4><small>Learn more</small></h4>
  <hr>
  <a href="https://www.owasp.org/index.php/Command_Injection">Owasp</a><br>
  <a href="https://www.exploit-db.com/papers/12885/">Exploit-db</a><br>
  <a href="http://guardiran.org/search/?&q=command%20Execution&eitherTermsOrTags=or&sortby=relevancy">GuardIran Security Team<span class="badge badge-secondary">Persian</a><br>

</div>

<?php
include("template/footer.php");
echoFooter();
?>
</body>

</html>