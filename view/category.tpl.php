<?php
include 'header.php';
$docroot = $_SERVER['DOCUMENT_ROOT'];
$server  = 'http://'.$_SERVER['SERVER_NAME']; 	
?>
<div id="main">

  <div class="gridcontainer">   
    <?php 
      echo '<ul class="grid">';
      foreach ($data as $key => $value) 
      {  
         echo '<li class="gprod">';         
         echo '<h3>'.$value['title'].'</h3>';
         echo '<img src="'.$server.'/'.$value['imgpath'].'" />';
         echo '<div>';
         echo '<p>Price    : '.$value['price'].'</p>';
         echo '<p>Location : '.$value['city'].'</p>';
         echo '</div>';
         echo '<p>'.substr($value['description'], 0, 100).' ....<p>';
         echo '<span><a class="arrow" href="'.$server.'/product/detail/'.$value['category'].'/'.$value['prodId'].'/'.implode( '_', explode(' ',trim($value['title']) ) ).'"> See Details &nbsp;&nbsp;&nbsp;> </a></span>';
        echo '</li>'; 
      }
      echo '</ul>';
            ?>
</div>

<div id="adcontainer">
     <div id="adspace"></div>
     <div id="adspace2"></div>
   </div> 

</div>

