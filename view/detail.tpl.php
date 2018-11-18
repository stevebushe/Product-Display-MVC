<?php
    $server = $_SERVER['SERVER_NAME'];
    $root = $_SERVER['DOCUMENT_ROOT'];    
    include $root.'/view/header.php';
?>
<div id="detailMain">
      <h4><?=$data['title'];  ?></h4>

    <div id="productDetail">
       
        <div id="productImg"><img src="<?=$data['imgpath'];?>" ></div>        
        <span class="price">Price : MWK &nbsp; <?=$data['price'] ?><br></span>
        <p>City : <?=$data['city'] ?></p>
        
        <b>Description : </b>
        <p><?=$data['description'] ?></p>
        <p>Area : <?=$data['area'] ?></p>
        
        <p><a href="/product/editprod/<?=$data['category'].'/'.$data['prodId'].'/'.$data['usrId'].'/'.$data['title'] ?>"> Admin Tools </a></p>
     
        <div id="social">
          <ul>
          <li class="facebook"></li>
          <li class="twitter"></li>
          <li class="pinterest"></li>
          <li class="instagram"></li>
          </ul>
        </div> 
    </div>
	        
    <div id="storedetail">
       <ul>
        <li>Seller : <?= isset($data['username']) ? $data['username'] : 'Not Available';?> </li>
        <li>Email  : <?= isset($data['email']) ? $data['email'] : 'Not Available';?> </li>
        <li>Contact Number : <?= isset($data['phonenum'] ) ? $data['phonenum'] : 'Not Available'; ?></li>
        <li>Address : Cudmore Road, Ashbrittle, Harare</li>
       </ul>
    </div>
             
    <div id="adspace"></div>           
</div>

<?php
 # include('footer.php');
?>
