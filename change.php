<?php

session_start();
$baglan = mysqli_connect("localhost","root","","sepet") or die("connection failed:".connection_error());




?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>change password</title>
  
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="change">
 
    
  
<div class="container my-5 col-sm-4">
	<form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="">
          <div class="form-floating mb-3">

            <label for="floatingInput">Kullanıcı Adı</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" >
            <label for="floatingPassword">Yeni Şifre</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" >Beni Hatırla
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="change">Şifre Değiştir</button>
           <hr class="my-1"> 
           <a href="login.php" class="w-100 btn btn-lg btn-warning" style="text-decoration: none;color:black;"> Anasayfa
             </a></form>
  

</div>

</body>
</html>


<?php


 if (isset($_POST['change'])) {

  if (!empty( $_POST['password'])) {
     	if (strlen($_POST['password'])<4) {
      echo "<div class=\"container\"><h1>şifre 4 karakterden az olamaz.</h1></div>";
      return;
    }
  
  
 $sql = "update users SET password='".$_POST['password']."' WHERE username='".$_SESSION['username']."'";
  $sonuc=mysqli_query($baglan,$sql);
echo "<div class=\"container\"><h1>şifreniz başarılı bir şekilde değiştirilmiştir.</h1></div>";

 }
}

	?>