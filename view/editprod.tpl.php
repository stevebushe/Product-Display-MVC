<?php
$server = 'http://'.$_SERVER['SERVER_NAME'];
$docroot = $_SERVER['DOCUMENT_ROOT'];    
if(isset($_POST['apply']) ){      
     if(self::updateprod($_POST, $_FILES, $data)){
        header('Location:http://tiguleni.com/product/detail/vehicles/'.trim($data['title']));
      }     
 } else{        
        include $docroot.'/view/header.php';
?>      
<div id="editMain">
      <div class="detail">        
        <h6><?=$data['title'];?></h6>
        <div class="img"> <?='<img src="'.$server.'/'.$data['imgpath'].'">';?> </div>
        <span class="price"><br>Price : MWK &nbsp; <?=$data['price'] ?><br></span>
        City : <?=$data['city'] ?><br>        
        Description :
        <p><?=$data['description'] ?></p>
        Area : <?=$data['area'] ?>
    </div>
    
      <div class="editData">
            <h6>Update Your Post</h6>
            <div>Please fill in the fields you would like to update. Empty fields will remain unchanged</div>
            <form action="#" method="post" enctype="multipart/form-data"> 
             <ul> 
             <li><legend>Title</legend>
             <input type="text" name="title"/></li>
             <li> <legend>Price</legend>
             <input type="price" name="price" /> </li>         
             <li> <legend>City</legend>
             <input type="text" name="city"/></li>
             <li> <legend>Area of City</legend>
             <input type="text" name="area"/></li>
             <li><legend>Select up to 5 images for your post</legend></li>
             <li><input type="file" id="fileinput" name="images[]" multiple="multiple" /></li>
             <li> <legend>Description</legend>
             <textarea rows="10" cols="50" name="description"></textarea> </li>
              <li><input type="submit" name="apply" value="Apply Changes"/></li>
              </ul>
          </form>                       
      </div>
 </div>
 <?
 	}
 ?>	  