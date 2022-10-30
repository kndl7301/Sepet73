



<?php 

session_start();
$baglan = mysqli_connect("localhost","root","","sepet") or die("connection failed:".connection_error());

 






$output = "";

if(isset($_POST['search'])){
    $input = $_POST['input'];

	


    if(!empty($input)){
        $query="SELECT * FROM kategoriler  WHERE ürünadı LIKE '%$input%'   	";

        $res = mysqli_query($baglan,$query);


        if(mysqli_num_rows($res) < 1){
            $output = "
               
				<table border=4 width=150px>
                <td id=bulunamadı >ürün bulunamadı</td>
                </table>

            ";
        }else{
            while($row = mysqli_fetch_array($res)){
                $output =$output."
                
				
                 <tr>

				 <br><br>	
				<td><a href='detay.php?id=".$row["id"]."'>".$row['ürünadı']."<hr></a></td>
				
					
				
					 <td id=fiyat>".$row['fiyatı']."₺<hr></td>
			
                    
</tr>

                ";
            }
        }



    }
}


?>

<style>
 
 table,td{
	 border:1px solid black;
	 background:#409f99;
	 margin-left:50%;
	
	 font-size:17px;
 }
 #fiyat{
	 background-color:black;
	 color:white;
 }
 #bulunamadı{
	background-color:red;
	color:white;
 }

</style>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Anasayfa</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
</head>
<body>

<nav class="navbar  navbar-expand-lg navbar-dark	 bg-dark" id="navbar" style="height:50px;">
  <div class=" px-3" style="display:flex"  >
  	<img src="pictures/sepet.jpg" width="50px" height="45px" style="display:flex;" 	>&nbsp
    <h1 class="navbar-brand"style="font-family: fantasy;" href="#">SEPET73</h1>
   </div> 

	<div class="container">
	
	

<div class=" container col-sm-6" style="display:flex;margin-top:15px;">
	

<div class="arama" >
    <form action="" method="post">
		<div class="container" style="display:flex;" >
        <input type="search" name="input" class="form-control form" style="width: 800px;margin-left:50%;" placeholder="Sepet73'te ara">
        <input type="submit" name="search" class="btn btn-info" value="Ara" >
</div>
    </form>

    <table width="350px" >
	<?php	
	

		
    echo $output;
	?>
	</table>
    
</div>	
</div>

<div class="col-sm-3 px-5 right-nav" id="nav2" style="display:flex; margin-top: 10px;margin-left: 450px;">

<a href="sepet.php" style="margin-left:-55px;"><i class="fa fa-cart-plus" style="font-size:35px;color:orange; "></i></a>&nbsp
 	
 	<a href="login.php"><button class="btn btn-danger" id="logout" style="width:100px;height: 35px;">Çıkış yap</button></a>
 

<div class="menu-bar" style="margin-left: -20px;" 	>
			<ul>
				<li class="active"><a href="#" id="gear"><i class="fa fa-gear " id="gear" style="font-size:35px;color:blue;"></i></a>&nbsp

						<div class="sub-menu-1"id="menu1" >
							<ul>
								<li >	
									
									<a href="#">kullanıcı adı: <?php echo $_SESSION['username'];?></a><br><hr>
									<a href="#">şifre: <?php  echo 	"***" ?></a><br><hr>
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

<br><br><br>

<h3  style="text-align: center;">kategoriler</h3>

<div class=" container kategoriler px-5">
<ul> 
   <div class="row">
	 
	<a href="categories.php?category=içecek" class="col-sm-4 py-3"style="text-decoration:none;"><img src="pictures/içecekler.jpg" style="border-radius: 7%;" ><h3 class="kategori">içecekler	</h3></a>
	<a href="categories.php?category=kahvaltılık" class="col-sm-4 py-3" style="text-decoration:none;"><img src="pictures/süt.jpg" style="border-radius: 7%;"><h3 class="kategori">süt,kahvaltılık	</h3></a>
	<a href="categories.php?category=gıda" class="col-sm-4 py-3" style="text-decoration:none;"><img src="pictures/temelgıda.jpg" style="border-radius: 7%;"><h3 class="kategori">temel gıda	</h3></a>
 </div> 

  <div class="row">
	<a href="categories.php?category=meyve-sebze" class="col-sm-4 py-3"style="text-decoration:none;"><img src="pictures/sebze.jpg" style="border-radius: 7%;"><h3 class="kategori">meyve,sebze</h3></a>
	<a href="categories.php?category=kasap"class="col-sm-4 py-3" style="text-decoration:none;"><img src="pictures/et.jpg" style="border-radius: 7%;"><h3 class="kategori">et,tavuk,balık</h3></a>
	<a href="categories.php?category=pastane"class="col-sm-4 py-3" style="text-decoration:none;"><img src="pictures/kahvaltı.jpg" style="border-radius: 7%;"><h3 class="kategori">fırın ,pastane</h3></a>
</div>

   <div class="row">
	<a href="categories.php?category=abur-cubur" class="col-sm-4 py-3"style="text-decoration:none;"><img src="pictures/aburcubur.jpg" style="border-radius: 7%;"><h3 class="kategori">abur cubur	</h3></a>
	<a href="categories.php?category=temizlik"class="col-sm-4 py-3" style="text-decoration:none;"><img src="pictures/temizlik.jpg" style="border-radius: 7%;"><h3 class="kategori">temizlik ,deterjan	</h3></a>
	<a href="categories.php?category=kişiselbakım"class="col-sm-4 py-3" style="text-decoration:none;"><img src="pictures/kişiselbakım.jpg" style="background-color: white; border-radius: 7%;"><h3 class="kategori">kişisel bakım</h3></a>
</div>

  <div class="row">
	<a href="categories.php?category=kırtasiye" class="col-sm-4 py-3"style="text-decoration:none;"><img src="pictures/kırtasiye.jpg"  style="border-radius: 7%;"><h3 class="kategori" >kitap,kırtasiye	</h3></a>
	<a href="categories.php?category=elektronik"class="col-sm-4 py-3" style="text-decoration:none;"><img src="pictures/elektronik.jpg"  style="border-radius: 7%;"><h3 class="kategori" >elektronik	</h3></a>
	<a href="categories.php?category=beyazeşya"class="col-sm-4 py-3" style="text-decoration:none;"><img src="pictures/beyazeşya.jpg"  style="border-radius: 7%;"><h3 class="kategori" >beyaz eşya</h3></a>
	</div>
 
</ul>
</div>

<hr>
<br><br><br><br>

	
	<div class="container px-5">
		<div class="row px-5"  >
				
		
			<div class=" py-3	col-sm-3 ">
				<div class="footer-ikon px-3 py-3" >
				<i class="fa fa-credit-card " style="font-size: 100px;"></i>
				<br><br><h6 >Esnek Ödeme İmkanları</h6><p>Kapıda veya Kredi Kartı ile Online Ödeme Yapın</p></div>

			</div>
                                 
			<div  class="  py-3 col-sm-3">
				<div class="footer-ikon" >
				<i class="fa fa-truck  " style="font-size:100px;margin-left: 35px; margin-top: 25px;"></i>
				<br><br><h6 >İstediğin Saatte Teslimat</h6><p>Haftanın 7 günü İstediğin Saatte Teslim Edelim</p></div>

			</div>
                         
			<div  class="  py-3 col-sm-3">
				<div class="footer-ikon" >
				<i class="fa fa-qrcode  " style="font-size:100px;margin-left: 35px; margin-top: 25px;"></i>
				<br><br><h6 >mobil cebinizde</h6><p>Dilediğiniz her yerdengüvenli alışverişin keyfini çıkarın.</p></div>


			</div>

             
			<div class="  py-3 col-sm-3">
				<div class="footer-ikon" >
				<i class="fa fa-bitcoin" style="font-size:100px;margin-left: 35px; margin-top: 25px;"></i>
				<br><br><h6 >Bitcoin altyapısı ile ödeme yap</h6><p>ödemeyi istediğin coin ile yap </p></div>
			</div>


			
		</div>
	</div>


<br><br><br><br>
<br><br>
<div class="alt"  id="alt">
	<div class="container">
		<div class="row" style="display: flex;">

			<div class="col-sm-3 py-3	">
				<h3>kategoriler</h3>
				<p>Meyve & Sebze</p>
				<p>Et & Tavuk & Şarküteri</p>
				<p>Süt & Süt Ürünleri</p>
				<p>Kahvaltılık</p>
				<p>Ekmek & Pastane</p>
				<p>Dondurulmuş Ürünler</p>
				<p>Yemeklik Malzemeler</p>
				<p>Atıştırmalık</p>
				<p>İçecek</p>
			</div>

			<div class="col-sm-3 py-5">
				<p>Kişisel Bakım & Kozmetik</p>
				<p>Temizlik</p>
				<p>Anne - Bebek & Çocuk</p>
				<p>Kağıt Ürünleri</p>
				<p>Evcil Dostlar</p>
				<p>Elektronik</p>
				<p>Giyim & Ayakkabı & Aksesuar</p>
				<p>Ev & Yaşam</p>
				
			</div>

			<div class="col-sm-3 py-5">
				<h3>yardım</h3>

				<p>Yasal Uyarılar</p>
				<p>Güvenlik Politikası</p>
				<p>Kullanım Koşulları</p>
				<p>Kişisel Verilerin Korunması</p>
				<p>Hakkımızda</p>
				<p>Kurumsal</p>
				<p>Yatırımcı İlişkileri</p>
				
			</div>

			<div class="col-sm-3 py-5">
				<h3>hesabım</h3>

					<p>Siparişlerim</p>
					<p>Kullanıcı Bilgilerim</p>
					<p>Adreslerim</p>
					<p>Favori Ürünlerim</p>
					<p>Ödeme Yöntemlerim</p>
					<p>Fatura Bilgilerim</p>
				
			</div>
			<hr>
			<div style="display:flex;"><h5>Bizi Arayın:</h5><p>&nbsp&nbsp&nbsp&nbsp 0 733 733 73 73 &nbsp&nbsp&nbsp&nbsp<h5>Bize Yazın:</h5>&nbsp&nbsp&nbsp&nbspmusterihizmetleri@sepet73.com.tr </p></div>
		<br>	
		</div>
	</div>

</div>


</body>
</html>

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





a{
	text-decoration: none;
	color: black;
}

 

 
  .change{
	  background-color: rgb(254, 129, 2);

 
  }
  .login{
	  
 	  background-color: rgb(254, 129, 2);
  }
  .register{
	  background-color: rgb(254, 129, 2);
  }
 

  
 .alt{
 	background-color:#0b0804;
 	width: %100;
 	height: 500px;
 	color: darkgray;
 }
 
 .kategori{
	 text-align: center;
	 font-family: sans-serif;
	 color: black;
 }
 
 
 
 
 
</style>


