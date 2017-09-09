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

      <h2>PHP Object Injection</h2>

      <hr>
		 <?php
		class ObjectInjection
						{
						   public $file_name;


						   function __destruct()
						   {
						      $file = "{$this->file_name}";
						      if (file_exists($file)) @unlink($file);
						   }
						}
						if (false){
						$class=new ObjectInjection();
						$class->file_name = "./download/file.txt";
						echo serialize($class);
					}
					if (isset($_GET["help"])){
					$class = new ObjectInjection();
					$class->file_name="./download/file.txt";
					$help = serialize($class);
					echo "<div class='alert alert-info'>Use this payload : <br>$help <br> <a href='?vuln=object_injection'>click here</a> to back</div>";

					}
			if (isset($_GET["create_file"])){
				$file = fopen("download/file.txt","w");
				fwrite($file,"some content here :)");
				fclose($file);
				echo "<div class='alert alert-success'>File successfully created <a href='?vuln=object_injection'>click here</a> to back</div>";
			}
			if (isset($_GET["data"])){
						
					$data= $_GET['data'];
					$fixed_data = preg_replace_callback ( '!s:(\d+):"(.*?)";!', function($match) {      
				    return ($match[1] == strlen($match[2])) ? $match[0] : 's:' . strlen($match[2]) . ':"' . $match[2] . '";';
				},$data );
				unserialize($fixed_data);
						
									}else {
									echo "<div class='alert alert-info'>Use 'data' parameter as input value</a> </div>";

			}
		 
		 ?>
		 <br>
		 <a style="text-decoration: none;" href="?vuln=object_injection&help=true"><button class="btn btn-success btn-block" style="cursor: pointer;">Show Help</button></a>

		<a style="text-decoration: none;" href="?vuln=object_injection&create_file=true"><button class="btn btn-secondary btn-block" style="cursor: pointer;margin-top:10px;">Crate Target File</button></a>

      <h4><small>Learn more</small></h4>
      				 <hr>
      <a href="https://www.owasp.org/index.php/PHP_Object_Injection">On Owasp</a><br>

      <a href="https://www.notsosecure.com/remote-code-execution-via-php-unserialize/">On Not so secure</a><br>
            <a href="https://www.insomniasec.com/downloads/publications/Practical%20PHP%20Object%20Injection.pdf
">Insomnia Security<span class="badge badge-secondary">PDF</span></a><br>

      <a href="http://guardiran.org/search/?&q=object%20injection&eitherTermsOrTags=or&sortby=relevancy">On GuardIran Security Team<span class="badge badge-secondary">Persian</a><br>

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
