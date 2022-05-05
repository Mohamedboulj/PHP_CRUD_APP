<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <title>Document</title>
</head>

<body>
  <?php

  require_once(
    "./connexion.php"
  );
  

  // $sql = "CREATE TABLE Product (" .
  //   "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, " .
  //   "product_name VARCHAR(30) NOT NULL);";


  // if ($mysqli->query($sql)) {
  //   printf("Table products created successfully.<br />");
  // }
  // if ($mysqli->errno) {
  //   printf("Could not create table: %s<br />", $mysqli->error);
  // }


  // $mysqli->close();


  ?>
  <?php
  
  if(isset($_POST["name"])){
  $name = $_POST["name"];
  
  $sql = "INSERT INTO product (product_name) VALUES ('$name')";
   mysqli_query($mysqli,$sql);

  }

  


  ?>
  <div class="container w-50 py-4">


    <form action="" method="post">
      <input type="hidden" value="<?php $row['id'] ?>">
      <div class="mb-3">
        <label class="form-label" for="name">product name</label>
        <input class="form-control" id="name" type="text"  name="name" />
      </div>



      <div class="d-grid">
        <button class="btn btn-secondary btn-lg" value="submit" type="submit">Submit</button>
      </div>

    </form>

  </div>
  <?php
  

  $sql = "SELECT * FROM product";
  echo "<div class='container'>";
  if ($result = $mysqli->query($sql)) {
    if ($result->num_rows > 0) {
    
    echo "<table  class='table table-striped'  border='3px solid black' >";
       echo "<tr>";
       echo "<th>numero de produit</th>";
       echo "<th>nom de produit</th>";
       echo "<th>Action</th>";
       echo "</tr>";
      while ($row = $result->fetch_array()) {
      ?>
      <tr >
        <td border='1px'> <?php echo $row['id'];  ?>  </td>
        <td border='1px'> <?php echo$row['product_name'];?> </td>
        <td border='1px'><a href=edit.php?id=<?php echo $row['id'];?>> edit</a> </td>
        </tr>
        <?php
      } 
    echo "</table>";
      $result->free();
    } else {
      echo "No records matching your query were found.";
    }
  } else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
  }
  echo "</div>";

  
  

  $update = "UPDATE product SET product_name='cartable' WHERE id= 14 ";
  // mysqli_query($mysqli,$update);
  $sqlDelete = "DELETE FROM product WHERE product_name ='' ";
  // mysqli_query($mysqli,$sqlDelete);

  // $mysqli->close();
  ?>
</body>

</html>