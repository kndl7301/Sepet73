

<?php 

session_start();
$baglan = mysqli_connect("localhost","root","","sepet") or die("connection failed:".connection_error());



?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GİRİŞ YAP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="login">  


<div class="container my-5 col-sm-4">
	<form class="p-4 p-md-5 border rounded-3 bg-light" method="POST"  action="">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="username" >
            <label for="floatingInput">Kullanıcı Adı</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" >
            <label for="floatingPassword">Şifre</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" > Beni Hatırla
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Giriş Yap</button>
           <hr class="my-1">
          
  <a href="register.php" class="w-100 btn btn-lg btn-success my-1" >Kayıt Ol</a>
        

          <small class="text-muted">Kayıt Ol'a tıklayarak kullanım koşullarını kabul etmiş olursunuz.</small>
        
</form>
</div>


</body>
</html>


<?php

if (isset($_POST['username'])) {
  
$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
$select=mysqli_query($baglan,$sql);
$row=mysqli_fetch_array($select);

  


if (is_array($row)) {
  
  $_SESSION['username']=$row['username'];
  $_SESSION['password']=$row['password'];
  
    if (empty($username && $password)) {

  echo    "<div class=\"container\"><h1>lütfen bir kullanıcı ad ve şifre giriniz</h1></div>";

  }else
  
  
  header("location:homepage.php");
  exit();
  

}else
{
      echo "<div class=\"container\"><h1>geçersiz kullanıcı adı yada şifre</h1></div>"
;
}
if(($_POST['username']=="admin") && ($_POST['password']=="1234")){
  header("location:admin.php");
}


}


?>
