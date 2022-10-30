
<?php 

session_start();
$baglan = mysqli_connect("localhost","root","","sepet") or die("connection failed:".connection_error());

 ob_start();
 


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  

  <title>KATEGORİLER</title>
<style>


  .menu-bar{
	text-align: center;
  
	
}

.menu-bar ul{
	display: flex;
	


}

.menu-bar ul li{
	

	list-style-type: none;

	

}

.menu-bar ul li a{
	text-decoration: none;
	color: black;
	font-family: sans-serif	;
	text-align: center;
	
}

.active,.menu-bar ul li a{

	border-radius: 3px;
	text-align: center;

}

.sub-menu-1{
	display: none;
	border-radius: 7px;
	background-color: #979f8f;
	margin-left: -80px;

}

.menu-bar ul li:hover .sub-menu-1{
	display: block;
	position: absolute;
	color: black	;

	

}

.menu-bar ul li:hover .sub-menu-1 ul{
	display: block;
	margin: 10px;
	padding: 5px;
	

}

@media (max-width:430px){

  #sub-menu-1{
    margin-left: 1px;

  }

  #menu-bar{
    margin-top: -60px;
    width:150px;
	
    
    
  }
  #çıkış{
    margin-left: 120px;
    margin-top: -65px;
  }
  #anasayfa{
    margin-left: 250px;
    
  }

}

.kategori{	
	background-color:#358ff2;
	width: 20em;
	border-radius:7px;

	
	
}


body{
	margin-top:5em;
}


</style>

</head>

  <body>


	  <div class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <img src="pictures/sepet.jpg" alt=""style="width:50px; height:35px;">&nbsp
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse show" id="navbarCollapse" style="">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
         <h3 style="font-family:fantasy;color:white;">SEPET73</h3>
        </li>
       
      </ul>
	  
     
       
      <a href="homepage.php"> <button class="btn btn-outline-success" id="anasayfa" type="submit" style="width:120px">Anasayfa</button></a>&nbsp
        <a href="login.php"> <button class="btn btn-outline-danger" id="çıkış" type="submit" style="width:120px">Çıkış yap</button></a>&nbsp
        <div class="menu-bar" id="menu-bar" style="margin-left: -20px;"	>
			<ul>
				<li class="active"><a href="#"><i class="fa fa-gear " style="font-size:35px;color:blue;margin-top:5px;"></i></a>&nbsp

						<div class="sub-menu-1" id="sub-menu-1" >
							<ul>
								<li >
									
									<a href="#">kullanıcı adı: <?php  echo $_SESSION['username']?></a><br><hr>
									<a href="#">şifre: <?php  echo "12**"?></a><br><hr>
										<a href="change.php">şifre değiştir </a><br>
										
									
								</li>
							</ul>
						</div>

				</li>
        &nbsp

				<li class="active"><a href="#" id="bars"><i class="fa fa-bars " style="font-size:35px;color:blue;margin-top:5px;"></i></a>

						<div class="sub-menu-1"  id="sub-menu-1">
							<ul>
								<li >
									<input type="search" class="form-control" placeholder="sepet73 te ara" style="width:180px;">
									<a href="categories.php?category=içecek">içecekler</a><br><hr>
									<a href="categories.php?category=kahvaltılık">süt kahvaltılık</a><br><hr>
										<a href="categories.php?category=gıda">temel gıda</a><br><hr>
										<a href="categories.php?category=meyve-sebze">meyve sebze</a><br><hr>
									<a href="categories.php?category=kasap">et.tavuk,balık</a><br><hr>
										<a href="categories.php?category=pastane">fırın pastane</a><br>
									
								</li>
							</ul>
						</div>
			
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				</li>
			
				
			</ul>
		</div>
     
    </div>
  </div>
</div><br>


<div class=" row">
	

<?php  
$kategori = $_GET["category"];


$sql="SELECT * FROM kategoriler WHERE kategori = '$kategori' ";
$select=mysqli_query($baglan,$sql);

?>


	
			<?php
		while($row=mysqli_fetch_array($select)){
			?>
			
	<div class="col-md-3 col-12 px-3">
			<div class="sepet">
	<div class="kategori" >
		<form action="sepet.php" method="post">
			<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<img src='pictures/<?php echo $row["img"]; ?> 'style="width:225px;height:175px;border-radius:10px;margin-left:15px;">
			 	
			<br>
		<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<input type="text" style="background-color:red;border-radius:20px;color:white"  name="ürünadı"   value='<?php echo $row["ürünadı"]; ?>'  style="height:45px;">																																			

			
			<br>
			&nbsp&nbsp
			<div class="row">
			&nbsp&nbsp	&nbsp&nbsp	&nbsp&nbsp
						<input type="text"  id="fiyat" class="btn btn-success" name="fiyatı"  value='<?php echo $row["fiyatı"];echo " ₺" ?>'  style="width:90px;height:45px;">																																			
						&nbsp
				<input type="number" id="adet" name="adet"  placeholder="1 Adet"  style="width:90px;height:43px;border-radius:7px;">
				&nbsp
		 <button class="btn" id="ekle" name="ekle"  style="width:55px;height:45px;background-color:grey;"><i class="fa fa-cart-plus" style="font-size:35px;color:orange; "></i></button><br><br>
</div></form>
			
		</div>
	</div>


	<br><br><br>
	
	</div>

	
		

<?php
}

?>


</style>
<div id="sepet">
</div>

			
			</div>

</body>
</html>





<?php

if(isset($_POST['ekle'])){
	$adet=$_POST['adet'];
	$fiyatı=$_POST['fiyatı'];
	$ürünadı=$_POST['ürünadı'];
	$tutar=$fiyatı*$adet;
echo "SEPETİM:";
	echo "$adet Adet $ürünadı <br>";
	echo "TUTAR: $tutar ₺";
	
	
	
}
?>