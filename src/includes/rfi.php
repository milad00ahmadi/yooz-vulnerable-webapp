     <?php
      include("template/header.php");
      echoHeader("Remote File Inclusion");
      ?>
     <div class="col-sm-9 top-margin-2">
       <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="./">Home</a></li>
         <li class="breadcrumb-item"><a href="?page=vuln">Vulnerabilities</a></li>
         <li class="breadcrumb-item active">Remote File Inclusion</li>


       </ol>
       <h2>Remote File Inclusion</h2>
       <hr>
       <?php
        if (!ini_get('allow_url_include')) {
          echo "<div class='alert alert-danger'>allow_url_include is not enabled.</div>";
        }
        if (!ini_get('allow_url_fopen')) {
          echo "<div class='alert alert-danger'>allow_url_fopen is not enabled</div>";
        }

        if (isset($_GET["file"])) {
          $file = $_GET['file'];
          include $file;
        } else {
          echo "<div class='alert alert-info'>Use 'file' parameter as input value or <a href='?vuln=rfi&file=/posts/POST%201.php'>click here </a></div>";
        }
        if (isset($_POST['phpini'])) {
          phpinfo();
        }


        ?>


       <h4><small>Learn more</small></h4>
       <hr>
       <a href="https://www.owasp.org/index.php/Testing_for_Remote_File_Inclusion">Owasp</a><br>
       <a href="https://www.offensive-security.com/metasploit-unleashed/file-inclusion-vulnerabilities/">Offensive security</a><br>
       <a href="http://guardiran.org/search/?&q=Remote%20File%20Inclusion&eitherTermsOrTags=or&sortby=relevancy">GuardIran Security Team<span class="badge badge-secondary">Persian</a><br>

     </div>

     <?php
      include("template/footer.php");
      echoFooter();
      ?>
     </body>

     </html>