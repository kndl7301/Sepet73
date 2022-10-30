<?php
session_start();
$baglan = mysqli_connect("localhost","root","","sepet") or die("connection failed:".connection_error());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detay</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    
<?php  

$id = $_GET['id'];
$sql="SELECT * FROM kategoriler WHERE id = $id ";
$select=mysqli_query($baglan,$sql);

$row = $select->fetch_assoc();




?>

<div class="container" >
	
<div class="">
		
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
						<input type="text"  id="fiyat" class="btn btn-success" name="fiyatı"  value='<?php echo $row["fiyatı"]; ?>'  style="width:90px;height:45px;">																																			
						&nbsp
				<input type="number" id="adet" name="adet"  placeholder="1 Adet"  style="width:100px;height:43px;border-radius:7px;">
				&nbsp
		 <button class="btn" id="ekle" name="ekle" onclick="ekle(<?php echo $row['fiyatı'];?>)" style="width:55px;height:45px;background-color:grey;"><i class="fa fa-cart-plus" style="font-size:35px;color:orange; "></i></button><br><br>
</div></form>
		</div>
	</div>
</body>



</html>


<script>

	function ekle(fiyatı){
		alert(fiyatı);
		

	}



</script>


