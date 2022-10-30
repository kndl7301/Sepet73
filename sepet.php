<?php
session_start();
$baglan = mysqli_connect("localhost","root","","sepet") or die("connection failed:".connection_error());


?>  


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SEPETİM</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
</head>


<body>

	

<nav class="navbar  navbar-expand-lg navbar-dark	 bg-dark" id="navbar" style="height:50px;">
  <div class="col-sm-6 px-3" style="display:flex"  >
  	<img src="pictures/sepet.jpg" width="50px" height="45px" style="display:flex;" 	>&nbsp
    <h1 class="navbar-brand"style="font-family: fantasy;" href="#">SEPET73</h1>
   </div> 

<h1 style="color:red;">SEPETİM</h1>

<div class="col-sm-6 px-5 right-nav" id="nav2" style="display:flex; margin-top: 10px;margin-left:150px;">


<a href="homepage.php"> <button class="btn btn-outline-success" id="anasayfa" type="submit" style="width:120px">Anasayfa</button></a>&nbsp

 	
 	<a href="login.php"><button class="btn btn-danger" id="logout" style="width:100px;height: 35px;">Çıkış yap</button></a>
 

    	
 

<div class="menu-bar" style="margin-left: -20px;" 	>
			<ul>
				<li class="active"><a href="#" id="gear"><i class="fa fa-gear " id="gear" style="font-size:35px;color:blue;"></i></a>&nbsp

						<div class="sub-menu-1"id="menu1" >
							<ul>
								<li >
									
									<a href="#">kullanıcı adı: <?php  echo $_SESSION['username']?></a><br><hr>
									<a href="#">şifre: <?php  echo "12**"?></a><br><hr>
										<a href="change.php">şifre değiştir </a><br>
										
									
								</li>
							</ul>
						</div>

				</li>

				<li class="active"><a href="#"><i class="fa fa-bars " id="bars" style="font-size:35px;color:blue;"></i></a>

						<div class="sub-menu-1" id="menu2">
							<ul>
								<li >
									<input type="search" class="form-control" placeholder="sepet73 te ara" style="width:180px;">
									<a href="categories.php?category=içecek">içecekler</a><br><hr>
									<a href="categories.php?category=kahvaltı">süt kahvaltılık</a><br><hr>
										<a href="categories.php?category=gıda">temel gıda</a><br><hr>
										<a href="categories.php?category=meyve-sebze">meyve sebze</a><br><hr>
									<a href="categories.php?category=kasap">et.tavuk,balık</a><br><hr>
										<a href="categories.php?category=pastane">fırın pastane</a><br>
									
								</li>
							</ul>
						</div>

				</li>
			
				
			</ul>
		</div>


    	</div>
    </div>
        
</nav>


<div class="container">
	<div id="sepet">

	<?php

if(isset($_POST['ekle'])){
	$adet=$_POST['adet'];
	$fiyatı=$_POST['fiyatı'];
	$ürünadı=$_POST['ürünadı'];
	$kargo=19.99;
	$tutar =((int)$fiyatı * (int)$adet);

	$genel=$tutar + $kargo;
	



	echo "<br>
	<div id='sepet'  style='border:solid 1px ;width:300px;border-radius:7px;margin-left:600px;' class='pb-summary-box'>
	<h1>Sipariş Özeti</h1><ul class='pb-summary-box-prices'>
	<li><span>$adet Adet $ürünadı </span> <strong >&nbsp&nbsp&nbsp $tutar TL</strong></li>
	<li><span>Kargo Toplam</span><strong title='19,99 TL'>&nbsp&nbsp&nbsp 19,99 TL</strong></li></ul>
	<hr style='width:255px;'><p>&nbsp&nbsp Toplam Tutar :<STRONG style='color:#F27A1A'> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $genel TL</STRONG></p>&nbsp&nbsp

	<button class='btn btn-danger' onc type='submit'  onclick='boşalt();' style='background-color:red;color:white;width:150px;'>Sepeti Boşalt</button>
	<button class='btn btn-success' type='submit'   style='color:white;'>Sepeti Onayla</button>
	<br>	 <br></div>";


	$sql = "insert into siparişler(username,ürünadı,tutar)values('".$_SESSION['username']."','".$_POST['ürünadı']."','".$tutar."')";
	$sonuc=mysqli_query($baglan,$sql);

	
}
?>

<?php

   
 ?>


	</div>
</div>
    
  </body>
</html>

<script>
	function boşalt(){
		
		let sepet=document.getElementById('sepet');
		sepet.innerHTML="<br><br><div id='sepet'  style='border:solid 1px ;width:300px;border-radius:7px;margin-left:600px;' class='pb-summary-box'><h1>&nbsp&nbsp&nbspSipariş Özeti</h1><br><br><br> &nbsp Sepetiniz Şuan Boş Hemen ürün ekleyin<br><br><a href='homepage.php'> <button class='btn btn-success' id='anasayfa' type='submit' style='width:120px;margin-left:100px;'>Anasayfa</button></a><br><br></div>"
	

	}
</script>


<style>
    
body{
	overflow-x: hidden;

}




@media (max-width: 391px){
	#logout{
		margin-left: -225px;
		margin-top: -100px;
		
	}
	#gear{
		
		margin-top: -150px;
		margin-left: -120px;
		
	}
	#bars{
		
		margin-top: -150px;
		margin-left: -170px;
		
	}
	#navbar{
	width: 170%;
	
  } 
    #alt{
	height: 1750px;
	width: 150%;
  }


  #ara2{
  margin-left: 70px;
  }

  #menu1{
	 margin-left: -250px;
  }
  #menu2{
	 margin-left: -240px;
  }

	
	
}





	
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



</style>
