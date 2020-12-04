# Vulnerable Web Application

**Note: The codes are a total mess, I will refactor them as soon as I can**

Vulnerable web app helps you to test your skills in penetration testing or learn penetration testing and help developers better understand the processes of securing web applications.<br>
This application has been created for beginner users and teachers to teach/learn web application security. feel free to edit/add some codes to this application.<br>
> Do not upload it to your hosting provider's public HTML folder or any internet-facing web server as it will be compromised. 

I recommend using docker, but you can steel use XAMPP or WAMP and use `/src/` directory
```sh
$ docker-compose up --build server
```

# Supported Vulnerabilities
* Sql Injection
* Blind Sql Injection
* Authentication Bypass
* XSS Stored
* XSS Reflected
* File Upload
* Cross Site Request Forgery
* Remote File Inclusion</a>
* Local File Disclosure/Download
* Remote Code Execution
* Remote Command Execution
* PHP Object Injection

For installation enter your mysql database credentials in `src/config/config.php`


![Screenshot](https://github.com/milad00ahmadi/vulnerable-web-application/blob/master/screenshot.png?raw=truee)