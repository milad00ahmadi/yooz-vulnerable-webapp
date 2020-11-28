<?php
function echoHeader($title){
echo '
<!DOCTYPE html>
<html lang="en">
<head>
  <title>' . $title .'</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    .row.content {height: 95vh}
    .footer {
      height: 5vh !important;
    }
    button:hover,a:hover,input:hover {
      cursor: pointer;
    }
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
      overflow:auto;
    }
    .top-margin{
      margin-top: 50px;
    }
    .top-margin-2{
      margin-top: 20px;
    }
    footer {
      background-color: #555;
      color: white;
      padding-right: 15px;
    }
        @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
    <div class="container-fluid">
      <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="./">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?vuln=sql_injection">Sql Injection</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?vuln=blind_sql_injection">Blind Sql Injection</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=authentication_bypass">Authentication Bypass</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=xss_stored">Cross Site scripting Stored</a>
  </li>
     <li class="nav-item">
    <a class="nav-link" href="?vuln=xss_reflected">Cross Site scripting Reflected</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=file_upload">File Upload</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=csrf">Cross Site Request Forgery</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=rfi">Remote File Inclusion</a>
  </li>
          <li class="nav-item">
    <a class="nav-link" href="?vuln=lfi">Local File Inclusion<span class="badge badge-secondary">New</span></a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=lfd">Local File Disclosure/Download</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=remote_code_execution">Remote Code Execution</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=remote_command_execution">Remote Command Execution</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?vuln=object_injection">PHP Object Injection<span class="badge badge-secondary">New</span></a>
  </li>
      <li class="nav-item">
    <a class="nav-link" href="?vuln=session_hijacking">Session Hijacking<span class="badge badge-secondary">New</span></a>
  </li>

    <li class="nav-item">
    <a class="nav-link" href="?page=info">PHP INFO</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="?page=about">About</a>
  </li>
</ul>
      </div>
    </div>

    ';
    }
?>