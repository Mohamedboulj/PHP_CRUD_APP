<?php 
require_once(
    "./connexion.php"
  );

  if (isset($_GET['id'])) {
        $request = "SELECT * FROM  product  WHERE id=".$_GET['id'];
        $result = mysqli_query($mysqli, $request);
        $row = mysqli_fetch_assoc($result);
      //   var_dump($row);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=\, initial-scale=1.0">
      <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
      <title>Document</title>
</head>
<body>
<div class="container w-50 py-4">


<form action="" method="post">
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
  <div class="mb-3">
    <label class="form-label" for="name">product name</label>
    <input class="form-control" id="name" type="text" value="<?php echo $row['product_name']; ?>"  name="name" />
  </div>



  <div class="d-grid">
    <button class="btn btn-secondary btn-lg" value="submit" type="submit">Update</button>
  </div>

</form>

</div>
</body>
</html>

<?php
 if(isset($_POST["name"]) && isset($_POST["id"]) ){
      $name = $_POST["name"];
      
      $update = "UPDATE product SET product_name='$name' WHERE id=".$_POST["id"];
      echo $update;
       mysqli_query($mysqli,$update);
       header("Location:index.php");
      }
      $mysqli->close();
?>