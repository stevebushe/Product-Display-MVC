<?php
if ( isset($_SESSION['user']) ) {          
       $sessionstatus = 'Hello, '.$_SESSION['user'];
     } else{
          $sessionstatus = '<a href="http://tiguleni.com/loginreg">Login / SignUp</a>'; 
  } 
?>
<!DOCTYPE html>
<head>
<title>gulani</title>
<link rel="stylesheet" href="http://www.tiguleni.com/css/reset.css" type="text/css">
<link rel="stylesheet" href="http://www.tiguleni.com/css/gulani.css" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300,200' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:100,400,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Alegreya+SC' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
</head>
<Body>
<div id="container">   
    
 <div id="header">
    <div class="logoRegContainer">
        <div id="logo">
          <ul>
            <li class="logotext">gulani</li>
           <li class="search">
            <form action="newsearch.php" method="post">
              <input type="text" name="search" placeholder="search ...">
              <input type="submit" name="findit" value="search">
            </form>
            </li>
          </ul>
        </div>

       <div id="reg">
        <ul>
          <li></li>          
        </ul>
      </div>

    </div>
 </div>
  <div id="nav">
          <ul>        
             <li><a href="/">Home</a></li>
             <li><a href="/properties">Properties</a></li>
             <li><a href="/vehicles">Vehicles</a></li>
             <li> <a href="/electronics">Electronics</a></li>
             <li><a href="/jobs">Jobs</a></li>
             <li><a href="/travel">Travel</a></li>
             <li><a href="/events">Events</a></li>
             <li><a href="/education">Education</a></li>
             <li><a href="/services">Services</a></li> 
             <li><a href="/other">Other</a></li>                    
          </ul>
  </div>

