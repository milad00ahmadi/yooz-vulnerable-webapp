<?php
include("template/header.php");
echoHeader("PHP Object Injection");
?>
    <div class="col-sm-9 top-margin-2">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
  <li class="breadcrumb-item active">PHP Object Injection</li>

</ol>

      <h2>Vulnerabilities</h2>
      <hr>
			
<ul class="selector">
	<li><a href="?vuln=sql_injection&id=1">Sql Injection</a></li>
	<li><a href="?vuln=blind_sql_injection&id=1">Blind Sql Injection</a></li>
				<li><a href="?vuln=authentication_bypass">Authentication Bypass</a></li>

	<li><a href="?vuln=xss_stored">XSS Stored</a></li>
	<li><a href="?vuln=xss_reflected">XSS Reflected</a></li>
	<li><a href="?vuln=file_upload">File Upload</a></li>
	<li><a href="?vuln=csrf">Cross Site Request Forgery</a></li>
	<li><a href="?vuln=rfi&file=posts/POST%201.php">Remote File Inclusion</a></li>
			<li><a href="?vuln=lfd&file=download/doc.pdf">Local File Disclosure/Download</a></li>

		<li><a href="?vuln=remote_code_execution&code=echo 'Hi';">Remote Code Execution</a></li>
		<li><a href="?vuln=remote_command_execution&cmd=echo test">Remote Command Execution</a></li>
		<li><a href="?vuln=object_injection">PHP Object Injection</a></li>

</ul>
				
			</div>
		</div>
		
	</div></div></div>
	</div>

<?php
include("template/footer.php");
echoFooter();
?>

</body>
</html>
