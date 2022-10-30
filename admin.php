<?php 

session_start();
$baglan = mysqli_connect("localhost","root","","sepet") or  die("connection failed:".connection_error());
 


?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  

  <title>ADMİN PANELİ</title>


</head>

  <body>


	  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" >
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
       
        <h1 style="color:white; margin-left:450px;"> Admin Paneli</h1>
      </ul>
     
      
      <a href="homepage.php"> <button class="btn btn-outline-success" id="anasayfa" type="submit" style="width:120px">Anasayfa</button></a>&nbsp
        <a href="login.php"> <button class="btn btn-outline-danger" id="çıkış" type="submit" style="width:120px">Çıkış yap</button></a>&nbsp
        
        &nbsp

			
		</div>
     
    </div>
  </div>
</nav><br><br><br<br>>

<h1 style="margin-left:200px;" >ürün ekleme  tablosu</h1>
<div style="display:flex;">


<div class=" ürünekleme">
<br>
	<form action="" method="post">
		Kategori<input type="search" name="kategori" class="form-control"><br>
		Ürün Adı<input type="search" name="ürünadı" class="form-control"><br>
		Fiyatı<input type="search" name="fiyatı" class="form-control"><br>
		Ürün Resmi<input type="file" name="img" value="dosya seç"><br><br>
		<input type="submit" name="ekle" value="Ekle"  class="btn btn-success" style="width:220px;height:35px;"><br><br>
		
	</form>

</div>

<div class="siparişler" style="display:block;">

<?php


//   ÜRÜN EKLEME TABLOSU

 if(isset($_POST['ekle'])){
	$sql = "insert into kategoriler(kategori,ürünadı,fiyatı,img)values('".$_POST['kategori']."','".$_POST['ürünadı']."','".$_POST['fiyatı']."','".$_POST['img']."')";
	$sonuc=mysqli_query($baglan,$sql);

	
 }


 //  SİPARİŞLER TABLOSU

 $sql = "SELECT username,ürünadı,tutar FROM siparişler ";
 $result = $baglan->query($sql);




if ($result->num_rows > 0) {
  // output data of each row	
  echo "<table><h1 style='margin-top:-50px;'>Siparişler Tablosu</h1><br><th >KullanıcıAdı</th><th>Sipariş </th><th>Tutar</th></table>";
  while($row = $result->fetch_assoc()) {

    echo "  <table><td>" . $row["username"]. "</td><td> " . $row["ürünadı"]. "</td><td>" . $row["tutar"]. " ₺</td></table>";
  }
  
}

else {
		echo "0 results";
	  }



	

$baglan->close();
?>

</div>
</div>
<br><br><br>

</body>
</html>


<style>

	body{
		background-color:#80a28f;
	}
	
	.ürünekleme{
		background-color:#d58f03;
		width:280px;
		border-radius:15px;
		margin-left: 230px;
		padding: 8px;
		
	}
	.siparişler{
		margin-left: 250px;
	}

	
	table {
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 100%;
	background:#0a95ad;

	
	}

	

	td{
	border: 1px solid black;
	text-align: right;
	padding: 8px;
	
	
	}

	th{
		color:white;
	    border: 1px solid black;
		text-align: left;
		padding: 8px;
	}
	
</style>




    




   



